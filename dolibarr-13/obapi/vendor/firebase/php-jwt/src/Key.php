<?php

namespace Firebase\JWT;

class Key
{
    /** @var string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate */
    private $keyMaterial;
    /** @var string */
    private $algorithm;
    /**
     * @param string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate $keyMaterial
     * @param string $algorithm
     */
    public function __construct($keyMaterial, string $algorithm)
    {
    }
    /**
     * Return the algorithm valid for this key
     *
     * @return string
     */
    public function getAlgorithm() : string
    {
    }
    /**
     * @return string|resource|OpenSSLAsymmetricKey|OpenSSLCertificate
     */
    public function getKeyMaterial()
    {
    }
}