<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Client Add'); ?>

<body class="black" onLoad="preloadImages('')">

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
				<li><a href="#">Add Client</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Add Client</h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<p class="message">Please enter the client details below and click on the Go button to add the client to the system.</p><br />

				<form action="/admin/users/clientadd/" method="post">
				<div class="clientBoxesOuter clients">
					<table class="clients clientBoxes" cellpadding="5">
<!-- Username not valid for clients
						<tr>
							<td>User Name</td>
							<td><input name="userName" type="text" value="<?= $_POST['userName']; ?>"/></td>
						</tr>
-->
						<tr>
							<td>Client Name</td>
							<td><input name="clientName" type="text" value="<?= $_POST['clientName']; ?>"/></td>
						</tr>
					<!--	<tr>
							<td>Email Address</td>
							<td><input name="userEmail" type="text" value="<?= $_POST['userEmail']; ?>"/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input name="userPassword" type="text" value="<?= $_POST['userPassword']; ?>"/></td>
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
							<td><input name="userAnswer" type="text" value="<?= $_POST['userAnswer']; ?>"/></td>
						</tr> -->
<!-- Client contact details may be added later
						<tr>
							<td valign="top">Contact Details</td>
							<td><textarea name="clientContactDetails" rows="10" cols="40"><?= $_POST['clientContactDetails']; ?></textarea></td>
						</tr>
-->
						<!-- <tr>
							<td valign="top">Notes</td>
							<td><textarea name="userNotes" rows="10" cols="40"><?= $_POST['userNotes']; ?></textarea></td>
						</tr> -->
						<tr>
							<td valign="top">Client Message</td>
							<td><textarea name="clientMessage" rows="10" cols="40"><?= $_POST['clientMessage']; ?></textarea></td>
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
							<td><input name="addClient" type="image" src="/images/buttonGo.gif" value="Add" class="submit" /></td>
						</tr>
					</table>
					</div>
				</form>


				<p style="height:50px; width:750px;"></p>

			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>