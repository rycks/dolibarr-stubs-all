<?php

namespace Stripe\Service\Treasury;

class FinancialAccountService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of FinancialAccounts.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Treasury\FinancialAccount>
     */
    public function all($params = null, $opts = null)
    {
    }
    /**
     * Creates a new FinancialAccount. For now, each connected account can only have
     * one FinancialAccount.
     *
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function create($params = null, $opts = null)
    {
    }
    /**
     * Retrieves the details of a FinancialAccount.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * Retrieves Features information associated with the FinancialAccount.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function retrieveFeatures($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates the details of a FinancialAccount.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function update($id, $params = null, $opts = null)
    {
    }
    /**
     * Updates the Features associated with a FinancialAccount.
     *
     * @param string $id
     * @param null|array $params
     * @param null|array|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Treasury\FinancialAccount
     */
    public function updateFeatures($id, $params = null, $opts = null)
    {
    }
}