<?php

namespace OAuth\Common\Http\Client;

/**
 * Client implementation for streams/file_get_contents
 */
class StreamClient extends \OAuth\Common\Http\Client\AbstractClient
{
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
    private function generateStreamContext($body, $headers, $method)
    {
    }
}