<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataGaji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));

        if (!$this->session->userdata('pegawai_nip')) {
            redirect('auth');
        }
    }

    public function gaji_pns()
    {
        $data['judul'] = 'Gaji Pegawai PNS';

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('gaji_pegawai/gaji_pns',$data);
        $this->load->view('templates/footer');
    }
}
