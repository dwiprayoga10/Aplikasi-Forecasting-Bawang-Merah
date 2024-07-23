<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecasting_kecamatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('forecasting_kecamatan_m');
    }

    public function index() {
        $data['kecamatan'] = $this->forecasting_kecamatan_m->get_kecamatan();
        $this->load->view('template', ['contents' => $this->load->view('kabupaten/forecasting_kecamatan', $data, true)]);
    }

    public function process() {
        $kecamatan = $this->input->post('kecamatan');

        if (empty($kecamatan)) {
            redirect('forecasting_kecamatan');
        }

        // Ambil data hasil prediksi berdasarkan kecamatan
        $data['hasil_prediksi'] = $this->forecasting_kecamatan_m->get_prediksi_by_kecamatan($kecamatan);
        $data['kecamatan'] = $this->forecasting_kecamatan_m->get_kecamatan();
        $data['selected_kecamatan'] = $kecamatan;

        $this->load->view('template', ['contents' => $this->load->view('kabupaten/forecasting_kecamatan', $data, true)]);
    }
}
?>
