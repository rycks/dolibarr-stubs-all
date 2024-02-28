<?php

namespace DebugBar\DataCollector;

/**
 * Collects info about exceptions
 */
class ExceptionsCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable
{
    protected $exceptions = array();
    protected $chainExceptions = false;
    // The HTML var dumper requires debug bar users to support the new inline assets, which not all
    // may support yet - so return false by default for now.
    protected $useHtmlVarDumper = false;
    /**
     * Adds an exception to be profiled in the debug bar
     *
     * @param Exception $e
     * @deprecated in favor on addThrowable
     */
    public function addException(\Exception $e)
    {
    }
    /**
     * Adds a Throwable to be profiled in the debug bar
     *
     * @param \Throwable $e
     */
    public function addThrowable($e)
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
     * @return array[\Throwable]
     */
    public function getExceptions()
    {
    }
    /**
     * Sets a flag indicating whether the Symfony HtmlDumper will be used to dump variables for
     * rich variable rendering.
     *
     * @param bool $value
     * @return $this
     */
    public function useHtmlVarDumper($value = true)
    {
    }
    /**
     * Indicates whether the Symfony HtmlDumper will be used to dump variables for rich variable
     * rendering.
     *
     * @return mixed
     */
    public function isHtmlVarDumperUsed()
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
     * @deprecated in favor on formatThrowableData
     */
    public function formatExceptionData(\Exception $e)
    {
    }
    /**
     * Returns Throwable data as an array
     *
     * @param \Throwable $e
     * @return array
     */
    public function formatThrowableData($e)
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