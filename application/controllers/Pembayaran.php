<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('GeneralModel');
        // $this->load->controller('Lelang');
        // $this->load->controller('Dompet');
        if (empty($this->session->userdata('login'))) {
        	redirect('/');
        }
    }
	public function doPay($idbarang){
		$table = 'dompet_tabel';
		$data = array(
			'jumlah' => $this->highestOffer($idbarang)['tawaran'],
			'jenis' => 'minus'
			);
		$amount = $this->myAmount($id);
		// cek ketersediaan uang
		if ((float)$amount < (float)$this->highestOffer($idbarang)['tawaran']) {
			// error
			return false;
			redirect('/');
		}else{
			$this->GeneralModel->create($table, $data);
			return true;
			redirect('dashboard');
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
	public function highestOffer($idbarang){
		$sql = 'SELECT MAX(tawaran) AS tawaran FROM penawaran_tabel WHERE id_barang="'.$idbarang.'";';
		$result = $this->GeneralModel->query($sql);
		return $result;
	}
}
