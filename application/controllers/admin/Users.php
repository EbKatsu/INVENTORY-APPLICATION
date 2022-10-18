<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Users extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->cekLogin('admin');
		$this->load->library('upload');
		$this->load->library('pagination');
		$this->load->model('M_user', 'm_user');
	}
	public function index()
	{
		$data['nama'] = $this->db->get('users')->result();
		echo $this->view('admin/users/index', $data);
	}
	public function hapus($id)
	{
		$this->db->where('id', $id)->delete('users');
		redirect('admin/users');
	}
	public function tambah()
	{
		if ($this->input->post()) {
			$data = $this->input->post();
			$data['password'] = md5($data['password']);
			$this->db->insert('users', $data);
			redirect('admin/users');
		} else {
			echo $this->view('admin/users/tambah');
		}
	}
	public function edit($id)
	{
		if ($this->input->post()) {
			$data = $this->input->post();
			$data['password'] = md5($data['password']);
			$this->db->where('id', $id)->update('users', $data);
			redirect('admin/users');
		} else {
			$data['detail'] = $this->db->where('id', $id)->get('users')->row();
			echo $this->view('admin/users/edit', $data);
		}
	}

	public function export_user()
	{
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("C:/xampp/htdocs/PTKAI/application/controllers/admin/laporan-user.xlsx");
		$semua_pengguna = $this->m_user->getAll()->result();
		$kolom = 2;
		$nomor = 1;
		foreach ($semua_pengguna as $pengguna) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $pengguna->nama)
				->setCellValue('C' . $kolom, $pengguna->jenis_user)
				->setCellValue('D' . $kolom, $pengguna->NIPP)
				->setCellValue('E' . $kolom, $pengguna->jabatan);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-user';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function insertdata()
	{
		$username		  = $this->input->post('username');
		$password 	  = $this->input->post('password');
		$nama    = $this->input->post('nama');
		$nipp      = $this->input->post('nipp');
		$jabatan      = $this->input->post('jabatan');
		$jenis_user   = $this->input->post('jenis_user');

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
					'username'       => $username,
					'password'       => $password,
					'nama'           => $nama,
					'NIPP'           => $nipp,
					'jabatan'        => $jabatan,
					'jenis_user'     => $jenis_user,
					'image'          => $foto['file_name']
				);
				$this->m_user->insert($data);
				redirect('admin/users/index');
			} else {
				die("gagal upload");
			}
		} else {
			$data = array(
				'username'       => $username,
				'password'       => $password,
				'nama'           => $nama,
				'NIPP'           => $nipp,
				'jabatan'        => $jabatan,
				'jenis_user'     => $jenis_user,
				'image'          => "defaults.jpg"
			);
			$this->DetailChecklist_model->insert($data);
			redirect('admin/users/index');
		}
	}
}
