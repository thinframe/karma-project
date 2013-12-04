<?php

/**
 * /src/Acme/DemoApp/Controllers/SampleController.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace Acme\DemoApp\Controllers;

use ThinFrame\Karma\Controller\BaseController;
use ThinFrame\Twig\View;

/**
 * Class DummyController
 *
 * @package ThinFrame\Karma\Controller
 * @see     http://symfony.com/doc/current/components/routing/introduction.html for routing paramters details
 * @since   0.1
 */
class SampleController extends BaseController
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
        return new View('AcmeDemoApp:sample.html.twig');
    }

    /**
     * @Route {
     *          "names":"contactPage",
     *          "path":"contact"
     * }
     */
    public function contactAction()
    {
        throw new \Exception('Bla bla bla');
        return 'Send me a email at sorin.badea91@gmailcom';
    }
}
