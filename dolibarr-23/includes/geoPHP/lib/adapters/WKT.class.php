<?php

/**
 * WKT (Well Known Text) Adapter
 */
class WKT extends \GeoAdapter
{
    /**
     * Read WKT string into geometry objects
     *
     * @param string $WKT A WKT string
     *
     * @return Geometry
     */
    public function read($wkt)
    {
    }
    private function parsePoint($data_string)
    {
    }
    private function parseLineString($data_string)
    {
    }
    private function parsePolygon($data_string)
    {
    }
    private function parseMultiPoint($data_string)
    {
    }
    private function parseMultiLineString($data_string)
    {
    }
    private function parseMultiPolygon($data_string)
    {
    }
    private function parseGeometryCollection($data_string)
    {
    }
    protected function getDataString($wkt)
    {
    }
    /**
     * Trim the parenthesis and spaces
     */
    protected function trimParens($str)
    {
    }
    protected function beginsWith($str, $char)
    {
    }
    protected function endsWith($str, $char)
    {
    }
    /**
     * Serialize geometries into a WKT string.
     *
     * @param Geometry $geometry
     *
     * @return string The WKT string representation of the input geometries
     */
    public function write(\Geometry $geometry)
    {
    }
    /**
     * Extract geometry to a WKT string
     *
     * @param Geometry $geometry A Geometry object
     *
     * @return string
     */
    public function extractData($geometry)
    {
    }
}