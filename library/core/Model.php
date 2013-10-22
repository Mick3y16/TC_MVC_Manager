<?php

class Model extends Database {

	protected $_model;
	protected $dbauth;
	protected $dbchar;

	public function __construct() {
		// Initializing the DB Connections...
		$this->dbauth = $this->authconnect();
		$this->dbchar = $this->charconnect();
		// Setting the name of the Model in use...
		$this->_model = get_class($this);
	}

	public function __destruct() {

	}

}

?>