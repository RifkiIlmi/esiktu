<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('model_surat', '', TRUE);
        // $this->load->model('model_tim', '', TRUE);
        $this->load->model('M_users', '', TRUE);
        $this->load->helper(array('form', 'url','Cookie', 'String'));
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
             // ambil cookie
            $cookie = get_cookie('remember');

            if ($this->session->userdata('logged') == 'aktif') {
                redirect('Home');
            } else if($cookie <> '') {
                // cek cookie
                $row = $this->M_users->get_by_cookie($cookie)->row_array();
                // var_dump($row);
                // die;
                if ($row) {
                    $this->_daftarkan_session($row);
                } else {
                   echo 'ak masuk cokie';
                }
            }else{
                $data['judul'] = 'SISTP - Login';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            }
        } else {
            // jika validasinya sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('nip');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');

        $user = $this->db->get_where('user', [
            'pegawai_NIP' => $username,
            // 'password' => $password
        ])->row_array();
        // var_dump($user);

        // jika user ada
        if ($user) {
            // jika user aktif
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password']) || $password == $user['password']) {
                    if ($remember) {
                        $key = random_string('alnum', 64);
                        set_cookie('remember', $key, 3600*24*30); // set expired 30 hari kedepan
                        // simpan key di database
                        $update_key = array(
                            'cookie' => $key
                        );
                        $this->M_users->update_cookie($update_key, $user['id_user']);
                    }
                    $data = [
                        'logged' => 'aktif',
                        'pegawai_nip' => $user['pegawai_NIP'],
                        'hak_akses' => $user['hak_akses'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['hak_akses'] == 'admin') {
                        redirect('Home');
                    } else {
                        redirect('Home');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account has been block by Admin</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered</div>');
            redirect('auth');
        }
    }

    public function _daftarkan_session($row) {
        // 1. Daftarkan Session
        $sess = [
            'logged' => 'aktif',
            'pegawai_nip' => $row['pegawai_NIP'],
            'hak_akses' => $row['hak_akses'],
        ];
        // var_dump($sess);
        // die;
        $this->session->set_userdata($sess);
        // 2. Redirect ke home
        redirect('Home');
    }

    public function logout()
    {
        delete_cookie('remember');
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('pegawai_nip');
        $this->session->unset_userdata('hak_akses');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('errors/blocked');
    }
}
