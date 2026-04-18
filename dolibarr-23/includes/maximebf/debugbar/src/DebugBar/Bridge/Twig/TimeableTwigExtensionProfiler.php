<?php

namespace DebugBar\Bridge\Twig;

/**
 * Class TimeableTwigExtensionProfiler
 *
 * Extends Twig_Extension_Profiler to add rendering times to the TimeDataCollector
 *
 * @package DebugBar\Bridge\Twig
 */
class TimeableTwigExtensionProfiler extends \Twig_Extension_Profiler
{
    /**
     * @var \DebugBar\DataCollector\TimeDataCollector
     */
    private $timeDataCollector;
    /**
     * @param \DebugBar\DataCollector\TimeDataCollector $timeDataCollector
     */
    public function setTimeDataCollector(\DebugBar\DataCollector\TimeDataCollector $timeDataCollector)
    {
    }
    public function __construct(\Twig_Profiler_Profile $profile, \DebugBar\DataCollector\TimeDataCollector $timeDataCollector = null)
    {
    }
    public function enter(\Twig_Profiler_Profile $profile)
    {
    }
    public function leave(\Twig_Profiler_Profile $profile)
    {
    }
}