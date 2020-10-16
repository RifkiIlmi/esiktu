<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataGaji extends CI_Controller
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
    }

    public function gaji_pns()
    {
        $filterTh = $this->input->post('filter'); 
        $data['judul'] = 'Gaji Pegawai PNS'; 
        $data['pns'] = $this->M_pegawai->getPegawai();

        $tahunFilter = date('Y', strtotime($filterTh));

        // var_dump($tahunFilter);
        // die;

        if ($tahunFilter > 1970) {
            $data['filter'] = $tahunFilter ;
        }else{
            $data['filter'] =  date("Y");
        }

        // var_dump($data['pns']);
        // die;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('gaji_pegawai/gaji_pns',$data);
        $this->load->view('templates/footer');
    }
}
