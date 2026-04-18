<?php

namespace DebugBar\DataCollector;

/**
 * Collects info about memory usage
 */
class MemoryCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable
{
    protected $realUsage = false;
    protected $peakUsage = 0;
    /**
     * Returns whether total allocated memory page size is used instead of actual used memory size
     * by the application.  See $real_usage parameter on memory_get_peak_usage for details.
     *
     * @return bool
     */
    public function getRealUsage()
    {
    }
    /**
     * Sets whether total allocated memory page size is used instead of actual used memory size
     * by the application.  See $real_usage parameter on memory_get_peak_usage for details.
     *
     * @param bool $realUsage
     */
    public function setRealUsage($realUsage)
    {
    }
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
    /**
     * @return array
     */
    public function collect()
    {
    }
    /**
     * @return string
     */
    public function getName()
    {
    }
    /**
     * @return array
     */
    public function getWidgets()
    {
    }
}