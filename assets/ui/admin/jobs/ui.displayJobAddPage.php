<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Job Add'); ?>
<?php if (!strlen($_SESSION['user']['clientId'])) $_SESSION['error'][] = 'Your user account is not set up properly, please contact Sofa-Tech'; ?>
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
				<li><a href="/admin/customers/customersearch/">Jobs</a> &raquo;</li>
				<li><a href="#">Add Job</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Add Job</h2>


			<!-- begin product results -->
			<div id="prodResults">
				

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<p class="message">Please enter a Job Reference below and click the 'Go' button to start adding the job to the system.</p><br />

				<form action="/admin/jobs/jobadd/" method="post">
					<div class="jobBoxesOuter jobsAndVisits">
					<table class="jobBoxes jobsAndVisits">
						<?php 
						if (strlen($_SESSION['user']['clientId'])) {
						
							if ($_SESSION['user']['userType'] == 'admin') { 
								$clients = $this->__ALL_MODULES['users']->fetchAllClients();
							
						?>
							<tr>
								<td style="width:200px;">Client</td>
								<td>
									<select name="jobClientId">
										<option value="">Please Select Client</option>
										<?php if (is_array($clients)) {
											foreach ($clients as $client) { ?>
												<option value="<?= $client['clientId'];?>"><?= $client['clientName']; ?></option>
										<?php }
										} ?>
									</select>
								</td>
							</tr>
						<?php } 
						
						else { ?>
						<input type="hidden" name="jobClientId" value="<?=$_SESSION['user']['clientId'];?>" >
						<?php } ?>
						<tr>
							<td>Job Reference</td>
							<td><input name="jobReference" type="text" value="<?= $_POST['jobReference']; ?>" /></td>
						</tr>
						
						<tr>
							<td><input name="addJob" type="image" src="/images/buttonGo.gif" value="Add" class="submit" /></td>
						</tr>
						<?php } ?>
					</table>
					</div>
				</form>


				<p style="height:50px; width:700px;"></p>


			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>