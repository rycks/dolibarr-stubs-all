<?php

/*
 * (c) Camptocamp <info@camptocamp.com>
 * (c) Patrick Hayes
 *
 * This code is open-source and licenced under the Modified BSD License.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * PHP Google Geocoder Adapter
 *
 *
 * @package    geoPHP
 * @author     Patrick Hayes <patrick.d.hayes@gmail.com>
 */
class GoogleGeocode extends \GeoAdapter
{
    /**
     * Read an address string or array geometry objects
     *
     * @param string - Address to geocode
     * @param string - Type of Geometry to return. Can either be 'points' or 'bounds' (polygon)
     * @param Geometry|bounds-array - Limit the search area to within this region. For example
     *                                by default geocoding "Cairo" will return the location of Cairo Egypt.
     *                                If you pass a polygon of illinois, it will return Cairo IL.
     * @param return_multiple - Return all results in a multipoint or multipolygon
     * @return Geometry|GeometryCollection
     */
    public function read($address, $return_type = 'point', $bounds = \false, $return_multiple = \false)
    {
    }
    /**
     * Serialize geometries into a WKT string.
     *
     * @param Geometry $geometry
     * @param string $return_type Should be either 'string' or 'array'
     *
     * @return string Does a reverse geocode of the geometry
     */
    public function write(\Geometry $geometry, $return_type = 'string')
    {
    }
    private function getPoint($delta = 0)
    {
    }
    private function getPolygon($delta = 0)
    {
    }
    private function getTopLeft($delta = 0)
    {
    }
    private function getTopRight($delta = 0)
    {
    }
    private function getBottomLeft($delta = 0)
    {
    }
    private function getBottomRight($delta = 0)
    {
    }
}