		<?php
	$jobItemsArray = $this->fetchJobItems($this->jobId);
?>
<?php if (!strlen($_GET['print'])) { ?>

<h3 class="excludeForPrint"><a name="items">Items</a></h3>

<?php 
					
					if ($_SESSION['user']['userType'] == 'admin') { ?>
				<a href="/admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&addNewItem=true&time=<?=time();?>#items" class="addNewItem excludeForPrint">+ Add New Item</a>
		<?php } 
		else {
			if ($_SESSION['user']['writePermission'] == 'no') { ?>
			 <a>No Update allowed</a>
			 <?php } else { 
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<a href="/admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&addNewItem=true&time=<?=time();?>#items" class="addNewItem excludeForPrint">+ Add New Item</a>
		<?php } 
			else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<a>No Update allowed</a>
			<?php } }
		
		} ?>



<?php
	//$jobItemsArray = $this->fetchJobItems($this->jobId);
	//var_dump($jobItemsArray);
	
	if (is_array($jobItemsArray)) { ?>
	<ul id="jobItemTabs">
	<?php
		$index = 0; 
		foreach ($jobItemsArray as $key=>$item) { 
			++$index;
			?>
			<li class="itemTabLink" id="itemTabLink_<?=$item['itemId'];?>">
			<a href="#items" name="itemTab_<?=$item['itemId'];?>" onClick="OpenCloseItem('item_<?=$item['itemId'];?>','itemTabLink_<?=$item['itemId'];?>'); "><?=ucfirst($item['itemType']);?></a>
			
			</li>
		<?php
	} ?> 
	</ul>
	
	
	<?php 
			$displayed = false;
			foreach ($jobItemsArray as $key=>$item) { 
				if (!$displayed) {
					
						$display = ' display: block;';
						$displayed = true;
						$openItem = 'item_'.$item['itemId'];
						$openItemTabLink = 'itemTabLink_'.$item['itemId'];
					
				}
				else $display = ' display: none;';
				
				
	?>
			
		

<div style="clear:both;<?=$display;?>" id="item_<?=$item['itemId'];?>" class="jobsAndVisits jobBoxesOuter">
<table  border="0" class="jobBoxes jobsAndVisits" >
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
		<th style="width:200px;">Delete</th>
		<td style="width:770px;">
		
		<?php 
					
					if ($_SESSION['user']['userType'] == 'admin') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete the item: <?=$item['itemType']; ?>?','/admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&deleteItem=true&itemId=<?=$item['itemId'];?>#items');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
		else {
			if ($_SESSION['user']['deletePermission'] == 'no') { ?>
				<img src="/images/noTrashcan.jpg" al="No Delete Allowed" />
			<?php }
			else {
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete the item: <?=$item['itemType']; ?>?','/admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&deleteItem=true&itemId=<?=$item['itemId'];?>#items');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
			else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<a>No Update allowed</a>
			<?php } }
		
		} ?>
		
		
		
	</tr>						
	<tr>
		<th>Item</th>
		<td><input name="itemType_<?=$item['itemId'];?>" type="text" value="<?=$item['itemType']; ?>" /></td>
	</tr>
<?php	
	$orderDateArray['fieldPrefix'] 		= 'itemOrderDate_'.$item['itemId']; 
	$orderDateArray['selectedDay'] 		= $item['itemOrderDateDay'];
	$orderDateArray['selectedMonth'] 	= $item['itemOrderDateMonth'];
	$orderDateArray['selectedYear'] 	= $item['itemOrderDateYear'];
	$orderDateArray['showTime'] 		= false;
	//$orderDateArray['selectedHour'] 	= $item[$key]['itemDateHour'];
	//$orderDateArray['selectedMinute'] 	= $item[$key]['itemDateMinutes'];
?>

<?php	
	$deliveryDateArray['fieldPrefix'] 		= 'itemDeliveryDate_'.$item['itemId']; 
	$deliveryDateArray['selectedDay'] 		= $item['itemDeliveryDateDay'];
	$deliveryDateArray['selectedMonth'] 	= $item['itemDeliveryDateMonth'];
	$deliveryDateArray['selectedYear'] 	= $item['itemDeliveryDateYear'];
	$deliveryDateArray['showTime'] 		= false;
	//$orderDateArray['selectedHour'] 	= $item[$key]['itemDateHour'];
	//$orderDateArray['selectedMinute'] 	= $item[$key]['itemDateMinutes'];
?>
	
	<tr>
		<th>Order Date</th>
		<td valign="top"><?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($orderDateArray);?></td>
	</tr>
	<tr>
		<th>Delivery Date</th>
		<td valign="top"><?=$this->__ALL_MODULES['dates']->displayDateSelectionHtml($deliveryDateArray);?></td>
	</tr>
	
	<tr>
		<th>Retail Price</th>
		<td>&pound;<input name="itemRetailPrice_<?=$item['itemId'];?>" size="8" type="text" value="<?= $item['itemRetailPrice']; ?>" /></td>
	</tr>
	<tr>
		<th>Supplier</th>
		<td><input name="itemSupplier_<?=$item['itemId'];?>" type="text" value="<?= $item['itemSupplier']; ?>" /></td>
	</tr>
	
	<tr>
		<th>Model</th>
		<td><input name="itemModel_<?=$item['itemId'];?>" type="text" value="<?= $item['itemModel']; ?>" /></td>
	</tr>
	<tr>
		<th>Colour</th>
		<td><input name="itemColour_<?=$item['itemId'];?>" type="text" value="<?= $item['itemColour']; ?>" /></td>
	</tr>
	
	<?php
		if ($item['itemSampleRequired'] == 'yes') {
			${itemSampleRequiredYesChecked.'_'.$item['itemId']} = ' checked ';
			${itemSampleRequiredNoChecked.'_'.$item['itemId']} = '';
		}
		else if ($item['itemSampleRequired'] == 'no') {
			${itemSampleRequiredNoChecked.'_'.$item['itemId']} = ' checked ';
			${itemSampleRequiredYesChecked.'_'.$item['itemId']} = '';
		}
		
		if ($item['itemCustomerAcceptsRepair'] == 'yes') {
			${itemCustomerAcceptsRepairYesChecked.'_'.$item['itemId']} = ' checked ';
			${itemCustomerAcceptsRepairNoChecked.'_'.$item['itemId']} = '';
		}
		else if ($item['itemCustomerAcceptsRepair'] == 'no') {
			${itemCustomerAcceptsRepairNoChecked.'_'.$item['itemId']} = ' checked ';
			${itemCustomerAcceptsRepairYesChecked.'_'.$item['itemId']} = '';
		}
		
		if ($item['itemPhotosRequired'] == 'yes') {
			${itemPhotosRequiredYesChecked.'_'.$item['itemId']} = ' checked ';
			${itemPhotosRequiredNoChecked.'_'.$item['itemId']} = '';
		}
		else if ($item['itemPhotosRequired'] == 'no') {
			${itemPhotosRequiredNoChecked.'_'.$item['itemId']} = ' checked ';
			${itemPhotosRequiredYesChecked.'_'.$item['itemId']} = '';
		}
		
		if ($item['itemReplacementRequired'] == 'yes') {
			${itemReplacementRequiredYesChecked.'_'.$item['itemId']} = ' checked ';
			${itemReplacementRequiredNoChecked.'_'.$item['itemId']} = '';
		}
		else if ($item['itemReplacementRequired'] == 'no') {
			${itemReplacementRequiredNoChecked.'_'.$item['itemId']} = ' checked ';
			${itemReplacementRequiredYesChecked.'_'.$item['itemId']} = '';
		}
	?>
	
	<tr>
		<th>Sample Required</th>
		<td>Yes 		<input name="itemSampleRequired_<?=$item['itemId'];?>" type="radio" value="yes"<?=${itemSampleRequiredYesChecked.'_'.$item['itemId']};?>>
			&nbsp;No 	<input name="itemSampleRequired_<?=$item['itemId'];?>" type="radio" value="no"<?=${itemSampleRequiredNoChecked.'_'.$item['itemId']};?>>
		</td>
	</tr>
	<tr>
		<th>Customer Accept Repair</th>
		<td>Yes 	<input name="itemCustomerAcceptsRepair_<?=$item['itemId'];?>" type="radio" value="yes"<?=${itemCustomerAcceptsRepairYesChecked.'_'.$item['itemId']};?>>
		&nbsp;No 	<input name="itemCustomerAcceptsRepair_<?=$item['itemId'];?>" type="radio" value="no"<?=${itemCustomerAcceptsRepairNoChecked.'_'.$item['itemId']};?>>
		</td>
	</tr>
	<tr>
		<th>Photos Required</th>
		<td>Yes 	<input name="itemPhotosRequired_<?=$item['itemId'];?>" type="radio" value="yes"<?=${itemPhotosRequiredYesChecked.'_'.$item['itemId']};?>>
		&nbsp;No 	<input name="itemPhotosRequired_<?=$item['itemId'];?>" type="radio" value="no"<?=${itemPhotosRequiredNoChecked.'_'.$item['itemId']};?>>
		</td>
	</tr>
	<?php 
		$imagesArray = $this->fetchFiles('image','resize','items',$item['itemId'],'thumb');
		$filesArray = $this->fetchFiles('file','','items',$item['itemId'],'');
	?>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<th valign="top">Images</th>
		<td>
			<table border="0">
				
		<?php 
		
			if (is_array($imagesArray)) {
				$imageIndex = 0;
				foreach ($imagesArray as $key=>$file) { 
					++$imageIndex;
					//$mysock = getimagesize($file['fullPath'].$file['fileName']);
					$largerResizeArray = $this->fetchFileByFilenameAndLabel($file['fileName'],'large'); 
					?>
			
					<tr>
						<td valign="top">
							<input type="text" name="fileLabel_<?=$item['itemId'];?>_<?=$imageIndex;?>" value="<?=$file['fileTitle']?>" />
							<input type="hidden" name="fileName_<?=$item['itemId'];?>_<?=$imageIndex;?>" value="<?=$file['fileName']?>" />
						</td>
						<td valign="top"></td>
					</tr>
					<tr>
						<td><a href="<?=$largerResizeArray['localPath']?><?=$largerResizeArray['fileName']?>" rel="lightbox" title="<?=$file['fileTitle']?>" alt="<?=$file['fileTitle']?>"><img src="<?=$file['localPath']?><?=$file['fileName']?>" /></a><br />
							<a href="<?=$largerResizeArray['localPath']?><?=$largerResizeArray['fileName']?>" target="_blank" title="<?=$file['fileTitle']?>">Click here to open image in new window</a><br /><br />
						</td>
						<td valign="top">
					<?php 
					
					if ($_SESSION['user']['userType'] == 'admin') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete image <?=$file['fileTitle']?>?','/admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&deleteFile=true&fileId=<?=$file['fileId']?>#items');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
		else {
			if ($this->job['jobAllowUpdate'] == 'yes') { ?>
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete image <?=$file['fileTitle']?>?','/admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&deleteFile=true&fileId=<?=$file['fileId']?>#items');"><img src="/images/trashcan.jpg" /></a>
		<?php } 
			else if ($this->job['jobAllowUpdate'] == 'no') { ?>
				<a>No Update allowed</a>
			<?php }
		
		} ?>
					
					
					
					
					
					<!-- <a href="admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&deleteFile=true&fileId#items=<?=$file['fileId']?>"><img src="/images/trashcan.jpg" /></a> -->
						</td>
					</tr>
					 <?php 
					 //echo($this->imageResize($mysock[0],  $mysock[1], 100)); 
					  } ?>
					  <input type="hidden" name="imageIndex_<?=$item['itemId'];?>" value="<?=$imageIndex;?>" />
			<?php }
		?>
			</table>
		</td>
	</tr>
	<?php 
		
			if (is_array($filesArray)) { ?>
	<tr>
		<th valign="top">Files</th>
		<td>
			<table border="0">
						
		<?php 
		
			
				foreach ($filesArray as $key=>$file) { ?>
				<tr>
					<td><a href="<?=$file['localPath']?><?=$file['fileName']?>"><?=$file['fileName']?></a></td>
					<td valign="top">
				<a href="javascript:void(null);" onMouseUp="javascript:sureCheck('Are you sure you want to delete file?','/admin/jobs/jobedit/?jobId=<?=$this->jobId;?>&deleteFile=true&fileId=<?=$file['fileId']?>#items');"><img src="/images/trashcan.jpg" /></a>
					</td>
				<?php }
			
			?>
			</table>
		</td>
	</tr>
	<?php } ?>


	<tr>
		<th valign="top">Add Images & Files</th>
		<td><input type="hidden" name="imgNo_<?=$item['itemId'];?>" id="imgNo_<?=$item['itemId'];?>" value="1" />
			<div id="itemPhotos_<?=$item['itemId'];?>">
				<input type="file" name="itemPhoto_<?=$item['itemId'];?>_1"  /> 	
			</div>
			<a href="#items" onClick="addImageHtml('itemPhotos_<?=$item['itemId'];?>','imgNo_<?=$item['itemId'];?>','<?=$item['itemId'];?>');">+ Image/File</a>
		</td>
	</tr>
	<tr>
		<th>Replacement Required</th>
		<td>Yes 	<input name="itemReplacementRequired_<?=$item['itemId'];?>" type="radio" value="yes"<?=${itemReplacementRequiredYesChecked.'_'.$item['itemId']};?>>
		&nbsp;No 	<input name="itemReplacementRequired_<?=$item['itemId'];?>" type="radio" value="no"<?=${itemReplacementRequiredNoChecked.'_'.$item['itemId']};?>>
		</td>
	</tr>
	<tr>
		<th valign="top">Description &amp; Cause of Damage</th>
		<td><textarea cols="60" rows="20" name="itemDescriptionAndDamageCause_<?=$item['itemId'];?>"><?= $item['itemDescriptionAndDamageCause'];?></textarea></td>
	</tr>
	
	<tr>
		<th valign="top">Findings/Recommendations<br />Course of Action taken (if any)</th>
		<td><textarea cols="60" rows="20" name="itemFindingsAndRecommendations_<?=$item['itemId'];?>"><?= $item['itemFindingsAndRecommendations'];?></textarea></td>
	</tr>
	
	<tr>
		<th>Quotation Price (inc Vat)</th>
		<td>&pound;<input name="itemQuotationPrice_<?=$item['itemId'];?>" type="text" value="<?= $item['itemQuotationPrice']; ?>" size="8" /></td>
	</tr>
	
	<?php
			switch ($item['itemFaultClass']) {
				case 'Manufacturer fault':
					${manufacturerFaultSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Transit damage':
					${transitDamageSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Accidental':
					${accidentalSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Customer misuse':
					${customerMisuseSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'No fault':
					${noFaultSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Other':
					${otherSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
			}
		?>
	<tr>
		<th>Fault Class</th>
		<td>
			<select name="itemFaultClass_<?=$item['itemId'];?>">
				<option value="">Please Select</option>
				<option value="Manufacturer fault"<?=${manufacturerFaultSelected.'_'.$item['itemId']};?>>Manufacturer fault</option>
				<option value="Transit damage"<?=${transitDamageSelected.'_'.$item['itemId']};?>>Transit damage</option>
				<option value="Accidental"<?=${accidentalSelected.'_'.$item['itemId']};?>>Accidental</option>
				<option value="Customer misuse"<?=${customerMisuseSelected.'_'.$item['itemId']};?>>Customer misuse</option>
				<option value="No fault"<?=${noFaultSelected.'_'.$item['itemId']};?>>No fault</option>
				<option value="Other"<?=${otherSelected.'_'.$item['itemId']};?>>Other</option>
			</select>
		</td>
	</tr>
	<?php
			switch ($item['itemConditionClass']) {
				case 'Very Poor':
					${veryPoorSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Poor':
					${poorSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Average':
					${averageSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Good':
					${goodSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
				case 'Excellent':
					${excellentSelected.'_'.$item['itemId']} = ' SELECTED ';
				break;
			}
		?>
	<tr>
		<th>Condition of furniture</th>
		<td>
		<select name="itemConditionClass_<?=$item['itemId'];?>">
			<option>Please Select</option>
			<option value="Excellent"<?=${excellentSelected.'_'.$item['itemId']};?>>Excellent</option>
			<option value="Good"<?=${goodSelected.'_'.$item['itemId']};?>>Good</option>
			<option value="Average"<?=${averageSelected.'_'.$item['itemId']};?>>Average</option>
			<option value="Poor"<?=${poorSelected.'_'.$item['itemId']};?>>Poor</option>
			<option value="Very Poor"<?=${veryPoorSelected.'_'.$item['itemId']};?>>Very Poor</option>
		</select>
		</td>
	</tr>
	<tr>
		<th valign="top">Parts Required</th>
		<td><textarea cols="60" rows="20" name="itemPartsRequired_<?=$item['itemId'];?>"><?= $item['itemPartsRequired'];?></textarea></td>
	</tr>
	<tr>
		<th>Batch Info</th>
		<td><input name="itemBatchInfo_<?=$item['itemId'];?>" type="text" value="<?= $item['itemBatchInfo']; ?>" /></td>
	</tr>
	<tr>
		<th>Extra Notes</th>
		<td><textarea cols="60" rows="20" name="itemNotes_<?=$item['itemId'];?>"><?= $item['itemNotes']; ?></textarea></td>
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
	</table>
	</div>
	<?php } ?> 
						
<?php } ?>

<script>

	var openItem = '<?=$openItem;?>';
	var openItemTabLink = '<?=$openItemTabLink;?>';
	$(openItemTabLink).style.backgroundColor = '#ccc';
	function OpenCloseItem(divId,itemTabLink) {
			
			//$(itemTab).style.bgcolor = '#C2CBB9';
			if (divId != window.openItem) {
				$(itemTabLink).style.backgroundColor = '#ccc';
				$(openItemTabLink).style.backgroundColor = '#fff';
				
				var style = $(divId).getStyle('display');
				$(window.openItem).style.display = 'none';
				$(divId).style.display = 'block';
				
				window.openItem = divId;
				
				window.openItemTabLink = itemTabLink;
			}
		}
</script>

<?php } else { 

if (is_array($jobItemsArray)) { 
	$index = 1; 
	foreach ($jobItemsArray as $key=>$item) {
	//var_dump($item); 
?>		

<div class="itemWrap">
<table class="includeForPrint printGeneral item" cellspacing="0" cellpadding="5" width="800" border="1">
		
		<tr>
			<th class="red">Item <?=$index;?>&nbsp;</th>
			<td colspan="3"><?= $item['itemType']; ?>&nbsp;</td>
		</tr>
		
		<tr>
			<th valign="top" style="width: 200px;">Supplier:</th>
			<td valign="top" style="width: 200px;"><?=$item['itemSupplier'];?>&nbsp;</td>
			<th style="width: 200px;">Colour:</th>
			<td valign="top" style="width: 200px;"><?=$item['itemColour'];?>&nbsp;</td>
		</tr>
		
		<tr>
			<th>Item Model:</th>
			<td><?=$item['itemModel'];?> &nbsp;<br /></td>
			<th>Item Retail Price:</th>
			<td><?=$item['itemRetailPrice'];?> &nbsp;<br /></td>
		</tr>
		
		<tr>
			<th>Item Sample Required?:</th>
			<td><?=$item['itemSampleRequired'];?> &nbsp;<br /></td>
			<th>Customer accepts repair?:</th>
			<td><?=$item['itemCustomerAcceptsRepair'];?> &nbsp;<br /></td>
		</tr>
		
		<tr>
			<th>Item Photos Required?:</th>
			<td><?=$item['itemPhotosRequired'];?> &nbsp;<br /></td>
			<th>Replacement Required?:</th>
			<td><?=$item['itemReplacementRequired'];?> &nbsp;<br /></td>
		</tr>
		
		<tr>
			<th>Item Order Date:</th>
			<td><?=$item['itemOrderDateFormat'];?> &nbsp;<br /></td>
			<th>Item Delivery Date:</th>
			<td><?=$item['itemDeliveryDateFormat'];?>&nbsp; <br /></td>
		</tr>
		
		
	</table>
	
	<table class="includeForPrint printGeneral item" cellspacing="0" cellpadding="5" width="800" border="1">
		<tr>
			<th>Item Description &amp; Cause of Damage:</th>
		</tr>
		<tr>
			<td valign="top" style="width: 800px; height:50px;"><p class="asIs"><?=nl2br($item['itemDescriptionAndDamageCause']);?></p>&nbsp;</td>
		</tr>
	</table>
	
	<table class="includeForPrint printGeneral noBorder item" cellspacing="0" cellpadding="5" width="800" border="0">
	<tr><th>To debit back to supplier: No / Yes (please circle)</th>
	<th>Amount &nbsp;&nbsp;&nbsp;&pound;..................</th></tr>
	</table>
	
	<table class="includeForPrint printGeneral item" cellspacing="0" cellpadding="5" width="800" border="1">
		<tr>
			<th>Item Findings/Recommended Course of Action/Action Taken (if any):</th>
		</tr>
		<tr>
			<td valign="top" style="width: 800px; height:50px;"><p class="asIs"><?=nl2br($item['itemFindingsAndRecommendations']);?></p>&nbsp;</td>
		</tr>
	</table>
	
	<table class="includeForPrint printGeneral item" cellspacing="0" cellpadding="5" width="800" border="1">
		
		
		<tr>
			<th valign="top" style="width: 200px;">Item Quotation Price (incl VAT):</th>
			<td  valign="top" style="width: 600px;"><?=$item['itemQuotationPrice'];?>&nbsp;</td>
		
			<th valign="top" style="width: 200px;">Item Fault Class:</th>
			<td  valign="top" style="width: 600px;"><?=$item['itemFaultClass'];?>&nbsp;</td>
		</tr>
		
		<tr>
			<th valign="top" style="width: 200px;">Condition of Item:</th>
			<td  valign="top" style="width: 600px;"><?=$item['itemConditionClass'];?>&nbsp;</td>
		
			<th>Parts required:</th><td><p class="asIs"><?=nl2br($item['itemPartsRequired']);?></p></td>
		</tr>
		<!-- <tr>
			<td colspan="2" valign="top" style="width: 800px;"><p class="asIs"><?=nl2br($item['itemPartsRequired']);?></p>&nbsp;</td>
		</tr> -->
		<tr>
			<th valign="top" style="width: 200px;">Item Batch info:</th>
			<td valign="top" style="width: 600px;"><?=$item['itemBatchInfo'];?>&nbsp;</td>
		
			<th>Item extra Notes:</th><td><p class="asIs"><?=nl2br($item['itemNotes']);?>&nbsp;</p></td>
		</tr>
		<!-- <tr>
			<td colspan="2" valign="top" style="width: 800px;"><p class="asIs"><?=nl2br($item['itemNotes']);?>&nbsp;</p></td>
		</tr> -->
		
		
		<!--<tr>
			<th valign="top" style="width: 200px;">Item Quotation Price (incl VAT):</th>
			<td  valign="top" style="width: 600px;"><?=$item['itemQuotationPrice'];?>&nbsp;</td>
		</tr>
		
		<tr>
			<th valign="top" style="width: 200px;">Item Fault Class:</th>
			<td  valign="top" style="width: 600px;"><?=$item['itemFaultClass'];?>&nbsp;</td>
		</tr>
		
		<tr>
			<th valign="top" style="width: 200px;">Condition of Item:</th>
			<td  valign="top" style="width: 600px;"><?=$item['itemConditionClass'];?>&nbsp;</td>
		</tr>
		
		<tr>
			<th>Parts required for item:</th><td><p class="asIs"><?=nl2br($item['itemPartsRequired']);?></p></td>
		</tr> -->
		<!-- <tr>
			<td colspan="2" valign="top" style="width: 800px;"><p class="asIs"><?=nl2br($item['itemPartsRequired']);?></p>&nbsp;</td>
		</tr> -->
		<!--<tr>
			<th valign="top" style="width: 200px;">Item Batch info:</th>
			<td valign="top" style="width: 600px;"><?=$item['itemBatchInfo'];?>&nbsp;</td>
		</tr>
		<tr>
			<th colspan="2" >Item extra Notes:</th><td><p class="asIs"><?=nl2br($item['itemNotes']);?>&nbsp;</p></td>
		</tr> -->
		<!-- <tr>
			<td colspan="2" valign="top" style="width: 800px;"><p class="asIs"><?=nl2br($item['itemNotes']);?>&nbsp;</p></td>
		</tr> -->
		
		
	</table>
	
	</div>


<?php
	++$index; 
	} } } ?>