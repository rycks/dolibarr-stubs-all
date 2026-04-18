<?php

namespace Stripe\Exception;

/**
 * Implements properties and methods common to all (non-SPL) Stripe exceptions.
 */
abstract class ApiErrorException extends \Exception implements \Stripe\Exception\ExceptionInterface
{
    protected $error;
    protected $httpBody;
    protected $httpHeaders;
    protected $httpStatus;
    protected $jsonBody;
    protected $requestId;
    protected $stripeCode;
    /**
     * Creates a new API error exception.
     *
     * @param string $message the exception message
     * @param null|int $httpStatus the HTTP status code
     * @param null|string $httpBody the HTTP body as a string
     * @param null|array $jsonBody the JSON deserialized body
     * @param null|array|\Stripe\Util\CaseInsensitiveArray $httpHeaders the HTTP headers array
     * @param null|string $stripeCode the Stripe error code
     *
     * @return static
     */
    public static function factory($message, $httpStatus = null, $httpBody = null, $jsonBody = null, $httpHeaders = null, $stripeCode = null)
    {
    }
    /**
     * Gets the Stripe error object.
     *
     * @return null|\Stripe\ErrorObject
     */
    public function getError()
    {
    }
    /**
     * Sets the Stripe error object.
     *
     * @param null|\Stripe\ErrorObject $error
     */
    public function setError($error)
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
     * Gets the HTTP headers array.
     *
     * @return null|array|\Stripe\Util\CaseInsensitiveArray
     */
    public function getHttpHeaders()
    {
    }
    /**
     * Sets the HTTP headers array.
     *
     * @param null|array|\Stripe\Util\CaseInsensitiveArray $httpHeaders
     */
    public function setHttpHeaders($httpHeaders)
    {
    }
    /**
     * Gets the HTTP status code.
     *
     * @return null|int
     */
    public function getHttpStatus()
    {
    }
    /**
     * Sets the HTTP status code.
     *
     * @param null|int $httpStatus
     */
    public function setHttpStatus($httpStatus)
    {
    }
    /**
     * Gets the JSON deserialized body.
     *
     * @return null|array<string, mixed>
     */
    public function getJsonBody()
    {
    }
    /**
     * Sets the JSON deserialized body.
     *
     * @param null|array<string, mixed> $jsonBody
     */
    public function setJsonBody($jsonBody)
    {
    }
    /**
     * Gets the Stripe request ID.
     *
     * @return null|string
     */
    public function getRequestId()
    {
    }
    /**
     * Sets the Stripe request ID.
     *
     * @param null|string $requestId
     */
    public function setRequestId($requestId)
    {
    }
    /**
     * Gets the Stripe error code.
     *
     * Cf. the `CODE_*` constants on {@see \Stripe\ErrorObject} for possible
     * values.
     *
     * @return null|string
     */
    public function getStripeCode()
    {
    }
    /**
     * Sets the Stripe error code.
     *
     * @param null|string $stripeCode
     */
    public function setStripeCode($stripeCode)
    {
    }
    /**
     * Returns the string representation of the exception.
     *
     * @return string
     */
    public function __toString()
    {
    }
    protected function constructErrorObject()
    {
    }
}