<?php
	session_start();
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
						<li><a href="#">THƯ VIỆN</a></li>
						<li>
							<?php 
								if(isset($_SESSION['login_user']))
									echo '<a href="profile.php">'. strtoupper ($_SESSION['login_user']) .'</a>';
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

		<div class="content">
			<h2>THƯ VIỆN</h2>
			<div class="row">
				<?php
					include ('library_get.php');
					include ('membership_constraint.php');

					for ($i=0;$i<count($book);$i++)
					{
						echo '<div class="col-md-3" style="margin-bottom: 10px;">';
							echo '<div class="thumbnail" style="position: relative;">';
								
								//Specify novel availibility based on user type
								if (isset($_SESSION['login_user']))
								{
									if (($current_user_membership == 'free') && ($book[$i][8] == 'premium'))
									{
										echo '<div style="position: absolute; z-index:10; width: 100%; right: 0px;">';
										echo '<span class="premium">Premium</span>';
										echo '<span class="constraint">2 Chương đầu</span>';
										echo '</div>';
									}
								}
								else echo '<span class="constraint">2 Chương đầu</span>';


								echo '<img src="images/rezero.jpg" alt="ReZero" style="width: 100%; position: relative;">
									<h3 class="comicTitle"><a href="#">' . $book[$i][0] .'</a></h3>
									<div class="caption">
									<p class="text-justify">' . $book[$i][6] . '</p>
								</div>';
								echo '<span class="read"><a href="#">ĐỌC TRUYỆN</a></span>';
							echo '</div>';
						echo '</div>';
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