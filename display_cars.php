<?php


	include_once('connect.php');

	$query = "SELECT * FROM cars";
	$query_car = mysqli_query($connection, $query);

	if(!$query_car){
		die('Die query failed.' . mysqli_error($connection));

	}

	while($row = mysqli_fetch_array($query_car)){
		echo "<tr>";
		echo "<td>{$row['id']}</td>";
		echo "<td><a rel='".$row['id']."' class='title-link' href='javascirpt:void(0)'>{$row['title']}</a></td>";
		echo "</tr>";
	}


?>


<script>
	
							$(document).ready(function(){


							// $('#action-container').hide();
							$('.title-link').on('click', function(){
								$('#action-container').show(500);
							
								var id = $(this).attr('rel');

								$.post('process.php', {id:id}, function(data){
									$('#action-container').html(data);
									$('#focus').focus();
								});
							});
						});

</script>