<?php
	session_start();
	if(!isset($_SESSION['login_user']))
		header('location: login.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Foxy Library | Your home of Light Novel</title>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="text/script.js"></script>
		<link href="styles/navbar.css" rel="stylesheet" type="text/css">
		<link href="styles/style.css" rel="stylesheet" type="text/css">
	</head>


	<body>
		<header class="navigation">
			

			<div class="navbar navbar-inverse navbar-static-top">
  				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		      			<span class="icon-bar"></span>
		      			<span class="icon-bar"></span>
		      			<span class="icon-bar"></span>
		    		</button>
		    		<a class="navbar-brand" href="index.php">FOXY LIBRARY</a>
		    	</div>
					
				<div class="navbar-collapse collapse">
		      		<ul class="nav navbar-nav" id="nav">
						<li><a href="schedule.php">LỊCH PHÁT HÀNH</a></li>
						<li><a href="#">TRUYỆN MỚI</a></li>
						<li><a href="mylibrary.php">THƯ VIỆN</a></li>
						<li>
							<?php 
								if(isset($_SESSION['login_user']))
									echo '<a href="#">'. strtoupper ($_SESSION['login_user']) .'</a>';
								else
									echo '<a href="register.php">ĐĂNG KÍ</a>';
							?>
						</li>
						<li>
							<?php 
								if(isset($_SESSION['login_user']))
									echo '<a href="logout.php">ĐĂNG XUẤT</a>';
								else
									echo '<a href="login.php">ĐĂNG NHẬP</a>';
							?>
						</li>
					</ul>
				</div>
			</div>
		</header>


		<div class="content" style="padding-top: 100px;">
			<div class="main_profile" style="display:block;">
				<img src="images/profile_avatar.png" alt="profile_avatar" style="width:15%; display: inline-block;">
				<?php
					echo '<h1 style="margin: 0px; display: inline-block;">' . ($_SESSION['login_user']) . '</h1>';
				?>
			</div>

			<div class="profile_desc" style="display:block; margin-top: 50px;">
			
				<?php
					//Open connection to MySQL database
					include('config.php');
					include('user_age.php');
					$conn = new mysqli($host,$user,$pwd,$dbname);

					//Fetching user data from user table
					$current_user = ($_SESSION['login_user']);
					$sql = "SELECT * FROM user where username = '$current_user'";
					$result = $conn->query($sql);
					$row = $result->fetch_row();

					//Re-format Date
					$dob = explode('-',$row[3]);
					$age = userAge($row[3]);
					$join_date = explode('-',$row[4]);


					//Output profile information
					echo '<p>Ngày sinh: ' . $dob[2] . '-' . $dob[1] . '-' . $dob[0] . '</p>';
					echo '<p>Tuổi: ' . $age. '</p>';
					echo '<p>Ngày tham gia: ' . $join_date[2] . '-' . $join_date[1] . '-' . $join_date[0] . '</p>';
					echo '<p>Gói thành viên: ' . strtoupper($row[5]);
				?>

			</div>
		</div>

		<footer>
			<p>Foxy Library | Copyright © 2017<br/>
			Website designed by Hoang Nguyen</p>
		</footer>

	</body>
</html>