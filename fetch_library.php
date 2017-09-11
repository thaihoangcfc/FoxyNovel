<?php
	$conn->set_charset('utf8');

	$current_user = $_SESSION['login_user'];
	
	$sql = "SELECT * FROM user_library where username='$current_user'";

	$result = $conn->query($sql);

	$book = array();
		
	$row_counter = 0;
	//refer to parent book table and populate equivalent data to array
	while($row = $result->fetch_array())
	{
		$sql = "SELECT name, short_description FROM book where `isbn-13` = '$row[1]'";
		$query = $conn->query($sql);
		$data = $query->fetch_array();
		for ($field_counter = 0; $field_counter < $result->field_count; $field_counter++)
			$book[$row_counter][$field_counter] = $data[$field_counter];
		$row_counter++;
	};

?>