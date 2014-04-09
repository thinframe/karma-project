<?php

use ThinFrame\Applications\AbstractApplication;
use \ThinFrame\Applications\DependencyInjection\ContainerConfigurator;
use ThinFrame\Karma\Environment;

/**
 * Class App
 */
class App extends AbstractApplication
{
    /**
     * @var Environment
     */
    protected $environment;

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

        $this->container->setParameter('environment', $this->environment->__toString());
    }

    /**
     * Get application name
     *
     * @return string
     */
    public function getName()
    {
        return 'app';
    }

    /**
     * Get application parents
     *
     * @return AbstractApplication[]
     */
    public function getParents()
    {
        return [
            new Acme\DemoApp\DemoApplication()
        ];
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
                'config/parameters.yml',
                'config/config.yml',
                'config/config_' . $this->environment . '.yml',
            ]
        );
    }

    /**
     * Set application metadata
     *
     * @param \PhpCollection\Map $metadata
     *
     */
    protected function setMetadata(\PhpCollection\Map $metadata)
    {
        $metadata->set('environment', $this->environment);
    }
}
