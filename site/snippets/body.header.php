<header>
	<nav>
		<ol>
			<li>
				<a class="logotype" href="<?= $site->url() ?>" <?php e($page->isHomePage(), 'aria-current=page') ?>><span>Entspannt.Digital</span> <span>Digital Design Studio</span></a>
			</li>
			<?php if($site->children()->count() > 0) : ?>
				<li id="menu-anchor">
					<div class="menu-toggle"><label for="menu-check"><span aria-hidden="true"><?= t('menu-toggle.label') ?></span><span class="visually-hidden"><?= t('menu-toggle.aria') ?></span></label><input type="checkbox" id="menu-check" role="switch" /></div>
					<ol id="toggle-menu" aria-label="<?= t('menu-toggle.menu-list-label') ?>">
						<?php foreach($site->children()->listed() as $item): ?>
						<li>
							<a href="<?= $item->url() ?>" <?php e($item->isOpen(), 'aria-current=page') ?>><?= $item->title() ?></a>
						</li>
						<?php endforeach; ?>
					</ol>
				</li>

			<?php endif; ?>
		</ol>
	</nav>
</header>
