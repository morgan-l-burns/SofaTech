<form action="/admin/jobs/jobedit/" method="post" enctype="multipart/form-data">
	<input name="jobId" type="hidden" value="<?= $this->job['jobId']; ?>" />
	
	<a href="/admin/jobs/jobedit/?jobId=<?= $this->job['jobId']; ?>&print=true" target="_blank" id="printIcon">Printable Version<img src="/images/icon_print.gif" /></a>
	<h3 class="excludeForPrint"><a name="general">General Details</a></h3>
	
	<?php 
		$allJobStatusArray = $this->fetchJobsStatusDetails();
		$jobStatusArray = $this->fetchJobsStatusDetailsByID($this->job['jobStatusId']); 
		//var_dump($this->job);
		$clientArray = $this->__ALL_MODULES['customers']->fetchClientById($this->job['jobClientId']);
		//var_dump($clientArray);
	?>
<!-- print version -->

<?php //var_dump($this->job); ?>
	<table class="includeForPrint printGeneral" cellspacing="0" cellpadding="5" width="800" border="1">
		<tr>
			<th valign="top" style="width: 200px;">Company:</th>
			<td valign="top" style="width: 200px;"> <?=$this->job['clientName'];?></td>
			<th style="width: 200px;">Request Date:</th>
			<td valign="top" style="width: 200px;"><?=$this->job['jobDateCreatedFormated'];?></td>
		</tr>
		<tr>
			<th>Your Ref:</th>
			<td><?= $this->job['jobReference']; ?></td>
			<th>Our Ref:</th>
			<td><?= $this->job['jobId']; ?></td>
		</tr>
		<tr>
			<th>Customer:</th>
			<td>
			<?=$this->job['customerTitle'];?> 
			<?=$this->job['customerFirstName'];?> 
			<?=$this->job['customerMiddleNames'];?> 
			<?=$this->job['customerSurname'];?> 
			&nbsp;
			
			</td>
			<th>Created By:</th>
			<td><?=$this->job['userName'];?>&nbsp;</td>
		</tr>
		<tr>
			<th>Address:</th>
			<td colspan="3">
				<?=$this->job['customerAddressLine1'];?>, 
				<?=$this->job['customerAddressLine2'];?>,
				<?=$this->job['customerAddressLine3'];?>,
				<?=$this->job['customerAddressTownCity'];?>,
				<?=$this->job['customerAddressCounty'];?>,
				<?=$this->job['customerAddressCountry'];?>,
				<?=$this->job['customerAddressPostCode'];?>
				&nbsp;
			</td>
		</tr>
		
		<tr>
			<th>Phone (1,2,Mobile):</th>
			<td colspan="3">(tel1:)<?=$this->job['customerTelephone1'];?>, (tel2:) <?=$this->job['customerTelephone2'];?>, (mobile:) <?=$this->job['customerMobile'];?> </td>
			<!--<th>Phone 2:</th>
			<td><?=$this->job['customerTelephone2'];?> &nbsp;<br /></td> -->
		</tr>
		<!-- <tr>
			<th>Mobile:</th>
			<td colspan="3"><?=$this->job['customerMobile'];?> &nbsp;<br /></td>
		</tr> -->
		
	</table>
	
	
	<?php if (!strlen($_GET['print'])) { ?>
	
	<div class="jobsAndVisits jobBoxesOuter">
	
	
	
	<table class="jobsAndVisits jobBoxes" border="0">
		<tr>
			<td valign="top" colspan="2">
				<table class="jobStatus">
					<tr class="jobStatusHeader">
						<th>&nbsp;Job Status</th>
						<td>
					
						&nbsp;<b><?=$jobStatusArray['jobStatus'];?></b>
						
						</td>
					</tr>
					
					<tr>
						<th>Date Created</th>
						<td><?=$this->job['jobDateCreatedFormated'];?> By: <?= $this->job['userName']; ?> - (<?= $this->job['clientName']; ?>)</td>
					</tr>
					
					<?php 
					
					//print "action is ".$this->job['JobStatusAction']."<br />";
					if ($this->job['JobStatusAction'] == 'open') {  ?>
					<tr>
						<th>Date Opened</th>
						<td><?=$this->job['jobDateOpenedFormated'];?> by: <?= $this->job['jobOpenedBy']; ?></td>
					</tr>
					<?php } else if ($this->job['JobStatusAction'] == 'close') { ?>
					<tr>
						<th>Date Opened</th>
						<td><?=$this->job['jobDateOpenedFormated'];?> by: <?= $this->job['jobOpenedBy']; ?></td>
					</tr>
					
					<tr>
						<th>Date Closed</th>
						<td><?=$this->job['jobDateClosedFormated'];?> by: <?= $this->job['jobClosedBy']; ?></td>
					</tr>
		
					<?php } ?>
					
					
					<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
					<tr>
						<th>Open Job</th>
						<td><input type="checkbox" name="openJob" value="yes" />
					</tr>
					<tr>
						<th>Close Job</th>
						<td><input type="checkbox" name="closeJob" value="yes" />
					</tr>
					<?php
						if ($this->job['jobAllowDelete'] == 'yes') {
							$jobAllowDeleteYesChecked = ' checked';
						}
						else if ($this->job['jobAllowDelete'] == 'no') {
							$jobAllowDeleteNoChecked = ' checked';
						}
						
						if ($this->job['jobAllowUpdate'] == 'yes') {
							$jobAllowUpdateYesChecked = ' checked';
						}
						else if ($this->job['jobAllowUpdate'] == 'no') {
							$jobAllowUpdateNoChecked = ' checked';
						}
					?>
					<tr>
						<th>Allow Delete Job</th>
						<td><input type="radio" name="jobAllowDelete" value="yes" <?=$jobAllowDeleteYesChecked;?>/>Yes&nbsp;<input type="radio" name="jobAllowDelete" value="no" <?=$jobAllowDeleteNoChecked;?>/>No
					</tr>
					<tr>
						<th>Allow Update Job</th>
						<td><input type="radio" name="jobAllowUpdate" value="yes" <?=$jobAllowUpdateYesChecked;?>/>Yes&nbsp;<input type="radio" name="jobAllowUpdate" value="no" <?=$jobAllowUpdateNoChecked;?>/>No
					</tr>
					<tr>
						<td colspan="2" align="right">
						
					<input name="updateJob" class="excludeForPrint" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
					
						</td>
					</tr>
					<?php } ?> 
					
				</table>
			</td>
		</tr>
						
		<?php if ($this->userArray["userType"] == 'admin') { 
			$allClients = $this->__ALL_MODULES['users']->fetchAllClients();
		?>
						
		<tr><td>&nbsp;</td></tr>
		<tr>
			<th valign="top" style="width:210px;">Client</th>
			<td>
				
					
					
					<?php 
					if ($_SESSION['user']['userType'] == 'admin'){ 
					
					
					if (is_array($allClients)) {
						foreach ($allClients as $key=>$client) { 
							$checked = '';
							if ($this->job['clientId'] == $client['clientId']) $checked = ' checked ';
							else $checked = '';	
						?>
							<input type="radio" name="jobClientId" value="<?= $client['clientId']; ?>"<?=$checked;?>><?= $client['clientName']; ?><br />
					<?php }
					} 
					}
					else { ?>
					<input type="hidden" name="jobClientId" value="<?=$this->job['jobClientId'];?>" />
					<?php } ?>
				
			</td>
		</tr>
		
		<tr><td>&nbsp;</td></tr>
			
		<?php } ?>
		
		<tr>
			<th>Job Reference ID </th>
			<td><?= $this->job['jobId']; ?></td>
		</tr>
		<tr>
			<th>Job Reference</th>
			<td><input name="jobReference" type="text" value="<?= $this->job['jobReference']; ?>" /></td>
		</tr>
		<tr>
			<th>Technician Name</th>
			<td><input name="jobTechnicianName" type="text" value="<?= $this->job['jobTechnicianName']; ?>" /></td>
		</tr>
		<!-- <tr>
			<th>Imputer Name</th>
			<td><?= $_SESSION['loginUserName']; ?></td>
		</tr> -->
		<tr><td>&nbsp;</td></tr>
		
		<tr>
			<td colspan="2" align="right">
		<?php if ($this->userArray["userType"] == 'admin') { ?>
				<input name="updateJob"  class="excludeForPrint" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
		<?php } 
		else {
			if ($_SESSION['user']['modifyPermission'] == 'no') { ?>
				<img src="/images/buttonLocked.jpg"  class="excludeForPrint" alt="No Update Allowed" title="No Update Allowed"/>
			<?php }
			else {
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<input name="updateJob"  class="excludeForPrint" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
		<?php } 
		else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<img src="/images/buttonLocked.jpg"  class="excludeForPrint" alt="No Update Allowed" title="No Update Allowed"/>
		<?php } }
		} ?>
			</td>
		</tr>
	</table>
	</div>
	
	<?php } ?>
	<?php if (!strlen($_GET['print'])) { ?>						
		<?php $this->showJobCustomerDetails($this->job); ?> 	
	<?php } ?>					
	
	<?php $this->displayJobItems($this->job['jobId']); ?>
    <?php $this->showJobVisits($this->job['jobId']); ?>
	
	
	
	
	<?php if (strlen($_GET['print'])) { ?>
	
		<h3 class="includeForPrint">I can confirm that I have examined the goods and the work has been completed to my satisfaction</h3>
		
		<table class="includeForPrint printGeneral" cellspacing="0" cellpadding="5" width="800" border="1">
		<tr>
			<th style="width: 325px;">Customer Signature:</th>
			<th style="width: 200px; height:50px;">Time &amp Date:</th>
			<th style="width: 275px;">Technician name:</th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td style="height:30px;">&nbsp;</td>
			<td valign="top"><?=$this->job['jobTechnicianName'];?>&nbsp;</td>
		</tr>
		
	</table>
	<? } ?>
	

</form>