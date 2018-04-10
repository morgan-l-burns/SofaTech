<?php
	$users = $this->__ALL_MODULES['users']->fetchAllClientUsers();
?>
<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Client Search'); ?>

<body class="black">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('users'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml(); ?>

		<?= $this->__ALL_MODULES['users']->displayUserSubNavigationHtml(); ?>


		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="#">Users</a> &raquo;</li>
				<li><a href="#">Search Users</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Search Users</h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<?php if (!is_array($users) || !count($users)) { ?>
					<p class="alert">You currently have no users.  You can add new users with the Add Client tab above.</p><br />
				<?php } else { ?>

					<?= $this->__ALL_MODULES['users']->displayUserSearchResultsHtml($users); ?>

				<?php } ?>

			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>