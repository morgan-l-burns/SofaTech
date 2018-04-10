<!-- START:ui.displayJobViewingsSlidesHtml.php -->

<?php

	function createMonthSlide($year,$month,$slideNumber, $this) { 
		$slots = 42;
		$firstDayOfMonth = date("D", mktime(0, 0, 0, $month, 1, $year));
		$lastDayOfMonth = $this->__ALL_MODULES['dates']->getlastdayofmonth($month, $year);
	?>
		<div class="slide" id="slide-<?=$slideNumber?>">
				<div class="month">
					<span class="monthName"><a href="#" rel="prev" class="carousel-control">&lt;</a>&nbsp; <?=date("M", mktime(0, 0, 0, $month, 1, 0));?> <?=$year;?> &nbsp;<a href="#" rel="next" class="carousel-control">&gt;</a></span>
					<table>
						<tr>
							<th>Su</th>
							<th>M</th>
							<th>Tu</th>
							<th>W</th>
							<th>Th</th>
							<th>F</th>
							<th>Sa</th>
						</tr>
						
						<?php
							
							for ($i = 1; $i <= $slots; ++$i) {
								$displayDate = true;
								$cellDay = '';
								if (($i == 1) || ($i == 7) || ($i == 8) || ($i == 14) || ($i == 15) || ($i == 21) || ($i == 22) || ($i == 28) || ($i == 29) || ($i == 35) || ($i == 36) || ($i == 42)) {
									if (($i == 1) || ($i == 8) || ($i == 15) || ($i == 22) || ($i == 29) || ($i == 36)) {	
										?><tr><?php
									}
									$tdClass = 'weekend dayCell';
								}
								else {
									$tdClass = 'weekday dayCell';
								} 
								if ($i <= 7) {
									switch ($i) {
										case 1:
											if ($firstDayOfMonth == 'Sun') $startSlot = 1;
										break;
										case 2:
											if ($firstDayOfMonth == 'Mon') $startSlot = 2;
										break;
										case 3:
											if ($firstDayOfMonth == 'Tue') $startSlot = 2;
										break;
										case 4:
											if ($firstDayOfMonth == 'Wed') $startSlot = 3;
										break;
										case 5:
											if ($firstDayOfMonth == 'Thu') $startSlot = 5;
										break;
										case 6:
											if ($firstDayOfMonth == 'Fri') $startSlot = 6;
										break;
										case 7:
											if ($firstDayOfMonth == 'Sat') $startSlot = 7;
										break;
										
									}
									if (strlen($startSlot)) {
										 $day = 1;
										 $index = $startSlot;
										 $startSlot = '';
									}
									else if (strlen($day)) {
										++$day;
									}
									else {
										$day = '';
										$displayDate = false;
									}
								}
								else if ($i > 7) {
									++$day;
									if ($day > $lastDayOfMonth) $displayDate = false;
								}
								
								if ($month < 10) {
									$displayMonth = '0'.$month;
								}
								else {
									$displayMonth = $month;
								}
								if ($day < 10) {
									$date = $year.'-'.$displayMonth.'-0'.$day;
								}
								else{
									$date = $year.'-'.$displayMonth.'-'.$day;
								}
								
								$today = date('Y-m-d');
								if ($today == $date) $tdClass = 'today dayCell';
								
								?>
								<td class="<?=$tdClass;?>">
								
								
								<table class="dayInfo">
									<?php if ($displayDate) { 
									
									$params['visitDate'] = $date;
									$viewingsArray = $this->sql('_fetchJobViewingsByDate', $params, 'selectMany');
									$numberOfVisits = count($viewingsArray);
									
									if ($numberOfVisits == 1) $visitText = 'Visit';
									else $visitText = 'Visits';
									?>
									<tr><td class="day"><a href="/admin/jobs/jobsearch/?date=<?=$date;?>#searchResults"><?=$day;?></a></td></tr>
									<tr><td class="jobs">(<?=$numberOfVisits;?> <?=$visitText;?>)</td></tr>
									<?php } else { ?>
									<tr><td class="day">&nbsp;</td></tr>
									<tr><td class="jobs">&nbsp;</td></tr>
									<?php }?>
									
								</table>
								
								
								</td>
								<?php
								if (($i == 7)  || ($i == 14) ||($i == 21) || ($i == 28) ||  ($i == 35) || ($i == 42)) { ?>
									</tr>
								<?php }
								
							}
						?>
						
					</table>
				</div>
			
			</div>
	<?php }
	$slideNumber =1;
	for ($year = $_SESSION['calendar']['yearFrom']; $year <= $_SESSION['calendar']['yearTo']; ++$year) {
		for ($month = 1; $month <= 12; ++$month)  {
			// if current year and the only year
			if (($year == $_SESSION['calendar']['yearFrom']) && ($_SESSION['calendar']['yearFrom'] == $_SESSION['calendar']['yearTo'])) {
				if (($_SESSION['calendar']['monthFrom'] <= $month) && ($_SESSION['calendar']['monthTo'] >= $month)){
					createMonthSlide($year,$month,$slideNumber, $this);
					++$slideNumber;
				} 
			}
			// if current year and not the only year
			else if (($year == $_SESSION['calendar']['yearFrom']) && ($_SESSION['calendar']['yearFrom'] != $_SESSION['calendar']['yearTo'])) {
				if ($_SESSION['calendar']['monthFrom'] <= $month){
					createMonthSlide($year,$month,$slideNumber, $this);
					++$slideNumber;
				} 
			}
			else if ($year < $_SESSION['calendar']['yearTo']) {
				createMonthSlide($year,$month,$slideNumber,$this);
			}
			else if ($year == $_SESSION['calendar']['yearTo']) {
				if ($_SESSION['calendar']['monthTo'] >= $month){
					createMonthSlide($year,$month,$slideNumber,$this);
					++$slideNumber;
				} 
			}
			
		}
	}
	
?>
<!-- END:ui.displayJobViewingsSlidesHtml.php -->