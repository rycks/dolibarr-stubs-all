<?php

namespace DebugBar\Bridge;

/**
 * Collects data about rendered templates
 *
 * http://twig.sensiolabs.org/
 *
 * A \Twig\Profiler\Profile should be added to your \Twig\Environment
 * The root-Twig\Profiler\Profile-object should then be injected into this collector
 *
 * you can optionally provide the \Twig\Environment or the \Twig\Loader to also create
 * debug-links.
 *
 * @see \Twig\Extension\ProfilerExtension, \Twig\Profiler\Profile
 *
 * <code>
 * $env = new \Twig\Environment($loader); // Or from a PSR11-container
 * $profile = new \Twig\Profiler\Profile();
 * $env->addExtension(new \Twig\Extension\ProfilerExtension($profile));
 * $debugbar->addCollector(new ModernTwigProfileCollector($profile, $env));
 * // or: $debugbar->addCollector(new ModernTwigProfileCollector($profile, $loader));
 * </code>
 */
class NamespacedTwigProfileCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    /**
     * @var Profile
     */
    private $profile;
    /**
     * @var LoaderInterface|Environment|null
     */
    private $loader;
    /**
     * @var int
     */
    private $templateCount;
    /**
     * @var int
     */
    private $blockCount;
    /**
     * @var int
     */
    private $macroCount;
    /**
     * @var array[] {
     * @var string $name
     * @var int $render_time
     * @var string $render_time_str
     * @var string $memory_str
     * @var string $xdebug_link
     * }
     */
    private $templates;
    /**
     * TwigProfileCollector constructor.
     *
     * @param Profile $profile
     * @param LoaderInterface|Environment $loaderOrEnv
     */
    public function __construct(\Twig\Profiler\Profile $profile, $loaderOrEnv = null)
    {
    }
    /**
     * Returns a hash where keys are control names and their values
     * an array of options as defined in {@see \DebugBar\JavascriptRenderer::addControl()}
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
     * @var string url
     * @var bool ajax
     * }
     */
    public function getXdebugLink($template, $line = 1)
    {
    }
    private function computeData(\Twig\Profiler\Profile $profile)
    {
    }
}