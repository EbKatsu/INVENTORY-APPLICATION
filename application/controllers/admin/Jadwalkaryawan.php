<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Jadwalkaryawan extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	protected $_table = 'jadwal_karyawan';

	function __construct()
	{
		parent::__construct();
		$this->cekLogin('admin');
		$this->load->model('M_jadwal', 'export_mdl');
	}

	public function index()
	{
		$this->load->database();
		$data['jadwal'] = $this->db->get($this->_table)->result();
		$data['no'] = 1;
		echo $this->view('admin/jadwal/index', $data);
	}
	
	public function hapus($id)
	{
		$this->db->where('id_jadwal', $id)->delete('jadwal_karyawan');
		redirect('admin/jadwalkaryawan');
	}
	
	public function request(){
		$this->load->database();
		$data['jadwal'] = $this->db->get('tb_req_jdwal')->result();
		$data['no'] = 1;
		echo $this->view('admin/jadwal/request', $data);
	}
	public function terima($id){
		
		$q = $this->db->get('tb_req_jdwal')->result(); // get first table
        foreach($q as $r) { // loop over results
            $this->db->where('id_jadwal',$id)->update('jadwal_karyawan', $r); // insert each row to another table
        }
		$this->db->where('id_jadwal', $id)->delete('tb_req_jdwal');
		redirect('admin/jadwalkaryawan');
		// if($this->input->post()){
		// 	$data = [
		// 		'nama' => $this->input->post('nama'),
		// 		'tanggal' => $this->input->post('tanggal'),
		// 		'jobdesk' => $this->input->post('jobdesk'),
		// 		'keterangan' => $this->input->post('keterangan')
		// 	];
		// 	// $this->db->truncate('tb_req_jdwal');
		// 	// $this->db->where('id_jadwal', $id);
		// 	// $q = $this->db->get('jadwal_karyawan')->result(); // get first table
		// 	// foreach($q as $r) { // loop over results
		// 	// 	 // insert each row to another table
		// 	// }
		// 	$this->db->insert('tb_req_jdwal', $data);
		// 	redirect('karyawan/jadwalkaryawan');
		// }else{
		// 	$data['detail'] = $this->db->where('id_jadwal', $id)->get('jadwal_karyawan')->row();
		// 	echo $this->view('karyawan/jadwal/edit', $data);
		// }
		
		
	}
	public function tolak($id){
		$this->db->where('id_jadwal', $id)->delete('tb_req_jdwal');
		redirect('admin/jadwalkaryawan/request');
	}
	public function tambah()
	{
		if ($this->input->post()) {
			$data = [
				'nama' => $this->input->post('nama'),
				'tanggal' => $this->input->post('tanggal'),
				'jobdesk' => $this->input->post('jobdesk'),
				'keterangan' => $this->input->post('keterangan')
			];
			$this->db->insert('jadwal_karyawan', $data);
			redirect('admin/jadwalkaryawan');
		} else {
			echo $this->view('admin/jadwal/tambah');
		}
	}

	public function edit($id)
	{
		if ($this->input->post()) {
			$data = [
				'nama' => $this->input->post('nama'),
				'tanggal' => $this->input->post('tanggal'),
				'jobdesk' => $this->input->post('jobdesk'),
				'keterangan' => $this->input->post('keterangan')
			];
			$this->db->where('id_jadwal', $id)->update('jadwal_karyawan', $data);
			redirect('admin/jadwalkaryawan');
		} else {
			$data['detail'] = $this->db->where('id_jadwal', $id)->get('jadwal_karyawan')->row();
			echo $this->view('admin/jadwal/edit', $data);
		}
	}

	public function tukar($id)
	{
		$this->load->database();
		$data['jadwal'] = $this->db->get($this->_table)->result();
		$data['no'] = 1;
		echo $this->view('admin/jadwal/tukar', $data);
	}

	public function export_jadwal()
	{
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("C:/xampp/htdocs/PTKAI/application/controllers/admin/laporan-jadwal.xlsx");
		$semua_jadwal = $this->export_mdl->getAll()->result();
		$kolom = 2;
		$nomor = 1;
		foreach ($semua_jadwal as $jadwal) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $jadwal->nama)
				->setCellValue('C' . $kolom, $jadwal->hari)
				->setCellValue('D' . $kolom, $jadwal->keterangan);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-jadwal';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
