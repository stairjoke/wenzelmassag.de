<?php
	$formFields = $block->formFields()->split();
	if(count($formFields) > 0){
		$name = in_array('name', $formFields);
		$email = in_array('email', $formFields);
		$fon = in_array('fon', $formFields);
		$replyVia = in_array('reply-via', $formFields);
		$message = in_array('message', $formFields);
		$files = in_array('files', $formFields);
		$captcha = in_array('captcha', $formFields);
	}
?>

<form>
	<?php if($name) : ?>
	<div class="input">
		<label for="name"><?= t('name', 'Name') ?></label>
		<input id="name" name="name" type="text" />
	</div>
	<?php endif;
	if($email): ?>
	<div class="input">
		<label for="email"><?= t('email', 'Email') ?></label>
		<input id="email" name="email" type="email" />
	</div>
	<?php endif;
	if($fon): ?>
	<div class="input">
		<label for="fon"><?= t('phone', 'Phone') ?></label>
		<input id="fon" name="fon" type="tel" />
	</div>
	<?php endif;
	if($replyVia): ?>
	<fieldset class="input">
		<label><input name="replyVia" type="radio" value="none" /><?= t('noPreference', 'no preference') ?></label>
		<label><input name="replyVia" type="radio" value="phone" /><?= t('callback', 'call back') ?></label>
		<label><input name="replyVia" type="radio" value="email" /><?= t('email', 'email') ?></label>
	</fieldset>
	<?php endif;
	if($message): ?>
	<div class="input big">
		<label for="message"><?= t('message', 'Message') ?></label>
		<textarea id="message" name="message"></textarea>
	</div>
	<?php endif;
	if($files): ?>
	<div class="input big">
		<label for="file"><?= t('fileAttachment', 'File attachment') ?></label>
		<input id="file" name="file" type="file" />
	</div>
	<?php endif;
	if($captcha): ?>
	<div class="input">
		<label for="captcha"><?= t('spamProtection', 'SPAM protection') ?></label>
		<input id="captcha" name="captcha" type="text" />
	</div>
	<?php endif ?>

	<input name="key" type="hidden" value="" />
	<input type="submit" value="<?= t('submitForm', 'send') ?>" />
</form>
