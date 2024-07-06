<?php

namespace Stripe\Service\Radar;

class EarlyFraudWarningService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of early fraud warnings.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Radar\EarlyFraudWarning>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of an early fraud warning that has previously been
     * created.
     *
     * Please refer to the <a href="#early_fraud_warning_object">early fraud
     * warning</a> object reference for more details.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Radar\EarlyFraudWarning
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}