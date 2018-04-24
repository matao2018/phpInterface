<?php
	require_once('pdo.php');
	if (!empty($_GET['play_id'])) {
		$play_id = $_GET['play_id'];
		$sql = "select * from play_photo where play_id = $play_id";
		$res = $db->query($sql);
		$photo = $res->fetchAll(PDO::FETCH_ASSOC);
		$data['photo'] = $photo;
	}else{
		$sql = "select * from play";
		$res = $db->query($sql);
		$data = $res->fetchAll(PDO::FETCH_ASSOC);
	}
	echo json_encode($data);
	
?>