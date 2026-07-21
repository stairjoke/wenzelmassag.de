<!DOCTYPE html>
<html lang="en">
	<?php snippet('html.head'); ?>
	<body>
		<?php snippet('body.header') ?>
		<main>
			<?php
			/*
				Display an image respecting light and dark mode, if the field `headlineType` is set to "image"
			*/
			if($page->headlineType() == "image"): ?>
				<div class="grid-row">
					<div class="column" style="--span:2">
						<h1>
							<picture>
							<?php $headlineImage = $page->headlineImage()->toFiles();
							foreach($headlineImage as $image) : ?>
								<source srcset="<?= $image->url() ?>" media="(prefers-color-scheme: <?= $image->colorscheme() ?>)" />
							<?php endforeach; ?>
								<img srcset="<?= $headlineImage->first()->url() ?>" alt="<?= $headlineImage->first()->alt() ?>" />
							</picture>
						</h1>
					</div>
				</div>
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
				<div class="column" style="--span:<?= $column->span(2) ?>">
					<?= $column->blocks() ?>
				</div>
				<?php endforeach ?>
			</div>
			<?php endforeach ?>
		</main>
		<?php snippet('body.footer') ?>
	</body>
</html>
