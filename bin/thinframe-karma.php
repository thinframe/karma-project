<?php

use ThinFrame\Events\SimpleEvent;
use ThinFrame\Karma\Events;

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

$karmaApplication = new App();

$karmaContainer = $karmaApplication->make()->getContainer();

$dispatcher = $karmaContainer->get('events.dispatcher');
/** @var $dispatcher \ThinFrame\Events\Dispatcher */

$dispatcher->trigger(
    new SimpleEvent(
        Events::POWER_UP,
        [
            'application' => $karmaApplication
        ])
);
