<?php

/**
 * /src/Acme/DemoApp/Controllers/SampleController.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace Acme\DemoApp\Controllers;

use ThinFrame\Http\Foundation\RequestInterface;
use ThinFrame\Http\Foundation\ResponseInterface;
use ThinFrame\Karma\Controller\AbstractController;
use ThinFrame\Karma\Controller\Router;
use ThinFrame\Twig\View;

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
     *          "name":"homePage",
     *          "path":"/",
     *          "default":[],
     *          "requirements":[]
     * }
     *
     * @View {"type":"Twig","template":"DemoApplication:default.html.twig"}
     */
    public function indexAction(RequestInterface $request, ResponseInterface $response)
    {
        return [];
    }

    /**
     * @Route {
     *          "name":"contactPage",
     *          "path":"contact/{email}"
     * }
     */
    public function contactAction($email)
    {
        return "Send me an email at " . $email;
    }
}
