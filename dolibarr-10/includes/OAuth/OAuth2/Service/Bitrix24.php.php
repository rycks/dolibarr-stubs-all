<?php

namespace OAuth\OAuth2\Service;

class Bitrix24 extends \OAuth\OAuth2\Service\AbstractService
{
    const SCOPE_DEPARTMENT = 'department';
    const SCOPE_CRM = 'crm';
    const SCOPE_CALENDAR = 'calendar';
    const SCOPE_USER = 'user';
    const SCOPE_ENTITY = 'entity';
    const SCOPE_TASK = 'task';
    const SCOPE_TASKS_EXTENDED = 'tasks_extended';
    const SCOPE_IM = 'im';
    const SCOPE_LOG = 'log';
    const SCOPE_SONET_GROUP = 'sonet_group';
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
    public function requestAccessToken($code, $state = null)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAccessTokenUri($code)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}