<?php
/**
* 登陆类
*/
class Login_Controller
{
	public function Display()
	{
		require_once(View::getView('login'));
		die();
	}
}