<?php 
/**
* 用户操作
*/
class User_model
{
	private $db;

	function __construct()
	{
		$this->db = Database::getInstance();
	}

	function addUser($password,  $email, $isadmin) {
		$sql="insert into ".DB_PREFIX."user (password,email,admin) values('$password','$email','$isadmin')";
		$this->db->query($sql);
	}
	
	function deleteUser($uid) {
		$this->db->query("delete from ".DB_PREFIX."user where id=$uid");
		$this->db->query("delete from ".DB_PREFIX."webshell where uid=$uid");
	}

	function updateUser($userData, $uid) {
		$Item = array();
		foreach ($userData as $key => $data) {
			$Item[] = "$key='$data'";
		}
		$upStr = implode(',', $Item);
		$this->db->query("update ".DB_PREFIX."user set $upStr where id=$uid");
	}

	function isExist($email='') {
        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM ".DB_PREFIX."user WHERE email='$email'");
		if ($data['total'] > 0) {
			return true;
		}else {
			return false;
		}
	}

	function CheckUser($email,$password)
	{
		$sql = "SELECT * FROM ".DB_PREFIX."user where email='$email' and password='$password'";
		$user = false;
		$user = $this->db->once_fetch_array($sql);
		if(!$user){
			return false;
		}
		return $user;
	}
}