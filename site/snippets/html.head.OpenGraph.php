<?php //The following snippet automatically adds all available Open Graph metadata. It uses defaults, if made available in the site-settings

	// Define the OG category
	$OGKind = "website"; //Default
	//If the user did not manually set a category, attempt to infer it
	$OGKindTry = ($page->OGKind()->isNotEmpty()) ? $page->OGKind() : $page->template()->name();
	if(in_array($OGKindTry, [
			'article',
			'product',
			'profile',
			'website'
	])){
		$OGKind = $OGKindTry;
	}

	//OG image
	if($page->OGImage()->isNotEmpty()): ?>
		<meta property="og:image" content="<?= $page->OGImage()->toFile()->URL() ?>">
	<?php elseif($site->OGImage()->isNotEmpty()): ?>
		<meta property="og:image" content="<?= $site->OGImage()->toFile()->URL() ?>">
	<?php endif;

	//OG Description
	if($page->teaser()->isNotEmpty() || $site->description()->isNotEmpty()): ?>
		<meta property="og:description" content="<?= $page->teaser()->unhtml() ?>">
	<?php endif;

	//OG Article
	if($OGKind == "article"):
		// > Author
		if($page->author()->isNotEmpty()): ?>
			<meta property="article:author" content="<?= $kirby->user($page->author())->name() ?>">
			<?php if($kirby->user($page->author())->fediverseAccount()->isNotEmpty()): ?>
				<meta property="fediverse:creator" content="<?= $kirby->user($page->author())->fediverseAccount() ?>" />
			<?php endif;
		endif;

		//OG Article > Section
		if($page->category()->isNotEmpty()): ?>
			<meta property="article:section" content="<?= $page->category() ?>">
		<?php endif;

		//OG Article > Tags
		foreach($page->tags()->split() as $tag): ?>
			<meta property="article:tag" content="<?= $tag ?>">
		<?php endforeach;
	endif; //is article


	//OG Product > Plural title
	if($page->pluralTitle()->isNotEmpty()): ?>
		<meta property="product:plural_title" content="<?= $page->pluralTitle() ?>">
	<?php endif;

	//OG Profile
	if($OGKind == "profile"):
		// > First name
		if($page->firstName()->isNotEmpty()): ?>
			<meta property="profile:first_name" content="<?= $page->firstName() ?>">
		<?php endif;

		// > Last name
		if($page->lastName()->isNotEmpty()): ?>
			<meta property="profile:last_name" content="<?= $page->lastName() ?>">
		<?php endif;

		// > Username
		if($page->username()->isNotEmpty()): ?>
			<meta property="profile:username" content="<?= $page->username() ?>">
		<?php endif;
	endif; //is profile
?>
<meta property="og:type" content="<?= $OGKind ?>">
<meta property="og:title" content="<?= $page->title() ?> (<?= $site->title() ?>)">
<meta property="og:url" content="<?= $page->permalink() ?>">
