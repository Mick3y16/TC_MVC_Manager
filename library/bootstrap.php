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
			ini_set('error_log', '../tmp/logs/error.log');
		}
	}

	public function urlProcessor() {
		$url = strtolower($_SERVER['REQUEST_URI']);
		echo $url;
		// Just testing, this will load the controllers and models...
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