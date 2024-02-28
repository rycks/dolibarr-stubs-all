<?php

namespace DebugBar\DataCollector;

/**
 * Collects info about memory usage
 */
class MemoryCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable
{
    protected $peakUsage = 0;
    /**
     * Returns the peak memory usage
     *
     * @return integer
     */
    public function getPeakUsage()
    {
    }
    /**
     * Updates the peak memory usage value
     */
    public function updatePeakUsage()
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
}