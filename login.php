<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

//�������ݿ������ļ�
include('conn.php');
//����û����������Ƿ���ȷ
$jiance= mysql_query("select username from user where username='$username' and password='$password' limit 1");
//���=ִ�����ݿ⣨ѡȡ username ���� user��  
if($result = mysql_fetch_array($jiance)){
	//��¼�ɹ�
	$_SESSION['username'] = $username;
	
	echo $username,' ��ӭ�㣡���� <a href="my.php">�û�����</a><br />';
	echo '����˴� <a href="login.php?action=logout">ע��</a> ��¼��<br />';
	exit;
} 
else {
	exit('��¼ʧ�ܣ�����˴� <a href="javascript:history.back(-1);">����</a> ����');
}
?>