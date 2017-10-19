<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('GeneralModel');
        if (empty($this->session->userdata('login'))) {
        	redirect('/');
        }
    }
	public function add(){
		$this->form_validation->set_rules('nBarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('detBarang', 'Detail Barang', 'required|min_length[6]');
		$this->form_validation->set_rules('hargaAwal', 'Harga Awal', 'required|numeric');
		
		$table = 'barang_tabel';

		if($this->form_validation->run()){
			$dataInserted = array(
				'nama' => $this->input->post('nBarang'),
				'id_user'=> $this->session->userdata('login')['id'],
				'detail' => $this->input->post('detBarang'),
				'harga_awal' => $this->input->post('hargaAwal'),
				'deadline' => $this->input->post('dates'),
				// 'gambar' => base_url().'assets/images/'.$this->upload('file'),
				'status' => 'Belum Tervalidasi',
				);
			if ($this->upload('file')) {
				$dataInserted['gambar'] = base_url().'assets/images/'.$this->upload('file');
			}else{
				$dataInserted['gambar'] = '';
			}
			$this->GeneralModel->create($table, $dataInserted);
			// success
			// echo 'berhasil';
			redirect('dashboard');
		}else{
			// error
			echo 'gagal menambahkan barang';
		}
	}
	// public function view(){
	// 	$field = array();
	// 	$table = 'barang_tabel';
	// 	$itemGetter = $this->GeneralModel->getItem($field,$table);

	// }
	// public function listAll(){
	// 	$field = array();
	// 	$table = 'barang_tabel';
	// 	$itemGetter = $this->GeneralModel->getItem($field,$table);
	// }
	// public function getById(){
	// 	$field = array();
	// 	$table = 'barang_tabel';
	// 	$itemGetter = $this->GeneralModel->getByParam($table, $where);
	// }
	public function update($id){
		$this->form_validation->set_rules('nBarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('detBarang', 'Detail Barang', 'required|min_length[6]');
		$this->form_validation->set_rules('hargaAwal', 'Harga Awal', 'required|numeric');
		$where = array('id_barang'=>$id);
		$table = 'barang_tabel';
		
		if($this->form_validation->run()){
			$data = array(
				'nama'=> $this->input->post('nBarang'),
				'detail' => $this->input->post('detBarang'),
				'harga_awal' => $this->input->post('hargaAwal'),
				'deadline' => $this->input->post('dates'),
				// 'gambar' => base_url().'assets/images/'.$this->upload('file')
				);
			if ($this->upload('file')) {
				$data['gambar'] = base_url().'assets/images/'.$this->upload('file');
			}else{
				$data['gambar'] = '';
			}
			$this->GeneralModel->update($table,$where, $data);
			redirect('dashboard');
			// success
		}else{
			// error
			echo 'Gagal Mengupdate';
		}
	}
	public function destroy($id){
		$where = array('id_barang'=>$id);
		$table = 'barang_tabel';
		$this->GeneralModel->destroy($table,$where);
		redirect('dashboard');
	}

	public function upload($nama){
		$config = array(
				'upload_path'=> './assets/images/',
				'allowed_types'=>'gif|jpg|png|jpeg',
				'max_size'=>2048,
				'overwrite'=>true,
				'file_name'=>'GALERI_'.rand(0,10000000));
		$this->upload->initialize($config);
		$do = $this->upload->do_upload($nama);
		if (!$do) {
			return false;
		}else{
			return $this->upload->data('file_name');
		}
	}
}
