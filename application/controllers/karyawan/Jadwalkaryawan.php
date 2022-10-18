<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalkaryawan extends MY_Controller {

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
	protected $_table2 = 'tb_req_jdwal';
    function __construct()
    {
        parent::__construct();
        $this->cekLogin('karyawan');
    }
	public function index()
	{
        $this->load->database();
        $data['jadwal'] = $this->db->get($this->_table)->result();
		$data['no'] = 1;
		echo $this->view('karyawan/jadwal/index', $data);
	}
	public function tambah()
	{
		if($this->input->post()){
			$data = [
				'nama' => $this->input->post('nama'),
				'tanggal' => $this->input->post('tanggal'),
				'jobdesk' => $this->input->post('jobdesk'),
				'keterangan' => $this->input->post('keterangan')
			];
			$this->db->insert('jadwal_karyawan', $data);
			redirect('karyawan/jadwalkaryawan');
		}else{
			echo $this->view('karyawan/jadwal/tambah');
		}
	}
	public function edit($id)
	{
		if($this->input->post()){
			$data = [
				'id_jadwal' => $id,
				'nama' => $this->input->post('nama'),
				'tanggal' => $this->input->post('tanggal'),
				'jobdesk' => $this->input->post('jobdesk'),
				'keterangan' => $this->input->post('keterangan')
			];
			// $this->db->truncate('tb_req_jdwal');
			// $this->db->where('id_jadwal', $id);
			// $q = $this->db->get('jadwal_karyawan')->result(); // get first table
			// foreach($q as $r) { // loop over results
			// 	 // insert each row to another table
			// }
			$this->db->insert('tb_req_jdwal', $data);
			redirect('karyawan/jadwalkaryawan');
		}else{
			$data['detail'] = $this->db->where('id_jadwal', $id)->get('jadwal_karyawan')->row();
			echo $this->view('karyawan/jadwal/edit', $data);
		}
	}
}
