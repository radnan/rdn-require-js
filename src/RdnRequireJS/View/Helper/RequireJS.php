<?php

namespace RdnRequireJS\View\Helper;

use RdnRequireJS\ConfigScript;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Renderer\PhpRenderer;

class RequireJS extends AbstractHelper
{
	/**
	 * @var ConfigScript
	 */
	protected $config;

	/**
	 * @var string
	 */
	protected $library;

	/**
	 * @var bool
	 */
	protected $libraryIncluded = false;

	/**
	 * @var PhpRenderer
	 */
	protected $view;

	/**
	 * @param ConfigScript $config
	 * @param string $library Path to requireJS library
	 */
	public function __construct(ConfigScript $config, $library)
	{
		$this->config = $config;
		$this->library = $library;
	}

	/**
	 * @return ConfigScript
	 */
	public function getConfig()
	{
		return $this->config;
	}

	/**
	 * @return string
	 */
	public function getLibrary()
	{
		return $this->library;
	}

	/**
	 * @param string|string[] $dependencies
	 */
	public function __invoke($dependencies = array())
	{
		$this->config->addDependencies($dependencies);

		if (!$this->libraryIncluded)
		{
			$this->view->inlineScript()
				->appendScript($this->config)
				->appendFile($this->library);

			$this->libraryIncluded = true;
		}
	}
}
