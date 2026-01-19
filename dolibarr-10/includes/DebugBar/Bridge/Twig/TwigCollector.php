<?php

namespace DebugBar\Bridge\Twig;

/**
 * Collects data about rendered templates
 *
 * http://twig.sensiolabs.org/
 *
 * Your Twig_Environment object needs to be wrapped in a
 * TraceableTwigEnvironment object
 *
 * <code>
 * $env = new TraceableTwigEnvironment(new Twig_Environment($loader));
 * $debugbar->addCollector(new TwigCollector($env));
 * </code>
 */
class TwigCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    public function __construct(\DebugBar\Bridge\Twig\TraceableTwigEnvironment $twig)
    {
    }
    public function collect()
    {
    }
    public function getName()
    {
    }
    public function getWidgets()
    {
    }
    public function getAssets()
    {
    }
}