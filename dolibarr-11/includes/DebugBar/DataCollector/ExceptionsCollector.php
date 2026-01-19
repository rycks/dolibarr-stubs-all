<?php

namespace DebugBar\DataCollector;

/**
 * Collects info about exceptions
 */
class ExceptionsCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable
{
    protected $exceptions = array();
    protected $chainExceptions = false;
    /**
     * Adds an exception to be profiled in the debug bar
     *
     * @param Exception $e
     */
    public function addException(\Exception $e)
    {
    }
    /**
     * Configure whether or not all chained exceptions should be shown.
     *
     * @param bool $chainExceptions
     */
    public function setChainExceptions($chainExceptions = true)
    {
    }
    /**
     * Returns the list of exceptions being profiled
     *
     * @return array[Exception]
     */
    public function getExceptions()
    {
    }
    public function collect()
    {
    }
    /**
     * Returns exception data as an array
     *
     * @param Exception $e
     * @return array
     */
    public function formatExceptionData(\Exception $e)
    {
    }
    public function getName()
    {
    }
    public function getWidgets()
    {
    }
}