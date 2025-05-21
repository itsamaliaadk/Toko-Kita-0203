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

	// NEW EDIT PROFILE ADMIN
	public function edit_profile()
	{
		if (empty($this->session->userdata('userName'))) {
			redirect('adminpanel');
		}

		$this->load->model('Madmin');
		$data['admin'] = $this->Madmin->get_by_id('tbl_admin', ['userName' => $this->session->userdata('userName')])->row();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/formEditProfile', $data);
		$this->load->view('admin/layout/footer');
	}

	public function save_profile()
	{
		$this->load->model('Madmin');
		$usnNew = $this->input->post('userName');
		$usnOld = $this->session->userdata('userName');

		$this->Madmin->update('tbl_admin', ['userName' => $usnNew], 'userName', $usnOld);

		// update session biar ga logout
		$this->session->set_userdata('userName', $usnNew);
		$this->session->set_flashdata('msg', 'Username changed successfully!');
		redirect('adminpanel/edit_profile');
	}

	// NEW = 5656 | OLD = 12345
	public function save_password()
	{
		// mengecek apakah user sudah login
		if (empty($this->session->userdata('userName'))) {
			redirect('adminpanel/edit_profile');
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
		$this->session->set_flashdata('msg', 'Password changed successfully!');

		redirect('adminpanel/edit_profile');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('adminpanel');
	}
}
