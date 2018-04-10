<?php
	require_once(dirname(__FILE__)."/frontend_functions.class.php");
	
	class frontend_controller extends frontend_functions {
	
	
		// ------------------------------------------------------------------------
		
		/**
		* Function 		- 	clients_functions
		* Purpose 		- 	Contructor
		*/
		
		// ------------------------------------------------------------------------
		
		function frontend_controller($__ALL_MODULES) {
			parent::frontend_functions($__ALL_MODULES);
			define("BASEPATH", dirname(__FILE__));
		}
		
		function displayHeaderHtml($pageTitle, $page='home') {
			$this->pageTitle = $pageTitle;
			$this->page = $page;
			$html = $this->getTemplate('ui.displayHeaderHtml', 'frontend/shared/', true);
			echo ($html);
		}
		
		function displayFooterHtml($pageTitle) {
			$html = $this->getTemplate('ui.displayFooterHtml', 'frontend/shared/', true);
			echo ($html);
		}
		
		
		
		function displayTopNavigation($tabSelected) {
			$this->tabSelected = $tabSelected;
			$html = $this->getTemplate('ui.displayTopNavigation', 'frontend/shared/', true);
			echo ($html);
		}
		
		
		
		function displayHomePage() {
			$html = $this->getTemplate('ui.displayHomePage', 'frontend/homepage/', true);
			echo ($html);

		}
		
		
		function checkImageType($name) {
			if(($_FILES[$name][type] != 'image/jpeg') AND ($_FILES[$name][type] != 'image/pjpeg') AND ($_FILES[$name][type] != '')) {
				return(false);
			}
			return(true);
		}
		
		function checkImageSize($name) {
			if ($_FILES[$name]['size'] < 400000) {
				return(true);
			}
			else return(false); 
		}
		
		function uploadFile($name) {
			$dir = dirname(__FILE__).'/../../uploads/'.$_FILES[$name]['name'];
			chmod(”uploads”,0777);
			$success = copy($_FILES[$name]['tmp_name'], $dir);
			return($success);
		}
		
		function displayContactUsPage() {
			unset($params);
			if (isset($_POST['contactUs_x'])) {
				$params = array();
				$params['email'] = $_POST['email'];
				$params['message'] = $_POST['message'];
				$params['name'] = $_POST['name'];
				$params['telephone'] = $_POST['telephone'];
				$params['postcode'] = $_POST['postcode'];
				if ((strlen($params['email'])) && (strlen($params['message'])) && (strlen($params['name']))) {
					$message = 'Name: '.$params['name'] ."\n";
					$message .= 'Postcode: '.$params['postcode'] ."\n";
					$message .= 'Telephone: '.$params['telephone'] ."\n";
					$message .= 'Email: '.$params['email'] ."\n";
					$message .= 'Query: '.$params['message'];
					$subject = "Sofa-Tech On-line contact us form";
					$headers = "From: ".$params['email']."\r\n"."X-Mailer: php";
					//if (mail('info@sofa-tech.com', $subject, $message, $headers)) {
					
					require_once(dirname(__FILE__).'/../email/class.phpmailer.php');
					
					// check image 1 if added
					if (strlen($_FILES['image1']['name'])) {
						if ($this->checkImageType('image1')) {
							if ($this->checkImageSize('image1')) {
								$upload = $this->uploadFile('image1');
								if ($upload) $image1 = true;
							}
							else  $params['error'] .= 'Image 1 needs to be less than 200k<br />';
							
						}
						else $params['error'] .= 'Image 1 needs to be a "jpg" image<br />';

					}
					
					// check image 2 if added
					if (strlen($_FILES['image2']['name'])) {
						if ($this->checkImageType('image2')) {
							if ($this->checkImageSize('image2')) {
								$upload = $this->uploadFile('image2');
								if ($upload) $image2 = true;
							}
							else  $params['error'] .= 'Image 2 needs to be less than 200k <br />';
							
						}
						else $params['error'] .= 'Image 2 needs to be a "jpg" image <br />';

					}	
					
					// if any attachments send email with attachements
					if ($image1 || $image2) {			
													
						$mail = new PHPMailer();
						//$mail->IsSMTP();// send via SMTP
						//$mail->Host = 'localhost'; // SMTP servers
						$mail->SMTPAuth = false; // turn on/off SMTP authentication
						$mail->From = $params['email'];
						$mail->FromName = $params['name'];
						$mail->AddAddress('info@sofa-tech.com');
						$mail->AddReplyTo('info@sofa-tech.com');
						$mail->WordWrap = 50;// set word wrap
						//now Attach all files submitted
						
						if ($image1) {
							$mail->AddAttachment(dirname(__FILE__).'/../../uploads/'.$_FILES['image1']['name']);
						}
						if ($image2) {
							$mail->AddAttachment(dirname(__FILE__).'/../../uploads/'.$_FILES['image2']['name']);
						}
						
						$mail->Body = $message.'Name : '.$params['name']."\n";
						//
						$mail->IsHTML(false);// send as HTML
						$mail->Subject = $subject;
						if(!$mail->Send()) {
							//echo "Message was not sent <p>";
							//echo "Mailer Error: " . $mail->ErrorInfo;
							//exit;
							$params['error'] .=  'we are having problems sending your images, please try again without using any images<br />';
						}
						$params['status'] = 'sent';
						unset($params);
						$params['feedback'] = 'Your email has been sent to Sofa-Tech, with images, we will respond as soon as possible.';
						if ($image1) {
							unlink(dirname(__FILE__).'/../../uploads/'.$_FILES['image1']['name']);	
						}
						if ($image2) {
							unlink(dirname(__FILE__).'/../../uploads/'.$_FILES['image2']['name']);	
						}
					}
					// no images are attached		
					else if ((!strlen($_FILES['image1']['name'])) && (!strlen($_FILES['image2']['name']))) {
					
						if (mail('info@sofa-tech.com', $subject, $message, $headers)) {
							$params['status'] = 'sent';
							unset($params);
							$params['feedback'] = 'Your email has been sent to Sofa-Tech, we will respond as soon as possible.';
						} else {
							$params['error'] = 'Please check your have entered the details below';
							$params['status'] = 'failed';
						}
					}
					else {
						$params['error'] .= 'There was a problem with your images, email has not been sent. <br />';
					}
				}
				else {
					$params['error'] .= 'Please check your have entered the details below';
				}
			}
			$this->params = $params;
			$html = $this->getTemplate('ui.displayContactUsPage', 'frontend/homepage/', true);
			echo ($html);

		}
		
		
		
		function displayOurWorkPage() {
			$html = $this->getTemplate('ui.displayOurWorkPage', 'frontend/homepage/', true);
			echo ($html);
		}
		
		
		
		function displayCareGuidePage() {
			$html = $this->getTemplate('ui.displayCareGuidePage', 'frontend/homepage/', true);
			echo ($html);
		}
		
		
		function displayAboutUsPage() {
			$html = $this->getTemplate('ui.displayAboutUsPage', 'frontend/homepage/', true);
			echo ($html);
		}		
	}
?>