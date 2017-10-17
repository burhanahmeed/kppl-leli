<?php

class GeneralModel_test extends TestCase
{
	public function setup()
	{
		$this->obj = $this->newModel('GeneralModel');
	}
	// public function test_view(){
	// 	$actual = $this->obj->view('*', 'penawar_tabel');
	// 	$expect_username = 'penawar2';
	// 	$expect_id = '800';
	// 	$this->assertEquals($expect_username, $actual[1]['username']);
	// 	$this->assertEquals($expect_id, $actual[1]['id_penawar']);
	// }
	public function test_create_true(){
		$data = array(
			'id_user'=> '300',
			'jumlah'=>'20000',
			'jenis'=>'plus'
			);
		$actual = $this->obj->create('dompet_tabel', $data);
			$expect = true;
			$this->assertEquals($expect, $actual);
		$this->obj->destroy('dompet_tabel',array('id_user'=>'300'));

	}
	public function test_getItem(){
		$actual = $this->obj->getItem('*', 'barang_tabel');
			$expect = 'mobil antik 12345';
			$this->assertEquals($expect, $actual[1]['nama']);
	}
	public function test_getParam(){
		$where = array(
			'id_penawaran'=> '2',
			);
		$actual = $this->obj->getByParam('penawaran_tabel', $where);
			$expect = '800';
			$this->assertEquals($expect, $actual[0]['id_user']);
	}
	public function test_query(){
		$actual = $this->obj->query('SELECT * FROM pelelang_tabel');
			$expect = 'lelang';
			$this->assertEquals($expect, $actual[0]['username']);
	}
	public function test_update(){
		$actual = $this->obj->update('penawar_tabel', array('id_penawar'=>'3'), array('nama'=>'bejo'));
	}
	public function test_getPenawaran(){
		$actual = $this->obj->getPenawaran('200');
		$real = false;
		$this->assertEquals($real, $actual);	
	}
}
?>
