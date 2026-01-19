<?php

namespace Stripe;

/**
 * This is an object representing a Stripe account. You can retrieve it to see
 * properties on the account like its current requirements or if the account is
 * enabled to make live charges or receive payouts.
 *
 * For Custom accounts, the properties below are always returned. For other
 * accounts, some properties are returned until that account has started to go
 * through Connect Onboarding. Once you create an <a
 * href="https://stripe.com/docs/api/account_links">Account Link</a> for a Standard
 * or Express account, some parameters are no longer returned. These are marked as
 * <strong>Custom Only</strong> or <strong>Custom and Express</strong> below. Learn
 * about the differences <a href="https://stripe.com/docs/connect/accounts">between
 * accounts</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $business_profile Business information about the account.
 * @property null|string $business_type The business type.
 * @property null|\Stripe\StripeObject $capabilities
 * @property null|bool $charges_enabled Whether the account can create live charges.
 * @property null|\Stripe\StripeObject $company
 * @property null|\Stripe\StripeObject $controller
 * @property null|string $country The account's country.
 * @property null|int $created Time at which the account was connected. Measured in seconds since the Unix epoch.
 * @property null|string $default_currency Three-letter ISO currency code representing the default currency for the account. This must be a currency that <a href="https://stripe.com/docs/payouts">Stripe supports in the account's country</a>.
 * @property null|bool $details_submitted Whether account details have been submitted. Standard accounts cannot receive payouts before this is true.
 * @property null|string $email An email address associated with the account. You can treat this as metadata: it is not used for authentication or messaging account holders.
 * @property null|\Stripe\Collection<\Stripe\BankAccount|\Stripe\Card> $external_accounts External accounts (bank accounts and debit cards) currently attached to this account
 * @property null|\Stripe\StripeObject $future_requirements
 * @property null|\Stripe\Person $individual <p>This is an object representing a person associated with a Stripe account.</p><p>A platform cannot access a Standard or Express account's persons after the account starts onboarding, such as after generating an account link for the account. See the <a href="https://stripe.com/docs/connect/standard-accounts">Standard onboarding</a> or <a href="https://stripe.com/docs/connect/express-accounts">Express onboarding documentation</a> for information about platform pre-filling and account onboarding steps.</p><p>Related guide: <a href="https://stripe.com/docs/connect/identity-verification-api#person-information">Handling Identity Verification with the API</a>.</p>
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|bool $payouts_enabled Whether Stripe can send payouts to this account.
 * @property null|\Stripe\StripeObject $requirements
 * @property null|\Stripe\StripeObject $settings Options for customizing how the account functions within Stripe.
 * @property null|\Stripe\StripeObject $tos_acceptance
 * @property null|string $type The Stripe account type. Can be <code>standard</code>, <code>express</code>, or <code>custom</code>.
 */
class Account extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'account';
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Update;
    const BUSINESS_TYPE_COMPANY = 'company';
    const BUSINESS_TYPE_GOVERNMENT_ENTITY = 'government_entity';
    const BUSINESS_TYPE_INDIVIDUAL = 'individual';
    const BUSINESS_TYPE_NON_PROFIT = 'non_profit';
    const TYPE_CUSTOM = 'custom';
    const TYPE_EXPRESS = 'express';
    const TYPE_STANDARD = 'standard';
    use \Stripe\ApiOperations\Retrieve {
        retrieve as protected _retrieve;
    }
    public static function getSavedNestedResources()
    {
    }
    public function instanceUrl()
    {
    }
    /**
     * @param null|array|string $id the ID of the account to retrieve, or an
     *     options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account
     */
    public static function retrieve($id = null, $opts = null)
    {
    }
    public function serializeParameters($force = false)
    {
    }
    private function serializeAdditionalOwners($legalEntity, $additionalOwners)
    {
    }
    /**
     * @param null|array $clientId
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\StripeObject object containing the response from the API
     */
    public function deauthorize($clientId = null, $opts = null)
    {
    }
    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Account the rejected account
     */
    public function reject($params = null, $opts = null)
    {
    }
    const PATH_CAPABILITIES = '/capabilities';
    /**
     * @param string $id the ID of the account on which to retrieve the capabilities
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Capability> the list of capabilities
     */
    public static function allCapabilities($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the capability belongs
     * @param string $capabilityId the ID of the capability to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public static function retrieveCapability($id, $capabilityId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the capability belongs
     * @param string $capabilityId the ID of the capability to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Capability
     */
    public static function updateCapability($id, $capabilityId, $params = null, $opts = null)
    {
    }
    const PATH_EXTERNAL_ACCOUNTS = '/external_accounts';
    /**
     * @param string $id the ID of the account on which to retrieve the external accounts
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\BankAccount|\Stripe\Card> the list of external accounts (BankAccount or Card)
     */
    public static function allExternalAccounts($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account on which to create the external account
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function createExternalAccount($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function deleteExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function retrieveExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the external account belongs
     * @param string $externalAccountId the ID of the external account to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BankAccount|\Stripe\Card
     */
    public static function updateExternalAccount($id, $externalAccountId, $params = null, $opts = null)
    {
    }
    const PATH_LOGIN_LINKS = '/login_links';
    /**
     * @param string $id the ID of the account on which to create the login link
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\LoginLink
     */
    public static function createLoginLink($id, $params = null, $opts = null)
    {
    }
    const PATH_PERSONS = '/persons';
    /**
     * @param string $id the ID of the account on which to retrieve the persons
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Person> the list of persons
     */
    public static function allPersons($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account on which to create the person
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function createPerson($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to delete
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function deletePerson($id, $personId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to retrieve
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function retrievePerson($id, $personId, $params = null, $opts = null)
    {
    }
    /**
     * @param string $id the ID of the account to which the person belongs
     * @param string $personId the ID of the person to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Person
     */
    public static function updatePerson($id, $personId, $params = null, $opts = null)
    {
    }
}