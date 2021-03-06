<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pasien_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
	}

	function getPasienByNoHp($noHp) {
		return $this->db
		->where('no_hp', $this->db->escape_str($noHp))
		->get('pasien')
		->row();
	}

	function createPasien($data) {
		$this->db->insert('pasien', $this->service_model->escape_array($data));
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}
}
