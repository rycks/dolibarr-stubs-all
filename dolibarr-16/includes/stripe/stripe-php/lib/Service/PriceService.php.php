<?php

namespace Stripe\Service;

class PriceService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your prices.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Creates a new price for an existing product. The price can be recurring or
     * one-time.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Price
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the price with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Price
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates the specified price by setting the values of the parameters passed. Any
     * parameters not provided are left unchanged.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Price
     */
    public function update($id, $params = null, $opts = null)
    {
    }
}