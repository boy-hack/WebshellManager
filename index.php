<?php
/**
 * 前端页面加载
 * @copyright (c) w8ay All Rights Reserved
 */

 require_once "init.php";
 //测试

 $Webshell_Model = new Webshell_Model();
 $web_title = "w8ay WebShell在线管理系统";
 $num = $Webshell_Model->getLogNum();
 include View::getView('header');

 $gid = $_GET["gid"];
 $path = $_GET["path"];

 switch ($action) {
 	//webshell管理
 	case '':Shellog_Controller::display_index();break;
 	case 'add':Shellog_Controller::display_add();break;
 	case 'del':Shellog_Controller::display_del($gid);break;
 	case 'edit':Shellog_Controller::display_edit($gid);break;
 	case 'opera':Shellog_Controller::display_opera();break;
 	//webshell操作
 	case 'file':ShellFile_Controller::Display_index($gid,$path);break;
 	case 'filedit':ShellFile_Controller::Display_edit($gid,$path);break;
 	case 'filedel':ShellFile_Controller::Display_del($gid,$path);break;
 	//其他操作
 	case 'help':Help_Controller::Display();break;
 	//case 'login':Login_Controller::Display();break;
 	default:wmsg("错误的指令！");break;
 }
 include View::getView('footer');
 View::output();
 ?>