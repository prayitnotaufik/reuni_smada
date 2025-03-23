<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Karyawan extends CI_Model
{
    private $table = "tb_master_karyawan";

    public function insert_batch($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    function find_all()
    {
        $query = "SELECT a.*,a.nama AS nama_karyawan,a.nik AS nik_karyawan,b.*
        FROM tb_master_karyawan AS a
        LEFT JOIN tb_penilaian_hr AS b ON a.nik = b.nik";
        return $this->db->query($query)->result();
    }

    function find_where($data)
    {
        // $this->db->where_in('cost_center_name', $data);
        // var_dump();
        $query = "SELECT a.*,a.nama AS nama_karyawan,a.nik AS nik_karyawan,b.*
        FROM tb_master_karyawan AS a
        LEFT JOIN tb_penilaian_hr AS b ON a.nik = b.nik
        WHERE a.cost_center_name IN('$data') AND SUBSTR(a.grade,1,1) != 'M'";
        return $this->db->query($query)->result();
    }

    function find_where2($data)
    {
        // $this->db->where_in('cost_center_name', $data);
        // var_dump();
        $query = "SELECT a.*,a.nama AS nama_karyawan,a.nik AS nik_karyawan,b.*
        FROM tb_master_karyawan AS a
        LEFT JOIN tb_penilaian_hr AS b ON a.nik = b.nik
        WHERE a.cost_center_name IN('$data') AND SUBSTR(a.grade,1,1) != 'M' AND SUBSTR(a.grade,1,1) != 'L'";
        return $this->db->query($query)->result();
    }

    public function get_where($nik)
    {
        $query = $this->db->get_where($this->table, ['nik' => $nik]);
        return $query->row();
    }

    // "Accounting;Final Assembling;Grinding;HRGA - Driver;HRGA - General Affairs;HRGA - Staff;Injection Big;Injection Medium;Injection Small;Logistic;Maintenance;MIS;Painting;PCB - Auto;PCB - Manual;PDC Audio;PDC SN Expatriate;Prod. Control;Prod. Engineering;Production;Purchasing;Quality Assurance;SMT;SPU;Sub. Assembling;Warehouse Finished Good;Warehouse Parts;Wood Working;"

}
