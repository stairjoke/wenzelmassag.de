<!DOCTYPE html>
<html lang="en">
	<?php snippet('body.head'); ?>
	<body>
		<header></header>
		<main>
			<?php
			/*
				Display an image respecting light and dark mode, if the field `headlineType` is set to "image"
			*/
			if($page->headlineType() == "image"): ?>
				<picture>
				<?php $headlineImage = $page->headlineImage()->toFiles();
				foreach($headlineImage as $image) : ?>
					<source srcset="<?= $image->url() ?>" media="(prefers-color-scheme: <?= $image->colorscheme() ?>)" />
				<?php endforeach; ?>
					<img srcset="<?= $headlineImage->first()->url() ?>" alt="<?= $headlineImage->first()->alt() ?>" />
				</picture>
			<?php endif; // headline is image

			/*
				Render the layout field as a simple layout:

				<div class=grid-row>
					<div class=column style="--span: X">
						[BLOCKS content]
					</div>
				</div>
			*/
			foreach ($page->layout()->toLayouts() as $layout): ?>
			<div class="grid-row">
				<?php foreach ($layout->columns() as $column): ?>
				<div class="column" style="--span:<?= $column->span() ?>">
					<?= $column->blocks() ?>
				</div>
				<?php endforeach ?>
			</div>
			<?php endforeach ?>
		</main>
		<footer></footer>
	</body>
</html>
