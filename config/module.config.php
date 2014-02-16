<?php

return array(
	'view_helpers' => array(
		'aliases' => array(
			'RequireJS' => 'RdnRequireJS:RequireJS',
		),

		'factories' => array(
			'RdnRequireJS:RequireJS' => 'RdnRequireJS\Factory\View\Helper\RequireJS',
		),
	),

	'rdn_require_js' => array(
		'library' => 'rdn-require-js/js/require-2.1.9.js',

		'config' => array(
			'baseUrl' => '/modules',

			'paths' => array(),

			'packages' => array(),

			'shim' => array(),

			'deps' => array(),
		),
	),
);
