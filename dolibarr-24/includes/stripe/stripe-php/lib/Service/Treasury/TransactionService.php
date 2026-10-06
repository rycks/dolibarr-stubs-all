<?php

namespace Stripe\Service\Treasury;

class TransactionService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of Transaction objects.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\Transaction>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of an existing Transaction.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\Transaction
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}