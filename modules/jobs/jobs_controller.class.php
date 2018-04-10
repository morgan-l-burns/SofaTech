<?php
	require_once(dirname(__FILE__)."/jobs_functions.class.php");

	class jobs_controller extends jobs_functions {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers_functions
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function jobs_controller($__ALL_MODULES) {
			parent::jobs_functions($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}



		//////////////////////////////////////////////////////////// WEBSITE SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////// ADMIN SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////

		function displayJobSubNavigationHtml() {
			$html = $this->getTemplate('ui.displayJobSubNavigationHtml', 'admin/jobs/', true);
			echo ($html);
		}
		
		function displayJobItems($jobId) {
			$this->jobId = $jobId;
			$html = $this->getTemplate('ui.displayJobItems', 'admin/jobs/', true);
			echo ($html);
		}

		function displayJobSearchPage($status = false, $jobs = false) {
			$this->status = $status;
			$this->jobs = $jobs;
			$html = $this->getTemplate('ui.displayJobSearchPage', 'admin/jobs/', true);
			echo ($html);
		}

		function displayJobAddPage($status = false) {
			$this->status = $status;
			$html = $this->getTemplate('ui.displayJobAddPage', 'admin/jobs/', true);
			echo ($html);
		}

		function displayJobEditPage($jobId = false, $status = false) {
			$this->jobId = $jobId;
			$this->job = $this->__ALL_MODULES['jobs']->fetchJobByJobId($this->jobId);
			$this->status = $status;
			$html = $this->getTemplate('ui.displayJobEditPage', 'admin/jobs/', true);
			echo ($html);
		}
		
		function displayEditJobForm($job, $userArray) {
			$this->userArray = $userArray;
			$this->formPermissionsArray = $this->fetchFormPermissions($userArray['formUsageType'], 'editJob',$userArray);
			$this->job = $job;
			$html = $this->getTemplate('ui.displayEditJobForm', 'admin/jobs/', true);
			echo ($html);
		}
		
		function displayJobViewingsCalendarHtml() {
			if (isset($_POST['yearFrom'])) $_SESSION['calendar']['yearFrom'] = $_POST['yearFrom'];
			if (isset($_POST['yearTo'])) $_SESSION['calendar']['yearTo'] = $_POST['yearTo'];
			if (isset($_POST['monthFrom'])) $_SESSION['calendar']['monthFrom'] = $_POST['monthFrom'];
			if (isset($_POST['monthTo'])) $_SESSION['calendar']['monthTo'] = $_POST['monthTo'];
			if (!isset($_SESSION['calendar']['yearFrom'])) $_SESSION['calendar']['yearFrom'] = date('Y');
			if (!isset($_SESSION['calendar']['yearTo'])) $_SESSION['calendar']['yearTo'] = date('Y');
			if (!isset($_SESSION['calendar']['monthFrom'])) $_SESSION['calendar']['monthFrom'] = date('m');
			if (!isset($_SESSION['calendar']['monthTo'])) $_SESSION['calendar']['monthTo'] = date("m", mktime(0, 0, 0, 12, 1, 0));
			if ($_SESSION['calendar']['yearTo'] < $_SESSION['calendar']['yearFrom']) {
				$_SESSION['calendar']['yearTo'] = $_SESSION['calendar']['yearFrom'];
			}
			if ($_SESSION['calendar']['yearTo'] == $_SESSION['calendar']['yearFrom']) {
				if ($_SESSION['calendar']['monthTo'] < $_SESSION['calendar']['monthFrom']) $_SESSION['calendar']['monthTo'] = $_SESSION['calendar']['monthFrom'];
			}
			$html = $this->getTemplate('ui.displayJobViewingsCalendarHtml', 'admin/jobs/', true);
			echo ($html);
		}
		
		function displayCalendarDateSettingHtml() {
			$html = $this->getTemplate('ui.displayCalendarDateSettingHtml', 'admin/jobs/', true);
			echo ($html);
		}
		
		function displayJobViewingsCalendarMonthTabsHtml() {
			$html = $this->getTemplate('ui.displayJobViewingsCalendarMonthTabsHtml', 'admin/jobs/', true);
			echo ($html);
		}
		
		function displayJobViewingsSlidesHtml() {
			$html = $this->getTemplate('ui.displayJobViewingsSlidesHtml', 'admin/jobs/', true);
			echo ($html);
		}
		
		function displayJobSearchPanel($user, $clients) {
			$this->user = $user;
			$this->clients = $clients;
			$html = $this->getTemplate('ui.displayJobSearchPanelHtml', 'admin/jobs/', true);
			echo ($html);
		}


		function showJobVisits($jobId) {
			$this->jobId = $jobId;
			$html = $this->getTemplate('ui.showJobVisits', 'admin/jobs/', true);
			echo ($html);
		}
		
		function showJobCustomerDetails($job) {
			$this->job = $job;
			$html = $this->getTemplate('ui.showJobCustomerDetails', 'admin/jobs/', true);
			echo ($html);
		}

		function displayBrowseResorts() {
			$this->browsePage = 'browse_resorts.php';
			if (strlen($_REQUEST["clearParams"])) {
				$_REQUEST["orderLike"]["resortId"] = '';
				$_REQUEST["orderLike"]["resortCountryId"] = '';
				$_REQUEST["orderLike"]["resortName"] = '';
				$_REQUEST["order"] ='';
				$_REQUEST["orderLike"] ='';
				$_REQUEST["startAt"] = '';
			}
			if (strlen($_REQUEST["pagination"])) {
				$_SESSION["users"]["users_pagination"] = $_REQUEST["pagination"];
			}
			$limit = $_SESSION["users"]["users_pagination"] ? $_SESSION["users"]["users_pagination"] : $this->__ALL_MODULES["config"]->modcfg["users"]["users_pagination"];
			if (!strlen($limit)) $limit = 50;
			$this->limit = $limit;
			$this->dataArray = $this->fetchResortsData($_REQUEST["startAt"], $_REQUEST["order"], $_REQUEST["orderLike"]);
			$html = $this->getTemplate('ui.browseResorts', 'holidays/resorts/', fasle, true, 'osca');
			echo ($html);
		}

	}
?>