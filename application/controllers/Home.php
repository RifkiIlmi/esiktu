<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('M_pegawai');    
        $this->load->model('M_users');    

        if (!$this->session->userdata('pegawai_nip')) {
            redirect('auth');
        }
        if ($this->session->userdata('hak_akses') == 'pegawai') {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('home/index',$data);
        $this->load->view('templates/footer');
    }
}
