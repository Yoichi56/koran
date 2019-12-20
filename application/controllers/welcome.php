<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {

	public function index() {
		udahLogin();
		$data['judul'] = "CV Bandung Barat";
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div><b style="color: tomato;">', '</b></div>');
		if ($this->form_validation->run() == FALSE) {
			$data['url']		=	site_url('welcome');
			$this->load->view('landing', $data);
		}
		else{
			$this->_login();
		}
	}
	private function _login() {
		$this->db->where('username', $_POST['username']);
		$this->db->from('user');
		$user 	=	$this->db->get()->row_array();
		if ($user) { 
			if ($_POST['password'] == $user['password']) {
				$data	=	[
								'nama'		=>	$user['nama'],
								'username'	=>	$user['username'],
								'posisi'	=>	$user['posisi'],
								'foto'		=>	$user['foto']
							];
				$this->session->set_userdata($data);
				redirect('beranda');
			}
			else {
				$this->session->set_flashdata('pesan2', '<div><b style="color: tomato;">Password salah!</b></div>');
				redirect('welcome');
			}
		}
		else {
			$this->session->set_flashdata('pesan1', '<div><b style="color: tomato;">Username tidak ada!</b></div>');
			redirect('welcome');	
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('welcome');
	}
	public function blok() {
		$this->load->view('errors/404');
	}
}