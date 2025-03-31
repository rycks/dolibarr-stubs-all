<?php

/**
 *      Class to manage Geo processing
 *		Usage: $dolgeophp=new DolGeoPHP($db);
 */
class DolGeoPHP
{
    /**
     * @var DoliDB	$db		Database handler
     */
    public $db;
    /**
     *  Create an object to build an HTML area to edit a large string content
     *
     *  @param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return data from a value
     *
     * @param	string	$value		Value
     * @return	array{}|array{geojson:string,centroid:Geometry,centroidjson:string}	Centroid
     */
    public function parseGeoString($value)
    {
    }
    /**
     * Return a string with x and y
     *
     * @param	mixed	$value		Value
     * @return	string				X space Y
     */
    public function getXYString($value)
    {
    }
    /**
     * Return a string with x and y
     *
     * @param	mixed	$value		Value
     * @return	string				Class : num points
     */
    public function getPointString($value)
    {
    }
    /**
     * Return wkt
     *
     * @param	string	$geojson	A json string
     * @return	mixed				Value key
     */
    public function getWkt($geojson)
    {
    }
}