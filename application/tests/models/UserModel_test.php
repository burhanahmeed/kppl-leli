<?php

class UserModel_test extends TestCase
{
	public function setup()
	{
		$this->obj = $this->newModel('UserModel');
	}
	public function test_view(){
		$actual = $this->obj->view('*', 'penawar_tabel');
		$expect_username = 'penawar2';
		$expect_id = '800';
		$this->assertEquals($expect_username, $actual[1]['username']);
		$this->assertEquals($expect_id, $actual[1]['id_penawar']);
	}
	public function test_create_true(){
		$data = array(
			'username'=> 'nawar',
			'password'=>'12345',
			'email'=>'nawar@tawar'
			);
		$actual = $this->obj->create('penawar_tabel', $data);
			$expect = true;
			$this->assertEquals($expect, $actual);
		$this->obj->destroy(array('username'=>'nawar'), 'penawar_tabel');

	}
	public function test_auth(){
		$where = array(
			'username'=> 'penawar',
			);
		$actual = $this->obj->authentication('penawar_tabel', $where);
			$expect = '$2a$08$MZ.tEBu40a0N3ZXPC5joOOIL0bO11t2/WSMLrS/aRJyvzPhbn4RBO';
			$this->assertEquals($expect, $actual[0]['password']);
	}
	public function test_getParam(){
		$where = array(
			'id_penawar'=> '800',
			);
		$actual = $this->obj->getByParam('penawar_tabel', $where);
			$expect = 'penawar2';
			$this->assertEquals($expect, $actual[0]['username']);
	}
}
?>