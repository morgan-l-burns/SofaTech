
<table>
	<tr><td><span class="postcodeMessage">Select existing addresses found with Postcode: <b><?=$this->postcode;?></b></span></td></tr>
	<tr><td>
<?php
	if (is_array($this->customersArray)) { ?>
		<select name="selectCustomer" size="10">
		<?php foreach ($this->customersArray as $key=>$customer) { ?>
			<option value="<?=$customer['customerId'];?>"><?=$customer['customerAddressPostCode'];?> <?=$customer['customerAddressLine1'];?> <?=$customer['customerAddressTownCity'];?> - <?=$customer['customerTitle'];?> <?=$customer['customerFirstName'];?> <?=$customer['customerSurname'];?></option>
		<?php } ?>
		</select>
	</td></tr>
	<!-- <tr><td><input name="updateJob" type="image" src="/images/buttonGo.gif" alt="Update Profile" /></td></tr> -->
		
		
	<?php }
	else { ?>
	<tr><td><span class="postcodeMessage">Sorry there are no existing customers with postcode: <b><?=$this->postcode;?></b></span></td></tr>
	<?php }
?>
</table>
