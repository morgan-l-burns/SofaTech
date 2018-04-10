<?php
	$users = $this->users;
?>
<p class="message">All of your current users are listed below.  You can manage your users with the buttons to the right of each one, or add new user with the Add User tab above.</p><br />
<div class="clientBoxesOuter clients">
<table class="clients clientBoxes" width="100%" cellpadding="5">
	<tr>
		<th>User Name</th
		<th>Client Name</th>
		<th>Email Address</th>
		<th>Password</th>

		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php foreach ($users as $user) { ?>
		<tr class="even">
			<td width="100%"><?= $user['userName']; ?></td>
			<td width="100%"><?= $user['clientName']; ?></td>
			<td nowrap><?= $user['userEmail']; ?></td>
			<td nowrap><?= $user['userPassword']; ?></td>

			<td nowrap><form action="/admin/users/useredit/" method="post"><input name="userId" type="hidden" value="<?= $user['userId']; ?>" /><input name="editUser" type="image" src="/images/edit.jpg" alt="Edit User" /></form></td>
			<td nowrap><form action="/admin/users/userdelete/" method="post"><input name="userId" type="hidden" value="<?= $user['userId']; ?>" /><input name="deleteUser" type="image" src="/images/trashcan.jpg" alt="Delete User" onClick="return confirm('Are you sure you want to delete <?= $user['userName']; ?>?')" /></form></td>
		</tr>
	<?php } ?>
</table>
</div>

<p style="height:400px; width:750px;"></p>
