<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->cekLogin('admin');
		$this->load->model('Checklist_model');

    }
	public function index()
	{
        $data['produk'] = $this->db->query("select * from produks ")->result();
		$data['no'] = 1;
		echo $this->view('admin/checklist/index', $data);
	}
	public function hapus($id)
	{
		$this->db->where('id_produk', $id)->delete('produks');
		redirect('admin/checklist');
	}
	public function tambah()
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->insert('produks', $data);
			redirect('admin/checklist');
		}else{
			$data['produk'] = $this->db->get('produks')->result();
			echo $this->view('admin/checklist/tambah', $data);
		}
	}
	public function edit($id)
	{
		if($this->input->post()){
			$data = $this->input->post();
			$this->db->where('id_produk', $id)->update('produks', $data);
			redirect('admin/checklist');
		}else{
			$data['detail'] = $this->db->where('id_produk', $id)->get('produks')->row();
			echo $this->view('admin/checklist/edit', $data);
		}
	}
}
