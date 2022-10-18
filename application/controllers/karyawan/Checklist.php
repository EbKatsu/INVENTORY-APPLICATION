<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->cekLogin('karyawan');

    }
	public function index()
	{
        $data['produk'] = $this->db->query("select * from produks ")->result();
		$data['no'] = 1;
		echo $this->view('karyawan/checklist/index', $data);
	}
	public function hapus($id)
	{
		$this->db->where('id_produk', $id)->delete('produks');
		redirect('karyawan/checklist');
	}
	public function tambah()
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->insert('produks', $data);
			redirect('karyawan/checklist');
		}else{
			$data['produk'] = $this->db->get('produks')->result();
			echo $this->view('karyawan/checklist/tambah', $data);
		}
	}
	public function edit($id)
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->where('id_produk', $id)->update('produks', $data);
			redirect('karyawan/checklist');
		}else{
			$data['detail'] = $this->db->where('id_produk', $id)->get('produks')->row();
			echo $this->view('karyawan/checklist/edit', $data);
		}
	}
}
