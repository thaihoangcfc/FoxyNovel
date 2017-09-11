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
			<div style="display: inline-block; width: 30%;">
				<div class="main_profile" style="display:block; width: 70%;">
					<img src="images/profile_avatar.png" alt="profile_avatar" style="width:80%; display: block; margin: 0 auto;">
					<?php
						echo '<h1 class="username">' . ($_SESSION['login_user']) . '</h1>';
					?>
				</div>

				<div class="profile_desc">
				
					<?php
						//Open connection to MySQL database
						include('user_fetch_info.php');
						include('date_reformat.php');

						//Output profile information
						
						// echo '<p>Ngày tham gia: ' . date_reformat($row[4]) . '</p>';
						// echo '<p>Gói thành viên: ' . strtoupper($row[5]);
					?>

				</div>
			</div>

			<div style="width: 69%; display: inline-block; float: right;">
				<div style="padding-bottom:0px;">
					<h1 style="margin-top: 0px; border-bottom: 2px solid #ff7d4f; padding-bottom: 10px;">Thông tin cá nhân</h1>

					<?php
						
						//$current_user_membership = $row[5];
						echo '<p class="profile_info">Ngày sinh: ' . date_reformat($row[3]) . '</p>';
						echo '<p class="profile_info">Tuổi: ' . $age. '</p>';
						echo '<p class="profile_info">Email: ' . $row[2]. '</p>';
						echo '<p class="profile_info">Ngày tham gia: ' . date_reformat($row[4]) . '</p>';
						echo '<p class="profile_info">Gói thành viên: ' . strtoupper($row[5]);
					?>
				</div>

			</div>

			<div>
				<h1 style="margin-top: 100px; border-bottom: 2px solid #ff7d4f; padding-bottom: 10px; margin-bottom: 20px;">Thư viện riêng</h1>

					<?php
						$current_user = $_SESSION['login_user'];
						
						$sql = "SELECT * FROM user_library where username='$current_user'";
							
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

					
						<?php
							include ('fetch_library.php');
							if ($current_user_membership == "premium")
							{
								if ($book == null)
								{
									echo '<p style="text-align: center; font-style: italic;">Bạn chưa có truyện trong thư viện riêng, hãy đến <a href="mylibrary.php">thư viện</a> tìm cuốn truyện bạn ưa thích.</p>';
								}
								else
								{
									for ($i=0;$i<count($book);$i++)
									{
										echo '
										<div class="comicLibrary" style="margin-top: 20px;">
											<table style="border: none;">
												<tr style="background-color: white; text-align: left; border: none; ">
													<td style="border: none; text-align: left; padding: 0; width: 10%;"><div>
														<img src="images/rezero.jpg" alt="ReZero" style="width: 100%;">
													</div></td>
													<td style="border: none; text-align: left; padding: 0; width: 50%; vertical-align: top; padding-left: 10px; padding-right: 50px;"><div>
														<h1 style="margin-top: 5px; margin-bottom: 10px; font-size: 130%;">'. $book[$i][0] . '</h1>
														<p style="">' . $book[$i][1] . '</p>
													</div></td>
													<td style="border: none; text-align: left; padding: 0; width: 10%; vertical-align: bottom; padding-bottom: 5px;"><div>
														<span class="read" style="width: 100%; margin: 0 0; padding: 7px 0; position: relative;"><a href="#">ĐỌC TRUYỆN</a></span>
													</div></td>
												</tr>
											</table>
										</div>';
									}
								}
							}
							else
							{
								echo '<p style="text-align: center; font-style: italic;">Thư viện riêng chỉ dành cho thành viên <a href="#">Premium</a></p>';
							}
						?>
			</div>

		</div>

		<footer>
			<p>Foxy Library | Copyright © 2017<br/>
			Website designed by Hoang Nguyen</p>
		</footer>

	</body>
</html>