<?php

namespace OAuth\OAuth1\Signature;

class Signature implements \OAuth\OAuth1\Signature\SignatureInterface
{
    /**
     * @var Credentials
     */
    protected $credentials;
    /**
     * @var string
     */
    protected $algorithm;
    /**
     * @var string
     */
    protected $tokenSecret = null;
    /**
     * @param CredentialsInterface $credentials
     */
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials)
    {
    }
    /**
     * @param string $algorithm
     */
    public function setHashingAlgorithm($algorithm)
    {
    }
    /**
     * @param string $token
     */
    public function setTokenSecret($token)
    {
    }
    /**
     * @param UriInterface $uri
     * @param array        $params
     * @param string       $method
     *
     * @return string
     */
    public function getSignature(\OAuth\Common\Http\Uri\UriInterface $uri, array $params, $method = 'POST')
    {
    }
    /**
     * @param array $signatureData
     *
     * @return string
     */
    protected function buildSignatureDataString(array $signatureData)
    {
    }
    /**
     * @return string
     */
    protected function getSigningKey()
    {
    }
    /**
     * @param string $data
     *
     * @return string
     *
     * @throws UnsupportedHashAlgorithmException
     */
    protected function hash($data)
    {
    }
}