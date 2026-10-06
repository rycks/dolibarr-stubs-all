<?php

namespace DebugBar\DataCollector;

/**
 * Indicates that a DataCollector is renderable using JavascriptRenderer
 */
interface Renderable
{
    /**
     * Returns a hash where keys are control names and their values
     * an array of options as defined in {@see DebugBar\JavascriptRenderer::addControl()}
     *
     * @return array
     */
    function getWidgets();
}