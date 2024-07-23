<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_m extends CI_Model {

    // Ambil data berdasarkan tahun
    public function get_filtered_data($tahun) {
        $this->db->select('tahun, luas_panen, produksi');
        $this->db->from('data_produksi');
        $this->db->where('tahun', $tahun);
        $query = $this->db->get();
        return $query;
    }

    // Ambil semua data
    public function get_all_data() {
        $this->db->select('tahun, luas_panen, produksi');
        $this->db->from('data_produksi');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Hitung semua data
    public function count_all() {
        return $this->db->count_all('data_produksi');
    }
}
?>
