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

	public function save_password()
	{
		echo $this->input->post('password');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('adminpanel');
	}
}
