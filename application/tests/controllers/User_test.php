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
	}
	public function test_signup()
	{
		$output = $this->request('GET', ['user','signup']);
		$this->assertContains('<title>PT LELI</title>', $output);
	}
	public function test_doLogin_penawar()
	{
		$output = $this->request('POST', ['user','dologin','user'], ['username'=>'penawar', 'password'=>'12345', 'userType'=>'penawar']);
		$this->assertRedirect('dashboard', 302);
	}
	// public function test_doLogin_penawar_flashdata_berhasil()
	// {
	// 	$output = $this->request('POST', ['user','dologin','user'], ['username'=>'penawar', 'password'=>'12345', 'userType'=>'penawar']);
	// 	$this->assertContains('<strong>Oops!</strong>', $output);
	// }
	public function test_doLogin_penawar_fail()
	{
		$output = $this->request('POST', ['user','dologin','user'], ['username'=>'penawar', 'password'=>'82913', 'userType'=>'penawar']);
		$this->assertEquals(false, $output);
	}
	public function test_doLogin_penawar_blank()
	{
		$output = $this->request('POST', ['user','dologin','user'], ['username'=>'', 'password'=>'', 'userType'=>'penawar']);
		$this->assertEquals(false, $output);
	}
	public function test_doLogin_pelelang()
	{
		$output = $this->request('POST', ['user','dologin','user'], ['username'=>'lelang', 'password'=>'12345', 'userType'=>'pelelang']);
		$this->assertRedirect('dashboard', 302);
	}
	public function test_doLogin_pelelang_fail()
	{
		$output = $this->request('POST', ['user','dologin','user'], ['username'=>'lelang', 'password'=>'adafaea', 'userType'=>'pelelang']);
		$this->assertEquals(false, $output);
	}
	public function test_doLogin_admin()
	{
		$output = $this->request('POST', ['user','dologin','admin'], ['username'=>'admin', 'password'=>'12345']);
		$this->assertRedirect('dashboard', 302);
	}
	public function test_doLogin_admin_fail()
	{
		$output = $this->request('POST', ['user','dologin','admin'], ['username'=>'admin', 'password'=>'adadadadda']);
		$this->assertEquals(false, $output);
	}
	public function test_login_fail_blank_field(){
		$output = $this->request('POST', ['user','dologin','user']);
		$_POST['userType'] = 'penawar';
		$_POST['username'] = 'afafadae';
		$_POST['password'] = 'eada442da';
		$this->assertRedirect('user/login', 302);
	}
	public function test_signup_new(){
		$output = $this->request('POST', ['user','dosignup'], ['username'=>'nawar', 'password'=>'12345','userType'=>'penawar','email'=>'siapa@siapaa']);
		$this->assertRedirect('user/signup', 302);
	}
	public function test_signup_new_pelelang(){
		$output = $this->request('POST', ['user','dosignup'], ['username'=>'langlang', 'password'=>'12345','userType'=>'pelelang','email'=>'siapa@lang']);
		$this->assertRedirect('user/signup', 302);
	}
	public function test_signup_new_lelang_error(){
		$output = $this->request('POST', ['user','dosignup'], ['username'=>'lelang3', 'password'=>'12345','userType'=>'pelelang','email'=>'siapa@siapaa']);
		$this->assertRedirect('user/signup', 302);
	}
	public function test_signup_error(){
		$output = $this->request('POST', ['user','dosignup'], ['username'=>'terserah', 'password'=>'12345','userType'=>'penawar','email'=>'siapa@siapaa']);
		$this->assertRedirect('user/signup', 302);
	}
	public function test_logout(){
		$output = $this->request('GET', ['user','logout']);
		$this->assertRedirect('/', 302);
	}
	public function test_method_404(){
       $out= $this->request('GET', 'user/method_not_exist');
        $this->assertResponseCode(404);
    }

}

