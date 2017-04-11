<?php
	class db{
		// Properties
		private $dbhost = "hostname";
		private $dbuser = "user";
		private $dbpass = "pass";
		private $dbname = "db";

		// Connect to DB
		public function connect(){
			$mysql_conn_string = "mysql:host=$this->dbhost;dbname=$this->dbname";
			$dbConnection = new PDO($mysql_conn_string, $this->dbuser, $this->dbpass);
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $dbConnection;
		}
	}
