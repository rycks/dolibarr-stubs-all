<?php

namespace Stripe;

abstract class OAuth
{
    /**
     * Generates a URL to Stripe's OAuth form.
     *
     * @param array|null $params
     * @param array|null $opts
     *
     * @return string The URL to Stripe's OAuth form.
     */
    public static function authorizeUrl($params = null, $opts = null)
    {
    }
    /**
     * Use an authoriztion code to connect an account to your platform and
     * fetch the user's credentials.
     *
     * @param array|null $params
     * @param array|null $opts
     *
     * @return StripeObject Object containing the response from the API.
     */
    public static function token($params = null, $opts = null)
    {
    }
    /**
     * Disconnects an account from your platform.
     *
     * @param array|null $params
     * @param array|null $opts
     *
     * @return StripeObject Object containing the response from the API.
     */
    public static function deauthorize($params = null, $opts = null)
    {
    }
    private static function _getClientId($params = null)
    {
    }
}