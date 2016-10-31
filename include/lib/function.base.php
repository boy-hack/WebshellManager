<?php

/**
 * 基础函数库
 * @copyright (c) Emlog All Rights Reserved
 */
function __autoload($class) {
	$class = strtolower($class);
	if (file_exists(W8AY_ROOT . '/include/model/' . $class . '.php')) {
		require_once(W8AY_ROOT . '/include/model/' . $class . '.php');
	} elseif (file_exists(W8AY_ROOT . '/include/lib/' . $class . '.php')) {
		require_once(W8AY_ROOT . '/include/lib/' . $class . '.php');
	} elseif (file_exists(W8AY_ROOT . '/include/controller/' . $class . '.php')) {
		require_once(W8AY_ROOT . '/include/controller/' . $class . '.php');
	} else {
		wMsg($class . '加载失败。');
	}
}

/**
 * 去除多余的转义字符
 */
function doStripslashes() {
	if (get_magic_quotes_gpc()) {
		$_GET = stripslashesDeep($_GET);
		$_POST = stripslashesDeep($_POST);
		$_COOKIE = stripslashesDeep($_COOKIE);
		$_REQUEST = stripslashesDeep($_REQUEST);
	}
}

/**
 * 递归去除转义字符
 */
function stripslashesDeep($value) {
	$value = is_array($value) ? array_map('stripslashesDeep', $value) : stripslashes($value);
	return $value;
}

/**
 * 转换HTML代码函数
 *
 * @param unknown_type $content
 * @param unknown_type $wrap 是否换行
 */
function htmlClean($content, $nl2br = true) {
	$content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
	if ($nl2br) {
		$content = nl2br($content);
	}
	$content = str_replace('  ', '&nbsp;&nbsp;', $content);
	$content = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $content);
	return $content;
}

/**
 * 获取用户ip地址
 */
function getIp() {
	$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
	if (!ip2long($ip)) {
		$ip = '';
	}
	return $ip;
}

/**
 * 获取站点地址(仅限根目录脚本使用,目前仅用于首页ajax请求)
 */
function getBlogUrl() {
	$phpself = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
	if (preg_match("/^.*\//", $phpself, $matches)) {
		return 'http://' . $_SERVER['HTTP_HOST'] . $matches[0];
	} else {
		return BLOG_URL;
	}
}



/**
 * 生成一个随机的字符串
 *
 * @param int $length
 * @param boolean $special_chars
 * @return string
 */
function getRandStr($length = 12, $special_chars = true) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	if ($special_chars) {
		$chars .= '!@#$%^&*()';
	}
	$randStr = '';
	for ($i = 0; $i < $length; $i++) {
		$randStr .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	return $randStr;
}

/**
 * 寻找两数组所有不同元素
 */
function findArray($array1, $array2) {
	$r1 = array_diff($array1, $array2);
	$r2 = array_diff($array2, $array1);
	$r = array_merge($r1, $r2);
	return $r;
}


/**
 * 页面跳转
 */
function Direct($directUrl) {
	header("Location: $directUrl");
	exit;
}

/**
 * 显示系统信息
 *
 * @param string $msg 信息
 * @param string $url 返回地址
 * @param boolean $isAutoGo 是否自动返回 true false
 */
function wMsg($msg, $url = 'javascript:history.back(-1);', $isAutoGo = false) {
	if ($msg == '404') {
		header("HTTP/1.1 404 Not Found");
		$msg = '抱歉，你所请求的页面不存在！';
	}
	echo <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
EOT;
	if ($isAutoGo) {
		echo "<meta http-equiv=\"refresh\" content=\"2;url=$url\" />";
	}
	echo <<<EOT
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>提示信息</title>
<style type="text/css">
<!--
body {
	background-color:#F7F7F7;
	font-family: Arial;
	font-size: 12px;
	line-height:150%;
}
.main {
	background-color:#FFFFFF;
	font-size: 12px;
	color: #666666;
	width:650px;
	margin:60px auto 0px;
	border-radius: 10px;
	padding:30px 10px;
	list-style:none;
	border:#DFDFDF 1px solid;
}
.main p {
	line-height: 18px;
	margin: 5px 20px;
}
-->
</style>
</head>
<body>
<div class="main">
<p>$msg</p>
EOT;
	if ($url != 'none') {
		echo '<p><a href="' . $url . '">&laquo;点击返回</a></p>';
	}
	echo <<<EOT
</div>
</body>
</html>
EOT;
	exit;
}


/**
 * hmac 加密
 *
 * @param unknown_type $algo hash算法 md5
 * @param unknown_type $data 用户名和到期时间
 * @param unknown_type $key
 * @return unknown
 */
if(!function_exists('hash_hmac')) {
	function hash_hmac($algo, $data, $key) {
		$packs = array('md5' => 'H32', 'sha1' => 'H40');

		if (!isset($packs[$algo])) {
			return false;
		}

		$pack = $packs[$algo];

		if (strlen($key) > 64) {
			$key = pack($pack, $algo($key));
		} elseif (strlen($key) < 64) {
			$key = str_pad($key, 64, chr(0));
		}

		$ipad = (substr($key, 0, 64) ^ str_repeat(chr(0x36), 64));
		$opad = (substr($key, 0, 64) ^ str_repeat(chr(0x5C), 64));

		return $algo($opad . pack($pack, $algo($ipad . $data)));
	}
}

//自动转换为utf-8
function characet($data){
  if( !empty($data) ){
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;
    if( $fileType != 'UTF-8'){
      $data = mb_convert_encoding($data ,'utf-8' , $fileType);
    }
  }
  return $data;
}

//模拟提交POST
function do_post_request($url, $data, $optional_headers = null)
  {
     $params = array('http' => array(
                  'method' => 'POST',
                  'content' => $data
               ));
     if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
     }
     $ctx = stream_context_create($params);
     $fp = @fopen($url, 'rb', false, $ctx);
     if (!$fp) {
     	wMsg("Problem with $url, $php_errormsg");
        //throw new Exception("Problem with $url, $php_errormsg");
     }
     $response = @stream_get_contents($fp);
     if ($response === false) {
     	wMsg("Problem reading data from $url, $php_errormsg");
        //throw new Exception("Problem reading data from $url, $php_errormsg");
     }
     return $response;
     //return characet($response);
  }

  /*以下是取中间文本的函数 
  getSubstr=调用名称
  $str=预取全文本 
  $leftStr=左边文本
  $rightStr=右边文本
  */
  function getSubstr($str, $leftStr, $rightStr)
  {
      $left = strpos($str, $leftStr);
      //echo '左边:'.$left;
      $right = strpos($str, $rightStr,$left);
      //echo '<br>右边:'.$right;
      if($left < 0 or $right < $left) return '';
      return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
  }

  function File_Str($string)
  {
  	return str_replace('//','/',str_replace('\\','/',$string));
  }

  /**
   * 分页函数
   *
   * @param int $count 条目总数
   * @param int $perlogs 每页显示条数目
   * @param int $page 当前页码
   * @param string $url 页码的地址
   */
  function pagination($count, $perlogs, $page, $url, $anchor = '') {
  	$pnums = @ceil($count / $perlogs);
  	$re = '';
  	$re.='<ul class="am-pagination">';
  	$urlHome = preg_replace("|[\?&/][^\./\?&=]*page[=/\-]|", "", $url);
  	for ($i = $page - 5; $i <= $page + 5 && $i <= $pnums; $i++) {
  		if ($i > 0) {
  			if ($i == $page) {
  				$re .= "<li class=\"am-active\"><a>$i</a></li>";
  			}else {
  				$re .= "<li><a href=\"$url$i$anchor\">$i</a></li>";
  			}
  		}
  	}
  	if ($page > 6)
  		$re = "<li><a href=\"{$urlHome}$anchor\">首页</a></li>$re";
  	if ($page + 5 < $pnums)
  		$re = "$re<li><a href=\"$url$pnums$anchor\">尾页</a></li>";
  	if ($pnums <= 1)
  		$re = '';
  	$re.='</ul>';
  	return $re;
  }
  ?>