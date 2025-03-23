<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Project extends CI_Model
{
    private $table = "tb_project";
    // private $table2 = "tb_penilaian_karyawan";

    // public function __construct()
    // {
    //     $this->load->database('')
    // }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function insert_transaksi($data)
    {
        $this->db->insert('tb_progress', $data);
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    function find_all()
    {
        $this->db->select('a.*,b.fullname');
        $this->db->from('tb_project as a');
        $this->db->join('tb_user as b', 'a.author=b.username', 'left');
        $this->db->order_by('a.created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_request($data)
    {
        $query = $this->db->get_where($this->table, $data);
        return $query->row();
    }

    function delete_request($data)
    {
        $this->db->where($data);
        $this->db->delete($this->table);
        return $this->db->affected_rows() > 0 ? true : false;
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

    public function get_where($data)
    {
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get_where($this->table, $data);
        return $query->result();
    }

    public function get_detail_where($data)
    {
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get_where('tb_progress', $data);
        return $query->result();
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
