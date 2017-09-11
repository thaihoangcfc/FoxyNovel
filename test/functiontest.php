<?php
	session_start();
	//open connection to database
	include('config.php');
	$conn = new mysqli($host,$user,$pwd,$dbname);
	$conn->set_charset('utf8');

	//specify current session user
	$current_user = $_SESSION['login_user'];
								
	//retrieve current user data
	$sql = "SELECT * FROM user where username = '$current_user'";
	$result = $conn->query($sql);
	$row = $result->fetch_row();

	//specify current user membership type
	$current_user_membership = $row[5];

	//query data
	$sql = "SELECT * FROM book where membership_type = '$current_user_membership'";
	$result = $conn->query($sql);

	//initialize array data
	$data = array();
		
?>