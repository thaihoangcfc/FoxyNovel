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
		    		<a class="navbar-brand" href="#">FOXY LIBRARY</a>
		    	</div>
					
				<div class="navbar-collapse collapse">
		      		<ul class="nav navbar-nav" id="nav">
						<li><a href="schedule.php">LỊCH PHÁT HÀNH</a></li>
						<li><a href="#">TRUYỆN MỚI</a></li>
						<li><a href="mylibrary.php">THƯ VIỆN</a></li>
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

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  	<!-- Indicators -->
		  	<ol class="carousel-indicators">
		    	<li data-target="#myCarousel" data-slide-to="0"></li>
		    	<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
		    	<li data-target="#myCarousel" data-slide-to="2"></li>
		  	</ol>

 			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			     	<img src="images/slide1.jpg" alt="carousel">
			    </div>
    			<div class="item">
    				<img src="images/slide2.jpg" alt="carousel">
 				</div>
   				<div class="item">
     				<img src="images/slide3.jpg" alt="carousel">
    			</div>
  			</div>

  			<!-- Left and right controls -->
  			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
 			</a>
  			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right"></span>
    			<span class="sr-only">Next</span>
  			</a>
		</div>

		<div class="content">
			<h2>TRUYỆN MỚI</h2>
			<div class="row">
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/rezero.jpg" alt="ReZero" style="width: 100%">
						<h3 class="comicTitle"><a href="comic1.php">Re:ZERO - Starting Life In Another World -</a></h3>
						<div class="caption">
							<p class="text-justify">The story centers on Subaru Natsuki, a hikikomori who suddenly finds himself transported to another world on his way home from the convenience store.</p>
						</div>
						<span class="read"><a href="#">ĐỌC TRUYỆN</a></span>
					</div>
				</div>

				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/rezero.jpg" alt="ReZero" style="width: 100%">
						<h3 class="comicTitle">Re:ZERO - Starting Life In Another World -</h3>
						<div class="caption">
							<p class="text-justify">The story centers on Subaru Natsuki, a hikikomori who suddenly finds himself transported to another world on his way home from the convenience store.</p>
						</div>
						<span class="read"><a href="#">ĐỌC TRUYỆN</a></span>
					</div>
				</div>

				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/rezero.jpg" alt="ReZero" style="width: 100%">
						<h3 class="comicTitle">Re:ZERO - Starting Life In Another World -</h3>
						<div class="caption">
							<p class="text-justify">The story centers on Subaru Natsuki, a hikikomori who suddenly finds himself transported to another world on his way home from the convenience store.</p>
						</div>
						<span class="read"><a href="#">ĐỌC TRUYỆN</a></span>
					</div>
				</div>

				<div class="col-md-3">
					<div class="thumbnail">
						<img src="images/rezero.jpg" alt="ReZero" style="width: 100%">
						<h3 class="comicTitle">Re:ZERO - Starting Life In Another World -</h3>
						<div class="caption">
							<p class="text-justify">The story centers on Subaru Natsuki, a hikikomori who suddenly finds himself transported to another world on his way home from the convenience store.</p>
						</div>
						<span class="read"><a href="#">ĐỌC TRUYỆN</a></span>
					</div>
				</div>

			</div>
		</div>

		<footer>
			<p>Foxy Library | Copyright © 2017<br/>
			Website designed by Hoang Nguyen</p>
		</footer>

	</body>
</html>