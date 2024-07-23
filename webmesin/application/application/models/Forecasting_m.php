<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecasting_m extends CI_Model {

    public function get_kabupaten() {
        // Mengambil data kecamatan dari tabel dataset
        $this->db->distinct();
        $this->db->select('kabupaten');
        $query = $this->db->get('dataset_kabupaten');
        return $query->result_array();
    }

    public function get_prediksi_by_kabupaten($kabupaten) {
        // Mengambil data berdasarkan kabupaten
        $this->db->select('tahun, luas_panen, produksi');
        $this->db->from('dataset');
        $this->db->where('kabupaten', $kabupaten);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
