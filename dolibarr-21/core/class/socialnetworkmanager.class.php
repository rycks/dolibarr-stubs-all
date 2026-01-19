<?php

/**
 * Class to manage Social network posts
 */
class SocialNetworkManager
{
    /**
     * @var DoliDB Database handler
     */
    public $db;
    /**
     * @var string  social network name
     */
    private $platform;
    /**
     * @var MastodonHandler	Instance of class handler
     */
    private $handler;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int
     */
    private $lastFetchDate;
    // @phpstan-ignore-line
    /**
     *	Constructor
     *
     *  @param	string		$platform      name of social network
     *  @param	array{username?:string,password?:string,name_app?:string,client_id?:string,client_secret?:string,redirect_uri?:string,access_token?:string}	$authParams    other parameters
     */
    public function __construct($platform, $authParams = [])
    {
    }
    /**
     * Initialize the social network needed
     * @param	array{username?:string,password?:string,name_app?:string,client_id?:string,client_secret?:string,redirect_uri?:string,access_token?:string}	$authParams    other parameters
     * @return void   new instance if founded
     */
    private function initializeHandler($authParams)
    {
    }
    /**
     * Fetch Social Network API to retrieve posts.
     *
     * @param string    $urlAPI     URL of the Fediverse API.
     * @param int       $maxNb      Maximum number of posts to retrieve (default is 5).
     * @param int       $cacheDelay Number of seconds to use cached data (0 to disable caching).
     * @param string    $cacheDir   Directory to store cached data.
     * @param array{username?:string,password?:string,name_app?:string,client_id?:string,client_secret?:string,redirect_uri?:string,access_token?:string}	$authParams Authentication parameters
     * @return bool      Status code: false if error,  array if success.
     */
    public function fetchPosts($urlAPI, $maxNb = 5, $cacheDelay = 60, $cacheDir = '', $authParams = [])
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
     * @return int Timestamp of the last successful fetch.
     */
    public function getLastFetchDate()
    {
    }
}