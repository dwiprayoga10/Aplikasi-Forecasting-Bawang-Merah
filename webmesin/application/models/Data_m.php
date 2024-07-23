<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_m extends CI_Model {

    // Fetch a single or multiple rows from the 'dataset' table
    public function get($id = null) {
        $this->db->from('dataset');
        if ($id != null) {
            $this->db->where('dataactual_id', $id);
        }
        return $this->db->get();
    }

    // Add a new record to the 'dataset' table
    public function add($post) {
        $params = [
            'tahun' => $post['tahun'],
            'kecamatan' => $post['kecamatan'],
            'luas_panen' => $post['luas_panen'],
            'produksi' => $post['produksi']
        ];
        $this->db->insert('dataset', $params);
    }

    // Update an existing record in the 'dataset' table
    public function edit($post) {
        $params = [
            'tahun' => $post['tahun'],
            'kecamatan' => $post['kecamatan'],
            'luas_panen' => $post['luas_panen'],
            'produksi' => $post['produksi']
        ];
        $this->db->where('dataactual_id', $post['dataactual_id']);
        $this->db->update('dataset', $params);
    }

    // Delete a record from the 'dataset' table
    public function del($id) {
        $this->db->where('dataactual_id', $id);
        $this->db->delete('dataset');
    }

    // Retrieve filtered data with optional year and search keyword
    public function get_filtered_data($filter_tahun = null, $search = null) {
        $this->db->from('dataset');
        if ($filter_tahun) {
            $this->db->where('tahun', $filter_tahun);
        }
        if ($search) {
            $this->db->like('kecamatan', $search);
            $this->db->or_like('produksi', $search);
        }
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get();
    }

    // Retrieve filtered data with pagination
    public function get_filtered_data_pagination($filter_tahun, $search, $limit, $start) {
        $this->db->from('dataset');
        if ($filter_tahun) {
            $this->db->where('tahun', $filter_tahun);
        }
        if ($search) {
            $this->db->like('kecamatan', $search);
            $this->db->or_like('produksi', $search);
        }
        $this->db->order_by('tahun', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    // Count all records in the 'dataset' table
    public function count_all() {
        return $this->db->count_all('dataset');
    }
    
    // Retrieve all data with totals by year
    public function get_all_data() {
        $this->db->select('tahun, SUM(luas_panen) as total_luas_panen, SUM(produksi) as total_produksi');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('data_produksi')->result_array();
    }
}
?>
