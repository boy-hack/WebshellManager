<?php
/**
 * WebShell的文件控制操作
 *
 * @copyright (c) Emlog All Rights Reserved
 */

class ShellFile_Controller {
	
	public function Display_index($gid,$filepath='')
	{
		$Webshell_Model = new Webshell_Model();
		$info = $Webshell_Model->getshell($gid);
		$Shell_Model = new Shell_Model($info["url"],$info["pass"],$info["type"]);
		if(isset($filepath)){
			$rootfile = realpath(File_Str($filepath));
			$webfile = FileSort($Shell_Model->GetWebDiskFileList($rootfile));
		}else{
			$webroot = $Shell_Model->GetWebRootPathAndDiskArray();
			if(isset($webroot)){
				$rootfile = $webroot["WebRoot"];
				$webfile = FileSort($Shell_Model->GetWebDiskFileList($rootfile));
				include View::getView('file');
			}else{
				wmsg("连接失败");
			}
		}
		include View::getView('file');
	}

	public function Display_edit($gid,$path)
	{
		$Webshell_Model = new Webshell_Model();
		$path = File_Str($path);
		$time = htmlspecialchars($_GET["time"]);
		$info = $Webshell_Model->getshell($gid);
		$Shell_Model = new Shell_Model($info["url"],$info["pass"],$info["type"]);
		if(isset($_POST["content"])){
			$Shell_Model->CreateAndSaveFile($path,$_POST["content"]);
			wmsg("操作完成");
		}
		if(isset($_POST["time"])){
			#code..
		}
		$content = htmlspecialchars($Shell_Model->GetWebFileContent($path));
		include View::getView('editfile');
	}

	public function Display_del($gid,$path)
	{	$Webshell_Model = new Webshell_Model();
		$path = File_Str($path);
		$info = $Webshell_Model->getshell($gid);
		$Shell_Model = new Shell_Model($info["url"],$info["pass"],$info["type"]);
		$r = $Shell_Model->DeleteFile($path);
		if($r){
			wmsg("删除成功","index.php?action=file&gid=$gid");
		}else{
			wmsg("删除失败","index.php?action=file&gid=$gid");
		}
	}

}
