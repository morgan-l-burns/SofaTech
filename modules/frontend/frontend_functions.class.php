<?php
	require_once(dirname(__FILE__)."/frontend_functions_sql_builder.class.php");
	
	class frontend_functions extends frontend_functions_sql_builder {
	
	
		// ------------------------------------------------------------------------
		
		/**
		* Function 		- 	clients_functions
		* Purpose 		- 	Contructor
		*/
		
		// ------------------------------------------------------------------------
		
		function frontend_functions($__ALL_MODULES) {
			parent::frontend_functions_sql_builder($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}
		
		
		// ------------------------------------------------------------------------

		/**
		* Function 		- 	getTemplate
		* Purpose 		- 	Displays selected template
		* Parameters 	-	1, interface (name of interface file excluding .php
		*				-	2, path (path of interface file)
		*				-	3, displayData array of data that could be used inside the interface file
		*				-	4, buffer (if false ob_start is not used)
		*				-	5, site (decides which asset branch to use when using interface file)
		* HTML tpl		-	None
		*/

		// ------------------------------------------------------------------------
		function getTemplate($interface, $path="", $buffer=true) {
			$templateFile = BASEPATH."/../../assets/ui/".$path.$interface.".php";
			if (is_file($templateFile)) {
				if ($buffer) {
					ob_start();
					require_once($templateFile);
					$html = ob_get_contents();
					ob_end_clean();
				} else {
					require_once($templateFile);
				}
			} else {
				$html = 'File not found: '.$templateFile;
			}
			return $html;
		}
	
	
	
	}
?>