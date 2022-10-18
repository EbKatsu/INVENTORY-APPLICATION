<?php defined('BASEPATH') or die('No direct script access allowed');

class M_jadwal extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('jadwal_karyawan');

        return $this->db->get();
    }
}
