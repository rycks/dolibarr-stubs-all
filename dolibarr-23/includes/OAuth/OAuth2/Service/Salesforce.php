<?php

namespace OAuth\OAuth2\Service;

class Salesforce extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Scopes
     *
     * @var string
     */
    const SCOPE_API = 'api', SCOPE_REFRESH_TOKEN = 'refresh_token';
    /**
     * {@inheritdoc}
     */
    public function getAuthorizationEndpoint()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAccessTokenEndpoint()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseRequestTokenResponse($responseBody)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function getExtraOAuthHeaders()
    {
    }
}