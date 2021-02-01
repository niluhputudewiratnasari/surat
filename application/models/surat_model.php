<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Surat_model extends CI_Model
{
	
	public function getSurat()
	{
		$query = "SELECT `surat_masuk`.*, `kode_klasifikasi`.`klasifikasi`
		FROM `surat_masuk` JOIN `kode_klasifikasi`
		ON  `surat_masuk`.`klasifikasi` = `kode_klasifikasi`.`klasifikasi`
		";
		return $this->db->query($query)->result_array();
	}

	public function hapusdata($id)
	{
		$this->db->where('id_suratmasuk', $id);
		return $this->db->delete('surat_masuk');

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