<?php

try {
	$pdo = new PDO('mysql:dbname=accounts; host=localhost', 'root', '12qw34er');
} catch (PDOException $e) {
	die($e->getMessage());
}


