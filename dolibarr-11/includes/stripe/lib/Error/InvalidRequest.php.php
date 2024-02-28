<?php

namespace Stripe\Error;

class InvalidRequest extends \Stripe\Error\Base
{
    public function __construct($message, $stripeParam, $httpStatus = null, $httpBody = null, $jsonBody = null, $httpHeaders = null)
    {
    }
    public function getStripeParam()
    {
    }
}