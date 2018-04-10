<?php

	//print "in main index";
	$modules = array(	'session',
						'config',
						'database',
						'functions',
						'customers',
						'users',
						'jobs',
						'frontend',
						'misc');
	$page = require_modules($modules);	
	
	$urlSplit = explode('/',$_SERVER['REDIRECT_SCRIPT_URL']);	
	//$controller = $urlSplit[1];
	$view = $urlSplit[1];	
	
	//print $_SERVER['SCRIPT_URL'];
	if ($_SERVER['SCRIPT_URL'] == '/contact.html') $view = 'Contact Us';
	if ($_SERVER['SCRIPT_URL'] == '/work.html') $view = 'Our Work';
	if ($_SERVER['SCRIPT_URL'] == '/online.html') $view = 'Online System';
	if ($_SERVER['SCRIPT_URL'] == '/about.html') $view = 'About Us';
	$controller = 'frontend';
	define("controller", $controller);
	define("view", $view);		
	
	if (method_exists($page[$controller],'view')) {
		$page[$controller]->view($view);
	}
	else {
		$page['frontend']->view('displayHomePage');
	}
	function require_modules($module_array) {
		$object = array();
		if (is_array($module_array)) {
			foreach ($module_array as $module) {
				if (file_exists(dirname(__FILE__).'/modules/'.$module.'/'.$module.'.class.php')) {
					require(dirname(__FILE__).'/modules/'.$module.'/'.$module.'.class.php');
					$object[$module] = & new $module(&$object);
					
				}
			}
			//var_dump($object);
			
			reset($module_array);
			// loop back through all the modules again
			
			foreach ($module_array as $module) {
				// pass AN ALIAS of the new object array (which now contains all classes) back into each class
				// this is done so that when variables are set in a class, all other classes have access to it
				$object[$module]->__ALL_MODULES = &$object;
				
			}
			
			reset($module_array);
			// loop back through all the modules again
			foreach ($module_array as $module) {
				// pre data handling
				if(method_exists($object[$module],"handle_admin_input")) $object[$module]->handle_input();
				
			}
			// send the object back to become $this->__ALL_MODULES
			// send the object back to become $this->__ALL_MODULES
			return($object);
		
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$urlSplit = explode('/',$_SERVER['REDIRECT_SCRIPT_URL']);	
	$controller = $urlSplit[1];
	$view = $urlSplit[2];
	
	//require_once(dirname(__FILE__)."/modules/customers/customers.class.php");
	//$class = new customers('test');
	
	//print "controller is $controller view is $view <br />";
?>

