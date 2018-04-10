<?php
$startYear = date('Y')-5;
$endYear = date('Y')+5;

$startMonth = 1;
$endMonth = 12;

?>

<table id="changeVisitDetails">
		<tr>
		
			<td>Month From:</td>
			<td>	
				<select name="monthFrom">
				<?php
				for ($i = $startMonth; $i <= $endMonth; ++$i) { 
					if ($i == $_SESSION['calendar']['monthFrom']) $selected = ' selected';
					else $selected = '';	
				?>
					<option value="<?=$i?>"<?=$selected;?>><?= date("M", mktime(0, 0, 0, $i, 1, 0));?></option>
				<?php 
				} 
				?>
				</select>
			</td>
			
			<td>Year From</td> 
			<td><select name="yearFrom">
			
			<?php
				for ($i = $startYear; $i < $endYear; ++$i) { 
					if ($i == $_SESSION['calendar']['yearFrom']) $selected = ' selected';
					else $selected = '';	
					?>
					<option value="<?=$i?>"<?=$selected;?>><?=$i;?></option>
				<?php 
				} 
			?>
					
				</select>
			</td>
			
			
		</tr>
		
		<tr>
		
			<td>Month To:</td>
			<td>
				<select name="monthTo">
				<?php
				for ($i = $startMonth; $i <= $endMonth; ++$i) { 
					if ($i == $_SESSION['calendar']['monthTo']) $selected = ' selected';
					else $selected = '';	
				?>
					<option value="<?=$i?>"<?=$selected;?>><?= date("M", mktime(0, 0, 0, $i, 1, 0));?></option>
				<?php 
				} 
				?>
				</select>
			</td>
			<td>Year To</td>
			<td>
			 	<select name="yearTo">
			<?php
				for ($i = $startYear; $i < $endYear; ++$i) { 
					if ($i == $_SESSION['calendar']['yearTo']) $selected = ' selected';
					else $selected = '';	
				?>
					<option value="<?=$i?>"<?=$selected;?>><?=$i;?></option>
				<?php 
				} 
			?>
				</select>
			</td>
			
		</tr>
		<tr><td><input name="changeJobViewingDates" type="image" src="/images/buttonGo.gif" alt="Job Search" /></td></tr>
	</table>