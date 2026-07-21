<?php

/** @var \Kirby\Cms\Block $block */
$alt     = $block->alt();
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$link    = $block->link();
$ratio   = $block->ratio()->or('auto');
$src     = null;

if ($block->location() == 'web') {
		$src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
		$alt = $alt->or($image->alt());
		$src = $image->url();
		$dominantColor = $image->color();
		$shadow = $image->shadow()->toBool();
		$caption = $caption->or($image->caption());
}

?>
<?php if ($src): ?>
<figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
	<?php if ($link->isNotEmpty()): ?>
	<a href="<?= Str::esc($link->toUrl()) ?>">
		<img src="<?= $src ?>" alt="<?= $alt->esc() ?>" style="--dominant-color: <?= $dominantColor ?>" class="<?= e($shadow, null, 'noShadow') ?>">
	</a>
	<?php else: ?>
	<img src="<?= $src ?>" alt="<?= $alt->esc() ?>" style="--dominant-color: <?= $dominantColor ?>" class="<?= e($shadow, null, 'noShadow') ?>">
	<?php endif ?>

	<?php if ($caption->isNotEmpty()): ?>
	<figcaption>
		<p><?= $caption ?></p>
	</figcaption>
	<?php endif ?>
</figure>
<?php endif ?>
