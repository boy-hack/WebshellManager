<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>注册</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="<?php echo CSS_Path; ?>assets/i/favicon.png">
  <link rel="stylesheet" href="<?php echo CSS_Path; ?>assets/css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>注册</h1>
    <p>Webshell 一句话管理平台</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
      <?php if(isset($tip))echo $tip; ?>
    <form method="post" class="am-form">
      <label for="email">邮箱:</label>
      <input type="email" name="email" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="">
      <label for="password">邀请码</label>
      <input type="text" name="invitcode" id="text" value="暂未开启，随意填写">
      <br>
      <label for="remember-me">
      <a href="index.php?action=login">登陆</a>
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="submit" value=" 注 册 " class="am-btn am-btn-primary am-btn-sm am-fr">
      </div>
    </form>
    <hr>
   
  </div>
</div>
</body>
</html>
