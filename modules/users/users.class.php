<?php
	require_once(dirname(__FILE__)."/users_controller.class.php");

	class users extends users_controller {
		var $__ALL_MODULES;


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function users($__ALL_MODULES) {
			$this->__ALL_MODULES = $__ALL_MODULES;
			parent::users_controller($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}



		function view($view) {
		}



		function adminView($view) {
			// need to check if logged in before switch

			switch ($view) {
				case "login":
					if (strlen($_SESSION['userId'])) {
						Header("Location: /admin/jobs/search/");
						exit;
					}
					if (strlen($_POST['login'])) {
						$params = array();
						$params['userEmail'] = $_POST['userEmail'];
						$params['userPassword'] = $_POST['userPassword'];
						$userName = $_POST['userName'];
						if ((strlen($params['userEmail'])) && (strlen($params['userPassword']))) {  //&& (strlen($userName))) {
							$usersArray = $this->fetchUser($params);
							//var_dump($userArray);
							if (is_array($usersArray) && $usersArray['userActive'] == 'yes') {
								$_SESSION['loginUserName'] = $userName;
								$_SESSION['userId'] = $usersArray['userId'];
								Header("Location: /admin/jobs/search/");
								exit;
							} else if (is_array($usersArray) && $usersArray['userActive'] == 'no') {
								$_SESSION['error'][] = 'There is a problem with the login details provided.';
							} else {
								$_SESSION['error'][] = 'There is a problem with the login details provided.';
							}
						}
						else $_SESSION['error'][] = 'Please Check you have entered all of the details above';
					}
					$this->displayLoginPage($status);
					break;
				case "logout":
					unset($_SESSION['userId']);
					session_destroy();
					$this->displayLogoutPage();
					break;
				case "forgotten":
					if (strlen($_POST['userEmail'])) {
						$params['userEmail'] = $_POST['userEmail'];
						$usersArray = $this->fetchUser($params);
						if (is_array($usersArray)) {
					
							$this->showHint = true;
							$this->hint = $usersArray['userHint'];
							if ((strlen($_POST['userHint'])) && (strlen($_POST['userAnswer']))) {
								$params['userEmail'] = $_POST['userEmail'];
								$params['userHint'] = $_POST['userHint'];
								$params['userAnswer'] = $_POST['userAnswer'];
								$usersArray = $this->fetchUser($params);
								if (is_array($usersArray)) {
									$subject = "Sofa-Tech customer support";
									$body  = "Hi ".$usersArray['clientName'].".\n\n";
									$body .= "Your forgotten password is ".$usersArray['userPassword'].".\n\n\n";
									$body .= "Thankyou,\n\n";
									$body .= "Sofa-Tech customer support.";
									$headers = "From: contactus@sofa-tech.com\r\n"."X-Mailer: php";
									if (mail($usersArray['userEmail'], $subject, $body, $headers)) {
										$_SESSION['feedback'][] = 'Thankyou.  Your password has been sent to your email account.';
										$this->sent = true;
									} else {
										$_SESSION['error'][] = 'Sorry, there was a problem sending the email.  Please try again.';
									}
								} else {
									$_SESSION['error'][] = 'Sorry, your details did not match.  Please try again.';
								}
							}
							else $_SESSION['feedback'][] = 'Please answer the hint.';
						}
						else {
							$this->showHint = false;
							$_SESSION['error'][] = 'Sorry, your details did not match.  Please try again.';
						}
						
					}
					
					$this->displayForgottenPasswordPage($status);
					break;
				case "clientsearch":
					$this->displayClientSearchPage();
					break;
				case "usersearch":
					$this->displayUserSearchPage();
					break;
				case "clientadd":
					if (strlen($_POST['addClient_x'])) {
						//$usersArray = $this->fetchUser(array('userEmail' => $_POST['userEmail']));
						$clientArray = $this->fetchClient(array('clientName' => $_POST['clientName']));
						//var_dump($clientArray);
						if (is_array($clientArray) && count($clientArray)) {
							$_SESSION['error'][] = 'A client with this name address already exists.  Please check the details and try again.';
							$status = 'exists';
						} else {
							// addUser is actuall add client
							$added = $this->addUser($_POST);
							if ($added) {
								$_SESSION['feedback'][] = 'Your client was successfully added.';
								$status = "added";
								$this->displayClientSearchPage($status);
								break;
							} else {
								$_SESSION['error'][] = 'There was a problem adding this client.  Please check the details and try again.';
								$status = "failed";
							}
						}
					}
					$this->displayClientAddPage($status);
					break;
					
				case "useradd":
					if (strlen($_POST['addUser_x'])) {
						$usersArray = $this->fetchUser(array('userEmail' => $_POST['userEmail']));
						if (is_array($usersArray) && count($usersArray)) {
							$_SESSION['error'][] = 'A user with this email address already exists.  Please check the details and try again.';
							$status = 'exists';
						} else {
							$added = $this->addClientUser($_POST);
							if ($added) {
								$_SESSION['feedback'][] = 'Your user was successfully added.';
								$status = "added";
								$this->displayUserSearchPage($status);
								break;
							} else {
								$_SESSION['error'][] = 'There was a problem adding this user.  Please check the details and try again.';
								$status = "failed";
							}
						}
					}
					$this->displayUserAddPage($status);
					break;
				case "clientedit":
					if (strlen($_POST['updateClient_x'])) {
						$updated = $this->updateUser($_POST);
						if ($updated) {
							$_SESSION['feedback'][] = 'The client details were successfully updated.';
							$status = 'success';
						} else {
							$_SESSION['error'][] = 'The client update failed.  Please check the client details and try again.';
							$status = 'failed';
						}
					}
					//var_dump($_POST);
					$this->displayClientEditPage($_POST['clientId'], $status);
					break;
				case "useredit":
					if (strlen($_POST['updateUser_x'])) {
						$updated = $this->updateClientUser($_POST);
						if ($updated) {
							$_SESSION['feedback'][] = 'The user details were successfully updated.';
							$status = 'success';
						} else {
							$_SESSION['error'][] = 'The user update failed.  Please check the client details and try again.';
							$status = 'failed';
						}
					}
					$this->displayUserEditPage($_POST['userId'], $status);
					break;
				case "clientdelete":
				//var_dump($_SESSION);
				//return;
					if (strlen($_POST['deleteClient_x']) && $_SESSION['clientId'] == $_POST['clientId']) {
						$_SESSION['error'][] = 'You cannot delete the user you are currently logged in with.';
						$status = 'deletecurrent';
					} else if (strlen($_POST['deleteClient_x'])) {
						$result = $this->deleteUser($_POST['clientId']);
						if ($result) {
							$_SESSION['feedback'][] = 'Your client was successfully deleted.';
							$status = 'deleted';
						} else {
							$_SESSION['error'][] = 'Your request to delete the client failed.  Please check the details and try again.';
							$status = 'deletefailed';
						}
					}
					$this->displayClientSearchPage($status);
					break;
					
				case "userdelete":
					if (strlen($_POST['deleteUser_x']) && $_SESSION['userId'] == $_POST['userId']) {
						$_SESSION['error'][] = 'You cannot delete the user you are currently logged in with.';
						$status = 'deletecurrent';
					} else if (strlen($_POST['deleteUser_x'])) {
						$result = $this->deleteClientUser($_POST['userId']);
						if ($result) {
							$_SESSION['feedback'][] = 'Your user was successfully deleted.';
							$status = 'deleted';
						} else {
							$_SESSION['error'][] = 'Your request to delete the user failed.  Please check the details and try again.';
							$status = 'deletefailed';
						}
					}
					$this->displayUserSearchPage($status);
					break;
				case "view customer jobs":
					break;
				default:
					$this->displayLoginPage();
					break;
			}
		}



		function handle_input() {
		}



		function handle_admin_input() {
			// Only allow access to main areas if the user is logged in
			if (!in_array($_SERVER['REDIRECT_SCRIPT_URL'], array('/admin/users/login/', '/admin/users/logout/', '/admin/users/forgotten/'))) {
				if (!strlen($_SESSION['userId'])) {
					Header("Location: /admin/users/login/");
					exit;
				}
			}
			// Only allow admin users to access client pages
			if (in_array($_SERVER['REDIRECT_SCRIPT_URL'], array('/admin/users/clientsearch/', '/admin/users/clientedit/', '/admin/users/clientadd/', '/admin/users/clientdelete/'))) {
				$usersArray = $this->fetchUser(array('userId' => $_SESSION['userId']));
				if ($usersArray['userType'] != 'admin') {
					Header("Location: /admin/users/login/");
					exit;
				}
			}
		}



	}

?>