<?php

namespace Stripe\Exception;

/**
 * CardException is thrown when a user enters a card that can't be charged for
 * some reason.
 */
class CardException extends \Stripe\Exception\ApiErrorException
{
    protected $declineCode;
    protected $stripeParam;
    /**
     * Creates a new CardException exception.
     *
     * @param string $message the exception message
     * @param null|int $httpStatus the HTTP status code
     * @param null|string $httpBody the HTTP body as a string
     * @param null|array $jsonBody the JSON deserialized body
     * @param null|array|\Stripe\Util\CaseInsensitiveArray $httpHeaders the HTTP headers array
     * @param null|string $stripeCode the Stripe error code
     * @param null|string $declineCode the decline code
     * @param null|string $stripeParam the parameter related to the error
     *
     * @return CardException
     */
    public static function factory($message, $httpStatus = null, $httpBody = null, $jsonBody = null, $httpHeaders = null, $stripeCode = null, $declineCode = null, $stripeParam = null)
    {
    }
    /**
     * Gets the decline code.
     *
     * @return null|string
     */
    public function getDeclineCode()
    {
    }
    /**
     * Sets the decline code.
     *
     * @param null|string $declineCode
     */
    public function setDeclineCode($declineCode)
    {
    }
    /**
     * Gets the parameter related to the error.
     *
     * @return null|string
     */
    public function getStripeParam()
    {
    }
    /**
     * Sets the parameter related to the error.
     *
     * @param null|string $stripeParam
     */
    public function setStripeParam($stripeParam)
    {
    }
}