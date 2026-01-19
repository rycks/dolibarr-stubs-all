<?php

/**
 * GeoJSON class : a geojson reader/writer.
 *
 * Note that it will always return a GeoJSON geometry. This
 * means that if you pass it a feature, it will return the
 * geometry of that feature strip everything else.
 */
class GeoJSON extends \GeoAdapter
{
    /**
     * Given an object or a string, return a Geometry
     *
     * @param mixed $input The GeoJSON string or object
     *
     * @return object Geometry
     */
    public function read($input)
    {
    }
    private function objToGeom($obj)
    {
    }
    private function arrayToPoint($array)
    {
    }
    private function arrayToLineString($array)
    {
    }
    private function arrayToPolygon($array)
    {
    }
    private function arrayToMultiPoint($array)
    {
    }
    private function arrayToMultiLineString($array)
    {
    }
    private function arrayToMultiPolygon($array)
    {
    }
    private function objToGeometryCollection($obj)
    {
    }
    /**
     * Serializes an object into a geojson string
     *
     *
     * @param Geometry $obj The object to serialize
     *
     * @return string The GeoJSON string
     */
    public function write(\Geometry $geometry, $return_array = \false)
    {
    }
    public function getArray($geometry)
    {
    }
}