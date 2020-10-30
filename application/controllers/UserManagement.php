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
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Pegawai Berhasil Didaftarkan!</div>');
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

    public function edit()
    {
        $id = $this->uri->segment('3');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Di Update!</div>');

        $data = $this->M_users->update_user($data,$id);
        redirect('UserManagement');
    }

    public function delete()
    {
        $id = $this->uri->segment('3');

        $this->M_pegawai->nonaktifPegawaiAkun($id);
        $this->M_users->deleteUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-stop"></i> Alert!</h5> Data Berhasil Dihapus!</div>');
        redirect('UserManagement/index');
    }
}
