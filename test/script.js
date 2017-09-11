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