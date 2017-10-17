<?php

class Pembayaran_test extends TestCase{

	public function test_bayar(){
		$_SESSION['login'] = true;
		$_SESSION['login'] = array('id'=>'3');
		$output = $this->request('POST', 'pembayaran/dopay/4');
		
		$expected = 'gagal membayar';
		$this->assertEquals($expected, $output);
		// $this->assertRedirect('dashboard');
	}
	public function test_bayar_sukses(){
		$_SESSION['login'] = true;
		
		$_SESSION['login'] = array('id'=>'800');
		$output = $this->request('POST', 'pembayaran/dopay/5');
		$expected = 'berhasil membayar';
		$this->assertEquals($expected, $output);
		// $this->assertRedirect('dashboard');
	}
	public function test_bayar_nosess(){
		$output = $this->request('POST', 'pembayaran/dopay/5');
		$expected = 'berhasil membayar';
		$this->assertRedirect('/');
		// $this->assertRedirect('dashboard');
	}

}

?>