<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->cekLogin('karyawan');
    }
	public function index()
	{
        echo $this->view('karyawan/beranda-karyawan');
    }
}
