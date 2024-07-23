<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk menghitung jumlah pengunjung
    public function count_visitors() {
        return $this->db->count_all('visitors');
    }

    // Fungsi untuk menambahkan kunjungan baru
    public function add_visitor() {
        $data = [
            'ip_address' => $this->input->ip_address(),
            'visit_time' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('visitors', $data);
    }
}
?>
