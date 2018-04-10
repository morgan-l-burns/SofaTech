<?php
	$users = $this->users;
?>
<p class="message">All of your current clients are listed below.  You can manage your clients with the buttons to the right of each one, or add new clients with the Add Client tab above.</p><br />
<div class="clientBoxesOuter clients">
<table class="clients clientBoxes" width="100%" cellpadding="5">
	<tr>
		<th>Client Name</th>
		<!-- <th>Email Address</th>
		<th>Password</th> -->

		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php foreach ($users as $user) { ?>
		<tr class="even">
			<td width="100%"><?= $user['clientName']; ?></td>
			<!-- <td nowrap><?= $user['userEmail']; ?></td>
			<td nowrap><?= $user['userPassword']; ?></td> -->

			<td nowrap><form action="/admin/users/clientedit/" method="post"><input name="clientId" type="hidden" value="<?= $user['clientId']; ?>" /><input name="editClient" type="image" src="/images/edit.jpg" alt="Edit Client" /></form></td>
			<td nowrap>
			
			<?php
			if ($user['clientAllowDelete'] == 'no') { ?>
				<img src="/images/noTrashcan.jpg" alt="delete not allowed" title="delete not allowed">
			<?php } else { ?>
			<form action="/admin/users/clientdelete/" method="post"><input name="clientId" type="hidden" value="<?= $user['clientId']; ?>" /><input name="deleteClient" type="image" src="/images/trashcan.jpg" alt="Delete Client <?= $user['clientName']; ?>" title="Delete Client <?= $user['clientName']; ?>" onClick="return confirm('Are you sure you want to delete <?= $user['clientName']; ?>?')" /></form>
			<?php } ?>
			</td>
		</tr>
	<?php } ?>
</table>
</div>

<p style="height:400px; width:750px;"></p>
