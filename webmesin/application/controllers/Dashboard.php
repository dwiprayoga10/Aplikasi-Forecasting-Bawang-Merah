<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model('Grafik_m'); // Menggunakan model Grafik_m
        $this->load->model('User_m');
        $this->load->model('Visitor_m');
        
        // Tambahkan data pengunjung setiap kali halaman diakses
        $this->Visitor_m->add_visitor();
    }

    public function index() {
        check_not_login();

        $total_kecamatan = $this->db->count_all('kecamatan');
        $total_users = $this->User_m->count_all();
        $total_data_aktual = $this->Grafik_m->count_all(); // Menggunakan model Grafik_m

        // Ambil data grafik dari tahun 2018 sampai 2024
        $data_grafik = [];
        for ($tahun = 2018; $tahun <= 2024; $tahun++) {
            $data_per_tahun = $this->Grafik_m->get_filtered_data($tahun)->result_array(); // Menggunakan model Grafik_m
            $data_grafik = array_merge($data_grafik, $data_per_tahun);
        }

        // Hitung jumlah pengunjung
        $total_visitors = $this->Visitor_m->count_visitors();

        // Memastikan bahwa data_grafik memiliki key 'tahun', 'luas_panen', dan 'produksi'
        foreach ($data_grafik as $index => $item) {
            if (!isset($item['tahun'])) $data_grafik[$index]['tahun'] = 'Tidak tersedia';
            if (!isset($item['luas_panen'])) $data_grafik[$index]['luas_panen'] = 0;
            if (!isset($item['produksi'])) $data_grafik[$index]['produksi'] = 0;
        }

        $data = [
            'total_kecamatan' => $total_kecamatan,
            'total_users' => $total_users,
            'total_data_aktual' => $total_data_aktual,
            'data_grafik' => $data_grafik,
            'total_visitors' => $total_visitors
        ];

        $this->template->load('template', 'dashboard', $data);
    }
}
?>
