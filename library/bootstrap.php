<?php

// Loading the Config File... Obviously
require_once('../config/config.php');

function autoload($className) {
    if (file_exists(DIR_ROOT.'/library/'.strtolower($className).'.php')) {
        require_once(DIR_ROOT.'/library/'.strtolower($className).'.php');
	} else if (file_exists(DIR_ROOT.'/library/core/'.$className.'.php')) {
        require_once(DIR_ROOT.'/library/core/'.$className.'.php');
    } else if (file_exists(DIR_ROOT.'/application/controllers/'.$className.'.php')) {
        require_once(DIR_ROOT.'/application/controllers/'.$className.'.php');
    } else if (file_exists(DIR_ROOT.'/application/models/'.strtolower($className).'.php')) {
        require_once(DIR_ROOT.'/application/models/'.strtolower($className).'.php');
    } else {
        // Enable to load class... 
    }
}
spl_autoload_register("autoload");

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
		$urlstring = explode('/', substr($url, 1));
		if($urlstring[0] == '') {
			$controller = 'home';
			$action = 'index';
		} else {
			$urlstring = explode('/', substr($url, 1));
			$controller = $urlstring[0];
			if(file_exists(DIR_ROOT.'/application/controllers/'.ucfirst($controller).'Controller.php')) {
				array_shift($urlstring);
				if(!empty($urlstring[0])) {
					if((int)method_exists(ucfirst($controller).'Controller', $urlstring[0])) {
						$action = $urlstring[0];
						array_shift($urlstring);
					} else {
						$action = (!empty($urlstring[1])) ? $urlstring[1] : 'index';
						unset($urlstring[1]);
					}
				} else {
					$action = 'index'; // Default...
				}
			} else {
				$controller = 'home';
				$action = 'index';
			}
		}
		$controllerName = ucfirst($controller).'Controller';
		$model = $controller;
        if(file_exists(DIR_ROOT.'/application/controllers/'.ucfirst($controller).'Controller.php')) {
			$dispatch = new $controllerName($model, $controller, $action);
        } else {
			$action = 'index';
			$controllerName = 'HomeController';
            $dispatch = new $controllerName	('home', 'home', $action);
        }
		if ((int)method_exists($controllerName, $action)) {
			call_user_func_array(array($dispatch, $action), $urlstring);
		}
	}
}

$boot = new Bootstrap();

$boot->setReporting();
$boot->urlProcessor();

?>