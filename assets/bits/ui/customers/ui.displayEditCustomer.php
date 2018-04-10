<?php if (is_object($this->oCustomer)) { 

	if (strlen($this->oCustomer->getCustomerTitle())) {
		switch ($this->oCustomer->getCustomerTitle()) {
			case 'Mr':
				$mrSelected = ' selected ';
			break;
			case 'Mrs':
				$mrsSelected = ' selected ';
			break;
			case 'Miss':
				$missSelected = ' selected ';
			break;
			case 'Ms':
				$msSelected = ' selected ';
			break;
		}
	}

	$dateOfBirthArray = $this->oCustomer->getCustomerDateOfBirth();
	$dateArray['selectedDay'] = $dateOfBirthArray['dobDay'];
	$dateArray['selectedMonth'] = $dateOfBirthArray['dobMonth'];
	$dateArray['selectedYear'] = $dateOfBirthArray['dobYear'];
	$dateArray['displayYearFrom'] = '1900';
	$dateArray['fieldPrefix'] = 'dob';
?>

<fieldset id="customerFieldSet">
	<label for="customerTitle"><span class="customerDetails">Customer Title</span>
		<select name="customerTitle">
			<option value="">Please Select</option>
			<option value="Mr"<?=$mrSelected;?>>Mr</option>
			<option value="Mrs"<?=$mrsSelected;?>>Mrs</option>
			<option value="Miss"<?=$missSelected;?>>Miss</option>
			<option value="Ms"<?=$msSelected;?>>Ms</option>
		</select>
	</label>
	
	<label for="customerDateOfBirth"><span class="customerDetails">Date of birth</span><?=$this->displayCustomerDateOfBirth($dateArray);?></label>
	
	<label for="customerFirstName"><span class="customerDetails">Customer Firstname</span> 	<input type="text" name="customerFirstName" value="<?php echo($this->oCustomer->getCustomerFirstName());?>" />	</label>
	<label for="customerSurname"><span class="customerDetails">Customer Middlenames</span> 		<input type="text" name=" customerMiddleNames" value="<?php echo($this->oCustomer->getCustomerMiddleNames());?>" />	</label>
	<label for="customerSurname"><span class="customerDetails">Customer Surname</span> 		<input type="text" name="customerSurname" value="<?php echo($this->oCustomer->getCustomerSurname());?>" />	</label>
	<label for="customerEmail"><span class="customerDetails">Customer Email</span> 			<input type="text" name="customerEmail" value="not yet" />		</label>
	<label for="customerPhone"><span class="customerDetails">Customer Phone number 1</span> 	<input type="text" name="customerTelephone1" value="<?php echo($this->oCustomer->getCustomerTelephone1());?>" />		</label>
	<label for="customerPhone"><span class="customerDetails">Customer Phone number 2</span> 	<input type="text" name="customerTelephone2" value="<?php echo($this->oCustomer->getCustomerTelephone2());?>" />		</label>
	<label for="customerMobile"><span class="customerDetails">Customer Phone number 2</span> 	<input type="text" name="customerMobile" value="<?php echo($this->oCustomer->getCustomerMobile());?>" /> <br /><input type="submit" value="update" name="updateCustomer" onClick="confirmPress('are you sure');" />
	
	<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete this?','/assets/bits/customer.php?customerId=2');">Delete</a>
	
	
	<input type="hidden" value="<?php echo($this->oCustomer->getCustomerId());?>" name="customerId"  />	</label>

</fieldset>

<?php } ?>