<?php
	require_once('pdo.php');
	if (!empty($_GET['hotel_id'])) {
		$hotel_id = $_GET['hotel_id'];
		$sql = "select * from hotel where hotel_id = $hotel_id";
		$res = $db->query($sql);
		$data = $res->fetch(PDO::FETCH_ASSOC);
	}else{
		$sql = "select * from hotel";
		$res = $db->query($sql);
		$data = $res->fetchAll(PDO::FETCH_ASSOC);
	}
	echo json_encode($data);
?>