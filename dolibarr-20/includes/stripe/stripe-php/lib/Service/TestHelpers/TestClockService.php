<?php

namespace Stripe\Service\TestHelpers;

class TestClockService extends \Stripe\Service\AbstractService
{
    /**
     * Starts advancing a test clock to a specified time in the future. Advancement is
     * done when status changes to <code>Ready</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TestHelpers\TestClock
     */
    public function advance($id, $params = null, $opts = null)
    {
    }
    /**
     * Returns a list of your test clocks.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\TestHelpers\TestClock>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Creates a new test clock that can be attached to new customers and quotes.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TestHelpers\TestClock
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Deletes a test clock.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TestHelpers\TestClock
     */
    public function delete($id, $params = null, $opts = null)
    {
    }
    /**
     * Retrieves a test clock.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\TestHelpers\TestClock
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
}