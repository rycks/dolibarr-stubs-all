<?php

namespace Stripe\Service\TestHelpers\Issuing;

class CardService extends \Stripe\Service\AbstractService
{
    /**
     * Updates the shipping status of the specified Issuing <code>Card</code> object to
     * <code>delivered</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function deliverCard($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates the shipping status of the specified Issuing <code>Card</code> object to
     * <code>failure</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function failCard($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates the shipping status of the specified Issuing <code>Card</code> object to
     * <code>returned</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function returnCard($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates the shipping status of the specified Issuing <code>Card</code> object to
     * <code>shipped</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Issuing\Card
     */
    public function shipCard($id, $params = null, $opts = null)
    {
    }
}