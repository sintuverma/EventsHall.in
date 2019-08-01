<?php

session_start();
  if($_SESSION['id'] != session_id()) {
   header('location:login.html');
  };

$email = $_COOKIE['email'];
require 'dbconnect.php';
$db = new DbConnect();


 $output = '';

if(is_array($_FILES)){
	if(sizeof($_FILES['files']['name']) > 10){
		echo 'You can not select more than 10 files';
		exit;

	}
	foreach ($_FILES['files']['name'] as $name => $value) {
		// break image.jpg into  image and jpg in to two fields //
		$file_name = $_FILES["files"]["name"][$name];
    	$source_path = $_FILES["files"]['tmp_name'][$name];
		$file_array = explode('.', $_FILES['files']['name'][$name]); 
		$allow_ext = array('jpg', 'jpeg','png','gif');
		if(in_array(strtolower(end($file_array)), $allow_ext)){
			if(file_already_uploaded($file_name, $db))
				  {
				    $file_name = $file_array[0] . '-'. rand() . '.' . end($file_array);
				  }
			$target_path = "upload/".$file_name;
			if(move_uploaded_file($source_path, $target_path)){
				   $query = "
				     INSERT INTO guestHouse_image (image_name,email) 
				     VALUES ('".$file_name."', '".$email."')
				     ";
				   $statement = $db->connect()->prepare($query);
				   $statement->execute();
				$output .= '<img src="'.$target_path.'"width="200px" height="200px"/>';
			}
		}
		# code...
	}
}

	function file_already_uploaded($file_name, $db)
{
 
     $query = "SELECT * FROM guestHouse_image WHERE image_name = '".$file_name."'";
     $statement = $db->connect()->prepare($query);
     $statement->execute();
     $number_of_rows = $statement->rowCount();
     if($number_of_rows > 0)
     {
      return true;
     }
     else
     {
      return false;
     }
}
 echo $output;

?>