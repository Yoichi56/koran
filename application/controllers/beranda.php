<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class beranda extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik" && $this->session->userdata('posisi') != "Produksi") {
			redirect('welcome/blok');
		}
	}
	public function index() {
		$data['judul'] 		=	"Beranda";
		$data['menu'] 		=	"Beranda";
		$data['icon'] 		=	"fa fa-windows";
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'home', $data);
		#$this->load->view('master/user/form', $data);
		$this->load->view('template/footer');	
	}
}