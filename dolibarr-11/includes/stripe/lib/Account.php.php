<?php

namespace Stripe;

/**
 * Class Account
 *
 * @property string $id
 * @property string $object
 * @property mixed $business_profile
 * @property string $business_type
 * @property mixed $capabilities
 * @property bool $charges_enabled
 * @property mixed $company
 * @property string $country
 * @property int $created
 * @property string $default_currency
 * @property bool $details_submitted
 * @property string $email
 * @property Collection $external_accounts
 * @property mixed $individual
 * @property StripeObject $metadata
 * @property bool $payouts_enabled
 * @property mixed $requirements
 * @property mixed $settings
 * @property mixed $tos_acceptance
 * @property string $type
 *
 * @package Stripe
 */
class Account extends \Stripe\ApiResource
{
    const OBJECT_NAME = "account";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Retrieve {
        retrieve as protected _retrieve;
    }
    use \Stripe\ApiOperations\Update;
    /**
     * Possible string representations of an account's business type.
     * @link https://stripe.com/docs/api/accounts/object#account_object-business_type
     */
    const BUSINESS_TYPE_COMPANY = 'company';
    const BUSINESS_TYPE_INDIVIDUAL = 'individual';
    /**
     * Possible string representations of an account's capabilities.
     * @link https://stripe.com/docs/api/accounts/object#account_object-capabilities
     */
    const CAPABILITY_CARD_PAYMENTS = 'card_payments';
    const CAPABILITY_LEGACY_PAYMENTS = 'legacy_payments';
    const CAPABILITY_PLATFORM_PAYMENTS = 'platform_payments';
    /**
     * Possible string representations of an account's capability status.
     * @link https://stripe.com/docs/api/accounts/object#account_object-capabilities
     */
    const CAPABILITY_STATUS_ACTIVE = 'active';
    const CAPABILITY_STATUS_INACTIVE = 'inactive';
    const CAPABILITY_STATUS_PENDING = 'pending';
    /**
     * Possible string representations of an account's type.
     * @link https://stripe.com/docs/api/accounts/object#account_object-type
     */
    const TYPE_CUSTOM = 'custom';
    const TYPE_EXPRESS = 'express';
    const TYPE_STANDARD = 'standard';
    public static function getSavedNestedResources()
    {
    }
    const PATH_CAPABILITIES = '/capabilities';
    const PATH_EXTERNAL_ACCOUNTS = '/external_accounts';
    const PATH_LOGIN_LINKS = '/login_links';
    const PATH_PERSONS = '/persons';
    public function instanceUrl()
    {
    }
    /**
     * @param array|string|null $id The ID of the account to retrieve, or an
     *     options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return Account
     */
    public static function retrieve($id = null, $opts = null)
    {
    }
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Account The rejected account.
     */
    public function reject($params = null, $opts = null)
    {
    }
    /**
     * @param array|null $clientId
     * @param array|string|null $opts
     *
     * @return StripeObject Object containing the response from the API.
     */
    public function deauthorize($clientId = null, $opts = null)
    {
    }
    /*
     * Capabilities methods
     * We can not add the capabilities() method today as the Account object already has a
     * capabilities property which is a hash and not the sub-list of capabilities.
     */
    /**
     * @param string $id The ID of the account to which the capability belongs.
     * @param string $capabilityId The ID of the capability to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Capability
     */
    public static function retrieveCapability($id, $capabilityId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account to which the capability belongs.
     * @param string $capabilityId The ID of the capability to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Capability
     */
    public static function updateCapability($id, $capabilityId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account on which to retrieve the capabilities.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of capabilities.
     */
    public static function allCapabilities($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account on which to create the external account.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return BankAccount|Card
     */
    public static function createExternalAccount($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account to which the external account belongs.
     * @param string $externalAccountId The ID of the external account to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return BankAccount|Card
     */
    public static function retrieveExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account to which the external account belongs.
     * @param string $externalAccountId The ID of the external account to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return BankAccount|Card
     */
    public static function updateExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account to which the external account belongs.
     * @param string $externalAccountId The ID of the external account to delete.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return BankAccount|Card
     */
    public static function deleteExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account on which to retrieve the external accounts.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of external accounts (BankAccount or Card).
     */
    public static function allExternalAccounts($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account on which to create the login link.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return LoginLink
     */
    public static function createLoginLink($id, $params = null, $opts = null)
    {
    }
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return Collection The list of persons.
     */
    public function persons($params = null, $options = null)
    {
    }
    /**
     * @param string $id The ID of the account on which to create the person.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Person
     */
    public static function createPerson($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account to which the person belongs.
     * @param string $personId The ID of the person to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Person
     */
    public static function retrievePerson($id, $personId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account to which the person belongs.
     * @param string $personId The ID of the person to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Person
     */
    public static function updatePerson($id, $personId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account to which the person belongs.
     * @param string $personId The ID of the person to delete.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Person
     */
    public static function deletePerson($id, $personId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id The ID of the account on which to retrieve the persons.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of persons.
     */
    public static function allPersons($id, $params = null, $opts = null)
    {
    }
    public function serializeParameters($force = false)
    {
    }
    private function serializeAdditionalOwners($legalEntity, $additionalOwners)
    {
    }
}