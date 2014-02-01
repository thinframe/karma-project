<?php

namespace ThinFrame\Profiler\Controllers;

use ThinFrame\Karma\ViewController\AbstractController;
use ThinFrame\Twig\TwigView;

/**
 * Class ProfilerController
 *
 * @package ThinFrame\Profiler\Controllers
 * @since   0.2
 */
class ProfilerController extends AbstractController
{
    /**
     * @Route {"path":"_profiler"}
     */
    public function indexAction()
    {
        return new TwigView('KarmaProfiler:default.html.twig');
    }

    /**
     * @Route {"path":"_profiler/memory"}
     */
    public function memoryAction()
    {
        return json_encode(
            [
                'memory_usage'           => memory_get_usage(),
                'real_memory_usage'      => memory_get_usage(true),
                'memory_peak_usage'      => memory_get_peak_usage(),
                'real_memory_peak_usage' => memory_get_peak_usage(true),
                'time'                   => time()
            ]
        );
    }
}