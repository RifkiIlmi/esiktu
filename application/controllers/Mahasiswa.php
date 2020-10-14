<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';

        $data['nama'] = 'Rifki Ilmi';

        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();

        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }

        $this->load->view('templates/header',$data);
        $this->load->view('mahasiswa/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Mahasiswa';

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nim','nim','required');
        $this->form_validation->set_rules('umur','umur','required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        }else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash','ditambahkan');
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash','dihapus');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';

        $data['nama'] = 'Rifki Ilmi';

        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);

        $this->load->view('templates/header',$data);
        $this->load->view('mahasiswa/detail',$data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Ubah Data Mahasiswa';

        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = $this->Jurusan_model->getAllJurusan();
        $data['kelas'] = $this->Kelas_model->getAllKelas();

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('nim','nim','required');
        $this->form_validation->set_rules('umur','umur','required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('mahasiswa/ubah',$data);
            $this->load->view('templates/footer');
        }else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash','diubah');
            redirect('mahasiswa/detail/'.$id);
        }
    }

}
