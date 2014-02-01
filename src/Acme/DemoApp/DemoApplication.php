<?php

/**
 * /src/Acme/DemoApp/DemoApplication.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace Acme\DemoApp;

use ThinFrame\Applications\AbstractApplication;
use ThinFrame\Applications\DependencyInjection\ContainerConfigurator;
use ThinFrame\Karma\KarmaApplication;
use ThinFrame\Profiler\ProfilerApplication;
use ThinFrame\Twig\TwigApplication;

/**
 * Class DemoApp
 *
 * @package Acme\DemoApp
 * @since   0.1
 */
class DemoApplication extends AbstractApplication
{
    /**
     * initialize configurator
     *
     * @param ContainerConfigurator $configurator
     *
     * @return mixed
     */
    public function initializeConfigurator(ContainerConfigurator $configurator)
    {
        //noop
    }

    /**
     * Get configuration files
     *
     * @return mixed
     */
    public function getConfigurationFiles()
    {
        return [
            '../../../app/config/parameters.yml',
            '../../../app/config/config.yml'
        ];
    }

    /**
     * Get application name
     *
     * @return string
     */
    public function getApplicationName()
    {
        return 'AcmeDemoApp';
    }

    /**
     * Get parent applications
     *
     * @return AbstractApplication[]
     */
    protected function getParentApplications()
    {
        return [
            new KarmaApplication(),
            new TwigApplication(),
            new ProfilerApplication()
        ];
    }

    /**
     * Application metaData
     *
     * @return array
     */
    protected function metaData()
    {
        return [
            'controllers' => ['Controllers/'],
            'views'       => 'Views/',
            'assets'      => '../../../app/assets/',
        ];
    }
}
