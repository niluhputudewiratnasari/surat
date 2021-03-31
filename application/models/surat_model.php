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

	//===================================== EDIT SM ==========================================

	public function getId($id)
	{

		return $this->db->get_where('surat_masuk',['id_suratmasuk' => $id])->row_array();
	}

	public function editsm()
	{
		$data = [
			'no_urut' => $this->input->post('no_urut', true),
			'nomor_surat' => $this->input->post('nomor_surat', true),
			'perihal' => $this->input->post('perihal', true),
			'klasifikasi' => $this->input->post('klasifikasi', true),
			'lampiran' => $this->input->post('lampiran', true),
			'pengirim' => $this->input->post('pengirim', true),
			'tgl_surat' => $this->input->post('tgl_surat', true),
			//'file' => $this->input->post('file', true)
		];

		$this->db->where('id_suratmasuk', $this->input->post('id_suratmasuk'));
		$this->db->update('surat_masuk', $data);
	}
	public function simpanEditsm($input_id, $data)
	{
		$this->db->where(['id_suratmasuk' => $input_id])->update('surat_masuk', $data);
	}

//================================ UPLOAD FILE SM =================================================
	private function _uploadImage($file)
	{
		$config['upload_path']          = './assets/photo/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['file_name']            = $this->id_suratmasuk;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; 
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file)) {
			var_dump($this->upload->display_errors());
    	// return $this->upload->data("file_name");
		}

		return "default.jpg";
	}

	public function _deleteImage($id)
	{
		$surat_masuk = $this->getId($id);
		if ($surat_masuk->file != "default.jpg") {
			$filename = explode(".", $surat_masuk->file)[0];
			return array_map('unlink', glob(FCPATH."./assets/photo/$filename.*"));
		}
	}

	//===============================================================================================

	public function getSuratK()
	{
		$query = "SELECT `surat_keluar`.*, `kode_klasifikasi`.`klasifikasi`
		FROM `surat_keluar` JOIN `kode_klasifikasi`
		ON  `surat_keluar`.`klasifikasi` = `kode_klasifikasi`.`klasifikasi`
		";
		return $this->db->query($query)->result_array();
	}

	public function hapusdatask($id)
	{
		//$this->db->where('id_suratkeluar', $id);
		//return $this->db->delete('surat_keluar');
		$this->db->delete('surat_keluar',['id_suratkeluar' => $id]);
	}

	public function getWhere($kode)
	{
		return $this->db->get_where('surat_keluar',['id_suratkeluar' => $kode])->row_array();

	}
	public function getWheredis($kode)
	{

		return $this->db->get_where('surat_masuk',['id_suratmasuk' => $kode])->row_array();
		return $this->db->get_where('tabel_disposisi',['id_disposisi' => $kode])->row_array();
	}
	public function getWheresm($kode)
	{

		return $this->db->get_where('surat_masuk',['id_suratmasuk' => $kode])->row_array();
		return $this->db->get_where('tabel_disposisi',['id_disposisi' => $kode])->row_array();
	}
	public function getIdsk($id)
	{
		return $this->db->get_where('surat_keluar',['id_suratkeluar' => $id])->row_array();
	}
	public function editsk()
	{
		$data = [
			'no_urut' => $this->input->post('no_urut', true),
			'nomor_surat' => $this->input->post('nomor_surat', true),
			'perihal' => $this->input->post('perihal', true),
			'klasifikasi' => $this->input->post('klasifikasi', true),
			'lampiran' => $this->input->post('lampiran', true),
			'kepada' => $this->input->post('kepada', true),
			'tgl_surat' => $this->input->post('tgl_surat', true),
		//'file' => $this->input->post('file', true)

		];

		$this->db->where('id_suratkeluar', $this->input->post('id_suratkeluar'));
		$this->db->update('surat_keluar', $data);
	}
	public function simpanEditsk($input_id, $data)
	{
		$this->db->where(['id_suratkeluar' => $input_id])->update('surat_keluar', $data);
	}

	public function buat_kode()
	{

		$tgl = date('dmY');
		$this->db->select('RIGHT(surat_keluar.no_urut,4) as kode', FALSE);
		$this->db->order_by('id_suratkeluar','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('surat_keluar');  
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}
		else {         
			$kode = 1;    
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		$kodejadi = "No. SK-".$tgl."-".$kodemax;
		return $kodejadi;  
	}

	private function _uploadImagek()
	{
		$config['upload_path']          = './assets/photo/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['file_name']            = $this->id_suratkeluar;
		$config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
    	return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

public function _deleteImagek($id)
{
	$surat_keluar = $this->getIdsk($id);
	if ($surat_keluar->file != "default.jpg") {
		$filename = explode(".", $surat_keluar->file)[0];
		return array_map('unlink', glob(FCPATH."./assets/photo/$filename.*"));
	}
}

//============================================================================================================
public function buat_kodesm()
{

	$tgl = date('dmY');
	$this->db->select('RIGHT(surat_masuk.no_urut,4) as kode', FALSE);
	$this->db->order_by('id_suratmasuk','DESC');    
	$this->db->limit(1);    
	$query = $this->db->get('surat_masuk');  
	if($query->num_rows() <> 0){      
		
		$data = $query->row();      
		$kode = intval($data->kode) + 1;    
	}
	else {            
		$kode = 1;    
	}

	$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
	$kodejadi = "No. SM-".$tgl."-".$kodemax;
	return $kodejadi;  
}

}