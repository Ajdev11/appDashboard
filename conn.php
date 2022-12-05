<?php
	$conn = mysqli_connect('localhost', 'root', '', 'rainbow');
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>