<?php
	use Kirby\Cms\FileBlueprint;
	Kirby::plugin('stairjoke/auto-assign-file-metadata', [
		'hooks' => [
			'file.create:after' => function ($file) {

				// Assign the upload date and user
				$now = new DateTime();
				$update = [
					'uploadUser' => "- user://" . $this->user()->id(),
					'uploadDate' => $now->format('Y-m-d H:i:sP')
				];

				// If the uploaded file comes with no blueprint assigned to it, fix that:
				if($file->blueprint()->name() === "files/default"){
					$update['template'] = 'Default';
					if(in_array($file->type(), [
						'audio',
						'document',
						'image',
						'video'
					])){
						$update['template'] = $file->type();
					}
				}

				// If its an image, attempt to determine if its a light or dark mode image
				if($file->type() == 'image'){
					if(strpos($file->name(), '@light') != false){
						$update['colorScheme'] = 'light';
					}elseif(strpos($file->name(), '@dark') != false){
						$update['colorScheme'] = 'dark';
					}
				}

				// Save these changes
				$file->update($update);
			}
		]
	]);
?>
