<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class User_test extends TestCase
{
	public function setUp()
	{
		$this->resetInstance();
	}
	public function test_login()
	{
		$output = $this->request('GET', ['user','login']);
		$this->assertContains('<title>PT LELI</title>', $output);
		$this->assertContains('<title>PT LELI</footer>', $output);
	}
	
}
