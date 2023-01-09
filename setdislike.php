<?php

include 'db.php';


	$sql = ("UPDATE lab2 SET dlk = dlk + 1 WHERE id = ?");
	$query = $pdo -> prepare($sql);
	$query-> execute([$_GET['id']]);
	
	header("Location:http://localhost/lab2/index.php");

