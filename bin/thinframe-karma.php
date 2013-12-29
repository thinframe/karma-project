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

$karmaContainer = $karmaApplication->getApplicationContainer();

if (getenv('THINFRAME_ENVIRONMENT')) {
    $environment = $karmaContainer->get('thinframe.karma.environment');
    /** @var $environment \ThinFrame\Karma\Constants\Environment */
    $environment->setValue(getenv('THINFRAME_ENVIRONMENT'));
}


$dispatcher = $karmaContainer->get('thinframe.events.dispatcher');
/** @var $dispatcher \ThinFrame\Events\Dispatcher */

$dispatcher->trigger(
    new \ThinFrame\Events\SimpleEvent(
        \ThinFrame\Karma\KarmaApplication::POWER_UP_EVENT_ID, ['application' => $karmaApplication])
);