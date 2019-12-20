<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class transaksi extends CI_Model {

	public function masterTransaksi() {
		$str = "";
	    $characters = array_merge(range('0','9'));
	    $max = count($characters) - 1;
	    for ($i = 0; $i < 10; $i++) {
	        $rand = mt_rand(0, $max);
	        $str  .= $characters[$rand];
	    }
	    return $str;
	}
	public function tampilkanDaftarPembelian() {
		$this->db->select('kode_pembelian, a.kode, tanggal, total, a.id_pemasok, b.kode kodee, nama, status, no');
		$this->db->from('pembelian a');
		$this->db->join('pemasok b', 'a.id_pemasok = b.id_pemasok');
		$this->db->order_by('no', 'DESC');
		return $this->db->get()->result_array();
	}
	public function simpanDaftarPembelian() {
		$data = [
					'no'				=>	$this->master_data->masterData('pembelian', 'no'),
					'kode_pembelian'	=>	$_POST['id'],
					'kode'				=>	$_POST['kode'],
					'tanggal'			=>	date('Y-m-d'),
					'id_pemasok'		=>	$_POST['id_pemasok'],
					'status'			=>	'Menunggu Pembelian' #belum beli-beli bahan
				];
		$this->db->insert('pembelian', $data); 
	}
	public function ambilPembelianYangMenunggu() {
		$this->db->select('a.kode_pembelian, a.kode, nama, a.status');
	    $this->db->from('pembelian a');
	    $this->db->join('pemasok b', 'a.id_pemasok = b.id_pemasok');
		$this->db->where('a.status', 'Menunggu Pembelian');
		//$this->db->order_by('kode_pembelian', 'DESC');
		$this->db->limit(1);
		return $this->db->get('pembelian')->row_array();
	}
	public function ambilBahan($id) {
		$query = "	SELECT a.kode_bahan, a.kode, a.nama, keterangan, kode_pembelian 
					FROM ( 
						SELECT a.kode_bahan, a.kode, a.nama, keterangan, 
							(SELECT b.kode_pembelian FROM detail_pembelian b WHERE a.kode_bahan = b.kode_bahan AND b.kode_pembelian = '$id' 
							) AS kode_pembelian 
						FROM bahan a 
					) A";
		return $this->db->query($query)->result_array();
	}
	public function ambil_1DaftarPembelian($id) {
		$this->db->select('kode_pembelian, a.kode, tanggal, total, a.id_pemasok, b.kode kodee, nama, status');
	    $this->db->from('pembelian a');
	    $this->db->join('pemasok b', 'a.id_pemasok = b.id_pemasok');
	    $this->db->where('kode_pembelian', $id);
		return $this->db->get()->row_array();
	}
	public function ambil_1Pembelian($id, $kode) {
		$this->db->select('*');
		$this->db->from('bahan a');
		$this->db->join('detail_pembelian b', 'a.kode_bahan = b.kode_bahan');
		$this->db->join('pembelian c', 'b.kode_pembelian = c.kode_pembelian');
		$this->db->where('c.kode_pembelian', $id);
		$this->db->where('b.kode_bahan', $kode);
		return $this->db->get()->row_array();
	}
	public function hasilPembelian($id) {
		$this->db->select('*');
		$this->db->from('bahan a');
		$this->db->join('detail_pembelian b', 'a.kode_bahan = b.kode_bahan');
		$this->db->join('pembelian c', 'b.kode_pembelian = c.kode_pembelian');
		$this->db->where('c.kode_pembelian', $id);
		return $this->db->get()->result_array();
	}
	public function simpanPembelian() {
		$harga 	=	str_replace(".", "", $_POST['harga']);
		if ($_POST['kode_bahan'] == '1') {
			$this->db->where('kode_bahan', $_POST['kode_bahan']);
			$ambil  =	$this->db->get('bahan')->row()->isi;
			$jumlah =	$ambil * $_POST['jumlah'];
			$qty	=	$_POST['jumlah'];
		}
		else {
			$jumlah =	$_POST['jumlah'];
			$qty	=	0;
		}

		$simpan = 	array(
							'kode_pembelian'	=>	$_POST['kode'],
							'kode_bahan'		=>	$_POST['kode_bahan'],
							'jumlah'			=>	$jumlah,
							'harga_beli'		=>	$harga,
							'subtotal'			=>	$_POST['jumlah'] * $harga,
							'input_jumlah'		=>	$qty
						);

		if ($_POST['aksi'] == 'edit') {
			$this->db->where('kode_pembelian', $_POST['kode']);
			$this->db->where('kode_bahan', $_POST['kode_bahan']);
			$this->db->update('detail_pembelian', $simpan); 	
		} else {
			$this->db->insert('detail_pembelian', $simpan);
		}
	}
	public function hapus($id, $kode) {
		$this->db->where(array('kode_pembelian' => $id, 'kode_bahan' => $kode));
		$this->db->delete('detail_pembelian');
	}
	public function selesai_pembelian() {
 		$this->db->set('total', $_POST['total']);
		$this->db->set('status', "Sudah Diproses");
		$this->db->where('kode_pembelian', $_POST['kode_pembelian']);
		$this->db->update('pembelian');
 	}
 	public function tambah_stok_bahan() {
		$batas	=	$_POST['no'];

		for ($i = 0; $i < $batas ; $i++) {
			$jumlah	= 	"".$_POST['jumlah'][$i]."";
			$kode 	=	"".$_POST['kode_bahan'][$i]."";
			$this->db->set('stok', "stok + ".$jumlah."", FALSE);
			$this->db->where('kode_bahan', $kode);
			$this->db->update('stok_bahan');
		}
	}
	public function kurang_stok_bahan() {
		for ($i = 0; $i < sizeof($_POST['jumlah']) ; $i++) {
			$jumlah	= 	"".$_POST['jumlah'][$i]."";
			$kode 	=	"".$_POST['kode_bahan'][$i]."";
			$this->db->set('stok', "stok - ".$jumlah."", FALSE);
			$this->db->where('kode_bahan', $kode);
			$this->db->update('stok_bahan');
		}
	}
	public function buatProduksi($tabel, $id) {
		date_default_timezone_set('Asia/Jakarta');
		$data	=	[
						'kode_produksi'		=>	$this->master_data->masterData($tabel, $id),
						'kode_produk'		=>	$_POST['kode_produk'],
						'tanggal'			=>	date('Y-m-d'),
						'jam'				=>	date('H:i:s'),
						'jumlah'			=>	$_POST['jml'],
						'biaya_produksi'	=>	$_POST['biaya_produksi']
					];
		$this->db->insert($tabel, $data);
	}
	public function detail_produksi($tabel, $id) {
		$data	=	[
						'kode_produksi'			=>	$this->master_data->masterData($tabel, $id),
						'kode_produk'			=>	$_POST['kode_produk'],
						'biaya_bahan_baku'		=>	$_POST['bbb'],
						'biaya_tenaga_kerja'	=>	$_POST['btk'],
						'biaya_overhead_pabrik'	=>	$_POST['bop'],
						'biaya_produksi'		=>	$_POST['biaya_produksi']
					];
		$this->db->insert($tabel, $data);
	}
}