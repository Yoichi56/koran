<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class laporan extends CI_Model {

	public function menJurnal($kode_akun, $kode_transaksi, $posisi, $total) {
		$data =	[
					'no'				=>  $this->master_data->masterData('jurnal', 'no'),
					'kode_transaksi'	=>	$kode_transaksi,
					'kode_akun'			=>	$kode_akun,
					'tanggal'			=>	date('Y-m-d'),
					'posisi'			=>	$posisi,
					'nominal'			=>	$total,							
				];
		$this->db->insert('jurnal', $data);
	}
	public function menampilkanJurnal1() {
		$this->db->select('a.no, a.kode_akun, nama, tanggal, posisi, nominal, kode_transaksi');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'a.kode_akun = b.kode_akun');
		$this->db->where('tanggal', date('Y-m-d'));
		$this->db->order_by('a.no', 'ASC');
		return $this->db->get()->result_array();
	}
	public function menampilkanJurnal2($awal, $akhir) {
		$this->db->select('a.no, a.kode_akun, nama, tanggal, posisi, nominal, kode_transaksi');
		$this->db->from('jurnal a');
		$this->db->join('coa b', 'a.kode_akun = b.kode_akun');
		$this->db->where('tanggal >=', $awal);
		$this->db->where('tanggal <=', $akhir);
		$this->db->order_by('a.no', 'ASC');
		return $this->db->get()->result_array();
	}
	public function ambilTahun() {
		$this->db->select('YEAR(tanggal) tahun');
		$this->db->group_by('tahun');
		return $this->db->get('jurnal')->result_array();
	}
	public function menampilkanBukuBesar($kode, $bulan, $tahun) {
		$query 	= " SELECT  a.kode_akun, a.tanggal, nama, a.posisi, a.nominal, 
						    MONTH(tanggal) bulan, YEAR(tanggal) tahun 
					  FROM  jurnal AS a 
					  JOIN  coa AS b 
					    ON  a.kode_akun = b.kode_akun 
					 WHERE  a.kode_akun = '$kode' 
					HAVING  bulan = '$bulan' AND tahun = '$tahun' 
				  ORDER BY  a.no ASC ";
		return $this->db->query($query)->result_array();
	}
	public function ambil_1akun($kode){
		$this->db->where('kode_akun', $kode);
		return $this->db->get('coa')->row_array();
	}
}