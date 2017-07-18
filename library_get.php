<?php
	//open connection to database
	include('config.php');
	include('user_age.php');

	$conn = new mysqli($host,$user,$pwd,$dbname);
	$conn->set_charset('utf8');

	if (isset($_SESSION['login_user']))
	{
		//specify current session user
		$current_user = $_SESSION['login_user'];
									
		//retrieve current user data
		$sql = "SELECT * FROM user where username = '$current_user'";
		$result = $conn->query($sql);
		$row = $result->fetch_row();

		//specify current user age
		$current_user_age = userAge($row[3]);

		//query data
		$sql = "SELECT * FROM book where age <= '$current_user_age' order by name, membership_type";
	}
	else
	{
		$sql = "SELECT * FROM book order by name";	
	}

	
	$result = $conn->query($sql);

	//initialize array data
	$book = array();

	//Assign fetched data to specified array
	$row_counter = 0;

	while ($row = $result->fetch_array())
	{
		for ($field_counter = 0; $field_counter < $result->field_count; $field_counter++)
			$book[$row_counter][$field_counter] = $row[$field_counter];
			$row_counter++;
	}
		
?>