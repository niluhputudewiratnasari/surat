<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Disposisi_model extends CI_Model
{
	
	public function getAll()
	{
		$query = "SELECT `tabel_disposisi`.*, `surat_masuk`.`nomor_surat`,`surat_masuk`.`perihal`
		FROM `tabel_disposisi` JOIN `surat_masuk`
		ON  `tabel_disposisi`.`id_suratmasuk` = `surat_masuk`.`id_suratmasuk`
		";
		return $this->db->query($query)->result_array();
	}
	public function hapusdata($id)
	{
		$this->db->where('id_disposisi', $id);
		return $this->db->delete('tabel_disposisi');

	}
	public function editdis()
	{
		$data = [
			'tgl_disposisi' => $this->input->post('tgl_disposisi', true),
			'id_suratmasuk' => $this->input->post('id_suratmasuk', true),
			'nomor_surat' => $this->input->post('nomor_surat', true),
			'perihal' => $this->input->post('perihal', true),
			'tujuan' => $this->input->post('tujuan', true),
			'keterangan' => $this->input->post('keterangan', true)
		];

		$this->db->where('id_disposisi', $this->input->post('id_disposisi'));
		$this->db->update('tabel_disposisi', $data);
	}
	public function simpanEditdis($input_id, $data)
	{
		$this->db->where(['id_disposisi' => $input_id])->update('tabel_disposisi', $data);
	}

	public function getId($id)
	{
		return $this->db->get_where('tabel_disposisi',['id_disposisi' => $id])->row_array();
	}
	public function SimpanDis()
	{
		$data = [
			'tgl_disposisi' => $this->input->post('tgl_disposisi', true),
			'nomor_surat' => $this->input->post('nomor_surat', true),
			'tujuan' => $this->input->post('tujuan', true),
			'keterangan' => $this->input->post('keterangan', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('akun_menu', $data);
	}

	public function getWheredis($id)
	{

		return $this->db->get_where('surat_masuk',['id_suratmasuk' => $id])->row_array();
		return $this->db->get_where('tabel_disposisi',['id_disposisi' => $id])->row_array();
	}
	public function getWheredisposisi($kode)
	{
		return $this->db->get_where('tabel_disposisi',['id_suratmasuk'=> $kode])->row_array();
	}
	public function buat_kode()
	{

		$tgl = date('dmY');
		$this->db->select('RIGHT(tabel_disposisi.id_disposisi,4) as kode', FALSE);
		$this->db->order_by('id_disposisi','DESC');    
		$this->db->limit(1);    
		  $query = $this->db->get('tabel_disposisi');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "Disposisi-".$tgl."-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
		}

	}