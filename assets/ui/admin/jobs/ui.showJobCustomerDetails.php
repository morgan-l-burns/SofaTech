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
		
		document.getElementById('customerAddressLine1').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.Thoroughfare.ThoroughfareName;
		document.getElementById('customerAddressLine2').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.LocalityName;
		document.getElementById('customerAddressTownCity').value     = place.AddressDetails.Country.AdministrativeArea.AdministrativeAreaName;
		document.getElementById('customerAddressCounty').value   = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.SubAdministrativeAreaName;
		document.getElementById('customerAddressCountry').value  = place.AddressDetails.Country.CountryNameCode; 
		
		//document.getElementById('postcode').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.PostalCode.PostalCodeNumber;
		
      }
    }
	
	function clearCustomerDetails() {
		document.getElementById('customerTitle').value = '';
		document.getElementById('customerFirstName').value = '';
		document.getElementById('customerMiddleNames').value = '';
		document.getElementById('customerSurname').value = '';
		document.getElementById('customerTelephone1').value = '';
		document.getElementById('customerTelephone2').value = '';
		document.getElementById('customerMobile').value = '';
		document.getElementById('customerNotes').value = '';
		document.getElementById('customerAddressLine1').value = '';
		document.getElementById('customerAddressLine2').value = '';
		document.getElementById('customerAddressLine3').value = '';
		document.getElementById('customerAddressTownCity').value = '';
		document.getElementById('customerAddressCounty').value   = '';
		document.getElementById('customerAddressCountry').value  = '';
		document.getElementById('customerAddressPostCode').value = ''; 
		document.getElementById('customerId').value = '';
		document.getElementById('customerAddressId').value = ''; 
		document.getElementById('customerClientId').value = ''; 
	}
    </script>

<?php
	if (strlen($this->job['customerId'])) {
		//$editLink = '<a href="/admin/customers/customeredit/?customerId='.$this->job['customerId'].'&redirect=true&redirectType=job&jobId='.$this->jobId.'&clientId='.$this->job['jobClientId'].'">'.$this->job['customerId'].' (Edit Customer)</a>';
		$editLink = 'Fields with <span class="red">*</span> are mandatory.	<input type="hidden" name="customerId" id="customerId" value="'.$this->job['customerId'].'">
												<input type="hidden" name="customerAddressId" id="customerAddressId" value="'.$this->job['customerAddressId'].'">
												<input type="hidden" name="customerClientId" id="customerClientId" value="'.$this->job['jobClientId'].'">';
		$changeCustomerText = 'Click here to select a different Customer';
	}
	else {
		$editLink = 'Fields with <span class="red">*</span> are mandatory. <input type="hidden" name="customerClientId" id="customerClientId" value="'.$this->job['jobClientId'].'">';
		$changeCustomerText = 'Click here to select a Customer';
	}
?>
<h3 class="excludeForPrint"><a name="customer">Customer Details</a></h3>
<div class="jobsAndVisits jobBoxesOuter">
<table class="jobsAndVisits jobBoxes">
	<tr>
		<td valign="top" colspan="2">
			<table class="jobsAndVisits" border="0" width="500">
				<tr>
					
					<td colspan="2">
					
					<?php 
					
					
					if ($_SESSION['user']['userType'] == 'admin') { ?>
				<?=$editLink;?>
		<?php } 
		else {
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<?=$editLink;?>
		<?php } 
			else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<a>No Update allowed</a>
			<?php }
		
		} ?>
					
					</td>
				</tr>
				
				<tr>
			<td colspan="2" align="right">
		<?php if ($this->userArray["userType"] == 'admin') { ?>
				<input name="updateJob" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
		<?php } 
		else {
			if ($_SESSION['user']['modifyPermission'] == 'no') { ?>
				<img src="/images/buttonLocked.jpg" alt="No Update Allowed" title="No Update Allowed"/>
			<?php }
			else {
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<input name="updateJob" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
		<?php } 
		else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<img src="/images/buttonLocked.jpg" alt="No Update Allowed" title="No Update Allowed"/>
		<?php } }
		} ?>
			</td>
		</tr>
				
				<tr>
					
					<td colspan="2">
						<table border="0" class="jobBoxesShort">
							
					<?php 
					
						
						
						if ((!strlen($this->job['customerAddressPostCode'])) && (strlen($_POST['customerAddressPostCode']))) $this->job['customerAddressPostCode'] = $_POST['customerAddressPostCode'];
						if ((!strlen($this->job['customerTitle'])) && (strlen($_POST['customerTitle']))) $this->job['customerTitle'] = $_POST['customerTitle'];
						if ((!strlen($this->job['customerFirstName'])) && (strlen($_POST['customerFirstName']))) $this->job['customerFirstName'] = $_POST['customerFirstName'];
						if ((!strlen($this->job['customerMiddleNames'])) && (strlen($_POST['customerMiddleNames']))) $this->job['customerMiddleNames'] = $_POST['customerMiddleNames'];
						if ((!strlen($this->job['customerSurname'])) && (strlen($_POST['customerSurname']))) $this->job['customerSurname'] = $_POST['customerSurname'];
						if ((!strlen($this->job['customerAddressLine1'])) && (strlen($_POST['customerAddressLine1']))) $this->job['customerAddressLine1'] = $_POST['customerAddressLine1'];
						if ((!strlen($this->job['customerAddressLine2'])) && (strlen($_POST['customerAddressLine2']))) $this->job['customerAddressLine2'] = $_POST['customerAddressLine2'];
						if ((!strlen($this->job['customerAddressLine3'])) && (strlen($_POST['customerAddressLine3']))) $this->job['customerAddressLine3'] = $_POST['customerAddressLine3'];
						if ((!strlen($this->job['customerAddressTownCity'])) && (strlen($_POST['customerAddressTownCity']))) $this->job['customerAddressTownCity'] = $_POST['customerAddressTownCity'];
						if ((!strlen($this->job['customerAddressCounty'])) && (strlen($_POST['customerAddressCounty']))) $this->job['customerAddressCounty'] = $_POST['customerAddressCounty'];
						if ((!strlen($this->job['customerAddressCountry'])) && (strlen($_POST['customerAddressCountry']))) $this->job['customerAddressCountry'] = $_POST['customerAddressCountry'];
						if ((!strlen($this->job['customerTelephone1'])) && (strlen($_POST['customerTelephone1']))) $this->job['customerTelephone1'] = $_POST['customerTelephone1'];
						if ((!strlen($this->job['customerTelephone2'])) && (strlen($_POST['customerTelephone2']))) $this->job['customerTelephone2'] = $_POST['customerTelephone2'];
						if ((!strlen($this->job['customerMobile'])) && (strlen($_POST['customerMobile']))) $this->job['customerMobile'] = $_POST['customerMobile'];
						if ((!strlen($this->job['customerNotes'])) && (strlen($_POST['customerNotes']))) $this->job['customerNotes'] = $_POST['customerNotes'];
					?>
					
						<tr><td colspan="2"><b>Click <a href="#customer" onClick="clearCustomerDetails();">here</a> if this is the wrong customer</b></td></tr>
						<tr><td colspan="2"><div id="map_canvas"></div></td></tr>
						<tr>
							<td colspan="2"><div id="customerSelection"></div></td>
						</tr>
						<tr>
							<th style="width:200px;"><a name="postcode">Post Code</a> <span class="red">*</span></th>
							<td>
							
							<input type="text" name="customerAddressPostCode" id="customerAddressPostCode" value="<?=$this->job['customerAddressPostCode'];?>" onkeyup="displayCustomersByPostCode(document.getElementById('customerAddressPostCode').value,'<?=$this->job['jobClientId'];?>');" /></td>
						</tr>
						
						<tr>
							<td></td>
							<td><a href="#customer" id="postCodeSearchButton"  onClick="javascript:openDiv('map_canvas');  usePointFromPostcode(document.getElementById('customerAddressPostCode').value,
    function (point) {
      //alert('Latitude: ' + point.lat() + '\nLongitude: ' + point.lng());
	  initialize(point.lat(),point.lng());
	  usePointFromPostcode(document.getElementById('customerAddressPostCode').value, placeMarkerAtPoint);
      });" /><img src="/images/SeeMap.gif" /></a></td></tr>
						<tr><th>Title <span class="red">*</span></th>
						<td>
							<select name="customerTitle" id="customerTitle" style="width: 100px">
								<option value="">Select Title</option>
								<option value="Mr"<?= $this->job['customerTitle'] == "Mr" ? " selected" : ""; ?>>Mr</option>
								<option value="Mrs"<?= $this->job['customerTitle'] == "Mrs" ? " selected" : ""; ?>>Mrs</option>
								<option value="Mr & Mrs"<?= $this->job['customerTitle'] == "Mr & Mrs" ? " selected" : ""; ?>>Mr & Mrs</option>
								<option value="Miss"<?= $this->job['customerTitle'] == "Miss" ? " selected" : ""; ?>>Miss</option>
								<option value="Ms"<?= $this->job['customerTitle'] == "Ms" ? " selected" : ""; ?>>Ms</option>
								<option value="Dr"<?= $this->job['customerTitle'] == "Dr" ? " selected" : ""; ?>>Dr</option>
							</select></td>
						</tr>
						<tr><th>First Name</th><td><input type="text" name="customerFirstName" id="customerFirstName" value="<?=$this->job['customerFirstName'];?>" /></td></tr>
						<!-- <tr><th>Middle Names</td><td><input type="text" name="customerMiddleNames" id="customerMiddleNames" value="<?=$this->job['customerMiddleNames'];?>" /></td></tr> -->
						<tr><th>Surname <span class="red">*</span></td><td><input type="text" name="customerSurname" id="customerSurname" value="<?=$this->job['customerSurname'];?>" /></td></tr>
						<tr><th>Address Line 1</th><td><input type="text" name="customerAddressLine1" id="customerAddressLine1" value="<?=$this->job['customerAddressLine1'];?>" /></td></tr>
						<tr><th>Address Line 2</th><td><input type="text" name="customerAddressLine2" id="customerAddressLine2" value="<?=$this->job['customerAddressLine2'];?>" /></td></tr>
						<tr><th>Address Line 3</th><td><input type="text" name="customerAddressLine3" id="customerAddressLine3" value="<?=$this->job['customerAddressLine3'];?>" /></td></tr>
						<tr><th>Town/City</th><td><input type="text" name="customerAddressTownCity" id="customerAddressTownCity" value="<?=$this->job['customerAddressTownCity'];?>" /></td></tr>
						<tr><th>County</th><td><input type="text" name="customerAddressCounty" id="customerAddressCounty" value="<?=$this->job['customerAddressCounty'];?>" /></td></tr>
						<!-- <tr><th>Country</th><td><input type="text" name="customerAddressCountry" id="customerAddressCountry" value="<?=$this->job['customerAddressCountry'];?>" /></td></tr> -->
						
						<tr><th>Telephone 1</th><td><input type="text" name="customerTelephone1" id="customerTelephone1" value="<?=$this->job['customerTelephone1'];?>" /></td></tr>
						<tr><th>Telephone 2</th><td><input type="text" name="customerTelephone2" id="customerTelephone2" value="<?=$this->job['customerTelephone2'];?>" /></td></tr>
						<tr><th>Mobile Phone</th><td><input type="text" name="customerMobile" id="customerMobile" value="<?=$this->job['customerMobile'];?>" /></td></tr>
						<tr><th valign="top">Notes</th><td><textarea name="customerNotes" cols="25" rows="15" id="customerNotes"><?=$this->job['customerNotes'];?></textarea></td></tr>
						</table>
					</td>
				</tr>
			
				
				<!-- <tr>
					<th valign="top">Select Customer</th>
					<td nowrap>	
					<?php if ($_SESSION['user']['userType'] == 'admin') { ?>
				<a href="/admin/customers/search/?redirect=true&redirectType=job&jobId=<?=$this->jobId;?>&clientId=<?=$this->job['jobClientId'];?>"><?=$changeCustomerText;?></a>
		<?php } 
		else {
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<a href="/admin/customers/search/?redirect=true&redirectType=job&jobId=<?=$this->jobId;?>&clientId=<?=$this->job['jobClientId'];?>"><?=$changeCustomerText;?></a>
		<?php } 
			else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<a>No Update allowed</a>
			<?php }
		
		} ?>
				</td>	
				</tr> -->
				
				<tr>
					<td colspan="2" align="right">
					<?php if ($this->userArray["userType"] == 'admin') { ?>
					<input name="updateJob" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
					<?php } 
					else {
					if ($_SESSION['user']['modifyPermission'] == 'no') { ?>
						<img src="/images/buttonLocked.jpg" alt="No Update Allowed" title="No Update Allowed"/>
					<?php }
					else {
					if ($this->job['jobAllowUpdate'] == 'yes') { ?>
					<input name="updateJob" type="image" src="/images/buttonUpdateProfile.gif" alt="Update Profile" />
					<?php } 
					else if ($this->job['jobAllowUpdate'] == 'no') { ?>
					<img src="/images/buttonLocked.jpg" alt="No Update Allowed" title="No Update Allowed"/>
					<?php } }
					} ?>
					</td>
				</tr>
				
				
			</table>
		</td>
	</tr>
	
	<tr><td>&nbsp;</td></tr>
</table>
</div>