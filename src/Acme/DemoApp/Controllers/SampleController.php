<?php

/**
 * /src/Acme/DemoApp/Controllers/SampleController.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace Acme\DemoApp\Controllers;

use ThinFrame\Karma\ViewController\AbstractController;
use ThinFrame\Karma\ViewController\JsonView;
use ThinFrame\Twig\TwigView;

/**
 * Class DummyController
 *
 * @package ThinFrame\Karma\Controller
 * @see     http://symfony.com/doc/current/components/routing/introduction.html for routing paramters details
 * @since   0.1
 */
class SampleController extends AbstractController
{
    /**
     * @Route {
     *          "names":"homePage",
     *          "path":"/",
     *          "default":[],
     *          "requirements":[],
     *          "options":[],
     *          "host":"",
     *          "schemes":[],
     *          "methods":[]
     * }
     */
    public function indexAction()
    {
        return new TwigView('AcmeDemoApp:default.html.twig', [
            'controller_location' => __FILE__,
            'controller_action'   => __FUNCTION__,
            'path'                => $this->request->getPath(),
            'remote_ip'           => $this->request->getRemoteIp(),
            'memory_usage'        => memory_get_usage() / 1024,
            'real_memory_usage'   => memory_get_usage(true) / 1024
        ]);
    }

    /**
     * @Route {
     *          "names":"contactPage",
     *          "path":"contact"
     * }
     */
    public function contactAction()
    {
        return "Send me an email at sorin.badea91@gmail.com";
    }
}
