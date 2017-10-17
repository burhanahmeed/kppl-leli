<?php
class Lelang_test extends TestCase{
	
	public function test_tawaran(){
		$_SESSION['login'] = true;
		$output = $this->request('GET', 'lelang/highestOffer/4');
		$expected = '100000000';
		$this->assertEquals((float)$expected, (float)$output);
	}

}

?>