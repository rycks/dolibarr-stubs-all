<?php

namespace Stripe\Service;

class FileLinkService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of file links.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\FileLink>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Creates a new file link object.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FileLink
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the file link with the given ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FileLink
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates an existing file link object. Expired links can no longer be updated.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FileLink
     */
    public function update($id, $params = null, $opts = null)
    {
    }
}