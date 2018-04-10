<?php

	require_once(dirname(__FILE__)."/customerSql.class.php");
	
	 class customerFunctions extends customerSql {

		function customerFunctions() {
			parent::customerSql();
		}
			 	
		function fetchCustomerById($customerId) {
			$params['customerId'] = $customerId;
			return($this->sql('_fetchCustomerById', $params, 'selectOne'));
		}
		
		function setCustomerDetails($customerDetailsArray) {
			
			if (strlen($customerDetailsArray['day_dob'])) {
				$customerDetailsArray['customerDateOfBirth'] = $customerDetailsArray['year_dob'].'-'.$customerDetailsArray['month_dob'].'-'.$customerDetailsArray['day_dob'];
			}
		
			$oCustomer = new customer();
			$oCustomer->setCustomerId($customerDetailsArray['customerId']);
			$oCustomer->setCustomerTitle($customerDetailsArray['customerTitle']);
			$oCustomer->setCustomerFirstName($customerDetailsArray['customerFirstName']);
			$oCustomer->setCustomerMiddleNames($customerDetailsArray['customerMiddleNames']);
			$oCustomer->setCustomerSurname($customerDetailsArray['customerSurname']);
			$oCustomer->setCustomerTelephone1($customerDetailsArray['customerTelephone1']);
			$oCustomer->setCustomerTelephone2($customerDetailsArray['customerTelephone2']);
			$oCustomer->setCustomerMobile($customerDetailsArray['customerMobile']);
			$oCustomer->setCustomerDateOfBirth($customerDetailsArray['customerDateOfBirth'],  $customerDetailsArray['dobYear'], $customerDetailsArray['dobMonth'], $customerDetailsArray['dobDay']);
			return($oCustomer);
		}
		
		function getlastdayofmonth($month, $year) {
			for ($day = 28; $day <= 32; $day++) {
				if (!checkdate($month, $day, $year)) return $day-1;
			}
		}
		
		function updateCustomer($customerDetailsArray) {
			$this->oCustomer = $this->setCustomerDetails($customerDetailsArray);
			if (!$this->oCustomer->error) {
				if ($this->updateCustomerDatabaseDetails($this->oCustomer)) $_SESSION['feedback'][] = 'Customer Updated';
				return(true);
			}
			else return(false);
		}
		
		function updateCustomerDatabaseDetails($oCustomer) {
			$params['oCustomer'] = $oCustomer;
			return($this->sql('_upateCustomerDetails', $params, 'updateOne'));
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
		function getTemplate($interface, $path = "", $buffer = true) {
			$templateFile = dirname(__FILE__)."/../ui/".$path.$interface.".php";
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
		
		
		
	
	}  // end customer class
	
	
?>
