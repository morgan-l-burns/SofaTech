<?php
	$users = $this->__ALL_MODULES['users']->fetchAllClients();
	$user = $this->__ALL_MODULES['users']->fetchClient(array('clientId' => $this->clientId));
	if (!is_array($user)) {
		$_SESSION['error'][] = 'The client was not found.  Please select a client from the client list below and click on their Go button to edit them.';
	}
?>
<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Client Edit'); ?>

<body class="black">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('clients'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml(); ?>

		<?= $this->__ALL_MODULES['users']->displayClientSubNavigationHtml(); ?>


		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="/admin/users/clientsearch/">Clients</a> &raquo;</li>
				<li><a href="/admin/users/clientsearch/">Search Clients</a> &raquo;</li>
				<li><a href="#">Edit Client</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Edit Client</h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<?php if (is_array($user)) { ?>

					<p class="message">Update the client details below and click on Update Profile to save the changes.</p><br />

					<h2><?= $user['clientName']; ?></h2>
					<br />

					<form action="/admin/users/clientedit/" method="post">
						<!-- <input name="userId" type="hidden" value="<?= $user['userId']; ?>" /> -->
						<input name="clientId" type="hidden" value="<?= $user['clientId']; ?>" />
						<div class="clientBoxesOuter clients">
						<table class="clients clientBoxes" cellpadding="5" border="0">
							<tr>
								<td colspan="2" align="right" style="width: 730px;"><input name="updateClient" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" /></td>
							</tr>
							<tr>
								<td>Client Name</td>
								<td><input name="clientName" type="text" value="<?= $user['clientName']; ?>" /></td>
							</tr>
						<!--	<tr>
								<td>Email Address</td>
								<td><input name="userEmail" type="text" value="<?= $user['userEmail']; ?>" /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input name="userPassword" type="text" value="<?= $user['userPassword']; ?>" /></td>
							</tr>
							<tr>
								<td>Hint</td>
								<td>
									<select name="userHint">
										<option value="">Please Select</option>
										<option<?= $user['userHint'] == "Mothers maiden name" ? " selected" : ""; ?>>Mothers maiden name</option>
										<option<?= $user['userHint'] == "Place of birth" ? " selected" : ""; ?>>Place of birth</option>
										<option<?= $user['userHint'] == "Favourite place" ? " selected" : ""; ?>>Favourite place</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Answer</td>
								<td><input name="userAnswer" type="text" value="<?= $user['userAnswer']; ?>" /></td>
							</tr> -->
<!-- Client contact details may be added later
							<tr>
								<td valign="top">Contact Details</td>
								<td><textarea name="clientContactDetails" rows="10" cols="40"><?= $user['clientContactDetails']; ?></textarea></td>
							</tr>
-->
						<!--	<tr>
								<td valign="top">Notes</td>
								<td><textarea name="userNotes" rows="10" cols="40"><?= $user['userNotes']; ?></textarea></td>
							</tr> -->
							<tr>
								<td valign="top">Client Message</td>
								<td><textarea name="clientMessage" rows="10" cols="40"><?= $user['clientMessage']; ?></textarea></td>
							</tr>
							<!-- <tr>
								<td>Active</td>
								<td>
									<select name="userActive">
										<option<?= $user['userActive'] == "yes" ? " selected" : ""; ?>>yes</option>
										<option<?= $user['userActive'] == "no" ? " selected" : ""; ?>>no</option>
									</select>
								</td>
							</tr> -->
							<tr>
								<td colspan="2" align="right"><input name="updateClient" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" /></td>
							</tr>
						</table>
						</div>
					</form>
				<?php } ?>
				
			</div>
			<!-- end product results -->


			<br />
			<h2>Client List</h2>

			<?php if (!is_array($users) || !count($users)) { ?>
				<p style="height:600px; width:750px;">You currently have no clients.  You can add new clients with the Add Client tab above.</p><br />
			<?php } else { ?>

				<?= $this->__ALL_MODULES['users']->displayClientSearchResultsHtml($users); ?>

			<?php } ?>

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>