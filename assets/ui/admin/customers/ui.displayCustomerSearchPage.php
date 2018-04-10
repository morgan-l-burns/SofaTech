<?php
	if ($_SESSION['user']['userType'] == 'admin') {
		$clients = $this->__ALL_MODULES['users']->fetchAllClients();
	}
	if ($this->status !== 'success' && $this->status !== 'failed') {
		// No search has been performed so get some default results
		if ($_SESSION['user']['userType'] == 'admin') {
			//print "admin user";
			$this->customers = $this->__ALL_MODULES['customers']->fetchCustomers();
		} else {
		//var_dump($_SESSION['user']);
			$this->customers = $this->__ALL_MODULES['customers']->fetchCustomers(array('customerClientId' => $_SESSION['user']['clientId']));
		}
	}
?>
<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Customer Search'); ?>

<body class="blue"">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('customers'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml(); ?>

		<?= $this->__ALL_MODULES['customers']->displayCustomerSubNavigationHtml(); ?>


		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="#">Customers</a> &raquo;</li>
				<li><a href="#">Search Customers</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2><a name="searchResults">Search Customers</a></h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<?php if (is_array($this->customers) && count($this->customers)) { ?>

					<!-- Calculate the pagination values -->
					<?php
						$startAt = $_GET['startAt'] ? $_GET['startAt'] : 0;
						$next = $startAt + $this->__ALL_MODULES['config']->pagination;
						$nextUrl = '/admin/customers/customersearch/?startAt='.$next;
						$nextUrl .= '#searchResults';

						$previous = max(0, $startAt - $this->__ALL_MODULES['config']->pagination);
						$previousUrl = '/admin/customers/customersearch/?startAt='.$previous;
						$previousUrl .= '#searchResults';

						$pages = ceil(count($this->customers) / $this->__ALL_MODULES['config']->pagination);
						$currentPage = ($startAt / $this->__ALL_MODULES['config']->pagination) + 1;
					?>

					<!-- Display the number of results found -->
					<table class="customers" id="searchResults" cellpadding="10">
						<tr>
							<td><?= count($this->customers); ?> customers found<br />
								ASC = Ascending, DESC = Descending
							</td>
						</tr>
					</table> 

					<!-- Display the pagination controls -->
					<table class="customers" id="jobsPagination">
						<tr>
							<td align="left" id="paginationPreviousImage">
								<?php if ($startAt) { ?>
									<a href="<?= $previousUrl; ?>"><img src="/images/prevlabel.gif"></a>
								<?php } ?>
							</td>

							<td align="center">
								<?php if ($pages > 1) {
									for ($i = 0; $i < $pages; ++$i) {
										if ($currentPage == ($i + 1)) {
											$class = ' class="paginationlinkSelected" ';
										} else {
											$class = '';
										} ?>
										<a href="/admin/customers/customersearch/?startAt=<?= $i * $this->__ALL_MODULES['config']->pagination; ?>#searchResults"<?= $class; ?>>Page <?= $i + 1; ?></a>
										<?php if ($i + 1 < $pages) { ?> | <?php } ?>
									<?php }
								} ?>
							</td>

							<td align="right" id="paginationNextImage">
								<?php if ($next < count($this->customers)) { ?>
									<a href="<?= $nextUrl; ?>"><img src="/images/nextlabel.gif"></a>
								<?php } ?>
							</td>
						</tr>
					</table>

					<!-- Get the sort order -->
					<?php
						$order = $_SESSION['customerSearchOrderParams']['orderType'] ? $_SESSION['customerSearchOrderParams']['orderType'] : 'DESC';
						${$_SESSION['customerSearchOrderParams']['order'].'Order'} = '('.$order.')';
					?>
					
					<div class="customerBoxesOuter">
					<table class="customers customerBoxes" id="jobCustomerTable" cellspacing="5"  border="0">
						<tr>
							<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
								<th valign="top" width="50%"><a href="/admin/customers/customersearch/?searchby=customerClientId&t=<?= time(); ?>#searchResults" title="Sort by Client Name" alt="Sort Client Name">Client Name <?=$customerClientIdOrder;?></a></th>  
							<?php } ?>
							<th valign="top"><a href="/admin/customers/customersearch/?searchby=customerId&t=<?= time(); ?>#searchResults" title="Sort by ID" alt="Sort by ID">ID <?=$customerIdOrder;?></a></th>
							<th valign="top"><a href="/admin/customers/customersearch/?searchby=customerReference&t=<?= time(); ?>#searchResults" title="Sort by Reference" alt="Sort by Reference">Reference <?=$customerReferenceOrder;?></a></th>
							<th valign="top"><a href="/admin/customers/customersearch/?searchby=customerTitle&t=<?= time(); ?>#searchResults" title="Sort by Title" alt="Sort by Title">Title <?=$customerTitleOrder;?></a></th>
							<th valign="top"><a href="/admin/customers/customersearch/?searchby=customerFirstName&t=<?= time(); ?>#searchResults" title="Sort by First Name" alt="Sort by First Names">First Name <?=$customerFirstNameOrder;?></a></th>
							<th valign="top"><a href="/admin/customers/customersearch/?searchby=customerMiddleNames&t=<?= time(); ?>#searchResults" title="Sort by Middle Names" alt="Sort by Middle Names">Middle Names <?=$customerMiddleNamesOrder;?></a></th>
							<th valign="top"><a href="/admin/customers/customersearch/?searchby=customerSurname&t=<?= time(); ?>#searchResults" title="Sort by Surname" alt="Sort by Surname">Surname <?=$customerSurnameOrder;?></a></th>
							<th valign="top"><a href="/admin/customers/customersearch/?searchby=customerAddressPostCode&t=<?= time(); ?>#searchResults" title="Sort by Postcode" alt="Sort by Postcode">Postcode <?=$customerAddressPostCodeOrder;?></a></th>
							<th valign="top" width="37">Edit Customer</th>
							<th valign="top" width="37">Delete Customer</th>

							<?php if ($_SESSION['redirect']['redirectType']) { ?>
								<th valign="top">Select</th>
							<?php } ?>
						</tr>

						<?php for ($i = $startAt; $i < $next; $i++) {
							if ($i >= count($this->customers)) {
								continue;
							} else {
								$customer = $this->customers[$i];
							} ?>
							<tr class="even">
								<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
									<td valign="top"><?= $customer['clientName']; ?></td>
								<?php } ?>
								<td valign="top"><?= $customer['customerId']; ?></td>
								<td valign="top"><?= $customer['customerReference']; ?></td>
								<td valign="top"><?= $customer['customerTitle']; ?></td>
								<td valign="top"><?= $customer['customerFirstName']; ?></td>
								<td valign="top"><?= $customer['customerMiddleNames']; ?></td>
								<td valign="top"><?= $customer['customerSurname']; ?></td>
								<td valign="top"><?= $customer['customerAddressPostCode']; ?></td>

								<td valign="top"><form action="/admin/customers/customeredit/" method="post"><input name="customerId" type="hidden" value="<?= $customer['customerId']; ?>" /><input name="editCustomer" type="image" src="/images/edit.jpg" alt="Edit Customer" /></form></td>
								<td valign="top"><form action="/admin/customers/customerdelete/" method="post"><input name="customerId" type="hidden" value="<?= $customer['customerId']; ?>" /><input name="deleteCustomer" type="image" src="/images/trashcan.jpg" alt="Delete Customer" onClick="return confirm('Are you sure you want to delete customer <?= $customer['customerReference']; ?>?')" /></form></td>
								<?php if ($_SESSION['redirect']['redirectType']) { ?>
									<td valign="top"><form action="/admin/customers/customerredirect/" method="post"><input name="customerId" type="hidden" value="<?= $customer['customerId']; ?>" /><input name="redirectCustomer" type="image" src="/images/buttonGo.gif" alt="Select Customer" /></form></td>
								<?php } ?>
							</tr>
						<?php } ?>
					</table>
					</div>

					<!-- Display the pagination controls -->
					<table class="customers" id="jobsPagination">
						<tr>
							<td align="left" id="paginationPreviousImage">
								<?php if ($startAt) { ?>
									<a href="<?= $previousUrl; ?>"><img src="/images/prevlabel.gif"></a>
								<?php } ?>
							</td>

							<td align="center">
								<?php if ($pages > 1) {
									for ($i = 0; $i < $pages; ++$i) {
										if ($currentPage == ($i + 1)) {
											$class = ' class="paginationlinkSelected" ';
										} else {
											$class = '';
										} ?>
										<a href="/admin/customers/customersearch/?startAt=<?= $i * $this->__ALL_MODULES['config']->pagination; ?>#searchResults"<?= $class; ?>>Page <?= $i + 1; ?></a>
										<?php if ($i + 1 < $pages) { ?> | <?php } ?>
									<?php }
								} ?>
							</td>

							<td align="right" id="paginationNextImage">
								<?php if ($next < count($this->customers)) { ?>
									<a href="<?= $nextUrl; ?>"><img src="/images/nextlabel.gif"></a>
								<?php } ?>
							</td>
						</tr>
					</table>

				<?php } ?>

				<?php if (!count($this->customers) && $this->status !== 'success' && $this->status !== 'failed') { ?>
					<p class="message"><br />You have no customers.</p>
				<?php } ?>



				<form action="/admin/customers/customersearch/" method="post" name="customerSearchForm" id="customerSearchForm">
					<h3>Filter Customer List</h3>
					<?php if ($_SESSION['user']['userType'] == 'client') { ?>
						<input name="customerClientId" type="hidden" value="<?= $_SESSION['user']['clientId']; ?>" />
					<?php } ?>
					
					<div class="customerBoxesOuter">
					<table class="customers customerBoxes">
				 		<tr>
							<td>Clear Search Parameters<input name="clearSearch" type="checkbox" onClick="document.customerSearchForm.submit();"/></td><td align="right"><input name="searchCustomers" type="image" src="/images/buttonSearch.gif" alt="Customer Search" /></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
							<tr>
								<th>Client</th>
								<td width="80%">
									<select name="customerClientId" style="width: 147px">
										<option value=""<?= $_SESSION['customerSearchParams']['customerClientId'] == "" ? " selected" : ""; ?>>All Clients</option>
										<?php if (is_array($clients)) {
											foreach ($clients as $client) { ?>
												<option value="<?= $client['clientId']; ?>"<?= $client['clientId'] == $_SESSION['customerSearchParams']['customerClientId'] ? " selected" : ""; ?>><?= $client['clientName']; ?></option>
											<?php }
										} ?>
									</select>
								</td>
							</tr>
						<?php } ?>
						<tr>
							<th>ID</th>
							<td><input name="customerId" type="text" size="10" value="<?= $_SESSION['customerSearchParams']['customerId']; ?>" /></td>
						</tr>
						<tr>
							<th>Reference</th>
							<td><input name="customerReference" type="text" size="10" value="<?= $_SESSION['customerSearchParams']['customerReference']; ?>" /></td>
						</tr>
						<tr>
							<th>First Name</th>
							<td><input name="customerFirstName" type="text" value="<?= $_SESSION['customerSearchParams']['customerFirstName']; ?>" /></td>
						</tr>
						<tr>
							<th>Surname</th>
							<td><input name="customerSurname" type="text" value="<?= $_SESSION['customerSearchParams']['customerSurname']; ?>" /></td>
						</tr>
						<tr>
							<th>Post Code</th>
							<td><input name="customerAddressPostCode" type="text" size="10" value="<?= $_SESSION['customerSearchParams']['customerAddressPostCode']; ?>" /></td>
						</tr>
						<tr>
							<td /><td align="right"><input name="searchCustomers" type="image" src="/images/buttonSearch.gif" alt="Customer Search" /></td>
						</tr>
					</table>
					</div>
					
				</form>


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