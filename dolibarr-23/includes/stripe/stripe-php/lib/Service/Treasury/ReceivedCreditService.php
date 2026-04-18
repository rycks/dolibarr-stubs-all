<?php

namespace Stripe\Service\Treasury;

class ReceivedCreditService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of ReceivedCredits.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\ReceivedCredit>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of an existing ReceivedCredit by passing the unique
     * ReceivedCredit ID from the ReceivedCredit list.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\ReceivedCredit
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}