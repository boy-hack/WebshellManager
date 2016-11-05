w8ay webshell Web端管理工具
目前仅支持PHP类型一句话木马

这应该算是第二版了，第一版只是抓了菜刀的包，这一个版本可以自行组合发送的指令
在 include\model\PHPShell_Build_mothod.php 中可以自行设置发送的参数，会自动完成加密

完成了多用户系统，可多用户注册登陆管理webshell


  
bug*
中文文件查看失败


未完成功能：
	面包屑导航

已完成功能：
	一句话 => 添加，修改，多项操作删除 类型查看 搜索 分页
	文件管理 => 显示 修改 

待完成：
* 管理操作日志
* 多用户
* 多webshell DDos攻击代码
* 多webshell 操作


数据库格式

w8_webshell{
	url,
	pass,
	charset, 编码
	extra, 备注
	type,类型
	time,创建时间
	uid,用户对应ID
}

w8_cache{ 
	url,
	path,
	json, 保存为json格式的数据
}

w8_user{
	id,
	password,
	email,
	admin, //是否为管理员
}