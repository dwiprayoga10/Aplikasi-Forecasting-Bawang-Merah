<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('kecamatan_m');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config['base_url'] = site_url('kecamatan/index'); 
        $config['total_rows'] = $this->kecamatan_m->count_all(); 
        $config['per_page'] = 10; 
        $config['uri_segment'] = 3; 
        
        // Styling Pagination
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['row'] = $this->kecamatan_m->get_data_pagination($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();

        $this->template->load('template', 'kecamatan/kecamatan_data', $data);
    }

    public function add()
    {
        $kecamatan = new stdClass();
        $kecamatan->kec_id = null;
        $kecamatan->nama_kecamatan = null;
        $kecamatan->kode_kecamatan = null;
        $kecamatan->description = null;
        $data = array(
            'page' => 'add',
            'row' => $kecamatan
        );
        $this->template->load('template', 'kecamatan/kecamatan_form', $data);
    }

    public function edit($id)
    {
        $query = $this->kecamatan_m->get($id);
        if($query->num_rows() > 0) {
            $kecamatan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $kecamatan
            );
            $this->template->load('template', 'kecamatan/kecamatan_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "window.location='".site_url('kecamatan')."';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])) {
            $this->kecamatan_m->add($post);
        } else if(isset($_POST['edit'])) {
            $this->kecamatan_m->edit($post);
        }

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil disimpan');</script>";
        }
        echo "<script>window.location='".site_url('kecamatan')."';</script>";
    }

    public function del($id)
    {
        $this->kecamatan_m->del($id);
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='".site_url('kecamatan')."';</script>";
    }
}
?>
