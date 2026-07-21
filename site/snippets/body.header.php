<header>
	<nav>
		<ol>
			<li>
				<a class="logotype" href="<?= $site->url() ?>" <?php e($page->isOpen(), 'aria-current=page') ?>><span>Entspannt.Digital</span> <span>Digital Design Studio</span></a>
			</li>
			<?php foreach($site->children()->listed() as $item): ?>
			<li>
				<a href="<?= $item->url() ?>" <?php e($item->isOpen(), 'aria-current=page') ?>><?= $item->title() ?></a>
			</li>
			<?php endforeach; ?>
		</ol>
	</nav>
</header>
