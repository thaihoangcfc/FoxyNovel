<?php

	include('config.php');
	session_start();

	//create connection
	$conn = new mysqli($host,$user,$pwd,$dbname);

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$username = $conn->real_escape_string($_REQUEST['username']);
		$password = $conn->real_escape_string($_REQUEST['password']);

		$sql = "SELECT username FROM user WHERE username = '$username' and password = '$password'";
		$result = $conn->query($sql);
		$row = $result->fetch_array(MYSQLI_ASSOC);

		$count = $result->num_rows;

		if ($count == 1)
		{
			//session_register("username");
			$_SESSION['login_user'] = $username;

			header("location: login_complete.php");
		} else {
			$error = "Your login credentials are invalid";
			echo $error;
		}
	}
?>