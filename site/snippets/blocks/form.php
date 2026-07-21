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

<form class="form-block">
	<?php if($name) : ?>
	<div class="input">
		<label for="name"><?= t('name', 'Name') ?>*</label>
		<input id="name" name="name" type="text" placeholder="<?= t('form-block.name-placeholder', 'How may I call you?') ?>" required />
	</div>
	<?php endif;
	if($email): ?>
	<div class="input">
		<label for="email"><?= t('email', 'Email') ?>*</label>
		<input id="email" name="email" type="email" placeholder="<?= t('form-block.email-placeholder', "So I can reply to you.") ?>" required />
	</div>
	<?php endif;
	if($fon): ?>
	<div class="input">
		<label for="fon"><?= t('phone', 'Phone') ?>*</label>
		<input id="fon" name="fon" type="tel" placeholder="<?= t('form-block.fon-placeholder', "Old fashioned? Maybe.") ?>" required />
	</div>
	<?php endif;
	if($replyVia): ?>
	<fieldset class="input">
		<legend><?= t('form-block.prefer-reply-via', "Preference • Callback or email?") ?></legend>
		<label><input name="replyVia" type="radio" value="none" /><?= t('no-preference', 'no preference') ?></label>
		<label><input name="replyVia" type="radio" value="phone" /><?= t('callback', 'call back') ?></label>
		<label><input name="replyVia" type="radio" value="email" /><?= t('email', 'email') ?></label>
	</fieldset>
	<?php endif;
	if($message): ?>
	<div class="input big">
		<label for="message"><?= t('message', 'Message') ?>*</label>
		<textarea id="message" name="message" placeholder="<?= t('form-block.message-placeholder', "How do I make you a happy customer?") ?>" required></textarea>
	</div>
	<?php endif;
	if($files): ?>
	<div class="input big">
		<label for="file"><?= t('form-block.file-attachment', 'File attachment') ?></label>
		<input id="file" name="file" type="file" />
	</div>
	<?php endif;
	if($captcha): ?>
	<div class="input big">
		<label for="captcha"><?= t('form-block.spam-protection', 'SPAM protection') ?>* • <?= t('form-block.spam-challenge', "Please add these two numbers and enter the result") ?>: <?php $one = rand(1, 5); $two = rand(1, 5); echo($one . ", " . $two) ?></label>
		<input id="captcha" name="captcha" type="number" placeholder="<?= I18n::template('form-block.spam-placeholder', "Please add " . $one . " and " . $two, ['one' => $one, 'two' => $two]) ?>" required />
	</div>
	<?php endif ?>

	<input name="key" type="hidden" value="<?= hash('md5', $one + $two) ?>" />
	<input type="submit" value="<?= t('form-block.submit', 'send') ?>" />
	<p>* <?= t('form-block.obligatory', "Obligatory field.") ?></p>
</form>
