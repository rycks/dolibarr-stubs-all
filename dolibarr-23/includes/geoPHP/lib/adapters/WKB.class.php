<?php

/*
 * (c) Patrick Hayes
 *
 * This code is open-source and licenced under the Modified BSD License.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * PHP Geometry/WKB encoder/decoder
 *
 */
class WKB extends \GeoAdapter
{
    private $dimension = 2;
    private $z = \false;
    private $m = \false;
    /**
     * Read WKB into geometry objects
     *
     * @param string $wkb
     *   Well-known-binary string
     * @param bool $is_hex_string
     *   If this is a hexedecimal string that is in need of packing
     *
     * @return Geometry
     */
    public function read($wkb, $is_hex_string = \false)
    {
    }
    function getGeometry(&$mem)
    {
    }
    function getPoint(&$mem)
    {
    }
    function getLinstring(&$mem)
    {
    }
    function getPolygon(&$mem)
    {
    }
    function getMulti(&$mem, $type)
    {
    }
    /**
     * Serialize geometries into WKB string.
     *
     * @param Geometry $geometry
     *
     * @return string The WKB string representation of the input geometries
     */
    public function write(\Geometry $geometry, $write_as_hex = \false)
    {
    }
    function writePoint($point)
    {
    }
    function writeLineString($line)
    {
    }
    function writePolygon($poly)
    {
    }
    function writeMulti($geometry)
    {
    }
}