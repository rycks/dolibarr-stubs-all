<?php

namespace Stripe\Service\Radar;

class ValueListService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of <code>ValueList</code> objects. The objects are sorted in
     * descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Radar\ValueList>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Creates a new <code>ValueList</code> object, which can then be referenced in
     * rules.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Radar\ValueList
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Deletes a <code>ValueList</code> object, also deleting any items contained
     * within the value list. To be deleted, a value list must not be referenced in any
     * rules.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Radar\ValueList
     */
    public function delete($id, $params = null, $opts = null)
    {
    }
    /**
     * Retrieves a <code>ValueList</code> object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Radar\ValueList
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates a <code>ValueList</code> object by setting the values of the parameters
     * passed. Any parameters not provided will be left unchanged. Note that
     * <code>item_type</code> is immutable.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Radar\ValueList
     */
    public function update($id, $params = null, $opts = null)
    {
    }
}