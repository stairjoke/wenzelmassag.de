<!DOCTYPE html>
<html lang="<?= $kirby->language()->code() ?>">
	<?php snippet('html.head'); ?>
	<body>
		<?php snippet('body.header') ?>
		<main class="text">
			<h1><?= $page->title() ?></h1>
			<?= $page->text()->kt() ?>
		</main>
		<?php snippet('body.footer') ?>
	</body>
</html>
