<?php

namespace Stripe\Service\Apps;

class SecretService extends \Stripe\Service\AbstractService
{
    /**
     * List all secrets stored on the given scope.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Apps\Secret>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Create or replace a secret in the secret store.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Apps\Secret
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Deletes a secret from the secret store by name and scope.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Apps\Secret
     */
    public function deleteWhere($params = null, $opts = null)
    {
    }
    /**
     * Finds a secret in the secret store by name and scope.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Apps\Secret
     */
    public function find($params = null, $opts = null)
    {
    }
}