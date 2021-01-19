<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Admin_model extends CI_Model
{
	public function hapusdata($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('akun_role');

	}
}