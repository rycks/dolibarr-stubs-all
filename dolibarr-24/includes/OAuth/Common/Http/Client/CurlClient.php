<?php

namespace OAuth\Common\Http\Client;

/**
 * Client implementation for cURL
 */
class CurlClient extends \OAuth\Common\Http\Client\AbstractClient
{
    /**
     * If true, explicitly sets cURL to use SSL version 3. Use this if cURL
     * compiles with GnuTLS SSL.
     *
     * @var bool
     */
    private $forceSSL3 = false;
    /**
     * Additional parameters (as `key => value` pairs) to be passed to `curl_setopt`
     *
     * @var array
     */
    private $parameters = array();
    /**
     * Additional `curl_setopt` parameters
     *
     * @param array $parameters
     */
    public function setCurlParameters(array $parameters)
    {
    }
    /**
     * @param bool $force
     *
     * @return CurlClient
     */
    public function setForceSSL3($force)
    {
    }
    /**
     * Any implementing HTTP providers should send a request to the provided endpoint with the parameters.
     * They should return, in string form, the response body and throw an exception on error.
     *
     * @param UriInterface $endpoint
     * @param mixed        $requestBody
     * @param array        $extraHeaders
     * @param string       $method
     *
     * @return string
     *
     * @throws TokenResponseException
     * @throws \InvalidArgumentException
     */
    public function retrieveResponse(\OAuth\Common\Http\Uri\UriInterface $endpoint, $requestBody, array $extraHeaders = array(), $method = 'POST')
    {
    }
}