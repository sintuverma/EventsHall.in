<?php 

	session_start();
	if(isset($_SESSION['id'])){
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['username']);
		header('location:home.html');


	}
	
 ?>