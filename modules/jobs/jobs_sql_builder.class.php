<?php

	class jobs_sql_builder {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	jobs_functions_sql_builder
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function jobs_sql_builder($__ALL_MODULES) {
			//print "in jobs_functions_sql_builder $__ALL_MODULES <br />";
			define("BASEPATH", dirname(__FILE__));
		}


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	sql
		* Purpose 		- 	Performs function calls that create sql syntax text / or returns the actual data from the database sql
		* Parameters 	-	1, type (function name where sql is called)
		*				-	2, params (array of parameters to be used by the sql functions)
		*				-	3, build (select function to call e.g selectMany) if build is set to false the sql is returned not the results.
		* HTML tpl		-	None
		*/

		// ------------------------------------------------------------------------
		function sql($type, $params, $build = false) {
			$this->params = $params;
			$results = array();
			if (method_exists($this,$type)) {
				$sql = $this->$type($this->params);
				//print "sql is $sql <br />";
				if ($build) {
					if (method_exists($this->__ALL_MODULES["database"], $build)) {
						$results = $this->__ALL_MODULES["database"]->$build($sql);
						return($results);
					} else {
					error_log('function '.$type.' does not exists in database module');
					}
				} else {
					return($sql);
				}
			} else {
				error_log('function '.$type.' does not exists in class '.__CLASS__);
			}
		}
		

		function _jobsSql() {
			$sql = "SELECT *, 
						DATE_FORMAT(j.jobDateCreated, '%d-%m-%Y %H:%i %p') as jobDateCreatedFormated, 
						DATE_FORMAT(j.jobDateOpened, '%d-%m-%Y %H:%i %p') as jobDateOpenedFormated,
						DATE_FORMAT(j.jobDateClosed, '%d-%m-%Y %H:%i %p') as jobDateClosedFormated  
					FROM jobs j  
				 	LEFT JOIN jobStatus js on j.jobStatusId = js.jobStatusId
					LEFT JOIN clients cl on j.jobClientId = cl.clientId
					LEFT JOIN users u on j.jobUserId = u.userId
					LEFT JOIN customers c on j.jobCustomerId = c.customerId
					LEFT JOIN customerAddresses ca on c.customerId = ca.customerId"; 
					
			return($sql);
		}
		
		function _deleteJobCustomerId() {
			$sql ="UPDATE jobs SET jobCustomerId = '' WHERE jobId = '".$this->params['jobId']."'";
			return($sql);
		}
		
		function _fetchJobByClientIdAndJobReference() {
			$sql ="SELECT * from jobs WHERE jobClientId = '".$this->params['jobClientId']."' AND jobReference = '".$this->params['jobReference']."'";
			//print "sql is $sql ";
			return($sql);
		}

		function _fetchJobByJobId() {
			$sql = $this->_jobsSql();
			$sql .= " WHERE j.jobId = '".$this->params['jobId']."'";
			return($sql);
		}
		
		function _fetchJobsByReference() {
			$sql = "SELECT * from jobs WHERE jobReference = '".$this->params['jobReference']."'";
			if (strlen($this->params['jobId'])) {
				$sql .= "AND jobId != '".$this->params['jobId']."'";
			}
			//print "sql is $sql <br />";
			return($sql);
		}

		function _fetchJobsByCustomerId() {
			$sql ="	SELECT *,
						DATE_FORMAT(j.jobDateCreated, '%d-%m-%Y') as jobDateCreatedFormatted	
					FROM jobs j 
					LEFT join jobStatus js ON j.jobStatusId = js.jobStatusId 
					WHERE j.jobCustomerId = '".$this->params['jobCustomerId']."'";
			//print "sql is $sql ";
			return($sql);
		}

		/**
		* Generates SELECT query from params associative array.  Allows any combination of fields to be used in the WHERE clause.
		*/
		function _fetchJobs() {
			// assign this-> to temp var, as it is overwritten when performing sub functions in this function
			$jobParams = $this->params;
			
			$clause = 'WHERE';
			
			$sql = $this->_jobsSql();
			
			if ($_SESSION['user']['userType'] == 'client') {
				$sql .= ' '.$clause." jobClientId = '".$_SESSION['user']['clientId']."' ";
				$clause = 'AND';
			}
			
			
			// UserId selected from viewType so if the user has been asigne a viewType of user it will only show the users added by this user
			
			if (strlen($jobParams['jobUserId'])) {
				$sql .= ' '.$clause." jobUserId = '".$jobParams['jobUserId']."' ";
				$clause = 'AND';
			}
			
			// START date
			if (strlen($this->params['visitDate'])) {
				$jobVisitsArray = $this->fetchJobViewingsByDate($jobParams['visitDate']);
				if (is_array($jobVisitsArray)) {
					foreach ($jobVisitsArray as $visitArray) {
						$idsString .= $visitArray['jobId'].',';
					}
					$idsString = substr($idsString,0,strlen($idsString)-1);
				//print "id string is $idsString <br />";
				}
				else $idsString = 0;
		
				$sql .= ' '.$clause.' (';
				$clause = 'AND';
				$sql .= "j.jobId in ($idsString)";
				$sql .= ')';  
			}
			// END date
			
			// START jobClientId
			if (is_array($this->params['clientId'])) {
				$sql .= ' '.$clause.' (';
				$clause = 'AND';
				$countJobClientIds = count($jobParams['clientId']);
				$indexJobClientIds = 1;
				foreach ($jobParams['clientId'] as $clientId) {
					$sql .= "j.jobClientId = '".$clientId."'";
					if (($countJobClientIds > 1) && ($countJobClientIds > $indexJobClientIds)) $sql.= ' OR ';
					++$indexJobClientIds;
				}
				$sql .= ')';
			}
			else if (strlen($jobParams['clientId'])) {
				$sql .= ' '.$clause." (j.jobClientId = '".$jobParams['clientId']."')";
				$clause = 'AND';
			}
			// END jobClientId
			
			// START jobId
			if (strlen($jobParams['jobId'])) {
				$sql .= ' '.$clause." (j.jobId = '".$jobParams['jobId']."')";
				$clause = 'AND';
			}
			// END jobId
			
			// START jobReference
			if (strlen($jobParams['jobReference'])) {
				$sql .= ' '.$clause." (j.jobReference like '%".$jobParams['jobReference']."%')";
				$clause = 'AND';
			}
			// END jobReference
			
			// START postcode
			if (strlen($jobParams['postcode'])) {
				$sql .= ' '.$clause." (ca.customerAddressPostCode like '%".$jobParams['postcode']."%')";
				$clause = 'AND';
			}
			// END postcode
			
			
			// START customerTitle
			if (strlen($jobParams['customerTitle'])) {
				$sql .= ' '.$clause." (c.customerTitle = '".$jobParams['customerTitle']."')";
				$clause = 'AND';
			}
			// END customerTitle
			
			// START customerFirstName
			if (strlen($jobParams['customerFirstName'])) {
				$sql .= ' '.$clause." (c.customerFirstName like '%".$jobParams['customerFirstName']."%')";
				$clause = 'AND';
			}
			// END customerFirstName
			
			// START customerSurname
			if (strlen($jobParams['customerSurname'])) {
				$sql .= ' '.$clause." (c.customerSurname like '%".$jobParams['customerSurname']."%')";
				$clause = 'AND';
			}
			// END customerSurname
			
			// START jobStatusId
			if (is_array($jobParams['jobStatusId'])) {
				$sql .= ' '.$clause.' (';
				$clause = 'AND';
				$countJobStatusIds = count($jobParams['jobStatusId']);
				$indexJobStatusIds = 1;
				foreach ($jobParams['jobStatusId'] as $jobStatusId) {
					$sql .= "j.jobStatusId = '".$jobStatusId."'";
					if (($countJobStatusIds > 1) && ($countJobStatusIds > $indexJobStatusIds)) $sql.= ' OR ';
					++$indexJobStatusIds;
				}
				$sql .= ')';
			}
			// END jobStatusId
			
			
			
			// START visit details
			if (($jobParams['useVisitDate'] == 'true') || (is_array($jobParams['visitTypeId'])) || (is_array($jobParams['visitStatus']))) {
				//print "am i herezzzzzzzzzzzzz";
				if ($jobParams['useVisitDate'] == 'true') {
					$visitDateArray = $this->fetchJobVisits($jobParams['visitDateFrom'],$jobParams['visitDateTo'], $jobParams['visitTypeId'], $jobParams['visitStatus']);
				}
				else {
					$visitDateArray = $this->fetchJobVisits('','', $jobParams['visitTypeId'], $jobParams['visitStatus']);
				} 
				
				if (is_array($visitDateArray)) {
					foreach ($visitDateArray as $visitArray) {
						$idsString .= $visitArray['jobId'].',';
					}
					$idsString = substr($idsString,0,strlen($idsString)-1);
					//print "id string is $idsString <br />";
				}
				else $idsString = 0;
				
				$sql .= ' '.$clause.' (';
				$clause = 'AND';
				$sql .= "j.jobId in ($idsString)";
				$sql .= ')';  
			}
			// END visit details
			
			
			// START job dates
			if ($jobParams['useJobDates'] == 'true') {
				if (strlen($jobParams['jobDateCreated'])) {
					$sql .= ' '.$clause." (jobDateCreated >= '".$jobParams['jobDateFrom']."' AND jobDateCreated <= '".$jobParams['jobDateTo']." 23:59:00')";
					$clause = 'AND';
				}
				if (strlen($jobParams['jobDateOpened'])) {
					$sql .= ' '.$clause." (jobDateOpened >= '".$jobParams['jobDateFrom']."' AND jobDateOpened <= '".$jobParams['jobDateTo']." 23:59:00')";
					$clause = 'AND';
				}
				if (strlen($jobParams['jobDateClosed'])) {
					$sql .= ' '.$clause." (jobDateClosed >= '".$jobParams['jobDateFrom']."' AND jobDateClosed <= '".$jobParams['jobDateTo']." 23:59:00')";
					$clause = 'AND';
				}
				
				if (strlen($jobParams['jobItemOrderDate'])) {
					//$sql .= ' '.$clause." (jobItemOrderDate >= '".$jobParams['jobDateFrom']."' AND jobItemOrderDate <= '".$jobParams['jobDateTo']." 23:59:00')";
					//$clause = 'AND';
				}
				if (strlen($jobParams['jobItemDeliveryDate'])) {
					//$sql .= ' '.$clause." (jobItemDeliveryDate >= '".$jobParams['jobDateFrom']."' AND jobItemDeliveryDate <= '".$jobParams['jobDateTo']." 23:59:00')";
					//$clause = 'AND';
				}
			}
			// END job dates
			
			
			if (strlen($jobParams['order'])) {
				$sql .= ' ORDER BY '.$jobParams['order'].' '.$jobParams['orderType'][$jobParams['order']];
			}
			
			
			if ($jobParams['usePagination']) {
				$sql .= " LIMIT ".$jobParams['startAt'].", ".$jobParams['pagination'];
			}
			//print "sql is $sql <br />";
			return($sql);
		} // end function 
		
		
		
		function _fetchJobVisits() {
			$sql = "SELECT *, 
						DATE_FORMAT(v.visitDate, '%Y') as visitDateYear,
					  	DATE_FORMAT(v.visitDate, '%m') as visitDateMonth,
						DATE_FORMAT(v.visitDate, '%d') as visitDateDay,
						DATE_FORMAT(v.visitDate, '%H') as visitDateHour,
						DATE_FORMAT(v.visitDate, '%i') as visitDateMinutes
					FROM visits v ";
			$clause = 'WHERE';
			
			
			if (strlen($this->params['visitDateFrom'])) {
				$sql .= $clause." visitDate >= '".$this->params['visitDateFrom']."' ";
				$clause = 'AND';
			}
			if (strlen($this->params['visitDateTo'])) {
				$sql .= $clause." visitDate <= '".$this->params['visitDateTo']." 23:59:00' ";
				$clause = 'AND';
			}
			
			if (is_array($this->params['visitTypeIdArray'])) {
				$sql .= ' '.$clause.' (';
				$clause = 'AND';
				$countVisitTypeIds = count($this->params['visitTypeIdArray']);
				$indexVisitTypeIds = 1;
				foreach ($this->params['visitTypeIdArray'] as $visitTypeId) {
					$sql .= "visitTypeId = '".$visitTypeId."'";
					if (($countVisitTypeIds > 1) && ($countVisitTypeIds > $indexVisitTypeIds)) $sql.= ' OR ';
					++$indexVisitTypeIds;
				}
				$sql .= ')';
			}
			
			if (is_array($this->params['visitStatusArray'])) {
				$sql .= ' '.$clause.' (';
				$clause = 'AND';
				$countVisitStatusArray = count($this->params['visitStatusArray']);
				$indexVisitStatusArray = 1;
				foreach ($this->params['visitStatusArray'] as $visitStatus) {
					$sql .= "visitStatus = '".$visitStatus."'";
					if (($countVisitStatusArray > 1) && ($countVisitStatusArray > $indexVisitStatusArray)) $sql.= ' OR ';
					++$indexVisitStatusArray;
				}
				$sql .= ')';
			}
			
			return($sql);
		}
		
		
		
		function _fetchVisitTypes() {
			$sql = "SELECT * from visitTypes ORDER By '".$this->params['order']."'";
			return($sql);
		}
		
		function _fetchJobsStatusDetails() {
			$sql = "SELECT * from jobStatus ORDER By '".$this->params['jobStatus']."'";
			return($sql);
		}
		
		/**
		* Generates SQL query to find out how many viewings exists for a particular date.
		*/
		function _fetchJobViewingsByDate() {
			$sql = "SELECT *, DATE_FORMAT(v.visitDate, '%Y-%m-%d') as visitDateFormated from visits v  
					LEFT JOIN jobs j ON v.JobId = j.jobId
					LEFT JOIN visitTypes vt ON vt.visitTypeId = v.visitTypeId
					WHERE DATE_FORMAT(v.visitDate, '%Y-%m-%d') = '".$this->params['visitDate']."'";
					//print "sql is $sql <br />";
					
			if ($_SESSION['user']['userType'] == 'client') {
				$sql .= " AND j.jobClientId = '".$_SESSION['user']['clientId']."' ";
				$clause = 'AND';
				//print 'view type is '.$_SESSION['user']['viewType'];
				if ($_SESSION['user']['viewType'] == 'user') {
					$sql .= " AND j.jobUserId = '".$_SESSION['user']['userId']."' ";
				$clause = 'AND';
					
				}
			}
			//print "sql is $sql <br />";
			return($sql);
		}

		/**
		* Generates UPDATE query from params associative array.  Only updates the supplied fields and excludes the jobId.
		*/
		function _updateJob() {
			$sql = "UPDATE jobs";
			if (is_array($this->params) && isset($this->params['jobId']) && count($this->params) > 1) {
				$sql .= " SET ";
				foreach ($this->params as $key => $value) {
					if ($key != 'jobId') {
						$sql .= $key." = '".$value."', ";
					}
				}
				$sql = rtrim($sql, ", ");
				$sql .= " WHERE jobId = '".$this->params['jobId']."'";
			}
			//print "sql is $sql ";
			return($sql);
		}
		
		function _fetchJobStatusById() {
			$sql = "SELECT * from jobStatus WHERE jobStatusId = '".$this->params['jobStatusId']."'";
			return($sql);
		}

		/**
		* Generates INSERT query from params associative array.  Only inserts the supplied fields, all others will default as per the table structure.
		*/
		function _addJob() {
			$sql = "INSERT INTO jobs (	jobClientId, 
										jobReference, 
										jobDateCreated, 
										jobCreatedBy,
										jobUserId) 
								VALUES ('".$this->params['jobClientId']."',
										'".$this->params['jobReference']."',
										now(),
										'".$this->params['jobCreatedBy']."',
										'".$this->params['jobUserId']."')";
			//print "sql is $sql ";
			return($sql);
		}

		function _deleteJob() {
			$sql = "DELETE FROM jobs WHERE jobId = '".$this->params['jobId']."'";
			return($sql);
		}
		
		function _fetchVisitsByJobId() {
			$sql = "SELECT *, 
						DATE_FORMAT(v.visitDate, '%Y') as visitDateYear,
					  	DATE_FORMAT(v.visitDate, '%m') as visitDateMonth,
						DATE_FORMAT(v.visitDate, '%d') as visitDateDay,
						DATE_FORMAT(v.visitDate, '%H') as visitDateHour,
						DATE_FORMAT(v.visitDate, '%i') as visitDateMinutes,
						DATE_FORMAT(v.visitDate,'%d/%m/%Y %l %i %p') as visitDateFormated from visits v 
					LEFT JOIN visitTypes vt ON v.visitTypeId = vt.visitTypeId WHERE v.jobId = '".$this->params['jobId']."' ORDER by ".$this->params['order'];
			//print "sql is $sql <br />";
			return($sql);
		}
		
		function _fetchUserEmailByClientId() {
			$sql = "SELECT userEmail FROM users WHERE clientId = '".$this->params['clientId']."'";
			return($sql);
		}
		
		function _fetchUserEmailByUserId() {
			$sql = "SELECT userEmail FROM users WHERE userId = '".$this->params['userId']."'";
			return($sql);
		}
		
		function _fetchVisitsByVisitId() {
			$sql = "SELECT *, 
						DATE_FORMAT(v.visitDate, '%Y') as visitDateYear,
					  	DATE_FORMAT(v.visitDate, '%m') as visitDateMonth,
						DATE_FORMAT(v.visitDate, '%d') as visitDateDay,
						DATE_FORMAT(v.visitDate, '%H') as visitDateHour,
						DATE_FORMAT(v.visitDate, '%i') as visitDateMinutes,
						DATE_FORMAT(v.visitDate,'%d/%m/%Y %l %i %p') as visitDateFormated from visits v 
					LEFT JOIN visitTypes vt ON v.visitTypeId = vt.visitTypeId WHERE v.visitId = '".$this->params['visitId']."'";
			//print "sql is $sql <br />";
			return($sql);
		}
		
		function _addVisit() {
			$sql = "INSERT into visits (visitTypeId, 
										visitDate, 
										visitAttended, 
										visitOutcome, 
										visitNotes, 
										jobId, 
										visitStatus) 
									VALUES
										('".$this->params['visitTypeId']."', 
										'".$this->params['visitDate']."', 
										'".$this->params['visitAttended']."', 
										'".$this->params['visitOutcome']."', 
										'".$this->params['visitNotes']."', 
										'".$this->params['jobId']."', 
										'".$this->params['visitStatus']."')";
			return($sql);
		}
		
		function _updateVisit() {
			$sql = "UPDATE visits SET 	visitNotes = '".$this->params['visitNotes']."', 
										visitOutcome = '".$this->params['visitOutcome']."',
										visitTypeId = '".$this->params['visitTypeId']."',
										visitStatus = '".$this->params['visitStatus']."',
										visitDate = '".$this->params['visitDate']."',
										visitAttended = '".$this->params['visitAttended']."',
										visitDateText = '".$this->params['visitDateText']."'
					WHERE visitId = '".$this->params['visitId']."'";
					//print "sql is $sql <br />";
			return($sql);
		}
		
		function _fetchFormPermissions() {
			switch ($this->params['formUsageType']) {
				case 'admin':
					$sql = "SELECT * from forms WHERE formName = '".$this->params['formName']."' AND formUsageType = 'admin' ";
				break;
				
				case 'client':
					$sql = "SELECT * from forms WHERE formName = '".$this->params['formName']."' AND formUsageType = 'client' ";
				break;
				
				case 'id':
					$sql = "SELECT * from forms WHERE formName = '".$this->params['formName']."' AND userId = '".$this->params['userId']."' ";
				break;
			}
			//print "sql is $sql <br />";
			return($sql);
		}
		
		function _deleteVisitById() {
			$sql = "DELETE from visits WHERE visitId = '".$this->params['visitId']."'";
			return($sql);
		}
		
		function _deleteJobVisitsByJobId() {
			$sql = "DELETE from visits WHERE jobId = '".$this->params['jobId']."'";
			return($sql);
		}
		
		
		function _fetchJobsStatusDetailsByID() {
			$sql = "SELECT * from jobStatus WHERE jobStatusId = '".$this->params['jobStatusId']."'";
			return($sql);
		}
		
		function _fetchJobItems() {
			$sql = "SELECT *, 
						DATE_FORMAT(itemOrderDate, '%Y') as itemOrderDateYear,
					  	DATE_FORMAT(itemOrderDate, '%m') as itemOrderDateMonth,
						DATE_FORMAT(itemOrderDate, '%d') as itemOrderDateDay,
						DATE_FORMAT(itemOrderDate, '%H') as itemOrderDateHour,
						DATE_FORMAT(itemOrderDate, '%i') as itemOrderDateMinutes,
						DATE_FORMAT(itemOrderDate, '%d-%m-%Y') as itemOrderDateFormat,
						 
						DATE_FORMAT(itemDeliveryDate, '%Y') as itemDeliveryDateYear,
					  	DATE_FORMAT(itemDeliveryDate, '%m') as itemDeliveryDateMonth,
						DATE_FORMAT(itemDeliveryDate, '%d') as itemDeliveryDateDay,
						DATE_FORMAT(itemDeliveryDate, '%H') as itemDeliveryDateHour,
						DATE_FORMAT(itemDeliveryDate, '%i') as itemDeliveryDateMinutes,
						DATE_FORMAT(itemDeliveryDate, '%d-%m-%Y') as itemDeliveryDateFormat
					FROM jobItems WHERE jobId = '".$this->params['jobId']."'";
			//print "sql is $sql ";
			return($sql);
		}
		
		function _fetchJobItemIds() {
			$sql = "SELECT itemId FROM jobItems WHERE jobId = '".$this->params['jobId']."'";
			return($sql);
		}
		
		function _updateJobItem() {
			$sql = " UPDATE jobItems ";
			$sql .= " SET itemOrderDate = '".$this->params['itemOrderDate']."', ";
			$sql .= " itemType = '".$this->params['itemType']."', ";
			$sql .= " itemDeliveryDate = '".$this->params['itemDeliveryDate']."', ";
			$sql .= " itemRetailPrice = '".$this->params['itemRetailPrice']."', ";
			$sql .= " itemSupplier = '".$this->params['itemSupplier']."', ";
			$sql .= " itemModel = '".$this->params['itemModel']."', ";
			$sql .= " itemColour = '".$this->params['itemColour']."', ";
			$sql .= " itemSampleRequired = '".$this->params['itemSampleRequired']."', ";
			$sql .= " itemCustomerAcceptsRepair = '".$this->params['itemCustomerAcceptsRepair']."', ";
			$sql .= " itemPhotosRequired = '".$this->params['itemPhotosRequired']."', ";
			$sql .= " itemReplacementRequired = '".$this->params['itemReplacementRequired']."', ";
			$sql .= " itemFindingsAndRecommendations = '".$this->params['itemFindingsAndRecommendations']."', ";
			$sql .= " itemDescriptionAndDamageCause = '".$this->params['itemDescriptionAndDamageCause']."', ";
			$sql .= " itemQuotationPrice = '".$this->params['itemQuotationPrice']."', ";
			$sql .= " itemFaultClass = '".$this->params['itemFaultClass']."', ";
			$sql .= " itemConditionClass = '".$this->params['itemConditionClass']."', ";
			$sql .= " itemPartsRequired = '".$this->params['itemPartsRequired']."', ";
			$sql .= " itemBatchInfo = '".$this->params['itemBatchInfo']."', ";
			$sql .= " itemNotes = '".$this->params['itemNotes']."' ";
			$sql .= " WHERE itemId = '".$this->params['itemId']."'";
			//print "sql is $sql <br />";
			return($sql);
		}
		
		function _insertJobItem() {
			$sql = "INSERT INTO jobItems (itemType, jobId) VALUES ('".$this->params['itemType']."','".$this->params['jobId']."')";
			return($sql);
		}
		
		function _deleteJobItem() {
			$sql = "DELETE from jobItems WHERE itemId = '".$this->params['itemId']."'";
			return($sql);
		}
		
		function _fetchFileByFilenameAndLabel() {
			$sql = "SELECT * from files 
					WHERE fileName = '".addslashes($this->params['fileName'])."'
					AND fileLabel = '".$this->params['fileLabel']."'";
					//print "sal is $sql <br />";
			return($sql); 
		}
		
		function _insertFileData() {
			$sql = "INSERT into files (	filename, 
										fileType, 
										imageType,
										fileScope,
										fullPath, 
										localPath,
										fileLabel,
										keyId)
									VALUES (
										'".$this->params['filename']."', 
										'".$this->params['fileType']."',
										'".$this->params['imageType']."',
										'".$this->params['fileScope']."',
										'".$this->params['fullPath']."',
										'".$this->params['localPath']."',
										'".$this->params['fileLabel']."',
										'".$this->params['keyId']."')";
			//print "sql is $sql ";
			return($sql);
		}
		
		function _fetchFileById() {
			$sql = "SELECT * from files 
					WHERE fileId = '".$this->params['fileId']."'";
			return($sql); 
		}
		
		function _fetchFilesByFileName() {
			$sql = "SELECT * from files 
					WHERE fileName = '".addslashes($this->params['fileName'])."'";
			return($sql); 
		}
		
		function _deleteFileByFilename() {
			$sql = "DELETE from files 
					WHERE fileName = '".$this->params['fileName']."'";
			return($sql);
		}
		
		function _deleteFileByFileId() {
			$sql = "DELETE from files 
					WHERE fileId = '".$this->params['fileId']."'";
			return($sql);
		}
		
		function _fetchFiles() {
			$sql = "SELECT * from files 
					WHERE fileType = '".$this->params['fileType']."'
					AND imageType = '".$this->params['imageType']."'
					AND fileScope = '".$this->params['fileScope']."'
					AND fileLabel = '".$this->params['fileLabel']."'
					AND keyId = '".$this->params['keyId']."'";
						//print "sql is $sql ";
			return($sql); 
			
		}
		
		function _fetchFilesByKeyIdAndFileScope() {
			$sql = "SELECT * from files 
					WHERE fileScope = '".$this->params['fileScope']."'
					AND keyId = '".$this->params['keyId']."'";
			return($sql); 
		}
		
		function _updateFileTitleByFilename() {
			$sql = "UPDATE files 
					SET fileTitle = '".$this->params['fileTitle']."'
					WHERE fileName = '".$this->params['fileName']."'";
			return($sql);
		}
		
		function _updateJobCustomer() {
			$sql = "UPDATE jobs 
					SET jobCustomerId = '".$this->params['jobCustomerId']."'
					WHERE jobId = '".$this->params['jobId']."'";
					//print "sql is $sql <br />";
			return($sql);
		}

	}
?>