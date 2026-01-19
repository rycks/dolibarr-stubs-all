<?php

namespace DebugBar;

/**
 * Basic request ID generator
 */
class RequestIdGenerator implements \DebugBar\RequestIdGeneratorInterface
{
    protected $index = 0;
    /**
     * @return string
     */
    public function generate()
    {
    }
}