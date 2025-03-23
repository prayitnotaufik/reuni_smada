<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Akses extends CI_Model
{
    private $table = "tb_akses";

    public function insert_batch($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    // public function find_where()
    // {
    //     $query = $this->db->get_where($this->table, $data);
    //     return $query->result();
    // }

    function find_all()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_where($nik)
    {
        $query = $this->db->get_where($this->table, ['nik' => $nik]);
        return $query->row();
    }

    public function cekLogin($data)
    {
        $query = $this->db->get_where($this->table, $data);
        return $query->row();
    }

    public function isLogin()
    {
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
    }
}
