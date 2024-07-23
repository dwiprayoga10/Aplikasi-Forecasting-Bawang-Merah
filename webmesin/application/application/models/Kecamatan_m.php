<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('kecamatan');
        if($id != null) {
            $this->db->where('kec_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_kecamatan' => $post['nama_kecamatan'],
            'kode_kecamatan' => $post['kode_kecamatan'],
            'description' => empty($post['desc']) ? null : $post['desc'],
        ];
        $this->db->insert('kecamatan', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_kecamatan' => $post['nama_kecamatan'],
            'kode_kecamatan' => $post['kode_kecamatan'],
            'description' => empty($post['desc']) ? null : $post['desc'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('kec_id', $post['id']);
        $this->db->update('kecamatan', $params);
    }

    public function del($id)
    {
        $this->db->where('kec_id', $id);
        $this->db->delete('kecamatan');
    }

    public function get_data_pagination($limit, $start)
    {
        $this->db->limit($limit, $start);
        return $this->db->get('kecamatan');
    }

    public function count_all()
    {
        return $this->db->count_all('kecamatan');
    }
}
?>
