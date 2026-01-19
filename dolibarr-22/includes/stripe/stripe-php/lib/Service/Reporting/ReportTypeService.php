<?php

namespace Stripe\Service\Reporting;

class ReportTypeService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a full list of Report Types.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Reporting\ReportType>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of a Report Type. (Certain report types require a <a
     * href="https://stripe.com/docs/keys#test-live-modes">live-mode API key</a>.).
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Reporting\ReportType
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}