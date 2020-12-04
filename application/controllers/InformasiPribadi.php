<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformasiPribadi extends CI_Controller
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
        if ($this->session->userdata('hak_akses') == 'admin') {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('pegawai_nip');

        $data['data_pns'] = $this->M_pegawai->data_pns();

        $data['judul'] = 'Dashboard';
        $cekPns = $this->M_pegawai->cekpns($id);

        if ($cekPns) {
            $data['role'] = 'pns';
            $data['pns'] = $this->M_pegawai->selengkapnya_pns($id);
            $data['pf'] = $this->M_pegawai->pendidikan_formal($id);
            $data['pjt'] = $this->M_pegawai->pendidikan_j_t($id);
            $data['pk'] = $this->M_pegawai->pengalaman_kerja($id);
        }else{
            $data['role'] = 'honorer';
            $data['honorer'] = $this->M_pegawai->selengkapnya_honorer($id);
            $data['spk'] = $this->M_pegawai->data_skp($data['honorer'][0]->id_honorer);
        };

        // var_dump($data['honorer'][0]->id_honorer);
        // die;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('user/informasi_pribadi',$data);
        $this->load->view('templates/footer');
    }


    public function edit_lengkap_honorer($id)
    {
        $id= $this->uri->segment('4');
        $id_honorer= $this->uri->segment('3');

        $data['judul'] = 'Edit Informasi Pribadi';

        $data ['selengkapnya_honorer'] = $this->M_pegawai->selengkapnya_honorer($id);
        $data['pns']= $this->M_pegawai->data_pns();
        $data['skp']= $this->M_pegawai->data_skp($id_honorer);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('user/edit_lengkap_honorer',$data);
        $this->load->view('templates/footer');
    }

    public function input_lengkap_honorer()
    {
        $kepegawaian = $this->input->post('kepegawaian');
        $nama = $this->input->post('nama');
        $NIP = $this->input->post('NIP');
        $profesi = $this->input->post('profesi');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        
        $jenis_ketenagaan = $this->input->post('jenis_ketenagaan');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        $jabatan_honorer = $this->input->post('jabatan_honorer');
        $id_honorer = $this->input->post('id_honorer');

        $update_pegawai = array (
            //'id_surat_masuk'=>$id_surat_masuk,
            'nama'=>$nama,
            'NIP' =>$NIP,
            'profesi'=>$profesi,
            'tempat_lahir'=>$tempat_lahir,
            'tgl_lahir'=>$tgl_lahir,
        );
        $update_honorer = array(
            'jenis_ketenagaan' => $jenis_ketenagaan,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            // 'fk_id_honorer' => $id_honorer,
            'jabatan_honorer'=> $jabatan_honorer,

        );

        // var_dump($update_pegawai);
        // die;
        
        $data = $this->M_pegawai->update_pegawai($update_pegawai,$NIP);
        $data = $this->M_pegawai->update_honorer($update_honorer,$id_honorer);
        redirect('informasiPribadi');
    }

}
