<?php

class Barang_test extends TestCase{

	public function test_index(){
		$_SESSION['login'] = array('id'=>'1');
		$output = $this->request('POST', 'barang/add', [
			'nBarang'=>'barang baru',
			'detBarang'=>'detail barang baru lelang',
			'hargaAwal'=>'1234567',
			'dates' => '2017-10-12 20:45'
			]);
		
		$this->assertRedirect('dashboard',302);
	}
	public function test_index_gagal(){
		
		$_SESSION['login']['id'] = '1';
		$output = $this->request('POST', ['barang','add'], [
			'nBarang'=>'',
			'detBarang'=>'detail barang baru lelang',
			'hargaAwal'=>'1234567',
			]);
		$this->assertEquals('gagal menambahkan barang',$output);
	}
	public function test_nosess(){
		$output = $this->request('POST', 'barang/add', [
			'nBarang'=>'aadada',
			'detBarang'=>'detail barang baru lelang',
			'hargaAwal'=>'1234567',
			]);
		$this->assertRedirect('/',302);
	}
	public function test_update(){
		$_SESSION['login']['id'] = '1';
		$output = $this->request('POST', 'barang/update/2',[
			'nBarang'=>'aadada',
			'detBarang'=>'detail barang baru lelang',
			'hargaAwal'=>'987600',
			'dates' => '2017-10-12 20:45'
			]);
		$this->assertRedirect('dashboard',302);
	}
	public function test_update_fail(){
		$_SESSION['login']['id'] = '1';
		$output = $this->request('POST', 'barang/update/2',[
			'nBarang'=>'aadada',
			'detBarang'=>'detail barang baru lelang',
			'hargaAwal'=>'',
			'dates' => '2017-10-12 20:45'
			]);
		$this->assertEquals('Gagal Mengupdate',$output);
	}
	public function test_hapus(){
		$_SESSION['login']['id'] = '1';
		$output = $this->request('POST', 'barang/destroy/4');
		$this->assertRedirect('dashboard',302);
	}

}