<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PA extends CI_Controller
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
        $this->load->model('m_user');
        $this->m_user->isLogin();
        // $this->load->model('tempmodel');
        // $this->load->model('reportmodel');
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {
        $this->load->view('pa/index');
    }

    public function lembar_evaluasi()
    {
        $nik = $this->uri->segment('3');
        $data = [
            'karyawan' => $this->m_karyawan->get_where($nik),
            'nilai' => $this->m_penilaian->get_where($nik)
        ];

        // $data['eval1'] = $this->encryption-;$data['nilai']->eval1;

        $data['penilai1'] = $this->m_user->get_where($data['nilai']->penilai1);
        $data['penilai2'] = $this->m_user->get_where($data['nilai']->penilai2);
        $data['penilai3'] = $this->m_user->get_where($data['nilai']->penilai3);

        if (substr($data['karyawan']->grade, 0, 1) == 'L') {
            $this->load->view('pa/lembar4', $data);
        } elseif ($data['karyawan']->jenis_pekerjaan == 'PRODUKSI' || $data['karyawan']->jenis_pekerjaan == 'KHUSUS') {
            $grade_a = ['E1', 'E2', 'E3', 'E4'];
            $grade_b = ['E5', 'E6', 'E7', 'E8'];
            if (in_array($data['karyawan']->grade, $grade_a)) {
                $this->load->view('pa/lembar1', $data);
            } else {
                $this->load->view('pa/lembar2', $data);
            }
        } elseif ($data['karyawan']->jenis_pekerjaan == 'ADMINISTRASI' || $data['karyawan']->jenis_pekerjaan == 'TEKNIK') {
            $this->load->view('pa/lembar3', $data);
            # code...
        } else {
            show_404();
        }
    }

    public function lembar2()
    {
        $nik = $this->uri->segment('3');
        $data = [
            'karyawan' => $this->m_karyawan->get_where($nik),
            'nilai' => $this->m_penilaian->get_where($nik)
        ];
        $data['penilai1'] = $this->m_user->get_where($data['nilai']->penilai1);
        $data['penilai2'] = $this->m_user->get_where($data['nilai']->penilai2);
        $data['penilai3'] = $this->m_user->get_where($data['nilai']->penilai3);
        $this->load->view('pa/lembar2', $data);
    }

    public function lembar3()
    {
        $nik = $this->uri->segment('3');
        $data = [
            'karyawan' => $this->m_karyawan->get_where($nik),
            'nilai' => $this->m_penilaian->get_where($nik)
        ];
        $data['penilai1'] = $this->m_user->get_where($data['nilai']->penilai1);
        $data['penilai2'] = $this->m_user->get_where($data['nilai']->penilai2);
        $data['penilai3'] = $this->m_user->get_where($data['nilai']->penilai3);
        $this->load->view('pa/lembar3', $data);
    }

    public function lembar4()
    {
        $nik = $this->uri->segment('3');
        $data = [
            'karyawan' => $this->m_karyawan->get_where($nik),
            'nilai' => $this->m_penilaian->get_where($nik)
        ];
        $data['penilai1'] = $this->m_user->get_where($data['nilai']->penilai1);
        $data['penilai2'] = $this->m_user->get_where($data['nilai']->penilai2);
        $data['penilai3'] = $this->m_user->get_where($data['nilai']->penilai3);
        $this->load->view('pa/lembar4', $data);
    }

    public function pad()
    {
        $this->load->view('pa/test');
    }

    public function insert_data()
    {
        $url = 'http://10.110.52.5:86/karyawan-rest/get-grade';
        $get_url = file_get_contents($url);

        $get_url = json_decode($get_url);
        // $get_url = json_decode(json_encode($get_url), false);

        $output = [];
        foreach ($get_url as $key => $val) {
            if ($val->employ_code == 'PERMANENT') {
                array_push($output, [
                    'nik' => $val->Emp_no,
                    'nama' => $val->Full_name,
                    'cost_center_name' => $val->cost_center_name,
                    'grade' => $val->grade_code,
                    'join_date' => $val->start_date
                ]);
            }
        }

        $this->m_karyawan->insert_batch($output);

        // var_dump($output);
        // die();
    }
}
