<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Logout'); ?>

<body class="red">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('login'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml('login'); ?>


		<!-- begin main contents -->
		<div id="mainContenLogin">

			<h3>Logout</h3>
			<!-- begin product results -->
			<div id="prodResults">

				<p class="message">Thankyou for using this system.  If you wish to continue, please login again.</p>
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