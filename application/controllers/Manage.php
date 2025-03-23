<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
        // if ($this->session->token != 'xproject') {
        //     die();
        // }
        $this->m_user->isLogin();
        $this->load->helper('simple_html_dom');
        $this->load->model('m_penilaian');
        $this->load->model('m_project');
        $this->load->library('encryption');
        $this->load->library('secure');
        $this->load->library('upload');
        // if (!$this->session->userdata('isLogin') && !$this->session->userdata('username') && $this->session->token != 'xproject') {
        //     redirect('logout');
        // }
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['location'] = 'manage_project';
        $this->load->view('projects/manage', $data);
        // redirect('penilaian/list_karyawan');
    }

    public function contribute()
    {
        $data['location'] = 'contribute_project';
        $this->load->view('projects/contribute', $data);
        // redirect('penilaian/list_karyawan');
    }

    public function daily_task()
    {
        $data['location'] = 'daily_task';
        $this->load->view('projects/daily_task', $data);
        // redirect('penilaian/list_karyawan');
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

    public function add_project()
    {
        $files = $_FILES['screenshot'];
        $number_of_files = sizeof($_FILES['screenshot']['tmp_name']);
        $tiket = $this->input->post('tiket');
        $config = array(
            'upload_path' => FCPATH . 'uploads/', // No need for './'
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size' => '100000',
            'encrypt_name' => TRUE // Automatically encrypt file name
        );

        $name = [];

        if ($number_of_files > 0) {
            for ($i = 0; $i < $number_of_files; $i++) {
                $ext = explode(".", $files['name'][$i]);
                $file_ext = end($ext); // Get the file extension

                // Set $_FILES for each file
                $_FILES['screenshot']['name'] = $files['name'][$i];
                $_FILES['screenshot']['type'] = $files['type'][$i];
                $_FILES['screenshot']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['screenshot']['error'] = $files['error'][$i];
                $_FILES['screenshot']['size'] = $files['size'][$i];

                // Initialize upload library for each file
                $this->load->library('upload', $config);
                $this->upload->initialize($config); // Reinitialize config for each file

                if (!$this->upload->do_upload('screenshot')) {
                    // Capture and log errors
                    $error = $this->upload->display_errors();
                    echo $error;
                } else {
                    // Successful upload
                    $gbr = $this->upload->data(); // The file data including the encrypted name
                    $name[] = $gbr['file_name'];  // Store the encrypted file name in the $name array

                    // Configure image library for resizing
                    $resize_config['image_library'] = 'gd2';
                    $resize_config['source_image'] = FCPATH . 'uploads/' . $gbr['file_name'];
                    $resize_config['create_thumb'] = FALSE;
                    $resize_config['quality'] = '90%';
                    $resize_config['width'] = 800;
                    $resize_config['maintain_ratio'] = TRUE;
                    $resize_config['master_dim'] = 'width';
                    $resize_config['new_image'] = FCPATH . 'uploads/' . $gbr['file_name'];

                    // Initialize image_lib with the new config
                    $this->load->library('image_lib', $resize_config);
                    $this->image_lib->initialize($resize_config);

                    if (!$this->image_lib->resize()) {
                        echo $this->image_lib->display_errors(); // Show errors if resizing fails
                    }

                    // Clear image_lib settings after each resize
                    $this->image_lib->clear();
                }
            }
        }

        // Prepare other data to update in the database
        $data = [
            'title' => $this->input->post('title'),
            'tiket' => $this->generateCode(),
            'description' => $this->input->post('description'),
            'category' => $this->input->post('category'),
            'url' => $this->input->post('url'),
            'author' => $this->session->username,
            'author_name' => $this->session->fullname,
        ];

        // Check if any file names were successfully stored
        if (count($name) > 0) {
            $data['ss'] = implode(';', $name); // Store all file names in 'ss' field separated by semicolon
        }
        $this->m_project->insert($data);

        echo "<script>
        window.location.replace('" . base_url('manage') . "');
        alert('Data berhasil ditambahkan!');
        </script>";
    }

    public function edit_project()
    {
        $files = $_FILES['screenshot'];
        $number_of_files = sizeof($_FILES['screenshot']['tmp_name']);
        $tiket = $this->input->post('tiket');
        $config = array(
            'upload_path' => FCPATH . 'uploads/', // No need for './'
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size' => '100000',
            'encrypt_name' => TRUE // Automatically encrypt file name
        );

        $name = [];

        if ($number_of_files > 0) {
            for ($i = 0; $i < $number_of_files; $i++) {
                $ext = explode(".", $files['name'][$i]);
                $file_ext = end($ext); // Get the file extension

                // Set $_FILES for each file
                $_FILES['screenshot']['name'] = $files['name'][$i];
                $_FILES['screenshot']['type'] = $files['type'][$i];
                $_FILES['screenshot']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['screenshot']['error'] = $files['error'][$i];
                $_FILES['screenshot']['size'] = $files['size'][$i];

                // Initialize upload library for each file
                $this->load->library('upload', $config);
                $this->upload->initialize($config); // Reinitialize config for each file

                if (!$this->upload->do_upload('screenshot')) {
                    // Capture and log errors
                    $error = $this->upload->display_errors();
                    echo $error;
                } else {
                    // Successful upload
                    $gbr = $this->upload->data(); // The file data including the encrypted name
                    $name[] = $gbr['file_name'];  // Store the encrypted file name in the $name array

                    // Configure image library for resizing
                    $resize_config['image_library'] = 'gd2';
                    $resize_config['source_image'] = FCPATH . 'uploads/' . $gbr['file_name'];
                    $resize_config['create_thumb'] = FALSE;
                    $resize_config['quality'] = '90%';
                    $resize_config['width'] = 800;
                    $resize_config['maintain_ratio'] = TRUE;
                    $resize_config['master_dim'] = 'width';
                    $resize_config['new_image'] = FCPATH . 'uploads/' . $gbr['file_name'];

                    // Initialize image_lib with the new config
                    $this->load->library('image_lib', $resize_config);
                    $this->image_lib->initialize($resize_config);

                    if (!$this->image_lib->resize()) {
                        echo $this->image_lib->display_errors(); // Show errors if resizing fails
                    }

                    // Clear image_lib settings after each resize
                    $this->image_lib->clear();
                }
            }
        }

        // Prepare other data to update in the database
        $data = [
            'title' => $this->input->post('title'),
            'created_at' => $this->input->post('date'),
            'description' => $this->input->post('description'),
            'category' => $this->input->post('category'),
            'status' => $this->input->post('status'),
            'url' => $this->input->post('url'),
            'author' => $this->session->username
        ];

        // Check if any file names were successfully stored
        if (count($name) > 0) {
            $data['ss'] = implode(';', $name); // Store all file names in 'ss' field separated by semicolon
        }

        $key = ['tiket' => $tiket]; // Define the key for the update

        // Update the database
        $this->m_project->update_where($data, $key);

        echo "
            <script>
            window.location.replace('" . base_url('manage') . "');
            alert('Data berhasil diperbarui!');
            </script>";
    }

    private function compress_image($path, $file_name)
    {
        $config['image_library']  = 'gd2';
        $config['source_image']   = $path;
        $config['new_image']      = FCPATH . 'uploads/etani/';
        $config['quality']        = '80%'; // Adjust the quality percentage as needed
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 800;
        $config['height'] = 1;
        $config['master_dim'] = 'width';

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }

        $this->image_lib->clear();
    }


    public function add_progress()
    {
        $config['upload_path']   = FCPATH . 'uploads_progress';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 15000;
        $config['encrypt_name']  = TRUE;

        $datasubmit = json_decode($this->input->post('datasubmit'), true);
        $datasubmit['pic'] = $this->session->username;  // Add session user to the data
        $datasubmit['pic_name'] = $this->session->fullname;  // Add session user to the data
        $data_update = [
            'progress' => $datasubmit['progress']
        ];
        $key_update = [
            'tiket' => $datasubmit['tiket']
        ];
        unset($datasubmit['progress']);
        // var_dump($datasubmit);
        // die();
        // header('Content-Type: application/json');
        // echo json_encode($datasubmit);
        // die();


        // Check if there's an image being uploaded
        if (!empty($_FILES['evidence']['name'])) {
            // Initialize upload library with config
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('evidence')) {
                // Return the error in JSON format if image upload fails
                $error = $this->upload->display_errors();
                echo json_encode(['error' => $error]);
                return; // Exit the function after error
            } else {
                // Successful image upload
                $data = $this->upload->data();  // Get the uploaded file data

                // Add the encrypted file name to the data being submitted
                $datasubmit['evidence'] = $data['file_name'];

                // Compress the uploaded image
                $this->compress_image($data['full_path'], $data['file_name']);
            }
        } else {
            // No image was uploaded, proceed with just the other data
            $datasubmit['evidence'] = '';  // Set detail as empty if no image
        }

        // Insert the data into the database
        $this->m_project->insert_transaksi($datasubmit);
        $this->m_project->update_where($data_update, $key_update);

        // Return success response
        echo json_encode(['success' => 'Data submitted successfully' . (isset($data['file_name']) ? ' with image.' : ' without image.')]);
    }

    public function add_daily_task()
    {
        $config['upload_path']   = FCPATH . 'uploads_progress';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 15000;
        $config['encrypt_name']  = TRUE;

        $datasubmit = json_decode($this->input->post('datasubmit'), true);
        $datasubmit['pic'] = $this->session->username;  // Add session user to the data
        $datasubmit['pic_name'] = $this->session->fullname;  // Add session user to the data

        // Check if there's an image being uploaded
        if (!empty($_FILES['evidence']['name'])) {
            // Initialize upload library with config
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('evidence')) {
                // Return the error in JSON format if image upload fails
                $error = $this->upload->display_errors();
                echo json_encode(['error' => $error]);
                return; // Exit the function after error
            } else {
                // Successful image upload
                $data = $this->upload->data();  // Get the uploaded file data

                // Add the encrypted file name to the data being submitted
                $datasubmit['evidence'] = $data['file_name'];

                // Compress the uploaded image
                $this->compress_image($data['full_path'], $data['file_name']);
            }
        } else {
            // No image was uploaded, proceed with just the other data
            $datasubmit['evidence'] = '';  // Set detail as empty if no image
        }

        // Insert the data into the database
        $this->m_project->insert_transaksi($datasubmit);

        // Return success response
        echo json_encode(['success' => 'Data submitted successfully' . (isset($data['file_name']) ? ' with image.' : ' without image.')]);
    }


    public function dt_project()
    {
        // $data = $this->m_project->find_all();

        $data = $this->m_project->get_where(['author' => $this->session->username]);

        $output['data'] = [];
        foreach ($data as $key => $val) {
            $data_detail = json_encode($val);
            $data_detail = htmlspecialchars($data_detail, ENT_QUOTES, 'UTF-8');

            $arr = array();
            $gambar = explode(';', $val->ss);
            // $arr[] = $val->tiket;
            $arr[] = $key + 1;
            $arr[] = $val->title;
            $arr[] = $val->category;
            $arr[] = $val->description;
            $arr[] = $val->created_at;
            if ($val->ss != '') {
                $start = "<div class='image-set'>";
                $end = "</div>";
                $show = '';
                foreach ($gambar as $key2 => $val2) {
                    $show .= "
                    <a class='mt-2' data-magnify='gallery' data-src='' data-caption='' data-group='" . $val->tiket . "' 
                    href='" . base_url('uploads/') . $val2 . "'>
                    <img style='height:40px' src='" . base_url('uploads/') . $val2 . "' alt=''>
                    </a>
                    ";
                }
                $arr[] = $start . $show . $end;
            } else {
                $arr[] = '';
            }
            // $arr[] = count($gambar);
            $arr[] = '<a target="_blank" href="http://' . $val->url . '">' . $val->url . '</a>';
            $arr[] = $val->progress . '%';

            $arr[] = $val->status == '1' ? '<span class="text-success font-weight-bold">CLOSED</span>' : '<span class="text-warning font-weight-bold">ACTIVE</span>';
            $arr[] = '
            <a id="edit" class="btn btn-default btn-xs" data-detail="' . $data_detail . '" target="_blank"><i class="fas fa-edit"></i></a>
            <a id="progress" class="btn btn-default btn-xs" data-detail="' . $data_detail . '" target="_blank"><i class="fas fa-tasks"></i></a>
            <a id="detail" class="btn btn-default btn-xs" data-detail="' . $data_detail . '" target="_blank"><i class="fas fa-chart-line"></i></a>
            ';

            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }

    public function dt_daily()
    {
        // $data = $this->m_project->find_all();

        $key = [
            'pic' => $this->session->username,
            'tiket' => ''
        ];
        $data = $this->m_project->get_detail_where($key);

        $output['data'] = [];
        foreach ($data as $key => $val) {
            $arr = array();

            $arr[] = $key + 1;
            $arr[] = $val->task_desc;
            if ($val->evidence != '') {
                $start = "<div class='image-set'>";
                $end = "</div>";
                $show = "
                <a class='mt-2' data-magnify='gallery' data-src='' data-caption='' data-group='" . $val->evidence . "' 
                href='" . base_url('uploads_progress/') . $val->evidence . "'>
                <img style='height:80px' src='" . base_url('uploads_progress/') . $val->evidence . "' alt=''>
                </a>
                ";
                $arr[] = $start . $show . $end;
            } else {
                $arr[] = '';
            }
            $arr[] = $val->created_at;

            $output['data'][] = $arr;
        }

        $output['query'] = $this->db->last_query();
        exit(json_encode($output));
    }

    public function dt_contribute_project()
    {
        $data = $this->m_project->get_where(['author !=' => $this->session->username]);

        $output['data'] = [];
        foreach ($data as $key => $val) {
            $data_detail = json_encode($val);
            $data_detail = htmlspecialchars($data_detail, ENT_QUOTES, 'UTF-8');

            $arr = array();
            $gambar = explode(';', $val->ss);
            $arr[] = $val->tiket;
            $arr[] = $key + 1;
            $arr[] = $val->title;
            $arr[] = $val->category;
            $arr[] = $val->description;
            $arr[] = $val->created_at;
            if ($val->ss != '') {
                $start = "<div class='image-set'>";
                $end = "</div>";
                $show = '';
                foreach ($gambar as $key2 => $val2) {
                    $show .= "
                    <a class='mt-2' data-magnify='gallery' data-src='' data-caption='' data-group='" . $val->tiket . "' 
                    href='" . base_url('uploads/') . $val2 . "'>
                    <img style='height:40px' src='" . base_url('uploads/') . $val2 . "' alt=''>
                    </a>
                    ";
                }
                $arr[] = $start . $show . $end;
            } else {
                $arr[] = '';
            }
            // $arr[] = count($gambar);
            $arr[] = '<a target="_blank" href="http://' . $val->url . '">' . $val->url . '</a>';
            $arr[] = $val->progress . '%';

            $arr[] = $val->status == '1' ? '<span class="text-success font-weight-bold">CLOSED</span>' : '<span class="text-warning font-weight-bold">ACTIVE</span>';
            $arr[] = '
            <a id="progress" class="btn btn-default btn-xs" data-detail="' . $data_detail . '" target="_blank"><i class="fas fa-tasks"></i></a>
            <a id="detail" class="btn btn-default btn-xs" data-detail="' . $data_detail . '" target="_blank"><i class="fas fa-chart-line"></i></a>
            ';

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
                <a class='mt-2' data-magnify='gallery' data-src='' data-caption='' data-group='" . $val->evidence . "' 
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
}
