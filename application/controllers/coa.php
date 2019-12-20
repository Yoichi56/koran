<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class coa extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		} 
	}
	public $tabel_db	=	"coa"; #	nama tabel di db
	public $pk 			= 	"no"; #	nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"CoA";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-newspaper-o";
		$data['hasil'] 		=	$this->master_data->tampilkan($this->tabel_db);
		$data['url']		=	site_url('coa/tambah_coa');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/coa/index', $data);
		$this->load->view('template/footer');	
	}
	public function tambah_coa() {
		$data['judul'] 		=	"CoA";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-newspaper-o";
		$data['url']		=	site_url('coa/tambah_coa');
		$data['back']		=	site_url('coa');
		$this->form_validation->set_rules('kode_akun', 'Kode Akun', 'required|is_unique[coa.kode_akun]|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/coa/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$pesan = "CoA <b>".$_POST['kode_akun']." ".$_POST['nama']."</b> berhasil ditambahkan.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('coa');
		}
	}
}