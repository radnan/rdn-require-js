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
		'library' => '//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.10/require.min.js',

		'config' => array(
			'baseUrl' => '',

			'paths' => array(),

			'packages' => array(),

			'shim' => array(),

			'deps' => array(),
		),
	),
);
