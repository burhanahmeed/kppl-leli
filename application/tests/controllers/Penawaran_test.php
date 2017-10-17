<?php
class Penawaran_test extends TestCase{

	public function test_tawar(){
		$_SESSION['login'] = true;
		$this->request('POST', 'penawaran/dooffer/3/800',[
			'hargaBid'=>'9999999999',
			]);
		$this->assertRedirect('dashboard');
	}
	public function test_tawar_fails(){
		$_SESSION['login'] = true;
		$output = $this->request('POST', 'penawaran/dooffer/3/800',[
			'hargaBid'=>'1',
			]);
		$this->assertEquals('tawaran harus lebih besar',$output);
	}
	public function test_tawar_fails_pernah_bid(){
		$_SESSION['login'] = true;
		$output = $this->request('POST', 'penawaran/dooffer/5/800',[
			'hargaBid'=>'131131',
			]);
		$this->assertEquals('tawaran harus lebih besar',$output);
	}
	public function test_withdraw(){
		$_SESSION['login'] = true;
		$this->request('POST', 'penawaran/withdrawOffer/3/800');
		$this->assertRedirect('dashboard');
	}
	public function test_withdraw_fails(){
		$_SESSION['login'] = true;
		$output = $this->request('POST', 'penawaran/withdrawOffer/3/8099');
		$this->assertContains('anda belum melakukan penawaran',$output);
	}
	public function test_index_nosess(){
		$output = $this->request('POST','penawaran/doOffer/2/11');
		$this->assertRedirect('/');
	}

}