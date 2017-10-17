<?php

class Admin_test extends TestCase
{
	public function test_index()
	{
		$output = $this->request('GET', 'admin/index');
		$this->assertContains('<title>PT LELI Admin</title>', $output);
	}
}
?>