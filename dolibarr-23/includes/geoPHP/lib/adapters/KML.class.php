<?php

/*
 * Copyright (c) Patrick Hayes
 * Copyright (c) 2010-2011, Arnaud Renevier
 *
 * This code is open-source and licenced under the Modified BSD License.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * PHP Geometry/KML encoder/decoder
 *
 * Mainly inspired/adapted from OpenLayers( http://www.openlayers.org )
 *   Openlayers/format/WKT.js
 *
 * @package    sfMapFishPlugin
 * @subpackage GeoJSON
 * @author     Camptocamp <info@camptocamp.com>
 */
class KML extends \GeoAdapter
{
    private $namespace = \false;
    private $nss = '';
    // Name-space string. eg 'georss:'
    /**
     * Read KML string into geometry objects
     *
     * @param string $kml A KML string
     *
     * @return Geometry|GeometryCollection
     */
    public function read($kml)
    {
    }
    /**
     * Serialize geometries into a KML string.
     *
     * @param Geometry $geometry
     *
     * @return string The KML string representation of the input geometries
     */
    public function write(\Geometry $geometry, $namespace = \false)
    {
    }
    public function geomFromText($text)
    {
    }
    protected function geomFromXML()
    {
    }
    protected function childElements($xml, $nodename = '')
    {
    }
    protected function parsePoint($xml)
    {
    }
    protected function parseLineString($xml)
    {
    }
    protected function parsePolygon($xml)
    {
    }
    protected function parseGeometryCollection($xml)
    {
    }
    protected function _extractCoordinates($xml)
    {
    }
    private function geometryToKML($geom)
    {
    }
    private function pointToKML($geom)
    {
    }
    private function linestringToKML($geom, $type = \false)
    {
    }
    public function polygonToKML($geom)
    {
    }
    public function collectionToKML($geom)
    {
    }
}