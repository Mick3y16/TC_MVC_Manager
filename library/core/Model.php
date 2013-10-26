<?php

class Model extends Database {

	protected $_model;
	public $dbauth;
	public $dbchar;

	public function __construct() {
		// Initializing the DB Connections...
		$this->authconnect();
		$this->charconnect();
		// Setting the name of the Model in use...
		$this->_model = get_class($this);
	}

	public function __destruct() {

	}

}

?>