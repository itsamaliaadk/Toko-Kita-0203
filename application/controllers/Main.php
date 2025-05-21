<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
		$this->load->model('Merek_model');
		$this->load->library('cart');
	}

	public function index()
	{
		$data['produk'] = $this->Madmin->get_all_data('tbl_produk')->result();
		$data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();
		$data['merek'] = $this->Merek_model->get_all_merek();
		$this->load->view('home/layout/header', $data);
		$this->load->view('home/layanan');
		$this->load->view('home/home');
		$this->load->view('home/layout/footer');
	}

	public function register()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/register');
		$this->load->view('home/layout/footer');
	}

	public function save_reg()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$telpon = $this->input->post('telpon');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');

		$dataInput = array('username' => $username, 'password' => $password, 'namaKonsumen' => $nama, 'alamat' => $alamat, 'email' => $email, 'tlpn' => $telpon, 'statusAktif' => 'Y');
		$this->Madmin->insert('tbl_member', $dataInput);
		echo "OK";
	}

	public function login()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/login');
		$this->load->view('home/layout/footer');
	}

	public function login_member()
	{
		$this->load->model('Madmin');
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$cek = $this->Madmin->cek_login_member($u, $p)->num_rows();
		$result = $this->Madmin->cek_login_member($u, $p)->row_object();

		if ($cek == 1) {
			$data_session = array(
				'idKonsumen' => $result->idKonsumen,
				'Member' => $u,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect('main/dashboard');
		} else {
			redirect('main/login');
		}
	}

	public function dashboard()
	{
		$this->load->view('home/layout/header');
		$this->load->view('home/dashboard');
		$this->load->view('home/layout/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main/login');
	}
}
