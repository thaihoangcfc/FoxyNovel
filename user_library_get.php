<?php
	//session_start();

	include ('config.php');
	include ('library_get.php');

	$conn = new mysqli($host,$user,$pwd,$dbname);
	$conn->set_charset('utf8');

	$sql = "SELECT * FROM user_library WHERE `username` = '$current_user'";

	$result = $conn->query($sql);

	$data = array();

	//Allocate fetched data to specified array
	$row_counter = 0;

	$isbn = array();

	while ($row = $result->fetch_array())
	{
		for ($field_counter = 0; $field_counter < $result->field_count; $field_counter++)
			$data[$row_counter][$field_counter] = $row[$field_counter];
		$row_counter++;
	}

	//Isolate isbn from user_library data
	for ($i = 0; $i < count($data); $i++)
	{
		$isbn[$i] = $data[$i][1];
	}

	//Compare isbn data with book data table to fetch full information
	// for ($data_counter = 0; $data_counter < count($isbn); $data_counter++)
	// {
	// 	for ($book_counter = 0; $book_counter < count($book); $book_counter++)
	// 	{
	// 		if ($isbn[$data_counter] == $book[$book_counter][2])
	// 		{
	// 			$sql = "SELECT * FROM book WHERE `isbn-13` = '$data_counter'";
	// 		}
	// 	}
	// }

?>
