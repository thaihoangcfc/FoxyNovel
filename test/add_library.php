<?php
	include ('config.php');

	$conn = new mysqli($host,$user,$pwd,$dbname);
	$conn->set_charset('utf8');

	if (isset($_POST['myData']))
	{
		$data = $_POST['myData'];
	
		$username = $data["username"];
		$isbn13 = $data["isbn"];

		$sql = "INSERT INTO user_library (`username`, `isbn-13`) values ('$username', '$isbn13')";
	
		if ($conn->query($sql) == true)
		{
			echo 'Đã thêm ' . $isbn13 . ' vào thư viện riêng';
		}
		else
		{
			echo $isbn13 . ' đã có sẵn trong thư viện';
		}

	}
	else echo 'Empty submission';

?>