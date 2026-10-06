<?php

namespace DebugBar\DataFormatter;

class DataFormatter implements \DebugBar\DataFormatter\DataFormatterInterface
{
    public $cloner;
    public $dumper;
    /**
     * DataFormatter constructor.
     */
    public function __construct()
    {
    }
    /**
     * @param $data
     * @return string
     */
    public function formatVar($data)
    {
    }
    /**
     * @param float $seconds
     * @return string
     */
    public function formatDuration($seconds)
    {
    }
    /**
     * @param string $size
     * @param int $precision
     * @return string
     */
    public function formatBytes($size, $precision = 2)
    {
    }
}