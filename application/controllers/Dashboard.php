<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('GeneralModel');
        $this->load->library('Bcrypt');
        if (empty($this->session->userdata('login'))) {
            redirect('/');
        }
    }
    public function index(){
    	$jenis_user = $this->session->userdata('login')['type'];
    	$id_user = $this->session->userdata('login')['id'];
    	switch ($jenis_user) {
    		case 'penawar':
    			$username = $this->UserModel->getByParam('penawar_tabel', array('id_penawar'=>$id_user));
                $barang = $this->GeneralModel->getByParam('barang_tabel',array('status'=>'Sudah Tervalidasi'));
    			break;
    		
    		case 'pelelang':
    			$username = $this->UserModel->getByParam('pelelang_tabel', array('id_pelelang'=>$id_user));
    			$barang = $this->GeneralModel->getByParam('barang_tabel', array('id_user'=>$id_user));
    			break;
    	}
       	$data = array(
    		'username'=> $username[0]['username'],
    		'barang'=> $barang
    		);
    	
        switch ($jenis_user) {
            case 'penawar':
                $this->load->view('view_penawar_barang',$data);
                break;
            
            case 'pelelang':
                $this->load->view('view_list_barang',$data);
                break;
            }
    }
    public function tambah_barang(){
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
    		'username'=> $username[0]['username']
    		);
    	$this->load->view('view_tambah_barang', $data);
    }
    public function withdraw(){
    	$this->load->view('view_withdraw');
    }
    public function edit($id){
    	$id_user = $this->session->userdata('login')['id'];
    	$data = array(
    		'barang' => $this->GeneralModel->getByParam('barang_tabel', array('id_barang'=>$id)),
    		'username' => $this->UserModel->getByParam('pelelang_tabel', array('id_pelelang'=>$id_user))[0]['username']
    		);
    	$this->load->view('view_edit_barang', $data);
    }
    public function ditawar(){
        $id_user = $this->session->userdata('login')['id'];
        $jenis_user = $this->session->userdata('login')['type'];
        switch ($jenis_user) {
            case 'penawar':
                $username = $this->UserModel->getByParam('penawar_tabel', array('id_penawar'=>$id_user));
                $barang = $this->GeneralModel->getPenawaran($id_user);
                $data = array(
                    'username'=> $username[0]['username'],
                    'barang' => $barang,
                    );
                $this->load->view('view_penawar_tawaran', $data);
                break;
            
            case 'pelelang':
                # code...
                break;
        }
    }
}
