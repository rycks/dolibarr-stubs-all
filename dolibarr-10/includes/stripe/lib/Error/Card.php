<?php

namespace Stripe\Error;

class Card extends \Stripe\Error\Base
{
    public function __construct($message, $stripeParam, $stripeCode, $httpStatus, $httpBody, $jsonBody, $httpHeaders = null)
    {
    }
    public function getDeclineCode()
    {
    }
    public function getStripeParam()
    {
    }
}