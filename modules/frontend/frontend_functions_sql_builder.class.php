<?php
	
	class frontend_functions_sql_builder {
	
	
		// ------------------------------------------------------------------------
		
		/**
		* Function 		- 	clients_functions_sql_builder
		* Purpose 		- 	Contructor
		*/
		
		// ------------------------------------------------------------------------
		
		function frontend_functions_sql_builder($__ALL_MODULES) {
			define("BASEPATH", dirname(__FILE__));
		}
		
		
		// ------------------------------------------------------------------------
		
		/**
		* Function 		- 	sql
		* Purpose 		- 	Performs function calls that create sql syntax text / or returns the actual data from the database sql
		* Parameters 	-	1, type (function name where sql is called)
		*				-	2, params (array of parameters to be used by the sql functions)
		*				-	3, build (select function to call e.g selectMany) if build is set to false the sql is returned not the results.	
		* HTML tpl		-	None
		*/
		
		// ------------------------------------------------------------------------
		function sql($type,$params,$build=false){
			$this->params = $params;
			$results = array();
			if (method_exists($this,$type)) {
				$sql = $this->$type($this->params);
				//print "sql is $sql <br />";
				if ($build) {
					if (method_exists($this->__ALL_MODULES["database"],$build)) {
						$results = $this->__ALL_MODULES["database"]->$build($sql);
						return($results);
					}else {
					error_log('function '.$type.' does not exists in database module');
					}
				}else {
					return($sql);
				}
			}else {
				error_log('function '.$type.' does not exists in class '.__CLASS__);
			}
		}
			
			

	
	
	
	}
?>