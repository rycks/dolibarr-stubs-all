<?php

/**
 * MultiLineString: A collection of LineStrings
 */
class MultiLineString extends \Collection
{
    protected $geom_type = 'MultiLineString';
    // MultiLineString is closed if all it's components are closed
    public function isClosed()
    {
    }
}