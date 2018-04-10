<?php
	if (strlen($_SESSION['userId'])) {
		$user = $this->__ALL_MODULES['users']->fetchUser($_SESSION['userId']);
	}
	${$this->tabSelected.'ClassSelected'} = ' class="selected"';
?>

<!-- START: ui.displayAdminNavigationHtml.php -->
	<div id="bannerSub">
		<h1 class="s1"><!--<span class="sofaTechTitle">Sofa-Tech</span>--></h1>
		<div id="mainNav">
			<ul>
				<?php if (strlen($_SESSION['userId'])) { ?>
					<li><a href="/admin/users/logout/"<?=$logoutClassSelected;?>>Logout</a></li>
				<?php }  ?>
				<li><a href="/admin/users/messages/"<?=$messagesClassSelected;?>>Messages</a></li>
				<?php if ($user['userType'] == 'admin') { ?>
					<li><a href="/admin/users/clientsearch/"<?=$clientsClassSelected;?>>Clients</a></li>
				<?php } ?>
				<li><a href="/admin/customers/search/"<?=$customersClassSelected;?>>Customers</a></li>
				<li><a href="/admin/jobs/search/"<?=$jobsClassSelected;?>>Jobs</a></li>
				<?php if (!strlen($_SESSION['userId'])) { ?>
					<li><a href="/admin/users/login/"<?=$loginClassSelected;?>>Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
<!-- END: ui.displayAdminNavigaionHtml.php -->