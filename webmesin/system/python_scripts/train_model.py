# train_model.py
import tensorflow as tf
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense
import pandas as pd
import numpy as np

# Path ke file CSV
csv_file_path = 'dataset.csv'

# Membaca data dari file CSV
data = pd.read_csv(csv_file_path)

# Memisahkan data input dan output
# Ganti 'input1', 'input2', ... dengan nama kolom yang sesuai dalam dataset Anda
data_input = data[['Produksi', 'Hasil Panen', ...]].values
data_output = data[['Provitas']].values

# Membangun model
model = Sequential()
model.add(Dense(units=64, activation='relu', input_shape=(data_input.shape[1],)))
model.add(Dense(units=1))

# Melatih model
model.compile(optimizer='adam', loss='mse')
model.fit(data_input, data_output, epochs=100)

# Menyimpan model
model.save('model_jst.h5')

print("Model telah berhasil dilatih dan disimpan sebagai 'model_jst.h5'")
