<?php

namespace Stripe\Service\Treasury;

class TransactionEntryService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of TransactionEntry objects.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\TransactionEntry>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Retrieves a TransactionEntry object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\TransactionEntry
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}