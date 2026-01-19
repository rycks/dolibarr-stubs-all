<?php

namespace DebugBar\Bridge;

/**
 * Collects data about rendered templates
 *
 * http://twig.sensiolabs.org/
 *
 * A Twig_Extension_Profiler should be added to your Twig_Environment
 * The root-Twig_Profiler_Profile-object should then be injected into this collector
 *
 * you can optionally provide the Twig_Environment or the Twig_Loader to also create
 * debug-links.
 *
 * @see \Twig_Extension_Profiler, \Twig_Profiler_Profile
 *
 * <code>
 * $env = new Twig_Environment($loader); // Or from a PSR11-container
 * $profile = new Twig_Profiler_Profile();
 * $env->addExtension(new Twig_Extension_Profile($profile));
 * $debugbar->addCollector(new TwigProfileCollector($profile, $env));
 * // or: $debugbar->addCollector(new TwigProfileCollector($profile, $loader));
 * </code>
 *
 * @deprecated Use `\Debugbar\Bridge\NamespacedTwigProfileCollector` instead for Twig 2.x and 3.x
 */
class TwigProfileCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    /**
     * @var \Twig_Profiler_Profile
     */
    private $profile;
    /**
     * @var \Twig_LoaderInterface
     */
    private $loader;
    /** @var int */
    private $templateCount;
    /** @var int */
    private $blockCount;
    /** @var int */
    private $macroCount;
    /**
     * @var array[] {
     * @var string $name
     * @var int    $render_time
     * @var string $render_time_str
     * @var string $memory_str
     * @var string $xdebug_link
     * }
     */
    private $templates;
    /**
     * TwigProfileCollector constructor.
     *
     * @param \Twig_Profiler_Profile $profile
     * @param \Twig_LoaderInterface|\Twig_Environment $loaderOrEnv
     */
    public function __construct(\Twig_Profiler_Profile $profile, $loaderOrEnv = null)
    {
    }
    /**
     * Returns a hash where keys are control names and their values
     * an array of options as defined in {@see DebugBar\JavascriptRenderer::addControl()}
     *
     * @return array
     */
    public function getWidgets()
    {
    }
    /**
     * @return array
     */
    public function getAssets()
    {
    }
    /**
     * Called by the DebugBar when data needs to be collected
     *
     * @return array Collected data
     */
    public function collect()
    {
    }
    /**
     * Returns the unique name of the collector
     *
     * @return string
     */
    public function getName()
    {
    }
    public function getHtmlCallGraph()
    {
    }
    /**
     * Get an Xdebug Link to a file
     *
     * @return array {
     *  @var string url
     *  @var bool ajax
     * }
     */
    public function getXdebugLink($template, $line = 1)
    {
    }
    private function computeData(\Twig_Profiler_Profile $profile)
    {
    }
}