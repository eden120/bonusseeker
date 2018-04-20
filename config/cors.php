<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Laravel CORS
	|--------------------------------------------------------------------------
	|
	| allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
	| to accept any value.
	|
	*/

	'supportsCredentials' => FALSE,
	'allowedOrigins'      => ['*'],
	'allowedHeaders'      => ['*'],
	'allowedMethods'      => ['GET'], // ex: ['*', 'GET', 'POST', 'PUT',  'DELETE']
	'exposedHeaders'      => [],
	'maxAge'              => 0,
];
