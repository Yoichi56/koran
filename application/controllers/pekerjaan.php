<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pekerjaan extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		} 
	}
	public $tabel_db	=	"pekerjaan"; #	nama tabel di db
	public $pk 			= 	"kode_pekerjaan"; #	nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"Pekerjaan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-wrench";
		$data['hasil'] 		=	$this->master_data->tampilkan($this->tabel_db);
		$data['url']		=	site_url('pekerjaan/tambah_pekerjaan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/pekerjaan/index', $data);
		$this->load->view('template/footer');	
	}
	public function tambah_pekerjaan() {
		$data['judul'] 		=	"Pekerjaan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-wrench";
		$data['url']		=	site_url('pekerjaan/tambah_pekerjaan');
		$data['back']		=	site_url('pekerjaan');
		$data['id']			=	$this->master_data->masterData($this->tabel_db, $this->pk);
		$data['kode']		=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/pekerjaan/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$pesan = "Pekerjaan <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('pekerjaan');
		}
	}
	public function formUbahpekerjaan() {
		$data['judul'] 		=	"Pekerjaan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-wrench";
		$data['url']		=	site_url('pekerjaan/ubah_pekerjaan');
		$data['back']		=	site_url('pekerjaan');
		$data['hasil'] 		=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/pekerjaan/edit', $data);
		$this->load->view('template/footer');	
	}
	public function ubah_pekerjaan() {
		$data['judul'] 		=	"Pekerjaan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-wrench";
		$data['url']		=	site_url('pekerjaan/ubah_pekerjaan');
		$data['hasil'] 		=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $_POST['id']);

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/pekerjaan/edit', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$kode	=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;
			$pesan 	= 	"Pekerjaan <b>".$kode."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil diubah.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('pekerjaan');
		}
	}
}