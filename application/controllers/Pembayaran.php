<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('GeneralModel');
        $this->load->controller('Lelang');
        $this->load->controller('Dompet');
        if (empty($this->session->userdata('login'))) {
        	redirect('/');
        }
    }
	public function doPay($idbarang){
		$table = 'dompet_tabel';
		$data = array(
			'jumlah' => $this->Lelang->highestOffer($idbarang),
			'jenis' => 'minus'
			);
		$amount = $this->Dompet->myAmount($id);
		// cek ketersediaan uang
		if ($amount < $this->Lelang->highestOffer($idbarang)) {
			// error
		}else{
			$this->GeneralModel->create($table, $data);
		}
	}
}
