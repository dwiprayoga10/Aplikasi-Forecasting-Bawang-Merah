<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecasting_kecamatan_m extends CI_Model {

    public function get_kecamatan() {
        // Mengambil data kecamatan dari tabel dataset
        $this->db->distinct();
        $this->db->select('kecamatan');
        $query = $this->db->get('dataset');
        return $query->result_array();
    }

    public function get_prediksi_by_kecamatan($kecamatan) {
        // Mengambil data berdasarkan kecamatan
        $this->db->select('tahun, luas_panen, produksi');
        $this->db->from('dataset');
        $this->db->where('kecamatan', $kecamatan);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
