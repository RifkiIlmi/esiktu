<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPensiun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('M_pegawai');    


        if (!$this->session->userdata('pegawai_nip')) {
            redirect('auth');
        }
    }

    public function pns_pensiun()
    {
        $data['judul'] = 'Pegawai Pensiun';
        $data['pns']= $this->M_pegawai->data_pns();

        $filterTh = $this->input->post('filter');
        
        $tahunFilter = date('Y', strtotime($filterTh));
        
        if ($tahunFilter > 1970) {
            $data['filter'] = $tahunFilter ;
        }else{
            $data['filter'] =  date("Y");
        }

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('pensiunPegawai/pns_pensiun',$data);
        $this->load->view('templates/footer');
    }
}
