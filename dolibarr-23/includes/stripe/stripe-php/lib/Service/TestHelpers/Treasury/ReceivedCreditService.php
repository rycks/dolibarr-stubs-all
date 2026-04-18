<?php

namespace Stripe\Service\TestHelpers\Treasury;

class ReceivedCreditService extends \Stripe\Service\AbstractService
{
    /**
     * Use this endpoint to simulate a test mode ReceivedCredit initiated by a third
     * party. In live mode, you can’t directly create ReceivedCredits initiated by
     * third parties.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\ReceivedCredit
     */
    public function create($params = null, $opts = null)
    {
    }
}