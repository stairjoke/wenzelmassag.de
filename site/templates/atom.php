<?php
header('Content-Type: application/atom+xml; charset=utf-8');

// Fetch the parent page and its children (entries)
$entries = $page->parent()->children()->listed();

// Determine the latest updated date from entries
$latestUpdated = $entries->sortBy('pubDate', 'desc')->first()?->pubDate();
foreach ($entries as $entry) {
		if ($entry->editedDate()->isNotEmpty() && ($latestUpdated === null || $entry->editedDate() > $latestUpdated)) {
				$latestUpdated = $entry->editedDate();
		}
}
?>
<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="<?= $kirby->language()->code() ?>">
		<!-- Feed Metadata -->
		<id><?= $page->parent()->permalink() ?></id>
		<title type="text"><?= $page->parent()->feedTitle() ?></title>
		<updated><?= $latestUpdated->toDate('c') ?></updated>
		<?php if ($page->parent()->feedDescription()->isNotEmpty()): ?>
			<subtitle type="text"><?= $page->parent()->feedDescription() ?></subtitle>
		<?php endif; ?>
		<?php if ($site->copyrightString()->isNotEmpty()): ?>
				<rights type="text"><?= $site->copyrightString() ?></rights>
		<?php endif ?>
		<generator uri="https://codeberg.org/Entspannt-Digital/custom-kirby-kit" version="1.0">Custom Kirby Kit</generator>
		<?php if ($page->parent()->feedCategory()->isNotEmpty()): ?>
				<category term="<?= $page->parent()->feedCategory() ?>" />
		<?php endif ?>

		<!-- Feed Links -->
		<link rel="alternate" type="text/html" href="<?= $page->parent()->permalink() ?>" />
		<link rel="self" type="application/atom+xml" href="<?= $page->parent()->url() ?>/feed.xml" />

		<!-- Feed Icons and Logo -->
		<?php if ($site->faviconSVG()->isNotEmpty()): ?>
				<icon><?= $site->faviconSVG()->url() ?></icon>
		<?php else: ?>
				<icon><?= $site->faviconDefault()->url() ?></icon>
		<?php endif ?>

		<?php
		// The iPhone’s 60pt@3x size requirement for app icons happens to be the same as the 120px suggested size for feed logos
		$logo = $site->appIcons()->toFiles()->findBy('filename', 'iphone-icon@3x.png') ?? $site->appIcons()->toFiles()->first();
		if ($logo): ?>
				<logo><?= $logo->url() ?></logo>
		<?php endif ?>

		<!-- Entries -->
		<?php foreach ($entries as $entry): ?>
				<entry>
						<id><?= $entry->permalink() ?></id>
						<title type="text"><?= $entry->title() ?></title>
						<?php if ($entry->editedDate()->isNotEmpty()): ?>
								<updated><?= $entry->editedDate()->toDate('c') ?></updated>
						<?php endif ?>
						<published><?= $entry->pubDate()->toDate('c') ?></published>

						<?php if ($author = $entry->author()->toUser()): ?>
								<author>
										<name><?= $author->name() ?></name>
										<email><?= $author->email() ?></email>
								</author>
						<?php endif ?>

						<link rel="alternate" type="text/html" href="<?= $entry->permalink() ?>" />

						<content type="html">
								<![CDATA[
								<?= $entry->text()->kt() ?>
								]]>
						</content>

						<?php if ($entry->category()->isNotEmpty()): ?>
								<category term="<?= $entry->category() ?>" />
						<?php endif ?>
				</entry>
		<?php endforeach ?>
</feed>
