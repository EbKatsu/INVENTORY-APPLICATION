<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Laporan extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('DetailChecklist_model');
		$this->cekLogin('admin');
		$this->db->query("set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");
	}
	public function index()
	{

		echo $this->view('admin/laporan/index');
	}
	public function mingguan()
	{

		echo $this->view('admin/laporan/mingguan');
	}

	public function bulanan()
	{
		echo $this->view('admin/laporan/bulanan');
	}

	public function tahunan()
	{
		echo $this->view('admin/laporan/tahunan');
	}

	public function cetak_tahunan()
	{
		$tahun = $this->input->post('tahun');
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("C:/xampp/htdocs/PTKAI3/application/controllers/admin/TEMPLATE.xlsx");
		$semua_data = $this->DetailChecklist_model->getAll_tahunan($tahun)->result();
		$user = $this->session->username;
		$tanggal = $this->session->tanggal;
		$kolom = 12;
		$nomor = 1;
		foreach ($semua_data as $data) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C' . '8', $user)
				->setCellValue('C' . '9', $tanggal)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $data->id)
				->setCellValue('C' . $kolom, $data->nama_produk)
				->setCellValue('D' . $kolom, $data->kondisi);

			$objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$objDrawing->setPath('./assets/upload/images/' . $data->image);
			$objDrawing->setCoordinates('E' . $kolom);
			$objDrawing->setWorksheet($spreadsheet->setActiveSheetIndex(0));
			$spreadsheet->setActiveSheetIndex(0)
				->getRowDimension($kolom)->setRowHeight(120);

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('F' . $kolom, $data->keterangan)
				->setCellValue('G' . $kolom, $data->tanggal);


			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-tahunan';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
	public function cetak_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("C:/xampp/htdocs/PTKAI3/application/controllers/admin/TEMPLATE.xlsx");
		$semua_data = $this->DetailChecklist_model->getAll_bulanan($bulan, $tahun)->result();
		$user = $this->session->username;
		$tanggal = $this->session->tanggal;
		$kolom = 12;
		$nomor = 1;
		foreach ($semua_data as $data) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C' . '8', $user)
				->setCellValue('C' . '9', $tanggal)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $data->id)
				->setCellValue('C' . $kolom, $data->nama_produk)
				->setCellValue('D' . $kolom, $data->kondisi);

			$objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$objDrawing->setPath('./assets/upload/images/' . $data->image);
			$objDrawing->setCoordinates('E' . $kolom);
			$objDrawing->setWorksheet($spreadsheet->setActiveSheetIndex(0));
			$spreadsheet->setActiveSheetIndex(0)
				->getRowDimension($kolom)->setRowHeight(120);

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('F' . $kolom, $data->keterangan)
				->setCellValue('G' . $kolom, $data->tanggal);


			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-bulanan';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function cetak_mingguan()
	{
		$week_start = $this->input->post('week_start');
		$week_end = $this->input->post('week_end');
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("C:/xampp/htdocs/PTKAI3/application/controllers/admin/TEMPLATE.xlsx");
		$semua_data = $this->DetailChecklist_model->getAll_mingguan($week_start, $week_end)->result();
		$user = $this->session->username;
		$tanggal = $this->session->tanggal;
		$kolom = 12;
		$nomor = 1;
		foreach ($semua_data as $data) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('C' . '8', $user)
				->setCellValue('C' . '9', $tanggal)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $data->id)
				->setCellValue('C' . $kolom, $data->nama_produk)
				->setCellValue('D' . $kolom, $data->kondisi);

			$objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$objDrawing->setPath('./assets/upload/images/' . $data->image);
			$objDrawing->setCoordinates('E' . $kolom);
			$objDrawing->setWorksheet($spreadsheet->setActiveSheetIndex(0));
			$spreadsheet->setActiveSheetIndex(0)
				->getRowDimension($kolom)->setRowHeight(120);

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('F' . $kolom, $data->keterangan)
				->setCellValue('G' . $kolom, $data->tanggal);


			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-mingguan';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
