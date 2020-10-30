<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatCuti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('M_pegawai');    
        $this->load->model('M_users');
        $this->load->model('M_cuti');

        if (!$this->session->userdata('pegawai_nip')) {
            redirect('auth');
        }
        if ($this->session->userdata('hak_akses') == 'admin') {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('pegawai_nip');


        $data['judul'] = 'Riwayat Cuti Pegawai';

        $data['cuti'] = $this->M_cuti->getCutibyNIP($id);
        

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('user/riwayat_cuti',$data);
        $this->load->view('templates/footer');
    }
}
