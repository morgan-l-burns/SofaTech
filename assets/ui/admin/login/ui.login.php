<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Login'); ?>

<body class="red">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('login'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml('login'); ?>


		<!-- begin main contents -->
		<div id="mainContenLogin">

			<h3>Login</h3>

			<!-- begin product results -->
			<div id="prodResults">
				<?php if (is_array($_SESSION['feedback'])) { ?>
						<p id="feedback">
						<?php foreach ($_SESSION['feedback'] as $feedback) { ?>
							<?=$feedback;?><br />		
					<?php } ?>
						</p>
					<?php 
						unset($_SESSION['feedback']);
					} ?>
					
					<?php if (is_array($_SESSION['error'])) { ?>
						<p id="error">
						<?php foreach ($_SESSION['error'] as $error) { ?>
								<?=$error;?><br />
					<?php } ?>
					</p>
					<?php 
						unset($_SESSION['error']);
					} ?>


				<p class="message">
					Please enter your email address and password to login.  <br /><br />If you have forgotten your password click <a href="/admin/users/forgotten/">here</a>.
				</p>
				<br />
				<p class="message">
					Please click <a href="/Contact%20Us">here</a>. to contact us 
				</p>
				<p style="height:600px;" />

			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->

<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>