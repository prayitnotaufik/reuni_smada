<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('simple_html_dom');
        $this->load->model('m_penilaian');
        $this->load->model('m_karyawan');
        $this->load->model('m_user');
        $this->m_user->isLogin();
        // $this->load->model('tempmodel');
        // $this->load->model('reportmodel');
        $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'location' => 'akses'
        ];
        $this->load->view('admin/index', $data);
    }


    public function dt_user()
    {
        $key = [
            // 'cost_center_name IN' => implode(",", explode(';', $this->session->akses)),
            // 'SUBSTR(grade,1,1) !=' => 'M'
        ];
        $data = $this->m_user->find_all();

        $output['data'] = [];
        foreach ($data as $key => $val) {
            $arr = array();

            $arr[] = $val->username;
            // $arr[] = $val->password;
            $arr[] = $val->fullname;
            $arr[] = $val->jabatan;
            $arr[] = $val->akses;
            $arr[] = "<button id='btn-edit' class='btn btn-sm btn-success'>Edit</button>";

            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }
}
