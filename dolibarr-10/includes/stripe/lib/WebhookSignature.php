<?php

namespace Stripe;

abstract class WebhookSignature
{
    const EXPECTED_SCHEME = "v1";
    /**
     * Verifies the signature header sent by Stripe. Throws a
     * SignatureVerification exception if the verification fails for any
     * reason.
     *
     * @param string $payload the payload sent by Stripe.
     * @param string $header the contents of the signature header sent by
     *  Stripe.
     * @param string $secret secret used to generate the signature.
     * @param int $tolerance maximum difference allowed between the header's
     *  timestamp and the current time
     * @throws \Stripe\Error\SignatureVerification if the verification fails.
     * @return bool
     */
    public static function verifyHeader($payload, $header, $secret, $tolerance = null)
    {
    }
    /**
     * Extracts the timestamp in a signature header.
     *
     * @param string $header the signature header
     * @return int the timestamp contained in the header, or -1 if no valid
     *  timestamp is found
     */
    private static function getTimestamp($header)
    {
    }
    /**
     * Extracts the signatures matching a given scheme in a signature header.
     *
     * @param string $header the signature header
     * @param string $scheme the signature scheme to look for.
     * @return array the list of signatures matching the provided scheme.
     */
    private static function getSignatures($header, $scheme)
    {
    }
    /**
     * Computes the signature for a given payload and secret.
     *
     * The current scheme used by Stripe ("v1") is HMAC/SHA-256.
     *
     * @param string $payload the payload to sign.
     * @param string $secret the secret used to generate the signature.
     * @return string the signature as a string.
     */
    private static function computeSignature($payload, $secret)
    {
    }
}