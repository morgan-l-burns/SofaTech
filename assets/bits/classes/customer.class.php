<?php

	// validation can be completed at the setters
	class customer {
	 	
		var $customerId;
		var $customerTitle;
		var $customerFirstName;
		var $customerMiddleNames;
		var $customerSurname;
		var $customerTelephone1;
		var $customerTelephone2;
		var $customerMobile;
		var $customerDateOfBirth;
	
		
		function getCustomerId() {
			return($this->customerId ? $this->customerId : false);
		}
		
		function setCustomerId($customerId) {
			$this->customerId = $customerId;
		}
		
		function getCustomerTitle() {
			return($this->customerTitle ? $this->customerTitle : false);
		}
		
		function setCustomerTitle($customerTitle) {
			$this->customerTitle = $customerTitle;
			if (!strlen($this->customerTitle)) {
				$this->error = true;
				$_SESSION['error'][] = 'You have not entered a title';
			}
		}
		
		function getCustomerFirstName() {
			return($this->customerFirstName ? $this->customerFirstName : false);
		}
		
		function setCustomerFirstName($customerFirstName) {
			$this->customerFirstName = $customerFirstName;
			if (!strlen($this->customerFirstName)) {
				$this->error = true;
				$_SESSION['error'][] = 'You have not entered a First Name';
			}
		}
		
		function getCustomerMiddleNames() {
			return($this->customerMiddleNames ? $this->customerMiddleNames : false);
		}
		
		function setCustomerDateOfBirth($customerDateOfBirth, $dobYear, $dobMonth, $dobDay) {
			$this->customerDateOfBirth = $customerDateOfBirth;
			$this->dobYear = $dobYear;
			$this->dobMonth = $dobMonth;
			$this->dobDay = $dobDay;
		}
		
		function getCustomerDateOfBirth() {
			$array = array('customerDateOfBirth'=>$this->customerDateOfBirth, 'dobYear'=>$this->dobYear, 'dobMonth'=>$this->dobMonth,'dobDay'=>$this->dobDay);
			return($array);
		}
		
		function setCustomerMiddleNames($customerMiddleNames) {
			$this->customerMiddleNames = $customerMiddleNames;
		}
		
		function getCustomerSurname() {
			return($this->customerSurname ? $this->customerSurname : false);
		}
		
		function setCustomerSurname($customerSurname) {
			$this->customerSurname = $customerSurname;
			if (!strlen($this->customerSurname)) {
				$this->error = true;
				$_SESSION['error'][] = 'You have not entered a Surname';
			}
		}
		
		function getCustomerTelephone1() {
			return($this->customerTelephone1 ? $this->customerTelephone1 : false);
		}
		
		function setCustomerTelephone1($customerTelephone1) {
			$this->customerTelephone1 = $customerTelephone1;
		}
		
		function getCustomerTelephone2() {
			return($this->customerTelephone2 ? $this->customerTelephone2 : false);
		}
		
		function setCustomerTelephone2($customerTelephone2) {
			$this->customerTelephone2 = $customerTelephone2;
		}
		
		function getCustomerMobile() {
			return($this->customerMobile ? $this->customerMobile : false);
		}
		
		function setCustomerMobile($customerMobile) {
			$this->customerMobile = $customerMobile;
		}
		
	
	 }  // end customer class

?>
