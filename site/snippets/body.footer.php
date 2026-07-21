<footer>
	<?php
		$links = $site->links()->toStructure();
		foreach($links as $link):
			$rel = ($link->rel()->isNotEmpty()) ? $link->rel() : false;
			?>
			<a<?= e($rel, ' rel="' . $rel . '"') ?> href="<?= $link->href()->toUrl() ?>"><?= $link->text() ?></a>
		<?php endforeach;
	?>
</footer>
