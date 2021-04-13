<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Akun_model extends CI_Model
{
	
	public function getAkun()
	{
		$query = "SELECT `akun`.*, `akun_role`.`role`
		FROM `akun` JOIN `akun_role`
		ON  `akun`.`role_id` = `akun_role`.`id`
		";
		return $this->db->query($query)->result_array();
	}

	public function hapusdata($id)
	{
		$this->db->where('id_akun', $id);
		return $this->db->delete('akun');

	}

	//===================================== EDIT SM ==========================================

	public function getId($id)
	{

		return $this->db->get_where('akun',['id_akun' => $id])->row_array();
	}

	public function editakun()
	{
		$data = [
			'id_akun' => $this->input->post('id_akun'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'role_id' => $this->input->post('role_id')
			//'file' => $this->input->post('file', true)
		];

		$this->db->where('id_akun', $this->input->post('id_akun'));
		$this->db->update('akun', $data);
	}
	public function simpanEditakun($input_id, $data)
	{
		$this->db->where(['id_akun' => $input_id])->update('akun', $data);
	}

//================================ UPLOAD FILE SM =================================================
	private function _uploadImage($file)
	{
		$config['upload_path']          = './assets/photo/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['file_name']            = $this->id_akun;
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
		$akun = $this->getId($id);
		if ($akun->file != "default.jpg") {
			$filename = explode(".", $akun->file)[0];
			return array_map('unlink', glob(FCPATH."./assets/photo/$filename.*"));
		}
	}
}
