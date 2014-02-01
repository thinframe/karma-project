<?php

namespace ThinFrame\Profiler;

use ThinFrame\Applications\AbstractApplication;
use ThinFrame\Applications\DependencyInjection\ContainerConfigurator;

/**
 * Class ProfilerApplication
 *
 * @package ThinFrame\Profiler
 * @since   0.1
 */
class ProfilerApplication extends AbstractApplication
{
    /**
     * Get parent applications
     *
     * @return AbstractApplication[]
     */
    protected function getParentApplications()
    {
        return [];
    }

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
        return [];
    }

    /**
     * Get application name
     *
     * @return string
     */
    public function getApplicationName()
    {
        return 'KarmaProfiler';
    }

    /**
     * Application metadata
     *
     * @return array
     */
    protected function metaData()
    {
        return [
            'controllers' => ['Controllers/'],
            'views'       => 'Views/',
        ];
    }
}
