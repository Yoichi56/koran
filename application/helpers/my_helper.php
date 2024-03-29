<?php

	function udahLogin() {
        $koran = get_instance();
        if ($koran->session->userdata('username') || $koran->uri->segment(2) == '_login') {
            redirect('beranda');
        }
    }
	
	function rp($a) {
		if(!is_numeric($a))return NULL;
		$jumlah_desimal ="2";
		$pemisah_desimal =",";
		$pemisah_ribuan =".";
		$angka = "Rp.". number_format($a, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
		return $angka;
	}

    function angka($a) {
        if(!is_numeric($a))return NULL;
        $jumlah_desimal ="0";
        $pemisah_desimal =",";
        $pemisah_ribuan =".";
        $angka = number_format($a, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
        return $angka;
    }

    function jumlahAngka($angka) {
        $jumlah = strlen($angka);
        switch ($jumlah) {
            case 1: return "000".$angka; break;
            case 2: return "00".$angka; break;
            case 3: return "0".$angka; break;
            default: return $angka; break;
        }
    }

	function shortdate_indo($tgl) {
        $ubah		=	gmdate($tgl, time()+60*60*8);
        $pecah		=	explode("-",$ubah);
        $tanggal	=	$pecah[2];
        $bulan		=	short_bulan($pecah[1]);
        $tahun		=	$pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }

    function short_bulan($bln) {
        switch ($bln) {
            case 1: return "01"; break;
            case 2: return "02"; break;
            case 3: return "03"; break;
            case 4: return "04"; break;
            case 5: return "05"; break;
            case 6: return "06"; break;
            case 7: return "07"; break;
            case 8: return "08"; break;
            case 9: return "09"; break;
            case 10: return "10"; break;
            case 11: return "11"; break;
            case 12: return "12"; break;
        }
    }

    function bulan($bulan) {
        $nama_bulan;
        switch ($bulan) {
            case '01' :
            case 'January':
                return $nama_bulan = 'Januari';
            break;
            case '02' :
            case 'February':
                return $nama_bulan = 'Februari';
            break;
            case '03' :
            case 'March':
                return $nama_bulan = 'Maret';
            break;
            case '04' :
            case 'April':
                return $nama_bulan = 'April';
            break;
            case '05' :
            case 'May':
                return $nama_bulan = 'Mei';
            break;
            case '06' :
            case 'June':
                return $nama_bulan = 'Juni';
            break;
            case '07' :
            case 'July':
                return $nama_bulan = 'Juli';
            break;
            case '08' :
            case 'August':
                return $nama_bulan = 'Agustus';
            break;
            case '09' :
            case 'September':
                return $nama_bulan = 'September';
            break;
            case '10' :
            case 'October':
                return $nama_bulan = 'Oktober';
            break;
            case '11' :
            case 'November':
                return $nama_bulan = 'November';
            break;
            case '12' :
            case 'December':
                return $nama_bulan = 'Desember';
            break;
            default:
                return $nama_bulan = 'Salah';
            break;
        }        
    }

?>