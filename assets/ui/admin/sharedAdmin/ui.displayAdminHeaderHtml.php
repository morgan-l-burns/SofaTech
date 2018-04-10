<!-- START: ui.displayAdminHeaderHtml.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title><?= $this->pageTitle; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Classification" content="Web Design" />
	<meta name="Author" content="XWhyZ" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
 
	<!-- <script src="js/imgs.js" type="text/javascript"></script> -->
	<script type="text/javascript" src="/assets/javascript/admin/photos.js"></script>
	<script type="text/javascript" src="/assets/javascript/shared/common.js"></script>
	
	<?php if ($this->loadLiteBox) { ?>
	
	<script type="text/javascript" src="/assets/javascript/shared/prototype.js"></script>
	<script type="text/javascript" src="/assets/javascript/shared/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="/assets/javascript/shared/lightbox.js"></script> 
	
	<?php } else { ?>
	
	<script type="text/javascript" src="/assets/javascript/shared/prototype.js"></script>
	<script type="text/javascript" src="/assets/javascript/shared/effects.js"></script>
	<script type="text/javascript" src="/assets/javascript/shared/carousel.js"></script>
	
	<?php } ?>
	
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?=$this->__ALL_MODULES['config']->googleMapKey;?>" type="text/javascript"></script>
	  
	<script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=<?=$this->__ALL_MODULES['config']->googleMapAjaxKey;?>" type="text/javascript"></script>
	<script src="/assets/javascript/shared/gmap.js" type="text/javascript"></script>

	
		<?php if (isset($_GET['print'])) { ?>
		<link href="/assets/css/admin/printStructure.css" rel="stylesheet" type="print">
		<link href="/assets/css/admin/printStructure.css" rel="stylesheet" type="text/css">
		<?php } 
		else { ?>
		<style type="text/css" media="screen">
		@import "/assets/css/admin/structure.css";
		@import "/assets/css/admin/calendar.css";
		@import "/assets/css/admin/lightbox.css";
		</style>
		<?php } ?>
	

	<link rel="Home Page" href="index.php" title="AccessKey: 1, Home Page" />
	<link rel="Accessibility Statement" href="accState.php" title="AccessKey: 0, Accessibility Statement" />
</head>
<!-- END: ui.displayAdminHeaderHtml.php -->