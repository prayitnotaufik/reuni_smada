<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pick extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('simple_html_dom');
        // $this->load->model('m_penilaian');
        // $this->load->model('m_karyawan');
        // $this->load->model('m_project');

        // $this->load->model('m_user');
        // $this->m_user->isLogin();
        // $this->load->model('tempmodel');
        // $this->load->model('reportmodel');
        // $this->load->library('encryption');
        // $this->load->library('secure');
        // $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->view('randompicker/index');
    }

    public function test()
    {
        $this->load->view('randompicker/index');
    }
}
