<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('simple_html_dom');
        $this->load->model('m_penilaian');
        $this->load->model('m_karyawan');
        $this->load->model('m_recruitment');
        $this->load->model('m_user');
        $this->m_user->isLogin();
        // $this->load->model('tempmodel');
        // $this->load->model('reportmodel');
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function request()
    {
        $data['user'] = $this->m_user->find_where(['org_unit !=' => '']);
        $data['location'] = 'request';
        $this->load->view('recruitment/request', $data);
    }

    public function generateCode($length = 6)
    {
        $az = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $azr = rand(0, 51);
        $azs = substr($az, $azr, 10);
        $stamp = hash('sha256', time());
        $mt = hash('sha256', mt_rand(5, 20));
        $alpha = hash('sha256', $azs);
        $hash = str_shuffle($stamp . $mt . $alpha);
        $code = ucfirst(substr($hash, $azr, $length));
        $code = 'R' . strtoupper($code);

        return $code;
    }

    public function submit_request()
    {
        $data = $this->input->post('data');
        $data['tiket'] = $this->generateCode();
        $data['login_as'] = $this->session->username;

        $this->m_recruitment->insert($data);

        // var_dump($data);
    }

    public function applicant()
    {
        $data['user'] = $this->m_user->find_where(['org_unit !=' => '']);
        $data['location'] = 'applicant';
        $this->load->view('recruitment/applicant', $data);
    }

    public function delete_request()
    {
        $data = $this->input->post('data');

        $this->m_recruitment->delete_request($data);
        // var_dump($data);
    }

    public function get_request()
    {
        $data = $this->input->post('data');

        $res = $this->m_recruitment->get_request($data);

        echo json_encode($res);
    }

    public function dt_request()
    {
        $data = $this->m_recruitment->find_all_request();


        $output['data'] = [];
        foreach ($data as $key => $val) {
            $arr = array();

            $arr[] = $val->tiket;
            $arr[] = $key + 1;
            $arr[] = $val->section;
            $arr[] = $val->jabatan;
            $arr[] = $val->grade;
            $arr[] = $val->status_karyawan;
            $arr[] = $val->total_mp;
            $arr[] = $val->tgl_in;
            $arr[] = '
            <a id="edit" class="btn btn-primary btn-xs" target="_blank"><i class="fas fa-edit"></i></a>
            <a id="delete" class="btn btn-danger btn-xs" target="_blank"><i class="fas fa-trash"></i></a>
            ';

            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }
}
