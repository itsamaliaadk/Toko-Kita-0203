<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function dashboard()
	{
		if (empty($this->session->userdata('userName'))) {
			redirect('adminpanel');
		}
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}

	public function login()
	{
		$this->load->model('Madmin');
		$u = $this->input->post('username');
		$p = md5($this->input->post('password'));

		$cek = $this->Madmin->cek_login($u, $p)->num_rows();

		if ($cek == 1) {
			$data_session = array(
				'userName' => $u,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('adminpanel/dashboard');
		} else {
			redirect('adminpanel');
		}
	}

	public function edit_password()
	{
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/formEditPass');
		$this->load->view('admin/layout/footer');
	}

	// NEW = 5656
	public function save_password()
	{
		// mengecek apakah user sudah login
		if (empty($this->session->userdata('userName'))) {
			redirect('adminpanel');
		}

		// ambil pass dr form
		$new_pass = $this->input->post('password');
		$hashed_password = md5($new_pass);

		// ambil usn yg lg login dr session
		$username = $this->session->userdata('userName');

		$this->load->model('Madmin');

		// save new pass ke db
		$data = array('password' => $hashed_password);
		$this->Madmin->update('tbl_admin', $data, 'userName', $username);

		// notif
		$this->session->set_flashdata('msg', 'Password changed successfully');

		redirect('adminpanel/dashboard');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('adminpanel');
	}
}
