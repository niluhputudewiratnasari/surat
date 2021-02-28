<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Arsip_model extends CI_Model
{
	
	public function getArsip()
	{
		$query = "SELECT `arsip_masuk`.*, `surat_masuk`.`nomor_surat`,`surat_masuk`.`perihal`
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

	public function getId($id)
	{
		return $this->db->get_where('arsip_masuk',['id_arsipmasuk' => $id])->row_array();
	}
	public function editasm()
	{
		$data = [
			'id_arsipmasuk' => $this->input->post('id_arsipmasuk', true),
			'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk', true),
			'nomor_surat' => $this->input->post('nomor_surat', true),
			'perihal' => $this->input->post('perihal', true),
			'pengirim' => $this->input->post('pengirim', true),
			'tgl_surat' => $this->input->post('tgl_surat', true)
		];

		$this->db->where('id_arsipmasuk', $this->input->post('id_arsipmasuk'));
		$this->db->update('arsip_masuk', $data);
	}
	public function simpanasm($input_id, $data)
	{
		$this->db->where(['id_arsipmasuk' => $input_id])->update('arsip_masuk', $data);
	}
	public function getWhereasm($id)
	{

		return $this->db->get_where('surat_masuk',['id_suratmasuk' => $id])->row_array();
		return $this->db->get_where('arsip_masuk',['id_arsipmasuk' => $id])->row_array();
	}

	public function buat_kode()
	{
		
		$tgl = date('dmY');
		$this->db->select('RIGHT(arsip_masuk.id_arsipmasuk,4) as kode', FALSE);
		$this->db->order_by('id_arsipmasuk','DESC');    
		$this->db->limit(1);    
		  $query = $this->db->get('arsip_masuk');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		  	$data = $query->row();      
		  	$kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		  	$kode = 1;    
		  }
		  

		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "No. Arsip Masuk ".$tgl."-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
		}

	}