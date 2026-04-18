<?php

/**
 * 	Class to parse Fediverse files
 */
class FediverseParser
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var String Error code (or message)
     */
    public $error = '';
    /**
     * @var Object  Name of object manager
     */
    private $manager;
    /**
     *	Constructor
     *
     *  @param		string		$platform      name of social network
     */
    public function __construct($platform)
    {
    }
    /**
     * Parse Fediverse API to retrieve posts.
     *
     * @param string $urlAPI URL of the Fediverse API.
     * @param int    $maxNb Maximum number of posts to retrieve (default is 5).
     * @param int    $cacheDelay Number of seconds to use cached data (0 to disable caching).
     * @param string $cacheDir Directory to store cached data.
     * @return int Status code: <0 if error, >0 if success.
     */
    public function parser($urlAPI, $maxNb = 5, $cacheDelay = 60, $cacheDir = '')
    {
    }
    /**
     * Get the list of retrieved posts.
     *
     * @return array<array{id:string,content:string,created_at:string,url:string,author_name:string,author_avatar?:string}|array{}>		Posts fetched from the API
     */
    public function getPosts()
    {
    }
    /**
     * Get the last fetch date.
     *
     * @return int|string Timestamp of the last successful fetch.
     */
    public function getLastFetchDate()
    {
    }
}