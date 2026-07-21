<?php
	use Kirby\Cms\FileBlueprint;
	Kirby::plugin('stairjoke/auto-assign-file-metadata', [
		'hooks' => [
			'file.create:after' => function ($file) {

				// If the uploaded file comes with no blueprint assigned to it, fix that:

				if($file->blueprint()->name() === "files/default"){
					$update = [
						'template' => 'Default',
					];

					if(in_array($file->type(), [
						'audio',
						'document',
						'image',
						'video'
					])){
						$update['template'] = $file->type();
					}

					$update['uploadUser'] = $this->user()->username();

					$now = new DateTime();
					$update['uploadDate'] = $now->format('Y-m-d H:i:sP');

					$file->update($update);
				}
			}
		]
	]);
?>
