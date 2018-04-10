

<form action="/admin/jobs/jobsearch/" method="post" id="searchJobs" name="searchJobs">
					<h3>Filter Jobs Search</h3>
					<?php if ($this->user['userType'] == 'client') { ?>
						<input name="jobClientId" type="hidden" value="<?= $this->user['userId']; ?>" />
					<?php } ?>
					<div id="searchPanelOuter" class="jobsAndVisits">
					<table style="width: 950px; font-size: 12px; color: #333333; padding: 10px; text-align:left;" class="jobsAndVisits">
				 		<tr>
							<td>Clear Search Parameters<input type="checkbox" name="clearSearch"  onClick="document.searchJobs.submit();"/></td><td align="right"><input name="searchJobs" type="image" src="/images/buttonSearch.gif" alt="Job Search" /></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<?php if ($this->user['userType'] == 'admin') { 
							$allClients = $this->__ALL_MODULES['users']->fetchAllClients();
						?>
							<tr>
								<th valign="top">Select Clients</th>
								<td width="80%">
									
										
										
										<?php if (is_array($allClients)) {
											foreach ($allClients as $key=>$client) { 
												$checked = '';
												if (is_array($_SESSION['jobSearchParams']['clientId'])) {
													foreach ($_SESSION['jobSearchParams']['clientId'] as $sessionClientId) {
														if ($client['clientId'] == $sessionClientId) $checked = ' checked ';
													}
												}
											?>
												<input type="checkbox" name="clientId[]" value="<?= $client['clientId']; ?>"<?=$checked;?>><?= $client['clientName']; ?><br />
										<?php }
										} ?>
									
								</td>
							</tr>
						<?php } ?>
						
						<tr><td>&nbsp;</td></tr>
						
						<tr>
							<th>Job Reference ID</th>
							<td><input name="jobId" type="text" size="8" value="<?= $_SESSION['jobSearchParams']['jobId']; ?>" /></td>
						</tr>
						<tr>
							<th>Job Reference</th>
							<td><input name="jobReference" type="text" size="10" value="<?= $_SESSION['jobSearchParams']['jobReference']; ?>" /></td>
						</tr>
						<tr>
							<th>Postcode</th>
							<td><input name="postcode" type="text" size="10" value="<?= $_SESSION['jobSearchParams']['postcode']; ?>" /></td>
						</tr>
						
						<?php
						switch ($_SESSION['jobSearchParams']['customerTitle']) {
							case 'Mrs':
								$mrsSelected = ' selected';
							break;
							case 'Mr':
								$mrSelected = ' selected';
							break;
							case 'Miss':
								$missSelected = ' selected';
							break;
							case 'Ms':
								$msSelected = ' selected';
							break;
						}
						?>
						<tr>
							<th>Title</th>
							<td>
								<select name="customerTitle">
									<option value="">Select Title</option>
									<option value="Mrs"<?=$mrsSelected;?>>Mrs</option>
									<option value="Mr"<?=$mrSelected;?>>Mr</option>
									<option value="Miss"<?=$missSelected;?>>Miss</option>
									<option value="Ms"<?=$msSelected;?>>Ms</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>Firstname</th>
							<td><input name="customerFirstName" type="text" value="<?= $_SESSION['jobSearchParams']['customerFirstName']; ?>" /></td>
						</tr>
						<tr>
							<th>Surname</th>
							<td><input name="customerSurname" type="text" value="<?= $_SESSION['jobSearchParams']['customerSurname']; ?>" /></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<th valign="top">Job Status</th>
							<td>
							<?php 
								$jobStatusArray = $this->fetchJobsStatusDetails();
								if (is_array($jobStatusArray)) { ?>
								
										<?php foreach ($jobStatusArray as $key=>$value) {
													$checked = '';
													if (is_array($_SESSION['jobSearchParams']['jobStatusId'])) {
														foreach ($_SESSION['jobSearchParams']['jobStatusId'] as $sessionJobStatusId) {
															if ($sessionJobStatusId ==  $jobStatusArray[$key]['jobStatusId']) $checked = ' checked ';
														}
													}
											 ?>
										<input type="checkbox" name="jobStatusId[]" value="<?=$jobStatusArray[$key]['jobStatusId'];?>"<?=$checked;?>><?=$jobStatusArray[$key]['jobStatus'];?><br />
										<?php } ?>
								
								<?php } ?>
							</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<?php
						//print "value is ".$_SESSION['jobSearchParams']['useVisitDate'];
						
						switch ($_SESSION['jobSearchParams']['useVisitDate']) {
							case 'false':
								//print "case false";
								$visitChecked = '';
								$useVisitValue = 'false';
								$display = ' none';
							break;
							case 'true':
								//print "case true";
								$visitChecked = ' checked ';
								$useVisitValue = 'true';
								$display = ' block';
							break;
							default:
								$useVisitValue = 'false';
								$display = ' none';
							break;
						}
						
						//if ($_SESSION['jobSearchParams']['useVisitDate'] == 'false') {
							//print "line 117 value is ".$_SESSION['jobSearchParams']['useVisitDate']."<br />";
							//$visitChecked = '';
						//}
						//else if ($_SESSION['jobSearchParams']['useVisitDate'] == 'true') 
						//	$visitChecked = ' checked ';
							//print "line 122 value is ".$_SESSION['jobSearchParams']['useVisitDate']."<br />";
						?>
						
						<tr>
							<th valign="top">Search Visit Dates <input type="checkbox" name="visitDateControl" <?=$visitChecked;?> onClick="OpenCloseDiv('visitDates'); changeFormBooleanValue('useVisitDate');"></th>
							<td>
								<div id ="visitDates" style="display:<?=$display;?>">
								<table>
									<tr>
										<td>From</td>
										<?php 
											$visitDateArray['fieldPrefix'] 		= 'visitDateFrom'; 
											$visitDateArray['selectedDay'] 		= $_SESSION['jobSearchParams']['day_visitDateFrom'];
											$visitDateArray['selectedMonth'] 	= $_SESSION['jobSearchParams']['month_visitDateFrom'];
											$visitDateArray['selectedYear'] 	= $_SESSION['jobSearchParams']['year_visitDateFrom'];
											
										?>
										<td><input type="hidden" name="useVisitDate" id="useVisitDate" value="<?=$useVisitValue;?>">
											<?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($visitDateArray);?>
										</td>
									</tr>
						
									<tr>
										<td>To</td>
										<?php
											$visitDateArray['fieldPrefix'] = 'visitDateTo'; 
											$visitDateArray['selectedDay'] 		= $_SESSION['jobSearchParams']['day_visitDateTo'];
											$visitDateArray['selectedMonth'] 	= $_SESSION['jobSearchParams']['month_visitDateTo'];
											$visitDateArray['selectedYear'] 	= $_SESSION['jobSearchParams']['year_visitDateTo'];
										
										?>
										<td><?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($visitDateArray);?></td>
									</tr>
								</table>
								</div>
								
								<?php if ($_SESSION['jobSearchParams']['useVisitDatee'] == 'false') { ?>
							<!--  <script>
							 	OpenCloseDiv('visitDates');
								changeFormBooleanValue('useVisitDate');
							 </script> -->
							 <?php } ?>
							 <strong></strong>
								
							</td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						<tr>
							<th valign="top">Visit Type</th>
							<td>
								<?php
									$visitTypesArray = $this->fetchVisitTypes();
									if (is_array($visitTypesArray)) { 							
										foreach ($visitTypesArray as $key=>$visits) {
											$checked = '';
											if (is_array($_SESSION['jobSearchParams']['visitTypeId'])) {
												foreach ($_SESSION['jobSearchParams']['visitTypeId']  as $visitTypeId) {
													if ($visitTypeId ==  $visitTypesArray[$key]['visitTypeId']) $checked = ' checked ';
												}
											}
											 ?>
										<input type="checkbox" name="visitTypeId[]" value="<?=$visitTypesArray[$key]['visitTypeId'];?>"<?=$checked;?>><?=$visitTypesArray[$key]['visitType'];?><br />
										<?php } ?>
								
								<?php } ?>
							</td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						
						<?php
							if  (is_array($_SESSION['jobSearchParams']['visitStatus'])) {
								foreach ($_SESSION['jobSearchParams']['visitStatus'] as $visitStatus) {
									if ($visitStatus == 'open') $openChecked = ' checked ';
									else if ($visitStatus == 'closed') $closedChecked = ' checked ';
								}
							}
						?>
						<tr>
							<th valign="top">Visit Status</th>
							<td>
								<input type="checkbox" name="visitStatus[]" value="open"<?=$openChecked;?>> Open <br />
								<input type="checkbox" name="visitStatus[]" value="closed"<?=$closedChecked;?>> Closed
							</td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						<?php
						if ($_SESSION['jobSearchParams']['useJobDates'] == 'false')  $jobChecked = '';
						else $jobChecked = ' checked ';
						?>
						<tr>
							<th valign="top">Search Job Dates <input type="checkbox" name="jobDateControl" <?=$jobChecked;?> onClick="OpenCloseDiv('jobDates'); changeFormBooleanValue('useJobDates');"></th>
							<td valign="top">
								<div id ="jobDates">
								<table>
									<tr>
										<td>From</td>
										<?php 
											$visitDateToArray['fieldPrefix'] = 'jobDateFrom'; 
											$visitDateToArray['selectedDay'] 	= $_SESSION['jobSearchParams']['day_jobDateFrom'];
											$visitDateToArray['selectedMonth'] 	= $_SESSION['jobSearchParams']['month_jobDateFrom'];
											$visitDateToArray['selectedYear'] 	= $_SESSION['jobSearchParams']['year_jobDateFrom'];
										?>
										<td><input type="hidden" name="useJobDates" id="useJobDates" value="true"><?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($visitDateToArray);?></td>
									</tr>
						
									<tr>
										<td>To</td>
										<?php 
											$visitDateToArray['fieldPrefix'] 	= 'jobDateTo'; 
											$visitDateToArray['selectedDay'] 	= $_SESSION['jobSearchParams']['day_jobDateTo'];
											$visitDateToArray['selectedMonth'] 	= $_SESSION['jobSearchParams']['month_jobDateTo'];
											$visitDateToArray['selectedYear'] 	= $_SESSION['jobSearchParams']['year_jobDateTo'];
										?>
										<td><?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($visitDateToArray);?></td>
									</tr>
									
									<?php
										if ($_SESSION['jobSearchParams']['jobDateCreated']  == 'yes')		$jobDateCreatedChecked 		= ' checked ';
										if ($_SESSION['jobSearchParams']['jobDateOpened']  == 'yes') 		$jobDateOpenedChecked 		= ' checked ';
										if ($_SESSION['jobSearchParams']['jobDateClosed']  == 'yes') 		$jobDateClosedChecked 		= ' checked ';
										if ($_SESSION['jobSearchParams']['jobItemOrderDate']  == 'yes') 	$jobItemOrderDateChecked 	= ' checked ';
										if ($_SESSION['jobSearchParams']['jobItemDeliveryDate']  == 'yes') 	$jobItemDeliveryDateChecked	= ' checked ';
									?>
									<tr>
										<td colspan="2"><br />Please Select the date types that you are interested in searching<br />
										
										<input type="checkbox" name="jobDateCreated"  value="yes"<?=$jobDateCreatedChecked;?>> Date Created <br />
										<input type="checkbox" name="jobDateOpened"  value="yes"<?=$jobDateOpenedChecked;?>> Date Opened <br />
										<input type="checkbox" name="jobDateClosed"  value="yes"<?=$jobDateClosedChecked;?>> Date Closed <br />
										<!-- <input type="checkbox" name="jobItemOrderDate"  value="yes"<?=$jobItemOrderDateChecked;?>> Item Order Date <br />
										<input type="checkbox" name="jobItemDeliveryDate" value="yes"<?=$jobItemDeliveryDateChecked;?>> Item Delivery Date <br /> -->
										
										</td>
									</td>
								</table>
								</div>
								<?php if ($_SESSION['jobSearchParams']['useJobDates'] == 'false') { ?>
							 <script>
							 	OpenCloseDiv('jobDates');
								changeFormBooleanValue('useJobDates');
							 </script>
							 <?php } ?>
							</td>
						</tr>
						
						<tr>
							<td colspan="2" align="right"><input name="searchJobs" type="image" src="/images/buttonSearch.gif" alt="Job Search" /></td>
						</tr>
					</table>
					</div>
					
				</form>