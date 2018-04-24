<?php
	require_once('pdo.php');
	$sql = "select * from eat";
	$res = $db->query($sql);
	$data = $res->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
?>