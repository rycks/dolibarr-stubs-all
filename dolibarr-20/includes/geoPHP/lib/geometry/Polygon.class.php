<?php

/**
 * Polygon: A polygon is a plane figure that is bounded by a closed path,
 * composed of a finite sequence of straight line segments
 */
class Polygon extends \Collection
{
    protected $geom_type = 'Polygon';
    // The boundary of a polygin is it's outer ring
    public function boundary()
    {
    }
    public function area($exterior_only = \false, $signed = \false)
    {
    }
    public function centroid()
    {
    }
    /**
     * Find the outermost point from the centroid
     *
     * @returns Point The outermost point
     */
    public function outermostPoint()
    {
    }
    public function exteriorRing()
    {
    }
    public function numInteriorRings()
    {
    }
    public function interiorRingN($n)
    {
    }
    public function dimension()
    {
    }
    public function isSimple()
    {
    }
    /**
     * For a given point, determine whether it's bounded by the given polygon.
     * Adapted from http://www.assemblysys.com/dataServices/php_pointinpolygon.php
     * @see http://en.wikipedia.org/wiki/Point%5Fin%5Fpolygon
     *
     * @param Point $point
     * @param boolean $pointOnBoundary - whether a boundary should be considered "in" or not
     * @param boolean $pointOnVertex - whether a vertex should be considered "in" or not
     * @return boolean
     */
    public function pointInPolygon($point, $pointOnBoundary = \true, $pointOnVertex = \true)
    {
    }
    public function pointOnVertex($point)
    {
    }
    // Not valid for this geometry type
    // --------------------------------
    public function length()
    {
    }
}