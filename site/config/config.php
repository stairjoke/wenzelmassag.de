<?php
return [
	'panel' => [
		'vue' => [
			'compiler' => false
		]
	],
	'languages' => true, //This enables neat features also useful whenbuilding a website with only one language. Additionally, switching an existing website to multi-language once it has content is cumbersome. Its easier to enable multi-language support and only configure one language.
	'cache' => [
		'pages' => true
	],
	'hooks' => [
		'route:before' => function ($route, $path, $method) {
			header('Cache-Control: public, max-age=31365000');
		}
	],
	'thumbs' => [
		'srcsets' => [
			'column' => [
				/* 1/2 column @1x max 33rem */
				'264w' => ['width' => 264],
				/* 1/2 column @2x max 33rem, 1/1 column @1x max 36rem */
				'576w' => ['width' => 576],
				/* 1/1 column @2x max 36rem */
				'1152w' => ['width' => 1152],
				/* 1/1 column @3x max 36rem */
				'1728w' => ['width' => 1728]
			],
			'column-avif' => [
				/* 1/2 column @1x max 33rem */
				'264w' => ['width' => 264, 'format' => 'avif'],
				/* 1/2 column @2x max 33rem, 1/1 column @1x max 36rem */
				'576w' => ['width' => 576, 'format' => 'avif'],
				/* 1/1 column @2x max 36rem */
				'1152w' => ['width' => 1152, 'format' => 'avif'],
				/* 1/1 column @3x max 36rem */
				'1728w' => ['width' => 1728, 'format' => 'avif']
			],
			'column-webp' => [
				/* 1/2 column @1x max 33rem */
				'264w' => ['width' => 264, 'format' => 'webp'],
				/* 1/2 column @2x max 33rem, 1/1 column @1x max 36rem */
				'576w' => ['width' => 576, 'format' => 'webp'],
				/* 1/1 column @2x max 36rem */
				'1152w' => ['width' => 1152, 'format' => 'webp'],
				/* 1/1 column @3x max 36rem */
				'1728w' => ['width' => 1728, 'format' => 'webp']
			]
		]
	],
	'blocks' => [
		'fieldsets' => [
			'text' => [
				'label' => [
					'en' => 'Text',
					'de' => 'Text',
				],
				'type' => 'group',
				'open' => true,
				'fieldsets' => [
					'markdown', 'heading', 'text', 'quote', 'list', 'table'
				]
			],
			'media' => [
				'label' => [
					'en' => 'Media',
					'de' => 'Medien',
				],
				'type' => 'group',
				'open' => true,
				'fieldsets' => [
					'video', 'image', 'gallery', 'quote'
				]
			],
			'advanced' => [
				'label' => [
					'en' => 'More Blocks',
					'de' => 'Weitere Elemente'
				],
				'type' => 'group',
				'open' => true,
				'fieldsets' => [
					'line', 'code'
				]
			]
		]
	],
	'routes' => [
		[
			'pattern' => '(:all)/feed.xml',
			'action' => function(string $slug){
				$page = page($slug);
				if($page) {
					// Page exists
					// - Check if page is a blog
					// - if blog, serve feed
					// - else, serve 404

					if($page->intendedTemplate() == "blog"){
						// Is a blog page, will serve an atom feed
						$feed = new page([
							'slug' => 'feed',
							'parent' => $page,
							'template' => 'atom'
						]);

						return $feed;
					}
				}else{
					// Page does not exist, serve 404
					return false;
				}
			}
		]
	]
];
?>
