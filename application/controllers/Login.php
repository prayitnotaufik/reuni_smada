<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('simple_html_dom');
        $this->load->model('m_penilaian');
        $this->load->model('m_karyawan');
        $this->load->model('m_user');
        $this->load->model('m_akses');
        // $this->load->model('tempmodel');
        // $this->load->model('reportmodel');
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->library('secure');
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {
        // show_404();
        $this->load->view('login');
    }

    public function logindev()
    {
        $this->load->view('login');
    }

    public function prosesLogin()
    {

        $datacek = [
            'username' => $this->input->post('username'),
        ];
        $pass = $this->input->post('password');

        $cekuser = $this->m_user->cekLogin($datacek);
        $state = password_verify($pass, $cekuser->password);

        // var_dump($state);
        // die();
        if ($state) {
            // if ($datacek['username'] == 'ADMINX') {
            // $akses = $this->m_akses->get_where($datacek['username']);
            $userdata = [
                'username' => $cekuser->username,
                'fullname' => $cekuser->fullname,
                'jabatan' => $cekuser->jabatan,
                'isLogin' => true,
                'apps' => 'xproject'
            ];

            // var_dump($userdata);
            // die();

            $this->session->set_userdata($userdata);
            redirect(base_url('projects'));
        } else {
            echo "<script>
            window.location.replace('" . base_url('login') . "');
            alert('Username/Password Salah');
            </script>";
            // echo 'Username/password salah';
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function profile()
    {
        $data = [
            'user' => $this->m_user->get_where($this->session->username)
        ];

        $this->load->view('profile', $data);
    }

    public function save_sign()
    {
        $svg = $this->input->post('svg');
        $nik = $this->input->post('nik');

        $this->m_user->update_sign($nik, $svg);
        $this->session->set_userdata(['sign' => $svg]);
    }

    public function remove_sign()
    {
        $svg = '';
        $nik = $this->session->username;

        $this->m_user->update_sign($nik, $svg);
        $this->session->set_userdata(['sign' => '']);
        echo "<script>
        window.location.replace('" . base_url('login/profile') . "');
        alert('Signature removed');
        </script>";
    }

    public function change_password()
    {
        $key = [
            'username' => $this->input->post('nik')
        ];

        $data = [
            'password' => password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT)
        ];

        $this->m_user->update_where($data, $key);
    }

    public function test()
    {
        $a = password_hash('123@yemi', PASSWORD_DEFAULT);
        var_dump($a);
    }

    public function testx()
    {
        $a = password_verify('adminx', '$2y$10$YaHTbWObvhnWbzSrflOpl.bitj9AGjMTo20Mmqd91HRjw1p.7Xbty');
        $b = hash('sha256', 'A');
        $en = $this->encryption->encrypt('A');
        $de = $this->encryption->decrypt('1e27903feba86096dbfa2f4cc81621d2e48743732e5ac13c01d26bc4d5c23bc2d89d1107cad42ac204a94d04b225b434a79a2170c14b593b576b4588eea5fe1eNdqolPnG/HKK5qr60PXG1ME7lkVK5FTmWvqBtgvEmmk=');
        // has
        // var_dump(bin2hex($this->encryption->create_key(16)));
        // var_dump('<br>');
        var_dump($en);
        var_dump($de);
    }
}
