<?php

namespace OAuth\Common\Consumer;

/**
 * Value object for the credentials of an OAuth service.
 */
class Credentials implements \OAuth\Common\Consumer\CredentialsInterface
{
    /**
     * @var string
     */
    protected $consumerId;
    /**
     * @var string
     */
    protected $consumerSecret;
    /**
     * @var string
     */
    protected $callbackUrl;
    /**
     * @param string $consumerId
     * @param string $consumerSecret
     * @param string $callbackUrl
     */
    public function __construct($consumerId, $consumerSecret, $callbackUrl)
    {
    }
    /**
     * @return string
     */
    public function getCallbackUrl()
    {
    }
    /**
     * @return string
     */
    public function getConsumerId()
    {
    }
    /**
     * @return string
     */
    public function getConsumerSecret()
    {
    }
}