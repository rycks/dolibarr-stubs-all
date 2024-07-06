<?php

/**
 * LineString. A collection of Points representing a line.
 * A line can have more than one segment.
 */
class LineString extends \Collection
{
    protected $geom_type = 'LineString';
    /**
     * Constructor
     *
     * @param array $points An array of at least two points with
     *                      which to build the LineString
     */
    public function __construct($points = array())
    {
    }
    // The boundary of a linestring is itself
    public function boundary()
    {
    }
    public function startPoint()
    {
    }
    public function endPoint()
    {
    }
    public function isClosed()
    {
    }
    public function isRing()
    {
    }
    public function numPoints()
    {
    }
    public function pointN($n)
    {
    }
    public function dimension()
    {
    }
    public function area()
    {
    }
    public function length()
    {
    }
    public function greatCircleLength($radius = 6378137)
    {
    }
    public function haversineLength()
    {
    }
    public function explode()
    {
    }
    public function isSimple()
    {
    }
    // Utility function to check if any line sigments intersect
    // Derived from http://stackoverflow.com/questions/563198/how-do-you-detect-where-two-line-segments-intersect
    public function lineSegmentIntersect($segment)
    {
    }
}