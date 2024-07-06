<?php

/**
 * Collection: Abstract class for compound geometries
 *
 * A geometry is a collection if it is made up of other
 * component geometries. Therefore everything but a Point
 * is a Collection. For example a LingString is a collection
 * of Points. A Polygon is a collection of LineStrings etc.
 */
abstract class Collection extends \Geometry
{
    public $components = array();
    /**
     * Constructor: Checks and sets component geometries
     *
     * @param array $components array of geometries
     */
    public function __construct($components = array())
    {
    }
    /**
     * Returns Collection component geometries
     *
     * @return array
     */
    public function getComponents()
    {
    }
    /*
     * Author : Adam Cherti
     *
     * inverts x and y coordinates
     * Useful for old data still using lng lat
     *
     * @return void
     *
     * */
    public function invertxy()
    {
    }
    public function centroid()
    {
    }
    public function getBBox()
    {
    }
    public function asArray()
    {
    }
    public function area()
    {
    }
    // By default, the boundary of a collection is the boundary of it's components
    public function boundary()
    {
    }
    public function numGeometries()
    {
    }
    // Note that the standard is 1 based indexing
    public function geometryN($n)
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
    public function dimension()
    {
    }
    // A collection is empty if it has no components OR all it's components are empty
    public function isEmpty()
    {
    }
    public function numPoints()
    {
    }
    public function getPoints()
    {
    }
    public function equals($geometry)
    {
    }
    public function isSimple()
    {
    }
    public function explode()
    {
    }
    // Not valid for this geometry type
    // --------------------------------
    public function x()
    {
    }
    public function y()
    {
    }
    public function startPoint()
    {
    }
    public function endPoint()
    {
    }
    public function isRing()
    {
    }
    public function isClosed()
    {
    }
    public function pointN($n)
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
    public function pointOnSurface()
    {
    }
}