<?php
	session_start();
	include ('library_get.php');
	include ('user_fetch_info.php');
	include ('user_library_get.php');
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

		<span class="noti"></span>

		<div class="content">
			<h2>THƯ VIỆN</h2>
			<div class="row">

				<!-- display all books -->
				<?php
					$quote = "'";

					for ($i = 0; $i < count($book); $i++)
					{
						echo '<div class="col-md-3" style="margin-bottom: 10px;">';
							echo '<div class="thumbnail" style="position: relative;">';
								

								if ((isset($_SESSION['login_user']) && $current_user_membership == 'free') || (!isset($_SESSION['login_user'])))
								{
									if ($book[$i][8] == 'free')
									{
										echo '<div style="position: absolute; z-index:10; width: 100%; right: 0px;">';
										echo '<span class="constraint">2 Chương đầu</span>';
										echo '</div>';
									}
									if ($book[$i][8] == 'premium')
									{
										echo '<div style="position: absolute; z-index:10; width: 100%; right: 0px;">';
										echo '<span class="premium">Premium</span>';
										echo '</div>';
									}
								}


								echo '<img src="images/rezero.jpg" alt="ReZero" style="width: 100%; position: relative;">
									<h3 class="comicTitle"><a href="#">' . $book[$i][0] .'</a></h3>';
								echo '<span class="read"><a href="#">ĐỌC TRUYỆN</a></span>';

								if (isset($_SESSION['login_user']))
								{
									if (($current_user_membership == "premium") && ($book[$i][8] == "free"))
									{
										//Identify books that has been added to personal bookmark
										for ($j = 0; $j < count($isbn); $j++)
										{
											if ($book[$i][2] == $isbn[$j])
											{
												echo '<span class="add_library-' . $i . '" onclick="add_library('. $i . ',' . $quote . $current_user . $quote . ',' . $quote . $book[$i][2] . $quote . ')" style="background-color: #64aa1e;">ĐÃ THÊM VÀO BOOKMARK</span>';
												break;
											}

											if ($j == count($isbn) - 1)
											{
												echo '<span class="add_library-' . $i . '" onclick="add_library('. $i . ',' . $quote . $current_user . $quote . ',' . $quote . $book[$i][2] . $quote . ')">THÊM VÀO BOOKMARK</span>';
											}
										}
															
									}

									if (($current_user_membership == "premium") && ($book[$i][8] == "premium"))
									{
										echo '<span class="buy"><a href="#" style="color: white; text-decoration: none;">MUA TRUYỆN</a></span>';
									}
								}
							echo '</div>';
						echo '</div>';
					}
				?>

				<script>
					// var i = 0;
					// while (i < <?php //echo count($book); ?>)
					// {
					// 	if ()
					// }
 
					function add_library(index, user, isbn) { 
						
						// var data = '{'
						// 	+ '"username" : user 
						// 	+ '"' + ',"isbn":' + '"' + isbn + '"' + '}';
				
						var book_to_add = new Object();
						book_to_add.username = user;
						book_to_add.isbn = isbn;

						var data = JSON.stringify(book_to_add);

						$.ajax({
					        type: "POST",
					        url: "add_library.php",
					        data: {myData:data},
					        // dataType: 'json',
					        success: function(response){
					        	//alert(response);
					        	$(".noti").html(response);
					        	$(".noti").css("visibility", "visible");
					        	$(".noti").fadeIn(500).delay(2000).fadeOut(500);
					        	$(".add_library-" + index).css("background-color", "#64aa1e");
					        	$(".add_library-" + index).html("ĐÃ THÊM VÀO BOOKMARK");
					        }
					    });
					};
				</script>
			</div>
		</div>

		<footer>
			<p>Foxy Library | Copyright © 2017<br/>
			Website designed by Hoang Nguyen</p>
		</footer>

	</body>
</html>