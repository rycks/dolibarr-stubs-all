<?php

namespace OAuth\OAuth2\Service;

/**
 * Jawbone UP service.
 *
 * @author Andrii Gakhov <andrii.gakhov@gmail.com>
 * @link https://jawbone.com/up/developer/authentication
 */
class JawboneUP extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     *
     *
     * @link https://jawbone.com/up/developer/authentication
     */
    // general information scopes
    const SCOPE_BASIC_READ = 'basic_read';
    const SCOPE_EXTENDED_READ = 'extended_read';
    const SCOPE_LOCATION_READ = 'location_read';
    const SCOPE_FRIENDS_READ = 'friends_read';
    // mood scopes
    const SCOPE_MOOD_READ = 'mood_read';
    const SCOPE_MOOD_WRITE = 'mood_write';
    // move scopes
    const SCOPE_MOVE_READ = 'move_read';
    const SCOPE_MOVE_WRITE = 'move_write';
    // sleep scopes
    const SCOPE_SLEEP_READ = 'sleep_read';
    const SCOPE_SLEEP_WRITE = 'sleep_write';
    // meal scopes
    const SCOPE_MEAL_READ = 'meal_read';
    const SCOPE_MEAL_WRITE = 'meal_write';
    // weight scopes
    const SCOPE_WEIGHT_READ = 'weight_read';
    const SCOPE_WEIGHT_WRITE = 'weight_write';
    // generic event scopes
    const SCOPE_GENERIC_EVENT_READ = 'generic_event_read';
    const SCOPE_GENERIC_EVENT_WRITE = 'generic_event_write';
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthorizationUri(array $additionalParameters = array())
    {
    }
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
    protected function getAuthorizationMethod()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}