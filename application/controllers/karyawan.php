<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class karyawan extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		} 
	}
	public $tabel_db	=	"karyawan";	# nama tabel di db
	public $pk 			= 	"id_karyawan"; # nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"Karyawan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-users";
		$data['hasil'] 		=	$this->master_data->tampilkan($this->tabel_db);
		$data['url']		=	site_url('karyawan/tambahKaryawan');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/karyawan/index', $data);
		$this->load->view('template/footer');	
	}
	public function tambahKaryawan() {
		$data['judul'] 		=	"Karyawan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-users";
		$data['url']		=	site_url('karyawan/tambahKaryawan');
		$data['back']		=	site_url('karyawan');
		$data['pekerjaan']	=	$this->master_data->tampilkan('pekerjaan');
		$data['id']			=	$this->master_data->masterData($this->tabel_db, $this->pk);
		$data['kode']		=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/karyawan/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$pesan = "Karyawan <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('karyawan');
		}
	}
	public function ubahKaryawan() {
		$data['judul'] 		=	"Karyawan";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-users";
		$data['url']		=	site_url('karyawan/ubahKaryawan/'.$this->uri->segment(3));
		$data['back']		=	site_url('karyawan');
		$data['hasil'] 		=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
		$data['pekerjaan']	=	$this->master_data->tampilkan('pekerjaan');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/karyawan/edit', $data);
			$this->load->view('template/footer');	
		}
		else {
			$this->master_data->simpan($this->tabel_db, $this->pk);
			$kode	=	$this->db->get_where('kode', ['nama' => $this->tabel_db])->row()->kode;
			$pesan 	= 	"Karyawan <b>".$kode."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil diubah.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('karyawan');
		}
	}
}