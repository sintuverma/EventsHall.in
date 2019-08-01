 <?php

	try{
		$conn= new PDO("mysql:host=localhost; dbname=myeventshall_db","root","");
		

		
	}
	catch(Exception $e){
		die("ERROR :".$e->getMessage());
	}
	if( isset($_POST['UserName']) && $_POST['UserName']!=""){

		 // $search =>mysqli_real_escape_string($conn, $_POST['UserName']);
		
		$req = $conn->prepare("SELECT * FROM guest_house  RIGHT OUTER JOIN guesthouse_image ON guest_house.id = guesthouse_image.email  WHERE name LIKE :UserName OR address LIKE :UserName OR area LIKE :UserName OR pincode LIKE :UserName OR city LIKE :UserName ");



		$req->execute(array(
			'UserName'=>'%'.$_POST['UserName'].'%'
			));

		$data=$req->fetch();

		
		
		
		
		if($req->rowCount()==0){
			echo "No users was found !!!!";

		}
		else{

			while ($data=$req->fetch()) {
				echo $data['image_name'];
				$id=$data['id'];

				?>
				<form action="" method="post">
				
				
					
				<span class="UserName" style="font-size: 15px;color: #000;">

					<a href="display.php?id=<?php echo $id;?>"><img src="upload/<?php  echo $data['image_name'] ?>" style="width: 100px; height: 100px">&nbsp;<p style="text-transform: uppercase;"><?php echo $data['name'];?></a></p></span>
					<span class="Address" style="font-size: 12px;color: #888;"><?php echo $data['address'];?><?php echo $data['city'];?><?php echo $data['pincode'];?><br>

					<span class="Address" style="font-size: 12px;color: #888;"><?php echo $data['area'];?></span>
					<br>
						<span class="email"><?php echo $data['image_name'];?></span>
					<span class="City"><?php echo $data['city'];?></span>
					<span class="PostalCode"><?php echo $data['pincode'];?></span>
					
					
					
					<hr>
					
				
				</form>
				
				<?php
			}
		}
	}else{
		echo "";
	}
	

?>