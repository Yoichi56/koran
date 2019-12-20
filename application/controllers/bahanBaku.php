<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bahanBaku extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		} 
	}
	public $tabel_db	=	"bahan"; #	nama tabel di db
	public $pk 			= 	"kode_bahan"; #	nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"Bahan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-cubes";
		$data['hasil'] 		=	$this->master_data->tampilkan($this->tabel_db);
		$data['url']		=	site_url('bahanBaku/tambah_bahanBaku');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/bahan_baku/index', $data);
		$this->load->view('template/footer');	
	}
	public function tambah_bahanBaku() {
		$data['judul'] 		=	"Bahan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-cubes";
		$data['url']		=	site_url('bahanBaku/tambah_bahanBaku');
		$data['back']		=	site_url('bahanBaku');
		$data['id']			=	$this->master_data->masterData($this->tabel_db, $this->pk);
		$data['kode']		=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bahan_baku/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$pesan = "Bahan Baku <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bahanBaku');
		}
	}
	public function ubah_bahanBaku() {
		$data['judul'] 		=	"Bahan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-cubes";
		$data['url']		=	site_url('bahanBaku/ubah_bahanBaku/'.$this->uri->segment(3));
		$data['back']		=	site_url('bahanBaku');
		$data['hasil'] 		=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bahan_baku/edit', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$kode	=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;
			$pesan 	= 	"Bahan Baku <b>".$kode."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil diubah.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bahanBaku');
		}
	}
}