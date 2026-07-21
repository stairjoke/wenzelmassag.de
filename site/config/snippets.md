# Config file snippets

## configure email (SMTP) to send using an external server

'email' => [
	'transport' => [
		'type' => 'smtp',
		'host' => '',
		'port' => 465,
		'security' => true,
		'auth' => true,
		'username' => '',
		'password' => ''
	]
],
