<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class produksi extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Produksi") {
			redirect('welcome/blok');
		}
	}
	public $tabel_db	=	"produk"; #	nama tabel di db
	public $pk 			= 	"kode_produk"; #	nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"Produksi";
		$data['menu'] 		=	"Transaksi";
		$data['icon'] 		=	"fa fa-industry";
		$data['hasil'] 		=	$this->master_data->tampilkan('produk');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/produksi/index', $data);
		$this->load->view('template/footer');	
	}
	public function hitung() {
		$data['judul'] 		=	"Produksi";
		$data['menu'] 		=	"Transaksi";
		$data['icon'] 		=	"fa fa-industry";
		$data['url']		=	site_url('produksi/hitung/'.$this->uri->segment(3));
		$data['back']		=	site_url('produksi');
		$data['bbb']  		= 	$this->master_data->tampilkan('bbb');
		$data['bop'] 		= 	$this->master_data->tampilkan('bop');
		$data['btk']		= 	$this->master_data->tampilkan('btk');
		$data['bhn']		= 	$this->master_data->tampilkan('bahan'); # buat ngurangin stok ketika klik tombol 'selesai'
		$data['produk'] 	=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
			
		$this->form_validation->set_rules('taksiranBOP', 'Taksiran BOP', 'required|callback_cek_angka1');
		$this->form_validation->set_rules('taksiranJumlah', 'Taksiran Jumlah', 'required|callback_cek_angka2');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|callback_cek_angka3');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/produksi/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$data['bahan']		= 	$this->master_data->tampilkan('allBahan');
			$data['bahan1']		= 	$this->master_data->tampilkan('allBahan1');
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/produksi/form', $data);
			$this->load->view('template/footer');	
		}
	}
	public function selesai() {
		$this->transaksi->kurang_stok_bahan();
		$this->transaksi->buatProduksi('produksi', 'kode_produksi');
		$this->transaksi->detail_produksi('detail_produksi', 'kode_produksi');
		$kode = $this->master_data->masterData('produksi', 'kode_produksi');
		# jurnal pemakaian bb
		$this->laporan->menJurnal('502', $kode, 'Debit', $_POST['bbb']);
		$this->laporan->menJurnal('151', $kode, 'Kredit', $_POST['bbb']);
		# jurnal pemakaian bahan penolong 
		$this->laporan->menJurnal('505', $kode, 'Debit', $_POST['bahan_penolong']);
		$this->laporan->menJurnal('152', $kode, 'Kredit', $_POST['bahan_penolong']);  
		# jurnal pemakaian biaya tenaga kerja
		$this->laporan->menJurnal('503', $kode, 'Debit', $_POST['btk']);
		$this->laporan->menJurnal('506', $kode, 'Kredit', $_POST['btk']);
		#jurnal berbagai macam di kredit
		$this->laporan->menJurnal('505', $kode, 'Debit', $_POST['btk']);
		$this->laporan->menJurnal('506', $kode, 'Kredit', $_POST['btk']);
		# jurnal biaya produksi
		$this->laporan->menJurnal('153', $kode, 'Debit', $_POST['biaya_produksi']);
		$this->laporan->menJurnal('502', $kode, 'Kredit', $_POST['bbb']);
		$this->laporan->menJurnal('503', $kode, 'Kredit', $_POST['btk']);
		$this->laporan->menJurnal('504', $kode, 'Kredit', $_POST['bop']);
		redirect('produksi');
	}
	public function cek_angka1() {
		if (isset($_POST['taksiranBOP']) ) {
			if (substr($_POST['taksiranBOP'], 0, 1) == '0') {
			 	$this->form_validation->set_message('cek_angka1', 'Taksiran BOP tidak boleh 0');
			 	return FALSE;
			}
			else {
				return TRUE;
			}
		}
	}
	public function cek_angka2(){
		if (isset($_POST['taksiranJumlah']) ) {
			if (substr($_POST['taksiranJumlah'], 0, 1) == '0') {
			 	$this->form_validation->set_message('cek_angka2', 'Taksiran jumlah tidak boleh 0');
			 	return FALSE;
			}
			else {
				return TRUE;
			}
		}
	}
	public function cek_angka3() {
		if (isset($_POST['jumlah']) ) {
			if (substr($_POST['jumlah'], 0, 1) == '0') {
			 	$this->form_validation->set_message('cek_angka3', 'Jumlah produksi tidak boleh 0');
			 	return FALSE;
			}
			else {
				return TRUE;
			}
		}
	}
}