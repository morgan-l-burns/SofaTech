<?php
	require_once(dirname(__FILE__)."/customers_sql_builder.class.php");

	class customers_functions extends customers_sql_builder {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers_functions
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function customers_functions($__ALL_MODULES) {
			//print "in customers_functions $__ALL_MODULES <br />";
			parent::customers_sql_builder($__ALL_MODULES);
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
		function getTemplate($interface, $path = "", $displayData, $buffer = true, $site = 'osca') {
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


		//////////////////////////////////////////////////////////// WEBSITE SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////// ADMIN SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////


		function collectCustomerSearchParameters($customerDetails) {
			// Set search order and pagination values
			if (strlen($_GET['searchby'])) {
				if ($_SESSION['customerSearchOrderParams']['orderType'] == 'DESC') {
					$_SESSION['customerSearchOrderParams']['orderType'] = 'ASC';
				} else {
					$_SESSION['customerSearchOrderParams']['orderType'] = 'DESC';
				}
				$_SESSION['customerSearchOrderParams']['order'] = $_GET['searchby'];
				$_SESSION['customerSearchOrderParams']['startAt'] = $_GET['startAt'];
			}

			// Store search details in the session
			//if (isset($_POST['searchCustomers_x'])) {
				unset($_SESSION['customerSearchOrderParams']['startAt']);
				//unset($_SESSION['customerSearchParams']);
				//if ($customerDetails['userId'])                  $_SESSION['customerSearchParams']['userId']                  = $customerDetails['userId'];
				if ($_SESSION['user']['userType'] == 'client') $_SESSION['customerSearchParams']['customerClientId']        = $_SESSION['user']['clientId'];
				if (isset($customerDetails['customerId']))             $_SESSION['customerSearchParams']['customerId']              = $customerDetails['customerId'];
				if (isset($customerDetails['customerReference']))       $_SESSION['customerSearchParams']['customerReference']       = $customerDetails['customerReference'];
				if (isset($customerDetails['customerTitle']))         $_SESSION['customerSearchParams']['customerTitle']           = $customerDetails['customerTitle'];
				if (isset($customerDetails['customerFirstName']))       $_SESSION['customerSearchParams']['customerFirstName']       = $customerDetails['customerFirstName'];
				if (isset($customerDetails['customerMiddleNames']))     $_SESSION['customerSearchParams']['customerMiddleNames']     = $customerDetails['customerMiddleNames'];
				if (isset($customerDetails['customerSurname']))         $_SESSION['customerSearchParams']['customerSurname']         = $customerDetails['customerSurname'];
				if (isset($customerDetails['customerTelephone1']))     $_SESSION['customerSearchParams']['customerTelephone1']      = $customerDetails['customerTelephone1'];
				if (isset($customerDetails['customerTelephone2']))      $_SESSION['customerSearchParams']['customerTelephone2']      = $customerDetails['customerTelephone2'];
				if (isset($customerDetails['customerMobile']))          $_SESSION['customerSearchParams']['customerMobile']          = $customerDetails['customerMobile'];
				if (isset($customerDetails['customerNotes']))           $_SESSION['customerSearchParams']['customerNotes']           = $customerDetails['customerNotes'];
				if (isset($customerDetails['customerClientId']))        $_SESSION['customerSearchParams']['customerClientId']        = $customerDetails['customerClientId'];
				if (isset($customerDetails['customerAddressLine1']))    $_SESSION['customerSearchParams']['customerAddressLine1']    = $customerDetails['customerAddressLine1'];
				if (isset($customerDetails['customerAddressLine2']))    $_SESSION['customerSearchParams']['customerAddressLine2']    = $customerDetails['customerAddressLine2'];
				if (isset($customerDetails['customerAddressLine3']))    $_SESSION['customerSearchParams']['customerAddressLine3']    = $customerDetails['customerAddressLine3'];
				if (isset($customerDetails['customerAddressTownCity'])) $_SESSION['customerSearchParams']['customerAddressTownCity'] = $customerDetails['customerAddressTownCity'];
				if (isset($customerDetails['customerAddressCounty']))   $_SESSION['customerSearchParams']['customerAddressCounty']   = $customerDetails['customerAddressCounty'];
				if (isset($customerDetails['customerAddressCountry']))  $_SESSION['customerSearchParams']['customerAddressCountry']  = $customerDetails['customerAddressCountry'];
				if (isset($customerDetails['customerAddressPostCode'])) $_SESSION['customerSearchParams']['customerAddressPostCode'] = $customerDetails['customerAddressPostCode'];
				if (isset($customerDetails['customerAddressNotes']))    $_SESSION['customerSearchParams']['customerAddressNotes']    = $customerDetails['customerAddressNotes'];
			//}
		}

		function searchCustomers($customerDetails) {
			if (!$_POST['clearSearch']) {
				$this->collectCustomerSearchParameters($customerDetails);
			}
			else if ($_SESSION['user']['userType'] == 'client') {
				$_SESSION['customerSearchParams']['customerClientId'] = $_SESSION['user']['clientId'];
			}
			return($this->sql('_fetchCustomers', $_SESSION['customerSearchParams'], 'selectMany'));
		}

		function fetchCustomers($customerDetails) {
			return($this->sql('_fetchCustomers', $customerDetails, 'selectMany'));
		}

		/*
		 * Update customers and customerAddresses details
		 */
		function updateCustomer($customerDetails) {
		//var_dump($customerDetails);
			$params = array();
			if (isset($customerDetails['customerId']))             $params['customerId']              = $customerDetails['customerId'];
			if (isset($customerDetails['customerReference']))      $params['customerReference']       = $customerDetails['customerReference'];
			if (isset($customerDetails['customerTitle']))           $params['customerTitle']           = $customerDetails['customerTitle'];
			if (isset($customerDetails['customerFirstName']))       $params['customerFirstName']       = $customerDetails['customerFirstName'];
			if (isset($customerDetails['customerMiddleNames']))     $params['customerMiddleNames']     = $customerDetails['customerMiddleNames'];
			if (isset($customerDetails['customerSurname']))         $params['customerSurname']         = $customerDetails['customerSurname'];
			if (isset($customerDetails['customerTelephone1']))      $params['customerTelephone1']      = $customerDetails['customerTelephone1'];
			if (isset($customerDetails['customerTelephone2']))      $params['customerTelephone2']      = $customerDetails['customerTelephone2'];
			if (isset($customerDetails['customerMobile']))          $params['customerMobile']          = $customerDetails['customerMobile'];
			if (isset($customerDetails['customerNotes']))           $params['customerNotes']           = $customerDetails['customerNotes'];
			if (isset($customerDetails['customerClientId']))       $params['customerClientId']        = $customerDetails['customerClientId'];
			if (isset($customerDetails['customerDateOfBirth']))     $params['customerDateOfBirth']     = $customerDetails['customerDateOfBirth'];
			if (count($params)) {
				$result = $this->sql('_updateCustomer', $params, 'updateOne');
			}
			$params = array();
			if (isset($customerDetails['customerAddressId']))       $params['customerAddressId']       = $customerDetails['customerAddressId'];
			if (isset($customerDetails['customerAddressLine1']))    $params['customerAddressLine1']    = $customerDetails['customerAddressLine1'];
			if (isset($customerDetails['customerAddressLine2']))    $params['customerAddressLine2']    = $customerDetails['customerAddressLine2'];
			if (isset($customerDetails['customerAddressLine3']))   $params['customerAddressLine3']    = $customerDetails['customerAddressLine3'];
			if (isset($customerDetails['customerAddressTownCity'])) $params['customerAddressTownCity'] = $customerDetails['customerAddressTownCity'];
			if (isset($customerDetails['customerAddressCounty']))   $params['customerAddressCounty']   = $customerDetails['customerAddressCounty'];
			if (isset($customerDetails['customerAddressCountry']))  $params['customerAddressCountry']  = $customerDetails['customerAddressCountry'];
			if (isset($customerDetails['customerAddressPostCode'])) $params['customerAddressPostCode'] = $customerDetails['customerAddressPostCode'];
			if (isset($customerDetails['customerAddressNotes']))    $params['customerAddressNotes']    = $customerDetails['customerAddressNotes'];
			if (count($params) > 1) {
			//var_dump($params);
				$result = $this->sql('_updateCustomerAddress', $params, 'updateOne');
			}
			return $result;
		}

		/*
		 * Add customer then add customerAddress including customerId
		 */
		function addCustomer($customerDetails) {
			$params = array();
			$params['customerReference']    = $customerDetails['customerReference'];
			$params['customerTitle']        = $customerDetails['customerTitle'];
			$params['customerFirstName']    = $customerDetails['customerFirstName'];
			$params['customerMiddleNames']  = $customerDetails['customerMiddleNames'];
			$params['customerSurname']      = $customerDetails['customerSurname'];
			$params['customerTelephone1']   = $customerDetails['customerTelephone1'];
			$params['customerTelephone2']   = $customerDetails['customerTelephone2'];
			$params['customerMobile']       = $customerDetails['customerMobile'];
			$params['customerNotes']        = $customerDetails['customerNotes'];
			$params['customerClientId']     = $customerDetails['customerClientId'];
			$params['customerDateOfBirth']  = $customerDetails['customerDateOfBirth'];
			$result = $this->sql('_addCustomer', $params, 'insertOneReturnId');
			if (!$result[0]) {
				// _addCustomer failed so don't try to add the customerAddress
				return false;
			}
			$params = array();
			$params['customerAddressLine1']    = $customerDetails['customerAddressLine1'];
			$params['customerAddressLine2']    = $customerDetails['customerAddressLine2'];
			$params['customerAddressLine3']    = $customerDetails['customerAddressLine3'];
			$params['customerAddressTownCity'] = $customerDetails['customerAddressTownCity'];
			$params['customerAddressCounty']   = $customerDetails['customerAddressCounty'];
			$params['customerAddressCountry']  = $customerDetails['customerAddressCountry'];
			$params['customerAddressPostCode'] = $customerDetails['customerAddressPostCode'];
			$params['customerAddressNotes']    = $customerDetails['customerAddressNotes'];
			$params['customerId']              = $result[1];
			$_SESSION['temp']['customerId'] = $result[1];
			return($this->sql('_addCustomerAddress', $params, 'insertOne'));
		}

		/*
		 * Delete customer and customerAddresses
		 */
		function deleteCustomer($customerId) {
			$params = array();
			$params['customerId'] = $customerId;
			$result = $this->sql('_deleteCustomerAddress', $params, 'deleteRow');
			return($this->sql('_deleteCustomer', $params, 'deleteRow'));
		}
		
		function fetchCustomersByPostCodeSearch($customerAddressPostCode,$customerClientId, $orderBy) {
			$params['customerAddressPostCode'] = $customerAddressPostCode;
			$params['customerClientId'] = $customerClientId;
			$params['orderBy'] = $orderBy;
			return($this->sql('_fetchCustomersByPostCode', $params, 'selectMany'));
		}
		
		function fetchClientById($clientId) {
			$params['clientId'] = $clientId;
			return($this->sql('_fetchClientById', $params, 'selectOne'));
		}

	}
?>