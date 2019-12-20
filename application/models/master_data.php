<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class master_data extends CI_Model {

	public function masterData($tabel, $id) { #buat kode/id data, contoh: 1, 2, 3
		$sql = "SELECT $id AS kode FROM $tabel ORDER BY $id DESC LIMIT 1 ";
	    $query	=	$this->db->query($sql);    
	    if($query->num_rows() <> 0){       
	    	$data	=	$query->row();      
	    	$kode	=	intval($data->kode) + 1;     
	    }
	    else {            
	    	$kode	=	1;     
	    }
	    return $kode;  
  	}
	public function tampilkan($tabel) { 
		if($this->session->userdata('posisi') == "Produksi"){
			if ($tabel == 'detail_bbb') {
				$this->db->select('no, a.kode_bahan, nama, jumlah, kode, satuan, stok');
				$this->db->from('detail_bbb a');
				$this->db->join('bahan b', 'a.kode_bahan = b.kode_bahan');
				$this->db->join('stok_bahan c', 'b.kode_bahan = c.kode_bahan');
				$this->db->where('kode_produk', $this->uri->segment(3));
				return $this->db->get()->result_array();
			}
			elseif ($tabel == 'bbb') {
				$id 	=	$this->uri->segment(3);
				$query  = "	SELECT a.kode_bahan, a.nama, a.kode, a.satuan, harga, stok, jumlah 
								FROM ( 
								    SELECT a.kode_bahan, a.nama, a.kode, a.satuan,
								    (	SELECT MAX(b.harga_beli)
								          FROM detail_pembelian b 
								         WHERE a.kode_bahan = b.kode_bahan AND c.kode_produk = '$id'
								      GROUP BY b.kode_bahan 
								    ) AS harga,
                                    (	SELECT d.stok
								          FROM stok_bahan d 
								         WHERE a.kode_bahan = d.kode_bahan 
								    ) AS stok,
                                    (	SELECT c.jumlah
								          FROM detail_bbb c 
								         WHERE a.kode_bahan = c.kode_bahan 
								    ) AS jumlah
								    FROM bahan a
                                	JOIN detail_bbb c
                                WHERE a.kode_bahan = c.kode_bahan AND keterangan = 'Bahan Baku') A";
				return $this->db->query($query)->result_array();
			}
			elseif ($tabel == 'bop') {
				$id 	=	$this->uri->segment(3);
				$query  = "	SELECT a.kode_bahan, a.nama, a.kode, a.satuan, harga, stok, jumlah 
								FROM ( 
								    SELECT a.kode_bahan, a.nama, a.kode, a.satuan,
								    (	SELECT MAX(b.harga_beli)
								          FROM detail_pembelian b 
								         WHERE a.kode_bahan = b.kode_bahan AND c.kode_produk = '$id'
								      GROUP BY b.kode_bahan 
								    ) AS harga,
                                    (	SELECT d.stok
								          FROM stok_bahan d 
								         WHERE a.kode_bahan = d.kode_bahan 
								    ) AS stok,
                                    (	SELECT c.jumlah
								          FROM detail_bbb c 
								         WHERE a.kode_bahan = c.kode_bahan 
								    ) AS jumlah
								    FROM bahan a
                                	JOIN detail_bbb c
                                WHERE a.kode_bahan = c.kode_bahan AND keterangan = 'Bahan Penolong') A";
				return $this->db->query($query)->result_array();
			}
			elseif ($tabel == 'allBahan') {
				$id 	=	$this->uri->segment(3);
				$jml    =	$_POST['jumlah']; # post dari field inputan jumlah produksi transaksi/produksi/form.php
				$query  = "	SELECT (jumlah * '$jml') AS jumlah1, stok, a.kode_bahan, 
							  CASE 
							  WHEN (jumlah * '$jml') > stok THEN 'Kurang' 
							  ELSE 'Cukup' 
							END AS info 
							  FROM detail_bbb a 
							  JOIN stok_bahan b ON a.kode_bahan = b.kode_bahan 
							 WHERE kode_produk = '$id' AND a.kode_bahan = '1' 
							HAVING info = 'Kurang' ";
				return $this->db->query($query)->row_array();
			}
			elseif ($tabel == 'allBahan1') { # buat yg bukan kertas
				$id 	=	$this->uri->segment(3);
				$query  = "	SELECT jumlah, stok, a.kode_bahan, 
							  CASE 
							  WHEN jumlah > stok THEN 'Kurang' 
							  ELSE 'Cukup' 
							END AS info 
							  FROM detail_bbb a 
							  JOIN stok_bahan b ON a.kode_bahan = b.kode_bahan 
							 WHERE kode_produk = '$id' AND a.kode_bahan != '1' 
							HAVING info = 'Kurang' ";
				return $this->db->query($query)->row_array();
			}
			elseif ($tabel == 'btk') {
				$id 	=	$this->uri->segment(3);
				$query  = "	SELECT a.kode_pekerjaan, a.kode, a.nama, tarif, jumlah 
				              FROM ( 
					            SELECT a.kode_pekerjaan, a.kode, a.nama, tarif, 
					          		( SELECT COUNT(id_karyawan) 
					          		    FROM karyawan b 
					          		   WHERE a.kode_pekerjaan = b.kode_pekerjaan AND c.kode_produk = '$id' 
					          		) AS jumlah 
				          		FROM pekerjaan a 
				          		JOIN detail_biaya_tenagakerja c 
				          		  ON a.kode_pekerjaan = c.kode_pekerjaan 
				          	WHERE a.kode_pekerjaan = c.kode_pekerjaan) A";
				return $this->db->query($query)->result_array();
			}
			elseif ($tabel == 'detail_bbb1') {
				$this->db->select('no, a.kode_bahan, nama, jumlah, kode, satuan');
				$this->db->from('detail_bbb a');
				$this->db->join('bahan b', 'a.kode_bahan = b.kode_bahan');
				$this->db->where('kode_produk', $this->uri->segment(3));
				$this->db->where('a.kode_bahan', $this->uri->segment(4));
				return $this->db->get()->row_array();
			}
			elseif ($tabel == 'detail_biaya_tenagakerja') {
				$this->db->select('no, a.kode_pekerjaan, nama, kode, tarif');
				$this->db->from('pekerjaan a');
				$this->db->join('detail_biaya_tenagakerja b', 'a.kode_pekerjaan = b.kode_pekerjaan');
				$this->db->where('kode_produk', $this->uri->segment(3));
				return $this->db->get()->result_array();
			}
			elseif ($tabel == 'detail_beban') {
				$this->db->select('no, a.kode_beban, nama, kode');
				$this->db->from('beban a');
				$this->db->join('detail_beban b', 'a.kode_beban = b.kode_beban');
				$this->db->where('kode_produk', $this->uri->segment(3));
				return $this->db->get()->result_array();
			}
			elseif ($tabel == 'detail_biaya_tenagakerja1') {
				$this->db->select('no, a.kode_pekerjaan, nama, kode, tarif');
				$this->db->from('pekerjaan a');
				$this->db->join('detail_biaya_tenagakerja b', 'a.kode_pekerjaan = b.kode_pekerjaan');
				$this->db->where('kode_produk', $this->uri->segment(3));
				return $this->db->get()->row_array();
			}
			elseif ($tabel == 'bahan') {
				$id 	=	$this->uri->segment(3);
				$query  = "	SELECT a.kode_bahan, a.nama, a.kode, a.satuan, harga, stok, jumlah 
								FROM ( 
								    SELECT a.kode_bahan, a.nama, a.kode, a.satuan,
								    (	SELECT MAX(b.harga_beli)
								          FROM detail_pembelian b 
								         WHERE a.kode_bahan = b.kode_bahan AND c.kode_produk = '$id'
								      GROUP BY b.kode_bahan 
								    ) AS harga,
                                    (	SELECT d.stok
								          FROM stok_bahan d 
								         WHERE a.kode_bahan = d.kode_bahan 
								    ) AS stok,
                                    (	SELECT c.jumlah
								          FROM detail_bbb c 
								         WHERE a.kode_bahan = c.kode_bahan 
								    ) AS jumlah
								    FROM bahan a
                                	JOIN detail_bbb c
                                WHERE a.kode_bahan = c.kode_bahan) A";
				return $this->db->query($query)->result_array();
			}
			elseif ($tabel == 'pekerjaan') {
				$id 	=	$this->uri->segment(3);
				$query  = "	SELECT a.kode_pekerjaan, a.kode, a.nama, kode_produk 
							  FROM ( 
								SELECT a.kode_pekerjaan, a.kode, a.nama, 
									(	SELECT b.kode_produk 
										  FROM detail_biaya_tenagakerja b 
										 WHERE a.kode_pekerjaan = b.kode_pekerjaan AND b.kode_produk = '$id' 
								) AS kode_produk 
							  FROM pekerjaan a ) A";
				return $this->db->query($query)->result_array();
			}
			elseif ($tabel == 'beban') {
				$id 	=	$this->uri->segment(3);
				$query  = "	SELECT a.kode_beban, a.kode, a.nama, kode_produk 
							  FROM ( 
								SELECT a.kode_beban, a.kode, a.nama, 
									(	SELECT b.kode_produk 
										  FROM detail_beban b 
										 WHERE a.kode_beban = b.kode_beban AND b.kode_produk = '$id' 
								) AS kode_produk 
							  FROM beban a ) A";
				return $this->db->query($query)->result_array();
			}
			elseif ($tabel == 'stok_bahan') {
				$this->db->select('a.kode_bahan, nama, stok, kode, satuan');
				$this->db->from('stok_bahan a');
				$this->db->join('bahan b', 'a.kode_bahan = b.kode_bahan');
				return $this->db->get()->result_array();
			}
			else {
				return $this->db->get($tabel)->result_array();
			}
		}
		else {
			if ($tabel == 'stok_bahan') {
				$this->db->select('a.kode_bahan, nama, stok, kode, satuan');
				$this->db->from('stok_bahan a');
				$this->db->join('bahan b', 'a.kode_bahan = b.kode_bahan');
				return $this->db->get()->result_array();
			}
			elseif ($tabel == 'karyawan') {
				$this->db->select('id_karyawan, a.kode, a.nama, no_hp, b.nama pekerjaan');
				$this->db->from('karyawan a');
				$this->db->join('pekerjaan b', 'a.kode_pekerjaan = b.kode_pekerjaan');
				return $this->db->get()->result_array();
			}
			else {
				return $this->db->get($tabel)->result_array();
			}
		}
	}
	public function simpan($tabel, $id) {
		if ($tabel == 'karyawan') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'nama'				=>	$_POST['nama'],
							'no_hp'				=>	$_POST['no_hp'],
							'kode_pekerjaan'	=>	$_POST['pekerjaan']
							];
				$this->db->where($id, $_POST['id']);
				$this->db->update($tabel, $data);
			}
			else {
				$data	=	[
							'id_karyawan'		=>	$_POST['id'],
							'kode'				=>	$_POST['kode'],
							'nama'				=>	$_POST['nama'],
							'no_hp'				=>	$_POST['no_hp'],
							'kode_pekerjaan'	=>	$_POST['pekerjaan']
							];
				$this->db->insert($tabel, $data);
			}
		}
		elseif ($tabel == 'pemasok') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'nama'			=>	$_POST['nama'],
							'alamat'		=>	$_POST['alamat'],
							'no_hp'			=>	$_POST['no_hp']
							];
				$this->db->where($id, $_POST['id']);
				$this->db->update($tabel, $data);
			}
			else {
				$data	=	[
							'id_pemasok'	=>	$_POST['id'],
							'kode'			=>	$_POST['kode'],
							'nama'			=>	$_POST['nama'],
							'alamat'		=>	$_POST['alamat'],
							'no_hp'			=>	$_POST['no_hp']
							];
				$this->db->insert($tabel, $data);
			}
		}
		elseif ($tabel == 'bahan') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'nama'			=>	$_POST['nama'],
							'satuan'		=>	$_POST['satuan'],
							'keterangan'	=>	$_POST['keterangan']
							];
				$this->db->where($id, $_POST['id']);
				$this->db->update($tabel, $data);
			}
			else {
				$data	=	[
							'kode_bahan'	=>	$_POST['id'],
							'kode'			=>	$_POST['kode'],
							'nama'			=>	$_POST['nama'],
							'satuan'		=>	$_POST['satuan'],
							'keterangan'	=>	$_POST['keterangan']
							];
				$this->db->insert($tabel, $data);

				$this->db->set('kode_bahan', $_POST['id']);
				$this->db->insert('stok_bahan');
			}
		}
		elseif ($tabel == 'coa') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'kode_akun'		=>	$_POST['kode_akun'],
							'nama'			=>	$_POST['nama']
							];
				$this->db->where($id, $_POST['id']);
				$this->db->update($tabel, $data);
			}
			else {
				$data	=	[
							'no'			=>	$this->masterData($tabel, $id),
							'kode_akun'		=>	$_POST['kode_akun'],
							'nama'			=>	$_POST['nama'],
							'header_akun'	=>	substr($_POST['kode_akun'], 0, 1)
							];
				$this->db->insert($tabel, $data);
			}
		}
		elseif ($tabel == 'produk') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'nama'			=>	$_POST['nama']
							];
				$this->db->where($id, $_POST['id']);
				$this->db->update($tabel, $data);
			}
			else {
				$data	=	[
							'kode_produk'	=>	$_POST['id'],
							'kode'			=>	$_POST['kode'],
							'nama'			=>	$_POST['nama'],
							'bbb'			=>	'Belum Dibuat',
							'btk'			=>	'Belum Dibuat',
							'bop'			=>	'Belum Dibuat'
							];
				$this->db->insert($tabel, $data);
			}
		}
		elseif ($tabel == 'pekerjaan') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'nama'			=>	$_POST['nama']
							];
				$this->db->where($id, $_POST['id']);
				$this->db->update($tabel, $data);
			}
			else {
				$data	=	[
							'kode_pekerjaan'=>	$_POST['id'],
							'kode'			=>	$_POST['kode'],
							'nama'			=>	$_POST['nama'],
							];
				$this->db->insert($tabel, $data);
			}
		}
		elseif ($tabel == 'beban') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'nama'			=>	$_POST['nama']
							];
				$this->db->where($id, $_POST['id']);
				$this->db->update($tabel, $data);
			}
			else {
				$data	=	[
							'kode_beban'	=>	$_POST['id'],
							'kode'			=>	$_POST['kode'],
							'nama'			=>	$_POST['nama'],
							];
				$this->db->insert($tabel, $data);
			}
		}
		elseif ($tabel == 'detail_bbb') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'jumlah'		=>	$_POST['jumlah'],
							];
				$this->db->where('no', $_POST['no']);
				$this->db->update($tabel, $data);
			}
			elseif ($_POST['aksi'] == 'hapus') {
				$this->db->where('no', $_POST['no']);
				$this->db->delete($tabel);
			}
			else {
				$data	=	[
							'no'			=>	$this->masterData($tabel, $id),
							'kode_produk'	=>	$_POST['kode_produk'],
							'kode_bahan'	=>	$_POST['kode_bahan'],
							'jumlah'		=>	$_POST['jumlah']

							];
				$this->db->insert($tabel, $data);

				$this->db->set('bbb', 'Sudah Dibuat');
				$this->db->where('kode_produk', $_POST['kode_produk']);
				$this->db->update('produk'); 
			}
		}
		elseif ($tabel == 'detail_biaya_tenagakerja') {
			if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'tarif'		=>	str_replace(".", "", $_POST['tarif'])
							];
				$this->db->where('no', $_POST['no']);
				$this->db->update($tabel, $data);
			}
			elseif ($_POST['aksi'] == 'hapus') {
				$this->db->where('no', $_POST['no']);
				$this->db->delete($tabel);
			}
			else {
				$data	=	[
							'no'			=>	$this->masterData($tabel, $id),
							'kode_produk'	=>	$_POST['kode_produk'],
							'kode_pekerjaan'=>	$_POST['kode_pekerjaan'],
							'tarif'			=>	str_replace(".", "", $_POST['tarif'])
							];
				$this->db->insert($tabel, $data);

				$this->db->set('btk', 'Sudah Dibuat');
				$this->db->where('kode_produk', $_POST['kode_produk']);
				$this->db->update('produk'); 
			}
		}
		elseif ($tabel == 'detail_beban') {
			/*if ($_POST['aksi'] == 'edit') {
				$data	=	[
							'tarif'		=>	str_replace(".", "", $_POST['tarif'])
							];
				$this->db->where('no', $_POST['no']);
				$this->db->update($tabel, $data);
			}
			else*/if ($_POST['aksi'] == 'hapus') {
				$this->db->where('no', $_POST['no']);
				$this->db->delete($tabel);
			}
			else {
				$data	=	[
							'no'			=>	$this->masterData($tabel, $id),
							'kode_produk'	=>	$_POST['kode_produk'],
							'kode_beban'	=>	$_POST['kode_beban']
							];
				$this->db->insert($tabel, $data);

				$this->db->set('bop', 'Sudah Dibuat');
				$this->db->where('kode_produk', $_POST['kode_produk']);
				$this->db->update('produk'); 
			}
		}
	}
	public function ambil1Data($tabel, $kolom, $id) { #buat edit data
  		return $this->db->get_where($tabel, [$kolom => $id])->row_array();
  		/*if ($tabel == 'karyawan') {
  			
  		} else {
  			return $this->db->get_where($tabel, [$kolom => $id])->row_array();
  		}*/
  	}
}