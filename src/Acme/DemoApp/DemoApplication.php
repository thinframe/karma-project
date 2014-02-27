<?php

/**
 * /src/Acme/DemoApp/DemoApplication.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace Acme\DemoApp;

use PhpCollection\Map;
use ThinFrame\Applications\AbstractApplication;
use ThinFrame\Applications\DependencyInjection\ContainerConfigurator;
use ThinFrame\Karma\Environment;
use ThinFrame\Karma\KarmaApplication;

/**
 * Class DemoApp
 *
 * @package Acme\DemoApp
 * @since   0.1
 */
class DemoApplication extends AbstractApplication
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * {@inheritdoc}
     */
    function __construct()
    {
        parent::__construct();

        if (getenv('THINFRAME_ENVIRONMENT')) {
            $this->environment = new Environment(getenv('THINFRAME_ENVIRONMENT'));
        } else {
            $this->environment = new Environment(Environment::PRODUCTION);
        }
    }


    /**
     * Get application name
     *
     * @return string
     */
    public function getName()
    {
        return $this->reflector->getShortName();
    }

    /**
     * Get application parents
     *
     * @return AbstractApplication[]
     */
    public function getParents()
    {
        return [new KarmaApplication()];
    }

    /**
     * Set different options for the container configurator
     *
     * @param ContainerConfigurator $configurator
     */
    protected function setConfiguration(ContainerConfigurator $configurator)
    {
        $configurator->addResources(
            [
                '../../../app/config/parameters.yml',
                '../../../app/config/' . $this->environment . '_config.yml'
            ]
        );
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
        $metadata->set('assets', '../../../app/assets/');
        $metadata->set('environment', $this->environment);
    }
}
