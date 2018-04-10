<?php
	$user = $this->__ALL_MODULES['users']->fetchUser(array('userId' => $_SESSION['userId']));
	
	
	if ($user['userType'] == 'admin') {
		$clients = $this->__ALL_MODULES['users']->fetchUser(array('userType' => 'client'));
	}
	
	//$this->collectJobSearchParameters($_POST);
?>
<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Job Search'); ?>

<body class="green">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('jobs'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml(); ?>

		<?php
		//var_dump($_SESSION['user']);
		
		 if (!$_SESSION['user']['displayWelcomeMessage']) { ?>
		<div id="welcome">
			<?=$_SESSION['user']['userMessage'] ? $_SESSION['user']['userMessage'] : $_SESSION['user']['clientMessage']; ?>
		</div>
		<?php 
			$_SESSION['user']['displayWelcomeMessage'] = true;
		} ?>
		
		<?= $this->__ALL_MODULES['jobs']->displayJobSubNavigationHtml(); ?>


		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="#">Jobs &amp; Visits</a> &raquo;</li>
				<li><a href="#">Search Jobs</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->
		
		
		<?= $this->__ALL_MODULES['jobs']->displayJobViewingsCalendarHtml(); ?>
	
	

		<!-- begin main contents -->
		<div id="mainContentCentre">

			<!-- <h2>Search Jobs</h2> -->


			<!-- begin product results -->
			<div id="prodResults">
	
		
				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>

					<h3><a name="searchResults">Job Search Results</a></h3>
					

					<p class="message">All of the customers jobs are listed below.  You can manage them with the buttons to the right of each one, or with the Jobs tab above.</p><br />

					<?php
						
						$startAt = $_GET['startAt'] ? $_GET['startAt'] : 0;
						$next = ($startAt + $this->__ALL_MODULES['config']->pagination);
						$nextUrl = '/admin/jobs/jobsearch/?startAt='.$next;
						if (strlen($_GET['date'])) $nextUrl .= '&date='.$_GET['date'];
						$nextUrl .= '#searchResults';
						
						
						$previous = ($startAt - $this->__ALL_MODULES['config']->pagination);
						if ($previous < 0) $previous = 0;
						$previousUrl = '/admin/jobs/jobsearch/?startAt='.$previous;
						if (strlen($_GET['date'])) $previousUrl .= '&date='.$_GET['date'];
						$previousUrl .= '#searchResults';
						
						$pages = $this->jobs['count'] / $this->__ALL_MODULES['config']->pagination;
						$remainder = $this->jobs['count'] % $this->__ALL_MODULES['config']->pagination;
						if ($remainder > 0) {
							settype ($pages, "integer");
							++$pages;
						}
						$currentPage = ($startAt / $this->__ALL_MODULES['config']->pagination) +1;
						//print "current page is $currentPage pages is $pages and remainder is $remainder <br />";
					?>

					<table id="searchResults" cellpadding="10" class="jobsAndVisits">
						<tr>
							<td><?=$this->jobs['count'];?> Jobs found<br />
							ASC = Ascending, DESC = Descending
							</td>
						</tr>
					</table> 
					
					<table class="jobsAndVisits" id="jobsPagination">
						<tr>
							<td align="left" id="paginationPreviousImage"><?php
								if ($startAt > 0) { ?>
							<a href="<?=$previousUrl;?>"><img src="/images/prevlabel.gif"></a>
							<?php } ?>
							</td>
							
							
							<td align="center">
							<?php 
							if (strlen($_GET['date'])) $addition = '&date='.$_GET['date'];
							if ($pages > 1) {
							for ($i=0; $i< $pages; ++$i) {
								if ($currentPage == ($i + 1)) {
									$class = ' class="paginationlinkSelected" ';
								}
								else $class = '';
							 ?>
							<a href="/admin/jobs/jobsearch/?startAt=<?=($i * $this->__ALL_MODULES['config']->pagination)?><?=$addition;?>#searchResults"<?=$class;?>>Page <?=($i + 1);?></a>
							<?php if ($i + 1 < $pages) { ?> | <?php } ?>
							<?php } } ?>
							</td>
							
							
							<td align="right" id="paginationNextImage">
							<?php
							if ($next < $this->jobs['count']) { ?>
							<a href="<?=$nextUrl;?>"><img src="/images/nextlabel.gif"></a>
							<?php } ?>
							</td>
						</tr>
					</table> 
					
					<?php 
					
					
					
					if (is_array($this->jobs['jobs'])) { 	
						$order = $_SESSION['jobSearchParams']['orderType'][$_SESSION['jobSearchParams']['order']] ? $_SESSION['jobSearchParams']['orderType'][$_SESSION['jobSearchParams']['order']] : 'DESC';
						${$_SESSION['jobSearchParams']['order'].'Order'} = '('.$order.')';
					?>
					
					<table id="jobSearchTable" class="jobsAndVisits" cellspacing="5">
						<tr>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=jobId&t=<?=time();?>#searchResults" title="Sort by Reference" alt="Sort by reference">Ref ID<?=$jobIdOrder;?></a></th>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=jobClientId&t=<?=time();?>#searchResults" title="Sort by Client" alt="Sort by Client">Client <?=$jobClientIdOrder;?></a></th>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=jobUserId&t=<?=time();?>#searchResults" title="Sort by User" alt="Sort by User">User <?=$jobUserIdOrder;?></a></th>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=jobStatus&t=<?=time();?>#searchResults" title="Sort by Status" alt="Sort by Status">Status <?=$jobStatusOrder;?></a></th>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=jobReference&t=<?=time();?>#searchResults" title="Sort by There Reference" alt="Sort by There Reference">Ref <?=$jobReferenceOrder;?></a></th>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=customerTitle&t=<?=time();?>#searchResults" title="Sort by Title" alt="Sort by Title">Title <?=$customerTitleOrder;?></a></th>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=customerSurname&t=<?=time();?>#searchResults" title="Sort by Surname" alt="Sort by Surname">Surname <?=$customerSurnameOrder;?></a></th>
							<th valign="top"><a href="/admin/jobs/jobsearch/?searchby=customerAddressPostCode&t=<?=time();?>#searchResults" title="Sort by Postcode" alt="Sort by Postcode">Postcode <?=$customerAddressPostCodeOrder;?></a></th>
							<th valign="top" class="visitsBackground">Visits</th>
							<th valign="top" width="37">Edit Job</th>
							<th valign="top" width="37">Delete Job</th>
						</tr>

						<?php 
							
							foreach ($this->jobs['jobs'] as $job) { 
								$visitIndex = 0;
								$jobVisitisArray = $this->fetchVisitsByJobId($job['jobId']);
						
						?>
							<tr class="even">
								<td valign="top"><?=$job['jobId']; ?></td>
								<td valign="top"><?=$job['clientName']; ?></td>
								<td valign="top"><?=$job['userName']; ?></td>
								<td valign="top"><?=$job['jobStatus']; ?></td>
								<td valign="top"><?=$job['jobReference']; ?></td>
								<td valign="top"><?=$job['customerTitle']; ?></td>
								<td valign="top"><?=$job['customerSurname']; ?></td>
								<td valign="top"><?=$job['customerAddressPostCode']; ?></td>
								<td valign="top" class="visitsBackground">
									<table class="visitsTable" border="0">
										<tr>
											<th valign="top" align="left">No.</th>
											<th valign="top" width="80%" align="left">Date</th>
											<th valign="top" align="left">Type</th>
											<th valign="top" align="left">Status</th>
										</tr>
										<?php
										if (is_array($jobVisitisArray)) {
											foreach ($jobVisitisArray as $key=>$value) { 
												++$visitIndex;
											?>
										
										<tr>
											<td valign="top"><?=$visitIndex;?></td>
											<td valign="top"><?=$jobVisitisArray[$key]['visitDateFormated'];?></td>
											<td valign="top"><?=$jobVisitisArray[$key]['visitType'];?></td>
											<td valign="top"><?=$jobVisitisArray[$key]['visitStatus'];?></td>
										</tr>
										
										<?php } } ?>
									</table>
								</td>

								<td valign="top">
								<?php if ($_SESSION['user']['readPermission'] == 'no') { ?>
								<img src="/images/noEdit.jpg" al="editing not permitted" />
								<?php } else { ?>
								<form action="/admin/jobs/jobedit/" method="post"><input name="jobId" type="hidden" value="<?= $job['jobId']; ?>" />
									<input name="editJob" type="image" src="/images/edit.jpg" alt="Edit Job" />
								</form>
								<?php } ?>
								</td>
								<td valign="top">
								
								
									<?php
									if ($user["userType"] == 'admin') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete Job <?= $job['jobReference']; ?>?','/admin/jobs/jobsearch/?deleteJob=true&jobId=<?=$job['jobId'];?>');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
		else {
			 if ($_SESSION['user']['deletePermission'] == 'no') { ?>
								<img src="/images/noTrashcan.jpg" al="No Delete Allowed" />
								<?php } else { 
			if ($job['jobAllowDelete'] == 'yes') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete Job <?= $job['jobReference']; ?>?','/admin/jobs/jobsearch/?deleteJob=true&jobId=<?=$job['jobId'];?>');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
		else if ($job['jobAllowDelete'] == 'no') { ?>
				<img src="/images/noTrashcan.jpg" alt="No Delete Allowed" title="No Delete Allowed"/>
		<?php } }
		} ?>
								
								
								
									<!-- <a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete Job <?= $job['jobReference']; ?>?','/admin/jobs/jobsearch/?deleteJob=true&jobId=<?=$job['jobId'];?>');"><img src="/images/trashcan.jpg" /></a> -->
								
								<!-- 	<form action="/admin/jobs/jobdelete/" method="post">
										<input name="jobId" type="hidden" value="<?= $job['jobId']; ?>" /><input name="deleteJob" type="image" src="/images/trashcan.jpg" alt="Delete Job" onClick="return confirm('Are you sure you want to delete <?= $job['jobReference']; ?>?')" />
								
								</form> -->
								</td>
							</tr>
						<?php } ?>

					</table>
					<table class="jobsAndVisits" id="jobsPagination">
						<tr>
							<td align="left" id="paginationPreviousImage"><?php
								if ($startAt > 0) { ?>
							<a href="<?=$previousUrl;?>"><img src="/images/prevlabel.gif"></a>
							<?php } ?>
							</td>
							
							
							<td align="center">
							<?php 
							if (strlen($_GET['date'])) $addition = '&date='.$_GET['date'];
							if ($pages > 1) {
							for ($i=0; $i< $pages; ++$i) {
								if ($currentPage == ($i + 1)) {
									$class = ' class="paginationlinkSelected" ';
								}
								else $class = '';
							 ?>
							<a href="/admin/jobs/jobsearch/?startAt=<?=($i * $this->__ALL_MODULES['config']->pagination)?><?=$addition;?>#searchResults"<?=$class;?>>Page <?=($i + 1);?></a> | 
							<?php } } ?>
							</td>
							
							
							<td align="right" id="paginationNextImage">
							<?php
							if ($next < $this->jobs['count']) { ?>
							<a href="<?=$nextUrl;?>"><img src="/images/nextlabel.gif"></a>
							<?php } ?>
							</td>
						</tr>
					</table> 
				<?php } 
				//} 
				?>

				<?=$this->__ALL_MODULES['jobs']->displayJobSearchPanel($user, $clients); ?>
				
			
			
				<p class="message"><br />Fill in any of the fields above to filter the search results by that information.  If the search results are still too large, try filling in additional fields to further filter the results.</p>
				<p style="height:200px; width:700px;"></p>



			</div>
			<!-- end product results -->


		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>

	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>