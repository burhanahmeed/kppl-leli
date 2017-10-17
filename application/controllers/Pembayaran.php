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
		$id_user = $this->session->userdata('login')['id'];
		$table = 'dompet_tabel';
		$data = array(
			'id_user'=>$id_user,
			'jumlah' => $this->highestOffer($idbarang),
			'jenis' => 'minus'
			);
		$amount = $this->myAmount($id_user);
		// var_dump((float)$amount < (float)$this->highestOffer($idbarang));
		// var_dump($amount);
		// var_dump($this->highestOffer($idbarang));
		// var_dump($id_user);
		// cek ketersediaan uang
		if ((float)$amount < (float)$this->highestOffer($idbarang)) {
			// error
			echo 'gagal membayar';
		}else{
			$this->GeneralModel->create($table, $data);
			echo 'berhasil membayar';
		}
		// redirect('dashboard');
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
		$sql = 'SELECT MAX(tawaran) AS jumlh FROM penawaran_tabel WHERE id_barang="'.$idbarang.'";';
		$result = $this->GeneralModel->query($sql);
		return $result[0]['jumlh'];
	}
}
