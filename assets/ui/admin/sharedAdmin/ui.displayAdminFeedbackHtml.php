<?php if (is_array($_SESSION['feedback'])) { ?>
	<p id="feedback">
		<?php foreach ($_SESSION['feedback'] as $feedback) { ?>
			<?=$feedback;?><br />		
		<?php } ?>
	</p>
<?php
	unset($_SESSION['feedback']);
} ?>
					
<?php if (is_array($_SESSION['error'])) { ?>
	<p id="error">
		<?php foreach ($_SESSION['error'] as $error) { ?>
			<?=$error;?><br />
		<?php } ?>
	</p>
<?php
	unset($_SESSION['error']);
} ?>
