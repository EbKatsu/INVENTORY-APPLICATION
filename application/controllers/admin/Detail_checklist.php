<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_checklist extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->cekLogin('admin');


		$this->load->model('DetailChecklist_model');
		$this->load->model('Checklist_model');
		$this->load->library('upload');
		$this->load->library('pagination');
	}
	public function index($id = "")
	{

		$data['produk'] = $this->db->query("SELECT * FROM detail_produk WHERE id_produk = $id")->result();
		$data['id'] = $id;

		echo $this->view('admin/detailchecklist/index', $data);
	}
	public function hapus($id, $id_produk)
	{
		$where = array('id' => $id_produk);
		$this->DetailChecklist_model->delete($where, 'detail_produk');
		redirect('admin/detail_checklist/index/' . $id);
	}
	public function tambah($id)
	{
		$data['id']   = $id;
		$data['nama'] = $this->db->query("SELECT nama_produk FROM produks WHERE id_produk = $id")->result();

		echo $this->view('admin/detailchecklist/tambah', $data);
	}

	public function edit($id)
	{
		$where = array('id' => $id);
		$data['item'] = $this->DetailChecklist_model->edit($where, 'detail_produk')->result();
		echo $this->view('admin/detailchecklist/edit', $data);
	}

	public function update()
	{
		$id_produk = $this->input->post('id_produk');
		$id = $this->input->post('id');
		$kondisi = $this->input->post('kondisi');
		$tanggal = $this->input->post('tanggal');
		$keterangan = $this->input->post('keterangan');

		$config['upload_path'] = '../assets/upload/images';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $_FILES['image']['name'];


		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				$foto = $this->upload->data();
				$data = array(
					'id_produk' => $id_produk,
					'kondisi' => $kondisi,
					'keterangan' => $keterangan,
					'tanggal' => $tanggal,
					'image' => $foto['file_name']
				);
				$where = array(
					'id' => $id
				);


				$this->DetailChecklist_model->update($where, $data, 'detail_produk');
				redirect(base_url() . "karyawan/detail_checklist/index/" . $id);
			} else {
				die("Gagal Upload");
			}
		} else {
			$data = array(
				'id_produk'         => $id_produk,
				'kondisi'           => $kondisi,
				'tanggal'           => $tanggal,
				'keterangan'        => $keterangan,
				'image'             => "defaults.jpg"
			);
			$where = array(
				'id' => $id
			);
			$this->DetailChecklist_model->update($where, $data, 'detail_produk');
			redirect('admin/detail_checklist/index/' . $id_produk);
		}
	}

	public function addItem()
	{

		$id 		  = $this->input->post('id');
		$id_produk 	  = $this->input->post('id_produk');
		$nama_item    = $this->input->post('nama_item');

		$data = array(
			'id'        		=> $id,
			'id_produk'			=> $id_produk,
			'nama_produk'       => $nama_item
		);
		$this->DetailChecklist_model->insert($data);
		redirect('admin/detail_checklist/index/' . $id_produk);
	}

	//mulai function upload foto
	public function insertdata()
	{
		$id 		  = $this->input->post('id');
		$id_produk 	  = $this->input->post('id_produk');
		$nama_item    = $this->input->post('nama_item');
		$kondisi      = $this->input->post('kondisi');
		$tanggal      = $this->input->post('tanggal');
		$keterangan   = $this->input->post('keterangan');

		// get foto
		$config['upload_path'] = './assets/upload/images';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $_FILES['image']['name'];

		$this->upload->initialize($config);

		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				$foto = $this->upload->data();
				$data = array(
					'id_produk'         => $id_produk,
					'nama_produk'       => $nama_item,
					'kondisi'           => $kondisi,
					'tanggal'           => $tanggal,
					'keterangan'        => $keterangan,
					'image'             => $foto['file_name']
				);
				$this->DetailChecklist_model->insert($data);
				redirect('admin/detail_checklist/index/' . $id_produk);
			} else {
				die("gagal upload");
			}
		} else {
			$data = array(
				'id_produk'         => $id_produk,
				'nama_produk'       => $nama_item,
				'kondisi'           => $kondisi,
				'tanggal'           => $tanggal,
				'keterangan'        => $keterangan,
				'image'             => "defaults.jpg"
			);
			$this->DetailChecklist_model->insert($data);
			redirect('admin/detail_checklist/index/' . $id_produk);
		}
	}
}
