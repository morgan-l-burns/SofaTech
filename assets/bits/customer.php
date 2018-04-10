<?php
	session_start();
	require_once(dirname(__FILE__)."/classes/customerController.class.php");
	$oCustomer = new customerController();
	
	$loadCustomer = true;
	if (isset($_POST['updateCustomer'])) {
		$loadCustomer = $oCustomer->updateCustomer($_POST);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Untitled Docum</title>
<style type="text/css" media="screen">
		@import "./css/customer.css";
</style>
<script language="Javascript" src="./js/common.js"></script>
</head>



<body>

	<div id="wrapper">
		<div id="logo">
		</div>
		<ul id="topNavigation">
			<li class="tab"><a href="/" class="dropdown-tab">Home</a></li>
			<li class="tab"><a href="aboutUs.php" class="dropdown-tab">About Us</a></li>
			<li class="tab" onmouseover="openDiv('contact-panel');" onmouseout="closeDiv('contact-panel');"><a href="" class="dropdown-tab">Contact Us</a>
				<ul class="dropdown-panel" id="contact-panel">
					<li><a href="contactUs.php" alt="Contact Us" title="Contact Us">Contact us online</a></li>
					<li><a href="directions.php">Directions</a></li>
				</ul>
			
			</li>
			<li class="tab" onmouseover="openDiv('customer-panel');" onmouseout="closeDiv('customer-panel');"><a href="" class="dropdown-tab" alt="Customers" title="Customers">Customers</a>
				<ul class="dropdown-panel" id="customer-panel">
					<li><a href="searchCustomer.php">Search</a></li>
					<li><a href="addCustomer.php">Add</a></li>
				</ul>
			
			</li>
		</ul>
		
		
		<div id="mainContent">	
		
		
		<?php if (is_array($_SESSION['feedback'])) { ?>
						<p id="feedback">
						<?php foreach ($_SESSION['feedback'] as $feedback) { ?>
							<?=$feedback;?><br />		
					<?php } ?>
						</p>
					<?php 
						unset($_SESSION['feedback']);
					} ?>
					
					<?php if (is_array($_SESSION['error'])) { ?>
						<p id="error">
						<?php foreach ($_SESSION['error'] as $error) { ?>
								<?=$error;?><br />
					<?php } ?>
					</p>
					<?php 
						unset($_SESSION['error']);
					} ?>
		
		
		
			<form method="post" action="customer.php">
				<?php echo($oCustomer->displayEditCustomer($_REQUEST['customerId'],$loadCustomer)); ?>
			</form>
		</div>
		
	</div>
	
	
</body>
</html>
