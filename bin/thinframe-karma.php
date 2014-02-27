<?php

use Acme\DemoApp\DemoApplication as Application;

declare(ticks = 1);

/**
 * Karma root directory
 */
define(
'KARMA_ROOT',
getenv('THINFRAME_ROOT') ? getenv('THINFRAME_ROOT') . DIRECTORY_SEPARATOR : __DIR__ . DIRECTORY_SEPARATOR
);

//load composer autoloader
require_once KARMA_ROOT . 'vendor/autoload.php';

$karmaApplication = new Application();

$karmaContainer = $karmaApplication->make()->getContainer();

$dispatcher = $karmaContainer->get('events.dispatcher');
/** @var $dispatcher \ThinFrame\Events\Dispatcher */

$dispatcher->trigger(
    new \ThinFrame\Events\SimpleEvent('power_up', ['application' => $karmaApplication])
);