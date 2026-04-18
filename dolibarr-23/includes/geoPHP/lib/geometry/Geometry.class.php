<?php

/**
 * Geometry abstract class
 */
abstract class Geometry
{
    private $geos = \null;
    protected $srid = \null;
    protected $geom_type;
    // Abtract: Standard
    // -----------------
    public abstract function area();
    public abstract function boundary();
    public abstract function centroid();
    public abstract function length();
    public abstract function y();
    public abstract function x();
    public abstract function numGeometries();
    public abstract function geometryN($n);
    public abstract function startPoint();
    public abstract function endPoint();
    public abstract function isRing();
    // Mssing dependancy
    public abstract function isClosed();
    // Missing dependancy
    public abstract function numPoints();
    public abstract function pointN($n);
    public abstract function exteriorRing();
    public abstract function numInteriorRings();
    public abstract function interiorRingN($n);
    public abstract function dimension();
    public abstract function equals($geom);
    public abstract function isEmpty();
    public abstract function isSimple();
    // Abtract: Non-Standard
    // ---------------------
    public abstract function getBBox();
    public abstract function asArray();
    public abstract function getPoints();
    public abstract function explode();
    public abstract function greatCircleLength();
    //meters
    public abstract function haversineLength();
    //degrees
    // Public: Standard -- Common to all geometries
    // --------------------------------------------
    public function SRID()
    {
    }
    public function setSRID($srid)
    {
    }
    public function envelope()
    {
    }
    public function geometryType()
    {
    }
    // Public: Non-Standard -- Common to all geometries
    // ------------------------------------------------
    // $this->out($format, $other_args);
    public function out()
    {
    }
    // Public: Aliases
    // ---------------
    public function getCentroid()
    {
    }
    public function getArea()
    {
    }
    public function getX()
    {
    }
    public function getY()
    {
    }
    public function getGeos()
    {
    }
    public function getGeomType()
    {
    }
    public function getSRID()
    {
    }
    public function asText()
    {
    }
    public function asBinary()
    {
    }
    // Public: GEOS Only Functions
    // ---------------------------
    public function geos()
    {
    }
    public function setGeos($geos)
    {
    }
    public function pointOnSurface()
    {
    }
    public function equalsExact(\Geometry $geometry)
    {
    }
    public function relate(\Geometry $geometry, $pattern = \null)
    {
    }
    public function checkValidity()
    {
    }
    public function buffer($distance)
    {
    }
    public function intersection(\Geometry $geometry)
    {
    }
    public function convexHull()
    {
    }
    public function difference(\Geometry $geometry)
    {
    }
    public function symDifference(\Geometry $geometry)
    {
    }
    // Can pass in a geometry or an array of geometries
    public function union(\Geometry $geometry)
    {
    }
    public function simplify($tolerance, $preserveTopology = \false)
    {
    }
    public function disjoint(\Geometry $geometry)
    {
    }
    public function touches(\Geometry $geometry)
    {
    }
    public function intersects(\Geometry $geometry)
    {
    }
    public function crosses(\Geometry $geometry)
    {
    }
    public function within(\Geometry $geometry)
    {
    }
    public function contains(\Geometry $geometry)
    {
    }
    public function overlaps(\Geometry $geometry)
    {
    }
    public function covers(\Geometry $geometry)
    {
    }
    public function coveredBy(\Geometry $geometry)
    {
    }
    public function distance(\Geometry $geometry)
    {
    }
    public function hausdorffDistance(\Geometry $geometry)
    {
    }
    public function project(\Geometry $point, $normalized = \null)
    {
    }
    // Public - Placeholders
    // ---------------------
    public function hasZ()
    {
    }
    public function is3D()
    {
    }
    public function isMeasured()
    {
    }
    public function coordinateDimension()
    {
    }
    public function z()
    {
    }
    public function m()
    {
    }
}