<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecasting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('forecasting_m');
    }

    public function index() {
        $data['kabupaten'] = $this->forecasting_m->get_kabupaten();
        $this->load->view('template', ['contents' => $this->load->view('forecast/forecasting', $data, true)]);
    }

    public function process() {
        $kabupaten = $this->input->post('kabupaten');

        if (empty($kabupaten)) {
            redirect('forecasting');
        }

       

        // Baca hasil prediksi dari file CSV
        $hasil_prediksi = array_map('str_getcsv', file('uploads/hasil_prediksi.csv'));
        $hasil_prediksi_2024 = array_map('str_getcsv', file('uploads/hasil_prediksi_tahun_2024.csv'));
        

        $data['kabupaten'] = $this->forecasting_m->get_kabupaten();
        $data['selected_kabupaten'] = $kabupaten;
        $data['hasil_prediksi'] = $hasil_prediksi;
        $data['hasil_prediksi_2024'] = $hasil_prediksi_2024;

        $this->load->view('template', ['contents' => $this->load->view('forecast/forecasting', $data, true)]);
    }
}
?>
