<?php
	header("content-type:text/html;charset=utf8");
	$db = new PDO("mysql:host=127.0.0.1;dbname=weixin",'root','root');//初始化一个PDO对象
	$db->query('set names utf8');
?>