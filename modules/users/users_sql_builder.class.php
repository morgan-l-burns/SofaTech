<?php

	class users_sql_builder {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers_functions_sql_builder
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function users_sql_builder($__ALL_MODULES) {
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
		function sql($type, $params, $build=false) {
			$this->params = $params;
			$results = array();
			if (method_exists($this, $type)) {
				$sql = $this->$type($this->params);
				//print "sql is $sql <br />";
				if ($build) {
					if (method_exists($this->__ALL_MODULES["database"], $build)) {
						$results = $this->__ALL_MODULES["database"]->$build($sql);
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



		/**
		* Generates SELECT query from params associative array.  Allows any combination of fields to be used in the WHERE clause.
		*/
		function _fetchUsers() {
			$sql = "SELECT * FROM users u 
					LEFT JOIN clients c ON u.clientId = c.clientId";
			if (is_array($this->params) && count($this->params)) {
				$sql .= " WHERE ";
				foreach ($this->params as $key => $value) {
					$sql .= $key." = '".$value."' AND ";
				}
				$sql = rtrim($sql, "AND ");
			}
			$sql .= " ORDER BY c.clientName ";
			//print "sql is $sql ";
			return($sql);
		}
		
		function _fetchClient() {
			$sql = "SELECT * FROM clients ";
			if (is_array($this->params) && count($this->params)) {
				$sql .= " WHERE ";
				foreach ($this->params as $key => $value) {
					$sql .= $key." = '".$value."' AND ";
				}
				$sql = rtrim($sql, "AND ");
			}
			$sql .= " ORDER BY clientName ";
			//print "sql is $sql ";
			return($sql);
		}
		
		
		/**
		* Generates SELECT query from params associative array.  Allows any combination of fields to be used in the WHERE clause.
		*/
		function _fetchClientUsers() {
			$sql = "SELECT * FROM users u 
					LEFT JOIN clients c ON u.clientId = c.clientId";
			if (is_array($this->params) && count($this->params)) {
				$sql .= " WHERE ";
				foreach ($this->params as $key => $value) {
					$sql .= $key." = '".$value."' AND ";
				}
				$sql = rtrim($sql, "AND ");
			}
			$sql .= " ORDER BY c.clientName ";
			//print "sql is $sql ";
			return($sql);
		}
		
		
		function _fetchAllClients() {
			$sql = "SELECT * from clients ORDER BY clientName";
			//print "sql is $sql <br />";
			return($sql);
		}

		/**
		* Generates UPDATE query from params associative array.  Only updates the supplied fields and excludes the userId.
		*/
		function _updateUser() {
			$sql = "UPDATE users";
			if (is_array($this->params) && isset($this->params['userId']) && count($this->params) > 1) {
				$sql .= " SET ";
				foreach ($this->params as $key => $value) {
					if ($key != 'userId') {
						$sql .= $key." = '".$value."', ";
					}
				}
				$sql = rtrim($sql, ", ");
				$sql .= " WHERE userId = '".$this->params['userId']."'";
			}
			//print "sql is $sql <br />";
			return($sql);
		}

		/**
		* Generates UPDATE query from params associative array.  Only updates the supplied fields and excludes the clientId.
		*/
		function _updateClient() {
			$sql = "UPDATE clients";
			if (is_array($this->params) && isset($this->params['clientId']) && count($this->params) > 1) {
				$sql .= " SET ";
				foreach ($this->params as $key => $value) {
					if ($key != 'clientId') {
						$sql .= $key." = '".$value."', ";
					}
				}
				$sql = rtrim($sql, ", ");
				$sql .= " WHERE clientId = '".$this->params['clientId']."'";
			}
			return($sql);
		}

		/**
		* Generates INSERT query from params associative array.  Only inserts the supplied fields, all others will default as per the table structure.
		*/
		function _addUser() {
			$sql = "INSERT INTO users";
			if (is_array($this->params) && count($this->params)) {
				$sql .= " (".implode(", ", array_keys($this->params)).") VALUES (";
				foreach ($this->params as $param) {
					$sql .= "'".$param."', ";
				}
				$sql = rtrim($sql, ", ");
				$sql .= ")";
			}
			//print "sql is $sql <br />";
			return($sql);
		}

		/**
		* Generates INSERT query from params associative array.  Only inserts the supplied fields, all others will default as per the table structure.
		*/
		function _addClient() {
			$sql = "INSERT INTO clients";
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

		function _deleteUser() {
			$sql = "DELETE FROM users WHERE userId = '".$this->params['userId']."'";
			//print "sql is $sql <br />";
			return($sql);
		}

		function _deleteClient() {
			$sql = "DELETE FROM clients WHERE clientId = '".$this->params['clientId']."'";
			//print "sql is $sql <br />";
			return($sql);
		}

	}
?>