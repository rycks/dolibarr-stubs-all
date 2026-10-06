<?php

/**
 * Point: The most basic geometry type. All other geometries
 * are built out of Points.
 */
class Point extends \Geometry
{
    public $coords = array(2);
    protected $geom_type = 'Point';
    protected $dimension = 2;
    /**
     * Constructor
     *
     * @param numeric $x The x coordinate (or longitude)
     * @param numeric $y The y coordinate (or latitude)
     * @param numeric $z The z coordinate (or altitude) - optional
     */
    public function __construct($x = \null, $y = \null, $z = \null)
    {
    }
    /**
     * Get X (longitude) coordinate
     *
     * @return float The X coordinate
     */
    public function x()
    {
    }
    /**
     * Returns Y (latitude) coordinate
     *
     * @return float The Y coordinate
     */
    public function y()
    {
    }
    /**
     * Returns Z (altitude) coordinate
     *
     * @return float The Z coordinate or NULL is not a 3D point
     */
    public function z()
    {
    }
    /**
     * Author : Adam Cherti
     * inverts x and y coordinates
     * Useful with old applications still using lng lat
     *
     * @return void
     * */
    public function invertxy()
    {
    }
    // A point's centroid is itself
    public function centroid()
    {
    }
    public function getBBox()
    {
    }
    public function asArray($assoc = \false)
    {
    }
    public function area()
    {
    }
    public function length()
    {
    }
    public function greatCircleLength()
    {
    }
    public function haversineLength()
    {
    }
    // The boundary of a point is itself
    public function boundary()
    {
    }
    public function dimension()
    {
    }
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
    // Not valid for this geometry type
    public function numGeometries()
    {
    }
    public function geometryN($n)
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
    public function explode()
    {
    }
}