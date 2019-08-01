<?php 

	class DbConnect {
		private $host = 'localhost';
		private $dbname = 'myeventshall_db';
		private $user = 'root';
		private $password = '';

	

		public function connect() {

			try {
				$conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
				
			} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
				
			}
		}
	}


 ?>