<?php

namespace Stripe\Service;

class EphemeralKeyService extends \Stripe\Service\AbstractService
{
    /**
     * Invalidates a short-lived API key for a given resource.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\EphemeralKey
     */
    public function delete($id, $params = null, $opts = null)
    {
    }
    /**
     * Creates a short-lived API key for a given resource.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\EphemeralKey
     */
    public function create($params = null, $opts = null)
    {
    }
}