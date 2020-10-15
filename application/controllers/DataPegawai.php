<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPegawai extends CI_Controller
{   
    function __construct(){
        parent::__construct();
        $this->load->model('M_pegawai');        
      }
    public function pns()
    {
        $data['judul'] = 'Data PNS RS.Jiwa Tampan';
        $data['pns']= $this->M_pegawai->getpegawai();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/data_pns',$data);
        $this->load->view('templates/footer');

        
    }
    public function tambah_data()
    {
        $data['judul'] = 'Tambah data pegawai';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/tambah_data',$data);
        $this->load->view('templates/footer');
    }
}