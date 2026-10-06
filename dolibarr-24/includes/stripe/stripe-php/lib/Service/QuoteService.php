<?php

namespace Stripe\Service;

class QuoteService extends \Stripe\Service\AbstractService
{
    /**
     * Accepts the specified quote.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote
     */
    public function accept($id, $params = null, $opts = null)
    {
    }
    /**
     * Returns a list of your quotes.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Quote>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * When retrieving a quote, there is an includable <a
     * href="https://stripe.com/docs/api/quotes/object#quote_object-computed-upfront-line_items"><strong>computed.upfront.line_items</strong></a>
     * property containing the first handful of those items. There is also a URL where
     * you can retrieve the full (paginated) list of upfront line items.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem>
     */
    public function allComputedUpfrontLineItems($id, $params = null, $opts = null)
    {
    }
    /**
     * When retrieving a quote, there is an includable <strong>line_items</strong>
     * property containing the first handful of those items. There is also a URL where
     * you can retrieve the full (paginated) list of line items.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\LineItem>
     */
    public function allLineItems($id, $params = null, $opts = null)
    {
    }
    /**
     * Cancels the quote.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote
     */
    public function cancel($id, $params = null, $opts = null)
    {
    }
    /**
     * A quote models prices and services for a customer. Default options for
     * <code>header</code>, <code>description</code>, <code>footer</code>, and
     * <code>expires_at</code> can be set in the dashboard via the <a
     * href="https://dashboard.stripe.com/settings/billing/quote">quote template</a>.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Finalizes the quote.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote
     */
    public function finalizeQuote($id, $params = null, $opts = null)
    {
    }
    /**
     * Retrieves the quote with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * A quote models prices and services for a customer.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Quote
     */
    public function update($id, $params = null, $opts = null)
    {
    }
    /**
     * Download the PDF for a finalized quote.
     *
     * @param string $id
     * @param callable $readBodyChunkCallable
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function pdf($id, $readBodyChunkCallable, $params = null, $opts = null)
    {
    }
}