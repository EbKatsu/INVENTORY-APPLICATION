<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->cekLogin('pimpinan');
        $this->load->model('users_model');
        $this->load->library('upload');
		$this->load->library('pagination');
	}
	public function index()
	{

		echo $this->view('pimpinan/profile/profile');
	}
    public function edit()
    {
        $id 		  = $this->input->post('id');
		$username 	  = $this->input->post('username');
		$nama   = $this->input->post('nama');
		$nipp      = $this->input->post('NIPP');
        $jabatan = $this->input->post('jabatan');
		
		

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
					'username'         => $username,
					'nama'           => $nama,
					'NIPP'           => $nipp,
                    'jabatan'           => $jabatan,
					'image'             => $foto['file_name']
				);
				$this->users_model->update($data);
				redirect('pimpinan/profile/index/' . $id);
			} else {
				die("gagal upload");
			}
		} else {
			$data = array(
				'id'         => $id,
				'username'       => $username,
				'nama'           => $nama,
				'NIPP'           => $nipp,
				'jabatan'        => $jabatan,
				'image'          => "defaults.jpg"
			);
			$this->users_model->update($data);
			redirect('pimpinan/profile/index/' . $id);
		}
    }

}