<?php
	if (isset($_SESSION['userId'])) {
		$user = $this->__ALL_MODULES['users']->fetchUser(array('userId' => $_SESSION['userId']));
	}
	
	
	${$this->tabSelected.'ClassSelected'} = ' class="selected"';
?>

<!-- START: ui.displayAdminNavigationHtml.php -->
	<div id="bannerSub">
	<?php if (strlen($_GET['print'])) { ?>
		<h1 class="s1"><a href="#" id="logo" title="Sofa-Tech" alt="Sofa-Tech"><img src="/assets/images/admin/temp/adminHeader.jpg" alt="Sofa-Tech" titlie="Sofa-Tech" /></a></h1>
		<?php } else { ?>
		 <h1 class="s1"><a href="#" id="logo" title="Sofa-Tech" alt="Sofa-Tech"></a></h1>
		<?php } ?>

	<?php if (strlen($_GET['print'])) { ?>
	
		<p id="contactDetails">
			Sofa-Tech<br />
			18 Lea Close<br />
			Broughton Astley<br />
			Leicestershire, LE9 6NW<br />
			Tel/Fax: 01455 286658 <br />
			E-mail: <a href="mailto:info@sofa-tech.co.uk" title="Email info@sofa-tech.co.uk">info@sofa-tech.co.uk</a><br />
			Web: <a href="http://wwww.sofa-tech.co.uk" title="wwww.sofa-tech.co.uk">wwww.sofa-tech.co.uk</a><br />
		</p>
	<?php } ?>
		
		<div id="mainNav">
			<ul>
				<?php if (strlen($_SESSION['userId'])) { ?>
					<li><a href="/admin/users/logout/"<?= $logoutClassSelected; ?>>Logout</a></li>
				<?php }  ?>
				<li><a href="http://www.sofa-tech.co.uk"<?= $websiteClassSelected; ?>>Website</a></li>
				<?php if ($user['userType'] == 'admin') { ?>
					<li><a href="/admin/users/usersearch/"<?= $usersClassSelected; ?>>Users</a></li>
					<li><a href="/admin/users/clientsearch/"<?= $clientsClassSelected; ?>>Clients</a></li>
				<?php } ?>
				<li><a href="/admin/customers/search/"<?= $customersClassSelected; ?>>Customers</a></li>
				<li><a href="/admin/jobs/search/"<?= $jobsClassSelected; ?>>Jobs &amp; Visits</a></li>
				<?php if (!strlen($_SESSION['userId'])) { ?>
					<li><a href="/admin/users/login/"<?= $loginClassSelected; ?>>Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	
	
<!-- END: ui.displayAdminNavigaionHtml.php -->