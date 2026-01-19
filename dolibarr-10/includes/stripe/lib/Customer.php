<?php

namespace Stripe;

/**
 * Class Customer
 *
 * @property string $id
 * @property string $object
 * @property mixed $address
 * @property int $balance
 * @property string $created
 * @property string $currency
 * @property string $default_source
 * @property bool $delinquent
 * @property string $description
 * @property Discount $discount
 * @property string $email
 * @property string $invoice_prefix
 * @property mixed $invoice_settings
 * @property bool $livemode
 * @property StripeObject $metadata
 * @property string $name
 * @property string $phone
 * @property string[] preferred_locales
 * @property mixed $shipping
 * @property Collection $sources
 * @property Collection $subscriptions
 * @property string $tax_exempt
 * @property Collection $tax_ids
 *
 * @package Stripe
 */
class Customer extends \Stripe\ApiResource
{
    const OBJECT_NAME = "customer";
    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
    /**
     * Possible string representations of the customer's type of tax exemption.
     * @link https://stripe.com/docs/api/customers/object#customer_object-tax_exempt
     */
    const TAX_EXEMPT_NONE = 'none';
    const TAX_EXEMPT_EXEMPT = 'exempt';
    const TAX_EXEMPT_REVERSE = 'reverse';
    public static function getSavedNestedResources()
    {
    }
    const PATH_BALANCE_TRANSACTIONS = '/balance_transactions';
    const PATH_SOURCES = '/sources';
    const PATH_TAX_IDS = '/tax_ids';
    /**
     * @param array|null $params
     *
     * @return InvoiceItem The resulting invoice item.
     */
    public function addInvoiceItem($params = null)
    {
    }
    /**
     * @param array|null $params
     *
     * @return array An array of the customer's Invoices.
     */
    public function invoices($params = null)
    {
    }
    /**
     * @param array|null $params
     *
     * @return array An array of the customer's InvoiceItems.
     */
    public function invoiceItems($params = null)
    {
    }
    /**
     * @param array|null $params
     *
     * @return array An array of the customer's Charges.
     */
    public function charges($params = null)
    {
    }
    /**
     * @param array|null $params
     *
     * @return Subscription The updated subscription.
     */
    public function updateSubscription($params = null)
    {
    }
    /**
     * @param array|null $params
     *
     * @return Subscription The cancelled subscription.
     */
    public function cancelSubscription($params = null)
    {
    }
    /**
     * @return Customer The updated customer.
     */
    public function deleteDiscount()
    {
    }
    /**
     * @param string|null $id The ID of the customer on which to create the source.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function createSource($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer to which the source belongs.
     * @param string|null $sourceId The ID of the source to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function retrieveSource($id, $sourceId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer to which the source belongs.
     * @param string|null $sourceId The ID of the source to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function updateSource($id, $sourceId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer to which the source belongs.
     * @param string|null $sourceId The ID of the source to delete.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function deleteSource($id, $sourceId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer on which to retrieve the sources.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of sources.
     */
    public static function allSources($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer on which to create the tax id.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function createTaxId($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer to which the tax id belongs.
     * @param string|null $taxIdId The ID of the tax id to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function retrieveTaxId($id, $taxIdId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer to which the tax id belongs.
     * @param string|null $taxIdId The ID of the tax id to delete.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function deleteTaxId($id, $taxIdId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer on which to retrieve the tax ids.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of tax ids.
     */
    public static function allTaxIds($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer on which to create the balance transaction.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function createBalanceTransaction($id, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer to which the balance transaction belongs.
     * @param string|null $balanceTransactionId The ID of the balance transaction to retrieve.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ApiResource
     */
    public static function retrieveBalanceTransaction($id, $balanceTransactionId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer on which to update the balance transaction.
     * @param string|null $balanceTransactionId The ID of the balance transaction to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     *
     * @return ApiResource
     */
    public static function updateBalanceTransaction($id, $balanceTransactionId, $params = null, $opts = null)
    {
    }
    /**
     * @param string|null $id The ID of the customer on which to retrieve the customer balance transactions.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection The list of customer balance transactions.
     */
    public static function allBalanceTransactions($id, $params = null, $opts = null)
    {
    }
}