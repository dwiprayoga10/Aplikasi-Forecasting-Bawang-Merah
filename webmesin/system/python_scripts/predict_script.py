import numpy as np
import pandas as pd
from sklearn.neural_network import MLPRegressor
import matplotlib.pyplot as plt
import pickle

# Membaca data asli dari file Excel
data_asli = pd.read_excel('/path/to/your/project/input_data/updatedataterbaru.xlsx', sheet_name=0, usecols='B', skiprows=1).to_numpy()

# Mengubah matriks menjadi bentuk vektor
data_asli = data_asli.flatten()

# Mencari nilai min dan max dari data asli
min_data = np.min(data_asli)
max_data = np.max(data_asli)

# Proses normalisasi data
data_norm = (data_asli - min_data) / (max_data - min_data)

# Menentukan persentase data training dan testing
persen_latih = 0.8
persen_uji = 0.2

# Menghitung jumlah data latih dan data uji
jumlah_data = len(data_norm)
jumlah_data_latih = round(jumlah_data * persen_latih)
jumlah_data_uji = jumlah_data - jumlah_data_latih

# Menyiapkan data latih normalisasi
data_latih_norm = np.zeros((jumlah_data_latih - 12, 12))  # 12 bulan data input
for m in range(jumlah_data_latih - 12):
    data_latih_norm[m, :] = data_norm[m:m + 12]

# Menyiapkan target latih normalisasi
target_latih_norm = data_norm[12:jumlah_data_latih]

# Menetapkan parameter JST
jumlah_neuron1 = 100
fungsi_aktivasi = 'logistic'
fungsi_pelatihan = 'adam'

# Membangun JST backpropagation
jaringan = MLPRegressor(hidden_layer_sizes=(jumlah_neuron1,), activation=fungsi_aktivasi, solver=fungsi_pelatihan, max_iter=1000, random_state=1)

# Melakukan pelatihan jaringan
jaringan.fit(data_latih_norm, target_latih_norm)

# Membaca hasil pelatihan
hasil_latih_norm = jaringan.predict(data_latih_norm)

# Melakukan denormalisasi terhadap hasil latih normalisasi
hasil_latih_asli = np.round(hasil_latih_norm * (max_data - min_data) + min_data)

# Membaca target latih hasil
target_latih_asli = data_asli[12:jumlah_data_latih]  # 12 bulan untuk input, jadi mulai dari bulan ke-13

# Menghitung nilai MSE
nilai_error = hasil_latih_norm - target_latih_norm
error_MSE = np.mean(nilai_error ** 2)

# Menampilkan grafik hasil pelatihan
plt.figure()
plt.plot(hasil_latih_asli, 'bo-', label='Keluaran JST', linewidth=2)
plt.plot(target_latih_asli, 'ro-', label='Target', linewidth=2)
plt.grid(True)
plt.title(f'Grafik Keluaran JST vs Target dengan nilai MSE={error_MSE}')
plt.xlabel('Data Uji')
plt.ylabel('Jumlah Produksi')
plt.legend()
plt.show()

# Menyimpan arsitektur JST hasil pelatihan
with open('/path/to/your/project/output_data/jaringan.pkl', 'wb') as f:
    pickle.dump(jaringan, f)

# Membaca hasil pengujian
hasil_uji_norm = jaringan.predict(data_latih_norm)

# Melakukan denormalisasi terhadap hasil uji normalisasi
hasil_uji_asli = np.round(hasil_uji_norm * (max_data - min_data) + min_data)

# Menyiapkan data prediksi normalisasi
data_prediksi_norm = hasil_uji_norm[-12:]
data_prediksi_norm = data_prediksi_norm.reshape(1, -1)

# Melakukan prediksi
hasil_prediksi_norm = jaringan.predict(data_prediksi_norm)

for _ in range(11):
    data_prediksi_norm = np.append(data_prediksi_norm[:, 1:], hasil_prediksi_norm[-1]).reshape(1, -1)
    hasil_prediksi_norm = np.append(hasil_prediksi_norm, jaringan.predict(data_prediksi_norm))

# Melakukan denormalisasi terhadap hasil prediksi normalisasi
hasil_prediksi_asli = np.round(hasil_prediksi_norm * (max_data - min_data) + min_data)

# Menyimpan hasil prediksi ke file CSV
output_data_path = '/path/to/your/project/output_data/output_data.csv'
pd.DataFrame(hasil_prediksi_asli).to_csv(output_data_path, index=False, header=False)
