<?php

/**
 * This capability profile is designed for the P-822D.
 * 
 * See
 * https://github.com/mike42/escpos-php/issues/50
 */
class P822DCapabilityProfile extends \DefaultCapabilityProfile
{
    function getSupportedCodePages()
    {
    }
    public function getSupportsGraphics()
    {
    }
}