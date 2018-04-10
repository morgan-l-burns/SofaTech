<?php
	require_once(dirname(__FILE__)."/customers_functions.class.php");

	class customers_controller extends customers_functions {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers_functions
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function customers_controller($__ALL_MODULES) {
			//print "in customers_functions $__ALL_MODULES <br />";
			parent::customers_functions($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}



		//////////////////////////////////////////////////////////// WEBSITE SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////// ADMIN SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////

		function displayCustomerSubNavigationHtml() {
			$html = $this->getTemplate('ui.displayCustomerSubNavigationHtml', 'admin/customers/', true);
			echo ($html);
		}

		function displayCustomerSearchPage($status = false, $customers = false) {
			$this->status = $status;
			$this->customers = $customers;
			$html = $this->getTemplate('ui.displayCustomerSearchPage', 'admin/customers/', true);
			echo ($html);
		}

		function displayCustomerAddPage($status = false) {
			$this->status = $status;
			$html = $this->getTemplate('ui.displayCustomerAddPage', 'admin/customers/', true);
			echo ($html);
		}

		function displayCustomerEditPage($customerId = false, $status = false) {
			$this->customerId = $customerId;
			$this->status = $status;
			$html = $this->getTemplate('ui.displayCustomerEditPage', 'admin/customers/', true);
			echo ($html);
		}
		
		function fetchCustomersByPostCode($customerAddressPostCode, $customerClientId) {
			$this->customersArray = $this->fetchCustomersByPostCodeSearch($customerAddressPostCode, $customerClientId, 'customerAddressPostCode,customerAddressLine1 ASC'); 
			$this->postcode = $customerAddressPostCode;
			$html = $this->getTemplate('ui.displayCustomerDetailsSelection', 'admin/customers/', true);
			echo ($html);
		}


	}

?>