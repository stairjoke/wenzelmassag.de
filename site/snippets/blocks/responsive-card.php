<article class="responsive-card">
	<?php if($title = $block->title()): ?>
	<h3><?= $title ?></h3>
	<?php endif; ?>

	<?php if($image = $block->image()->toFile()) :
		$sizes = "(max-width: 38rem) calc(100vw - 2rem), calc(50vw - 6rem)";
		$shadow = ($image->shadow()->isNotEmpty()) ? $image->shadow()->toBool() : true;
	?>
	<picture <?= e($image->color()->isNotEmpty(), 'style="--dominant-color:'.$image->color().'"'); ?>>
		<source srcset="<?= $image->srcset('column-avif') ?>" sizes="<?= $sizes ?>" type="image/avif" />
		<source srcset="<?= $image->srcset('scolumn-webp') ?>" sizes="<?= $sizes ?>" type="image/webp" />
		<img alt="<?= $image->alt() ?>" src="<?= $image->resize(264)->url()?>" srcset="<?= $image->srcset('column') ?>" sizes="<?= $sizes ?>" <?= e($shadow, 'class="shadow"') ?> width="264" height="<?= $image->resize(264)->height() ?>"/>
	</picture>
	<?php endif; ?>

	<?php if($text  = $block->text()) : ?>
	<div class="card-text">
		<?= $text->kt() ?>
	</div>
	<?php endif; ?>
</article>
