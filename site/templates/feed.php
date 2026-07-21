<?php
// The field 'childrenOf' may be used to define the page of which the children should be added to the feed.
// Otherwise the feed will contain the children of the feed-pages parent page.
$pageNode = $page->childrenOf()->toPage() ?? $page->parent();
$feedCollection = $pageNode->children()->listed()->limit(10);


// The field `feedName` may be used to set an optional addendum to the feed title

// Title is site-title/page-title
$title = $site->title();

// If the feed shows the site-children, do not amend the site-title
if($page->feedName()->isNotEmpty()) {
	$title .= ' > ' . $page->feedName()->value();
}else{
	$title .= ' > ' . $pageNode->title();
}


// The field 'feedContent' may be used to map any field of the child pages as the content of the feed preview
$textfield = ($page->feedContent()->isNotEmpty()) ? $page->feedContent()->value() : 'text';

// Set up feed
$options = [
	'title' => $title,
	'textfield' => $textfield
];

// Return feed
echo $feedCollection->feed($options);
