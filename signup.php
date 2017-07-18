<?php

	require_once('config.php');

	//create connection
	$conn = new mysqli($host,$user,$pwd,$dbname);

	//check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}

	//escape user inputs for security
	$username = $conn->real_escape_string($_REQUEST['username']);
	$email = $conn->real_escape_string($_REQUEST['email']);
	$password = $conn->real_escape_string($_REQUEST['password']);
	$birthday = $conn->real_escape_string($_REQUEST['birthday']);
	$regdate = date('Y-m-d');
	//echo $birthday;

	$sql = "INSERT INTO user (username, password, email, birthday, regdate, membership_type) values ('$username','$password','$email','$birthday','$regdate','free')";

	if ($conn->query($sql) == true) {
		header('Location: registration_complete.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>