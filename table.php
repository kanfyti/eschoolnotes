<?php
	require_once 'getAllNotes.php';
	require_once 'vars.php';
    
    $username = $_POST['username'];
    $hash_password = hash("sha256", $_POST['password']);
    $userId = $_POST['userId'];
	$eiId = $_POST['eiId'];
	
	$notes = getAllNotes($username, $hash_password, $userId, $eiId);
	print_r($notes);
	
?>