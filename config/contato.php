<?php

return [
	'email_para' => env('CONTATO_EMAIL_PARA'),
	'email_cc' => explode(",", env('CONTATO_EMAIL_CC'))
];