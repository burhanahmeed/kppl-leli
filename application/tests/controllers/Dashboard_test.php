<?php

class Dashboard_test extends TestCase
{
	public function test_nosession()
	{
		$output = $this->request('GET', 'dashboard/index');
		$this->assertRedirect('/', 302);
	}
	public function test_index_penawar(){
		$_SESSION['login']['type']   = "penawar";
		$_SESSION['login']['id']   = "800";
		$output = $this->request('GET', 'dashboard/index');
		$this->assertContains('<title>Penawar Barang</title>', $output);
	}
	public function test_index_pelelang(){
		$_SESSION['login']['type']   = "pelelang";
		$_SESSION['login']['id']   = "1";
		$output = $this->request('GET', 'dashboard/index');
		$this->assertContains('<title>Barang Pelelang</title>', $output);
	}
	public function test_halaman_withdrawal(){
		$_SESSION['login']['type']   = "pelelang";
		$_SESSION['login']['id']   = "1";
		$output = $this->request('GET', 'dashboard/withdraw');
		$this->assertContains('<title>SB Admin - Bootstrap Admin Template</title>', $output);
	}
	public function test_tambah_barang_pelelang(){
		$_SESSION['login']['type']   = "pelelang";
		$_SESSION['login']['id']   = "1";
		$output = $this->request('GET', 'dashboard/tambah_barang');
		$this->assertContains('<title>SB Admin - Bootstrap Admin Template</title>', $output);
	}
	public function test_halama_edit(){
		$_SESSION['login']['id']   = "1";
		$output = $this->request('GET', 'dashboard/edit/3');
		
		$this->assertContains('<input class="form-control" placeholder="Nama Barang" name="nBarang" value="mobil antik 4567">', $output);
	}
	public function test_ditawar(){
		$_SESSION['login']['type']   = "penawar";
		$_SESSION['login']['id']   = "800";
		$output = $this->request('GET', 'dashboard/ditawar');
		$this->assertContains('<title>Barang Tawaran</title>', $output);
	}

}
?>