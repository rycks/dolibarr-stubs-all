<?php

namespace Stripe\Service\TestHelpers\Treasury;

class OutboundPaymentService extends \Stripe\Service\AbstractService
{
    /**
     * Transitions a test mode created OutboundPayment to the <code>failed</code>
     * status. The OutboundPayment must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\OutboundPayment
     */
    public function fail($id, $params = null, $opts = null)
    {
    }
    /**
     * Transitions a test mode created OutboundPayment to the <code>posted</code>
     * status. The OutboundPayment must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\OutboundPayment
     */
    public function post($id, $params = null, $opts = null)
    {
    }
    /**
     * Transitions a test mode created OutboundPayment to the <code>returned</code>
     * status. The OutboundPayment must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\OutboundPayment
     */
    public function returnOutboundPayment($id, $params = null, $opts = null)
    {
    }
}