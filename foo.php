<?php

include 'db.php';

$name = $_POST['name'];
$msg = $_POST['message'];
$get_id = $_GET['id'];


// Create

if (isset($_POST['add'])) {
	$sql = ("INSERT INTO lab2 (name, mesg) VALUES(?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $msg]);

	if ($query) {
		header("Location: ". $_SERVER['HTTP_REFERER']);
	}
}

// Read

$sql = $pdo->prepare("SELECT * FROM lab2");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

// Update

if (isset($_POST['edit'])) {
	$sql = ("UPDATE lab2 SET name=?, mesg=? WHERE id=?");
	$query = $pdo->prepare($sql);
	$query->execute([$name, $msg, $get_id]);

	if ($query) {
		header("Location: ". $_SERVER['HTTP_REFERER']);
	}
}

// Delete

if (isset($_POST['delete'])) {
	$sql = ("DELETE FROM lab2 WHERE id=?");
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);

	if ($query) {
		header("Location: ". $_SERVER['HTTP_REFERER']);
	}
}


// Set dislike

if(isset($_POST['dislike'])) {

	$sql = ("UPDATE lab2 SET dislikes = dislikes + 1 WHERE id = ?");
	$query = $pdo -> prepare($sql);
	$query-> execute([$_GET['id']]);
		header("Location:http://localhost/lab2/index.php");

}
