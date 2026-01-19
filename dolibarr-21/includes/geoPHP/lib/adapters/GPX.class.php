<?php

/*
 * Copyright (c) Patrick Hayes
 *
 * This code is open-source and licenced under the Modified BSD License.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * PHP Geometry/GPX encoder/decoder
 */
class GPX extends \GeoAdapter
{
    private $namespace = \false;
    private $nss = '';
    // Name-space string. eg 'georss:'
    /**
     * Read GPX string into geometry objects
     *
     * @param string $gpx A GPX string
     *
     * @return Geometry|GeometryCollection
     */
    public function read($gpx)
    {
    }
    /**
     * Serialize geometries into a GPX string.
     *
     * @param Geometry $geometry
     *
     * @return string The GPX string representation of the input geometries
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
    protected function parseWaypoints()
    {
    }
    protected function parseTracks()
    {
    }
    protected function parseRoutes()
    {
    }
    protected function geometryToGPX($geom)
    {
    }
    private function pointToGPX($geom)
    {
    }
    private function linestringToGPX($geom)
    {
    }
    public function collectionToGPX($geom)
    {
    }
}