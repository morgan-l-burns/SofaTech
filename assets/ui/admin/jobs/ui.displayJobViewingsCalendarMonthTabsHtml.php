<!-- START: ui.displayJobViewingsCalendarMonthTabsHtml.php -->

<ul id="months">
	<!-- <li><a href="#" rel="prev" class="carousel-control">&lt;</a> -->

<?php

	function createMonthTab($year,$month,$slideNumber) {
		echo '<li><a href="#" rel="slide-'.$slideNumber.'" class="carousel-jumper">'.date("M", mktime(0, 0, 0, $month, 1, 0)).' '.$year.'</a></li>';
	}

	$slideNumber = 1;
	for ($year = $_SESSION['calendar']['yearFrom']; $year <= $_SESSION['calendar']['yearTo']; ++$year) {
		for ($month = 1; $month <= 12; ++$month)  {
			// if current year and the only year
			if (($year == $_SESSION['calendar']['yearFrom']) && ($_SESSION['calendar']['yearFrom'] == $_SESSION['calendar']['yearTo'])) {
				if (($_SESSION['calendar']['monthFrom'] <= $month) && ($_SESSION['calendar']['monthTo'] >= $month)){
					createMonthTab($year,$month,$slideNumber);
					++$slideNumber;
				} 
			}
			// if current year and not the only year
			else if (($year == $_SESSION['calendar']['yearFrom']) && ($_SESSION['calendar']['yearFrom'] != $_SESSION['calendar']['yearTo'])) {
				if ($_SESSION['calendar']['monthFrom'] <= $month){
					createMonthTab($year,$month,$slideNumber);
					++$slideNumber;
				} 
			}
			else if ($year < $_SESSION['calendar']['yearTo']) {
				createMonthTab($year,$month,$slideNumber);
				++$slideNumber;
			}
			else if ($year == $_SESSION['calendar']['yearTo']) {
				if ($_SESSION['calendar']['monthTo'] >= $month){
					createMonthTab($year,$month,$slideNumber);
					++$slideNumber;
				} 
			}
			
		}
	}
	
?>
</ul>
<!-- END: ui.displayJobViewingsCalendarMonthTabsHtml.php -->