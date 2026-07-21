<table>
	<tr>
		<td>Name:</td>
		<td><?= $name ?></td>
	</tr>
	<tr>
		<td>E-Mail:</td>
		<td><?= $email ?></td>
	</tr>
	<tr>
		<td>Telefon:</td>
		<td><?= $fon ?></td>
	</tr>
	<tr>
		<td>Antwort-Präferenz:</td>
		<td><?= $replyVia ?></td>
	</tr>
	<tr>
		<td>Datenschutzerklärung akzeptiert:</td>
		<td><?= $privacy ?></td>
	</tr>
</table>
<br />
<?= nl2br($message) ?>
