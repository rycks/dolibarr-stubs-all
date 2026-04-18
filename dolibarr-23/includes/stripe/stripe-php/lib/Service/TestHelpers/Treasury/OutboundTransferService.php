<?php

namespace Stripe\Service\TestHelpers\Treasury;

class OutboundTransferService extends \Stripe\Service\AbstractService
{
    /**
     * Transitions a test mode created OutboundTransfer to the <code>failed</code>
     * status. The OutboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\OutboundTransfer
     */
    public function fail($id, $params = null, $opts = null)
    {
    }
    /**
     * Transitions a test mode created OutboundTransfer to the <code>posted</code>
     * status. The OutboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\OutboundTransfer
     */
    public function post($id, $params = null, $opts = null)
    {
    }
    /**
     * Transitions a test mode created OutboundTransfer to the <code>returned</code>
     * status. The OutboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\OutboundTransfer
     */
    public function returnOutboundTransfer($id, $params = null, $opts = null)
    {
    }
}