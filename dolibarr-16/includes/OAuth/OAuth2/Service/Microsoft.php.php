<?php

namespace OAuth\OAuth2\Service;

class Microsoft extends \OAuth\OAuth2\Service\AbstractService
{
    const SCOPE_BASIC = 'wl.basic';
    const SCOPE_OFFLINE = 'wl.offline_access';
    const SCOPE_SIGNIN = 'wl.signin';
    const SCOPE_BIRTHDAY = 'wl.birthday';
    const SCOPE_CALENDARS = 'wl.calendars';
    const SCOPE_CALENDARS_UPDATE = 'wl.calendars_update';
    const SCOPE_CONTACTS_BIRTHDAY = 'wl.contacts_birthday';
    const SCOPE_CONTACTS_CREATE = 'wl.contacts_create';
    const SCOPE_CONTACTS_CALENDARS = 'wl.contacts_calendars';
    const SCOPE_CONTACTS_PHOTOS = 'wl.contacts_photos';
    const SCOPE_CONTACTS_SKYDRIVE = 'wl.contacts_skydrive';
    const SCOPE_EMAILS = 'wl.emails';
    const SCOPE_EVENTS_CREATE = 'wl.events_create';
    const SCOPE_MESSENGER = 'wl.messenger';
    const SCOPE_PHONE_NUMBERS = 'wl.phone_numbers';
    const SCOPE_PHOTOS = 'wl.photos';
    const SCOPE_POSTAL_ADDRESSES = 'wl.postal_addresses';
    const SCOPE_SHARE = 'wl.share';
    const SCOPE_SKYDRIVE = 'wl.skydrive';
    const SCOPE_SKYDRIVE_UPDATE = 'wl.skydrive_update';
    const SCOPE_WORK_PROFILE = 'wl.work_profile';
    const SCOPE_APPLICATIONS = 'wl.applications';
    const SCOPE_APPLICATIONS_CREATE = 'wl.applications_create';
    const SCOPE_IMAP = 'wl.imap';
    /**
     * MS uses some magical not officialy supported scope to get even moar info like full emailaddresses.
     * They agree that giving 3rd party apps access to 3rd party emailaddresses is a pretty lame thing to do so in all
     * their wisdom they added this scope because fuck you that's why.
     *
     * https://github.com/Lusitanian/PHPoAuthLib/issues/214
     * http://social.msdn.microsoft.com/Forums/live/en-US/c6dcb9ab-aed4-400a-99fb-5650c393a95d/how-retrieve-users-
     *                                  contacts-email-address?forum=messengerconnect
     *
     * Considering this scope is not officially supported: use with care
     */
    const SCOPE_CONTACTS_EMAILS = 'wl.contacts_emails';
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
    public function getAuthorizationMethod()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}