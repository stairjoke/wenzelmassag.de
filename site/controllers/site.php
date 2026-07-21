<?php
	return function($page, $pages, $site, $kirby) {

		// A custom block "form" allows adding a form to any page.
		// This controller will take any submitted form data and process it.
		$form['alert'] = null;
		if($kirby->request()->is('POST') && get('formBlockSubmit')) {
			// Receiving a submitted formBlock
			/* POST DATA (some optional fields)
				- formBlockName
				- formBlockEmail
				- formBlockWeb = honeypot
				- formBlockFon
				- formBlockReplyVia
				- formBlockMessage
				- formBlockFile
				- formBlockCaptcha
				- formBlockKey
				- formBlockPrivacy
				- formBlockSubmit
			*/

			if(empty(get('formBlockWeb')) === false) {
				// There is data in the honeypot
				$form['errors'] = 'spam';
			}else{
				// The honeypot is empty
				// Process the data
				$form['data']['manualValidation'] = [
					'captcha' => intval(get('formBlockCaptcha')),
					'key' => get('formBlockKey'),
					'one' => intval(get('formBlockOne')),
					'two' => intval(get('formBlockTwo'))
				];

				// If the captcha was shown, the key will start with 1, otherwise with data.manualValidation.two
				$formCaptcha = intval(substr($form['data']['manualValidation']['key'], 0, 1));
				if($formCaptcha == 1) {
					// The captcha was shown
					// See if the md5 hash from the entered value is the same as it was when calculating it inside the form block
					if(hash('md5', $form['data']['manualValidation']['captcha']) != substr($form['data']['manualValidation']['key'], 1)){
						// The captcha response is invalid
						$form['errors'] = 'spam';
					}
				}elseif($formCaptcha == $form['data']['manualValidation']['two']) {
					// The captcha was not shown
					// Nothing to do
				}else{
					// The key is invalid
					$form['errors'] = 'spam';
				}

				if(!array_key_exists('error', $form)) {
					// Passed the SPAM filter

					// Reading remaining POST data
					$form['data']['automatedValidation'] = [
						'name' => get('formBlockName'),
						'email' => get('formBlockEmail'),
						'fon' => get('formBlockFon'),
						'replyVia' => get('formBlockReplyVia'),
						'message' => get('formBlockMessage'),
						'privacy' => get('formBlockPrivacy')
					];

					// Fetching uploaded file
					$form['data']['file'] = get('formBlockFile');

					// Prepare rules and error messages for form validation
					$form['rules'] = [
						'name' => ['required', 'minLength' => 3],
						'email' => ['required', 'email'],
						'fon' => ['required', 'tel'],
						'message' => ['required', 'minLength' => 5],
						'privacy' => ['required']
					];
					$form['messages'] = [
						'name' => t('form-block.validation-name', "Name field empty or name too short."),
						'email' => t('form-block.validation-email', "Email address missing or not valid."),
						'fon' => t('form-block.validation-fon', "Phone number missing or invalid."),
						'message' => t('form-block.validation-message', "Message empty or too short."),
						'privacy' => t('form-block.validation-privacy', "Privacy policy not confirmed.")
					];

					if($form['invalid'] = invalid($form['data']['automatedValidation'], $form['rules'], $form['messages'])) {
						$form['error'] = $form['invalid'];
					}else{
						// Validation successful, send it
						// Show success message
						$form['success'] = t('form-block.success', "Your message is on its way, thank you!");
					}
				}
			}
		} //endif is there form data
	}
?>
