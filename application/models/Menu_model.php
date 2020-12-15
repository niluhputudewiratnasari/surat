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
}