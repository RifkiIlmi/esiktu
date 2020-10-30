<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataCuti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('M_pegawai');   
        $this->load->model('M_cuti');   
        $this->load->model('M_users');   

        if (!$this->session->userdata('pegawai_nip')) {
            redirect('auth');
        }
    }

    public function cuti_kerja()
    {
        $data['judul'] = 'Pegawai Cuti';

       
        $filterTh = $this->input->post('filter');
        
        $tahunFilter = date('Y', strtotime($filterTh));
        
        if ($tahunFilter > 1970) {
            $data['filter'] = $tahunFilter ;
            $data['cutiPns'] = $this->M_cuti->getCutiPnsFil($filterTh);
            $data['cutiHonorer'] = $this->M_cuti->getCutihonorerFil($filterTh);
        }else{
            $data['filter'] = "";
            $data['filter'] = $tahunFilter ;
            $data['cutiPns'] = $this->M_cuti->getCutiPns();
            $data['cutiHonorer'] = $this->M_cuti->getCutihonorer();
        }
 
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('cutiPegawai/cuti_kerja',$data);
        $this->load->view('templates/footer');
    }

    public function tambahCuti()
    {

        $this->form_validation->set_rules('jenis_cuti', 'Jenis Cuti', 'trim|required');
        $this->form_validation->set_rules('mulai_cuti', 'Mulai Cuti', 'trim|required');
        $this->form_validation->set_rules('akhir_cuti', 'Akhir Cuti', 'trim|required');
        $this->form_validation->set_rules('alasan_cuti', 'Alasan Cuti', 'required');
        $this->form_validation->set_rules('alamat_cuti', 'Alamat Cuti', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah Data Cuti';

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('cutiPegawai/tambah_cuti',$data);
            $this->load->view('templates/footer');
        } else{
            $this->_save();
        }
    }

    private function _save()
    {
        // windows
        // $config['upload_path']          = './public/surat_cuti';
        // linux
        $image_path = realpath(APPPATH . '../public/surat_cuti');
        $config['upload_path']          = $image_path;
        
        $config['allowed_types']        = 'gif|jpg|png';
        
        // $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        // var_dump($image_path);
        // die;
        
        $this->load->library('upload', $config);
        if($this->upload->do_upload("file")){
        $data1 = array('upload_data' => $this->upload->data());
        
        $file= $data1['upload_data']['file_name'];
        

        $tgl_mulai = $this->input->post('mulai_cuti');
        $tgl_akhir = $this->input->post('akhir_cuti');
        

        // cek rentang tangal yang diinputkan
        if ($tgl_mulai >= $tgl_akhir || $tgl_akhir <= $tgl_mulai) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> Rentang Waktu Yang Anda Masukkan Salah!</div>');
            redirect('DataCuti/cuti_kerja');
        } else {
            $data = [
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'alasan_cuti' => $this->input->post('alasan_cuti'),
                'mulai_cuti' => $this->input->post('mulai_cuti'),
                'akhir_cuti' => $this->input->post('akhir_cuti'),
                'alamat_cuti' => $this->input->post('alamat_cuti'),
                'pegawai_NIP' => $this->input->post('NIP'),
                'file'=>$file,

            ];

            $this->M_cuti->createCuti($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Ditambahkan!</div>');

            redirect('DataCuti/cuti_kerja');
        }
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_pegawai->search_pegawai($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->nama,
                        'nip' => $row->NIP,
                 );
                    echo json_encode($arr_result);
            }
        }
    }
}

    public function update_cuti()
    {
        $config['upload_path']          = './public/surat_cuti';
        $config['allowed_types']        = 'gif|jpg|png';

        // $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
    
        $this->load->library('upload', $config);
        if($this->upload->do_upload("file")){
        $data1 = array('upload_data' => $this->upload->data());
        
        $file= $data1['upload_data']['file_name'];
        

        $tgl_mulai = $this->input->post('mulai_cuti');
        $tgl_akhir = $this->input->post('akhir_cuti');
        $id_cuti = $this->input->post('id_cuti');

        // cek rentang tangal yang diinputkan
        if ($tgl_mulai >= $tgl_akhir || $tgl_akhir <= $tgl_mulai) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> Rentang Waktu Yang Anda Masukkan Salah!</div>');
            redirect('DataCuti/tambahCuti');
        } else {
            $data = [
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'alasan_cuti' => $this->input->post('alasan_cuti'),
                'mulai_cuti' => $this->input->post('mulai_cuti'),
                'akhir_cuti' => $this->input->post('akhir_cuti'),
                'alamat_cuti' => $this->input->post('alamat_cuti'),
                'pegawai_NIP' => $this->input->post('NIP'),
                'file'=>$file,
            ];

            $this->M_cuti->update_cuti($data,$id_cuti);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Ditambahkan!</div>');
            redirect('DataCuti/edit_cuti/'.$id_cuti);
        }
        }else{

        $tgl_mulai = $this->input->post('mulai_cuti');
        $tgl_akhir = $this->input->post('akhir_cuti');
        $id_cuti = $this->input->post('id_cuti');

        // cek rentang tangal yang diinputkan
        if ($tgl_mulai >= $tgl_akhir || $tgl_akhir <= $tgl_mulai) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> Rentang Waktu Yang Anda Masukkan Salah!</div>');
            redirect('DataCuti/tambahCuti');
        } else {
            $data = [
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'alasan_cuti' => $this->input->post('alasan_cuti'),
                'mulai_cuti' => $this->input->post('mulai_cuti'),
                'akhir_cuti' => $this->input->post('akhir_cuti'),
                'alamat_cuti' => $this->input->post('alamat_cuti'),
                'pegawai_NIP' => $this->input->post('NIP'),

            ];

            $this->M_cuti->update_cuti($data,$id_cuti);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Ditambahkan!</div>');
            redirect('DataCuti/edit_cuti/'.$id_cuti);
        }
        }
    }
    public function update_cuti_honorer()
    {
        $config['upload_path']          = './public/surat_cuti';
        $config['allowed_types']        = 'gif|jpg|png';

        // $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
    
        $this->load->library('upload', $config);
        if($this->upload->do_upload("file")){
        $data1 = array('upload_data' => $this->upload->data());
        
        $file= $data1['upload_data']['file_name'];
        

        $tgl_mulai = $this->input->post('mulai_cuti');
        $tgl_akhir = $this->input->post('akhir_cuti');
        $id_cuti = $this->input->post('id_cuti');

        // cek rentang tangal yang diinputkan
        if ($tgl_mulai >= $tgl_akhir || $tgl_akhir <= $tgl_mulai) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> Rentang Waktu Yang Anda Masukkan Salah!</div>');
            redirect('DataCuti/tambahCuti');
        } else {
            $data = [
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'alasan_cuti' => $this->input->post('alasan_cuti'),
                'mulai_cuti' => $this->input->post('mulai_cuti'),
                'akhir_cuti' => $this->input->post('akhir_cuti'),
                'alamat_cuti' => $this->input->post('alamat_cuti'),
                'pegawai_NIP' => $this->input->post('NIP'),
                'file'=>$file,
            ];

            $this->M_cuti->update_cuti($data,$id_cuti);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Ditambahkan!</div>');
            redirect('DataCuti/edit_cuti_honorer/'.$id_cuti);
        }
        }else{

        $tgl_mulai = $this->input->post('mulai_cuti');
        $tgl_akhir = $this->input->post('akhir_cuti');
        $id_cuti = $this->input->post('id_cuti');

        // cek rentang tangal yang diinputkan
        if ($tgl_mulai >= $tgl_akhir || $tgl_akhir <= $tgl_mulai) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-ban"></i> MAAF!</h5> Rentang Waktu Yang Anda Masukkan Salah!</div>');
            redirect('DataCuti/tambahCuti');
        } else {
            $data = [
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'alasan_cuti' => $this->input->post('alasan_cuti'),
                'mulai_cuti' => $this->input->post('mulai_cuti'),
                'akhir_cuti' => $this->input->post('akhir_cuti'),
                'alamat_cuti' => $this->input->post('alamat_cuti'),
                'pegawai_NIP' => $this->input->post('NIP'),

            ];

            $this->M_cuti->update_cuti($data,$id_cuti);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> Sukses!</h5> Data Berhasil Ditambahkan!</div>');
            redirect('DataCuti/edit_cuti_honorer/'.$id_cuti);
        }
        }
    }
    

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_pegawai->search_pegawai($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->nama,
                        'nip' => $row->NIP,
                 );
                    echo json_encode($arr_result);
            }
        }
    }
    public function edit_cuti()
    {
        $id = $this->uri->segment(3);
        $data ['data_cuti'] = $this->M_cuti->getCutiPnsWhere($id);
      
        $data['judul'] = 'Tambah Data Cuti';

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('cutiPegawai/edit_cuti',$data);
        $this->load->view('templates/footer');
   }
   public function edit_cuti_honorer()
    {
        $id = $this->uri->segment(3);
        $data ['data_cuti'] = $this->M_cuti->getCutiHonorerWhere($id);
      
        $data['judul'] = 'Tambah Data Cuti';

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('cutiPegawai/edit_cuti_honorer',$data);
        $this->load->view('templates/footer');
   }
   public function delete_cuti()
   {
       $id= $this->uri->segment('3');
           // var_dump($id);
       $data = $this->M_cuti->delete_cuti($id);
     
    }
    public function print_cuti_pns()
    {
        $data['judul'] = 'Pegawai Cuti';
        $filterTh= $this->uri->segment('3');
     
        
        $tahunFilter = date('Y', strtotime($filterTh));
        
        if ($tahunFilter > 1970) {
            $data['filter'] = $tahunFilter ;
            $data['cutiPns'] = $this->M_cuti->getCutiPnsFil($filterTh);
            $data['cutiHonorer'] = $this->M_cuti->getCutihonorerFil($filterTh);
        }else{
            $data['filter'] = "";
            $data['filter'] = $tahunFilter ;
            $data['cutiPns'] = $this->M_cuti->getCutiPns();
            $data['cutiHonorer'] = $this->M_cuti->getCutihonorer();
        }

        $this->load->view('cutiPegawai/print_cuti_pns',$data);
    }
    public function print_cuti_honorer()
    {
        $data['judul'] = 'Pegawai Cuti';
        $filterTh= $this->uri->segment('3');
     
        
        $tahunFilter = date('Y', strtotime($filterTh));
        
        if ($tahunFilter > 1970) {
            $data['filter'] = $tahunFilter ;
            $data['cutiPns'] = $this->M_cuti->getCutiPnsFil($filterTh);
            $data['cutiHonorer'] = $this->M_cuti->getCutihonorerFil($filterTh);
        }else{
            $data['filter'] = "";
            $data['filter'] = $tahunFilter ;
            $data['cutiPns'] = $this->M_cuti->getCutiPns();
            $data['cutiHonorer'] = $this->M_cuti->getCutihonorer();
        }

        $this->load->view('cutiPegawai/print_cuti_honorer',$data);
    }
 
}

