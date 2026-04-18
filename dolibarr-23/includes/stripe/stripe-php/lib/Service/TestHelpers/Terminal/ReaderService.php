<?php

namespace Stripe\Service\TestHelpers\Terminal;

class ReaderService extends \Stripe\Service\AbstractService
{
    /**
     * Presents a payment method on a simulated reader. Can be used to simulate
     * accepting a payment, saving a card or refunding a transaction.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Terminal\Reader
     */
    public function presentPaymentMethod($id, $params = null, $opts = null)
    {
    }
}