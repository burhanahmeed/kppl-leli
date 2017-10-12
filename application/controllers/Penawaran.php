<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penawaran extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('GeneralModel');
        if (empty($this->session->userdata('login'))) {
        	redirect('/');
        }
    }
	public function doOffer($idbarang, $iduser){
		$this->form_validation->set_rules('hargaBid', 'Bid', 'required');
		$bid = $this->input->post('hargaBid');

		$table = 'penawaran_tabel';
		$where = array(
			'id_barang' => $idbarang,
			'id_user' => $iduser
			);
		$offersRecorded = $this->GeneralModel->getByParam($table, $where);
		if ($offersRecorded) {
			// jika belum pernah menawar sebelumny
			$sql = 'SELECT MAX(tawaran) AS jumlh FROM penawaran_tabel WHERE id_barang="'.$idbarang.'";';
			$highestOffer = (float)$this->GeneralModel->query($sql)[0]['jumlh'];
			if ($bid < $highestOffer) {
				// eror harus lebih besar dr tawaran sebelumny
				echo 'tawaran harus lebih besar';
			}else{
				$data = array(
					'tawaran' => $bid,
					);
				$where = array(
					'id_barang' => $idbarang,
					'id_user' => $iduser
					);
				$this->GeneralModel->update($table, $where, $data);
				redirect('dashboard');
			}
		}else{
			// tambh tawaran
			$barangtabel = 'barang_tabel';
			$param = array(
				'id_barang' => $idbarang
				);
			
			$hargaMinBarang = $this->GeneralModel->getByParam($barangtabel, $param)[0];
			if ($bid < $hargaMinBarang['harga_awal']) {
				// eror harga harus diatas minimum
				echo 'tawaran harus lebih besar dari minimum barang';
			}else{
				$data = array(
					'tawaran' => $bid,
					'id_barang' => $idbarang,
					'id_user' => $iduser
					);
				$this->GeneralModel->create($table, $data);
				redirect('dashboard');
			}

		}
	}
	public function withdrawOffer($idbarang, $iduser){
		$table = 'penawaran_tabel';
		$where = array(
			'id_barang' => $idbarang,
			'id_user' => $iduser
			);
		$offersRecorded = $this->GeneralModel->getByParam($table, $where);
		if ($offersRecorded) {
			$this->GeneralModel->destroy($table, $where);
			redirect('dashboard');
		}else{
			echo "anda belum melakukan penawaran";
		}
	}
}
