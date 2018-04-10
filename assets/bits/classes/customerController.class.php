<?php
	
	require_once(dirname(__FILE__)."/customerFunctions.class.php");
	require_once(dirname(__FILE__)."/customer.class.php");

	 class customerController extends customerFunctions {
	 
	 
	 	function customerController() {
			parent::customerFunctions();
		}
	 
	 	
	 	function displayEditCustomer($customerId, $loadCustomer) {
			if ($loadCustomer) {
				$customerDetailsArray = $this->fetchCustomerById($customerId);
				if (is_array($customerDetailsArray)) {
					$this->oCustomer = $this->setCustomerDetails($customerDetailsArray);
					
				}
			}
			$html = $this->getTemplate('ui.displayEditCustomer', 'customers/', true);
			return ($html);
		}
		
		function displayCustomerDateOfBirth($dateSettingsArray) {
			unset($this->displayMonthFrom);
			unset($this->displayYearFrom);
			unset($this->displayMonthTo);
			unset($this->displayYearTo);
			unset($this->displayDayFrom);
			unset($this->displayDayTo);
			unset($this->selectedDay);
			unset($this->selectedMonth);
			unset($this->selectedYear);
			unset($this->fieldPrefix);
			unset($this->showTime);
			unset($this->selectedHour);
			unset($this->selectedMinute);
			
			//var_dump($dateSettingsArray);
			$this->displayMonthFrom = $dateSettingsArray['displayMonthFrom'];
			if (!strlen($this->displayMonthFrom)) $this->displayMonthFrom = date('m');
			
			$this->displayYearFrom = $dateSettingsArray['displayYearFrom'];
			if (!strlen($this->displayYearFrom)) $this->displayYearFrom = date('Y') -5;
			
			$this->displayMonthTo = $dateSettingsArray['displayMonthTo'];
			if (!strlen($this->displayMonthTo)) $this->displayMonthTo = 12;
			
			$this->displayYearTo = $dateSettingsArray['displayYearTo'];
			if (!strlen($this->displayYearTo)) $this->displayYearTo = date('Y') + 5;
			
			$this->displayDayFrom = $dateSettingsArray['displayDayFrom'];
			if (!strlen($this->displayDayFrom)) $this->displayDayFrom = 01;
			
			$this->displayDayTo = $dateSettingsArray['displayDayTo'];
			if (!strlen($this->displayDayTo)) $this->displayDayTo = $this->getlastdayofmonth($this->displayMonthFrom, $this->displayYearFrom);
			
			$this->selectedDay = $dateSettingsArray['selectedDay'];
			if (!strlen($this->selectedDay)) $this->selectedDay = date('d');
			
			$this->selectedMonth = $dateSettingsArray['selectedMonth'];
			if (!strlen($this->selectedMonth)) $this->selectedMonth = date('m');
			
			$this->selectedYear = $dateSettingsArray['selectedYear'];
			if (!strlen($this->selectedYear)) $this->selectedYear = date('Y');
			
			$this->fieldPrefix = $dateSettingsArray['fieldPrefix'];
			
			if ($dateSettingsArray['showTime']) {
				$this->showTime = true;
				$this->selectedHour = $dateSettingsArray['selectedHour'];
				$this->selectedMinute = $dateSettingsArray['selectedMinute'];
			}
			$html = $this->getTemplate('ui.displayDateField', 'customers/', true);
			return ($html);
		}
		
	 	
	}
	
?>
