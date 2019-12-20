<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class koran {

	public function tittleMenu($judul, $menu, $icon) {
		switch ($menu) {
			case 'Beranda':
				$pesan = "Selamat datang di aplikasi kami.";
			break;
			case 'Master Data':
				$pesan = "Melihat, Menambah dan Mengubah Data ";
			break;
			case 'Transaksi':
				$pesan = "Melihat dan Menambah ";
			break;
			case 'Stok':
				$pesan = "Melihat ";
			break;
			case 'Laporan':
				$pesan = "Melihat ";
			break;
			default:
			break;
		}
		if ($judul == 'Beranda') {
			echo "	<div class='app-title text-info'>
						<div>
					    	<h1><i class='$icon'></i> $judul</h1>
					    	<p>$pesan</p>
					  	</div>
					  	<ul class='app-breadcrumb breadcrumb side'>
					    	<li class='breadcrumb-item'><i class='fa fa-windows fa-lg'></i></li>
					  	</ul>
					</div>";
		}
		else {
			echo "	<div class='app-title text-info'>
						<div>
					    	<h1><i class='$icon'></i> $judul</h1>
					    	<p>$pesan $judul</p>
					  	</div>
					  	<ul class='app-breadcrumb breadcrumb side'>
					    	<li class='breadcrumb-item'><i class='fa fa-windows fa-lg'></i></li>
					    	<li class='breadcrumb-item'>$menu</li>
					    	<li class='breadcrumb-item active'>$judul</li>
					  	</ul>
					</div>";
		}
	}

	public function rowOpen($jumlah) {
		switch ($jumlah) {
			case 12: $jml = 12; break;
			case 11: $jml = 11; break;
			case 10: $jml = 10; break;
			case 9: $jml = 9; break;
			case 8: $jml = 8; break;
			case 7: $jml = 7; break;
			case 6: $jml = 6; break;
			case 5: $jml = 5; break;
			case 4: $jml = 4; break;
			default: $jml = 12; break;
		}
		echo 	"<div class='row'>
				 	<div class='col-md-$jml'>
				    	<div class='tile text-primary'>";
	}
	public function rowClose() {
		echo 	"		</div>
					</div>
				</div>";
	}
	public function inputOpen($nama) {
		echo "	<div class='form-group'>
		        	<label class='control-label'><strong>$nama</strong></label>";	
	}
	public function inputOpenFormRow($nama, $angka) {
		echo "	<div class='form-group col-md-$angka'>
		        	<label class='control-label'><strong>$nama</strong></label>";	
	}
	public function inputOpenRow($nama) {
		echo "	<div class='form-group row'>
		        	<label class='control-label col-md-2'><strong>$nama</strong></label>
		            <div class='col-md-10'>";	
	}
	public function inputPasswordOpen($nama) {
		echo "	<div class='form-group'>
				    <label class='control-label col-md-2'><strong>$nama</strong></label>
				    <div class='input-group col-md-10'>";	
	}
	public function inputPasswordOpenRow($nama) {
		echo "	<div class='form-group row'>
				    <label class='control-label col-md-2'><strong>$nama</strong></label>
				    <div class='input-group col-md-10'>";	
	}		
    public function inputPasswordClose() {
	    echo "		<div class='input-group-prepend'><span class='input-group-text'><i class='fa fa-eye'></i></span></div>
					</div>
	    		</div>";
    }
	public function inputClose() {
		echo "	</div>";	
	}
	public function inputEdit($id) {
		echo "	<input class='form-control col-md-12' type='hidden' name='id' value='$id'>
				<input class='form-control col-md-12' type='hidden' name='aksi' value='edit'>";
	}
	public function inputEditTransaksi($id, $kode) {
		echo "	<input class='form-control col-md-12' type='hidden' name='kode' value='$id'>
				<input class='form-control col-md-12' type='hidden' name='kode_bahan' value='$kode'>
				<input class='form-control col-md-12' type='hidden' name='aksi' value='edit'>";
	}
	public function inputEditTransaksi1($id) {
		echo "	<input class='form-control col-md-12' type='hidden' name='no' value='$id'>
				<input class='form-control col-md-12' type='hidden' name='aksi' value='edit'>";
	}
	public function inputAdd($id, $kode) {
		echo "	<input class='form-control col-md-12' type='hidden' name='id' value='$id' readonly=''>
				<input class='form-control col-md-12' type='hidden' name='kode' value='$kode' readonly=''>
				<input class='form-control col-md-12' type='hidden' name='aksi' value='' readonly=''>";
	}
	public function inputTransaksi($kode) {
		echo "	<input class='form-control col-md-12' type='hidden' name='kode' value='$kode' readonly=''>";
	}
	public function inputSelesaiPembelian($no, $total, $kode) {
		echo "	<input type='hidden' name='no' value='$no' readonly='readonly'>
				<input type='hidden' name='total' value='$total' readonly=''>
				<input type='hidden' name='kode_pembelian' value='$kode' readonly=''>";
	}
	public function modalOpen($judul) {
		echo "	<div class='bs-component'>
					<div class='modal' id='tambah'>
				    	<div class='modal-dialog' role='document'>
				    		<div class='modal-content'>
				        		<div class='modal-header'>
				          			<h5 class='modal-title'>Simpan $judul</h5>
				        		</div>";
	}
	public function modalClose() {
		echo 	"			</div>
    					</div>
  					</div>
				</div>";
	}
	public function button() {
		echo "	<div class='tile-footer'>
					<button class='btn btn-outline-secondary' type='button' onclick='history.back(-1)'><i class='fa fa-fw fa-lg fa-times-circle'></i>Kembali</button>
					&nbsp;&nbsp;
					<button type='submit' class='btn btn-outline-success'><i class='fa fa-fw fa-lg fa-check-circle'></i>Simpan</button>
				</div>";
	}
	public function button2($url) {
		echo "	<div class='tile-footer'>
					<a class='btn btn-outline-secondary' href='$url'><i class='fa fa-fw fa-lg fa-times-circle'></i>Kembali</a>
					&nbsp;&nbsp;
					<button type='submit' class='btn btn-outline-success'><i class='fa fa-fw fa-lg fa-check-circle'></i>Simpan</button>
				</div>";
	}
	public function button3($url) {
		echo "	<div class='tile-footer'>
					<a class='btn btn-sm btn-outline-secondary' href='$url'><i class='fa fa-fw fa-lg fa-times-circle'></i>Kembali</a>
					&nbsp;&nbsp;
					<button type='submit' class='btn btn-sm btn-outline-success'><i class='fa fa-fw fa-lg fa-check-circle'></i>Ubah</button>
				</div>";
	}
	public function button4($url) {
		echo "	<div class='tile-footer'>
					<a class='btn btn-sm btn-outline-secondary' href='$url'><i class='fa fa-fw fa-lg fa-times-circle'></i>Kembali</a>
					&nbsp;&nbsp;
					<button type='submit' class='btn btn-sm btn-outline-success'><i class='fa fa-fw fa-sm fa-calculator'></i>Hitung</button>
				</div>";
	}
	public function button5() {
		echo "	<div class='tile-footer'>
					<button type='submit' class='btn btn-sm btn-outline-danger'><i class='fa fa-fw fa-lg fa-check-circle'></i>Hapus</button>
				</div>";
	}
	public function button6() {
		echo "	<div class='tile-footer'>
					<button type='button' class='btn btn-outline-secondary' data-dismiss='modal'><i class='fa fa-fw fa-lg fa-close'></i>Tutup</button>
				</div>";
	}
	public function kotakPesan($pesan) {
		return 	$box	= 	"<div class='row'>
								<div class='col-md-12'>
									<div class='bs-component'>
			              				<div class='alert alert-dismissible alert-success'>
											<button class='close' type='button' data-dismiss='alert'>×</button>
											<h4>Berhasil!</h4>
			                				<p>$pesan</p>
										</div>
									</div>
								</div>
							</div>";
	}
	public function kotakPesanEror($pesan) {
		return 	$box	= 	"<div class='row'>
								<div class='col-md-12'>
									<div class='bs-component'>
			              				<div class='alert alert-dismissible alert-danger'>
											<button class='close' type='button' data-dismiss='alert'>×</button>
											<h4>Berhasil!</h4>
			                				<p>$pesan</p>
										</div>
									</div>
								</div>
							</div>";
	}
}