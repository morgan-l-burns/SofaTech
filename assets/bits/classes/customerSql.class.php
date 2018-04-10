<?php

	require_once(dirname(__FILE__)."/database.class.php");
	
	class customerSql {
	
		var $db;
	
		function customerSql() {
			$this->db = new database();
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
		function sql($type, $params, $build = false) {
			$this->params = $params;
			$results = array();
			if (method_exists($this,$type)) {
				$sql = $this->$type($this->params);
				if ($build) {
					if (method_exists($this->db, $build)) {
						$results = $this->db->$build($sql);
						return($results);
					} else {
					error_log('function '.$type.' does not exists in database module');
					}
				} else {
					return($sql);
				}
			} else {
				error_log('function '.$type.' does not exists in class '.__CLASS__);
			}
		}

		function _fetchCustomerById() {
			$sql = "SELECT *, DATE_FORMAT(customerDateOfBirth, '%Y') as dobYear,
					  	DATE_FORMAT(customerDateOfBirth, '%m') as dobMonth,
						DATE_FORMAT(customerDateOfBirth, '%d') as dobDay
			 from customers WHERE customerId = '".$this->params['customerId']."'";
			return($sql);
		}
		
		function _upateCustomerDetails() {
			$sql = "UPDATE customers SET customerFirstName = '".$this->params['oCustomer']->getCustomerFirstName()."',
					customerMiddleNames =	'".$this->params['oCustomer']->getCustomerMiddleNames()."',
					customerSurname = 		'".$this->params['oCustomer']->getCustomerSurname()."',
					customerTelephone1 = 	'".$this->params['oCustomer']->getCustomerTelephone1()."',
					customerTelephone2 = 	'".$this->params['oCustomer']->getCustomerTelephone2()."',
					customerDateOfBirth = 	'".$this->params['oCustomer']->customerDateOfBirth."',
					customerTitle = 		'".$this->params['oCustomer']->getCustomerTitle()."',
					customerMobile = 		'".$this->params['oCustomer']->getCustomerMobile()."'";
					//print "sql is $sql ";
			return($sql);
		}
	}
	
?>
