<?php

/*
 * Copyright (c) Patrick Hayes
 *
 * This code is open-source and licenced under the Modified BSD License.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * PHP Geometry/GeoRSS encoder/decoder
 */
class GeoRSS extends \GeoAdapter
{
    private $namespace = \false;
    private $nss = '';
    // Name-space string. eg 'georss:'
    /**
     * Read GeoRSS string into geometry objects
     *
     * @param string $georss - an XML feed containing geoRSS
     *
     * @return Geometry|GeometryCollection
     */
    public function read($gpx)
    {
    }
    /**
     * Serialize geometries into a GeoRSS string.
     *
     * @param Geometry $geometry
     *
     * @return string The georss string representation of the input geometries
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
    protected function getPointsFromCoords($string)
    {
    }
    protected function parsePoints()
    {
    }
    protected function parseLines()
    {
    }
    protected function parsePolygons()
    {
    }
    // Boxes are rendered into polygons
    protected function parseBoxes()
    {
    }
    // Circles are rendered into points
    // @@TODO: Add good support once we have circular-string geometry support
    protected function parseCircles()
    {
    }
    protected function geometryToGeoRSS($geom)
    {
    }
    private function pointToGeoRSS($geom)
    {
    }
    private function linestringToGeoRSS($geom)
    {
    }
    private function polygonToGeoRSS($geom)
    {
    }
    public function collectionToGeoRSS($geom)
    {
    }
}