<?php
	require_once('config.php');

	//create connection
	$conn = new mysqli($host,$user,$pwd);

	//check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connection_error);
	}

	echo "Connected successfully";
?>
