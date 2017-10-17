<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dompet extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('GeneralModel');
        $this->load->model('UserModel');
        if (empty($this->session->userdata('login'))) {
        	redirect('/');
        }
    }
	public function add(){
		$this->form_validation->set_rules('input_money', 'Jumlah uang','required|numeric');
		$id_user = $this->session->userdata('login')['id'];
		$table = 'dompet_tabel';
		$data = array(
			'jumlah'=>$this->input->post('input_money'),
			'jenis' => 'plus',
			'id_user'=>$id_user
			);

		if ($this->form_validation->run()) {
			$this->GeneralModel->create($table, $data);
			// echo 'berhasil';
			redirect('dompet');
		}else{
			echo 'deposit gagal';
		}
		// var_dump($this->GeneralModel->create($table, $data));
	}
	public function withdrawal(){
		$this->form_validation->set_rules('input_money', 'Jumlah penarikan','required|numeric');
		$id_user = $this->session->userdata('login')['id'];
		$table = 'dompet_tabel';
		$data = array(
			'jumlah'=>$this->input->post('input_money'),
			'jenis' => 'minus',
			'id_user'=>$id_user
			);

		if ($this->form_validation->run()) {
			
			if ($this->myAmount($id_user) > $this->input->post('input_money')) {
				$this->GeneralModel->create($table, $data);
				redirect('dompet');
			}else{
				echo "withdrawal gagal, uang tidak cukup";	
			}
		}else{
			echo "withdrawal gagal";
			// echo validation_errors();
		}
	}

	public function myAmount($id){
		$tambah = 'SELECT SUM(jumlah) AS jumlh FROM dompet_tabel WHERE id_user="'.$id.'" AND jenis="plus";';
		$kurang = 'SELECT SUM(jumlah) AS jumlh FROM dompet_tabel WHERE id_user="'.$id.'" AND jenis="minus";';
		$plus =  (float)$this->GeneralModel->query($tambah)[0]['jumlh'];
		$minus = (float) $this->GeneralModel->query($kurang)[0]['jumlh'];
		$amount = $plus - $minus;
		return $amount;
	}

	public function index(){
		$jenis_user = $this->session->userdata('login')['type'];
    	$id_user = $this->session->userdata('login')['id'];
    	switch ($jenis_user) {
    		case 'penawar':
    			$username = $this->UserModel->getByParam('penawar_tabel', array('id_penawar'=>$id_user));
    			break;
    		
    		case 'pelelang':
    			$username = $this->UserModel->getByParam('pelelang_tabel', array('id_pelelang'=>$id_user));
    			break;
    	}
       	$data = array(
    		'username'=> $username[0]['username'],
    		'uangku' => $this->myAmount($id_user),
    		);
		
		// var_dump($data);
		switch ($jenis_user) {
    		case 'penawar':
    			$this->load->view('view_penawar_dompet', $data);
    			break;
    		
    		case 'pelelang':
    			$this->load->view('view_withdraw', $data);
    			break;
    	}
	}
}
