<article class="responsive-card">
	<?php if($title = $block->title()): ?>
	<h3><?= $title ?></h3>
	<?php endif; ?>

	<?php if($image = $block->image()->toFile()) :
		$sizes = "(width < 38rem) calc(100vw - 2rem), (width >= 38rem) calc(50vw - 6rem)";
		$shadow = ($image->shadow()->isNotEmpty()) ? $image->shadow()->toBool() : true;

		$alt           = $image->alt();
		$caption       = $image->caption();
		$dominantColor = $image->color();
		$shadow        = ($image->shadow()->isNotEmpty()) ? $image->shadow()->toBool() : true;
	?>
	<div class="image-container <?= e($shadow, 'shadow') ?>" style="--dominant-color: <?= $dominantColor ?>" class="<?= e($shadow, null, 'noShadow') ?>">
		<figure>
			<?php $sizes = "(max-width: 38rem) calc(100vw - 2rem), calc(100vw - 6rem)"; ?>
			<picture>
				<source srcset="<?= $image->srcset('column-avif') ?>" sizes="<?= $sizes ?>" type="image/avif" />
				<source srcset="<?= $image->srcset('scolumn-webp') ?>" sizes="<?= $sizes ?>" type="image/webp" />
				<img alt="<?= $image->alt() ?>" src="<?= $image->resize(576)->url()?>" srcset="<?= $image->srcset('column') ?>" sizes="<?= $sizes ?>" width="576" height="<?= $image->resize(576)->height() ?>"/>
			</picture>
			<?php if ($caption->isNotEmpty()): ?>
				<figcaption inert>
					<p><?= $caption ?></p>
				</figcaption>
			<?php endif ?>
		</figure>
	</div>
	<?php endif; ?>

	<?php if($text  = $block->text()) : ?>
	<div class="card-text">
		<?= $text->kt() ?>
	</div>
	<?php endif; ?>
</article>
