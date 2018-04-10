<!-- START: ui.displayJobSubNavigationHtml.php -->
	<div id="subNav">
		<ul>
			<li><a href="/admin/jobs/jobsearch/">Search Jobs</a></li>
			<?php if ($_SESSION['user']['writePermission'] == 'yes') { ?>
			<li><a href="/admin/jobs/jobadd/">Add Job</a></li>
			<?php } ?>
			<!--<li><a href="/admin/users/clientedit/">Edit Job</a></li>-->
		</ul>

		<div class="hr"><hr /></div>
	</div> 
<!-- END: ui.displayJobSubNavigationHtml.php -->