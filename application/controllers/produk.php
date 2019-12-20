<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class produk extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		} 
	}
	public $tabel_db	=	"produk"; #	nama tabel di db
	public $pk 			= 	"kode_produk"; #	nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"Produk";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-cube";
		$data['hasil'] 		=	$this->master_data->tampilkan($this->tabel_db);
		$data['url']		=	site_url('produk/tambah_produk');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/produk/index', $data);
		$this->load->view('template/footer');	
	}
	public function tambah_produk() {
		$data['judul'] 		=	"Produk";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-cube";
		$data['url']		=	site_url('produk/tambah_produk');
		$data['back']		=	site_url('produk');
		$data['id']			=	$this->master_data->masterData($this->tabel_db, $this->pk);
		$data['kode']		=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/produk/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$pesan = "Produk <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('produk');
		}
	}
	public function ubah_produk() {
		$data['judul'] 		=	"Produk";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-cube";
		$data['url']		=	site_url('produk/ubah_produk/'.$this->uri->segment(3));
		$data['back']		=	site_url('produk');
		$data['hasil'] 		=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/produk/edit', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$kode	=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;
			$pesan 	= 	"Produk <b>".$kode."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil diubah.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('produk');
		}	
	}
}