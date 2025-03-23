
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
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
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        // $this->load->view('penilaian/index');
        redirect('penilaian/list_karyawan');
    }

    public function upload()
    {
        $data = [
            'location' => 'upload'
        ];
        $this->load->view('penilaian/upload', $data);
    }

    public function proses_upload()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $hadir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $hari = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $rasio = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $parameter1 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $parameter2 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $parameter3 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                    if ($nik != '' && $nama != '') {
                        $temp_data[] = array(
                            'nik' => $nik,
                            'nama' => $nama,
                            'hadir' => $hadir,
                            'hari' => $hari,
                            'rasio' => $rasio,
                            'parameter1' => $parameter1,
                            'parameter2' => $parameter2,
                            'parameter3' => $parameter3,
                        );
                    }
                }
            }
            $this->m_penilaian->insert_batch($temp_data);
            echo "<script>
            window.location.replace('" . base_url('penilaian/upload') . "');
            alert('Data berhasil ditambahkan');
            </script>";
        } else {
            echo ('No file Uploaded');
        }
    }

    public function upload_penilai()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nik = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $eval1 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $eval2 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $eval3 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                    if ($nik != '' && $nama != '') {
                        $temp_data[] = array(
                            'nik' => $nik,
                            'nama' => $nama,
                            // 'eval1' => $this->encryption->;$eval1,
                            'eval2' => $eval2,
                            'eval3' => $eval3,
                        );
                    }
                }
            }
            // array_splice($temp_data, 0, 1);

            // var_dump($temp_data);
            // var_dump('<hr>');
            // var_dump($temp_data);
            // die();
            // if ($this->input->post('truncate') == true) {
            //     $this->M_Master->truncate();
            // }
            $this->m_penilaian->update_batch($temp_data);
            echo "<script>
            window.location.replace('" . base_url('penilaian/upload') . "');
            alert('Data berhasil ditambahkan');
            </script>";
        } else {
            echo ('No file Uploaded');
        }
    }

    public function dt_penilaian_hrga()
    {
        $data = $this->m_penilaian->find_all();

        $output['data'] = [];
        foreach ($data as $key => $val) {
            $arr = array();

            $arr[] = $val->nik;
            $arr[] = $val->nama;
            $arr[] = $val->hari;
            $arr[] = $val->hadir;
            $arr[] = number_format(($val->rasio * 100)) . '%';
            $arr[] = substr($val->eval1, 0, 8);
            $arr[] = $val->parameter1;
            $arr[] = substr($val->eval2, 0, 8);
            $arr[] = $val->parameter2;
            $arr[] = substr($val->eval3, 0, 8);
            $arr[] = $val->parameter3;

            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }

    public function list_karyawan()
    {
        $data = [
            'location' => 'list_karyawan'
        ];
        $this->load->view('penilaian/list_karyawan', $data);
    }

    public function dt_master_karyawan()
    {
        $key = [
            // 'cost_center_name IN' => implode(",", explode(';', $this->session->akses)),
            // 'SUBSTR(grade,1,1) !=' => 'M'
        ];
        // $data = $this->m_karyawan->find_where(explode(';', $this->session->akses));
        // $data = $this->m_karyawan->find_where($this->session->akses);
        // $array = ['Production', 'MIS'];

        // var_dump(implode("','", $array));
        // die();
        // $akses = explode(';', $this->session->akses);
        $akses = explode(';', $this->session->akses);
        $akses = implode("','", $akses);
        // var_dump(implode("','", $akses));
        // die();
        if ($this->session->jabatan == 'GM') {
            $data = $this->m_karyawan->find_all($akses);
        } else if ($this->session->jabatan == 'MANAGER' || $this->session->jabatan == 'DGM') {
            $data = $this->m_karyawan->find_where($akses);
        } else {
            $data = $this->m_karyawan->find_where2($akses);
        }

        $output['data'] = [];
        foreach ($data as $key => $val) {
            $arr = array();

            $arr[] = $val->nik_karyawan;
            $arr[] = $val->nama_karyawan;
            $arr[] = $val->cost_center_name;
            // $arr[] = $val->bagian;
            $arr[] = $val->grade;
            $arr[] = $val->join_date;
            $arr[] = $val->penilai1 != '' ? $val->penilai1 : '<i style="color:red" class="fas fa-times"></i>';
            $arr[] = $val->penilai2 != '' ? '<i style="color:green" class="fas fa-check"></i>' : '<i style="color:red" class="fas fa-times"></i>';
            $arr[] = $val->penilai3 != '' ? '<i style="color:green" class="fas fa-check"></i>' : '<i style="color:red" class="fas fa-times"></i>';
            $arr[] = $val->karyawan != '' ? '<i style="color:green" class="fas fa-check"></i>' : '<i style="color:red" class="fas fa-times"></i>';
            $arr[] = "<a class='btn btn-primary btn-sm' href='" . base_url('pa/lembar_evaluasi/') . $val->nik . "' target='_blank'>Nilai</a>";

            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }

    // public function (){}

    public function insert_nilai()
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'grade' => $this->input->post('grade'),
            'section' => $this->input->post('section'),
            'bagian' => $this->input->post('bagian'),
            'prestasi' => implode(',', $this->input->post('prestasi'))
        ];

        // $cek_nik =

        // var_dump(($data));
        // die();

        if ($this->m_penilaian->insert_penilaian_karyawan($data)) {
            exit(json_encode(['success' => true, 'msg' => 'Data berhasil ditambahkan', 'alert' => 'success']));
        } else {
            exit(json_encode(['error' => true, 'msg' => 'Terjadi Masalah', 'alert' => 'error']));
        }
    }

    public function sign1()
    {
        $nik = $this->input->post('nik');
        $penilai = $this->session->username;
    }

    public function save_sign()
    {
        $svg = $this->input->post('svg');
        $nik = $this->input->post('nik');

        $this->m_penilaian->update_sign($nik, $svg);
        // $this->session->set_userdata(['sign' => $svg]);
    }

    public function save_sign2()
    {
        $data = [
            'penilai2' => $this->input->post('svg')
        ];

        $key = [
            'nik' => $this->input->post('nik')
        ];

        $this->m_penilaian->update_where($data, $key);
    }

    public function save_sign3()
    {
        $data = [
            'penilai3' => $this->input->post('svg')
        ];

        $key = [
            'nik' => $this->input->post('nik')
        ];

        $this->m_penilaian->update_where($data, $key);
    }

    public function sign_penilai1()
    {
        $data = [
            'penilai1' => $this->session->username
        ];

        $key = [
            'nik' => $this->input->post('nik')
        ];

        $this->m_penilaian->update_where($data, $key);
    }
    public function sign_penilai2()
    {
        $data = [
            'penilai2' => $this->session->username
        ];

        $key = [
            'nik' => $this->input->post('nik')
        ];

        $this->m_penilaian->update_where($data, $key);
    }
    public function sign_penilai3()
    {
        $data = [
            'penilai3' => $this->session->username
        ];

        $key = [
            'nik' => $this->input->post('nik')
        ];

        $this->m_penilaian->update_where($data, $key);
    }

    public function remove_sign()
    {
        $svg = '';
        $nik = $this->uri->segment('3');

        $this->m_penilaian->update_sign($nik, $svg);
        echo "<script>
        window.location.replace('" . base_url('pa/lembar_evaluasi/') . $nik . "');
        alert('Signature removed');
        </script>";
    }

    public function remove_sign1()
    {
        $data = [
            'penilai1' => ''
        ];

        $key = [
            'nik' => $this->uri->segment('3')
        ];

        $this->m_penilaian->update_where($data, $key);
        echo "<script>
        window.location.replace('" . base_url('pa/lembar_evaluasi/') . $key['nik'] . "');
        alert('Signature removed');
        </script>";
    }

    public function remove_sign2()
    {
        $data = [
            'penilai2' => ''
        ];

        $key = [
            'nik' => $this->uri->segment('3')
        ];

        $this->m_penilaian->update_where($data, $key);
        echo "<script>
        window.location.replace('" . base_url('pa/lembar_evaluasi/') . $key['nik'] . "');
        alert('Signature removed');
        </script>";
    }

    public function remove_sign3()
    {
        $data = [
            'penilai3' => ''
        ];

        $key = [
            'nik' => $this->uri->segment('3')
        ];

        $this->m_penilaian->update_where($data, $key);
        echo "<script>
        window.location.replace('" . base_url('pa/lembar_evaluasi/') . $key['nik'] . "');
        alert('Signature removed');
        </script>";
    }

    public function save_komen()
    {
        $data = [
            'komentar' => $this->input->post('komentar')
        ];

        $key = [
            'nik' => $this->input->post('nik')
        ];

        $this->m_penilaian->update_where($data, $key);
    }

    public function save_prestasi()
    {
        $data = [
            'prestasi' => implode(',', $this->input->post('prestasi'))
        ];

        $key = [
            'nik' => $this->input->post('nik'),
        ];

        $this->m_penilaian->update_where($data, $key);
    }
    public function save_kemampuan()
    {
        $data = [
            'kemampuan' => implode(',', $this->input->post('kemampuan'))
        ];

        $key = [
            'nik' => $this->input->post('nik'),
        ];

        $this->m_penilaian->update_where($data, $key);
    }
    public function save_sikap()
    {
        $data = [
            'sikap' => implode(',', $this->input->post('sikap'))
        ];

        $key = [
            'nik' => $this->input->post('nik'),
        ];

        $this->m_penilaian->update_where($data, $key);
    }

    public function try_encrypt()
    {
        $data = $this->m_penilaian->find_all();
        $newdata = [];
        foreach ($data as $key => $val) {
            $newdata[$key]['nik'] = $val->nik;
            $newdata[$key]['eval1'] = $this->encryption->encrypt($val->eval1);
            $newdata[$key]['eval2'] = $this->encryption->encrypt($val->eval2);
            $newdata[$key]['eval3'] = $this->encryption->encrypt($val->eval3);
        }

        // $this->m_penilaian->update_batch($newdata);
        // var_dump($data[1]);
        // var_dump('<hr>');
        // var_dump($newdata[1]);

    }
}
