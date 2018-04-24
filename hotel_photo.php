<?php
	require_once('pdo.php');
	$hotel_id = $_GET['hotel_id'];
	$sql = "select * from hotel_photo where hotel_id = $hotel_id";
	$res = $db->query($sql);
	$data = $res->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
?>