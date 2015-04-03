<?php

return array(

	'driver' => 'eloquent',
	'model' => 'User',
	//'table' => 'funcionarios',
	'reminder' => array(

		//'email' => 'emails.auth.reminder',
        'email' => 'email.request',
		//'table' => 'password_reminders',
        'table' => 'token',
		'expire' => 60,

	),

);
