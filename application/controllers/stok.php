<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class stok extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik" && $this->session->userdata('posisi') != "Produksi") {
			redirect('welcome/blok');
		}
	}	
	public function index() {
		$data['judul'] 		=	"Stok Bahan";
		$data['menu'] 		=	"Stok";
		$data['icon'] 		=	"fa fa-cubes";
		$data['hasil'] 		=	$this->master_data->tampilkan('stok_bahan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/stok/stok_bahan', $data);
		$this->load->view('template/footer');	
	}
}