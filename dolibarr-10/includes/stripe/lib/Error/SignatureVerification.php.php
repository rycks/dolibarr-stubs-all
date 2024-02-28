<?php

namespace Stripe\Error;

class SignatureVerification extends \Stripe\Error\Base
{
    public function __construct($message, $sigHeader, $httpBody = null)
    {
    }
    public function getSigHeader()
    {
    }
}