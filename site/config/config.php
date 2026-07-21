<?php
return [
	'panel' => [
		'vue' => [
			'compiler' => false
		]
	],
	'languages' => true,
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
	]
];
?>
