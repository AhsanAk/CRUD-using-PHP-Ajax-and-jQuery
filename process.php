<?php 

/*Displaying Action Box Data*/

	
	include_once('connect.php');

	if(isset($_POST['id'])){
		
		$id = mysqli_real_escape_string($connection,$_POST['id']);

	$query = "SELECT * FROM cars WHERE id= '".$id."'";
	$query_car = mysqli_query($connection, $query);

	if(!$query_car){
		die('Die query failed.' . mysqli_error($connection));

	}

	while($row = mysqli_fetch_array($query_car)){
		echo "<p id='feedback' class='bg-success'></p>";
		echo "<input id='focus' rel='".$row['id']."' type='text' class='form-control title-input' value='".$row['title']."'>";
		echo "<input type='button' class='btn btn-success update' value='Update'>";
		echo "<input rel='".$row['id']."' type='button'class='btn btn-danger delete' value='Delete'>";
		echo "<input type='button'class='btn btn-close' value='Close'>";
	}
}

/*UPDATING DATA*/

	if(isset($_POST['updatethis'])){
		$id = mysqli_real_escape_string($connection,$_POST['id']);
		$title = mysqli_real_escape_string($connection,$_POST['title']);


		$query = "UPDATE cars SET title='".$title."' WHERE id=$id";
		$result_set = mysqli_query($connection, $query);

		if(!$result_set){
			die('QUERY FAILED. '. mysqli_error($connection));
		}

	}

	/*DELETING DATA*/

	if(isset($_POST['deletethis'])){
	
		$id = mysqli_real_escape_string($connection,$_POST['id']);
	

		$query = "DELETE FROM cars where id = $id";
		$result_set = mysqli_query($connection, $query);

		if(!$result_set){
			die('QUERY FAILED. '. mysqli_error($connection));
		}	
	}

?>

 <script>
 	$(document).ready(function(){
 		var id;
 		var title;
 		var updatethis = 'update';
 		var deletethis = 'delete';

 		//Extract ID and TITLE
 		$('.title-input').on('input', function(){
 			id = $(this).attr('rel');
 			title = $(this).val();
 		});

 		 			//Update Function button

 			$('.update').on('click', function(){
 				$.post('process.php', {id:id, title:title, updatethis:updatethis}, function(data){
 					$('#feedback').text('Record has been updated.');						
 				});	
 			});

 				//Delete Function button



			 			$('.delete').on('click', function(){

			 				if(confirm('Are you sure?')){

			 				id = $('.delete').attr('rel');
 				$.post('process.php', {id:id, deletethis:deletethis}, function(data){
 								alert('Deleted.');
 								$('#action-container').hide(500);

 								
 		
 				});	
 				}
 			}); 		


 			/*Close Button*/

 			$('.btn-close').on('click', function(){
 				$('#action-container').hide(500);
 			});		

 	}); // Document Ready ENDS.
 </script>