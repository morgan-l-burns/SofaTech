<?php
	require_once(dirname(__FILE__)."/jobs_sql_builder.class.php");

	class jobs_functions extends jobs_sql_builder {


		// ------------------------------------------------------------------------

		/**
		* Function 		- 	jobs_functions
		* Purpose 		- 	Contructor
		*/

		// ------------------------------------------------------------------------

		function jobs_functions($__ALL_MODULES) {
			//print "in jobs_functions $__ALL_MODULES <br />";
			parent::jobs_sql_builder($__ALL_MODULES);
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

		function collectJobSearchParameters($postParams) {
			//var_dump($postParams);
			if (strlen($_GET['searchby'])) {
				if (strlen($_SESSION['jobSearchParams']['orderType'][$_GET['searchby']])) {
					if ($_SESSION['jobSearchParams']['orderType'][$_GET['searchby']] == 'ASC') {
						$_SESSION['jobSearchParams']['orderType'][$_GET['searchby']] = 'DESC';
					}
					else if ($_SESSION['jobSearchParams']['orderType'][$_GET['searchby']] == 'DESC') {
						$_SESSION['jobSearchParams']['orderType'][$_GET['searchby']] = 'ASC';
					}
				}
				else {
					$_SESSION['jobSearchParams']['orderType'][$_GET['searchby']] = 'DESC';
				}
				$_SESSION['jobSearchParams']['order'] = $_GET['searchby'];
			}
			else {
				$_SESSION['jobSearchParams']['order'] = 'jobId';
				$_SESSION['jobSearchParams']['orderType']['jobId'] = 'DESC';
			}
			
			if (isset($_POST['searchJobs_x'])) {
			//var_dump($postParams);
				$_SESSION['jobSearchParams']['clientId'] 			= $postParams['clientId'];
				$_SESSION['jobSearchParams']['jobId'] 				= $postParams['jobId'];
				$_SESSION['jobSearchParams']['jobReference'] 		= $postParams['jobReference'];
				$_SESSION['jobSearchParams']['postcode'] 			= $postParams['postcode'];
				$_SESSION['jobSearchParams']['customerTitle']		= $postParams['customerTitle'];
				$_SESSION['jobSearchParams']['customerFirstName'] 	= $postParams['customerFirstName'];
				$_SESSION['jobSearchParams']['customerSurname']		= $postParams['customerSurname'];
				$_SESSION['jobSearchParams']['jobStatusId']			= $postParams['jobStatusId'];
				
				
				// visit dates from an to
				//print "post var is ".$postParams['useVisitDate']."<br />";
				
				$_SESSION['jobSearchParams']['useVisitDate'] 		= $postParams['useVisitDate'];
				$_SESSION['jobSearchParams']['day_visitDateFrom']	= $postParams['day_visitDateFrom'];
				$_SESSION['jobSearchParams']['month_visitDateFrom'] = $postParams['month_visitDateFrom'];
				$_SESSION['jobSearchParams']['year_visitDateFrom'] 	= $postParams['year_visitDateFrom'];
				$_SESSION['jobSearchParams']['visitDateFrom'] = $_SESSION['jobSearchParams']['year_visitDateFrom'].'-'.$_SESSION['jobSearchParams']['month_visitDateFrom'].'-'.$_SESSION['jobSearchParams']['day_visitDateFrom'];
				$_SESSION['jobSearchParams']['day_visitDateTo']		= $postParams['day_visitDateTo'];
				$_SESSION['jobSearchParams']['month_visitDateTo'] 	= $postParams['month_visitDateTo'];
				$_SESSION['jobSearchParams']['year_visitDateTo'] 	= $postParams['year_visitDateTo'];
				$_SESSION['jobSearchParams']['visitDateTo'] = $_SESSION['jobSearchParams']['year_visitDateTo'].'-'.$_SESSION['jobSearchParams']['month_visitDateTo'].'-'.$_SESSION['jobSearchParams']['day_visitDateTo'];
				
				if ($_SESSION['jobSearchParams']['useVisitDate'] == 'false') {
					unset($_SESSION['jobSearchParams']['visitDateFrom'] );
					unset($_SESSION['jobSearchParams']['visitDateTo']);
				}
				$visitDateFrom = $_SESSION['jobSearchParams']['year_visitDateFrom'].$_SESSION['jobSearchParams']['month_visitDateFrom'].$_SESSION['jobSearchParams']['day_visitDateFrom'];
				$visitDateTo = $_SESSION['jobSearchParams']['year_visitDateTo'].$_SESSION['jobSearchParams']['month_visitDateTo'].$_SESSION['jobSearchParams']['day_visitDateTo'];
				if ($visitDateTo < $visitDateFrom) {
					$_SESSION['jobSearchParams']['year_visitDateTo']	= $_SESSION['jobSearchParams']['year_visitDateFrom'];
					$_SESSION['jobSearchParams']['month_visitDateTo']	= $_SESSION['jobSearchParams']['month_visitDateFrom'];
					$_SESSION['jobSearchParams']['day_visitDateTo']		= $_SESSION['jobSearchParams']['day_visitDateFrom'];
				}
				
				// job dates from an to
				$_SESSION['jobSearchParams']['useJobDates'] 		= $postParams['useJobDates'];
				$_SESSION['jobSearchParams']['day_jobDateFrom']		= $postParams['day_jobDateFrom'];
				$_SESSION['jobSearchParams']['month_jobDateFrom'] 	= $postParams['month_jobDateFrom'];
				$_SESSION['jobSearchParams']['year_jobDateFrom'] 	= $postParams['year_jobDateFrom'];
				$_SESSION['jobSearchParams']['jobDateFrom'] = $_SESSION['jobSearchParams']['year_jobDateFrom'].'-'.$_SESSION['jobSearchParams']['month_jobDateFrom'].'-'.$_SESSION['jobSearchParams']['day_jobDateFrom'];
				$_SESSION['jobSearchParams']['day_jobDateTo']		= $postParams['day_jobDateTo'];
				$_SESSION['jobSearchParams']['month_jobDateTo'] 	= $postParams['month_jobDateTo'];
				$_SESSION['jobSearchParams']['year_jobDateTo'] 		= $postParams['year_jobDateTo'];
				$_SESSION['jobSearchParams']['jobDateTo'] = $_SESSION['jobSearchParams']['year_jobDateTo'].'-'.$_SESSION['jobSearchParams']['month_jobDateTo'].'-'.$_SESSION['jobSearchParams']['day_jobDateTo'];
				
				if ($_SESSION['jobSearchParams']['useJobDates'] == 'false') {
					unset($_SESSION['jobSearchParams']['jobDateFrom'] );
					unset($_SESSION['jobSearchParams']['jobDateTo']);
				}
				
				$jobDateFrom	= $_SESSION['jobSearchParams']['year_jobDateFrom'].$_SESSION['jobSearchParams']['month_jobDateFrom'].$_SESSION['jobSearchParams']['day_jobDateFrom'];
				$jobDateTo 		= $_SESSION['jobSearchParams']['year_jobDateTo'].$_SESSION['jobSearchParams']['month_jobDateTo'].$_SESSION['jobSearchParams']['day_jobDateTo'];
				if ($jobDateTo < $jobDateFrom) {
					$_SESSION['jobSearchParams']['year_jobDateTo']	= $_SESSION['jobSearchParams']['year_jobDateFrom'];
					$_SESSION['jobSearchParams']['month_jobDateTo']	= $_SESSION['jobSearchParams']['month_jobDateFrom'];
					$_SESSION['jobSearchParams']['day_jobDateTo']	= $_SESSION['jobSearchParams']['day_jobDateFrom'];
				}
			}
			
			$_SESSION['jobSearchParams']['visitTypeId'] 	= $postParams['visitTypeId'];
			$_SESSION['jobSearchParams']['visitStatus'] 	= $postParams['visitStatus'];
			
			$_SESSION['jobSearchParams']['jobDateCreated'] 			= $postParams['jobDateCreated'];
			$_SESSION['jobSearchParams']['jobDateOpened'] 			= $postParams['jobDateOpened'];
			$_SESSION['jobSearchParams']['jobDateClosed'] 			= $postParams['jobDateClosed'];
			$_SESSION['jobSearchParams']['jobItemOrderDate'] 		= $postParams['jobItemOrderDate'];
			$_SESSION['jobSearchParams']['jobItemDeliveryDate'] 	= $postParams['jobItemDeliveryDate'];
			//var_dump($_SESSION['jobSearchParams']);
		}

		function fetchJobs($jobDetails) {
			if ($_SESSION['user']['userType'] == 'client') {
				if ($_SESSION['user']['viewType'] == 'user') {
					$_SESSION['jobSearchParams']['jobUserId'] = $_SESSION['user']['userId'];
				}
			}
			if (strlen($jobDetails['visitDate'])) {
				$jobDetails['usePagination'] = true;
				$jobs = $this->sql('_fetchJobs',$jobDetails, 'selectMany');
				
				$jobDetails['usePagination'] = false;
				$count = count($this->sql('_fetchJobs', $jobDetails, 'selectMany'));
				return(array('jobs'=>$jobs,'count'=>$count)); 
			}
			else {
				$_SESSION['jobSearchParams']['usePagination'] = true;
				$_SESSION['jobSearchParams']['pagination'] = $jobDetails['pagination'];
				$_SESSION['jobSearchParams']['startAt'] = $jobDetails['startAt'];
	
				$this->collectJobSearchParameters($jobDetails);
				$jobs = $this->sql('_fetchJobs', $_SESSION['jobSearchParams'], 'selectMany');
				$_SESSION['jobSearchParams']['usePagination'] = false;
				$count = count($this->sql('_fetchJobs', $_SESSION['jobSearchParams'], 'selectMany'));
				return(array('jobs'=>$jobs,'count'=>$count)); 
			}
		}

		function fetchJobsByCustomerId($jobCustomerId) {
			$params['jobCustomerId'] = $jobCustomerId;
			return($this->sql('_fetchJobsByCustomerId', $params, 'selectMany'));
		}

		function fetchJobByClientIdAndJobReference($jobClientId,$jobReference) {
			$params['jobClientId'] = $jobClientId;
			$params['jobReference'] = $jobReference;
			return($this->sql('_fetchJobByClientIdAndJobReference', $params, 'selectOne'));
		}
		
		function updateVisit($visitId, $visitNotes, $visitOutcome, $visitTypeId, $visitStatus, $visitDate, $visitAttended, $visitDateText) {
			$params['visitId'] = $visitId;
			$params['visitNotes'] = $visitNotes;
			$params['visitOutcome'] = $visitOutcome;
			$params['visitAttended'] = $visitAttended;
			$params['visitTypeId'] = $visitTypeId;
			$params['visitStatus'] = $visitStatus;
			$params['visitDate'] = $visitDate;
			$params['visitDateText'] = $visitDateText;
			return($this->sql('_updateVisit', $params, 'queryGeneral'));
		}
		
		
		function addBlankJobItem($jobId) {
			$params['jobId'] = $jobId;
			$params['itemType'] ='untitled';
			return($this->sql('_insertJobItem', $params, 'insertOneReturnId'));
		}
		
		function deleteFileByFileNameAndPath($fullPath, $fileName) {
			unlink($fullPath.$fileName);
		}
		
		function deleteJobItem($itemId) {
			$fileArray = $this->fetchFilesByKeyIdAndFileScope($itemId,'items');
			if (is_array($fileArray)) {
				foreach ($fileArray as $key=>$file) {
					$this->deleteFileByFileNameAndPath($file['fullPath'], $file['fileName']);
					$this->deleteFileByFileId($file['fileId']);
				}
			}
			$params['itemId'] = $itemId;
			return($this->sql('_deleteJobItem', $params, 'deleteRow'));
		}
		
		function deleteFileByFileId($fileId) {
			$params['fileId'] = $fileId;
			return($this->sql('_deleteFileByFileId', $params, 'deleteRow'));
		}
		
		function fetchFilesByKeyIdAndFileScope($keyId, $fileScope) {
			$params['keyId'] = $keyId;
			$params['fileScope'] = $fileScope;
			return($this->sql('_fetchFilesByKeyIdAndFileScope', $params, 'selectMany'));
		}
		
		function updateJobItem(	$itemId, 
								$itemType,
								$orderDate, 
								$deliveryDate, 
								$itemRetailPrice, 
								$itemSupplier, 
								$itemModel, 
								$itemColour, 
								$itemSampleRequired, 
								$itemCustomerAcceptsRepair,
								$itemPhotosRequired,
								$itemReplacementRequired,
								$itemFindingsAndRecommendations,
								$itemDescriptionAndDamageCause,
								$itemQuotationPrice,
								$itemFaultClass,
								$itemConditionClass,
								$itemPartsRequired,
								$itemBatchInfo,
								$itemNotes) {
			$params['itemId'] =  $itemId;
			$params['itemType'] = $itemType;
			$params['itemOrderDate'] = $orderDate;
			$params['itemDeliveryDate'] =  $deliveryDate;
			$params['itemRetailPrice'] = $itemRetailPrice;
			$params['itemSupplier'] = $itemSupplier;
			$params['itemModel'] = $itemModel;
			$params['itemColour'] = $itemColour;
			$params['itemSampleRequired'] =  $itemSampleRequired;
			$params['itemCustomerAcceptsRepair'] = $itemCustomerAcceptsRepair;
			$params['itemPhotosRequired'] = $itemPhotosRequired;
			$params['itemReplacementRequired'] = $itemReplacementRequired;
			$params['itemFindingsAndRecommendations'] = $itemFindingsAndRecommendations;
			$params['itemDescriptionAndDamageCause'] = $itemDescriptionAndDamageCause;
			$params['itemQuotationPrice'] = $itemQuotationPrice;
			$params['itemFaultClass'] = $itemFaultClass;
			$params['itemConditionClass'] = $itemConditionClass;
			$params['itemPartsRequired'] = $itemPartsRequired;
			$params['itemBatchInfo'] = $itemBatchInfo;
			$params['itemNotes'] = $itemNotes;
			return($this->sql('_updateJobItem', $params, 'queryGeneral'));
		}
		
		
		function insertFileData($filename, $fileType, $imageType,$fileScope, $keyId, $fullPath, $localPath, $fileLabel) {
			$params['filename'] = $filename;
			$params['fileType'] = $fileType;
			$params['imageType'] = $imageType;
			$params['fileScope'] = $fileScope;
			$params['keyId'] = $keyId;
			$params['fullPath'] = $fullPath;
			$params['localPath'] = $localPath;
			$params['fileLabel'] = $fileLabel;
			return($this->sql('_insertFileData', $params, 'insertOneReturnId'));
		}
		
		function fetchFiles($fileType, $imageType, $fileScope, $keyId, $fileLabel) {
			$params['fileType'] = $fileType;
			$params['imageType'] = $imageType;
			$params['fileScope'] = $fileScope;
			$params['fileLabel'] = $fileLabel;
			$params['keyId'] = $keyId;
			return($this->sql('_fetchFiles', $params, 'selectMany'));
		}

		function imageResize($width, $height, $target) {
			//print "in image Resize width is $width height is $height <br />";
			//takes the larger size of the width and height and applies the  
			//formula accordingly...this is so this script will work  
			//dynamically with any size image
			
			if ($width > $height) {
				$percentage = ($target / $width);
			} else {
				$percentage = ($target / $height);
			}
			
			//gets the new value and applies the percentage, then rounds the value
			$width = round($width * $percentage);
			$height = round($height * $percentage);
			
			//returns the new sizes in html image tag format...this is so you
			return "width=\"$width\" height=\"$height\"";
		}
		
		function fetchFileByFilenameAndLabel($fileName,$fileLabel) {
			$params['fileName'] = $fileName;
			$params['fileLabel'] = $fileLabel;
			return($this->sql('_fetchFileByFilenameAndLabel', $params, 'selectOne'));
		}
		
		function resizeImage($width, $height, $imageToResize, $ratio=true, $newImageName, $newImageFolder) {
			require_once dirname(__FILE__).'/../images/image.resize.class.php';  
			$image = new Resize_Image();  
			$image->new_width = $width;  
			$image->new_height = $height;  
			$image->image_to_resize = $imageToResize; // Full Path to the file  
			$image->ratio = $ratio; // Keep Aspect Ratio?  
			
			// Name of the new image (optional) - If it's not set a new will be added automatically  
			
			$image->new_image_name = $newImageName;  
			
			/* Path where the new image should be saved. If it's not set the script will output the image without saving it */  
			$image->save_folder = $newImageFolder; 
			//$image->save_folder = 'thumbs/';  
			$process = $image->resize();  
			if($process['result'] && $image->save_folder) {  
				return(true); 
			}  
		}
		
		function updateFileTitleByFilename($fileName, $fileTitle) {
			$params['fileName'] = $fileName;
			$params['fileTitle'] = $fileTitle;
			return($this->sql('_updateFileTitleByFilename', $params, 'queryGeneral'));
		}
		
		function deleteFiles($fileId) {
			$fileArray = $this->fetchFileById($fileId);
			if (is_array($fileArray)) {
				if ($this->deleteFileByFilename($fileArray['fileName'])) {
					 $_SESSION['feedback'][] = 'Item Image Deleted';
				}
			}
		}
		
		function deleteFileByFilename($fileName) {
			$filesArray = $this->fetchFilesByFileName($fileName);
			if (is_array($filesArray)) {
				foreach ($filesArray as $key=>$file) {
					unlink($file['fullPath'].$file['fileName']);
				}
				$params['fileName'] = $fileName;
				return($this->sql('_deleteFileByFilename', $params, 'queryGeneral'));
			}
		}
		
		function fetchFilesByFileName($fileName) {
			$params['fileName'] = $fileName;
			return($this->sql('_fetchFilesByFileName', $params, 'selectMany'));
		}
		
		function fetchFileById($fileId) {
			$params['fileId'] = $fileId;
			return($this->sql('_fetchFileById', $params, 'selectOne'));
		}
		
		function updateJobItems($jobDetails) {
			if (strlen($jobDetails['jobId'])) {
				$jobItemIdsArray = $this->fetchJobItemIds($jobDetails['jobId']);
				if (is_array($jobItemIdsArray)) {
					foreach ($jobItemIdsArray as $key=>$item) {
						$itemType = $jobDetails['itemType_'.$item['itemId']];
						
						//images 
						//var_dump($_FILES);
						//return;
						$numberOfImages = $jobDetails['imgNo_'.$item['itemId']];
						for ($i=1; $i <= $numberOfImages; ++$i) {
							if (strlen($_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['tmp_name'])) {
								if ($_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['size'] < '2100000') { 
									$filename = ereg_replace("'",'',stripslashes(strtolower(time().$_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['name'])));
									//print "filename is $filename";
									//exit;
									if ((eregi('image',$_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['type'])) && (filetype($_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['tmp_name']) == 'file')) {
										
										$localPath = '/assets/images/admin/cms/items/images/original/';
										$fullPath = dirname(__FILE__).'/../../assets/images/admin/cms/items/images/original/';
										
										$thumbFullPath = dirname(__FILE__).'/../../assets/images/admin/cms/items/images/thumb/';
										$thumbLocalPath = '/assets/images/admin/cms/items/images/thumb/';
										
										$resizeFullPath = dirname(__FILE__).'/../../assets/images/admin/cms/items/images/resize/';
										$resizeLocalPath = '/assets/images/admin/cms/items/images/resize/';
										
										if (copy($_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['tmp_name'], $fullPath.$filename)) {
											//$this->insertFileData($filename, 'image', 'original','items', $item['itemId'], $fullPath, $localPath, '');
											$resizeFileName = eregi_replace('.jpg','',$filename);
											$resizeFileName = eregi_replace('.gif','',$resizeFileName);
											$resizeFileName = eregi_replace('.png','',$resizeFileName);
											
											if ($this->resizeImage(200,'', $fullPath.$filename, true, $resizeFileName, $thumbFullPath)) {
												$this->insertFileData($filename, 'image', 'resize','items', $item['itemId'], $thumbFullPath, $thumbLocalPath, 'thumb');
												//$_SESSION['feedback'][] = 'Thumb Image Created';	
											}
											else $_SESSION['error'][] = 'image resize failed for thumb image';
											
											if ($this->resizeImage(800, '', $fullPath.$filename, true, $resizeFileName, $resizeFullPath)) {
												$this->insertFileData($filename, 'image', 'resize','items', $item['itemId'], $resizeFullPath, $resizeLocalPath, 'large');
												//$_SESSION['feedback'][] = 'Larger Image Created';
											}
											else $_SESSION['error'][] = 'image resize failed for larger resize image';
											//$_SESSION['feedback'][] = 'Original item image saved to server.';
											unlink($fullPath.$filename);
											
										}
									}
									else {
										$localPath = '/assets/images/admin/cms/items/files/';
										$fullPath = dirname(__FILE__).'/../../assets/images/admin/cms/items/files/';
										if (copy($_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['tmp_name'], $fullPath.$filename)) {
											$this->insertFileData($filename, 'file', '','items', $item['itemId'], $fullPath, $localPath,'');
										}
									}
								}
								else {
									$_SESSION['error'][] = 'failed uploading '.$_FILES['itemPhoto_'.$item['itemId'].'_'.$i]['name'].' file too large, try to keep it under 500k';
								}
							}
						}
						
						// image labels
						
						
						for ($i = 1; $i <= $jobDetails['imageIndex_'.$item['itemId']]; ++$i) {
							$this->updateFileTitleByFilename($jobDetails['fileName_'.$item['itemId'].'_'.$i], $jobDetails['fileLabel_'.$item['itemId'].'_'.$i]);
							//print "image label is ".$jobDetails['fileLabel_'.$item['itemId'].'_'.$i]."<br />";
							//print "file name is ".$jobDetails['fileName_'.$item['itemId'].'_'.$i]."<br />";
						}
						
						// order date
						$orderDateYear = $jobDetails['year_itemOrderDate_'.$item['itemId']];
						$orderDateMonth = $jobDetails['month_itemOrderDate_'.$item['itemId']];
						$orderDateDay = $jobDetails['day_itemOrderDate_'.$item['itemId']];
						$orderDate = $orderDateYear.'-'.$orderDateMonth.'-'.$orderDateDay;
						
						
						// delivery date
						$deliveryDateYear = $jobDetails['year_itemDeliveryDate_'.$item['itemId']];
						$deliveryDateMonth = $jobDetails['month_itemDeliveryDate_'.$item['itemId']];
						$deliveryDateDay = $jobDetails['day_itemDeliveryDate_'.$item['itemId']];
						
						$deliveryDate = $deliveryDateYear.'-'.$deliveryDateMonth.'-'.$deliveryDateDay;
						
						
						$itemRetailPrice = $jobDetails['itemRetailPrice_'.$item['itemId']];	
							
						
						$itemSupplier = $jobDetails['itemSupplier_'.$item['itemId']];	
							
						
						$itemModel = $jobDetails['itemModel_'.$item['itemId']];	
						
						
						$itemColour = $jobDetails['itemColour_'.$item['itemId']];	
							
						
						$itemSampleRequired = $jobDetails['itemSampleRequired_'.$item['itemId']];	
							
						
						$itemCustomerAcceptsRepair = $jobDetails['itemCustomerAcceptsRepair_'.$item['itemId']];	
						
						
						$itemPhotosRequired = $jobDetails['itemPhotosRequired_'.$item['itemId']];	
						
						
						$itemReplacementRequired = $jobDetails['itemReplacementRequired_'.$item['itemId']];	
							
						
						$itemFindingsAndRecommendations = $jobDetails['itemFindingsAndRecommendations_'.$item['itemId']];	
						
						
						$itemDescriptionAndDamageCause = $jobDetails['itemDescriptionAndDamageCause_'.$item['itemId']];	
						
						
						$itemQuotationPrice = $jobDetails['itemQuotationPrice_'.$item['itemId']];	
						
						//print "qutoation price is $itemQuotationPrice <br />";
						$itemFaultClass = $jobDetails['itemFaultClass_'.$item['itemId']];
						
						
						$itemConditionClass	= $jobDetails['itemConditionClass_'.$item['itemId']];	
						
						
						$itemPartsRequired	= $jobDetails['itemPartsRequired_'.$item['itemId']];	
						
						
						$itemBatchInfo	= $jobDetails['itemBatchInfo_'.$item['itemId']];	
						
						
						$itemNotes	= $jobDetails['itemNotes_'.$item['itemId']];	
						
						if ($this->updateJobItem(	$item['itemId'],
												$itemType, 
												$orderDate, 
												$deliveryDate, 
												$itemRetailPrice, 
												$itemSupplier, 
												$itemModel, 
												$itemColour, 
												$itemSampleRequired, 
												$itemCustomerAcceptsRepair,
												$itemPhotosRequired,
												$itemReplacementRequired,
												$itemFindingsAndRecommendations,
												$itemDescriptionAndDamageCause,
												$itemQuotationPrice,
												$itemFaultClass,
												$itemConditionClass,
												$itemPartsRequired,
												$itemBatchInfo,
												$itemNotes)) $_SESSION['feedback'][] = $itemType.' Updated';
						else $_SESSION['error'][] =  $itemType.' Not Updated';
					}
				}
			}
		}
		
		function fetchJobItemIds($jobId) {
			$params['jobId'] = $jobId;
			return($this->sql('_fetchJobItemIds', $params, 'selectMany'));
		}
		
		function fetchUserEmailByClientId($clientId)  {
			$params['clientId'] = $clientId;
			return($this->sql('_fetchUserEmailByClientId', $params, 'selectOne'));
		}
		
		function fetchUserEmailByUserId($userId)  {
			$params['userId'] = $userId;
			return($this->sql('_fetchUserEmailByUserId', $params, 'selectOne'));
		}
		
		function sendVisitEmailAlert($visitId, $jobId) {
			$jobDetailsArray = $this->fetchJobByJobId($jobId);
			if (is_array($jobDetailsArray)) {
				//$clientArray = $this->fetchUserEmailByClientId($jobDetailsArray['clientId']);
				$clientArray = $this->fetchUserEmailByUserId($jobDetailsArray['userId']);
				//var_dump($clientArray);
				if (strlen($clientArray['userEmail'])) {
					$visitDetailsArray = $this->fetchVisitsByVisitId($visitId);
					$subject = 'Sofa-Tech Customer Visit Arranged';
					$message .= 'A visit date has been arranged for: '."\n";
					$message .= $jobDetailsArray['customerTitle']."\n";
					$message .= $jobDetailsArray['customerFirstName']."\n";
					$message .= $jobDetailsArray['customerSurname']."\n"."\n";
					$message .= 'Visit date: '.$visitDetailsArray["visitDateFormated"]."\n";
					$message .= 'Click: http://www.sofa-tech.co.uk/admin/jobs/jobedit/?jobId='.$jobId."\n";
					$headers = "From: visits@sofa-tech.com \r\n"."X-Mailer: php";
					mail($clientArray['userEmail'], $subject, $message, $headers);
					mail('info@sofa-tech.com', $subject, $message, $headers);
					$_SESSION['feedback'][] = 'Visit email notification sent to client';
				}
				else $_SESSION['error'][] = 'Visit email notification not sent to client, client does not have an email address.';
			}
		}
		
		function addVisit($jobDetails) {
			$params['jobId'] = $jobDetails['jobId'];
			$params['visitTypeId'] = $jobDetails['newVisitTypeId'];
			$params['visitStatus'] = 'open';
			$params['visitAttended'] = 'no';
			$visitYear = $jobDetails['year_newVisitDate'];
			$visitMonth = $jobDetails['month_newVisitDate'];
			$visitDay = $jobDetails['day_newVisitDate'];
			$visitHour = $jobDetails['hour_newVisitDate'];
			$visitMinute = $jobDetails['minute_newVisitDate'];
			$params['visitDate'] = $visitYear.'-'.$visitMonth.'-'.$visitDay.' '.$visitHour.':'.$visitMinute;
			$addVisitArray = $this->sql('_addVisit', $params, 'insertOneReturnId');
			if (($addVisitArray[0]) && (strlen($addVisitArray[1]))) {
				$this->sendVisitEmailAlert($addVisitArray[1], $params['jobId']);
				return(true);
			}
			else return(false); 
		}
		
		
		function fetchJobsByReference($jobReference, $jobId) {
			$params['jobReference'] = $jobReference;
			$params['jobId'] = $jobId;
			return($this->sql('_fetchJobsByReference', $params, 'selectMany'));
		}
		
		function updateJob($jobDetails) {
			// collect job details
			$params = array();
			if ($jobDetails['jobId'])                             $params['jobId']                             = $jobDetails['jobId'];
			if ($jobDetails['jobClientId'])                       $params['jobClientId']                       = $jobDetails['jobClientId'];
			if ($jobDetails['jobReference'])                      $params['jobReference']                      = $jobDetails['jobReference'];
			
			$existingJobsWithReferenceArray = $this->fetchJobsByReference($jobDetails['jobReference'], $params['jobId']);
			if (count($existingJobsWithReferenceArray) == 1) {
				$_SESSION['error'][] = 'Please Select a different Job Reference, '.$jobDetails['jobReference'].' already used';
				unset($params['jobReference']);
			}
			
			if ($jobDetails['jobTechnicianName'])                 $params['jobTechnicianName']                 = $jobDetails['jobTechnicianName'];
			
			if ($jobDetails['jobAllowDelete'])                    $params['jobAllowDelete']                    = $jobDetails['jobAllowDelete'];
			if ($jobDetails['jobAllowUpdate'])                    $params['jobAllowUpdate']                    = $jobDetails['jobAllowUpdate'];
			
			// update customer details 
			
			// select from existing customer pannel
			if (strlen($jobDetails['selectCustomer'])) {
				$params['jobCustomerId'] = $jobDetails['selectCustomer'];
				$_POST['customerTitle'] = '';
				$_POST['customerFirstName'] = '';
				$_POST['customerMiddleNames'] = '';
				$_POST['customerSurname'] = '';
				$_POST['customerAddressLine1'] = '';
				$_POST['customerAddressLine2'] = '';
				$_POST['customerAddressLine3'] = '';
				$_POST['customerAddressTownCity'] = '';
				$_POST['customerAddressCounty'] = '';
				$_POST['customerAddressCountry'] = '';
				$_POST['customerTelephone1'] = '';
				$_POST['customerTelephone2'] = '';
				$_POST['customerMobile'] = '';
				$_POST['customerNotes'] = '';
				$_SESSION['feedback'][] = 'Existing customer selected';
			}
			else {
			
				// update existing customer
				if (strlen($jobDetails['customerId'])) {
					if ($this->__ALL_MODULES['customers']->updateCustomer($jobDetails)) $_SESSION['feedback'][] = 'Customer Details Updated';
				}
				else {
					
					// insert new customer
					if ((strlen($jobDetails['customerClientId'])) && (strlen($jobDetails['customerTitle'])) && (strlen($jobDetails['customerAddressPostCode'])) && (strlen($jobDetails['customerSurname']))) { 
						if ($this->__ALL_MODULES['customers']->addCustomer($jobDetails)) {
							$_SESSION['feedback'][] = 'Customer details added';
							$params['jobCustomerId'] = $_SESSION['temp']['customerId'];
							unset($_SESSION['temp']['customerId']);
						}
					}
					else $_SESSION['error'][] = 'No customer details added, make sure you have entered all the mandatory fields.';
					$this->deleteJobCustomerId($jobDetails['jobId']);
				}
			}
			
			// collect job visit details
			for ($i = 1; $i <= $jobDetails['visitIndex']; ++ $i) {
				$visitId = $jobDetails[$i.'_visitId'];
				$visitOutcome = $jobDetails[$i.'_visitOutcome'];
				$visitNotes = $jobDetails[$i.'_visitNotes'];
				$visitTypeId = $jobDetails[$i.'_visitTypeId'];
				$visitStatus = $jobDetails[$i.'_visitStatus'];
				$visitAttended = $jobDetails[$i.'_visitAttended'];
				$visitDateText = $jobDetails[$i.'_visitDateText'];
				
				// visit date
				$visitYear = $jobDetails['year_'.$i.'_visitDate'];
				$visitMonth = $jobDetails['month_'.$i.'_visitDate'];
				$visitDay = $jobDetails['day_'.$i.'_visitDate'];
				$visitHour = $jobDetails['hour_'.$i.'_visitDate'];
				$visitMinute = $jobDetails['minute_'.$i.'_visitDate'];
				$visitDate = $visitYear.'-'.$visitMonth.'-'.$visitDay.' '.$visitHour.':'.$visitMinute;
				if ($this->updateVisit($visitId, $visitNotes, $visitOutcome, $visitTypeId, $visitStatus, $visitDate, $visitAttended, $visitDateText)) $_SESSION['feedback'][] = 'Visit '.$i.' Updated';
				else $_SESSION['error'][] = 'Visit Not Updated';
			}
			
			// update job items
			
			$this->updateJobItems($jobDetails);
			
			
			// end collect job visit details
			
			if ($jobDetails['jobDateEntered'])                    $params['jobDateEntered']                    = $jobDetails['jobDateEntered'];
			$params['jobLastModified']                   		= date('Y').'-'.date('m').'-'.date('d').' '.date('H').':'.date('i').':00';
			
			if ($jobDetails['jobStatusId']) {
				$params['jobStatusId'] 		= $jobDetails['jobStatusId'];
				$jobStatusArray = $this->fetchJobStatusById($jobDetails['jobStatusId']);
				//var_dump($jobStatusArray);
				switch ($jobStatusArray['JobStatusAction']) {
					case 'open':
						$params['jobDateOpened'] 	= date('Y').'-'.date('m').'-'.date('d').' '.date('H').':'.date('i');
						$params['jobOpenedBy'] 	= $_SESSION['user']['userName'].' ('.$_SESSION['user']['clientName'].')';
					break;
					case 'close':
						$params['jobDateClosed'] 	= date('Y').'-'.date('m').'-'.date('d').' '.date('H').':'.date('i');
						$params['jobClosedBy'] 	= $_SESSION['user']['userName'].' ('.$_SESSION['user']['clientName'].')';
					break;
				}
				
			}
			
			if ($jobDetails['openJob']) {
				$params['jobDateOpened'] 	= date('Y').'-'.date('m').'-'.date('d').' '.date('H').':'.date('i');
				$params['jobOpenedBy'] 	= $_SESSION['user']['userName'].' ('.$_SESSION['user']['clientName'].')';
				$params['jobStatusId'] 	= 1;
			}
			
			if ($jobDetails['closeJob']) {
				$params['jobDateClosed'] 	= date('Y').'-'.date('m').'-'.date('d').' '.date('H').':'.date('i');
				$params['jobClosedBy'] 	= $_SESSION['user']['userName'].' ('.$_SESSION['user']['clientName'].')';
				$params['jobStatusId'] 	= 2;
				//$params['jobLocked'] 	= 'yes';
			}
			/*if ($jobDetails['jobDateOpened'])                     $params['jobDateOpened']                     = $jobDetails['jobDateOpened'];
			if ($jobDetails['jobOpenedBy'])                       $params['jobOpenedBy']                       = $jobDetails['jobOpenedBy'];
			if ($jobDetails['jobDateClosed'])                     $params['jobDateClosed']                     = $jobDetails['jobDateClosed'];
			if ($jobDetails['jobCustomerId'])                     $params['jobCustomerId']                     = $jobDetails['jobCustomerId'];
			if ($jobDetails['jobItemOrderDate'])                  $params['jobItemOrderDate']                  = $jobDetails['jobItemOrderDate'];
			if ($jobDetails['jobItemDeliveryDate'])               $params['jobItemDeliveryDate']               = $jobDetails['jobItemDeliveryDate'];
			if ($jobDetails['jobItemCombinationId'])              $params['jobItemCombinationId']              = $jobDetails['jobItemCombinationId'];
			if ($jobDetails['jobItemSupplier'])                   $params['jobItemSupplier']                   = $jobDetails['jobItemSupplier'];
			if ($jobDetails['jobItemType'])                       $params['jobItemType']                       = $jobDetails['jobItemType'];
			if ($jobDetails['jobItemModel'])                      $params['jobItemModel']                      = $jobDetails['jobItemModel'];
			if ($jobDetails['jobItemColour'])                     $params['jobItemColour']                     = $jobDetails['jobItemColour'];
			if ($jobDetails['jobItemSampleRequired'])             $params['jobItemSampleRequired']             = $jobDetails['jobItemSampleRequired'];
			if ($jobDetails['jobItemCustomerAcceptsRepair'])      $params['jobItemCustomerAcceptsRepair']      = $jobDetails['jobItemCustomerAcceptsRepair'];
			if ($jobDetails['jobItemPhotosRequired'])             $params['jobItemPhotosRequired']             = $jobDetails['jobItemPhotosRequired'];
			if ($jobDetails['jobItemReplacementRequired'])        $params['jobItemReplacementRequired']        = $jobDetails['jobItemReplacementRequired'];
			if ($jobDetails['jobItemFindingsAndRecommendations']) $params['jobItemFindingsAndRecommendations'] = $jobDetails['jobItemFindingsAndRecommendations'];
			if ($jobDetails['jobItemDescriptionAndDamageCause'])  $params['jobItemDescriptionAndDamageCause']  = $jobDetails['jobItemDescriptionAndDamageCause'];
			if ($jobDetails['jobQuotationPrice'])                 $params['jobQuotationPrice']                 = $jobDetails['jobQuotationPrice'];
			if ($jobDetails['jobFaultClass'])                     $params['jobFaultClass']                     = $jobDetails['jobFaultClass'];
			if ($jobDetails['jobConditionClass'])                 $params['jobConditionClass']                 = $jobDetails['jobConditionClass'];
			if ($jobDetails['jobPartsRequired'])                  $params['jobPartsRequired']                  = $jobDetails['jobPartsRequired'];
			if ($jobDetails['jobBatchInfo'])                      $params['jobBatchInfo']                      = $jobDetails['jobBatchInfo'];
			if ($jobDetails['jobVisitOutcome'])                   $params['jobVisitOutcome']                   = $jobDetails['jobVisitOutcome'];
			if ($jobDetails['jobNotes'])                          $params['jobNotes']                          = $jobDetails['jobNotes']; */
			return($this->sql('_updateJob', $params, 'updateOne'));
		}
		
		function fetchJobStatusById($jobStatusId) {
			$params['jobStatusId'] = $jobStatusId;
			return($this->sql('_fetchJobStatusById', $params, 'selectOne'));
		}

		function addJob($jobDetails) {
			//var_dump($_SESSION);
			$params = array();
			$params['jobClientId']  = $jobDetails['jobClientId'];
			$params['jobReference'] = $jobDetails['jobReference'];
			$params['jobCreatedBy'] = $_SESSION['loginUserName'].' ('.$_SESSION['user']['clientName'].')';
			$params['jobUserId'] = $_SESSION['user']['userId'];
			return($this->sql('_addJob', $params, 'insertOneReturnId'));
		}
		
		function fetchJobByJobId($jobId) {
			$params['jobId'] = $jobId;
			return($this->sql('_fetchJobByJobId', $params, 'selectOne'));
		}

		function deleteJobVisitsByJobId($jobId) {
			$params['jobId'] = $jobId;
			return($this->sql('_deleteJobVisitsByJobId', $params, 'queryGeneral'));
		}
		
		function deleteJobItemsByJobId($jobId) {
			$jobItems = $this->fetchJobItems($jobId);
			if (is_array($jobItems)) {
				foreach ($jobItems as $key=>$item) {
					$this->deleteJobItem($item['itemId']);
				}
			}
		}
		
		function deleteJob($jobId) {
			$this->deleteJobVisitsByJobId($jobId);
			$this->deleteJobItemsByJobId($jobId);
			$params['jobId'] = $jobId;
			return($this->sql('_deleteJob', $params, 'deleteRow'));
		}
		
		function fetchVisitTypes($order='visitType') {
			$params['order'] = $order;
			return($this->sql('_fetchVisitTypes', $params, 'selectMany'));
		}
		
		function fetchJobViewingsByDate($visitDate) {
			$params['visitDate'] = $visitDate;
			return($this->sql('_fetchJobViewingsByDate', $params, 'selectMany'));
		}
		
		function fetchJobsStatusDetails($order='jobStatus') {
			$params['order'] = $order;
			return($this->sql('_fetchJobsStatusDetails', $params, 'selectMany'));
		}
		
		function fetchJobsStatusDetailsByID($jobStatusId) {
			$params['jobStatusId'] = $jobStatusId;
			return($this->sql('_fetchJobsStatusDetailsByID', $params, 'selectOne'));
		}
		
		function fetchJobVisits($visitDateFrom, $visitDateTo, $visitTypeIdArray, $visitStatusArray) {
			$params['visitDateFrom'] = $visitDateFrom;
			$params['visitDateTo'] = $visitDateTo;
			$params['visitTypeIdArray'] = $visitTypeIdArray;
			$params['visitStatusArray'] = $visitStatusArray;
			return($this->sql('_fetchJobVisits', $params, 'selectMany'));
		}
		
		function fetchVisitsByJobId($jobId, $order='visitDate') {
			$params['jobId'] = $jobId;
			$params['order'] = $order;
			return($this->sql('_fetchVisitsByJobId', $params, 'selectMany'));
		}
		
		function fetchVisitsByVisitId($visitId) {
			$params['visitId'] = $visitId;
			return($this->sql('_fetchVisitsByVisitId', $params, 'selectOne'));
		}
		
		function deleteJobCustomerId($jobId) {
			$params['jobId'] = $jobId;
			return($this->sql('_deleteJobCustomerId', $params, 'queryGeneral'));
		}
		
		
		function fetchFormPermissions($formUsageType, $formName, $userArray) {
			$params['formUsageType'] = $formUsageType;
			$params['formName'] = $formName;
			$params['userId'] = $userArray['userId'];
			return($this->sql('_fetchFormPermissions', $params, 'selectMany'));

		}
		
		function deleteVisitById($visitId) {
			$params['visitId'] = $visitId;
			return($this->sql('_deleteVisitById', $params, 'deleteRow'));
		}
		
		function fetchJobItems($jobId) {
			$params['jobId'] = $jobId;
			return($this->sql('_fetchJobItems', $params, 'selectMany'));
		}
		
		function updateJobCustomer($jobId, $jobCustomerId) {
			$params['jobId'] = $jobId;
			$params['jobCustomerId'] = $jobCustomerId;
			return($this->sql('_updateJobCustomer', $params, 'updateOne'));
		}


	}
?>