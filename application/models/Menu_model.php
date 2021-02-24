<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Menu_model extends CI_Model
{
	
	public function getSubMenu()
	{
		$query = "SELECT `akun_sub_menu`.*, `akun_menu`.`menu`
		FROM `akun_sub_menu` JOIN `akun_menu`
		ON  `akun_sub_menu`.`menu_id` = `akun_menu`.`id`
		";
		return $this->db->query($query)->result_array();
	}

	public function hapusdata($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('akun_menu');

	}

	public function hapusdataSub($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('akun_sub_menu');

	}
	public function hapusdataKlas($id)
	{
		$this->db->where('klasifikasi', $id);
		return $this->db->delete('kode_klasifikasi');

	}
	public function getId($id)
	{
		return $this->db->get_where('akun_menu',['id' => $id])->row_array();
	}

	public function satuData($id)
	{
		return $this->db->where(['id' => $id])->get('akun_menu')->row_object();
	}
	public function simpanEdit($input_id, $data)
	{
		$this->db->where(['id' => $input_id])->update('akun_menu', $data);
	}

	public function editMenu()
	{
		$data = [
			'menu' => $this->input->post('menu', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('akun_menu', $data);
	}

	public function editSubMenu()
	{
		$data = [
			'title' => $this->input->post('title', true),
			'menu_id' => $this->input->post('menu_id', true),
			'url' => $this->input->post('url', true),
			'icon' => $this->input->post('icon', true),
			'is_active' => $this->input->post('is_active', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('akun_sub_menu', $data);
	}
	public function getIdSub($id)
	{
		return $this->db->get_where('akun_sub_menu',['id' => $id])->row_array();
	}
	public function simpanEditSub($input_id, $data)
	{
		$this->db->where(['id' => $input_id])->update('akun_sub_menu', $data);
	}
}