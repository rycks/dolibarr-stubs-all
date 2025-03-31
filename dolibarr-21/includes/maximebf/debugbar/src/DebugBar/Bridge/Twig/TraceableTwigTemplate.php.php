<?php

namespace DebugBar\Bridge\Twig;

/**
 * Wraps a Twig_Template to add profiling features
 * 
 * @deprecated
 */
class TraceableTwigTemplate extends \Twig_Template implements \Twig_TemplateInterface
{
    protected $template;
    /**
     * @param TraceableTwigEnvironment $env
     * @param Twig_Template $template
     */
    public function __construct(\DebugBar\Bridge\Twig\TraceableTwigEnvironment $env, \Twig_Template $template)
    {
    }
    public function __call($name, $arguments)
    {
    }
    public function doDisplay(array $context, array $blocks = array())
    {
    }
    public function getTemplateName()
    {
    }
    public function getEnvironment()
    {
    }
    public function getParent(array $context)
    {
    }
    public function isTraitable()
    {
    }
    public function displayParentBlock($name, array $context, array $blocks = array())
    {
    }
    public function displayBlock($name, array $context, array $blocks = array(), $useBlocks = true)
    {
    }
    public function renderParentBlock($name, array $context, array $blocks = array())
    {
    }
    public function renderBlock($name, array $context, array $blocks = array(), $useBlocks = true)
    {
    }
    public function hasBlock($name)
    {
    }
    public function getBlockNames()
    {
    }
    public function getBlocks()
    {
    }
    public function display(array $context, array $blocks = array())
    {
    }
    public function render(array $context)
    {
    }
    public static function clearCache()
    {
    }
}