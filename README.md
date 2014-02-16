RdnRequireJS
============

The **RdnRequireJS** ZF2 module integrates the [RequireJS](http://requirejs.org/) library into your project.

## How to install

1. Use `composer` to require the `radnan/rdn-require-js` package:

   ~~~bash
   $ composer require radnan/rdn-require-js:1.*
   ~~~

2. Activate the module by including it in your `application.config.php` file:

   ~~~php
   <?php

   return array(
       'modules' => array(
           'RdnRequireJS',
           // ...
       ),
   );
   ~~~

## How to use

Create your **RequireJS** modules in your project's `public/` directory:

~~~js
// public/Bar.js

define(['./Foo'], function(Foo)
{
	Foo.log('Hello World!');
});
~~~

Then, in your view templates, call the `requireJS($name)` view helper with the module name as the argument:

~~~php
/** @var Zend\View\Renderer\PhpRenderer $this */

<?php $this->requireJS('Bar') ?>
~~~

The view helper will include the RequireJS library along with the requested modules as inline scripts.

### Multiple dependencies

You can call the view helper multiple times and it will keep appending the module dependencies. You can also provide an array to include multiple deps at a time:

~~~php
/** @var Zend\View\Renderer\PhpRenderer $this */

<?php $this->requireJS(['Bar', 'Baz']) ?>
~~~

### Code completion

If you'd like to have code completion for this helper, include the following in your <code>PhpRenderer</code> class:

~~~php
namespace App\View\Renderer;

use Zend\View\Renderer\PhpRenderer as ZendPhpRenderer;

/**
 * @method requireJS(\string $dependencies = array())
 */
class PhpRenderer extends ZendPhpRenderer
{
}
~~~

Then, simply type hint the `$this` variable to this class in your view templates.

## Library

The **RequireJS** library is, by default, included from [cdnjs](http://cdnjs.com/). You can configure this using the `rdn_require_js.library` option:

~~~php
<?php

return array(
	'rdn_require_js' => array(
		'library' => '/path/to/local/require.js',
	),
);
~~~

This path should be relative to your project's base path. The view helper will use the `basePath()` view helper to resolve the full path.

## Configuration

You can manage the default requireJS configuration using the `rdn_require_js.config` option:

~~~php
<?php

return array(
	'rdn_require_js' => array(
		'config' => array(
			'baseUrl' => '/modules',

			'paths' => array(
				'App' => 'app/js',
			),

			'packages' => array(
				'App',
			),
		),
	),
);
~~~

[RequireJS config documentation](http://requirejs.org/docs/api.html#config)
