<?php
class Database {
	private $db_host = "jhe3.mysql.cs.st-andrews.ac.uk";
	private $db_user = "jhe3";
	private $db_pass = "s7dC2!7Q";
	private $db_name = "jhe3_db";
	private $is_connected = false;
	private $mysql_conn;
	
	public function connect() {
		if ($this->is_connected)
			return true;
		
		$this->mysql_conn = mysqli_connect ( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		if (mysqli_connect_errno ())
			return false;
		else {
			$this->is_connected = true;
			return true;
		}
	}
	
	public function disconnect() {
		if ($this->is_connected) {
			if (!mysqli_close())
				return false;
		}
		return true;
	}
	
	public function isConnected() {
		return $this->is_connected;
	}
	
	public function setHost($host) {
		$this->db_host = $host;
	}
	
	public function setUser($user) {
		$this->db_user = $user;
	}
	
	public function setPass($pass) {
		$this->db_pass = $pass;
	}
	
	public function setName($name) {
		$this->db_name = $name;
	}
	
	public function getHost() {
		return $this->db_host;
	}
	
	public function getUser() {
		return $this->db_user;
	}
	
	public function getPass() {
		return $this->db_pass;
	}
	
	public function getName() {
		return $this->db_name;
	}
}