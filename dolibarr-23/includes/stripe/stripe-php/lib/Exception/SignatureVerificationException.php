<?php

namespace Stripe\Exception;

/**
 * SignatureVerificationException is thrown when the signature verification for
 * a webhook fails.
 */
class SignatureVerificationException extends \Exception implements \Stripe\Exception\ExceptionInterface
{
    protected $httpBody;
    protected $sigHeader;
    /**
     * Creates a new SignatureVerificationException exception.
     *
     * @param string $message the exception message
     * @param null|string $httpBody the HTTP body as a string
     * @param null|string $sigHeader the `Stripe-Signature` HTTP header
     *
     * @return SignatureVerificationException
     */
    public static function factory($message, $httpBody = null, $sigHeader = null)
    {
    }
    /**
     * Gets the HTTP body as a string.
     *
     * @return null|string
     */
    public function getHttpBody()
    {
    }
    /**
     * Sets the HTTP body as a string.
     *
     * @param null|string $httpBody
     */
    public function setHttpBody($httpBody)
    {
    }
    /**
     * Gets the `Stripe-Signature` HTTP header.
     *
     * @return null|string
     */
    public function getSigHeader()
    {
    }
    /**
     * Sets the `Stripe-Signature` HTTP header.
     *
     * @param null|string $sigHeader
     */
    public function setSigHeader($sigHeader)
    {
    }
}