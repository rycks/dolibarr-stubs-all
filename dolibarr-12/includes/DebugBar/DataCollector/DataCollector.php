<?php

namespace DebugBar\DataCollector;

/**
 * Abstract class for data collectors
 */
abstract class DataCollector implements \DebugBar\DataCollector\DataCollectorInterface
{
    private static $defaultDataFormatter;
    protected $dataFormater;
    /**
     * Sets the default data formater instance used by all collectors subclassing this class
     *
     * @param DataFormatterInterface $formater
     */
    public static function setDefaultDataFormatter(\DebugBar\DataFormatter\DataFormatterInterface $formater)
    {
    }
    /**
     * Returns the default data formater
     *
     * @return DataFormatterInterface
     */
    public static function getDefaultDataFormatter()
    {
    }
    /**
     * Sets the data formater instance used by this collector
     *
     * @param DataFormatterInterface $formater
     */
    public function setDataFormatter(\DebugBar\DataFormatter\DataFormatterInterface $formater)
    {
    }
    public function getDataFormatter()
    {
    }
    /**
     * @deprecated
     */
    public function formatVar($var)
    {
    }
    /**
     * @deprecated
     */
    public function formatDuration($seconds)
    {
    }
    /**
     * @deprecated
     */
    public function formatBytes($size, $precision = 2)
    {
    }
}