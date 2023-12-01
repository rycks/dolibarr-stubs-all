<?php

namespace DebugBar\DataCollector;

/**
 * DataCollector Interface
 */
interface DataCollectorInterface
{
    /**
     * Called by the DebugBar when data needs to be collected
     *
     * @return array Collected data
     */
    function collect();
    /**
     * Returns the unique name of the collector
     *
     * @return string
     */
    function getName();
}