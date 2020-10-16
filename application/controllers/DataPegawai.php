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
        $data['pns']= $this->M_pegawai->data_pns();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/data_pns',$data);
        $this->load->view('templates/footer');

        
    }
    public function honorer()
    {
        $data['judul'] = 'Data PNS RS.Jiwa Tampan';
        $data['honorer']= $this->M_pegawai->data_honorer();
        $data['pns']= $this->M_pegawai->data_pns();
        // var_dump($data['honorer']);
        // die;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/data_honorer',$data);
        $this->load->view('templates/footer');
    }
    public function tambah_data()
    {
        $data['judul'] = 'Tambah data pegawai';
        $data['golongan']= $this->M_pegawai->get_golongan();
        $data['pangkat']= $this->M_pegawai->get_pangkat();
        $data['ruang']= $this->M_pegawai->get_ruang();
        $data['pns']= $this->M_pegawai->get_pns();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/tambah_data',$data);
        $this->load->view('templates/footer');
    }
    public function selengkapnya($id)
    {
        $id= $this->uri->segment('3');
        
            // var_dump($id);
        $data ['selengkapnya_pns'] = $this->M_pegawai->selengkapnya_pns($id);
        $data ['pengalaman_kerja'] = $this->M_pegawai->pengalaman_kerja($id);
        $data ['pendidikan_formal'] = $this->M_pegawai->pendidikan_formal($id);
        $data ['pendidikan_j_t'] = $this->M_pegawai->pendidikan_j_t($id);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/pns_lengkap',$data);
        $this->load->view('templates/footer');
    }
    public function input_pegawai()
    {   
        $kepegawaian = $this->input->post('kepegawaian');
        $nama = $this->input->post('nama');
        $NIP = $this->input->post('NIP');
        $KTP = $this->input->post('No_KTP');
        $profesi = $this->input->post('profesi');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        
        $npwp = $this->input->post('npwp');
        $tmt_pangkat= $this->input->post('tmt_pangkat');
        $tgl_sk_pangkat = $this->input->post('tgl_sk_pangkat');
        $jabatan = $this->input->post('jabatan');
        $fk_id_pangkat = $this->input->post('pangkat');
        $fk_id_golongan = $this->input->post('golongan');
        $fk_id_ruang = $this->input->post('ruang');
        $no_kerpeg = $this->input->post('no_kerpeg');
        
        $jenis_ketenagaan = $this->input->post('jenis_ketenagaan');
        $mengangkat = $this->input->post('mengangkat');
        
		$tambah_pegawai = array (
            //'id_surat_masuk'=>$id_surat_masuk,
            'nama'=>$nama,
            'NIP' =>$NIP,
            'No_KTP'=>$KTP,
            'profesi'=>$profesi,
            'tempat_lahir'=>$tempat_lahir,
            'tgl_lahir'=>$tgl_lahir,
        );
        $tambah_pns = array (
            'npwp' => $npwp,
            'tmt_pangkat' => $tmt_pangkat,
            'tgl_sk_pangkat' => $tgl_lahir,
            'jabatan' => $jabatan,
            'fk_id_pangkat' => $fk_id_pangkat,
            'fk_id_golongan' => $fk_id_golongan,
            'fk_id_ruang' => $fk_id_ruang,
            'fk_NIP' =>$NIP,
            'no_kerpeg'=>$no_kerpeg,
            
        );
        $tambah_honorer = array(
            'jenis_ketenagaan' => $jenis_ketenagaan,
            'fk_id_PNS' => $mengangkat,
            'pegawai_NIP' => $NIP,
        );

        if ($kepegawaian == 'PNS') {
            $data = $this->M_pegawai->input_pegawai($tambah_pegawai);
            $data = $this->M_pegawai->input_pns($tambah_pns);
            redirect('DataPegawai/pns');
        }else {
            $data = $this->M_pegawai->input_pegawai($tambah_pegawai);
            $data = $this->M_pegawai->input_honorer($tambah_honorer);
            redirect('DataPegawai/honorer');
            
        }
        
        
    }
    public function delete_pns()
    {
        $id= $this->uri->segment('3');
            // var_dump($id);
        $data = $this->M_pegawai->delete_pns($id);
        redirect('DataPegawai/pns');
    }

}
