<?php
	require_once(dirname(__FILE__)."/jobs_controller.class.php");
	
	class jobs extends jobs_controller {
		var $__ALL_MODULES;
	
	
		// ------------------------------------------------------------------------
		
		/**
		* Function 		- 	jobs
		* Purpose 		- 	Contructor
		*/
		
		// ------------------------------------------------------------------------
		
		function jobs($__ALL_MODULES) {
			$this->__ALL_MODULES = $__ALL_MODULES;
			parent::jobs_controller($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}
		
		
		
		function view($view) {
		}
		
		
		
		function handle_input() {	
		}



		function adminView($view) {
			$user = $this->__ALL_MODULES['users']->fetchUser(array('userId' => $_SESSION['userId']));
			if (!is_array($_SESSION['user'])) {
				$_SESSION['user'] = $user;
			}
			
			if ($user['userSharedLogin'] == 'no') {
				//$_SESSION['loginUserName'] = $user['userName'];
			}
			switch ($view) {
				// search is hit once logged in
				case 'search':
					$_POST['pagination'] = $this->__ALL_MODULES['config']->pagination;
					$_POST['startAt'] = $_GET['startAt'] ? $_GET['startAt'] : 0;
					$jobs = $this->fetchJobs($_POST);
						if ($jobs) {
							$status = 'success';
						} else {
							$status = 'failed';
						}
					
					$this->displayJobSearchPage($status, $jobs);
				break;
				
				// job search is hit once search is clicked
				case "jobsearch":
				
					// delete job
					if (isset($_GET['deleteJob'])) {
						$result = $this->deleteJob($_GET['jobId']);
						if ($result) {
							$_SESSION['feedback'][] = 'Job Deleted';
						} else {
							$_SESSION['error'][] = 'Job Not Deleted';
						}
					}
				
					if (strlen($_POST['clearSearch'])) {
						unset($_SESSION['jobSearchParams']);
					}
				
					if (strlen($_GET['date'])) {
						$jobs = $this->fetchJobs(array('visitDate'=>$_GET['date'],'pagination'=>$this->__ALL_MODULES['config']->pagination, 'startAt'=>$_GET['startAt'] ? $_GET['startAt'] : 0));
					}
					
					else {
						$_POST['pagination'] = $this->__ALL_MODULES['config']->pagination;
						$_POST['startAt'] = $_GET['startAt'] ? $_GET['startAt'] : 0;
						$jobs = $this->fetchJobs($_POST);
						//var_dump($jobs);
						
					}
					$this->displayJobSearchPage($status, $jobs);
					break;
				case "jobadd":
					if (strlen($_POST['addJob_x'])) {
						if ((strlen($_POST['jobClientId'])) && (strlen($_POST['jobReference']))) {
							$jobArray = $this->fetchJobByClientIdAndJobReference($_POST['jobClientId'],$_POST['jobReference']);
							if (is_array($jobArray)) {
								$_SESSION['error'][] = 'This Job Reference name has already been used, please select another';
							} else {
								$added = $this->addJob($_POST);
								if (($added[0]) && (strlen($added[1]))) {
									$message = 'A new job has been added by: '.$_SESSION['user']['clientName'].' job id is: '.$added[1]."\n"."\n";
									$message .= 'Enter http://www.sofa-tech.co.uk/admin/jobs/jobedit/?jobId='.$added[1];
									$subject = "New Sofa-Tech On-line Job Added";
									$headers = "From: alert@sofa-tech.com \r\n"."X-Mailer: php";
									mail('info@sofa-tech.com', $subject, $message, $headers);	
									//mail('shearer.alan@gmail.com', $subject, $message, $headers);
									$_SESSION['feedback'][] = 'Job added, please add appropiate details below';
									Header('location: /admin/jobs/jobedit/?jobId='.$added[1]);
									exit;
								} 
								else $_SESSION['feedback'][] = 'Job Not added';
							}
						}
						else $_SESSION['error'][] = 'Please enter all details';
					}
					$this->displayJobAddPage($status);
					break;
					
				case "jobedit":
					if (is_array($_SESSION['redirect'])) {
						$_REQUEST['jobId'] = $_SESSION['redirect']['jobId'];
						if ($_SESSION['redirect']['customerSelected']) {
							if ($this->updateJobCustomer($_REQUEST['jobId'], $_SESSION['redirect']['customerId'])) $_SESSION['feedback'][] = 'Customer Details Updated';
						}
						unset($_SESSION['redirect']);
					}
					if (isset($_GET['deleteFile'])) {
						$this->deleteFiles($_GET['fileId']);
					}
					
					if ((strlen($_POST['updateJob_x'])) || (strlen($_POST['addNewVisit_x']))) {
						if (strlen($_POST['addNewVisit_x'])) {
							if ($this->addVisit($_POST)) $_SESSION['feedback'][] = 'Visit has been added';
							else  $_SESSION['error'][] = 'Visit has not been added';
						}
						$updated = $this->updateJob($_POST);
						if ($updated) {
							$_SESSION['feedback'][] = 'Job has been updated';
						} else {
							$_SESSION['error'][] = 'Job has not been updated';
						}
					}
					if (strlen($_GET['removeVisit'])) {
						if ($this->deleteVisitById($_REQUEST['visitId'])) $_SESSION['feedback'][] = 'Visit Deleted';
						else $_SESSION['error'][] = 'Visit Not Deleted';
					}
					if ((isset($_GET['addNewItem'])) && (strlen($_GET['jobId']))) {
						if ($this->addBlankJobItem($_GET['jobId'])) $_SESSION['feedback'][] = 'Item Added';	
						else $_SESSION['error'][] = 'Item Not Added';
						
					}
					if ((isset($_GET['deleteItem'])) && (strlen($_GET['itemId']))) {
						if ($this->deleteJobItem($_GET['itemId'])) $_SESSION['feedback'][] = 'Item Deleted';	
						else $_SESSION['error'][] = 'Item Not Deleted';
					}
					$this->displayJobEditPage($_REQUEST['jobId'], $status);
				break;
					
				default:
					$this->displayJobSearchPage();
					break;
			}
		}



		function handle_admin_input() {
		}


	}
?>