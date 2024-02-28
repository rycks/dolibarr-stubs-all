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
     */
    public function __construct(\DebugBar\DebugBar $debugBar)
    {
    }
    /**
     * Handles the current request
     *
     * @param array $request Request data
     */
    public function handle($request = null, $echo = true, $sendHeader = true)
    {
    }
    /**
     * Find operation
     */
    protected function find($request)
    {
    }
    /**
     * Get operation
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