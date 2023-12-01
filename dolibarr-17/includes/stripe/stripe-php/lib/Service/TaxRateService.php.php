<?php

namespace Stripe\Service;

class TaxRateService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your tax rates. Tax rates are returned sorted by creation
     * date, with the most recently created tax rates appearing first.
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
     * Creates a new tax rate.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxRate
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Retrieves a tax rate with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxRate
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates an existing tax rate.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TaxRate
     */
    public function update($id, $params = null, $opts = null)
    {
    }
}