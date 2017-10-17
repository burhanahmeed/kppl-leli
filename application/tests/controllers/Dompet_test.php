<?php
class Dompet_test extends TestCase{

	public function setUp()
    {
        $this->resetInstance();
    }

	public function test_add(){
		$_SESSION['login'] = array('id'=>'2') ;
		$output = $this->request('POST', 'dompet/add',
		[
		    'input_money' => '5',
		]);
		// $this->assertEquals('berhasil', $output);
		$this->assertRedirect('dompet');
		
	}
	public function test_add_fail(){
		$_SESSION['login']['id'] = '800';
		$output = $this->request('POST', 'dompet/add',
		[
		    'input_money' => 'pppp',
		]);
		$this->assertEquals('deposit gagal', $output);
	}
	public function test_withdrawal(){
		$_SESSION['login']['id'] = '800';
		$this->request('POST', 'dompet/withdrawal',
		[
		    'input_money' => '5',
		]);
		$_SESSION['login']['id'] = '800';
		$this->assertRedirect('dompet');
	}
	public function test_withdrawal_fail(){
		$_SESSION['login'] = true;
		$output = $this->request('POST', 'dompet/withdrawal',
		[
		    'input_money' => '',
		]);
		$_SESSION['login']['id'] = '800';
		$this->assertEquals('withdrawal gagal', $output);
	}
	public function test_withdrawal_fail_overwithdraw(){
		$_SESSION['login'] = true;
		$output = $this->request('POST', 'dompet/withdrawal',
		[
		    'input_money' => '999999999999999999999999999',
		]);
		$_SESSION['login']['id'] = '800';
		$this->assertEquals('withdrawal gagal, uang tidak cukup', $output);
	}
	public function test_index_penawar(){
		$_SESSION['login']['id'] = '800';
		$_SESSION['login']['type'] = 'penawar';
		$output = $this->request('GET','dompet/index');
		$this->assertContains('<input type="number" class="form-control" placeholder="Jumlah Penarikan" name="input_money" required="">', $output);
	}
	public function test_index_pelelang(){
		$_SESSION['login']['id'] = '2';
		$_SESSION['login']['type'] = 'pelelang';
		$output = $this->request('GET','dompet/index');
		$this->assertContains('<input type="number" class="form-control" placeholder="Jumlah Penarikan" name="input_money" required="">', $output);
	}
	public function test_index_nosess(){
		$output = $this->request('GET','dompet/index');
		$this->assertRedirect('/');
	}

}