<?php // The following code automatically adds all pages of type feed as <link/> elements to make them discoverable.
	$allFeeds = site()->index()->template("feed");
	foreach($allFeeds as $feed) :
?>
	<link rel="alternate" type="application/rss+xml" title="<?= $feed->title() ?>" href="<?= $feed->url() ?>" />
<?php
	endforeach;
?>
