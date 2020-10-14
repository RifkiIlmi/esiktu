<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Home';

        $data['nama'] = 'Rifki Ilmi';

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('home/index',$data);
        $this->load->view('templates/footer');
    }
}
