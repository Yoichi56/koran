<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class bom extends CI_Controller {
	
	public function __construct() {
		parent:: __construct();
		if ($this->session->userdata('posisi') != "Produksi") {
			redirect('welcome/blok');
		} 
	}
	public $tabel_db	=	"produk"; #	nama tabel di db
	public $pk 			= 	"kode_produk"; #	nama primary key di tabel ^^
	public function index() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['hasil'] 		=	$this->master_data->tampilkan($this->tabel_db);
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/bom/index', $data);
		$this->load->view('template/footer');	
	}
	public function lihatBOM() {
		$data['judul']		= 	"Bill Of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['back']		=	site_url('bom');
		$data['produk']		= 	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
		$data['bbb']  		= 	$this->master_data->tampilkan('bbb');
		$data['bop'] 		= 	$this->master_data->tampilkan('bop');
		$data['btk']		= 	$this->master_data->tampilkan('btk');
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/bom/detail', $data);
		$this->load->view('template/footer');
	}
	public function tambahBOM() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['back']		=	site_url('bom');
		$data['produk']		=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
		$this->load->view('template/header', $data);
		$this->template->load('template/content', 'master/bom/tabel', $data);
		$this->load->view('template/footer');	
	}
	public function tambahBBB() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['url']		=	site_url('bom/tambahBBB/'.$this->uri->segment(3));
		$data['back']		=	site_url('bom/tambahBOM/'.$this->uri->segment(3));
		$data['hasil'] 		=	$this->master_data->tampilkan('detail_bbb');
		$data['bahan'] 		=	$this->master_data->tampilkan('bahan');
		$data['produk'] 	=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
			
		$this->form_validation->set_rules('kode_bahan', 'Kode Bahan', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|callback_cek_angka');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bom/formBBB', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan('detail_bbb', 'no');
			#$pesan = "Pemasok <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			#$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bom/tambahBBB/'.$this->uri->segment(3));
		}
	}
	public function ubahBBB() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['url']		=	site_url('bom/ubahBBB/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
		$data['back']		=	site_url('bom/tambahBBB/'.$this->uri->segment(3));
		$data['hasil'] 		=	$this->master_data->tampilkan('detail_bbb1'); #detail_bbb1 gada di tabel db, biarin aja, buat dimodel
		$data['produk'] 	=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));

		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|callback_cek_angka');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bom/ubahBBB', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan('detail_bbb', 'no');
			#$pesan = "Pemasok <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			#$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bom/tambahBBB/'.$this->uri->segment(3));
		}
	}
	public function hapusBBB() {
		$this->master_data->simpan('detail_bbb', 'no');
		redirect('bom/tambahBBB/'.$this->uri->segment(3));
	}
	public function tambahBTK() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['url']		=	site_url('bom/tambahBTK/'.$this->uri->segment(3));
		$data['back']		=	site_url('bom/tambahBOM/'.$this->uri->segment(3));
		$data['hasil'] 		=	$this->master_data->tampilkan('detail_biaya_tenagakerja');
		$data['pekerjaan']	=	$this->master_data->tampilkan('pekerjaan');
		$data['produk'] 	=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
			
		$this->form_validation->set_rules('kode_pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('tarif', 'Tarif', 'required|callback_cek_angka');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bom/formBTK', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan('detail_biaya_tenagakerja', 'no');
			#$pesan = "Pemasok <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			#$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bom/tambahBTK/'.$this->uri->segment(3));
		}
	}
	public function ubahBTK() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['url']		=	site_url('bom/ubahBTK/'.$this->uri->segment(3));
		$data['back']		=	site_url('bom/tambahBTK/'.$this->uri->segment(3));
		$data['hasil'] 		=	$this->master_data->tampilkan('detail_biaya_tenagakerja1'); #detail_biaya_tenagakerja1 gada di tabel db, biarin aja, buat dimodel
		$data['produk'] 	=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));

		$this->form_validation->set_rules('tarif', 'Tarif', 'required|callback_cek_angka');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bom/ubahBTK', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan('detail_biaya_tenagakerja', 'no');
			#$pesan = "Pemasok <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			#$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bom/tambahBTK/'.$this->uri->segment(3));
		}
	}
	public function hapusBTK() {
		$this->master_data->simpan('detail_biaya_tenagakerja', 'no');
		redirect('bom/tambahBTK/'.$this->uri->segment(3));
	}
	public function tambahBOP() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['url']		=	site_url('bom/tambahBOP/'.$this->uri->segment(3));
		$data['back']		=	site_url('bom/tambahBOM/'.$this->uri->segment(3));
		$data['hasil'] 		=	$this->master_data->tampilkan('detail_beban');
		$data['beban']		=	$this->master_data->tampilkan('beban');
		$data['produk'] 	=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));
			
		$this->form_validation->set_rules('kode_beban', 'Beban', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bom/formBOP', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan('detail_beban', 'no');
			#$pesan = "Pemasok <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			#$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bom/tambahBOP/'.$this->uri->segment(3));
		}
	}
	/*public function ubahBOP() {
		$data['judul'] 		=	"Bill of Material";
		$data['menu'] 		=	"Master Data";
		$data['icon'] 		=	"fa fa-list-alt";
		$data['url']		=	site_url('bom/ubahBOP/'.$this->uri->segment(3));
		$data['back']		=	site_url('bom/tambahBOP/'.$this->uri->segment(3));
		$data['hasil'] 		=	$this->master_data->tampilkan('detail_beban1'); #detail_beban1 gada di tabel db, biarin aja, buat dimodel
		$data['produk'] 	=	$this->master_data->ambil1Data($this->tabel_db, $this->pk, $this->uri->segment(3));

		$this->form_validation->set_rules('angka	', 'Tarif', 'required');
		$this->form_validation->set_error_delimiters('<div><b class="text-danger">', '</b></div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->template->load('template/content', 'master/bom/ubahBTK', $data);
			$this->load->view('template/footer');	
		}
		else{
			$this->master_data->simpan('detail_biaya_tenagakerja', 'no');
			#$pesan = "Pemasok <b>".$_POST['kode']."-".jumlahAngka($_POST['id'])." ".$_POST['nama']."</b> berhasil ditambahkan.";
			#$this->session->set_flashdata('pesan', $this->koran->kotakPesan($pesan));
			redirect('bom/tambahBOP/'.$this->uri->segment(3));
		}
	}*/
	public function hapusBOP() {
		$this->master_data->simpan('detail_beban', 'no');
		redirect('bom/tambahBOP/'.$this->uri->segment(3));
	}
	public function cek_angka() {
		if (isset($_POST['jumlah']) ) {
			if (substr($_POST['jumlah'], 0, 1) == 0) {
			 	$this->form_validation->set_message('cek_angka', 'Inputan tidak boleh 0');
			 	return FALSE;
			}
			else {
				return TRUE;
			}
		}
		else {
			if (substr($_POST['tarif'], 0, 1) == 0) {
			 	$this->form_validation->set_message('cek_angka', 'Inputan tidak boleh 0');
			 	return FALSE;
			}
			else {
				return TRUE;
			}
		}
	}
}