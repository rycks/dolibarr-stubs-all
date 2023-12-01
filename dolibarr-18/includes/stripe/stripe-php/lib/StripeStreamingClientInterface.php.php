<?php

namespace Stripe;

/**
 * Interface for a Stripe client.
 */
interface StripeStreamingClientInterface extends \Stripe\BaseStripeClientInterface
{
    public function requestStream($method, $path, $readBodyChunkCallable, $params, $opts);
}