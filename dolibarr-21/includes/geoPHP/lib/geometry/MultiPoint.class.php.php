<?php

/**
 * MultiPoint: A collection Points
 */
class MultiPoint extends \Collection
{
    protected $geom_type = 'MultiPoint';
    public function numPoints()
    {
    }
    public function isSimple()
    {
    }
    // Not valid for this geometry type
    // --------------------------------
    public function explode()
    {
    }
}