<?php

namespace Stripe\Service\Reporting;

class ReportRunService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of Report Runs, with the most recent appearing first.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Reporting\ReportRun>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Creates a new object and begin running the report. (Certain report types require
     * a <a href="https://stripe.com/docs/keys#test-live-modes">live-mode API key</a>.).
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Reporting\ReportRun
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of an existing Report Run.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Reporting\ReportRun
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}