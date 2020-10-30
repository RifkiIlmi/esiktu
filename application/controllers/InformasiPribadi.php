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

        $data['judul'] = 'Informasi Pribadi';
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

    public function edit_lengkap_pns($id)
    {
        $id= $this->uri->segment('3');

        $data['judul'] = 'Edit - Informasi Pribadi';

        $data ['selengkapnya_pns'] = $this->M_pegawai->selengkapnya_pns($id);
        $data ['pengalaman_kerja'] = $this->M_pegawai->pengalaman_kerja($id);
        $data ['pendidikan_formal'] = $this->M_pegawai->pendidikan_formal($id);
        $data ['pendidikan_j_t'] = $this->M_pegawai->pendidikan_j_t($id);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('user/edit_lengkap_pns',$data);
        $this->load->view('templates/footer');
    }

    public function input_lengkap_pns()
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
        $no_sk_pangkat = $this->input->post('no_sk_pangkat');
        $id_PNS = $this->input->post('id');
        $pendidikan_formal = $this->input->post('a1');
        $pendidikan_j_t= $this->input->post('b1');
        $pengalaman_kerja = $this->input->post('c1');

        $jumlah = $this->input->post('jumlah');
        $jumlah1 = $this->input->post('jumlah1');
        $jumlah2 = $this->input->post('jumlah2');

        if($pendidikan_formal !== ""){
            if ($jumlah == 1){
                $pendidikan_formal = $this->input->post('a1');

                $input_pendidikan_formal= array(  
                'pendidikan' => $pendidikan_formal,
                'PNS_id_PNS' => $id_PNS,
                );
                $data = $this->M_pegawai->input_pendidikan_formal($input_pendidikan_formal);

            }elseif($jumlah >1){
                for ($a=1; $a<=$jumlah; $a++){
                $c=1;
                $pendidikan_formal = $this->input->post('a'.$a);
                $c++;
                $input_pendidikan_formal= array( 
                'pendidikan' => $pendidikan_formal,
                'PNS_id_PNS' => $id_PNS,
                );
                $data = $this->M_pegawai->input_pendidikan_formal($input_pendidikan_formal);

                }
            
            }
        }

        if($pendidikan_j_t !== ""){
            if ($jumlah1 == 1){
                $pendidikan_j_t= $this->input->post('b1');

                $input_pendidikan_j_t= array(  
                'pelatihan' => $pendidikan_j_t,
                'PNS_id_PNS' => $id_PNS,
                );
                $data = $this->M_pegawai->input_pendidikan_j_t($input_pendidikan_j_t);

            }elseif($jumlah1 >1){
                for ($a=1; $a<=$jumlah1; $a++){
                $c=1;
                $pendidikan_j_t = $this->input->post('b'.$a);
                $c++;
                $input_pendidikan_j_t= array( 
                'pelatihan' => $pendidikan_j_t,
                'PNS_id_PNS' => $id_PNS,
                );
                $data = $this->M_pegawai->input_pendidikan_j_t($input_pendidikan_j_t);

                }
            
            } 
        }
        if( $pengalaman_kerja !== ""){
            if ($jumlah2 == 1){
                $pengalaman_kerja = $this->input->post('c1');

                $input_pengalaman_kerja= array(  
                'pengalaman_kerja' => $pengalaman_kerja,
                'PNS_id_PNS' => $id_PNS,
                );
                $data = $this->M_pegawai->input_pengalaman_kerja($input_pengalaman_kerja);

            }elseif($jumlah2 >1){
                for ($a=1; $a<=$jumlah2; $a++){
                $c=1;
                $pengalaman_kerja = $this->input->post('c'.$a);
                $c++;
                $input_pengalaman_kerja= array( 
                'pengalaman_kerja' => $pengalaman_kerja,
                'PNS_id_PNS' => $id_PNS,
                );
                $data = $this->M_pegawai->input_pengalaman_kerja($input_pengalaman_kerja);

                }
            
            } 
        }
    
        $update_pegawai = array (
            //'id_surat_masuk'=>$id_surat_masuk,
            'nama'=>$nama,
            'NIP' =>$NIP,
            'No_KTP'=>$KTP,
            'profesi'=>$profesi,
            'tempat_lahir'=>$tempat_lahir,
            'tgl_lahir'=>$tgl_lahir,
        );
        $update_pns = array (
            'npwp' => $npwp,
            'tmt_pangkat' => $tmt_pangkat,
            'jabatan' => $jabatan,
            'fk_id_pangkat' => $fk_id_pangkat,
            'fk_id_golongan' => $fk_id_golongan,
            'fk_id_ruang' => $fk_id_ruang,
            'fk_NIP' =>$NIP,
            'no_kerpeg'=>$no_kerpeg,
            
        );  
        // var_dump($update_pns);
        // die;

        $data = $this->M_pegawai->update_pegawai($update_pegawai,$NIP);
        $data = $this->M_pegawai->update_pns($update_pns,$id_PNS);
        redirect('informasiPribadi');
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
        $KTP = $this->input->post('No_KTP');
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
            'No_KTP'=>$KTP,
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
