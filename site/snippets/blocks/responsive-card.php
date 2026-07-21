<div class="responsive-card">
	<?php if($title = $block->title()): ?>
	<h3><?= $title ?></h3>
	<?php endif; ?>

	<?php if($image = $block->image()->toFile()) :
$sizes = "(max-width: 38rem) calc(100vw - 2rem),
 calc(33rem)";
	?>
	<picture>
		<source srcset="<?= $image->srcset('column-avif') ?>" sizes="<?= $sizes ?>" type="image/avif" />
		<source srcset="<?= $image->srcset('scolumn-webp') ?>" sizes="<?= $sizes ?>" type="image/webp" />
		<img alt="<?= $image->alt() ?>" src="<?= $image->resize(264)->url()?>" srcset="<?= $image->srcset('column') ?>" sizes="<?= $sizes ?>" width="264" height="264"/>
	</picture>
	<?php endif; ?>

	<?php if($text  = $block->text()) : ?>
	<div class="card-text">
		<?= $text->kt() ?>
	</div>
	<?php endif; ?>
</div>
