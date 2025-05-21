<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek_model extends CI_Model {

    public function get_all_merek() {
        return $this->db->get('tbl_merek')->result_array();
    }

    public function get_merek_by_id($id) {
        return $this->db->get_where('tbl_merek', ['id_merek' => $id])->row_array();
    }

    public function insert_merek($data) {
        return $this->db->insert('tbl_merek', $data);
    }

    public function update_merek($id, $data) {
        $this->db->where('id_merek', $id);
        return $this->db->update('tbl_merek', $data);
    }

    public function delete_merek($id) {
        $this->db->where('id_merek', $id);
        return $this->db->delete('tbl_merek');
    }
}
