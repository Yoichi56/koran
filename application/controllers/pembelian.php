<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pembelian extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Pemilik") {
			redirect('welcome/blok');
		} 
	}
	public function index() {
		$data['judul'] 		=	"Pembelian";
		$data['menu'] 		=	"Transaksi";
		$data['icon'] 		=	"fa fa-shopping-cart";
		$data['hasil'] 		=	$this->transaksi->tampilkanDaftarPembelian();
		$data['pembelian']	=	$this->transaksi->ambilPembelianYangMenunggu();
		$data['url']		=	site_url('pembelian/tambahDaftarPembelian');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/daftar_pembelian/index', $data);
		$this->load->view('template/footer');	
	}
	public function tambahDaftarPembelian() {
		$data['judul'] 		=	"Pembelian";
		$data['menu'] 		=	"Transaksi";
		$data['icon'] 		=	"fa fa-shopping-cart";
		$data['url']		=	site_url('pembelian/tambahDaftarPembelian');
		$data['pemasok']	=	$this->master_data->tampilkan('pemasok');
		$data['id']			=	$this->transaksi->masterTransaksi();
		$data['kode']		=	$this->db->get_where('kode', ['nama' => 'pembelian'])->row()->kode;

		$this->form_validation->set_rules('id_pemasok', 'Pemasok', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/daftar_pembelian/form', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->transaksi->simpanDaftarPembelian();
			$pesan = "Pembelian <b>".$_POST['kode']."-".$_POST['id']." </b> berhasil ditambahkan.";
			$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('pembelian');
		}
	}
	public function detailPembelian() {
		$data['judul'] 		=	"Pembelian";
		$data['menu'] 		=	"Transaksi";
		$data['icon'] 		=	"fa fa-shopping-cart";
		$data['hasil'] 		=	$this->transaksi->tampilkanDaftarPembelian();
		$data['pembelian']	=	$this->transaksi->ambilPembelianYangMenunggu();
		$data['detail']		=	$this->transaksi->hasilPembelian($this->uri->segment(3));
		$data['url']		=	site_url('pembelian/tambahDaftarPembelian');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'transaksi/daftar_pembelian/detail', $data);
		$this->load->view('template/footer');
	}
	public function tambahPembelian() {
		$this->form_validation->set_rules('kode_bahan', 'Bahan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|callback_cekAngka1');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|callback_cekAngka2');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] 		=	"Pembelian";
			$data['menu'] 		=	"Transaksi";
			$data['icon'] 		=	"fa fa-shopping-cart";
			$data['url']		=	site_url('pembelian/tambahPembelian/'.$this->uri->segment(3));
			$data['back']		=	site_url('pembelian');
			$data['bahan']		=	$this->transaksi->ambilBahan($this->uri->segment(3));
			$data['beli']		=	$this->transaksi->ambil_1DaftarPembelian($this->uri->segment(3));
			$data['detail']		=	$this->transaksi->hasilPembelian($this->uri->segment(3));
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/pembelian/form', $data);
			$this->load->view('transaksi/pembelian/hapus');
			$this->load->view('transaksi/pembelian/selesai');
			$this->load->view('template/footer');	
		}
		else{
			$this->transaksi->simpanPembelian();
			redirect('pembelian/tambahPembelian/'.$this->uri->segment(3));
		}
	}
	public function ubahPembelian() {
		$this->form_validation->set_rules('harga', 'Harga', 'required|callback_cekAngka1');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|callback_cekAngka2');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] 		=	"Pembelian";
			$data['menu'] 		=	"Transaksi";
			$data['icon'] 		=	"fa fa-shopping-cart";
			$data['url']		=	site_url('pembelian/ubahPembelian/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
			$data['back']		=	site_url('pembelian/tambahPembelian/'.$this->uri->segment(3));
			$data['beli']		=	$this->transaksi->ambil_1DaftarPembelian($this->uri->segment(3));
			$data['detail']		=	$this->transaksi->ambil_1Pembelian($this->uri->segment(3), $this->uri->segment(4));
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'transaksi/pembelian/formUbah', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->transaksi->simpanPembelian();
			redirect('pembelian/tambahPembelian/'.$this->uri->segment(3));
		}
	}
	public function hapusPembelian() {
		$this->transaksi->hapus($this->uri->segment(3), $this->uri->segment(4));
		redirect('pembelian/tambahPembelian/'.$this->uri->segment(3));
	}
	public function selesaiPembelian() {
		$this->transaksi->selesai_pembelian();
		$this->transaksi->tambah_stok_bahan();
		$batas = $_POST['no'];
		for ($i = 0; $i < $batas; $i++) { 
			
			$this->db->where('kode_bahan ', "".$_POST['kode_bahan'][$i]."");
			$query = $this->db->get('bahan');
			if($query->num_rows() >= 0){    
				$data 	 = 	$query->row();  
				$bahan   =	$data->keterangan;
				if ($bahan == 'Bahan Baku') {
					$this->laporan->menJurnal('151', $_POST['kode_pembelian'], 'Debit', "".$_POST['subtotal'][$i]."");
					$this->laporan->menJurnal('111', $_POST['kode_pembelian'], 'Kredit', "".$_POST['subtotal'][$i]."");
				} else {
					$this->laporan->menJurnal('152', $_POST['kode_pembelian'], 'Debit', "".$_POST['subtotal'][$i]."");
					$this->laporan->menJurnal('111', $_POST['kode_pembelian'], 'Kredit', "".$_POST['subtotal'][$i]."");
				}
			}
		}
		redirect('pembelian');
	}
	public function cekAngka1() {
		if ($_POST['harga'] == 0) {
			$this->form_validation->set_message('cekAngka1', '{field} tidak boleh 0');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	public function cekAngka2() {
		if ($_POST['jumlah'] == 0) {
			$this->form_validation->set_message('cekAngka2', '{field} tidak boleh 0');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
}