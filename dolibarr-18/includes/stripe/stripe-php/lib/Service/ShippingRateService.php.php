<?php

namespace Stripe\Service;

class ShippingRateService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your shipping rates.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\ShippingRate>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Creates a new shipping rate object.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ShippingRate
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Returns the shipping rate object with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ShippingRate
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates an existing shipping rate object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ShippingRate
     */
    public function update($id, $params = null, $opts = null)
    {
    }
}