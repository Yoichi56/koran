<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pemasok extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		} 
	}
	public $tabel_db	=	"pemasok"; # nama tabel di db
	public $pk 			= 	"id_pemasok"; # nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"Pemasok";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-user-circle";
		$data['hasil'] 		=	$this->master_data->tampilkan($this->tabel_db);
		$data['url']		=	site_url('pemasok/tambahPemasok');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/pemasok/index', $data);
		$this->load->view('template/footer');	
	}
	public function tambahPemasok() {
		$data['judul'] 		=	"Pemasok";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-user-circle";
		$data['url']		=	site_url('pemasok/tambahPemasok');
		$data['back']		=	site_url('pemasok');
		$data['id']			=	$this->master_data->masterData($this->tabel_db, $this->pk);
		$data['kode']		=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/pemasok/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$pesan = "Pemasok <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('pemasok');
		}
	}
	public function ubahPemasok() {
		$data['judul'] 		=	"Pemasok";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-user-circle";
		$data['url']		=	site_url('pemasok/ubahPemasok/'.$this->uri->segment(3));
		$data['back']		=	site_url('pemasok');
		$data['hasil'] 		=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/pemasok/edit', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$kode	=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;
			$pesan 	= 	"Pemasok <b>".$kode."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil diubah.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('pemasok');
		}
	}
}