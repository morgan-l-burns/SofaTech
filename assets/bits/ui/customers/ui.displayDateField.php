

<select name="day_<?=$this->fieldPrefix;?>">
<?php for ($i = $this->displayDayFrom; $i <= $this->displayDayTo; ++$i) { 
	if ($this->selectedDay == $i) $selected = ' selected';
	else $selected = '';
	if ($i < 10) $displayDay = '0'.$i;
	else $displayDay = $i;
?>
	<option<?=$selected;?> value="<?=$displayDay;?>"><?=$displayDay;?></option>
<?php } ?>
</select>

<select name="month_<?=$this->fieldPrefix;?>">
<?php for ($i = $this->displayMonthFrom; $i <= $this->displayMonthTo; ++$i) { 
	$month = date("M", mktime(0, 0, 0, $i, 1, 0));
	$displayMonth = date("m", mktime(0, 0, 0, $i, 1, 0));
	if ($this->selectedMonth == $i) $selected = ' selected';
	else $selected = '';
?>
	<option<?=$selected;?> value="<?=$displayMonth;?>"><?=$month;?></option>
<?php } ?>
</select>

<select name="year_<?=$this->fieldPrefix;?>">
<?php for ($i = $this->displayYearFrom; $i <= $this->displayYearTo; ++$i) {
		if ($this->selectedYear == $i) $selected = ' selected';
		else $selected = '';
 ?>
	<option<?=$selected;?> value="<?=$i;?>"><?=$i;?></option>
<?php } ?>
</select>

<?php if ($this->showTime) { ?>
<br /><select name="hour_<?=$this->fieldPrefix;?>">
<?php
	for ($i=0; $i<24; ++$i) { 
		if ($i < 10) $displayHour = '0'.$i;
		else $displayHour = $i; 
		if ($this->selectedHour == $displayHour) $selected = ' selected';
		else $selected = ''; ?>
	<option<?=$selected;?> value="<?=$displayHour;?>"><?=$displayHour;?></option>	
		
<?php }?>

</select>
<select name="minute_<?=$this->fieldPrefix;?>">
<?php
	for ($i=0; $i<60; ++$i) { 
		if ($i < 10) $displayMinue = '0'.$i;
		else $displayMinue = $i; 
		if ($this->selectedMinute == $displayMinue) $selected = ' selected';
		else $selected = ''; ?>
	<option<?=$selected;?> value="<?=$displayMinue;?>"><?=$displayMinue;?></option>	
		
<?php }?>
</select>
<?php } ?>

