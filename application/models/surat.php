<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Surat extends CI_Model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}
	public function insert_data($data, $table)
	{
		$this->db->update($table,$data, $where);
	}
	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}