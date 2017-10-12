<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('bcrypt');
        // if (!empty($this->session->userdata('login'))) {
        // 	redirect('/');
        // }
    }
    public function login(){
    	$this->load->view('view_login_user');
    }
    public function signup(){
    	$this->load->view('view_register_user');
    }
	public function dologin($type){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$con1 = array('username' => $this->input->post('username'));

		if ($this->form_validation->run()) {
			switch ($type) {
			case 'admin':
				$table = 'admin_tabel';
				$checkUsername = $this->UserModel->authentication($table, $con1);
				if ($this->bcrypt->check_password($this->input->post('password'), $checkUsername[0]['password'])) {
					$doCheck = true;
					$session_data = array(
						'id'=>$checkUsername[0]['id_admin'],
						'type'=> 'admin'
						);
					$this->session->set_userdata('login',$session_data);
				}else{
					$doCheck = false;
				}
				break;
			
			case 'user':
				$userType = $this->input->post('userType');
				if ($userType == 'penawar') {
					$userType = 'penawar';
				}else{
					$userType = 'pelelang';
				}
				switch ($userType) {
					case 'pelelang':
						$table = 'pelelang_tabel';
						$checkUsername = $this->UserModel->authentication($table, $con1);
						if ($this->bcrypt->check_password($this->input->post('password'), $checkUsername[0]['password'])) {
							$doCheck = true;
							$session_data = array(
								'id'=>$checkUsername[0]['id_pelelang'],
								'type'=> 'pelelang'
								);
							$this->session->set_userdata('login',$session_data);
						}else{
							$doCheck = false;
						}
						break;
					
					case 'penawar':
						$table = 'penawar_tabel';
						$checkUsername = $this->UserModel->authentication($table, $con1);
						if ($this->bcrypt->check_password($this->input->post('password'), $checkUsername[0]["password"])) {
							$doCheck = true;
							$session_data = array(
								'id'=>$checkUsername[0]['id_penawar'],
								'type'=> 'penawar'
								);
							$this->session->set_userdata('login',$session_data);
						}else{
							$doCheck = false;
						}
						break;
				}
				break;
		}

			if ($doCheck) {
				$this->session->set_flashdata('success','Berhasil');
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('error','Username atau password salah');
				redirect('user/login');
				// var_dump($checkUsername);
			}
		}else{
			$this->session->set_flashdata('error',validation_errors());
			redirect('user/login');
		}

	}
	public function dosignup(){
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[penawar_tabel.username]|is_unique[pelelang_tabel.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[penawar_tabel.username]|is_unique[pelelang_tabel.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run()) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->bcrypt->hash_password($this->input->post('password')),
				'email' => $this->input->post('email'),
				);
			
			$userType = $this->input->post('userType');
			if ($userType == 'penawar') {
				$userType = 'penawar';
			}else{
				$userType = 'pelelang';
			}
			switch ($userType) {
				case 'pelelang':
					$table = 'pelelang_tabel';
					$this->UserModel->create($table, $data);
					break;
				
				case 'penawar':
					$table = 'penawar_tabel';
					$this->UserModel->create($table, $data);
					break;
			}
			$this->session->set_flashdata('success','Berhasil mendaftar');
			redirect('user/signup');
		}else{
			// eror
			$this->session->set_flashdata('error',validation_errors());
			redirect('user/signup');
		}
	}
	public function logout(){
		$this->session->unset_userdata('login');
	    // $this->session->session_destroy();
	    redirect('/');
	}
}
