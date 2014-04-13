<?php

namespace ThinFrame\Profiler;

use PhpCollection\Map;
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
     * Get application name
     *
     * @return string
     */
    public function getName()
    {
        return 'Profiler';
    }

    /**
     * Get application parents
     *
     * @return AbstractApplication[]
     */
    public function getParents()
    {
        return [];
    }

    /**
     * Set different options for the container configurator
     *
     * @param ContainerConfigurator $configurator
     */
    protected function setConfiguration(ContainerConfigurator $configurator)
    {
        // noop
    }

    /**
     * Set application metadata
     *
     * @param Map $metadata
     *
     */
    protected function setMetadata(Map $metadata)
    {
        $metadata->set('controllers', ['Controllers/']);
        $metadata->set('views', 'Views/');
    }
}
