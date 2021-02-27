<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Disposisi_model extends CI_Model
{
	
	public function getAll()
	{
		$query = "SELECT `tabel_disposisi`.*, `surat_masuk`.`nomor_surat`
		FROM `tabel_disposisi` JOIN `surat_masuk`
		ON  `tabel_disposisi`.`id_suratmasuk` = `surat_masuk`.`id_suratmasuk`
		";
		return $this->db->query($query)->result_array();
	}
}