<title><?= $page->title() ?> (<?= $site->title() ?>)</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if($site->favicoDefault()->isNotEmpty()): ?>
<!-- User defined Favicon overriding /favicon.ico -->
<link rel="icon" type="image/vnd.microsoft.icon" href="<?= $site->favicoDefault()->toFile()->url() ?>">
<?php endif; ?>

<!-- Generic JS -->
<!--<script src="/assets/js/script.js"></script>-->

<!-- Template specific JS -->
<!--<?= js('@auto') ?>-->

<!-- Generic CSS -->
<?= css(['assets/css/styles.css']); ?>

<!-- Template specific CSS -->
<?= css(['@auto']); ?>

<!-- Feeds and OpenGraph -->
<?php
	snippet("head.Feeds");
	snippet("head.OpenGraph");
?>
<meta name="generator" content="Kirby CMS (getkirby.com)" />
<!-- This Website was built using the Custom Kirby Kit: https://codeberg.org/Entspannt-Digital/custom-kirby-kit and the Kirby CMS: https://getkirby.com -->
