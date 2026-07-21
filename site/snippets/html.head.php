<head>
	<title><?= $page->title() ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= css([
		'assets/css/styles.css',
		'@auto'
	]); ?>
	<?php
		snippet("html.head.Feeds");
		snippet("html.head.OpenGraph");
	?>
</head>
