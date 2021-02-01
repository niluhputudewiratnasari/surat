<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Laporan_model extends CI_Model
{
	
	public function getLap()
	{
		$query = "SELECT `surat_masuk`.*, `kode_klasifikasi`.`klasifikasi`
		FROM `surat_masuk` JOIN `kode_klasifikasi`
		ON  `surat_masuk`.`klasifikasi` = `kode_klasifikasi`.`klasifikasi`
		WHERE `surat_masuk`.`tgl_surat`='$bulantahun'
		";
		return $this->db->query($query)->result_array();
	}
}