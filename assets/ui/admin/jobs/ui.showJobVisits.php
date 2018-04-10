<?php
	$visitTypesArray = $this->fetchVisitTypes();
	$jobVisitsArray = $this->fetchVisitsByJobId($this->job['jobId'],'visitDate');
	
 if (!strlen($_GET['print'])) { ?>

<h3 class="excludeForPrint"><a name="visits">Visit Details</a></h3>
<!-- user to be visitRecord -->
<div class="jobsAndVisits jobBoxesOuter">
<table class="jobsAndVisits jobBoxes" border="0">
<?php
	
	if (is_array($jobVisitsArray)) { 
		$visitIndex = 0; 							
		foreach ($jobVisitsArray as $key=>$visits) {
			++$visitIndex;
			$visitDateArray['fieldPrefix'] 		= $visitIndex.'_visitDate'; 
			$visitDateArray['selectedDay'] 		= $jobVisitsArray[$key]['visitDateDay'];
			$visitDateArray['selectedMonth'] 	= $jobVisitsArray[$key]['visitDateMonth'];
			$visitDateArray['selectedYear'] 	= $jobVisitsArray[$key]['visitDateYear'];
			$visitDateArray['showTime'] 		= true;
			$visitDateArray['selectedHour'] 	= $jobVisitsArray[$key]['visitDateHour'];
			$visitDateArray['selectedMinute'] 	= $jobVisitsArray[$key]['visitDateMinutes'];
			
			if ($jobVisitsArray[$key]['visitAttended'] == 'no') {
				$visitAttended = '';
				$visitNotAttended = ' checked ';
			}
			else if ($jobVisitsArray[$key]['visitAttended'] == 'yes') {
				$visitNotAttended = '';
				$visitAttended = ' checked ';
			}
			
			if ($jobVisitsArray[$key]['visitStatus'] == 'open') {
				$visitDisplay = 'block';
				$openCloseText = 'Open/Close';
				$visitDisplayText = '(Open)';
			}
			else if ($jobVisitsArray[$key]['visitStatus'] == 'closed')  {
			$visitDisplay = 'none';
			$openCloseText = 'Open/Close';
			$visitDisplayText = '(Closed)';
			} ?>
	<tr>
		<th valign="top" align="left" width="90%">Visit No: <?=$visitIndex;?> <?=$visitDisplayText;?></th>
		<th valign="top" align="right" class="openCloseVisit" nowrap><a href="#visits" onClick="OpenCloseDiv('jobVisit_<?=$visitIndex;?>');"><?=$openCloseText;?></a></th>
	<tr>
		<td colspan="2">
			<table class="jobVisit" id="jobVisit_<?=$visitIndex;?>" style="display:<?=$visitDisplay;?>;" border="0">
				<tr>
					<th valign="top" colspan="2" align="left">Visit No: <?=$visitIndex;?></th>
					<th valign="top" align="right" colspan="3">Visit ID: <?=$jobVisitsArray[$key]['visitId'];?></th>
				</tr>
				
				<tr class="jobVisitHeader">
					<th valign="middle" colspan="2">&nbsp;Visit Date</th>
					<th valign="middle" align="center">Visit Attended</th>
					<th valign="middle" align="center" colspan="2">
					
					
					
					
		<?php if ($this->userArray["userType"] == 'admin') { ?>
				<input name="updateJob" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
		<?php } 
		else {
			if ($_SESSION['user']['modifyPermission'] == 'no') { ?>
				<img src="/images/buttonLocked.jpg"  class="excludeForPrint" alt="No Update Allowed" title="No Update Allowed"/>
			<?php }
			else {
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<input name="updateJob" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
		<?php } 
		else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<img src="/images/buttonLocked.jpg" alt="No Update Allowed" title="No Update Allowed"/>
		<?php }  }
		} ?>
			
					
					
					
					
					
					
					
					</th>
				</tr>
			
				<tr>
					<td valign="top" colspan="2"><?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($visitDateArray);?>
					<br />
					<input type="text" name="<?=$visitIndex;?>_visitDateText" value="<?=$jobVisitsArray[$key]['visitDateText'];?>" />
					</td>
					<td valign="top" align="center">No<input type="radio" name="<?=$visitIndex;?>_visitAttended" value="no" <?=$visitNotAttended;?>/>&nbsp;Yes<input type="radio" name="<?=$visitIndex;?>_visitAttended" value="yes" <?=$visitAttended;?>/></td>
					<td></td>
					<td></td>
				</tr>
	
				<tr><td>&nbsp;</td></tr>
				<tr class="jobVisitHeader">
					<th valign="middle" align="center">Type</th>
					<th valign="middle" align="center">Visit Details</th>
					<th valign="middle" align="center">Visit Outcome</th>
					<th valign="middle" align="center">Status</th>
					<th valign="middle" align="center">Delete</th>	
				</tr>
				<tr>
					<td valign="top">
<?php
if (is_array($visitTypesArray)) { 
	$visitTypeChecked = '';
	foreach ($visitTypesArray as $key2=>$value2) { 
		$visitTypeChecked = '';
		if ($visitTypesArray[$key2]['visitTypeId'] == $jobVisitsArray[$key]['visitTypeId']) $visitTypeChecked = ' checked ';
?>
<input type="radio" name="<?=$visitIndex;?>_visitTypeId" value="<?=$visitTypesArray[$key2]['visitTypeId'];?>" <?=$visitTypeChecked;?>/><?=$visitTypesArray[$key2]['visitType'];?><br />
<?php	} } ?>
					</td>
					<td valign="top"><textarea  cols="40" rows="15" name="<?=$visitIndex;?>_visitNotes"><?=$jobVisitsArray[$key]['visitNotes'];?></textarea></td>
					<td valign="top"><textarea cols="40" rows="15" name="<?=$visitIndex;?>_visitOutcome"><?=$jobVisitsArray[$key]['visitOutcome'];?></textarea></td>
					<td valign="top">
<?php 	
if ($jobVisitsArray[$key]['visitStatus'] == 'open') {
	$openChecked = ' checked ';
	$closedChecked = ''; 
}
else if ($jobVisitsArray[$key]['visitStatus'] == 'closed') {
	$closedChecked = ' checked '; 
	$openChecked = '';
}
?>
<input type="radio" name="<?=$visitIndex;?>_visitStatus" value="open"<?=$openChecked;?>>Open <br />
<input type="radio" name="<?=$visitIndex;?>_visitStatus" value="closed"<?=$closedChecked;?>>Closed
					</td>
					<td valign="top" align="right">
						<!-- <a href="/admin/jobs/jobedit/?jobId=<?=$this->job['jobId'];?>&removeVisit=true&visitId=<?=$jobVisitsArray[$key]['visitId'];?>#visits" alt="Delete Visit" title="Delete Visit"><img src="/images/trashcan.jpg" /></a> -->
						
						<?php 
					
					if ($_SESSION['user']['userType'] == 'admin') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete Visit?','/admin/jobs/jobedit/?jobId=<?=$this->job['jobId'];?>&removeVisit=true&visitId=<?=$jobVisitsArray[$key]['visitId'];?>#visits');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
		else {
			if ($_SESSION['user']['deletePermission'] == 'no') { ?>
								<img src="/images/noTrashcan.jpg" al="No Delete Allowed" />
								<?php } else { 
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete Visit?','/admin/jobs/jobedit/?jobId=<?=$this->job['jobId'];?>&removeVisit=true&visitId=<?=$jobVisitsArray[$key]['visitId'];?>#visits');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
			else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<a>No Update allowed</a>
			<?php } }
		
		} ?>
						
						
						
						
						
						
<input type="hidden" name="<?=$visitIndex;?>_visitId" value="<?=$jobVisitsArray[$key]['visitId'];?>" />
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				</table>

<?php } ?>
<input type="hidden" name="visitIndex" value="<?=$visitIndex;?>" />
			
			
			
			
			
<?php } ?>
		</td>
	</tr>
	<tr class="visitsBackground">
		<td colspan="2">
			<?php if ($_SESSION['user']['writePermission'] == 'yes') { ?>
			&nbsp;Add New Visit <input type="checkbox" onClick="OpenCloseDiv('addNewVisit');"/> <br /> <?php } ?>
			<table border="0" id="addNewVisit">
				<tr><th>Visit Type</th><th>Visit Date</th></tr>
				<tr>
					<td valign="top">
					<?php
					$visitTypesArray = $this->fetchVisitTypes();
					if (is_array($visitTypesArray)) {  ?>
					<select name="newVisitTypeId"> <?php							
					foreach ($visitTypesArray as $key=>$visits) {
					
					?>
					<option  value="<?=$visitTypesArray[$key]['visitTypeId'];?>"<?=$checked;?>><?=$visitTypesArray[$key]['visitType'];?></option>
					<?php } ?>
					</select>
					<?php } ?>
					</td>
					<?php
					$newVisitDateArray['fieldPrefix'] = 'newVisitDate'; 
					$newVisitDateArray['showTime'] = true; 
					?>
					<td valign="top"><?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($newVisitDateArray);?></td>
					<td valign="top">
						<input type="image" name="addNewVisit" value="true" src="/images/buttonGo.gif" />
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</div>

<?php } else { 
	if (is_array($jobVisitsArray)) { 
		$visitIndex = 1; 							
		foreach ($jobVisitsArray as $key=>$visits) { 
		//var_dump($visits);
		?>
		<div class="itemWrap">
<table class="includeForPrint printGeneral item" cellspacing="0" cellpadding="5" width="800" border="0">
		
		<tr>
			<th class="red">Visit <?=$visitIndex;?>&nbsp;</th>
			<td colspan="3"><?= $item['itemType']; ?>&nbsp;</td>
		</tr>
		
		<tr>
			<th valign="top" style="width: 200px;">Visit Date:</th>
			<td valign="top" style="width: 200px;"><?=$visits['visitDateFormated'];?>&nbsp;</td>
			<th style="width: 200px;">Visit Type:</th>
			<td valign="top" style="width: 200px;"><?=$visits['visitType'];?> - <?=$visits['visitTypeText'];?>&nbsp;</td>
			<th valign="top" style="width: 200px;">Visit Attended:</th>
			<td valign="top" style="width: 200px;"><?=$visits['visitAttended'];?>&nbsp;</td>
		</tr>
		
		<!-- <tr>
			<th>Visit Attended:</th>
			<td colspan="3"><?=$visits['visitAttended'];?>&nbsp;</td>
			
		</tr> -->
		
		<!-- <tr>
			<th colspan="4">Visit Details:</th>
		</tr>
		<tr>
			<td colspan="4"><p class="asIs"><?=nl2br($visits['visitNotes']);?></p>&nbsp;</td>
		</tr>
		
		<tr>
			<th colspan="4">Visit Outcome:</th>
		</tr>
		<tr>
			<td colspan="4"><p class="asIs"><?=nl2br($visits['visitOutcome']);?></p>&nbsp;</td>
		</tr> -->
		
		 <tr>
			<th>Visit Details:</th><td><p class="asIs"><?=nl2br($visits['visitNotes']);?></p></td>
		 </tr>
		 <tr>
		 	<th>Visit Outcome:</th><td><p class="asIs"><?=nl2br($visits['visitOutcome']);?></p></td>
		 </tr>
			
	</table>
	</div>
		
		<?php
			++$visitIndex;
		 } } } ?>