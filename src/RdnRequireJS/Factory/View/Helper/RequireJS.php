<?php

namespace RdnRequireJS\Factory\View\Helper;

use RdnFactory\AbstractFactory;
use RdnRequireJS\ConfigScript;
use RdnRequireJS\View\Helper;

class RequireJS extends AbstractFactory
{
	protected function create()
	{
		$config = $this->config('rdn_require_js');

		if (PHP_SAPI == 'cli')
		{
			$helpers = $this->service('ViewHelperManager');
			$config['config']['baseUrl'] = call_user_func($helpers->get('BasePath'), rtrim($config['config']['baseUrl'], '/'));
		}

		$library = $config['config']['baseUrl'] .'/'. ltrim($config['library'], '/');

		return new Helper\RequireJS(new ConfigScript($config), $library);
	}
}
