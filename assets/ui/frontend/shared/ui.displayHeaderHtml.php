<!-- START: ui.displayHeaderHtml.php -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title><?=$this->pageTitle;?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Classification" content="Web Design" />
<meta name="Author" content="XWhyZ" />
<meta name="keywords" content="" />
<meta name="description" content="" />

<style type="text/css" media="screen">
	@import "/assets/css/frontend/structure.css";
<?php
	switch ($this->page) {
		case "home":
			?>@import "/assets/css/frontend/homepage.css";<?php
		break;
		case "contactUs":
			?>@import "/assets/css/frontend/contactUs.css";<?php
		break;
		case "ourWork":
			?>@import "/assets/css/frontend/ourWork.css";
			@import "/assets/css/admin/lightbox.css";<?php
		break;
		case "careGuide":
			?>@import "/assets/css/frontend/careGuide.css";<?php
		break;
		case "aboutUs":
			?>@import "/assets/css/frontend/aboutUs.css";<?php
		break;
	}
?>
</style>

<script type="text/javascript" src="/assets/javascript/shared/prototype.js"></script>
<script type="text/javascript" src="/assets/javascript/shared/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="/assets/javascript/shared/lightbox.js"></script> 
<script type="text/javascript" src="/assets/javascript/shared/scrollControls.js"></script>
<script src="/assets/javascript/shared/textCount.js" type="text/javascript"></script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8646448-1");
pageTracker._trackPageview();
} catch(err) {}
</script>

<link rel="Home Page" href="index.php" title="AccessKey: 1, Home Page" />
<link rel="Accessibility Statement" href="accState.php" title="AccessKey: 0, Accessibility Statement" />
<?php if ($_SERVER['HTTP_HOST'] == 'www.sofa-tech.co.uk') { ?>
<meta name="verify-v1" content="OFIkU0ureQg5f4nH3D1Rd1plYQb9NuJjnzi/3iHJ4G4=" />
<?php } else { ?>
<meta name="verify-v1" content="W1OhA5vNoMyh0dz15hUTkay1DjMuRbwK9/z3tIUOqNk=" />
<?php } ?>
<?php //var_dump($_SERVER); ?>
</head>
<body>
<!-- END: ui.displayHeaderHtml.php -->