<?php
	require_once(dirname(__FILE__)."/users_sql_builder.class.php");

	class users_functions extends users_sql_builder {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	customers_functions
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function users_functions($__ALL_MODULES) {
			//print "in customers_functions $__ALL_MODULES <br />";
			parent::users_sql_builder($__ALL_MODULES);
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
		function getTemplate($interface, $path="", $buffer=true) {
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


		function fetchAllUsers($userType = NULL) {
			if (isset($userType))                            $params['userType'] = $userType;
			return($this->sql('_fetchUsers', $params, 'selectMany'));
		}
		
		function fetchClients($userType = NULL) {
			if (isset($userType))                            $params['userType'] = $userType;
			return($this->sql('_fetchClients', $params, 'selectMany'));
		}
		
		function fetchAllClientUsers($userType = NULL) {
			if (isset($userType))                            $params['userType'] = $userType;
			return($this->sql('_fetchClientUsers', $params, 'selectMany'));
		}
		
		function fetchClient($clientDetails) {
			if (isset($clientDetails['clientName']))          $params['clientName']          = $clientDetails['clientName'];
			if (isset($clientDetails['clientId']))            $params['clientId']            = $clientDetails['clientId'];
			return($this->sql('_fetchClient', $params, 'selectOne'));
		}

		function fetchUser($userDetails) {
			$params = array();
			if (isset($userDetails['userId']))               $params['userId']               = $userDetails['userId'];
			//if (isset($userDetails['userName']))             $params['userName']             = $userDetails['userName'];
			if (isset($userDetails['userEmail']))            $params['userEmail']            = $userDetails['userEmail'];
			if (isset($userDetails['userPassword']))         $params['userPassword']         = $userDetails['userPassword'];
			if (isset($userDetails['userType']))             $params['userType']             = $userDetails['userType'];
			if (isset($userDetails['userHint']))             $params['userHint']             = $userDetails['userHint'];
			if (isset($userDetails['userAnswer']))           $params['userAnswer']           = $userDetails['userAnswer'];
			if (isset($userDetails['userNotes']))            $params['userNotes']            = $userDetails['clientNotes'];
			if (isset($userDetails['userActive']))           $params['userActive']           = $userDetails['userActive'];
			return($this->sql('_fetchUsers', $params, 'selectOne'));
		}
		
		function fetchClientUser($userDetails) {
			$params = array();
			if (isset($userDetails['userId']))               $params['userId']               = $userDetails['userId'];
			//if (isset($userDetails['userName']))             $params['userName']             = $userDetails['userName'];
			if (isset($userDetails['userEmail']))            $params['userEmail']            = $userDetails['userEmail'];
			if (isset($userDetails['userPassword']))         $params['userPassword']         = $userDetails['userPassword'];
			if (isset($userDetails['userType']))             $params['userType']             = $userDetails['userType'];
			if (isset($userDetails['userHint']))             $params['userHint']             = $userDetails['userHint'];
			if (isset($userDetails['userAnswer']))           $params['userAnswer']           = $userDetails['userAnswer'];
			if (isset($userDetails['userNotes']))            $params['userNotes']            = $userDetails['clientNotes'];
			if (isset($userDetails['userActive']))           $params['userActive']           = $userDetails['userActive'];
			return($this->sql('_fetchClientUsers', $params, 'selectOne'));
		}

		function fetchAllClients() {
			return($this->sql('_fetchAllClients', $params, 'selectMany'));
		}

		/*
		 * Update user and client details
		 */
		function updateUser($userDetails) {
			$params = array();
			if (isset($userDetails['clientId']))             $params['clientId']             = $userDetails['clientId'];
			if (isset($userDetails['clientName']))           $params['clientName']           = $userDetails['clientName'];
			if (isset($userDetails['clientContactDetails'])) $params['clientContactDetails'] = $userDetails['clientContactDetails'];
			if (isset($userDetails['clientMessage']))        $params['clientMessage']        = $userDetails['clientMessage'];
			if (count($params)) {
				$result = $this->sql('_updateClient', $params, 'updateOne');
			}
			return($result);
			
			//$params = array();
			//if (isset($userDetails['userId']))               $params['userId']               = $userDetails['userId'];
			//if (isset($userDetails['userName']))             $params['userName']             = $userDetails['userName'];
			//if (isset($userDetails['userEmail']))            $params['userEmail']            = $userDetails['userEmail'];
			//if (isset($userDetails['userPassword']))         $params['userPassword']         = $userDetails['userPassword'];
			//if (isset($userDetails['userType']))             $params['userType']             = $userDetails['userType'];
			//if (isset($userDetails['userHint']))             $params['userHint']             = $userDetails['userHint'];
			//if (isset($userDetails['userAnswer']))           $params['userAnswer']           = $userDetails['userAnswer'];
			//if (isset($userDetails['userNotes']))            $params['userNotes']            = $userDetails['userNotes'];
			//if (isset($userDetails['userActive']))           $params['userActive']           = $userDetails['userActive'];
			//if (count($params)) {
				//$result = $this->sql('_updateUser', $params, 'updateOne');
			//}
			//return $result;
		}
		
		/*
		 * Update user not client details
		 */
		function updateClientUser($userDetails) {
			$params = array();
			if (isset($userDetails['clientId']))             $params['clientId']             = $userDetails['clientId'];
			//if (isset($userDetails['clientName']))           $params['clientName']           = $userDetails['clientName'];
			//if (isset($userDetails['clientContactDetails'])) $params['clientContactDetails'] = $userDetails['clientContactDetails'];
			if (isset($userDetails['userMessage']))        $params['userMessage']        = $userDetails['userMessage'];
			//if (count($params)) {
				//$result = $this->sql('_updateClient', $params, 'updateOne');
			//}
			//$params = array();
			if (isset($userDetails['userId']))               $params['userId']               = $userDetails['userId'];
			if (isset($userDetails['userName']))             $params['userName']             = $userDetails['userName'];
			if (isset($userDetails['userEmail']))            $params['userEmail']            = $userDetails['userEmail'];
			if (isset($userDetails['userPassword']))         $params['userPassword']         = $userDetails['userPassword'];
			if (isset($userDetails['userType']))             $params['userType']             = $userDetails['userType'];
			if (isset($userDetails['userHint']))             $params['userHint']             = $userDetails['userHint'];
			if (isset($userDetails['userAnswer']))           $params['userAnswer']           = $userDetails['userAnswer'];
			if (isset($userDetails['userNotes']))            $params['userNotes']            = $userDetails['userNotes'];
			if (isset($userDetails['userActive']))           $params['userActive']           = $userDetails['userActive'];
			if (isset($userDetails['writePermission']))      $params['writePermission']      = $userDetails['writePermission'];
			if (isset($userDetails['readPermission'])) 		 $params['readPermission']       = $userDetails['readPermission'];
			if (isset($userDetails['deletePermission']))     $params['deletePermission']     = $userDetails['deletePermission'];
			if (isset($userDetails['modifyPermission']))     $params['modifyPermission']     = $userDetails['modifyPermission'];
			if (isset($userDetails['viewType']))             $params['viewType']             = $userDetails['viewType'];
			if (isset($userDetails['userMessage']))          $params['userMessage']          = $userDetails['userMessage'];
			if (count($params)) {
				$result = $this->sql('_updateUser', $params, 'updateOne');
			}
			return $result;
		}

		/*
		 * Add client then add user including clientId
		 */
		function addUser($userDetails) {
			$params = array();
			$params['clientName']           = isset($userDetails['clientName'])           ? $userDetails['clientName']           : "";
			$params['clientContactDetails'] = isset($userDetails['clientContactDetails']) ? $userDetails['clientContactDetails'] : "";
			$params['clientMessage']        = isset($userDetails['clientMessage'])        ? $userDetails['clientMessage']        : "";
			$result = $this->sql('_addClient', $params, 'insertOneReturnId');
			if (!$result[0]) {
				// _addClient failed so don't try to add the user
				return false;
			}
			return(true);
			//$params = array();
			//$params['userName']             = isset($userDetails['userName'])             ? $userDetails['userName']             : "";
			//$params['userEmail']            = isset($userDetails['userEmail'])            ? $userDetails['userEmail']            : "";
			//$params['userPassword']         = isset($userDetails['userPassword'])         ? $userDetails['userPassword']         : "";
			//$params['userType']             = isset($userDetails['userType'])             ? $userDetails['userType']             : "client";
			//$params['userHint']             = isset($userDetails['userHint'])             ? $userDetails['userHint']             : "";
			//$params['userAnswer']           = isset($userDetails['userAnswer'])           ? $userDetails['userAnswer']           : "";
			//$params['userNotes']            = isset($userDetails['userNotes'])            ? $userDetails['userNotes']            : "";
			//$params['userActive']           = isset($userDetails['userActive'])           ? $userDetails['userActive']           : "yes";
			//$params['clientId']             = $result[1];
			//return($this->sql('_addUser', $params, 'insertOne'));
		}
		
		
		/*
		 * Add client then add user including clientId
		 */
		function addClientUser($userDetails) {
			$params = array();
			//$params['clientName']           = isset($userDetails['clientName'])           ? $userDetails['clientName']           : "";
			//$params['clientContactDetails'] = isset($userDetails['clientContactDetails']) ? $userDetails['clientContactDetails'] : "";
			$params['userMessage']        = isset($userDetails['userMessage'])        ? $userDetails['userMessage']        : "";
			//$result = $this->sql('_addClient', $params, 'insertOneReturnId');
			//if (!$result[0]) {
				// _addClient failed so don't try to add the user
			//	return false;
			//}
			$params = array();
			$params['userName']             = isset($userDetails['userName'])             ? $userDetails['userName']             : "";
			$params['userEmail']            = isset($userDetails['userEmail'])            ? $userDetails['userEmail']            : "";
			$params['userPassword']         = isset($userDetails['userPassword'])         ? $userDetails['userPassword']         : "";
			$params['userType']             = isset($userDetails['userType'])             ? $userDetails['userType']             : "client";
			$params['userHint']             = isset($userDetails['userHint'])             ? $userDetails['userHint']             : "";
			$params['userAnswer']           = isset($userDetails['userAnswer'])           ? $userDetails['userAnswer']           : "";
			$params['userNotes']            = isset($userDetails['userNotes'])            ? $userDetails['userNotes']            : "";
			$params['userActive']           = isset($userDetails['userActive'])           ? $userDetails['userActive']           : "yes";
			$params['clientId']             = isset($userDetails['clientId'])             ? $userDetails['clientId']             : "";
			$params['writePermission']       = isset($userDetails['writePermission'])      ? $userDetails['writePermission']      : "no";
			$params['readPermission']       = isset($userDetails['readPermission'])       ? $userDetails['readPermission']       : "yes";
			$params['modifyPermission']     = isset($userDetails['modifyPermission'])     ? $userDetails['modifyPermission']     : "yes";
			$params['deletePermission']     = isset($userDetails['deletePermission'])     ? $userDetails['deletePermission']     : "yes";
			$params['viewType']             = isset($userDetails['viewType'])             ? $userDetails['viewType']             : "yes";
			return($this->sql('_addUser', $params, 'insertOne'));
		}

		/*
		 * Fetch user to get the clientId then delete client and user
		 */
		function deleteUser($clientId) {
			//$params = array();
			//$params['userId'] = $userId;
			//$user = $this->fetchUser($params);
			//if (is_array($user)) {
				$result = $this->sql('_deleteClient', array('clientId' => $clientId), 'deleteRow');
				return($result);
			//}
			//return($this->sql('_deleteUser', $params, 'deleteRow'));
		}
		
		/*
		 * Fetch user to get the clientId then delete client and user
		 */
		function deleteClientUser($userId) {
			$params = array();
			$params['userId'] = $userId;
			$user = $this->fetchUser($params);
			if (is_array($user)) {
				//$result = $this->sql('_deleteClient', array('clientId' => $user['clientId']), 'deleteRow');
			}
			return($this->sql('_deleteUser', $params, 'deleteRow'));
		}

	}
?>