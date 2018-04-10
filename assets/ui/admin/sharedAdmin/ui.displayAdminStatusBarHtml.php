<!-- START: ui.displayAdminStatusBarHtml.php -->
		<div id="statusBar">
			<?php if ($this->contentType == 'login') { ?>
			<form action="/admin/users/login/" method="post">
				<p>
					Please sign in. <strong>Email:</strong><input name="userEmail" type="text" value="<?= $_POST['userEmail']; ?>" /> 
					&nbsp;<strong>Password:</strong><input name="userPassword" type="password" value="" />
					 <!-- &nbsp;<strong>Your Name:</strong><input name="userName" type="text" value="<?= $_POST['userName']; ?>" /> -->
					 <input name="login" type="submit" value="Sign in" class="submit" />  <!--[ <a href="register.php">Not yet registered?</a> | <a href="help.php">Need help?</a> ] -->
				</p>
			</form>
			<?php } else { ?>
				<p><?= $this->content; ?></p>
			<?php } ?>
		</div>
<!-- END: ui.displayAdminStatusBarHtml.php -->