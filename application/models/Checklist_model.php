<?php
/**
 *
 */
class Checklist_model extends CI_Model
{

  public function get($batas=NULL,$offset=NULL,$cari=NULL)
  {
      if ($batas != NULL) {
        $this->db->limit($batas,$offset);
      }
      if ($cari != NULL) {
          $this->db->or_like($cari);
      }
      $this->db->from('produks');
      $query = $this->db->get();
      return $query->result();
  }
  public function jumlah_row($search)
  {
    $this->db->or_like($search);
    $query = $this->db->get('produks');

    return $query->num_rows();
  }

  public function lihat_id($id)
  {
      $query = $this->db->get_where($this->_table, ['id_room' => $id]);
      return $query->row();
  }

  public function get_by_id($kondisi)
  {
      $this->db->from('produks');
      $this->db->where($kondisi);
      $query = $this->db->get();
      return $query->row();
  }

  public function insert($data)
  {
      $this->db->insert('produks',$data);
      return TRUE;
  }
  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('produks');
      return TRUE;
  }
  public function update($data,$kondisi)
  {
      $this->db->update('produks',$data,$kondisi);
      return TRUE;
  }

}
