<?php

namespace DebugBar;

/**
 * Handler to list and open saved dataset
 */
class OpenHandler
{
    protected $debugBar;
    /**
     * @param DebugBar $debugBar
     * @throws DebugBarException
     */
    public function __construct(\DebugBar\DebugBar $debugBar)
    {
    }
    /**
     * Handles the current request
     *
     * @param array $request Request data
     * @param bool $echo
     * @param bool $sendHeader
     * @return string
     * @throws DebugBarException
     */
    public function handle($request = null, $echo = true, $sendHeader = true)
    {
    }
    /**
     * Find operation
     * @param $request
     * @return array
     */
    protected function find($request)
    {
    }
    /**
     * Get operation
     * @param $request
     * @return array
     * @throws DebugBarException
     */
    protected function get($request)
    {
    }
    /**
     * Clear operation
     */
    protected function clear($request)
    {
    }
}