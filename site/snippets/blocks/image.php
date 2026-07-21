<?php
	if ($image = $block->image()->toFile()) {
		$alt           = $block->alt()->or($image->alt());
		$caption       = $block->caption()->or($image->caption());
		$ratio         = $block->ratio()->or('auto');
		$dominantColor = $image->color();
		$shadow        = ($image->shadow()->isNotEmpty()) ? $image->shadow()->toBool() : true;

		$crop          = $block->crop()->isTrue();
	}
?>


<?php if ($image): ?>
	<div class="image-container <?= e($shadow, 'shadow') ?>" style="--dominant-color: <?= $dominantColor ?>" class="<?= e($shadow, null, 'noShadow') ?>">
		<figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
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
<?php endif ?>
