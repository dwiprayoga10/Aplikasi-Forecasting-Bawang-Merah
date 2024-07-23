<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predictions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model jika dibutuhkan
        $this->load->model('Jst_model');
    }

    public function index() {
        // Misalnya, ambil data uji dari sumber data Anda
        $data_uji = $this->prepareTestData(); // Method untuk mengambil atau menyiapkan data uji

        // Panggil metode dari model untuk melakukan prediksi
        $predictions = $this->Jst_model->predict($data_uji);
        
        // Kirim hasil prediksi ke view untuk ditampilkan
        $data['predictions'] = $predictions;
        $this->load->view('predictions_view', $data); // Ganti dengan nama view yang sesuai
    }

    // Contoh method untuk menyiapkan data uji
    private function prepareTestData() {
        // Isi dengan logika untuk mengambil atau menyiapkan data uji
        // Misalnya, membaca dari database atau inputan pengguna
        $data_uji = [
            // Data uji yang disiapkan, contoh:
            'feature1' => 0.5,
            'feature2' => 0.3,
            // ...
        ];

        return $data_uji;
    }

}
?>
