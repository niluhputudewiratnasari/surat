<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//is_logged_in();

		$this->load->model('laporan_model');
		$this->load->model('disposisi_model');
		$this->load->model('surat_model');
		$this->load->library('pdff');
	}

	public function index($data=null)
	{
		$data['title'] = 'Laporan Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$data['tahun'] = $this->laporan_model->gettahuns();
		$data['nomor_surat']=$this->db->order_by('tgl_surat', 'ASC')->get('surat_masuk')->result();
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templetes/footerindex');
		
		
	}

	public function filter()
	{
		$data['title'] = 'Laporan Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();


		$data['nomor_surat']=$this->db->order_by('tgl_surat', 'ASC')->where('tgl_surat >=',$this->input->post('tgl1'))->where('tgl_surat <=',$this->input->post('tgl2'))->get('surat_masuk')->result();

		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templetes/footerindex');
		
		$this->load->library('pdf');
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan Surat Masuk tanggal-".$tgl1."sampai".$tgl2;
		$this->pdf->load_view('laporan/index', $data, $tgl1, $tgl2);

	}

	public function filter2()
	{
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tahun1 = $this->input->post('tahun1');
		$bulanawal = $this->input->post('bulanawal');
		$bulanakhir = $this->input->post('bulanakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilaifilter = $this->input->post('nilaifilter');


		if ($nilaifilter == 1) {
			$data['judul'] = "Laporan Surat Masuk Berdasarkan Tanggal";
			$data['subjudul'] = "Dari Tanggal : ".$tanggalawal.' Sampai Tanggal : '.$tanggalakhir;
			$data['nomor_surat'] = $this->laporan_model->filterbytanggals($tanggalawal, $tanggalakhir);


			$this->load->view('laporan/print_masuk', $data);

		}elseif ($nilaifilter == 2) {
			$data['judul'] = "Laporan Surat Masuk Berdasarkan Bulan";
			$data['subjudul'] = "Dari Bulan : ".$bulanawal.' Sampai Tanggal : '.$bulanakhir.'Tahun : '.$tahun1;
			$data['nomor_surat'] = $this->laporan_model->filterbybulans($tahun1,$bulanawal, $bulanakhir);


			$this->load->view('laporan/print_masuk', $data);

		}elseif ($nilaifilter == 3) {
			$data['judul'] = "Laporan Surat Masuk Berdasarkan Tahun";
			$data['subjudul'] = 'Tahun : '.$tahun2;
			$data['nomor_surat'] = $this->laporan_model->filterbytahuns($tahun2);
			// var_dump($data);

			$this->load->view('laporan/print_masuk', $data);
		}
	}

	//==========================================Laporan Surat Keluar======================================
	public function keluar()
	{

		$data['title'] = 'Laporan Surat Keluar';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$data['tahun'] = $this->laporan_model->gettahun();
		$data['nomor_surat']=$this->db->order_by('tgl_surat', 'ASC')->get('surat_keluar')->result();
		$data['klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();
		
		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('laporan/keluar', $data);
		$this->load->view('templetes/footerindex');
	}

	public function filter1()
	{
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tahun1 = $this->input->post('tahun1');
		$bulanawal = $this->input->post('bulanawal');
		$bulanakhir = $this->input->post('bulanakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilaifilter = $this->input->post('nilaifilter');


		if ($nilaifilter == 1) {
			$data['judul'] = "Laporan Surat Keluar By Tanggal";
			$data['subjudul'] = "Dari Tanggal : ".$tanggalawal.' Sampai Tanggal : '.$tanggalakhir;
			$data['nomor_surat'] = $this->laporan_model->filterbytanggal($tanggalawal, $tanggalakhir);


			$this->load->view('laporan/print_keluar', $data);

		}elseif ($nilaifilter == 2) {
			$data['judul'] = "Laporan Surat Keluar By Bulan";
			$data['subjudul'] = "Dari Bulan : ".$bulanawal.' Sampai Tanggal : '.$bulanakhir.'Tahun : '.$tahun1;
			$data['nomor_surat'] = $this->laporan_model->filterbybulan($tahun1,$bulanawal, $bulanakhir);


			$this->load->view('laporan/print_keluar', $data);

		}elseif ($nilaifilter == 3) {
			$data['judul'] = "Laporan Surat Keluar By Tahun";
			$data['subjudul'] = 'Tahun : '.$tahun2;
			$data['nomor_surat'] = $this->laporan_model->filterbytahun($tahun2);
			// var_dump($data);

			$this->load->view('laporan/print_keluar', $data);
		}
	}



	public function keluark()
	{
		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		$pdf->Cell(190,8,'PEMERINTAH PROVINSI NUSA TENGGARA BARAT',0,1,'C');
		$pdf->SetFont('Arial','B',20);
		$pdf->Cell(190,8,'DINAS KESEHATAN',0,1,'C');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(190,8,'Jl. Amir Hamzah No. 103 Telp (0370) 621786',0,1,'C');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(190,8,'Mataram 83211',0,1,'C');
		$pdf->Cell(190,8,'',0,1,'C');
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(190,8,'LAPORAN SURAT KELUAR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
		//$pdf->Cell(10,8,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(30,8,'Nomor Surat',1,0);
		$pdf->Cell(60,8,'Perihal',1,0);
		$pdf->Cell(30,8,'Kode Klasifikasi',1,0);
		$pdf->Cell(50,8,'Pengirim',1,0);
		$pdf->Cell(30,8,'Tanggal Surat',1,1);
		$pdf->SetFont('Arial','',10);
		$nomor_surat = $this->db->get('surat_masuk')->result();
		foreach ($nomor_surat as $row){
			$pdf->Cell(30,8,$row->nomor_surat,1,0);
			$pdf->Cell(60,8,$row->perihal,1,0);
			$pdf->Cell(30,8,$row->klasifikasi,1,0);
			$pdf->Cell(50,8,$row->pengirim,1,0); 
			$pdf->Cell(30,8,$row->tgl_surat,1,1); 
		}
		$pdf->Output();

	}
	//===============================================DISPOSISI==========================================

	public function disposisi()
	{
		$data['title'] = 'Disposisi';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$data['nomor_surat'] = $this->disposisi_model->getAll();
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('laporan/disposisi', $data);
		$this->load->view('templetes/footerindex');
		
	}
	public	function tambah_disposisi($id)
	{
		$data['title'] = 'Arsip Surat Masuk';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('disposisi_model', 'dis');
		$data['tgl_disposisi'] = $this->dis->getAll();
		$data['nomor_surat'] = $this->dis->getId($id);
		$data['nomor_surat'] = $this->dis->getWheredis($id);
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();
		$data['tgl_disposisi'] = $this->dis->getBagian();
		$data['id_bagian'] = $this->db->get('bagian')->result_array();

		$this->load->view('templetes/headerindex', $data);
		$this->load->view('templetes/sidebarindex', $data);
		$this->load->view('templetes/topbarindex', $data);
		$this->load->view('laporan/tambah_disposisi', $data);
		$this->load->view('templetes/footerindex');
	}

	public function simdis()
	{

		$data = array(
			'id_disposisi' => $this->disposisi_model->buat_kode(),
			'tgl_disposisi' => $this->input->post('tgl_disposisi'),
			'id_suratmasuk' => $this->input->post('id_suratmasuk'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'tujuan' => $this->input->post('tujuan'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->db->insert('tabel_disposisi', $data);
		$this->db->where(['id_suratmasuk' => $data['id_suratmasuk']])->update('surat_masuk', ['status'=>'Berhasil Disposisi']);
		$noSurat= $this->db->select('nomor_surat')->where('id_suratmasuk')->get('surat_masuk')->result();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Disposisi berhasil ditambahkan! </div>');
		redirect('laporan/disposisi');
	}

	public function hapusdis($id = '')
	{
		$this->disposisi_model->hapusdata($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		return redirect('laporan/disposisi');
	}

	public function editdis($id = '')
	{
		$data['title'] = 'Disposisi';
		$data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Disposisi_model', 'dis');
		$data['nomor_surat'] = $this->dis->getAll($id);
		$data['nomor_surat'] = $this->dis->getId($id);
		$data['id_suratmasuk'] = $this->db->get('surat_masuk')->result_array();
		$data['tgl_disposisi'] = $this->dis->getBagian();
		$data['id_bagian'] = $this->db->get('bagian')->result_array();

		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/headerindex', $data);
			$this->load->view('templetes/sidebarindex', $data);
			$this->load->view('templetes/topbarindex', $data);
			$this->load->view('laporan/editdis', $data);
			$this->load->view('templetes/footerindex');
		} else {
			$this->disposisi_model->editdis();
			redirect('laporan/disposisi');
		}
	}

	public function proses_editdis()
	{
		$input_id = $this->input->post('id_disposisi');
		$data = array(
			'id_disposisi' => $this->input->post('id_disposisi'),
			'tgl_disposisi' => $this->input->post('tgl_disposisi'),
			'id_suratmasuk' => $this->input->post('id_suratmasuk'),
			'nomor_surat' => $this->input->post('nomor_surat'),
			'perihal' => $this->input->post('perihal'),
			'tujuan' => $this->input->post('tujuan'),
			'keterangan' => $this->input->post('keterangan')

		);

		$this->disposisi_model->simpanEditdis($input_id, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Disposisi berhasil diubah! </div>');
		redirect('laporan/disposisi');
	}


}