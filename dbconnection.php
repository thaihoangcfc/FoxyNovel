<?php
	require_once('config.php');

	//create connection
	$conn = new mysqli($host,$user,$pwd);
	$conn->set_charset('utf8');

?>
