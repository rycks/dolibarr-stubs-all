<?php

namespace OAuth\Common\Http\Uri;

/**
 * Factory class for uniform resource indicators
 */
class UriFactory implements \OAuth\Common\Http\Uri\UriFactoryInterface
{
    /**
     * Factory method to build a URI from a super-global $_SERVER array.
     *
     * @param array $_server
     *
     * @return UriInterface
     */
    public function createFromSuperGlobalArray(array $_server)
    {
    }
    /**
     * @param string $absoluteUri
     *
     * @return UriInterface
     */
    public function createFromAbsolute($absoluteUri)
    {
    }
    /**
     * Factory method to build a URI from parts
     *
     * @param string $scheme
     * @param string $userInfo
     * @param string $host
     * @param string $port
     * @param string $path
     * @param string $query
     * @param string $fragment
     *
     * @return UriInterface
     */
    public function createFromParts($scheme, $userInfo, $host, $port, $path = '', $query = '', $fragment = '')
    {
    }
    /**
     * @param array $_server
     *
     * @return UriInterface|null
     */
    private function attemptProxyStyleParse($_server)
    {
    }
    /**
     * @param array $_server
     *
     * @return string
     *
     * @throws RuntimeException
     */
    private function detectPath($_server)
    {
    }
    /**
     * @param array $_server
     *
     * @return string
     */
    private function detectHost(array $_server)
    {
    }
    /**
     * @param array $_server
     *
     * @return string
     */
    private function detectPort(array $_server)
    {
    }
    /**
     * @param array $_server
     *
     * @return string
     */
    private function detectQuery(array $_server)
    {
    }
    /**
     * Determine URI scheme component from superglobal array
     *
     * When using ISAPI with IIS, the value will be "off" if the request was
     * not made through the HTTPS protocol. As a result, we filter the
     * value to a bool.
     *
     * @param array $_server A super-global $_SERVER array
     *
     * @return string Returns http or https depending on the URI scheme
     */
    private function detectScheme(array $_server)
    {
    }
}