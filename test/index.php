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

		<link href="navbar.css" rel="stylesheet" type="text/css">
		<link href="style.css" rel="stylesheet" type="text/css">
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
						<li><a href="register.php">ĐĂNG KÍ</a></li>
						<li><a href="#">ĐĂNG NHẬP</a></li>
					</ul>
				</div>
			</div>
		</header>


		<div class="content">
			<h1 style="margin-bottom: 20px; text-align: center;">AJAX TEST</h1><br/>
				<?php
					include ('dbconnection.php');
					$current_user = 'thaihoangcfc';
					$isbn = '1234567890128';

					$book_to_add = array (
									"username" => $current_user,
									"isbn" => $isbn
								);
					
					// echo $bookJSON;
					// echo gettype($bookJSON);
					echo gettype($book_to_add);
					echo '<span class="add_library-0" onclick="add_library()">Đăng nhập</span>';
				?>

				<script>		
					function add_library() {
						var data = <?php echo json_encode($book_to_add); ?>;
						//alert(test);
						$.ajax({
					        type: "POST",
					        url: "add_library.php",
					        data: {myData:data},
					        // dataType: 'json',
					        success: function(response){
					        	//alert(response);
					        	$(".add_library-0").html(response);
					        	$(".add_library-0").css("background-color", "#64aa1e");
					        },
					        error: function(data){
					            alert('fail');
					        }
					    });
					};
				</script>
			</form>

		</div>

		<footer>
			<p>Foxy Library | Copyright © 2017<br/>
			Website designed by Hoang Nguyen</p>
		</footer>

	</body>
</html>