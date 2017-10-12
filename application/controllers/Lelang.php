<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lelang extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('GeneralModel');
        if (empty($this->session->userdata('login'))) {
        	redirect('/');
        }
    }
	// public function makePayment(){
		
	// }
	public function highestOffer($idbarang){
		$sql = 'SELECT MAX(tawaran) AS tawaran FROM penawaran_tabel WHERE id_barang="'.$idbarang.'";';
		$result = $this->GeneralModel->query($sql);
		return $result;
	}
}
