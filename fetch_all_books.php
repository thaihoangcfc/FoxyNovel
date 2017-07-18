<?php
	include('config.php');

	$conn = new mysqli($host,$user,$pwd,$dbname);
	$conn->set_charset('utf8');

	$sql = "SELECT * FROM book order by name";

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