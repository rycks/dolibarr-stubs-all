<?php

namespace OAuth\OAuth1\Service;

class Flickr extends \OAuth\OAuth1\Service\AbstractService
{
    protected $format;
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, \OAuth\OAuth1\Signature\SignatureInterface $signature, \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    public function getRequestTokenEndpoint()
    {
    }
    public function getAuthorizationEndpoint()
    {
    }
    public function getAccessTokenEndpoint()
    {
    }
    protected function parseRequestTokenResponse($responseBody)
    {
    }
    protected function parseAccessTokenResponse($responseBody)
    {
    }
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    public function requestRest($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    public function requestXmlrpc($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    public function requestSoap($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    public function requestJson($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    public function requestPhp($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
}