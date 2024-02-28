<?php

namespace DebugBar;

interface RequestIdGeneratorInterface
{
    /**
     * Generates a unique id for the current request
     *
     * @return string
     */
    function generate();
}