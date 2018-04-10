<?php
	require_once(dirname(__FILE__)."/customers_controller.class.php");

	class customers extends customers_controller {
		var $__ALL_MODULES;


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function customers($__ALL_MODULES) {
			$this->__ALL_MODULES = $__ALL_MODULES;
			parent::customers_controller($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}



		function view($view) {
		}



		function handle_input() {
		}



		function adminView($view) {
		//print "view is $view <br />";
			switch ($view) {
				case 'ajax':
					switch ($_GET['fn']) {
						// fetch customers by postcode
						case 'fcbp':
							// pc is postcode
							$this->fetchCustomersByPostCode($_GET['pc'], $_GET['ci']);
						break;
					}
				break;
				case "search":
					if ($_GET['redirect']) {
						$_SESSION['redirect']['redirectType'] = $_GET['redirectType'];
						$_SESSION['redirect']['jobId'] = $_GET['jobId'];
						$_SESSION['redirect']['clientId'] = $_GET['clientId'];
						unset($_SESSION['customerSearchParams']);
						$_SESSION['customerSearchParams']['customerClientId'] = $_GET['clientId'];
						$customers = $this->searchCustomers($_SESSION['customerSearchParams']);
						
					}
					else {
						$customers = $this->searchCustomers($_POST);
					}
					
					if ($customers) {
							$_SESSION['feedback'][] = "All customers matching your search are listed below.  You can manage them with the buttons to the right of each one, or add new customers with the Add Customer tab above.";
							$status = 'success';
						} else {
							$_SESSION['error'][] = "No customers were found.  Please check your search details and try again.";
							$status = 'failed';
						}
					
					$this->displayCustomerSearchPage($status, $customers);
					break;
					
				case "customersearch":
					if (strlen($_POST['clearSearch'])) {
						unset($_SESSION['customerSearchParams']);
					}
					
					//if (strlen($_POST['searchCustomers_x'])) {
						$customers = $this->searchCustomers($_POST);
						if ($customers) {
							$_SESSION['feedback'][] = "All customers matching your search are listed below.  You can manage them with the buttons to the right of each one, or add new customers with the Add Customer tab above.";
							$status = 'success';
						} else {
							$_SESSION['error'][] = "No customers were found.  Please check your search details and try again.";
							$status = 'failed';
						}
					//} 
					
					$this->displayCustomerSearchPage($status, $customers);
					break;
					
				case "customeradd":
					if (strlen($_POST['addCustomer'])) {
						$customerArray = $this->fetchCustomers(array(
							'customerReference' => $_POST['customerReference'],
							'customerFirstName' => $_POST['customerFirstName'],
							'customerSurname'   => $_POST['customerSurname'],
							'customerPostCode'  => $_POST['customerPostCode']));
						if (is_array($customerArray) && count($customerArray)) {
							$_SESSION['error'][] = "A customer with these details already exists.  Please check the details and try again.";
							$status = 'exists';
							$this->displayCustomerAddPage($status);
							break;
						} else {
							$added = $this->addCustomer($_POST);
							if ($added) {
								$_SESSION['feedback'][] = "Your customer was successfully added.";
								$status = "added";
								$this->displayCustomerSearchPage($status);
								break;
							} else {
								$_SESSION['error'][] = "There was a problem adding this customer.  Please check the details and try again.";
								$status = "failed";
								$this->displayCustomerAddPage($status);
								break;
							}
						}
					}
					if ($_SESSION['redirect']['redirectType']) {
						$_POST['customerClientId'] = $_SESSION['redirect']['clientId'];
					}
					$this->displayCustomerAddPage($status);
					break;
					
				case "customeredit":
					if (strlen($_POST['editCustomer_x'])) {
						$this->displayCustomerEditPage($_POST['customerId'], $status);
						break;
					}
					if (strlen($_POST['updateCustomer_x'])) {
						$updated = $this->updateCustomer($_POST);
						if ($updated) {
							$_SESSION['feedback'][] = "The customer details were successfully updated.";
							$status = 'success';
						} else {
							$_SESSION['error'][] = "The customer update failed.  Please check the customer details and try again.";
							$status = 'failed';
						}
						$this->displayCustomerEditPage($_POST['customerId'], $status);
						break;
					}
					if (strlen($_POST['deleteJob_x'])) {
						$result = $this->__ALL_MODULES['jobs']->deleteJob($_POST['jobId']);
						if ($result) {
							$_SESSION['feedback'][] = "Your job was successfully deleted.";
						} else {
							$_SESSION['error'][] = "Your request to delete the job failed.  Please check the details and try again.";
						}
						$this->displayCustomerEditPage($_POST['customerId'], $status);
						break;
					}
					if ($_GET['redirect']) {
						$_SESSION['redirect']['redirectType'] = $_GET['redirectType'];
						$_SESSION['redirect']['jobId'] = $_GET['jobId'];
						$_SESSION['redirect']['clientId'] = $_GET['clientId'];
						$this->displayCustomerEditPage($_GET['customerId'], $status);
						break;
					}
					
				case "customerdelete":
					if (strlen($_POST['deleteCustomer_x'])) {
						$result = $this->deleteCustomer($_POST['customerId']);
						if ($result) {
							$_SESSION['feedback'][] = "Your customer was successfully deleted.";
							$status = 'deleted';
						} else {
							$_SESSION['error'][] = "Your request to delete the customer failed.  Please check the details and try again.";
							$status = 'deletefailed';
						}
					}
					$this->displayCustomerSearchPage($status);
					break;
				case "customerredirect":
					$_SESSION['redirect']['customerSelected'] = true;
					$_SESSION['redirect']['customerId'] = $_POST['customerId'];
					header('Location: /admin/jobs/jobedit/');
					break;
				default:
					$this->displayCustomerSearchPage();
					break;
			}
		}



		function handle_admin_input() {
		}


	}
?>