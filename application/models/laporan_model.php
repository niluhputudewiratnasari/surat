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

	public function gettahuns()
	{
		$query = $this->db->query("SELECT YEAR(tgl_surat) AS tahun FROM surat_masuk GROUP BY YEAR(tgl_surat) ORDER BY YEAR(tgl_surat) ASC");


		return $query->result();
	}

	public function filterbytanggals($tanggalawal, $tanggalakhir)
	{
		$query = $this->db->query("SELECT * FROM surat_masuk WHERE tgl_surat BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tgl_surat ASC");


		return $query->result();
	}

	public function filterbybulans($tahun1,$bulanawal, $bulanakhir)
	{
		$query = $this->db->query("SELECT * FROM surat_masuk WHERE YEAR(tgl_surat) = '$tahun1' AND MONTH(tgl_surat) BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tgl_surat ASC");


		return $query->result();
	}

	public function filterbytahuns($tahun2)
	{
		$query = $this->db->query("SELECT * FROM surat_masuk WHERE YEAR(tgl_surat) = '$tahun2' ORDER BY tgl_surat ASC");


		return $query->result();
	}

	//========================================KELUAR==========================================

	public function gettahun()
	{
		$query = $this->db->query("SELECT YEAR(tgl_surat) AS tahun FROM surat_keluar GROUP BY YEAR(tgl_surat) ORDER BY YEAR(tgl_surat) ASC");


		return $query->result();
	}

	public function filterbytanggal($tanggalawal, $tanggalakhir)
	{
		$query = $this->db->query("SELECT * FROM surat_keluar WHERE tgl_surat BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tgl_surat ASC");


		return $query->result();
	}

	public function filterbybulan($tahun1,$bulanawal, $bulanakhir)
	{
		$query = $this->db->query("SELECT * FROM surat_keluar WHERE YEAR(tgl_surat) = '$tahun1' AND MONTH(tgl_surat) BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tgl_surat ASC");


		return $query->result();
	}

	public function filterbytahun($tahun2)
	{
		$query = $this->db->query("SELECT * FROM surat_keluar WHERE YEAR(tgl_surat) = '$tahun2' ORDER BY tgl_surat ASC");


		return $query->result();
	}
}