<?php
	require_once(dirname(__FILE__)."/users_functions.class.php");

	class users_controller extends users_functions {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers_functions
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function users_controller($__ALL_MODULES) {
			parent::users_functions($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}



		//////////////////////////////////////////////////////////// WEBSITE SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////// ADMIN SPECIFIC FUNCTIONS BELOW ////////////////////////////////////////////////////////////

		function displayAdminHeaderHtml($pageTitle = "Sofa-Tech") {
			$this->pageTitle = $pageTitle;
			$html = $this->getTemplate('ui.displayAdminHeaderHtml', 'admin/sharedAdmin/', true);
			echo ($html);
		}

		function displayAdminNavigationHtml($tabSelected = '') {
			$this->tabSelected = $tabSelected;
			$html = $this->getTemplate('ui.displayAdminNavigationHtml', 'admin/sharedAdmin/', true);
			echo ($html);
		}

		function displayAdminStatusBarHtml($contentType = '', $content = "") {
			$this->contentType = $contentType;
			$this->content = $content;
			$html = $this->getTemplate('ui.displayAdminStatusBarHtml', 'admin/sharedAdmin/', true);
			echo ($html);
		}

		function displayAdminFeedbackHtml() {
			$html = $this->getTemplate('ui.displayAdminFeedbackHtml', 'admin/sharedAdmin/', true);
			echo ($html);
		}

		function displayAdminFooterHtml() {
			$html = $this->getTemplate('ui.displayAdminFooterHtml', 'admin/sharedAdmin/', true);
			echo ($html);
		}

		function displayAdminFooterTextHtml() {
			$html = $this->getTemplate('ui.displayAdminFooterTextHtml', 'admin/sharedAdmin/', true);
			echo ($html);
		}


		function displayLoginPage($status = false) {
			$this->status = $status;
			$html = $this->getTemplate('ui.login', 'admin/login/', true);
			echo ($html);
		}

		function displayLogoutPage() {
			$html = $this->getTemplate('ui.logout', 'admin/login/', true);
			echo ($html);
		}

		function displayForgottenPasswordPage($status = false) {
			$this->status = $status;
			$html = $this->getTemplate('ui.forgottenPassword', 'admin/login/', true);
			echo ($html);
		}


		function displayClientSubNavigationHtml() {
			$html = $this->getTemplate('ui.displayClientSubNavigationHtml', 'admin/clients/', true);
			echo ($html);
		}
		
		function displayUserSubNavigationHtml() {
			$html = $this->getTemplate('ui.displayUserSubNavigationHtml', 'admin/clients/', true);
			echo ($html);
		}

		function displayClientSearchPage($status) {
			$this->status = $status;
			$html = $this->getTemplate('ui.displayClientSearchPage', 'admin/clients/', true);
			echo ($html);
		}
		
		function displayUserSearchPage($status) {
			$this->status = $status;
			$html = $this->getTemplate('ui.displayUserSearchPage', 'admin/clients/', true);
			echo ($html);
		}

		function displayClientSearchResultsHtml($users = array()) {
			$this->users = $users;
			$html = $this->getTemplate('ui.displayClientSearchResultsHtml', 'admin/clients/', true);
			echo ($html);
		}
		
		function displayUserSearchResultsHtml($users = array()) {
			$this->users = $users;
			$html = $this->getTemplate('ui.displayUserSearchResultsHtml', 'admin/clients/', true);
			echo ($html);
		}

		function displayClientAddPage($status) {
			$this->status = $status;
			$html = $this->getTemplate('ui.displayClientAddPage', 'admin/clients/', true);
			echo ($html);
		}
		
		function displayUserAddPage($status) {
			$this->status = $status;
			$html = $this->getTemplate('ui.displayUserAddPage', 'admin/clients/', true);
			echo ($html);
		}

		function displayClientEditPage($clientId, $status = false) {
			$this->clientId = $clientId;
			$this->status = $status;
			$html = $this->getTemplate('ui.displayClientEditPage', 'admin/clients/', true);
			echo ($html);
		}
		
		function displayUserEditPage($userId, $status = false) {
			$this->userId = $userId;
			$this->status = $status;
			$html = $this->getTemplate('ui.displayUserEditPage', 'admin/clients/', true);
			echo ($html);
		}

	}

?>