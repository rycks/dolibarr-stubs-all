<?php

namespace Stripe\Service;

class OAuthService extends \Stripe\Service\AbstractService
{
    /**
     * Sends a request to Stripe's Connect API.
     *
     * @param string $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return \Stripe\StripeObject the object returned by Stripe's Connect API
     */
    protected function requestConnect($method, $path, $params, $opts)
    {
    }
    /**
     * Generates a URL to Stripe's OAuth form.
     *
     * @param null|array $params
     * @param null|array $opts
     *
     * @return string the URL to Stripe's OAuth form
     */
    public function authorizeUrl($params = null, $opts = null)
    {
    }
    /**
     * Use an authoriztion code to connect an account to your platform and
     * fetch the user's credentials.
     *
     * @param null|array $params
     * @param null|array $opts
     *
     * @throws \Stripe\Exception\OAuth\OAuthErrorException if the request fails
     *
     * @return \Stripe\StripeObject object containing the response from the API
     */
    public function token($params = null, $opts = null)
    {
    }
    /**
     * Disconnects an account from your platform.
     *
     * @param null|array $params
     * @param null|array $opts
     *
     * @throws \Stripe\Exception\OAuth\OAuthErrorException if the request fails
     *
     * @return \Stripe\StripeObject object containing the response from the API
     */
    public function deauthorize($params = null, $opts = null)
    {
    }
    private function _getClientId($params = null)
    {
    }
    private function _getClientSecret($params = null)
    {
    }
    /**
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @throws \Stripe\Exception\InvalidArgumentException
     *
     * @return \Stripe\Util\RequestOptions
     */
    private function _parseOpts($opts)
    {
    }
    /**
     * @param \Stripe\Util\RequestOptions $opts
     *
     * @return string
     */
    private function _getBase($opts)
    {
    }
}