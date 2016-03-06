<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning PHP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="jquery-1.12.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">

</head>
<body>
			
				<script>

						$(document).ready(function(){

								setInterval(function(){
									updateCars();
								}, 500);

								function updateCars(){

								$.ajax({
								url: 'display_cars.php',
								type: 'POST',	
								success:function(show_cars){
									if(!show_cars.error){
										$('#show-cars').html(show_cars);
									}
								}
							});
								}


							$('#search').keyup(function(){
								var search = $('#search').val();


								$.ajax({
							
									url: 'search.php',
									data:{search:search},
									type: 'POST',
									success:function(data){
										if(!data.error){
											$('#result').html(data);
										}
									}
								});
							});

							//This code add cars to database table cars

							$('#add-car-form').submit(function(evt){
								evt.preventDefault();
								var postData = $(this).serialize();
								var url = $(this).attr('action');

								$.post(url, postData, function(php_table_data){
									$('#car-result').html(php_table_data);
									$('#add-car-form')[0].reset();
								});

							});


						});


				</script>

				<div id="container" class="col-xs-6 col-xs-offset-3">
					<div class="row">
					<h2 class="text-center">Search Our Database</h2>

					<input type="text" name="search" id="search" class="form-control" placeholder="Search Student">
					<br><br>

					<h2 class="bg-success" id="result"></h2>
					</div>
					<div class="row">
						<form action="add_cars.php" class="col-xs-6" id="add-car-form" method="POST">
							<div class="form-group">
								<label for="car_name">Add a student</label>
								<input type="text" name="car_name" id="car_name" class="form-control" required="required">
							</div>
							<div class="form-group">
								<input type="submit" value="Add student" class="btn btn-primary">
							</div>
						</form>
						<div class="col-xs-6">
							<div id="car-result"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							 <div class="table"> 
							<table class="table table-bordered">
								<thead>
									<tr>
										<td><b>ID</b></td>
										<td><b>Student</b></td>
									</tr>
								</thead>
								<tbody id="show-cars">

								</tbody>
							</table>
						</div>
						</div>
						<div class="col-xs-6">
							<div id="action-container">
								
							</div> <!-- Action container -- >
						</div>
					</div>
				</div>
		
</body>	
</html>