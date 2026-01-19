<?php

namespace Stripe\Error;

abstract class Base extends \Exception
{
    public function __construct($message, $httpStatus = null, $httpBody = null, $jsonBody = null, $httpHeaders = null)
    {
    }
    public function getStripeCode()
    {
    }
    public function getHttpStatus()
    {
    }
    public function getHttpBody()
    {
    }
    public function getJsonBody()
    {
    }
    public function getHttpHeaders()
    {
    }
    public function getRequestId()
    {
    }
    public function __toString()
    {
    }
}