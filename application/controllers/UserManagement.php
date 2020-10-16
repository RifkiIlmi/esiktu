<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller
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

    public function index()
    {
        $data['judul'] = 'User Management';
        $data['pegawai']= $this->M_pegawai->getAllpegawai();
        $data['users']= $this->M_users->getAllUser();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('userManagement/index',$data);
        $this->load->view('templates/footer');
    }

    public function detail()
    {
        $id = $this->uri->segment('3');
        
        $data['judul'] = 'User Management - Detail';
        
        $cek = $this->M_pegawai->cekPns($id);

        
        if ($cek == true) {
            $data['details']= $this->M_pegawai->getPnsByID($id)->row_array();
        }else{
            $data['details']= $this->M_pegawai->getHonorerByID($id)->row_array();
        }

        // var_dump($data['details']);
        // die;
        
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('userManagement/detail',$data);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $id = $this->uri->segment('3');
        $akses = $this->input->post('hak_akses');

        $data = [
            'username' => $id,
            'password' => $id,
            'hak_akses' => $akses,
            'pegawai_nip' => $id,
            'status' => 1
        ];
        // var_dump($data);

        // die;
        $this->M_pegawai->aktivasiPegawaiAkun($id);
        $this->M_users->createUser($data);
        redirect('UserManagement/index');
    }

    public function nonaktifkan()
    {
        $id = $this->uri->segment('3');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menonaktifkan Pegawai</div>');
        $this->M_users->nonaktif($id);
        redirect('UserManagement/index');
    }

    public function aktifkan()
    {
        $id = $this->uri->segment('3');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengaktifkan Pegawai</div>');
        $this->M_users->aktifkan($id);
        redirect('UserManagement/index');
    }

    public function delete()
    {
        $id = $this->uri->segment('3');

        $this->M_pegawai->nonaktifPegawaiAkun($id);
        $this->M_users->deleteUser($id);
        redirect('UserManagement/index');
    }
}
