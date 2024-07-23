<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model('data_m');
        $this->load->library('pagination');
    }

    public function index() {
        $filter_tahun = $this->input->get('filter_tahun');
        $search = $this->input->get('search');

        $config['base_url'] = site_url('data/index'); 
        if ($filter_tahun) {
            $config['base_url'] .= '?filter_tahun=' . urlencode($filter_tahun);
        }
        if ($search) {
            $config['base_url'] .= '&search=' . urlencode($search);
        }

        $config['total_rows'] = $this->data_m->get_filtered_data($filter_tahun, $search)->num_rows(); 
        $config['per_page'] = 17; 
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
        $data['row'] = $this->data_m->get_filtered_data_pagination($filter_tahun, $search, $config['per_page'], $page);
        $data['filter_tahun'] = $filter_tahun;
        $data['search'] = $search;
        $data['pagination'] = $this->pagination->create_links();
        
        $this->template->load('template', 'dataset/actual_data', $data);
    }

    public function add() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('luas_panen', 'Luas Panen', 'required');
        $this->form_validation->set_rules('produksi', 'Produksi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['page'] = 'add';
            $this->template->load('template', 'dataset/actual_form', $data);
        } else {
            $post = $this->input->post();
            $this->data_m->add($post);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('data');
        }
    }

    public function edit($id) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('luas_panen', 'Luas Panen', 'required');
        $this->form_validation->set_rules('produksi', 'Produksi', 'required');

        $data['row'] = $this->data_m->get($id)->row();
        $data['page'] = 'edit';

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('template', 'dataset/actual_form', $data);
        } else {
            $post = $this->input->post();
            $this->data_m->edit($post);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui');
            redirect('data');
        }
    }

    public function process() {
        $post = $this->input->post();
        if (isset($post['edit']) && $post['edit'] == 1) {
            // Process update data
            $this->data_m->edit($post);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui');
        } else {
            // Process add data
            $this->data_m->add($post);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        }
        redirect('data');
    }

    public function delete($id) {
        if ($id) {
            $this->data_m->del($id);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('data');
    }
}
?>
