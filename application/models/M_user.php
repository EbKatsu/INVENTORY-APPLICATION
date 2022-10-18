<?php defined('BASEPATH') or die('No direct script access allowed');

class M_user extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('users');

        return $this->db->get();
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
        return TRUE;
    }
}
