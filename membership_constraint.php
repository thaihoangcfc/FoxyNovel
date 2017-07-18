<?php
	include('config.php');

	$conn = new mysqli($host,$user,$pwd,$dbname);

	//specify current session user
	if (isset($_SESSION['login_user']))
	{
		$current_user = $_SESSION['login_user'];
										
		//retrieve current user data
		$sql = "SELECT * FROM user where username = '$current_user'";
		$result = $conn->query($sql);
		$row = $result->fetch_row();

		//specify current user membership type
		$current_user_membership = $row[5];
	}	

?>