<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Penilaian extends CI_Model
{
    private $table = "tb_penilaian_hr";
    private $table2 = "tb_penilaian_karyawan";

    public function insert_batch($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    function find_all()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_penilaian_karyawan($data)
    {
        if ($this->db->insert($this->table2, $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_batch($data)
    {
        $this->db->update_batch($this->table, $data, 'nik');
    }

    public function get_where($nik)
    {
        $query = $this->db->get_where($this->table, ['nik' => $nik]);
        return $query->row();
    }

    public function update_sign($nik, $svg)
    {
        $this->db->where('nik', $nik);
        $this->db->update($this->table, ['karyawan' => $svg]);
        return true;
    }

    public function update_where($data, $key)
    {
        // $this->db->where('nik', $nik);
        $this->db->update($this->table, $data, $key);
        return true;
    }
}
