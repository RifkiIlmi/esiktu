<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        if (!$this->session->userdata('pegawai_nip')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Gaji Pegawai PNS';

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('userManagement/index',$data);
        $this->load->view('templates/footer');
    }
}
