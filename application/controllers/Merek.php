<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Merek_model');
        $this->load->library('session'); // Untuk menampilkan notifikasi flashdata
    }

    public function index()
    {
        $data['merek'] = $this->Merek_model->get_all_merek();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/merek/tampilMerek', $data);
        $this->load->view('admin/layout/footer');
    }

    public function create()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/merek/formAddMerek');
        $this->load->view('admin/layout/footer');
    }

    public function store()
    {
        $config['upload_path'] = './assets/foto_merek/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        $data = ['nama_merek' => $this->input->post('nama_merek')];

        if ($this->upload->do_upload('gambar')) {
            $data['gambar'] = $this->upload->data('file_name');
        }

        if ($this->Merek_model->insert_merek($data)) {
            $this->session->set_flashdata('success', 'Merek berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan merek.');
        }
        redirect('merek');
    }

    public function edit($id)
    {
        $data['merek'] = $this->Merek_model->get_merek_by_id($id);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/merek/formEditMerek', $data);
        $this->load->view('admin/layout/footer');
    }

    public function update($id)
    {
        $data = ['nama_merek' => $this->input->post('nama_merek')];

        $config['upload_path'] = './assets/foto_merek/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            // Hapus gambar lama jika ada
            $old_data = $this->Merek_model->get_merek_by_id($id);
            if (!empty($old_data['gambar']) && file_exists('./assets/foto_merek/' . $old_data['gambar'])) {
                unlink('./assets/foto_merek/' . $old_data['gambar']);
            }

            $data['gambar'] = $this->upload->data('file_name');
        }

        if ($this->Merek_model->update_merek($id, $data)) {
            $this->session->set_flashdata('success', 'Merek berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui merek.');
        }
        redirect('merek');
    }

    public function delete($id)
    {
        $data = $this->Merek_model->get_merek_by_id($id);
        if (!empty($data['gambar']) && file_exists('./assets/foto_merek/' . $data['gambar'])) {
            unlink('./assets/foto_merek/' . $data['gambar']);
        }

        if ($this->Merek_model->delete_merek($id)) {
            $this->session->set_flashdata('success', 'Merek berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus merek.');
        }
        redirect('merek');
    }
}
