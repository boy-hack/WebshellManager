<?php
/**
 * WebShell的记录控制操作
 *
 * @copyright (c) Emlog All Rights Reserved
 */

class Shellog_Controller {

	function display_index(){
		$Webshell_Model = new Webshell_Model();
		$web_title = "w8ay WebShell在线管理系统";
		$keyword = $_GET["keyword"];
		$type = $_GET["type"];
		$page = $_GET["page"];
		if(empty($page))$page=1;
		$index_lognum = perpage_num;
		if(isset($keyword)){
			$keyword = addslashes(htmlspecialchars(urldecode($keyword)));
			$keyword = str_replace(array('%', '_'), array('\%', '\_'), $keyword);
			$sqlSegment = "where extra like '%{$keyword}%' or url like '%{$keyword}%' order by time desc";
			$lognum = $Webshell_Model->getLogNum($sqlSegment);
			$total_pages = ceil($lognum / $index_lognum);
			if ($page > $total_pages) {
			    $page = $total_pages;
			}
			$pageurl = 'index.php?keyword='.urlencode($keyword).'&page=';
			$logs = $Webshell_Model->getLogsForAdmin($sqlSegment,$page);
			$page_url = pagination($lognum, $index_lognum, $page, $pageurl);
		}elseif (isset($type)) {
			$type = strtoupper(addslashes(htmlspecialchars(urldecode($type))));
			$type = str_replace(array('%', '_'), array('\%', '\_'), $type);
			$sqlSegment = "where type = '$type' order by time desc";
			$lognum = $Webshell_Model->getLogNum($sqlSegment);
			$total_pages = ceil($lognum / $index_lognum);
			if ($page > $total_pages) {
			    $page = $total_pages;
			}
			$pageurl = 'index.php?type='.urlencode($type).'&page=';
			$logs = $Webshell_Model->getLogsForAdmin($sqlSegment,$page);
			$page_url = pagination($lognum, $index_lognum, $page, $pageurl);
		}else{
			$lognum = $Webshell_Model->getLogNum($sqlSegment);
			$total_pages = ceil($lognum / $index_lognum);
			if ($page > $total_pages) {
			    $page = $total_pages;
			}
			$pageurl = 'index.php?&page=';
			$logs = $Webshell_Model->getLogsForAdmin('',$page);
			$page_url = pagination($lognum, $index_lognum, $page, $pageurl);
		}
		require_once(View::getView('webshell'));
	}

	function display_add(){
		$Webshell_Model = new Webshell_Model();

		if(isset($_POST["add_url"])){
			if(empty($_POST["options"])){
				$_POST["options"] = "ASP";
			}
			$logData = array(
					"url" => htmlspecialchars($_POST["add_url"]),
					"pass" => htmlspecialchars($_POST["add_password"]),
					"extra" => htmlspecialchars($_POST["add_intro"]),
					"type" => htmlspecialchars($_POST["options"]),
					"time" => time()
				);
			$blogid = $Webshell_Model->add($logData);
			wmsg("添加成功！");
		}
		require_once(View::getView('add'));
	}

	function display_del($gid){
		if(!isset($gid)){wmsg("没有传递id");die();}
		$Webshell_Model = new Webshell_Model();
		$Webshell_Model->delete($gid);
		wmsg("删除成功","index.php");
	}

	function display_edit($gid){
		if(!isset($gid)){wmsg("没有传递id");die();}
		$Webshell_Model = new Webshell_Model();
		$info = $Webshell_Model->getshell($gid);
		if(isset($_POST["add_url"])){
			if(empty($_POST["options"])){
				$_POST["options"] = $info["type"];
			}
			$logData = array(
					"url" => htmlspecialchars($_POST["add_url"]),
					"pass" => htmlspecialchars($_POST["add_password"]),
					"extra" => htmlspecialchars($_POST["add_intro"]),
					"type" => htmlspecialchars($_POST["options"]),
				);
			$blogid = $Webshell_Model->update($logData,$gid);
			wmsg("修改成功");
		}
		include View::getView('edit');
		
	}

	function display_opera()
	{
		$act = $_POST["opera_act"];
		$id = $_POST["id"];
		if(!isset($act))wmsg("错误的参数");
		$Webshell_Model = new Webshell_Model();
		if($act=="del"){
			foreach ($id as $key => $value) {
				$Webshell_Model->delete($value);
			}
			wmsg("删除成功","index.php");
		}
	}

}
