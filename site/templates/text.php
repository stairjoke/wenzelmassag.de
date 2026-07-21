<!DOCTYPE html>
<html lang="en">
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
