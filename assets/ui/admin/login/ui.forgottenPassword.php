<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Forgotten Password'); ?>

<body class="red">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('login'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml('login'); ?>


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Forgotten Password</h2>

			<!-- begin product results -->
			<div id="prodResults">
			<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>
				<br />

				

					
<?php if (!$this->sent) { ?>
					<p class="message">Please submit your details below to have your password emailed to you, or click <a href="/Contact%20Us">here</a> to contact us.</p><br />

					<!-- begin product filter -->
					<!--<div id="prodFilter">-->

						<form action="/admin/users/forgotten/" method="post">
							<table style="font-size: 12px; color:#333333; background-color:#CCCCCC; padding:10px;">
								<tr>
									<td>Email Address</td>
									<td><input name="userEmail" type="text" value="<?= $_POST['userEmail']; ?>" /></td>
								</tr>
								<?php if ($this->showHint) { ?>
								<tr>
									<td>Hint</td>
									<td><b><?=$this->hint;?>?</b>
										<input type="hidden" name="userHint" value="<?=$this->hint;?>">
									</td>
								</tr>
								<tr>
									<td>Answer</td>
									<td><input name="userAnswer" type="text" value="<?= $user['userAnswer']; ?>" /></td>
								</tr>
								
								<?php } ?>
								<tr>
									<td><input name="sendReminder" type="image" src="/images/buttonSend.gif" alt="Send Reminder" /></td>
								</tr>
							</table>
						</form>
						<?php } ?>

					<!--</div>-->
					<!-- end product filter -->

					<p style="height: 400px;" />
				

			</div>
			<!-- end product results -->
			
		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->

<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>