<?php

namespace Stripe\Service\TestHelpers;

class CustomerService extends \Stripe\Service\AbstractService
{
    /**
     * Create an incoming testmode bank transfer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Customer
     */
    public function fundCashBalance($id, $params = null, $opts = null)
    {
    }
}