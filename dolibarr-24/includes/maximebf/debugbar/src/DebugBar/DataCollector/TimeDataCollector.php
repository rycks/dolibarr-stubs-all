<?php

namespace DebugBar\DataCollector;

/**
 * Collects info about the request duration as well as providing
 * a way to log duration of any operations
 */
class TimeDataCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable
{
    /**
     * @var float
     */
    protected $requestStartTime;
    /**
     * @var float
     */
    protected $requestEndTime;
    /**
     * @var array
     */
    protected $startedMeasures = array();
    /**
     * @var array
     */
    protected $measures = array();
    /**
     * @param float $requestStartTime
     */
    public function __construct($requestStartTime = null)
    {
    }
    /**
     * Starts a measure
     *
     * @param string $name Internal name, used to stop the measure
     * @param string|null $label Public name
     * @param string|null $collector The source of the collector
     */
    public function startMeasure($name, $label = null, $collector = null)
    {
    }
    /**
     * Check a measure exists
     *
     * @param string $name
     * @return bool
     */
    public function hasStartedMeasure($name)
    {
    }
    /**
     * Stops a measure
     *
     * @param string $name
     * @param array $params
     * @throws DebugBarException
     */
    public function stopMeasure($name, $params = array())
    {
    }
    /**
     * Adds a measure
     *
     * @param string $label
     * @param float $start
     * @param float $end
     * @param array $params
     * @param string|null $collector
     */
    public function addMeasure($label, $start, $end, $params = array(), $collector = null)
    {
    }
    /**
     * Utility function to measure the execution of a Closure
     *
     * @param string $label
     * @param \Closure $closure
     * @param string|null $collector
     * @return mixed
     */
    public function measure($label, \Closure $closure, $collector = null)
    {
    }
    /**
     * Returns an array of all measures
     *
     * @return array
     */
    public function getMeasures()
    {
    }
    /**
     * Returns the request start time
     *
     * @return float
     */
    public function getRequestStartTime()
    {
    }
    /**
     * Returns the request end time
     *
     * @return float
     */
    public function getRequestEndTime()
    {
    }
    /**
     * Returns the duration of a request
     *
     * @return float
     */
    public function getRequestDuration()
    {
    }
    /**
     * @return array
     * @throws DebugBarException
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