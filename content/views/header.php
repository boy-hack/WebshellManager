<?php include view::getView("mothod") ?>
<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <title><?php echo $web_title; ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="<?php echo CSS_Path; ?>assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="<?php echo CSS_Path; ?>assets/css/admin.css">
</head>
<body>
<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>Webshell Manager</strong> <small>w8ay</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php echo $email; ?> <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="index.php?action=logout"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="index.php"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> Webshell管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="index.php" class="am-cf"><span class="am-icon-check"></span> 一句话管理<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $num; ?></span></a></li>
            <li><a href="index.php?action=help"><span class="am-icon-puzzle-piece"></span> 帮助页</a></li>
            <li><a href="#"><span class="am-icon-calendar"></span> 操作日志</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="am-icon-bug"></span> 执行命令</a></li>
        <li><a href="#"><span class="am-icon-bug"></span> DDOS</a></li>
        <li><a href="index.php?action=logout"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end -->
