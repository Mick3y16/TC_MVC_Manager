<?php

class Controller {

	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;

	function __construct($model, $controller, $action, $context, $settings, $txt) {
		// Creating the objects for the Controller...
		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;

		// Initializing the Model and Template...
		$this->$model = new $model;
		$this->_template = new Template($controller, $action);

		// "Globalazing" the SMF Variables throughout the script...
		$this->set('context', $context);
		$this->set('settings', $settings);
		$this->set('txt', $txt);
	}

	function set($name,$value) {
		$this->_template->set($name,$value);
	}

	function __destruct() {
		$this->_template->render();
	}

}

?>