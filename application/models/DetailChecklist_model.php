<?php

/**
 *
 */
class DetailChecklist_model extends CI_Model
{

  public function get($batas = NULL, $offset = NULL, $cari = NULL)
  {
    if ($batas != NULL) {
      $this->db->limit($batas, $offset);
    }
    if ($cari != NULL) {
      $this->db->or_like($cari);
    }
    $this->db->from('detail_produk');
    $query = $this->db->get();
    return $query->result();
  }
  public function jumlah_row($search)
  {
    $this->db->or_like($search);
    $query = $this->db->get('detail_produk');

    return $query->num_rows();
  }



  public function get_by_id($kondisi)
  {
    $this->db->from('detail_produk');
    $this->db->where($kondisi);
    $query = $this->db->get();
    return $query->row();
  }

  public function insert($data)
  {
    $this->db->insert('detail_produk', $data);
    return TRUE;
  }
  
  public function delete($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
    return TRUE;
  }

  public function edit($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
    return TRUE;
  }

  public function getAll_tahunan($year)
  {
    $this->db->select('*');
    $this->db->from('detail_produk');
    $this->db->where('YEAR(tanggal) =' . $year);

    return $this->db->get();
  }

  public function getAll_bulanan($month, $year)
  {
    $this->db->select('*');
    $this->db->from('detail_produk');
    $this->db->where('MONTH(tanggal) =' . $month);
    $this->db->where('YEAR(tanggal) =' . $year);

    return $this->db->get();
  }

  public function getAll_mingguan($week_start, $week_end)
  {
    $this->db->select('*');
    $this->db->from('detail_produk');
    $this->db->where('DATE(tanggal) >= \'' . $week_start . '\'');
    $this->db->where('DATE(tanggal) <= \'' . $week_end . '\'');

    return $this->db->get();
  }
}
