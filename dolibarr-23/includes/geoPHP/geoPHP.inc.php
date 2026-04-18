<?php

class geoPHP
{
    static function version()
    {
    }
    // geoPHP::load($data, $type, $other_args);
    // if $data is an array, all passed in values will be combined into a single geometry
    static function load()
    {
    }
    static function getAdapterMap()
    {
    }
    static function geometryList()
    {
    }
    static function geosInstalled($force = \null)
    {
    }
    static function geosToGeometry($geos)
    {
    }
    // Reduce a geometry, or an array of geometries, into their 'lowest' available common geometry.
    // For example a GeometryCollection of only points will become a MultiPoint
    // A multi-point containing a single point will return a point.
    // An array of geometries can be passed and they will be compiled into a single geometry
    static function geometryReduce($geometry)
    {
    }
    // Detect a format given a value. This function is meant to be SPEEDY.
    // It could make a mistake in XML detection if you are mixing or using namespaces in weird ways (ie, KML inside an RSS feed)
    static function detectFormat(&$input)
    {
    }
}