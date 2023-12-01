<?php

namespace Stripe\Service;

class PromotionCodeService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your promotion codes.
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
     * A promotion code points to a coupon. You can optionally restrict the code to a
     * specific customer, redemption limit, and expiration date.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PromotionCode
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the promotion code with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PromotionCode
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates the specified promotion code by setting the values of the parameters
     * passed. Most fields are, by design, not editable.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\PromotionCode
     */
    public function update($id, $params = null, $opts = null)
    {
    }
}