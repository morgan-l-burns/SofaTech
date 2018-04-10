<?php
	
	class dates {
		var $__ALL_MODULES;
	
	
		// ------------------------------------------------------------------------
		
		/**
		* Function 		- 	dates
		* Purpose 		- 	Contructor
		*/
		
		// ------------------------------------------------------------------------
		
		function dates($__ALL_MODULES) {
			$this->__ALL_MODULES = $__ALL_MODULES;
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
		function getTemplate($interface, $path = "", $buffer = true) {
			$templateFile = BASEPATH."/../../assets/ui/".$path.$interface.".php";
			if (is_file($templateFile)) {
				if ($buffer) {
					ob_start();
					require($templateFile);
					$html = ob_get_contents();
					ob_end_clean();
				} else {
					require($templateFile);
				}
			} else {
				$html = 'File not found: '.$templateFile;
			}
			return $html;
		}
		
		function getlastdayofmonth($month, $year) {
			for ($day = 28; $day <= 32; $day++) {
				if (!checkdate($month, $day, $year)) return $day-1;
			}
		}
		
		
		function displayDateSelectionHtml($dateSettingsArray) {
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
			//if (!strlen($this->displayMonthFrom)) $this->displayMonthFrom = date('m');
			if (!strlen($this->displayMonthFrom)) $this->displayMonthFrom = 1;
			
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
				$this->timeslot = $dateSettingsArray['timeslot'] ? $dateSettingsArray['timeslot'] : 15;
				$this->showTime = true;
				$this->selectedHour = $dateSettingsArray['selectedHour'];
				$this->selectedMinute = $dateSettingsArray['selectedMinute'];
			}
			
			//print "display month from is ".
			
			$html = $this->getTemplate('ui.displayDateSelectionHtml', 'admin/dates/', true);
			echo ($html);
		} 
		
		
		
		function view($view) {
		}
		
		
		
		function handle_input() {	
		}



		function adminView($view) {
		}



		function handle_admin_input() {
		}


	}
?>