<?php 
	session_start();

	$url = $_SERVER['PHP_SELF'];
	$arr = explode('/',$url,-1);

	if(isset($_POST['action']) && ($_POST['action'] == 'checkCookies')) {
		
		if (isset($_COOKIE['email'], $_COOKIE['password'])){
			$data = ['email'=>$_COOKIE['email'],'password'=>base64_decode($_COOKIE['password'])];
			echo json_encode($data);
			# code...
		}
	}


	function setUserData($users){
		require 'users.php';
		
		$objUser = new Users();
		$objUser->setName($users['username']);
		$objUser->setMobile($users['monumber']);
		$objUser->setEmail($users['email']);
		$objUser->setPassword(md5($users['password']));
		$objUser->setActivated(0);
		$objUser->setToken(NULL);
		$objUser->setCreated_on(date('y-m-d'));
		return $objUser;
	}


	function sendMailToUserId($objUser,$html) {

			
			require 'phpMailer/PHPMailerAutoload.php';
			require 'phpMailer/credential.php';
			
			$mail = new PHPMailer;

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com;smtp2.example.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;              				   // SMTP username
			$mail->Password = PASSWORD;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'EventsHall');
			//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			$mail->addAddress($objUser->getEmail());               // Name is optional
			$mail->addReplyTo(EMAIL);
			
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Confirm your Email';
			$mail->Body    = $html;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Congratulation your registration done on our site. Please verify your email';
			    //$_SESSION['username'] = $objUser->getName();

			}
		

	}

	

	if(isset($_POST['action']) && ($_POST['action'] == 'register')) {
		$users = validate_reg_form();
		$objUser = setUserData($users);  

		$userData = $objUser->getUserByEmail();
		if($userData['email'] == $users['email'] ){
			echo "email already registered";
			exit;
		}

		

		if($objUser->saveIntoTable()){
			$lastId = $objUser->conn->lastInsertId();
			$token = sha1($lastId);
			$url = 'http://'.$_SERVER['SERVER_NAME'].''.join("/",$arr).'/verify.php?id='.$lastId.'&token='.$token;
			$html = "<div>Thanks for the registration with localhost. Please click this link to complete your registration<br>".$url."</div>";
			
			sendMailToUserId($objUser,$html);

		}else{
			echo " data saved unsuccessful";
		}
		
	}

	//login form validation//

	if(isset($_POST['action']) && ($_POST['action'] == 'login')) {
		$users = validate_login_form();
		require 'users.php';
		$objUser = new Users();
		$objUser->setEmail($users['email']);
		$objUser->setPassword(md5($users['password']));
		$rememberMe = isset($_POST['remember-me']) ? 1 : 0 ;
		$userData = $objUser->getUserByEmail();
		if(is_array($userData) && count($userData) > 0){ 
			if($userData['password'] == $objUser->getPassword()) { 
				if($userData['activated'] == 1){
					if($rememberMe == 1) {
						setcookie('email',$objUser->getEmail());
						setcookie('password',base64_encode($users['password']));

					}
					$_SESSION['id'] = session_id();
					$_SESSION['username'] = $userData['name'];
					echo json_encode(["status" => 1, "msg" => "Login Successfull"]);

				}else{
					echo json_encode(["status" => 0, "msg" => "Your Account is not active, Please activated your account to login"]);

				}
				

			}else{
				echo json_encode(["status" => 0, "msg" => "E-mail or password is wrong"]);

			}
		}else{
			 echo json_encode(["status" => 0, "msg" => "E-mail or password not found"]);
		}


	}

	function validate_reg_form(){
		$users['username'] = filter_input(INPUT_POST,'username' ,FILTER_SANITIZE_STRING);
		if(false == $users['username']){
			echo "Enter valid name";
			exit;
		}

		$users['monumber'] = filter_input(INPUT_POST,'mobile_number' , FILTER_SANITIZE_NUMBER_INT);
		if(false == $users['monumber']){
			echo "Enter valid Mobile Number";
			exit;
		}

		$users['email'] = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
		if(false == $users['email']){
			echo "Enter valid email";
			exit;
		}

		$users['password'] = filter_input(INPUT_POST,'password' , FILTER_SANITIZE_STRING);
		if(false == $users['password']){
			echo "Enter valid password";
			exit;
		}

		$users['cpassword'] = filter_input(INPUT_POST,'confirm_password' , FILTER_SANITIZE_STRING);
		if(false == $users['cpassword']){
			echo "Enter valid confirme password";
			exit;
		}
		if($users['password'] != $users['cpassword']){
			echo "password not matched";
			exit;
		}

		return $users;
	}

	function validate_login_form(){
		$users['email'] = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
		if(false == $users['email']){
			echo json_encode(["status" => 0, "msg" => "Enter valid Email"]);
			exit;
		}

		$users['password'] = filter_input(INPUT_POST,'password' , FILTER_SANITIZE_STRING);
		if(false == $users['password']){
			echo json_encode(["status" => 0, "msg" => "Enter valid password"]);
			exit;
		}

		return $users;
	}

	//  verify and registered guesthouse in db //

	if(isset($_POST['action']) && ($_POST['action'] == 'register_guesthouse')) {
			
			$users = validate_guestHouse_form();
			require 'guestHouse.php';
		
			$gHouse = new GuestHouse();
			$gHouse->setName($users['guestHouseName']);
			$gHouse->setAddress($users['address']);
			$gHouse->setArea($users['hallArea']);
			$gHouse->setPincode($users['pincode']);
			$gHouse->setCity($users['cityName']);
			$gHouse->setState($users['stateName']);
			$gHouse->setUrl($users['url']);
			$gHouse->setInfo($users['details']);
			$gHouse->setEmail($_COOKIE['email']);

			if($gHouse->saveIntoTable()){
				echo json_encode(["status" => 1, "msg" => "data saves in guest house table"]);
			}else{
				echo json_encode(["status" => 0, "msg" => "data not save"]);
			}
			

	}

	function validate_guestHouse_form(){

		$url = filter_var($_POST['website'], FILTER_SANITIZE_URL);
		$users['url'] = filter_var($url, FILTER_VALIDATE_URL);
		// if(false == $users['url']){
		// 	echo json_encode(["status" => 0, "msg" => "Enter valid url"]);
		// 	exit;
		// }

	

		$users['guestHouseName'] = filter_input(INPUT_POST,'guesthouse_name' ,FILTER_SANITIZE_STRING);
		if(false == $users['guestHouseName']){
			echo json_encode(["status" => 0, "msg" => "Enter valid guest house name"]);
			exit;
		}

		$users['hallArea'] = filter_input(INPUT_POST,'area1' ,FILTER_SANITIZE_STRING);
		if(false == $users['hallArea']){
			echo json_encode(["status" => 0, "msg" => "Enter valid Area name"]);
			exit;
		}

		$users['cityName'] = filter_input(INPUT_POST,'city1' ,FILTER_SANITIZE_STRING);
		if(false == $users['cityName']){
			echo json_encode(["status" => 0, "msg" => "Enter City or District name"]);
			exit;
		}

		$users['stateName'] = filter_input(INPUT_POST,'sel1' ,FILTER_SANITIZE_STRING);
			if(false == $users['stateName']){
				echo json_encode(["status" => 0, "msg" => "choose state name"]);
				exit;
			}

		$users['pincode'] = filter_input(INPUT_POST,'pincode1' , FILTER_SANITIZE_NUMBER_INT);
		if(false == $users['pincode']){
			echo json_encode(["status" => 0, "msg" => "Enter pincode"]);
			exit;
		}

		$users['address'] = filter_input(INPUT_POST,'address1' ,FILTER_SANITIZE_STRING);
		if(false == $users['address']){
			echo json_encode(["status" => 0, "msg" => "Enter valid address"]);
			exit;
		}
		$users['details'] = filter_input(INPUT_POST,'comment1' ,FILTER_SANITIZE_STRING);
		if(false == $users['details']){
			echo json_encode(["status" => 0, "msg" => "enter valid description"]);
			exit;
		}

		return $users;
	}
		


	//verify catering in db//


	if(isset($_POST['action']) && ($_POST['action'] == 'register_catering')) {
			 $users = validate_catering_form();

			 require 'guestHouse.php';
		
			$gHouse = new GuestHouse();
			$gHouse->setName($users['cateringName']);
			$gHouse->setAddress($users['address']);
			$gHouse->setArea($users['cateringArea']);
			$gHouse->setPincode($users['pincode']);
			$gHouse->setCity($users['cityName']);
			$gHouse->setState($users['stateName']);
			$gHouse->setInfo($users['details']);
			$gHouse->setEmail($_COOKIE['email']);

			if($gHouse->saveIntoCateringTable()){
				echo json_encode(["status" => 1, "msg" => "data saves in catering table"]);
			}else{
				echo json_encode(["status" => 0, "msg" => "data not save"]);
			}
			
			

	}

	if(isset($_POST['action']) && ($_POST['action'] == 'update_gHouse')) {
			 $users = validate_Update_guestHouse_form();

			require 'guestHouse.php';
		
			$gHouse = new GuestHouse();
			$gHouse->setName($users['guestHouseName']);
			$gHouse->setAddress($users['address']);
			$gHouse->setPincode($users['pincode']);
			$gHouse->setCity($users['cityName']);
			$gHouse->setInfo($users['details']);
			$gHouse->setEmail($_COOKIE['email']);
			$gHouse->setUrl($users['url']);

			 if($gHouse->updateIntoGuestHouseTable()){
				echo json_encode(["status" => 1, "msg" => "update guest house table"]);
			}else{
				echo json_encode(["status" => 0, "msg" => "not updated"]);
			}
			
			

	}

	function validate_Update_guestHouse_form(){

		$url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
		$users['url'] = filter_var($url, FILTER_VALIDATE_URL);

	

		$users['guestHouseName'] = filter_input(INPUT_POST,'gHouse_name' ,FILTER_SANITIZE_STRING);
		if(false == $users['guestHouseName']){
			echo json_encode(["status" => 0, "msg" => "Enter valid guest house name"]);
			exit;
		}

		$users['cityName'] = filter_input(INPUT_POST,'city' ,FILTER_SANITIZE_STRING);
		if(false == $users['cityName']){
			echo json_encode(["status" => 0, "msg" => "Enter City or District name"]);
			exit;
		}

		$users['pincode'] = filter_input(INPUT_POST,'pincode' , FILTER_SANITIZE_NUMBER_INT);
		if(false == $users['pincode']){
			echo json_encode(["status" => 0, "msg" => "Enter pincode"]);
			exit;
		}

		$users['address'] = filter_input(INPUT_POST,'address' ,FILTER_SANITIZE_STRING);
		if(false == $users['address']){
			echo json_encode(["status" => 0, "msg" => "Enter valid address"]);
			exit;
		}
		$users['details'] = filter_input(INPUT_POST,'info' ,FILTER_SANITIZE_STRING);
		if(false == $users['details']){
			echo json_encode(["status" => 0, "msg" => "enter valid description"]);
			exit;
		}

		return $users;
	}


	function validate_catering_form(){
	

		$users['cateringName'] = filter_input(INPUT_POST,'catering_name' ,FILTER_SANITIZE_STRING);
		if(false == $users['cateringName']){
			echo json_encode(["status" => 0, "msg" => "Enter valid catering name"]);
			exit;
		}

		$users['cateringArea'] = filter_input(INPUT_POST,'area2' ,FILTER_SANITIZE_STRING);
		if(false == $users['cateringArea']){

			echo json_encode(["status" => 0, "msg" => "Enter valid Area name"]);
			exit;
		}

		$users['cityName'] = filter_input(INPUT_POST,'city2' ,FILTER_SANITIZE_STRING);

		if(false == $users['cityName']){
			echo json_encode(["status" => 0, "msg" => "Enter City or District name"]);
			exit;
		}

		$users['stateName'] = filter_input(INPUT_POST,'sel2' ,FILTER_SANITIZE_STRING);

			if(false == $users['stateName']){
				echo json_encode(["status" => 0, "msg" => "choose state name"]);
				exit;
			}

		$users['pincode'] = filter_input(INPUT_POST,'pincode2' , FILTER_SANITIZE_NUMBER_INT);

		if(false == $users['pincode']){
			echo json_encode(["status" => 0, "msg" => "Enter pincode"]);
			exit;
		}

		$users['address'] = filter_input(INPUT_POST,'address2' ,FILTER_SANITIZE_STRING);

		if(false == $users['address']){
			echo json_encode(["status" => 0, "msg" => "Enter valid address"]);
			exit;
		}

		$users['details'] = filter_input(INPUT_POST,'comment2' ,FILTER_SANITIZE_STRING);
		if(false == $users['details']){
			echo json_encode(["status" => 0, "msg" => "enter valid description"]);
			exit;
		}

		return $users;
	}

	if(isset($_POST['action']) && ($_POST['action'] == 'contactUs')) {
		$users['username'] = filter_input(INPUT_POST,'username' ,FILTER_SANITIZE_STRING);
		if(false == $users['username']){
			echo "Enter valid name";
			exit;
		}

		$users['monumber'] = filter_input(INPUT_POST,'mobile_number' , FILTER_SANITIZE_NUMBER_INT);
		if(false == $users['monumber']){
			echo "Enter valid Mobile Number";
			exit;
		}

		$users['email'] = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
		if(false == $users['email']){
			echo "Enter valid email";
			exit;
		}

		$users['details'] = filter_input(INPUT_POST,'comment1' ,FILTER_SANITIZE_STRING);
		if(false == $users['details']){
			echo json_encode(["status" => 0, "msg" => "enter valid description"]);
			exit;
		}

		require 'contactus_connection.php';

		$contact = new ContactUs();
		$contact->setName($users['username']);
		$contact->setMobile($users['monumber']);
		$contact->setMsg($users['details']);
		$contact->setEmail($users['email']);

		if($contact->saveIntoTable()){
				echo  "data saves in contactUs table";
			}else{
				echo  "data not save";
			}


	}




 ?>