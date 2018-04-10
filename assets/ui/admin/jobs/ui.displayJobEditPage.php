<?php $this->__ALL_MODULES['users']->loadLiteBox =true;
$this->__ALL_MODULES['users']->displayAdminHeaderHtml('Job Edit');?>

<body class="green">
	
	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('jobs'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml(); ?>

		<?= $this->__ALL_MODULES['jobs']->displayJobSubNavigationHtml(); ?>


		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="/admin/jobs/">Jobs &amp; Visits</a> &raquo;</li>
				<li><a href="/admin/jobs/jobsearch/">Search Jobs</a>  &raquo</li>
				<li><a href="#">Edit Job</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			

			<h3 class="includeForPrint center" style="">Technician Inspection/Satisfaction Report</h3>
			
			<!-- begin product results -->
			
			<div id="prodResults">
				
				

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<?php $this->displayEditJobForm($this->job, $_SESSION['user']); ?>
					
				
				
				
				<?php if (!strlen($_GET['print'])) { ?>

				<p style="height:100px; width:700px;"></p>
				<?php } ?>


			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>