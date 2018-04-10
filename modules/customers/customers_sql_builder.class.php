<?php

	class customers_sql_builder {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers_functions_sql_builder
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function customers_sql_builder($__ALL_MODULES) {
			//print "in customers_functions_sql_builder $__ALL_MODULES <br />";
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
			} else {
				error_log('function '.$type.' does not exists in class '.__CLASS__);
			}
		}


		function _fetchCustomersByPostCode() {
			$sql =  "	SELECT * FROM customers c
						LEFT JOIN customerAddresses ca on c.customerId = ca.customerId 
						LEFT JOIN clients cl ON c.customerClientId = cl.clientId ";
						//LEFT JOIN users u on cl.clientId = u.clientId
			$sql .= "			WHERE ca.customerAddressPostCode LIKE '%".$this->params['customerAddressPostCode']."%'
						AND c.customerClientId = '".$this->params['customerClientId']."'
						ORDER by ".$this->params['orderBy'];
			//print "sql is $sql <br />";
			return($sql);
		}
		
		function _fetchClientById() {
			$sql = "SELECT * from  clients WHERE clientId = '".$this->params['clientId']."'";
			return($sql);
		}
		
		
		/**
		* Generates SELECT query from params associative array.  Allows any combination of fields to be used in the WHERE clause.
		*/
		function _fetchCustomers() {
			$customersDB = array('customerId', 'customerReference', 'customerTitle', 'customerFirstName', 'customerMiddleNames', 'customerSurname', 'customerTelephone1', 'customerTelephone2', 'customerMobile', 'customerNotes', 'customerClientId', 'customerDateOfBirth');
			$customerAddressesDB = array('customerAddressLine1', 'customerAddressLine2', 'customerAddressLine3', 'customerAddressTownCity', 'customerAddressCounty', 'customerAddressCountry', 'customerAddressPostCode', 'customerAddressNotes');
			$sql  = "SELECT * FROM customers c";
			$sql .= " LEFT JOIN customerAddresses ca on c.customerId = ca.customerId"; 
			$sql .= " LEFT JOIN clients cl ON c.customerClientId = cl.clientId";
			//$sql .= " LEFT JOIN users u on cl.clientId = u.clientId"; 
			
			if (is_array($this->params) && count($this->params)) {
				$sql .= " WHERE ";
				$clause ='WHERE ';
				foreach ($this->params as $key => $value) {
					//print "key is $key <br />";
					if ($key == 'customerClientId') {
						if (strlen($value)) {
							$clause = 'AND ';
							$sql .= "c.".$key." = '".$value."' AND ";
						}
					}
					else if ($key == 'customerId') {
						if (strlen($value)) {
							$clause = 'AND ';
							$sql .= "c.".$key." = '".$value."' AND ";
						}
					}
					else {
						if ((in_array($key, $customersDB)) && (strlen($value))) {
							$clause = 'AND ';
							$sql .= "c.".$key." LIKE '%".$value."%' AND ";
						}
						if ((in_array($key, $customerAddressesDB)) && (strlen($value))) {
							$clause = 'AND ';
							$sql .= "ca.".$key." LIKE '%".$value."%' AND ";
						}
					}
				}
				
				$sql = rtrim($sql, $clause);
			}

			if ($_SESSION['customerSearchOrderParams']['order']) {
				if (in_array($_SESSION['customerSearchOrderParams']['order'], $customersDB)) {
					$prefix = 'c.';
				}
				else $prefix = 'ca.';
				$sql .= " ORDER BY $prefix".$_SESSION['customerSearchOrderParams']['order']." ".$_SESSION['customerSearchOrderParams']['orderType'];
			}
/*
			$sql .= " LIMIT ";
			if ($_SESSION['customerSearchOrderParams']['startAt']) {
				$sql .= $_SESSION['customerSearchOrderParams']['startAt'].", ";
			}
			$sql .= $this->__ALL_MODULES['config']->pagination;
*/
			//print "sql is $sql <br />";
			return($sql);
		}

		/**
		* Generates UPDATE query from params associative array.  Only updates the supplied fields and excludes the customerId.
		*/
		function _updateCustomer() {
			$sql = "UPDATE customers";
			if (is_array($this->params) && isset($this->params['customerId']) && count($this->params) > 1) {
				$sql .= " SET ";
				foreach ($this->params as $key => $value) {
					if ($key != 'customerId') {
						$sql .= $key." = '".$value."', ";
					}
				}
				$sql = rtrim($sql, ", ");
				$sql .= " WHERE customerId = '".$this->params['customerId']."'";
			}
			//print "sql is $sql ";
			return($sql);
		}

		/**
		* Generates UPDATE query from params associative array.  Only updates the supplied fields and excludes the customerAddressId.
		*/
		function _updateCustomerAddress() {
			$sql = "UPDATE customerAddresses";
			if (is_array($this->params) && isset($this->params['customerAddressId']) && count($this->params) > 1) {
				$sql .= " SET ";
				foreach ($this->params as $key => $value) {
					if ($key == 'customerAddressPostCode') {
						$sql .= $key." = '".ereg_replace(' ','',strtolower($value))."', ";
					}
					else if ($key != 'customerAddressId') {
						$sql .= $key." = '".$value."', ";
					}
				}
				$sql = rtrim($sql, ", ");
				$sql .= " WHERE customerAddressId = '".$this->params['customerAddressId']."'";
			}
			return($sql);
		}

		/**
		* Generates INSERT query from params associative array.  Only inserts the supplied fields, all others will default as per the table structure.
		*/
		function _addCustomer() {
			$sql = "INSERT INTO customers";
			if (is_array($this->params) && count($this->params)) {
				$sql .= " (".implode(", ", array_keys($this->params)).") VALUES (";
				foreach ($this->params as $param) {
					$sql .= "'".$param."', ";
				}
				$sql = rtrim($sql, ", ");
				$sql .= ")";
			}
			return($sql);
		}

		/**
		* Generates INSERT query from params associative array.  Only inserts the supplied fields, all others will default as per the table structure.
		*/
		function _addCustomerAddress() {
			$this->params['customerAddressPostCode'] = ereg_replace(' ','',strtolower($this->params['customerAddressPostCode']));
					
			$sql = "INSERT INTO customerAddresses";
			if (is_array($this->params) && count($this->params)) {
				$sql .= " (".implode(", ", array_keys($this->params)).") VALUES (";
				foreach ($this->params as $param) {
					$sql .= "'".$param."', ";
				}
				$sql = rtrim($sql, ", ");
				$sql .= ")";
			}
			return($sql);
		}

		function _deleteCustomer() {
			$sql = "DELETE FROM customers WHERE customerId = '".$this->params['customerId']."'";
			return($sql);
		}

		function _deleteCustomerAddress() {
			$sql = "DELETE FROM customerAddresses WHERE customerId = '".$this->params['customerId']."'";
			return($sql);
		}

	}
?>