<?php
Class dbObj{
	/* Database connection start */
	var $servername = "host_name";
	var $username = "user_name";
	var $password = "database_password";
	var $dbname = "database_name";
	var $port="database_port";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname, $this->port) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

?>