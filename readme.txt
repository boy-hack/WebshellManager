w8ay webshell Web端管理工具
目前仅支持PHP类型一句话木马

function:
web端操作webshell一句话 完成了文件管理


  
bug*
中文文件查看失败


未完成功能：
	一句话管理 =>    
	文件管理 => 新建目录
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
}

w8_cache{ 
	url,
	path,
	json, 保存为json格式的数据
}

w8_user{
	username,
	password,
	email
}