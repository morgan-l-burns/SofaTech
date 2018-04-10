<?= $this->__ALL_MODULES['users']->displayAdminHeaderHtml('Customer Add'); ?>
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
<body class="blue">

	<!-- begin main container -->
	<div id="mainContainerRed">

		<?= $this->__ALL_MODULES['users']->displayAdminNavigationHtml('customers'); ?>

		<?= $this->__ALL_MODULES['users']->displayAdminStatusBarHtml(); ?>

		<?= $this->__ALL_MODULES['customers']->displayCustomerSubNavigationHtml(); ?>


		<!-- begin breadcrumbs -->
		<div id="breadCrumbs">
			<ul>
				<li>You are in:</li>
				<li><a href="/admin/customers/customersearch/">Customers</a> &raquo;</li>
				<li><a href="#">Add Customer</a></li>
			</ul>
		</div>
		<!-- end breadcrumbs -->


		<!-- begin main contents -->
		<div id="mainContentCentre">

			<h2>Add Customer</h2>


			<!-- begin product results -->
			<div id="prodResults">
				<br />

				<?= $this->__ALL_MODULES['users']->displayAdminFeedbackHtml(); ?>


				<p class="message">Please enter the customer details below and click on the Add button to add the customer to the system.</p><br />

				<form action="/admin/customers/customeradd/" method="post">
					<?php if ($_SESSION['user']['userType'] == 'client') { 
					//var_dump($_SESSION['user']);
					
					?>
						<input name="customerClientId" type="hidden" value="<?= $_SESSION['user']['clientId']; ?>" />
					<?php } ?>
					<div class="customerBoxesOuter">
					<table class="customers customerBoxes">
						<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
							<tr>
								<th style="width:200px;">Client</th>
								<td width="80%">
									<select name="customerClientId" style="width: 147px">
										<?php $clients = $this->__ALL_MODULES['users']->fetchAllUsers();
										if (is_array($clients)) {
											foreach ($clients as $client) {
											
												if (strlen($_POST['customerClientId'])) {
													$selectedClient = $_POST['customerClientId'];
												}
												else {
													$selectedClient = $_SESSION['user']['clientId'];
												}
											 ?>
												<option value="<?= $client['clientId']; ?>"<?= $client['clientId'] == $selectedClient ? " selected" : ""; ?>><?= $client['clientName']; ?></option>
											<?php }
										} ?>
									</select>
								</td>
							</tr>
						<?php } ?>
						<tr>
							<th>Reference</th>
							<td><input name="customerReference" type="text" value="<?= $_POST['customerReference']; ?>" /></td>
						</tr>
						<tr>
							<th>Title</th>
							<td>
								<select name="customerTitle" style="width: 100px">
									<option value="">Select Title</option>
									<option value="Mr"<?= $_POST['customerTitle'] == "Mr" ? " selected" : ""; ?>>Mr</option>
									<option value="Mrs"<?= $_POST['customerTitle'] == "Mrs" ? " selected" : ""; ?>>Mrs</option>
									<option value="Miss"<?= $_POST['customerTitle'] == "Miss" ? " selected" : ""; ?>>Miss</option>
									<option value="Ms"<?= $_POST['customerTitle'] == "Ms" ? " selected" : ""; ?>>Ms</option>
									<option value="Dr"<?= $_POST['customerTitle'] == "Dr" ? " selected" : ""; ?>>Dr</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>First Name</th>
							<td><input name="customerFirstName" type="text" value="<?= $_POST['customerFirstName']; ?>" /></td>
						</tr>
						<tr>
							<th>Middle Names</th>
							<td><input name="customerMiddleNames" type="text" value="<?= $_POST['customerMiddleNames']; ?>" /></td>
						</tr>
						<tr>
							<th>Surname</th>
							<td><input name="customerSurname" type="text" value="<?= $_POST['customerSurname']; ?>" /></td>
						</tr>
						<tr>
							<th>Address Line 1</th>
							<td><input name="customerAddressLine1" id="customerAddressLine1" type="text" value="<?= $_POST['customerAddressLine1']; ?>" /></td>
						</tr>
						<tr>
							<th>Address Line 2</th>
							<td><input name="customerAddressLine2" id="customerAddressLine2" type="text" value="<?= $_POST['customerAddressLine2']; ?>" /></td>
						</tr>
						<tr>
							<th>Address Line 3</th>
							<td><input name="customerAddressLine3" id="customerAddressLine3" type="text" value="<?= $_POST['customerAddressLine3']; ?>" /></td>
						</tr>
						<tr>
							<th>Town/City</th>
							<td><input name="customerAddressTownCity" id="customerAddressTownCity" type="text" value="<?= $_POST['customerAddressTownCity']; ?>" /></td>
						</tr>
						<tr>
							<th>County</th>
							<td><input name="customerAddressCounty" id="customerAddressCounty" type="text" value="<?= $_POST['customerAddressCounty']; ?>" /></td>
						</tr>
						<tr>
							<th>Country</th>
							<td><input name="customerAddressCountry" id="customerAddressCountry" type="text" value="<?= $_POST['customerAddressCountry']; ?>" /></td>
						</tr>
						<tr>
							<th valign="top"><a name="postcode">Post Code</a></th>
							<td><input name="customerAddressPostCode"  id="customerAddressPostCode" type="text" value="<?= $_POST['customerAddressPostCode']; ?>" /><br />
								<a href="#postcode" id="postCodeSearchButton" onClick="javascript:openDiv('map_canvas');usePointFromPostcode(document.getElementById('customerAddressPostCode').value,
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
							<td><input name="customerTelephone1" type="text" value="<?= $_POST['customerTelephone1']; ?>" /></td>
						</tr>
						<tr>
							<th>Telephone 2</th>
							<td><input name="customerTelephone2" type="text" value="<?= $_POST['customerTelephone2']; ?>" /></td>
						</tr>
						<tr>
							<th>Mobile Phone</th>
							<td><input name="customerMobile" type="text" value="<?= $_POST['customerMobile']; ?>" /></td>
						</tr>
						<tr>
							<th>Notes</th>
							<td><textarea name="customerNotes" rows="5" cols="35"><?= $_POST['customerNotes']; ?></textarea></td>
						</tr>
						<tr>
							<td><input name="addCustomer" type="submit" value="Add" class="submit" /></td>
						</tr>
					</table>
					</div>
				</form>


				<p style="height:50px; width:700px;"></p>


			</div>
			<!-- end product results -->

		</div>
		<!-- end main contents -->


		<?= $this->__ALL_MODULES['users']->displayAdminFooterTextHtml(); ?>


	</div>
	<!-- end main container -->


<?= $this->__ALL_MODULES['users']->displayAdminFooterHtml(); ?>