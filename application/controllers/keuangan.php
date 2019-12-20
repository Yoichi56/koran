<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class keuangan extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		}
	}
	public function index() {
		# code...
	}
	public function jurnalUmum() {
		$data['judul']  =	"Jurnal Umum";
		$data['menu'] 	=	"Laporan";
		$data['icon'] 	=	"fa fa-file-text-o";
		$data['url']	=	site_url('keuangan/jurnalUmum');
		$this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required|callback_cekTanggal' );
		$this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required' );
	    $this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');
	    if($this->form_validation->run() == FALSE) {
	    	$data['hasil']	=	$this->laporan->menampilkanJurnal1();
	    	$data['awal']	=	date('Y-m-d');
			$data['akhir']	=	date('Y-m-d');
    		$this->load->view('template/header', $data);
			$this->template->load('template/content', 'laporan/jurnal/jurnal_umum', $data);
			$this->load->view('template/footer');	
	    } 
	    else {
			$data['hasil']	=	$this->laporan->menampilkanJurnal2($_POST['tanggal_awal'], $_POST['tanggal_akhir']);
			$data['awal']	=	$_POST['tanggal_awal'];
			$data['akhir']	=	$_POST['tanggal_akhir'];
	    	$this->load->view('template/header', $data);
			$this->template->load('template/content', 'laporan/jurnal/jurnal_umum', $data);
			$this->load->view('template/footer');	
	    }	
	}
	public function printJurnalUmum() {
		$data['judul']  =	"Jurnal Umum";
		if ($this->uri->segment(5) == 0) {
			$data['hasil']	=	$this->laporan->menampilkanJurnal1();
	    	$data['awal']	=	date('Y-m-d');
			$data['akhir']	=	date('Y-m-d');
    		$this->load->view('template/header', $data);
			$this->template->load('template/cetak', 'laporan/jurnal/printJurnal', $data);
			$this->load->view('template/footer');
		} 
		else {
			$data['hasil']	=	$this->laporan->menampilkanJurnal2($this->uri->segment(3), $this->uri->segment(4));
			$data['awal']	=	$this->uri->segment(3);
			$data['akhir']	=	$this->uri->segment(4);
	    	$this->load->view('template/header', $data);
			$this->template->load('template/cetak', 'laporan/jurnal/printJurnal', $data);
			$this->load->view('template/footer');	
		}
	}
	public function bukuBesar() {
		$data['judul']  =	"Buku Besar";
		$data['menu'] 	=	"Laporan";
		$data['icon'] 	=	"fa fa-book";
		$data['coa'] 	=	$this->master_data->tampilkan("coa");
		$data['tahun']	=	$this->laporan->ambilTahun();
		$data['url']	=	site_url('keuangan/bukuBesar');
		$this->form_validation->set_rules('kode_akun', 'Akun', 'required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'laporan/buku/buku_besar', $data);
			$this->load->view('template/footer');
		}
		else {
			$data['hasil']		=	$this->laporan->menampilkanBukuBesar($_POST['kode_akun'], $_POST['bulan'], $_POST['tahun']);
			$data['dataakun']	=	$this->laporan->ambil_1akun($_POST['kode_akun']);
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'laporan/buku/buku_besar', $data);
			$this->load->view('template/footer');
		}	
	}
	public function printBukuBesar() {
		$data['judul']  	=	"Buku Besar";
		$data['hasil']		=	$this->laporan->menampilkanBukuBesar($this->uri->segment(3), $this->uri->segment(4), $this->uri->segment(5));
		$data['dataakun']	=	$this->laporan->ambil_1akun($this->uri->segment(3));
		$this->load->view('template/header', $data);
		$this->template->load('template/cetak', 'laporan/buku/printBuku', $data);
		$this->load->view('template/footer');	
	}
	public function cekTanggal() { 
		if ($_POST['tanggal_akhir'] < $_POST['tanggal_awal']) {
		 	$this->form_validation->set_message('cekTanggal', 'Tanggal awal harus sebelum tanggal akhir.');
		 	return FALSE;
		}
		else {
			return TRUE;
		}
	}
}