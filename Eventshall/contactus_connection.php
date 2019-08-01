<?php
class ContactUs
{
	protected $id;
	protected $name;
	protected $mobile;
	protected $email;
	protected $msg;
	
	public $conn;

	function setId($id) { $this->id = $id; }
	function getId() { return $this->id; }
	function setName($name) { $this->name = $name; }
	function getName() { return $this->name; }
	function setMobile($mobile) { $this->mobile = $mobile; }
	function getMobile() { return $this->mobile; }
	function setEmail($email) { $this->email = $email; }
	function getEmail() { return $this->email; }
	function setMsg($msg) { $this->msg = $msg; }
	function getMsg() { return $this->msg; }
	
		
	function __construct()
	{
		require 'dbconnect.php';
		$db = new DbConnect();
		$this->conn = $db->connect();
	}

	function saveIntoTable(){
		$sql = "INSERT INTO `contactus`(`contactUsId`, `visiterName`, `visiterEmail`, `visiterMobile`, `visiterRequest`) VALUES (null, :name, :email, :mobile, :info)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':mobile',$this->mobile);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':info',$this->msg);
	

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