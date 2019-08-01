
<!DOCTYPE html>
<html>
<head>
	<title>User Verify Page</title>
</head>
<body>
	<?php 
		$id = $_GET['id'];
		$token = $_GET['token'];

		require 'users.php';
		$objUser = new Users();
		$objUser->setId($id);

		$user = $objUser->getUserById();

		if(is_array($user) && count($user) > 0){
			if(sha1($user['id'] ) == $token){
				if($objUser->activateUserAccount()){
					echo "Congratulation, your account activated. You can login now<br>";
					echo "<a href='login.html'>Click Here</a>";
				}else{
					echo "Some problem occure, Try after some time";
				}

			}else{
				echo "We can't find your detail in our data base.";
			}

		}else{
			echo "We can't find your detail in our data base.";

		}






	 ?>

</body>
</html>