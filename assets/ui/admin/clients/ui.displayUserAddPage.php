<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('User Add'); ?>

<body class="black" onLoad="preloadImages('')">

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
				<li><a href="#">Add User</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Add Client</h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />
				
				<?php $allClients = $this->__ALL_MODULES['users']->fetchAllClients(); 
				//var_dump($allClients);
				?>

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<p class="message">Please enter the user details below and click on the Go button to add the user to the system.</p><br />

				<form action="/admin/users/useradd/" method="post">
				<div class="clientBoxesOuter clients">
					<table class="clients clientBoxes" cellpadding="5">
<!-- Username not valid for clients
						<tr>
							<td>User Name</td>
							<td><input name="userName" type="text" value="<?= $_POST['userName']; ?>"/></td>
						</tr>
-->
						<tr>
							<td>User Name</td>
							<td><input name="userName" type="text" value="<?= $_POST['userName']; ?>"/></td>
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
						</tr>
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
							<td valign="top">User Message</td>
							<td><textarea name="userMessage" rows="10" cols="40"><?= $_POST['userMessage']; ?></textarea></td>
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
							<td><input name="addUser" type="image" src="/images/buttonGo.gif" value="Add" class="submit" /></td>
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