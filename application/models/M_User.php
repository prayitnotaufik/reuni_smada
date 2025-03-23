<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    private $table = "tb_user";

    public function insert_batch($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    function find_all()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_where($nik)
    {
        $query = $this->db->get_where($this->table, ['username' => $nik]);
        return $query->row();
    }

    public function find_where($data)
    {
        $query = $this->db->get_where($this->table, $data);
        return $query->result();
    }

    public function cekLogin($data)
    {
        $query = $this->db->get_where($this->table, $data);
        return $query->row();
    }

    public function isLogin()
    {
        if ($this->session->userdata('apps') != 'xproject' || !$this->session->userdata('isLogin') || !$this->session->userdata('username')) {
            $this->session->sess_destroy();
            redirect('login');
            // die();
        }
    }

    public function update_sign($nik, $svg)
    {
        $this->db->where('username', $nik);
        $this->db->update($this->table, ['signature' => $svg]);
        return true;
    }

    public function update_where($data, $key)
    {
        $this->db->update($this->table, $data, $key);
        return true;
    }
}
