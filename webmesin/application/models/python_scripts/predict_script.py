import numpy as np
import pandas as pd
import pickle

def load_model(model_path):
    with open(model_path, 'rb') as f:
        model = pickle.load(f)
    return model

def predict(model, input_data_path, output_data_path):
    data_asli = pd.read_csv(input_data_path, usecols=[1]).to_numpy().flatten()
    
    min_data = np.min(data_asli)
    max_data = np.max(data_asli)
    
    data_norm = (data_asli - min_data) / (max_data - min_data)
    
    data_uji_norm = np.zeros((len(data_norm) - 12, 12))
    for m in range(len(data_norm) - 12):
        data_uji_norm[m, :] = data_norm[m:m + 12]
    
    hasil_uji_norm = model.predict(data_uji_norm)
    
    hasil_uji_asli = np.round(hasil_uji_norm * (max_data - min_data) + min_data)
    
    np.savetxt(output_data_path, hasil_uji_asli, delimiter=",")
    
if __name__ == "__main__":
    input_data_path = 'path/to/updatedataterbaru.csv'
    output_data_path = 'path/to/output_data.csv'
    model_path = 'path/to/jaringan.pkl'
    
    model = load_model(model_path)
    predict(model, input_data_path, output_data_path)
