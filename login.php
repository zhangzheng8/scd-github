<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

//包含数据库连接文件
include('conn.php');
//检测用户名及密码是否正确
$jiance= mysql_query("select username from user where username='$username' and password='$password' limit 1");
//检测=执行数据库（选取 username 来自 user表  
if($result = mysql_fetch_array($jiance)){
	//登录成功
	$_SESSION['username'] = $username;
	
	echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
	echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
	exit;
} 
else {
	exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}
?>