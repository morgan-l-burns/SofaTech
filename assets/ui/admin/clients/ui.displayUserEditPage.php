<?php
	$users = $this->__ALL_MODULES['users']->fetchAllClientUsers();
	$user = $this->__ALL_MODULES['users']->fetchClientUser(array('userId' => $this->userId));
	if (!is_array($user)) {
		$_SESSION['error'][] = 'The client was not found.  Please select a client from the client list below and click on their Go button to edit them.';
	}
?>
<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Client Edit'); ?>

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
				<li><a href="/admin/users/usersearch/">Users</a> &raquo;</li>
				<li><a href="/admin/users/usersearch/">Search Users</a> &raquo;</li>
				<li><a href="#">Edit User</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Edit User</h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>

<?php //var_dump($user); 
?>
				<?php if (is_array($user)) { ?>
				
				<?php $allClients = $this->__ALL_MODULES['users']->fetchAllClients(); 
				//var_dump($allClients);
				?>

					<p class="message">Update the user details below and click on Update Profile to save the changes.</p><br />

					<h2><?= $user['userName'] ? $user['userName'] :  'No name specified'?></h2>
					<br />

					<form action="/admin/users/useredit/" method="post">
						<input name="userId" type="hidden" value="<?= $user['userId']; ?>" /> 
						
						<div class="clientBoxesOuter clients">
						<table class="clients clientBoxes" cellpadding="5" border="0">
							<tr>
								<td colspan="2" align="right" style="width: 730px;"><input name="updateUser" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" /></td>
							</tr>
							<tr>
								<td>User Name</td>
								<td><input name="userName" type="text" value="<?= $user['userName']; ?>" /></td>
							</tr>
							<tr>
								<td>Client</td>
								<td>
								 <select name="clientId">
								 	<?php if (is_array($allClients)) { 
										foreach ($allClients as $key=>$client) {
											if ($client['clientId'] == $user['clientId']) $selected = ' selected="selected" ';
											else $selected = '';
										 ?>
										<option value="<?=$client['clientId'];?>"<?=$selected;?>><?=$client['clientName'];?></option>
									<?php } } ?>
								 </select>
								
								</td>
							</tr>
							<tr>
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
							</tr>
<!-- Client contact details may be added later
							<tr>
								<td valign="top">Contact Details</td>
								<td><textarea name="clientContactDetails" rows="10" cols="40"><?= $user['clientContactDetails']; ?></textarea></td>
							</tr>
-->
						<!--	<tr>
								<td valign="top">User Notes</td>
								<td><textarea name="userNotes" rows="10" cols="40"><?= $user['userNotes']; ?></textarea></td>
							</tr> -->
							<tr>
								<td valign="top">User Message</td>
								<td><textarea name="userMessage" rows="10" cols="40"><?= $user['userMessage']; ?></textarea></td>
							</tr>
							<tr>
								<td>Active</td>
								<td>
									<select name="userActive">
										<option<?= $user['userActive'] == "yes" ? " selected" : ""; ?>>yes</option>
										<option<?= $user['userActive'] == "no" ? " selected" : ""; ?>>no</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Read Permission</td>
								<td><select name="readPermission">
										<option value="yes"<?= $user['readPermission'] == "yes" ? " selected" : ""; ?>>Yes</option>
										<option value="no"<?= $user['readPermission'] == "no" ? " selected" : ""; ?>>No</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Write Permission</td>
								<td><select name="writePermission">
										<option value="yes"<?= $user['writePermission'] == "yes" ? " selected" : ""; ?>>Yes</option>
										<option value="no"<?= $user['writePermission'] == "no" ? " selected" : ""; ?>>No</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Modify Permission</td>
								<td><select name="modifyPermission">
										<option value="yes"<?= $user['modifyPermission'] == "yes" ? " selected" : ""; ?>>Yes</option>
										<option value="no"<?= $user['modifyPermission'] == "no" ? " selected" : ""; ?>>No</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Delete Permission</td>
								<td><select name="deletePermission">
										<option value="yes"<?= $user['deletePermission'] == "yes" ? " selected" : ""; ?>>Yes</option>
										<option value="no"<?= $user['deletePermission'] == "no" ? " selected" : ""; ?>>No</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td>Job View Type</td>
								<td><select name="viewType">
										<option value="user"<?= $user['viewType'] == "user" ? " selected" : ""; ?>>User</option>
										<option value="client"<?= $user['viewType'] == "client" ? " selected" : ""; ?>>Client</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="right"><input name="updateUser" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" /></td>
							</tr>
						</table>
						</div>
					</form>
				<?php } ?>
				
			</div>
			<!-- end product results -->


			<br />
			<h2>User List</h2>

			<?php if (!is_array($users) || !count($users)) { ?>
				<p style="height:600px; width:750px;">You currently have no users.  You can add new user with the Add User tab above.</p><br />
			<?php } else { ?>

				<?= $this->__ALL_MODULES['users']->displayUserSearchResultsHtml($users); ?>

			<?php } ?>

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>