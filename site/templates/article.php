<!DOCTYPE html>
<html lang="<?= $kirby->language()->code() ?>">
	<?php snippet('body.head'); ?>
	<body>
		Article
		<?= $page->text()->kt() ?>
	</body>
</html>
