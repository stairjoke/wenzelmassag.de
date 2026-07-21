<?php
return [
	'panel' => [
		'vue' => [
			'compiler' => false
		]
	],
	'languages' => true,
	'cache' => [
		'pages' => true
	],
	'hooks' => [
		'route:before' => function ($route, $path, $method) {
			header('Cache-Control: public, max-age=31365000');
		}
	],
	'email' => [
		'transport' => [
			'type' => 'smtp',
			'host' => 'smtp.strato.de',
			'port' => 465,
			'security' => true,
			'auth' => true,
			'username' => 'formular@entspannt.digital',
			'password' => 'j6o2wyXEMD9v6XZjX-MrMhrzVLQoP9v6vKp-!y6RcaKD7@VpmX'
		]
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
					'responsive-card', 'form', 'line', 'code'
				]
			]
		]
	],
	'jr' => [
		'static_site_generator' => [
			'base_url' => '/_testing-stuff/static/'
		]
	]
];
?>
