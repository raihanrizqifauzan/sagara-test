<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Karyawan extends CI_Model {

	private $_table = "karyawan";

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getLastKaryawan()
	{
		$this->db->order_by('nik', 'DESC');
		return $this->db->get($this->_table)->row();
	}

	public function save($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function getByNik($nik)
	{
		$this->db->where('nik', $nik);
		return $this->db->get($this->_table)->row();
	}

	public function update($data, $nik)
	{
		$this->db->set($data);
		$this->db->where('nik', $nik);
		return $this->db->update($this->_table);
	}

	public function delete($nik)
	{
        return $this->db->delete($this->_table, array("nik" => $nik));
	}
}
