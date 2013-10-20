<?php

class Database {

	private $host = DB_HOST;
	private $authdb = DB_AUTH;
	private $chardb = DB_CHAR;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $error;
	
	public function authconnect() {
		// Set Database 
		$auth = 'mysql:host=' . $this->host . ';dbname=' . $this->authdb . ';charset=utf8';
		// Set options if needed
		$options = array(
		);
		// Create DB connection
		try {
			$dbauth = new PDO($auth, $this->user, $this->pass, $options);
			return $dbauth;
		}
		// Catch any errors
		catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	public function charconnect() {
		// Set Database
		$char = 'mysql:host=' . $this->host . ';dbname=' . $this->chardb . ';charset=utf8';
		// Set options if needed
		$options = array(
		);
		// Create DB connection
		try {
			$dbchar = new PDO($char, $this->user, $this->pass, $options);
			return $dbchar;
		}
		// Catch any errors
		catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	public function dbinfo($db) {
		return array(
			'server' => $db->getAttribute(PDO::ATTR_SERVER_INFO),
			'client' => $db->getAttribute(PDO::ATTR_CLIENT_VERSION),
			'driver' => $db->getAttribute(PDO::ATTR_DRIVER_NAME),
			'version' => $db->getAttribute(PDO::ATTR_SERVER_VERSION),
			'connection' => $db->getAttribute(PDO::ATTR_CONNECTION_STATUS)
		);
	}

}

?>