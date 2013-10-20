<?php

// Loading the Config File... Obviously
require_once('../config/config.php');

class Bootstrap {

	public function setReporting() {
		if (DEVELOPMENT_ENVIRONMENT == true) {
			error_reporting(E_ALL);
			ini_set('display_errors','On');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors','Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', DIR_LOGS);
		}
	}

	public function urlProcessor() {
		$url = strtolower($_SERVER['REQUEST_URI']);
		if($url == '/') {
			$controller = 'home';
			$action = null;
			$actionstring = null;
			// TEST: echo $controller.' '.$action.' '.$actionstring;
		} else {
			$urlstring = explode('/', substr($url, 1));
			// Setting the controller...
			$controller = $urlstring[0];
			// Shifting to the next value in the array...
			array_shift($urlstring);
				if(!empty($urlstring[0])) {
				/*	if() {
						//Must look for the method inside the controller and check for its existence or not... =P
					} else {
						$action = null;
						if(!empty($queryString[1])) { unset($queryString[1]); }
					}	*/
				} else {
					$action = null // Default...
				}
		}
	}

}

function autoload($className) {
    if (file_exists('../library/'.$className)) {
        require_once('../library/'.$className);
    } else if (file_exists('../application/controllers/'.$className)) {
        require_once('../application/controllers/'.$className);
    } else if (file_exists('../application/models/'.$className)) {
        require_once('../application/models/'.$className);
    } else {
        /* Unable to load class... =X */
    }
}

spl_autoload_register("autoload");
$boot = new Bootstrap();

$boot->setReporting();
$boot->urlProcessor();

?>