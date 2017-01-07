<?php
/**
* 登陆类
*/
class Login_Controller
{

	public function Display()
	{
		$User_model = new User_model();
		if(isset($_POST["submit"])){
			$email = $_POST["email"];
			$password = $_POST["password"];
			$password = md5($password);
			$uid = $User_model->CheckUser($email,$password);
			if($uid){
				$_SESSION["uid"] = $uid["id"];
				$_SESSION["email"] = $uid["email"];
				$_SESSION["admin"] = $uid["admin"];
				Direct("index.php");
			}else{
				$tip = "登陆失败！";
			}
		}
		require_once(View::getView('login'));
		die();
	}

	public function DisplayReg()
	{
		$User_model = new User_model();
		if(isset($_POST["submit"])){
			$email = $_POST["email"];
			$password = $_POST["password"];
			$password = md5($password);
			
			$tip = "";
			if($User_model->isExist($email)){
				$tip = "注册失败！";
			}else{
				$User_model->addUser($password,$email,0);
				$tip = "注册成功！";
			}

		}
		require_once(View::getView('reg'));
		die();
	}

	public function Logout()
	{
		unset($_SESSION["uid"]);
		unset($_SESSION["email"]);
		unset($_SESSION["admin"]);
		Direct("index.php");
	}
}