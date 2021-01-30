<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Arsip_model extends CI_Model
{
	
	public function getArsip()
	{
		$query = "SELECT `arsip_masuk`.*, `surat_masuk`.`nomor_surat`
		FROM `arsip_masuk` JOIN `surat_masuk`
		ON  `arsip_masuk`.`nomor_surat` = `surat_masuk`.`nomor_surat`
		";
		return $this->db->query($query)->result_array();
	}
	public function getSuratK()
	{
		$query = "SELECT `surat_keluar`.*, `kode_klasifikasi`.`klasifikasi`
		FROM `surat_keluar` JOIN `kode_klasifikasi`
		ON  `surat_keluar`.`klasifikasi` = `kode_klasifikasi`.`klasifikasi`
		";
		return $this->db->query($query)->result_array();
	}
	
}