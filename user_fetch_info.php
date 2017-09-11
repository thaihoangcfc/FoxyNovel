<?php

	include('config.php');
	include('user_age.php');
	

	$conn = new mysqli($host,$user,$pwd,$dbname);

	//Fetching user data from user table
	$current_user = ($_SESSION['login_user']);
	$sql = "SELECT * FROM user where username = '$current_user'";
	$result = $conn->query($sql);
	$row = $result->fetch_row();
	$current_user_membership = $row[5];
	$age = userAge($row[3]);

?>