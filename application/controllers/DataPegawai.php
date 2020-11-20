<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPegawai extends CI_Controller
{   
    function __construct(){
        parent::__construct();
        $this->load->model('M_pegawai');    
        $this->load->helper(array('form', 'url'));

        if (!$this->session->userdata('pegawai_nip')) {
            redirect('auth');
        }    
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

    public function pangkat()
    {
        $data['judul'] = 'Kenaikan Pangkat PNS';
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
        $this->load->view('DataPegawai/k_pangkat',$data);
        $this->load->view('templates/footer');
    }

    public function updatePangkat()
    {
        $pangkat = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $actualPangkat = 0;
        $golongan = 0;
        $ruang = 0;

        if ($pangkat=='ia') {
            $actualPangkat = 17;
            $golongan = 1;
            $ruang = 1;
        } elseif($pangkat=='ib') {
            $actualPangkat = 16;
            $golongan = 1;
            $ruang = 2;
        } elseif($pangkat=='ic') {
            $actualPangkat = 15;
            $golongan = 1;
            $ruang = 3;
        } elseif($pangkat=='id') {
            $actualPangkat = 14;
            $golongan = 1;
            $ruang = 4;
        } elseif($pangkat=='iia') {
            $actualPangkat = 13;
            $golongan = 2;
            $ruang = 1;
        } elseif($pangkat=='iib') {
            $actualPangkat = 12;
            $golongan = 2;
            $ruang = 2;
        } elseif($pangkat=='iic') {
            $actualPangkat = 11;
            $golongan = 2;
            $ruang = 3;
        } elseif($pangkat=='iid') {
            $actualPangkat = 10;
            $golongan = 2;
            $ruang = 4;
        } elseif($pangkat=='iiia') {
            $actualPangkat = 9;
            $golongan = 3;
            $ruang = 1;
        } elseif($pangkat=='iiib') {
            $actualPangkat = 8;
            $golongan = 3;
            $ruang = 2;
        } elseif($pangkat=='iiic') {
            $actualPangkat = 7;
            $golongan = 3;
            $ruang = 3;
        } elseif($pangkat=='iiid') {
            $actualPangkat = 6;
            $golongan = 3;
            $ruang = 4;
        } elseif($pangkat=='iva') {
            $actualPangkat = 5;
            $golongan = 4;
            $ruang = 1;
        } elseif($pangkat=='ivb') {
            $actualPangkat = 4;
            $golongan = 4;
            $ruang = 2;
        } elseif($pangkat=='ivc') {
            $actualPangkat = 3;
            $golongan = 4;
            $ruang = 3;
        }
        
        // echo $actualPangkat." ".$id." ".$golongan." ".$ruang;
        // die;
        $this->M_pegawai->updatePangkat($id,$actualPangkat,$golongan,$ruang);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pegawai Naik Pangkat!</div>');
        redirect('DataPegawai/pangkat');
    }

    public function satia_lencana()
    {
        $data['judul'] = 'Satia Lencana';
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
        $this->load->view('DataPegawai/satia_lencana',$data);
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
        $data['judul'] = 'Detail PNS';
        $id= $this->uri->segment('3');

        $data ['selengkapnya_pns'] = $this->M_pegawai->selengkapnya_pns($id);
        $data ['pengalaman_kerja'] = $this->M_pegawai->pengalaman_kerja($id);
        $data ['pendidikan_formal'] = $this->M_pegawai->pendidikan_formal($id);
        $data ['pendidikan_j_t'] = $this->M_pegawai->pendidikan_j_t($id);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/pns_lengkap',$data);
        $this->load->view('templates/footer');
    }

    public function selengkapnya_honorer($id)
    {
        $data['judul'] = 'Detail Honorer';
        $id= $this->uri->segment('4');
        $id_honorer= $this->uri->segment('3');
        $data ['selengkapnya_honorer'] = $this->M_pegawai->selengkapnya_honorer($id);
        $data['pns']= $this->M_pegawai->data_pns();
        $data['skp']= $this->M_pegawai->data_skp($id_honorer);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/honorer_lengkap',$data);
        $this->load->view('templates/footer');
    }
    
    public function edit_lengkap_honorer($id)
    {
        $data['judul'] = 'Edit Honorer';
        $id= $this->uri->segment('4');
        $id_honorer= $this->uri->segment('3');

        $data ['selengkapnya_honorer'] = $this->M_pegawai->selengkapnya_honorer($id);
        $data['pns']= $this->M_pegawai->data_pns();
        $data['skp']= $this->M_pegawai->data_skp($id_honorer);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/edit_lengkap_honorer',$data);
        $this->load->view('templates/footer');
    }

    public function edit_lengkap_pns($id)
    {
        $data['judul'] = 'Edit PNS';
        $id= $this->uri->segment('3');

        $data ['selengkapnya_pns'] = $this->M_pegawai->selengkapnya_pns($id);
        $data ['pengalaman_kerja'] = $this->M_pegawai->pengalaman_kerja($id);
        $data ['pendidikan_formal'] = $this->M_pegawai->pendidikan_formal($id);
        $data ['pendidikan_j_t'] = $this->M_pegawai->pendidikan_j_t($id);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('DataPegawai/edit_lengkap_pns',$data);
        $this->load->view('templates/footer');
    }

    public function input_pegawai()
    {   
        $kepegawaian = $this->input->post('kepegawaian');
        $nama = $this->input->post('nama');
        $NIP = $this->input->post('NIP');
        $profesi = $this->input->post('profesi');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        
        $npwp = $this->input->post('npwp');
        $tmt_pangkat= $this->input->post('tmt_pangkat');
        $no_sk_pangkat = $this->input->post('no_sk_pangkat');
        $tgl_sk_pangkat = $this->input->post('tgl_sk_pangkat');
        $jabatan_pns = $this->input->post('jabatan_pns');
        $fk_id_pangkat = $this->input->post('pangkat');
        $fk_id_golongan = $this->input->post('golongan');
        $fk_id_ruang = $this->input->post('ruang');
        $no_kerpeg = $this->input->post('no_kerpeg');
        
        $jenis_ketenagaan = $this->input->post('jenis_ketenagaan');
        $mengangkat = $this->input->post('mengangkat');
        $no_skp =$this->input->post('no_skp');
        $tgl_skp=$this->input->post('tgl_skp');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        
		$tambah_pegawai = array (
            //'id_surat_masuk'=>$id_surat_masuk,
            'nama'=>$nama,
            'NIP' =>$NIP,
            'profesi'=>$profesi,
            'tempat_lahir'=>$tempat_lahir,
            'tgl_lahir'=>$tgl_lahir,
        );
        $tambah_pns = array (
            'npwp' => $npwp,
            'tmt_pangkat' => $tmt_pangkat,
            'no_sk_pangkat' => $no_sk_pangkat,
            'tgl_sk_pangkat' => $tgl_sk_pangkat,
            'jabatan' => $jabatan_pns,
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
            'pendidikan_terakhir' =>$pendidikan_terakhir,
           
        );


        if ($kepegawaian == 'PNS') {
            $data = $this->M_pegawai->input_pegawai($tambah_pegawai);
            $data = $this->M_pegawai->input_pns($tambah_pns);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Di Tambahkan!</div>');
            redirect('DataPegawai/pns');
        }else {
            $data = $this->M_pegawai->input_pegawai($tambah_pegawai);
            $data = $this->M_pegawai->input_honorer($tambah_honorer);
            
            $id_honorer = $this->db->insert_id();
            
            $tambah_skp = array(
                'fk_id_honorer' =>$id_honorer,
                'no_skp'=>$no_skp,
                'tgl_skp'=>$tgl_skp,
            );

            $data = $this->M_pegawai->input_skp($tambah_skp);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Di Tambahkan!</div>');
            redirect('DataPegawai/honorer');
            
        }
        
        
    }

    public function delete_pns()
    {
        $id= $this->uri->segment('3');
            // var_dump($id);
        $data = $this->M_pegawai->delete_pns($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data PNS Berhasil Di Hapus!</div>');
        redirect('DataPegawai/pns');
    }
    public function delete_honorer()
    {
        $id= $this->uri->segment('3');
            // var_dump($id);
        $data = $this->M_pegawai->delete_honorer($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Honorer Berhasil Di Hapus!</div>');
        redirect('DataPegawai/honorer');
    }
    public function input_lengkap()
    {
        $kepegawaian = $this->input->post('kepegawaian');
        $nama = $this->input->post('nama');
        $NIP = $this->input->post('NIP');
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
        
        // var_dump($pendidikan_formal);
        // die;

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

            }elseif($jumlah1 >1){
                for ($a=1; $a<=$jumlah1; $a++){
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
            'profesi'=>$profesi,
            'tempat_lahir'=>$tempat_lahir,
            'tgl_lahir'=>$tgl_lahir,
        );
        $update_pns = array (
            'npwp' => $npwp,
            'tmt_pangkat' => $tmt_pangkat,
            'tgl_sk_pangkat' => $tgl_lahir,
            'jabatan' => $jabatan,
            'fk_id_pangkat' => $fk_id_pangkat,
            'fk_id_golongan' => $fk_id_golongan,
            'fk_id_ruang' => $fk_id_ruang,
            'fk_NIP' =>$NIP,
            'no_kerpeg'=>$no_kerpeg,
            'no_sk_pangkat'=>$no_sk_pangkat,
            
        );  
        $data = $this->M_pegawai->update_pegawai($update_pegawai,$NIP);
        $data = $this->M_pegawai->update_pns($update_pns,$id_PNS);
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data PNS Berhasil Di Update!</div>');
        redirect('DataPegawai/selengkapnya/'.$NIP);
    }
    public function input_lengkap_honorer()
    {
        $kepegawaian = $this->input->post('kepegawaian');
        $nama = $this->input->post('nama');
        $NIP = $this->input->post('NIP');
        $profesi = $this->input->post('profesi');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tanggal_lahir');
        
        $jenis_ketenagaan = $this->input->post('jenis_ketenagaan');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        $id_honorer = $this->input->post('id_honorer');

        $no_sk = $this->input->post('no_sk');
        $tgl_sk = $this->input->post('tgl_sk');
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
            // 'fk_id_honorer' => $id_honorer,
            'pendidikan_terakhir'=> $pendidikan_terakhir,
        );
        $input_skp = array(
            'no_skp' => $no_sk,
            'tgl_skp'=> $tgl_sk,
            'fk_id_honorer' => $id_honorer,
        );
        if($no_sk == "" && $tgl_sk == ""){
            $data = $this->M_pegawai->update_pegawai($update_pegawai,$NIP);
            $data = $this->M_pegawai->update_honorer($update_honorer,$id_honorer);
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Honorer Berhasil Di Update!</div>');
            redirect('DataPegawai/selengkapnya_honorer/'.$id_honorer.'/'.$NIP);    
        }else{
            $data = $this->M_pegawai->input_skp($input_skp);
            $data = $this->M_pegawai->update_pegawai($update_pegawai,$NIP);
            $data = $this->M_pegawai->update_honorer($update_honorer,$id_honorer);
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Honorer Berhasil Di Update!</div>');
            redirect('DataPegawai/selengkapnya_honorer/'.$id_honorer.'/'.$NIP);
        }
        
    }
    public function print_pns()
    {
        $data['judul'] = 'Data PNS RS.Jiwa Tampan';
        $data['pns']= $this->M_pegawai->data_pns();
        $data ['pengalaman_kerja'] = $this->M_pegawai->pengalaman_kerja_noid();
        $data ['pendidikan_formal'] = $this->M_pegawai->pendidikan_formal_noid();
        $data ['pendidikan_j_t'] = $this->M_pegawai->pendidikan_j_t_noid();
        
        $this->load->view('DataPegawai/print_pns',$data);
      
        
    }
    public function print_honorer()
    {
        $data['judul'] = 'Data Honorer RS.Jiwa Tampan';
        $data['honorer']= $this->M_pegawai->data_honorer();
        $data['pns']= $this->M_pegawai->data_pns();
        $data['skp']= $this->M_pegawai->data_skp_noid();
        $this->load->view('DataPegawai/print_honorer',$data);
      
        
    }
    



}
