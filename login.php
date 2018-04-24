<?php
	require_once('pdo.php');
	$code = $_GET;
	$username = $code['username'];
	$userpwd  = $code['userpwd'];
	$sql = "select * from user where username='$username' and userpwd='$userpwd'";
	$res = $db->query($sql);
	$user = $res->fetch(PDO::FETCH_ASSOC);
	if ($user) {
		$data = $user;
	}else{
		$data = array('用户名或密码错误');
	}
	echo json_encode($data);
?>