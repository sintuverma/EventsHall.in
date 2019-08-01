<?php 

class Users
{
	protected $id;
	protected $name;
	protected $mobile;
	protected $email;
	protected $password;
	protected $activated;
	protected $token;
	protected $created_on;
	public $conn;

	function setId($id) { $this->id = $id; }
	function getId() { return $this->id; }
	function setName($name) { $this->name = $name; }
	function getName() { return $this->name; }
	function setMobile($mobile) { $this->mobile = $mobile; }
	function getMobile() { return $this->mobile; }
	function setEmail($email) { $this->email = $email; }
	function getEmail() { return $this->email; }
	function setPassword($password) { $this->password = $password; }
	function getPassword() { return $this->password; }
	function setActivated($activated) { $this->activated = $activated; }
	function getActivated() { return $this->activated; }
	function setToken($token) { $this->token = $token; }
	function getToken() { return $this->token; }
	function setCreated_on($created_on) { $this->created_on = $created_on; }
	function getCreated_on() { return $this->created_on; }
	
		
	function __construct()
	{
		require 'dbconnect.php';
		$db = new DbConnect();
		$this->conn = $db->connect();
	}

	function saveIntoTable(){
		$sql = "INSERT INTO `users`(`id`, `name`, `mobile`, `email`, `password`, `activated`, `token`, `created_on`) VALUES (null, :name, :mobile, :email, :password, :activated, :token, :created_on)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':mobile',$this->mobile);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':password',$this->password);
		$stmt->bindParam(':activated',$this->activated);
		$stmt->bindParam(':token',$this->token);
		$stmt->bindParam(':created_on',$this->created_on);

		try {
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
			
		}

	}

	function getUserByEmail(){
		$stmt=$this->conn->prepare('SELECT * FROM users WHERE email = :email');
		$stmt->bindParam(':email',$this->email);
		try {
			if($stmt->execute()){
				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
		catch(Exception $e) {
				echo $e->getMessage();
			}
			return $user;
		}
	
	function getUserById(){
		$stmt=$this->conn->prepare('SELECT * FROM users WHERE id = :id');
		$stmt->bindParam(':id',$this->id);
		try {
			if($stmt->execute()){
				$user = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
		catch(Exception $e) {
				echo $e->getMessage();
			}
			return $user;
		}

	function activateUserAccount(){
		$stmt=$this->conn->prepare('UPDATE users SET activated = 1 WHERE id = :id');
		$stmt->bindParam(':id',$this->id);
		try {
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
			
		}

	}

}






 ?>