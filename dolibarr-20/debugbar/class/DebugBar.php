<?php

/**
 * DolibarrDebugBar class
 *
 * @see http://phpdebugbar.com/docs/base-collectors.html#base-collectors
 */
class DolibarrDebugBar extends \DebugBar\DebugBar
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
    }
    /**
     * Returns a JavascriptRenderer for this instance
     *
     * @param string $baseUrl Base url
     * @param string $basePath Base path
     * @return \DebugBar\JavascriptRenderer      String content
     */
    public function getJavascriptRenderer($baseUrl = \null, $basePath = \null)
    {
    }
    /**
     * Returns a JavascriptRenderer for this instance
     *
     * @return \DebugBar\JavascriptRenderer      String content
     * @deprecated Use getJavascriptRenderer
     */
    public function getRenderer()
    {
    }
}