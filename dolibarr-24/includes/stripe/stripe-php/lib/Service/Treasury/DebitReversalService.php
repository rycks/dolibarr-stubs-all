<?php

namespace Stripe\Service\Treasury;

class DebitReversalService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of DebitReversals.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\DebitReversal>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Reverses a ReceivedDebit and creates a DebitReversal object.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\DebitReversal
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Retrieves a DebitReversal object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\DebitReversal
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}