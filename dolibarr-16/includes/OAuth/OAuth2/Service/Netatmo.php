<?php

namespace OAuth\OAuth2\Service;

/**
 * Netatmo service.
 *
 * @author  Pedro Amorim <contact@pamorim.fr>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link    https://dev.netatmo.com/doc/
 */
class Netatmo extends \OAuth\OAuth2\Service\AbstractService
{
    // SCOPES
    // @link https://dev.netatmo.com/doc/authentication/scopes
    // Used to read weather station's data (devicelist, getmeasure)
    const SCOPE_STATION_READ = 'read_station';
    // Used to read thermostat's data (devicelist, getmeasure, getthermstate)
    const SCOPE_THERMOSTAT_READ = 'read_thermostat';
    // Used to configure the thermostat (syncschedule, setthermpoint)
    const SCOPE_THERMOSTAT_WRITE = 'write_thermostat';
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
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