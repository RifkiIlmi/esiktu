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

        $data['pnsUtama']= $this->M_pegawai->pnsUtama();
        $data['pnsMadya']= $this->M_pegawai->pnsMadya();
        $data['pnsUmum']= $this->M_pegawai->pnsUmum();


        $filterTh = $this->input->post('filter');
        
        $tahunFilter = date('Y', strtotime($filterTh));
        
        if ($tahunFilter > 1970) {
            $year = date('Y-m-d', strtotime($filterTh));
            $data['filter'] = $tahunFilter;
            $data['yearNow'] = new Datetime($year);
        }else{
            $data['filter'] =  date("Y");
            $data['yearNow'] = new Datetime();
        }

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('pensiunPegawai/pns_pensiun',$data);
        $this->load->view('templates/footer');
    }
}
