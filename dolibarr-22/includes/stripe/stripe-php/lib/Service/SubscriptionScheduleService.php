<?php

namespace Stripe\Service;

class SubscriptionScheduleService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves the list of your subscription schedules.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SubscriptionSchedule>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Cancels a subscription schedule and its associated subscription immediately (if
     * the subscription schedule has an active subscription). A subscription schedule
     * can only be canceled if its status is <code>not_started</code> or
     * <code>active</code>.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function cancel($id, $params = null, $opts = null)
    {
    }
    /**
     * Creates a new subscription schedule object. Each customer can have up to 500
     * active or scheduled subscriptions.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Releases the subscription schedule immediately, which will stop scheduling of
     * its phases, but leave any existing subscription in place. A schedule can only be
     * released if its status is <code>not_started</code> or <code>active</code>. If
     * the subscription schedule is currently associated with a subscription, releasing
     * it will remove its <code>subscription</code> property and set the subscription’s
     * ID to the <code>released_subscription</code> property.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function release($id, $params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of an existing subscription schedule. You only need to
     * supply the unique subscription schedule identifier that was returned upon
     * subscription schedule creation.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates an existing subscription schedule.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionSchedule
     */
    public function update($id, $params = null, $opts = null)
    {
    }
}