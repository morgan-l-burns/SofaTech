<?php
	$customers = $this->__ALL_MODULES['customers']->fetchCustomers(array('customerId' => $this->customerId));
	if (is_array($customers[0])) {
		$customer = $customers[0];
	} else {
		$_SESSION['error'][] = "The customer was not found.  Please click on the Search Customers tab above to try again.";
	}
	$jobs = $this->__ALL_MODULES['jobs']->fetchJobsByCustomerId($this->customerId);
?>


<?=$this->__ALL_MODULES['users']->displayAdminHeaderHtml('Customer Edit');?>

<script type="text/javascript">
	
    function showAddress(response) {
      map.clearOverlays();
      if (!response || response.Status.code != 200) {
        alert("Status Code:" + response.Status.code);
      } else {
        place = response.Placemark[0];
        point = new GLatLng(place.Point.coordinates[1],
                            place.Point.coordinates[0]);
        marker = new GMarker(point);
        map.addOverlay(marker);
        marker.openInfoWindowHtml(
        '<b>orig latlng:</b>' + response.name + '<br/>' + 
        '<b>latlng:</b>' + place.Point.coordinates[1] + "," + place.Point.coordinates[0] + '<br>' +
        '<b>Status Code:</b>' + response.Status.code + '<br>' +
        '<b>Status Request:</b>' + response.Status.request + '<br>' +
        '<b>Address:</b>' + place.address + '<br>' +
        '<b>Accuracy:</b>' + place.AddressDetails.Accuracy + '<br>' +
        '<b>Country code:</b> ' + place.AddressDetails.Country.CountryNameCode);
		/*alert('country is '+place.AddressDetails.Country.CountryNameCode);
		alert('city is '+place.AddressDetails.Country.AdministrativeArea.AdministrativeAreaName);
		alert('county is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.SubAdministrativeAreaName);
		alert('locality is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.LocalityName);
		alert('Thoroughfare is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.Thoroughfare.ThoroughfareName);
		alert('postcode is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.PostalCode.PostalCodeNumber); 
		alert('add line 1 is currently'+document.getElementById('customerAddressLine1').value); */
		//document.getElementById('address').value = place.address;
		
		document.getElementById('customerAddressLine1').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.Thoroughfare.ThoroughfareName;
		document.getElementById('customerAddressLine2').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.LocalityName;
		document.getElementById('customerAddressTownCity').value     = place.AddressDetails.Country.AdministrativeArea.AdministrativeAreaName;
		document.getElementById('customerAddressCounty').value   = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.SubAdministrativeAreaName;
		document.getElementById('customerAddressCountry').value  = place.AddressDetails.Country.CountryNameCode;
		
		//document.getElementById('postcode').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.PostalCode.PostalCodeNumber;
		
      }
    }
    </script>

<body class="blue" onLoad="initialize('52.5250677','-1.2135337')">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('customers'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml(); ?>

		<?= $this->__ALL_MODULES['customers']->displayCustomerSubNavigationHtml(); ?>


		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="/admin/customers/searchcustomer/">Customers</a> &raquo;</li>
				<li><a href="/admin/customers/searchcustomer/">Search Customers</a></li>
				<li><a href="/admin/customers/searchcustomer/">Search Results</a> &raquo;</li>
				<li><a href="#">Edit Customer</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Edit Customer</h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<?php if (is_array($customer)) { ?>

					<p class="message">Update the customer details below and click on Update Profile to save the changes.</p><br />

					<h2><?= $customer['customerTitle']." ".$customer['customerFirstName']." ".$customer['customerSurname']; ?></h2>
					<br />

					<?php if ($_SESSION['redirect']['redirectType']) { ?>
						<table class="customers" style="width:750px; font-size: 12px; color:#333333; padding:10px;">
							<tr>
								<th align="left">Select Customer</th>
								<td align="right"><form action="/admin/customers/customerredirect/" method="post"><input name="customerId" type="hidden" value="<?= $customer['customerId']; ?>" /><input name="redirectCustomer" type="image" src="/images/buttonGo.gif" alt="Select Customer" /></form></td>
							</tr>
						</table>
					<?php } ?>

					<form action="/admin/customers/customeredit/" method="post">
						<input name="customerId" type="hidden" value="<?= $customer['customerId']; ?>" />
						<input name="customerAddressId" type="hidden" value="<?= $customer['customerAddressId']; ?>" />
						<div class="customerBoxesOuter">
						<table class="customers customerBoxes" border="0">
							<tr>
								<td></td>
								<td align="right"><input name="updateCustomer" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" /></td>
							</tr>
							<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
								<tr>
									<th>Client</th>
									<td width="80%">
										<select name="customerClientId" style="width: 147px">
											<?php $clients = $this->__ALL_MODULES['users']->fetchAllUsers();
											if (is_array($clients)) {
												foreach ($clients as $client) { ?>
													<option value="<?= $client['clientId']; ?>"<?= $client['clientId'] == $customer['customerClientId'] ? " selected" : ""; ?>><?= $client['clientName']; ?></option>
												<?php }
											} ?>
										</select>
									</td>
								</tr>
							<?php } ?>
							<tr>
								<th style="width: 200px;">Reference</th>
								<td><input name="customerReference" type="text" value="<?= $customer['customerReference']; ?>" /></td>
							</tr>
							<tr>
								<th>Title</th>
								<td>
									<select name="customerTitle" style="width: 100px">
										<option value="">Select Title</option>
										<option value="Mr"<?= $customer['customerTitle'] == "Mr" ? " selected" : ""; ?>>Mr</option>
										<option value="Mrs"<?= $customer['customerTitle'] == "Mrs" ? " selected" : ""; ?>>Mrs</option>
										<option value="Miss"<?= $customer['customerTitle'] == "Miss" ? " selected" : ""; ?>>Miss</option>
										<option value="Ms"<?= $customer['customerTitle'] == "Ms" ? " selected" : ""; ?>>Ms</option>
										<option value="Dr"<?= $customer['customerTitle'] == "Dr" ? " selected" : ""; ?>>Dr</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>First Name</th>
								<td><input name="customerFirstName" type="text" value="<?= $customer['customerFirstName']; ?>" /></td>
							</tr>
							<tr>
								<th>Middle Names</th>
								<td><input name="customerMiddleNames" type="text" value="<?= $customer['customerMiddleNames']; ?>" /></td>
							</tr>
							<tr>
								<th>Surname</th>
								<td><input name="customerSurname" type="text" value="<?= $customer['customerSurname']; ?>" /></td>
							</tr>
							<tr>
								<th>Address Line 1</th>
								<td><input name="customerAddressLine1" id="customerAddressLine1" type="text" value="<?= $customer['customerAddressLine1']; ?>" /></td>
							</tr>
							<tr>
								<th>Address Line 2</th>
								<td><input name="customerAddressLine2" id="customerAddressLine2" type="text" value="<?= $customer['customerAddressLine2']; ?>" /></td>
							</tr>
							<tr>
								<th>Address Line 3</th>
								<td><input name="customerAddressLine3" type="text" value="<?= $customer['customerAddressLine3']; ?>" /></td>
							</tr>
							<tr>
								<th>Town/City</th>
								<td><input name="customerAddressTownCity" id="customerAddressTownCity" type="text" value="<?= $customer['customerAddressTownCity']; ?>" /></td>
							</tr>
							<tr>
								<th>County</th>
								<td><input name="customerAddressCounty" id="customerAddressCounty" type="text" value="<?= $customer['customerAddressCounty']; ?>" /></td>
							</tr>
							<tr>
								<th>Country</th>
								<td><input name="customerAddressCountry" id="customerAddressCountry" type="text" value="<?= $customer['customerAddressCountry']; ?>" /></td>
							</tr>
							<tr>
								<th valign="top"><a name="postcode">Post Code</a></th>
								<td><input name="customerAddressPostCode" id="customerAddressPostCode" type="text" value="<?= $customer['customerAddressPostCode']; ?>" /><br />
								<a href="#postcode" onClick="javascript:openDiv('map_canvas');usePointFromPostcode(document.getElementById('customerAddressPostCode').value,
    function (point) {
      //alert('Latitude: ' + point.lat() + '\nLongitude: ' + point.lng());
	  initialize(point.lat(),point.lng());
	  usePointFromPostcode(document.getElementById('customerAddressPostCode').value, placeMarkerAtPoint);
      })" /><img src="/images/buttonSearch.gif" id="postCodeSearchImage"></a>
									<div id="map_canvas"></div>
								</td>
							</tr>
							<tr>
								<th>Telephone 1</th>
								<td><input name="customerTelephone1" type="text" value="<?= $customer['customerTelephone1']; ?>" /></td>
							</tr>
							<tr>
								<th>Telephone 2</th>
								<td><input name="customerTelephone2" type="text" value="<?= $customer['customerTelephone2']; ?>" /></td>
							</tr>
							<tr>
								<th>Mobile Phone</th>
								<td><input name="customerMobile" type="text" value="<?= $customer['customerMobile']; ?>" /></td>
							</tr>
							<tr>
								<th>Notes</th>
								<td><textarea name="customerNotes" rows="5" cols="35"><?= $customer['customerNotes']; ?></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td align="right"><input name="updateCustomer" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" /></td>
							</tr>
						</table>
						</div>
					</form>
					
				<?php } ?>



				<br /><h2>Job History</h2>
				<br />

				<?php if (!is_array($jobs)) {
				
				 ?>
					<p class="alert">There are no jobs recorded for this customer.</p><br />
				<?php } else { ?>

					<p class="message">All of the customers jobs are listed below.  You can manage them with the buttons to the right of each one, or with the Jobs tab above.</p><br />


					<table class="jobsAndVisits" id="jobSearchTable" cellspacing="5">
						<tr>
							<th valign="top">Job ID</th>
							<th valign="top">Job Reference</th>
							<th valign="top">Job Status</th>
							<th valign="top">Date Created</th>
							<th valign="top" width="37px">Edit Job</th>
							<th valign="top" width="37px">Delete Job</th>
						</tr>

						<?php foreach ($jobs as $job) { ?>
							<tr class="even">
								<td valign="top"><?= $job['jobId']; ?></td>
								<td valign="top"><?= $job['jobReference']; ?></td>
								<td valign="top"><?= $job['jobStatus']; ?></td>
								<td valign="top"><?= $job['jobDateCreatedFormatted']; ?></td>
								<td valign="top"><form action="/admin/jobs/jobedit/" method="post"><input name="jobId" type="hidden" value="<?= $job['jobId']; ?>" /><input name="editJob" type="image" src="/images/edit.jpg" alt="Edit Job" /></form></td>
								<td valign="top">
									<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
										<form action="/admin/customers/customeredit/" method="post"><input name="customerId" type="hidden" value="<?= $customer['customerId']; ?>" /><input name="jobId" type="hidden" value="<?= $job['jobId']; ?>" /><input name="deleteJob" type="image" src="/images/trashcan.jpg" alt="Delete Job" onClick="return confirm('Are you sure you want to delete <?= $job['jobReference']; ?>?')" /></form>
									<?php } else {
										if ($job['jobAllowDelete'] == 'yes') { ?>
											<form action="/admin/customers/customeredit/" method="post"><input name="customerId" type="hidden" value="<?= $customer['customerId']; ?>" /><input name="jobId" type="hidden" value="<?= $job['jobId']; ?>" /><input name="deleteJob" type="image" src="/images/trashcan.jpg" alt="Delete Job" onClick="return confirm('Are you sure you want to delete <?= $job['jobReference']; ?>?')" /></form>
										<?php } else if ($job['jobAllowDelete'] == 'no') { ?>
											<img src="/images/noTrashcan.jpg" alt="No Delete Allowed" title="No Delete Allowed" />
										<?php } 
									} ?>
								</td>
							</tr>
						<?php } ?>

					</table>

				<?php } ?>

				<p style="height:100px; width:700px;"></p>


			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>