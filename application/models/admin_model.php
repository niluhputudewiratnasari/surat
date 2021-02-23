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
	public function editRole()
	{
		$data = [
			'role' => $this->input->post('role', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('akun_role', $data);
	}
	public function getIdrole($id)
	{
		return $this->db->get_where('akun_role',['id' => $id])->row_array();
	}
	public function simpanEditrole($input_id, $data)
	{
		$this->db->where(['id' => $input_id])->update('akun_role', $data);
	}
}