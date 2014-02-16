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
			$basePath = $helpers->get('BasePath');

			$config['config']['baseUrl'] = call_user_func($basePath, rtrim($config['config']['baseUrl'], '/'));
			$config['library'] = call_user_func($basePath, $config['library']);
		}

		foreach ($config['config']['paths'] as $name => $spec)
		{
			if (!is_array($spec))
			{
				continue;
			}

			$config['config']['paths'][$name] = array_values($spec);
		}

		return new Helper\RequireJS(new ConfigScript($config['config']), $config['library']);
	}
}
