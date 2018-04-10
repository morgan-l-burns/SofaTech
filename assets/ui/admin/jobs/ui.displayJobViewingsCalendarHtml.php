<!-- START: ui.ui.displayJobViewingsHtml.php -->
<form action="/admin/jobs/jobsearch/" method="post">
<div id="jobCalendarOuter">

<?php

	if (strlen($_GET['calendar'])) {
		if ($_GET['calendar'] == 'close') {
			$_SESSION['calendar']['status'] = 'closed';
		}
		else if ($_GET['calendar'] == 'open') {
			$_SESSION['calendar']['status'] = 'open';
		}
	}
	
	if ($_SESSION['calendar']['status'] == 'closed') {
		$status = 'Open';
		$par = 'calendar=open';
	}
	else {
		$status = 'Close';
		$par = 'calendar=close';
	}
	
	
?>
<h3 id="closeCalendar">Job Visits Calendar <a href="?<?=$par;?>" ><?=$status;?></a></h3>

<!-- <h2>Job Visits Calendar <a href="#" onClick="OpenCloseDiv('calendar');">Open/Close</a></h2> -->

<?php if ($_SESSION['calendar']['status'] != 'closed') { ?>
<div id="calendar">

	<?= $this->__ALL_MODULES['jobs']->displayJobViewingsCalendarMonthTabsHtml(); ?>
	
	<div id="scroller">
		<div id="content">
			<?= $this->__ALL_MODULES['jobs']->displayJobViewingsSlidesHtml(); ?>
		</div> <!-- end content div -->
	</div> <!-- end scroller div -->
	<?= $this->__ALL_MODULES['jobs']->displayCalendarDateSettingHtml(); ?>
	
</div>
	
	
	
	<!-- <a href="#" rel="first" class="carousel-control">First slide</a>
	<a href="#" rel="prev" class="carousel-control">Previous slide</a>
	<a href="#" rel="next" class="carousel-control">Next slide</a>
	<a href="#" rel="last" class="carousel-control">Last slide</a>
	<a href="#" rel="toggle" class="carousel-control">Toggle slides</a> -->
	
	<script type="text/javascript">
			var carousel = new Carousel($('scroller'), $$('.slide'), $$('a.carousel-jumper', 'a.carousel-control'), {duration: 0.5, selectedClassName: 'selected'});
	</script>
	
	<?php } ?>
</div>
</form>
<!-- END: ui.ui.displayJobViewingsHtml.php -->
