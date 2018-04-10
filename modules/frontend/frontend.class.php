<?php
	require_once(dirname(__FILE__)."/frontend_controller.class.php");
	
	class frontend extends frontend_controller {
		var $__ALL_MODULES;
	
	
		// ------------------------------------------------------------------------
		
		/**
		* Function 		- 	frontend
		* Purpose 		- 	Contructor
		*/
		
		// ------------------------------------------------------------------------
		
		function frontend($__ALL_MODULES) {
			parent::frontend_controller($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}
		
		function view($view) {
			switch ($view) {
				case "Contact Us":
					$this->displayContactUsPage();
				break;
				case "Our Work":
					$this->displayOurWorkPage();
				break;
				case "Care Guide":
					$this->displayCareGuidePage();
				break;
				case "Online System":
					$this->displayCareGuidePage();
				break;
				case "About Us":
					$this->displayAboutUsPage();
				break;
				default:
					$this->displayHomePage();
				break;
			}
		}
		
		
		
		function handle_input() {	
		}
		
		
		
		function adminView($view) {
		}
		
		
		
		function handle_admin_input() {
		}
	
	
		
	
	
	}
?>