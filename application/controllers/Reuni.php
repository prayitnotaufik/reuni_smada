<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reuni extends CI_Controller
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
        $code = 'X' . strtoupper($code);

        return $code;
    }

    public function index()
    {
        $data['location'] = 'list_peserta';
        $this->load->view('reuni/list_peserta', $data);
        // redirect('penilaian/list_karyawan');
    }

    // public function manage()
    // {
    //     $this->load->view('projects/manage');
    // }

    public function dt_peserta()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $query = $this->db->get()->result();

        $data = $query;

        $output['data'] = [];
        foreach ($data as $key => $val) {

            $data_detail = json_encode($val);
            $data_detail = htmlspecialchars($data_detail, ENT_QUOTES, 'UTF-8');

            $arr = array();
            $arr[] = $val->id;
            $arr[] = $val->nama;
            // $arr[] = $val->alamat;
            // $arr[] = $val->email;
            // $arr[] = $val->hp;
            // $arr[] = $val->keterangan;
            $arr[] = $val->kelas;
            $arr[] = $val->kode;
            $arr[] = $val->kode;
            // $arr[] = '
            // <img src="' . base_url('qrgenerator/generate/' . urlencode($val->kode)) . '" alt="QR Code">
            // ';
            $arr[] = '<a href="https://api.whatsapp.com/send?text=Lihat QR Code Anda di ' . base_url('qrgenerator/index/' . urlencode($val->kode)) . '" target="_blank">
            <button class="btn btn-sm btn-primary">Kirim WhatsApp</button>
            </a>';


            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }

    public function dt_project()
    {
        $data = $this->m_project->find_all();

        $output['data'] = [];
        foreach ($data as $key => $val) {

            $data_detail = json_encode($val);
            $data_detail = htmlspecialchars($data_detail, ENT_QUOTES, 'UTF-8');

            $arr = array();
            $gambar = explode(';', $val->ss);
            $arr[] = $key + 1;
            $arr[] = $val->title;
            $arr[] = $val->description;
            $arr[] = $val->category;
            $arr[] = $val->created_at;
            $start = "<div class='image-set'>";
            $end = "</div>";
            if ($val->ss != '') {
                $start = "<div class='image-set'>";
                $end = "</div>";
                $show = '';
                foreach ($gambar as $key2 => $val2) {
                    $show .= "
                    <a class='mt-2' data-magnify='gallery' data-src='' data-caption='' data-group='" . $val->tiket . "' 
                    href='" . base_url('uploads/') . $val2 . "'>
                    <img style='height:50px' src='" . base_url('uploads/') . $val2 . "' alt=''>
                    </a>
                    ";
                }
                $arr[] = $start . $show . $end;
            } else {
                $arr[] = '';
            }
            $arr[] = '<a target="_blank" href="http://' . $val->url . '">' . $val->url . '</a>';
            $arr[] = $val->progress . '%';
            $arr[] = implode(' ', array_slice(explode(' ', $val->fullname), 0, 2));;
            $arr[] = $val->status == '1' ? '<span id="detail" class="text-success" data-detail="' . $data_detail . '" font-weight-bold">CLOSED</span>' : '<span id="detail" class="text-warning" data-detail="' . $data_detail . '"  font-weight-bold">ACTIVE</span>';


            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }

    public function dt_detail()
    {
        $tiket = $this->input->post('tiket');

        $data = $this->m_project->get_detail_where(['tiket' => $tiket]);

        $output['data'] = [];
        foreach ($data as $key => $val) {
            $arr = array();

            $arr[] = $key + 1;
            $arr[] = $val->task_desc;
            if ($val->evidence != '') {
                $start = "<div class='image-set'>";
                $end = "</div>";
                $show = "
                <a class='mt-2' data-magnify='gallery' data-src='' data-caption='' data-group='" . $val->tiket . "' 
                href='" . base_url('uploads_progress/') . $val->evidence . "'>
                <img style='height:80px' src='" . base_url('uploads_progress/') . $val->evidence . "' alt=''>
                </a>
                ";
                $arr[] = $start . $show . $end;
            } else {
                $arr[] = '';
            }

            $arr[] = $val->pic;
            $arr[] = $val->created_at;

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
