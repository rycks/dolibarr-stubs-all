<?php

namespace OAuth\Common\Http\Uri;

/**
 * Standards-compliant URI class.
 */
class Uri implements \OAuth\Common\Http\Uri\UriInterface
{
    /**
     * @var string
     */
    private $scheme = 'http';
    /**
     * @var string
     */
    private $userInfo = '';
    /**
     * @var string
     */
    private $rawUserInfo = '';
    /**
     * @var string
     */
    private $host;
    /**
     * @var int
     */
    private $port = 80;
    /**
     * @var string
     */
    private $path = '/';
    /**
     * @var string
     */
    private $query = '';
    /**
     * @var string
     */
    private $fragment = '';
    /**
     * @var bool
     */
    private $explicitPortSpecified = false;
    /**
     * @var bool
     */
    private $explicitTrailingHostSlash = false;
    /**
     * @param string $uri
     */
    public function __construct($uri = null)
    {
    }
    /**
     * @param string $uri
     *
     * @throws \InvalidArgumentException
     */
    protected function parseUri($uri)
    {
    }
    /**
     * @param string $rawUserInfo
     *
     * @return string
     */
    protected function protectUserInfo($rawUserInfo)
    {
    }
    /**
     * @return string
     */
    public function getScheme()
    {
    }
    /**
     * @return string
     */
    public function getUserInfo()
    {
    }
    /**
     * @return string
     */
    public function getRawUserInfo()
    {
    }
    /**
     * @return string
     */
    public function getHost()
    {
    }
    /**
     * @return int
     */
    public function getPort()
    {
    }
    /**
     * @return string
     */
    public function getPath()
    {
    }
    /**
     * @return string
     */
    public function getQuery()
    {
    }
    /**
     * @return string
     */
    public function getFragment()
    {
    }
    /**
     * Uses protected user info by default as per rfc3986-3.2.1
     * Uri::getRawAuthority() is available if plain-text password information is desirable.
     *
     * @return string
     */
    public function getAuthority()
    {
    }
    /**
     * @return string
     */
    public function getRawAuthority()
    {
    }
    /**
     * @return string
     */
    public function getAbsoluteUri()
    {
    }
    /**
     * @return string
     */
    public function getRelativeUri()
    {
    }
    /**
     * Uses protected user info by default as per rfc3986-3.2.1
     * Uri::getAbsoluteUri() is available if plain-text password information is desirable.
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * @param $path
     */
    public function setPath($path)
    {
    }
    /**
     * @param string $query
     */
    public function setQuery($query)
    {
    }
    /**
     * @param string $var
     * @param string $val
     */
    public function addToQuery($var, $val)
    {
    }
    /**
     * @param string $fragment
     */
    public function setFragment($fragment)
    {
    }
    /**
     * @param string $scheme
     */
    public function setScheme($scheme)
    {
    }
    /**
     * @param string $userInfo
     */
    public function setUserInfo($userInfo)
    {
    }
    /**
     * @param int $port
     */
    public function setPort($port)
    {
    }
    /**
     * @param string $host
     */
    public function setHost($host)
    {
    }
    /**
     * @return bool
     */
    public function hasExplicitTrailingHostSlash()
    {
    }
    /**
     * @return bool
     */
    public function hasExplicitPortSpecified()
    {
    }
}