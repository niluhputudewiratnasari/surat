<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Arsip_model extends CI_Model
{
	
	public function getArsip()
	{
		$query = "SELECT `arsip_masuk`.*, `surat_masuk`.`nomor_surat`,`surat_masuk`.`perihal`,`surat_masuk`.`pengirim`,`surat_masuk`.`tgl_surat`
		FROM `arsip_masuk` JOIN `surat_masuk`
		ON  `arsip_masuk`.`id_suratmasuk` = `surat_masuk`.`id_suratmasuk`
		";

		
		return $this->db->query($query)->result_array();
	}

	public function getAll()
	{
		$query = "SELECT `arsip_masuk`.*, `surat_masuk`.`nomor_surat`,`surat_masuk`.`perihal`,`surat_masuk`.`pengirim`,`surat_masuk`.`tgl_surat`

		FROM `arsip_masuk` JOIN `surat_masuk`
		ON  `arsip_masuk`.`id_suratmasuk` = `surat_masuk`.`id_suratmasuk`
		";
		return $this->db->query($query)->result_array();
	}

	public function hapusdata($id)
	{
		$this->db->where('id_arsipmasuk', $id);
		return $this->db->delete('arsip_masuk');

	}
	public function editar()
	{
		$data = [
			'no' => $this->input->post('no', true),
			'tgl_arsipmasuk' => $this->input->post('tgl_arsipmasuk', true),
			'id_suratmasuk' => $this->input->post('id_suratmasuk', true),
			'nomor_surat' => $this->input->post('nomor_surat', true),
			'perihal' => $this->input->post('perihal', true),
			'pengirim' => $this->input->post('pengirim', true),
			'tgl_surat' => $this->input->post('tgl_surat', true)
		];

		$this->db->where('id_arsipmasuk', $this->input->post('id_arsipmasuk'));
		$this->db->update('arsip_masuk', $data);
	}
	public function simpanEditar($input_id, $data)
	{
		$this->db->where(['id_arsipmasuk' => $input_id])->update('arsip_masuk', $data);
	}

	public function getId($id)
	{
		return $this->db->get_where('arsip_masuk',['id_arsipmasuk' => $id])->row_array();
	}

	public function getWhereasm($id)
	{

		return $this->db->get_where('surat_masuk',['id_suratmasuk' => $id])->row_array();
		return $this->db->get_where('arsip_masuk',['id_arsipmasuk' => $id])->row_array();
	}

	public function buat_kode()
	{
		
		$tgl = date('dmY');
		$this->db->select('RIGHT(arsip_masuk.no,4) as kode', FALSE);
		$this->db->order_by('no','DESC');    
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

	//==================================================== keluar ========================================

		public function getArsipK()
		{
			$query = "SELECT `arsip_keluar`.*, `surat_keluar`.`nomor_surat`,`surat_keluar`.`perihal`,`surat_keluar`.`kepada`,`surat_keluar`.`tgl_surat`
			FROM `arsip_keluar` JOIN `surat_keluar`
			ON  `arsip_keluar`.`id_suratkeluar` = `surat_keluar`.`id_suratkeluar`
			";
			return $this->db->query($query)->result_array();
		}

		public function getIdK($id)
		{
			return $this->db->get_where('arsip_keluar',['id_arsipkeluar' => $id])->row_array();
		}

		public function getWhereask($id)
		{

			return $this->db->get_where('surat_keluar',['id_suratkeluar' => $id])->row_array();
			return $this->db->get_where('arsip_keluar',['id_arsipkeluar' => $id])->row_array();
		}

		public function hapusdatak($id)
		{
			$this->db->where('id_arsipkeluar', $id);
			return $this->db->delete('arsip_keluar');

		}
		public function editark()
		{
			$data = [
				'no' => $this->input->post('no', true),
				'tgl_arsipkeluar' => $this->input->post('tgl_arsipkeluar', true),
				'id_arsipkeluar' => $this->input->post('id_arsipkeluar', true),
				'nomor_surat' => $this->input->post('nomor_surat', true),
				'perihal' => $this->input->post('perihal', true),
				'kepada' => $this->input->post('kepada', true),
				'tgl_surat' => $this->input->post('tgl_surat', true)
			];

			$this->db->where('id_arsipkeluar', $this->input->post('id_arsipkeluar'));
			$this->db->update('arsip_keluar', $data);
		}
		public function simpanEditark($input_id, $data)
		{
			$this->db->where(['id_arsipkeluar' => $input_id])->update('arsip_keluar', $data);
		}

		public function buat_kodeSK()
		{

			$tgl = date('dmY');
			$this->db->select('RIGHT(arsip_keluar.no,4) as kode', FALSE);
			$this->db->order_by('no','DESC');    
			$this->db->limit(1);    
		  $query = $this->db->get('arsip_keluar');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "No. Arsip Keluar ".$tgl."-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi; 
		}

	}