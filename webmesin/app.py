from flask import Flask, request, jsonify
import pickle
import numpy as np
import pandas as pd
from sklearn.neural_network import MLPRegressor

app = Flask(__name__)

# Load the trained model
with open('jaringan.pkl', 'rb') as f:
    jaringan = pickle.load(f)

# Define min and max data for denormalization
min_data = 0  # Replace with actual min_data
max_data = 1  # Replace with actual max_data

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    data_input = np.array(data['input']).reshape(1, -1)
    
    # Perform prediction
    hasil_prediksi_norm = jaringan.predict(data_input)
    hasil_prediksi_asli = np.round(hasil_prediksi_norm * (max_data - min_data) + min_data)
    
    return jsonify({'prediction': hasil_prediksi_asli.tolist()})

if __name__ == '__main__':
    app.run(debug=True)
