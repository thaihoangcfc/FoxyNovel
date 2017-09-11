<?php
	include ('config.php');

	$conn = new mysqli($host,$user,$pwd,$dbname);
	$conn->set_charset('utf8');

	if (isset($_POST['myData']))
	{
		$data = json_decode($_POST['myData'], true);
	
		$username = $data["username"];
		$isbn13 = $data["isbn"];

		$sql = "INSERT INTO user_library (`username`, `isbn-13`) values ('$username', '$isbn13')";
	
		if ($conn->query($sql) == true)
		{
			$sql_fetch_name = "SELECT `name` FROM `book` WHERE `isbn-13` = '$isbn13';";
			$result = $conn->query($sql_fetch_name);

			$row = $result->fetch_row();
			$bookname = $row[0];

			echo 'Đã thêm ' . $bookname . ' vào bookmark';
		}
		else
		{
			echo 'Đã có sẵn trong bookmark';
		}

	}
	else echo 'Empty submission';

?>