<?php

// This set stripe global env
/**
 *	Stripe class
 *  @TODO No reason to extends CommonObject
 */
class Stripe extends \CommonObject
{
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     * @var int ID
     */
    public $fk_key;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string
     */
    public $mode;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string
     * @deprecated Was used by createPaymentStripe only that is deprecated
     */
    public $result;
    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $code;
    /**
     * @var string
     */
    public $declinecode;
    /**
     * @var string Message
     */
    public $message;
    /**
     * 	Constructor
     *
     * 	@param	DoliDB		$db			Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return main company OAuth Connect stripe account
     *
     * @param 	string	$mode		'StripeTest' or 'StripeLive'
     * @param	int		$fk_soc		Id of thirdparty
     * @param	int		$entity		Id of entity (-1 = current environment)
     * @return 	string				Stripe account 'acc_....' or '' if no OAuth token found
     */
    public function getStripeAccount($mode = 'StripeTest', $fk_soc = 0, $entity = -1)
    {
    }
    /**
     * getStripeCustomerAccount
     *
     * @param	int		$id				Id of third party
     * @param	int		$status			Status
     * @param	string	$site_account 	Value to use to identify with account to use on site when site can offer several accounts. For example: 'pk_live_123456' when using Stripe service.
     * @return	string					Stripe customer ref 'cu_xxxxxxxxxxxxx' or ''
     */
    public function getStripeCustomerAccount($id, $status = 0, $site_account = '')
    {
    }
    /**
     * Get the Stripe customer of a thirdparty (with option to create it in Stripe if not linked yet).
     * Search on site_account = 0 or = $stripearrayofkeysbyenv[$status]['publishable_key']
     *
     * @param	CommonObject	$object							Object thirdparty to check, or create on stripe (create on stripe also update the stripe_account table for current entity).  Used for AdherentType and Societe.
     * @param	string	$key							''=Use common API. If not '', it is the Stripe connect account 'acc_....' to use Stripe connect
     * @param	int		$status							Status (0=test, 1=live)
     * @param	int		$createifnotlinkedtostripe		1=Create the stripe customer and the link if the thirdparty is not yet linked to a stripe customer
     * @return 	\Stripe\Customer|null 					Stripe Customer or null if not found
     */
    public function customerStripe(\CommonObject $object, $key = '', $status = 0, $createifnotlinkedtostripe = 0)
    {
    }
    /**
     * Get the Stripe payment method Object from its ID
     *
     * @param	string	$paymentmethod	   			Payment Method ID
     * @param	string	$key						''=Use common API. If not '', it is the Stripe connect account 'acc_....' to use Stripe connect
     * @param	int		$status						Status (0=test, 1=live)
     * @return 	\Stripe\PaymentMethod|null 			Stripe PaymentMethod or null if not found
     */
    public function getPaymentMethodStripe($paymentmethod, $key = '', $status = 0)
    {
    }
    /**
     * Get the Stripe reader Object from its ID
     *
     * @param	string	$reader	   			Reader ID
     * @param	string	$key				''=Use common API. If not '', it is the Stripe connect account 'acc_....' to use Stripe connect
     * @param	int	$status				Status (0=test, 1=live)
     * @return 	\Stripe\Terminal\Reader|null		Stripe Reader or null if not found
     */
    public function getSelectedReader($reader, $key = '', $status = 0)
    {
    }
    /**
     * Get the Stripe payment intent. Create it with confirmnow=false
     * Warning. If a payment was tried and failed, a payment intent was created.
     * But if we change something on object to pay (amount or other), reusing same payment intent is not allowed by Stripe.
     * Recommended solution is to recreate a new payment intent each time we need one (old one will be automatically closed after a delay),
     * that's why i comment the part of code to retrieve a payment intent with object id (never mind if we cumulate payment intent with old ones that will not be used)
     * Note: This is used when option STRIPE_USE_INTENT_WITH_AUTOMATIC_CONFIRMATION is on when making a payment from the public/payment/newpayment.php page
     * but not when using the STRIPE_USE_NEW_CHECKOUT.
     *
     * @param   double  $amount                             Amount
     * @param   string  $currency_code                      Currency code
     * @param   string  $tag                                Tag
     * @param   string  $description                        Description
     * @param	mixed	$object							    Object to pay with Stripe
     * @param	string 	$customer							Stripe customer ref 'cus_xxxxxxxxxxxxx' via customerStripe()
     * @param	string	$key							    ''=Use common API. If not '', it is the Stripe connect account 'acc_....' to use Stripe connect
     * @param	int		$status							    Status (0=test, 1=live)
     * @param	int		$usethirdpartyemailforreceiptemail	1=use thirdparty email for receipt
     * @param	string	$mode		                        automatic=automatic confirmation/payment when conditions are ok, manual=need to call confirm() on intent
     * @param   boolean $confirmnow                         false=default, true=try to confirm immediately after create (if conditions are ok)
     * @param   string  $payment_method                     'pm_....' (if known)
     * @param   int     $off_session                        If we use an already known payment method to pay when customer is not available during the checkout flow.
     * @param	int     $noidempotency_key					Do not use the idempotency_key when creating the PaymentIntent
     * @param	int		$did								ID of an existing line into llx_prelevement_demande (Dolibarr intent). If provided, no new line will be created.
     * @return 	\Stripe\PaymentIntent|null 			        Stripe PaymentIntent or null if not found and failed to create
     */
    public function getPaymentIntent($amount, $currency_code, $tag, $description = '', $object = \null, $customer = \null, $key = \null, $status = 0, $usethirdpartyemailforreceiptemail = 0, $mode = 'automatic', $confirmnow = \false, $payment_method = \null, $off_session = 0, $noidempotency_key = 1, $did = 0)
    {
    }
    /**
     * Get the Stripe payment intent. Create it with confirmnow=false
     * Warning. If a payment was tried and failed, a payment intent was created.
     * But if we change something on object to pay (amount or other), reusing same payment intent is not allowed.
     * Recommended solution is to recreate a new payment intent each time we need one (old one will be automatically closed after a delay),
     * that's why i comment the part of code to retrieve a payment intent with object id (never mind if we cumulate payment intent with old ones that will not be used)
     * Note: This is used when option STRIPE_USE_INTENT_WITH_AUTOMATIC_CONFIRMATION is on when making a payment from the public/payment/newpayment.php page
     * but not when using the STRIPE_USE_NEW_CHECKOUT.
     *
     * @param   string  $description                        Description
     * @param	Societe	$object							    Object of company to link the Stripe payment mode with
     * @param	string 	$customer							Stripe customer ref 'cus_xxxxxxxxxxxxx' via customerStripe()
     * @param	string	$key							    ''=Use common API. If not '', it is the Stripe connect account 'acc_....' to use Stripe connect
     * @param	int		$status							    Status (0=test, 1=live)
     * @param	int		$usethirdpartyemailforreceiptemail	1=use thirdparty email for receipt
     * @param   boolean $confirmnow                         false=default, true=try to confirm immediately after create (if conditions are ok)
     * @return 	\Stripe\SetupIntent|null 			        Stripe SetupIntent or null if not found and failed to create
     */
    public function getSetupIntent($description, $object, $customer, $key, $status, $usethirdpartyemailforreceiptemail = 0, $confirmnow = \false)
    {
    }
    /**
     * Get the Stripe card of a company payment mode (option to create it on Stripe if not linked yet is no more available on new Stripe API)
     *
     * @param	\Stripe\Customer		$cu								Object stripe customer.
     * @param	CompanyPaymentMode		$object							Object companypaymentmode to check, or create on stripe (create on stripe also update the societe_rib table for current entity)
     * @param	string					$stripeacc						''=Use common API. If not '', it is the Stripe connect account 'acc_....' to use Stripe connect
     * @param	int						$status							Status (0=test, 1=live)
     * @param	int						$createifnotlinkedtostripe		1=Create the stripe card and the link if the card is not yet linked to a stripe card. Deprecated with new Stripe API and SCA.
     * @return 	\Stripe\Card|\Stripe\PaymentMethod|null 				Stripe Card or null if not found
     */
    public function cardStripe($cu, \CompanyPaymentMode $object, $stripeacc = '', $status = 0, $createifnotlinkedtostripe = 0)
    {
    }
    /**
     * Get the Stripe SEPA of a company payment mode (create it if it doesn't exists and $createifnotlinkedtostripe is set)
     *
     * @param	\Stripe\Customer		$cu								Object stripe customer.
     * @param	CompanyPaymentMode		$object							Object companypaymentmode to check, or create on stripe (create on stripe also update the societe_rib table for current entity)
     * @param	string					$stripeacc						''=Use common API. If not '', it is the Stripe connect account 'acc_....' to use Stripe connect
     * @param	int						$status							Status (0=test, 1=live)
     * @param	int						$createifnotlinkedtostripe		1=Create the stripe sepa and the link if the sepa is not yet linked to a stripe sepa. Used by the "Create bank to Stripe" feature.
     * @return 	\Stripe\PaymentMethod|null 								Stripe SEPA or null if not found
     */
    public function sepaStripe($cu, \CompanyPaymentMode $object, $stripeacc = '', $status = 0, $createifnotlinkedtostripe = 0)
    {
    }
    /**
     * Create charge.
     * This was called by page htdocs/stripe/payment.php and may be deprecated.
     *
     * @param	int 	$amount									Amount to pay
     * @param	string 	$currency								EUR, GPB...
     * @param	string 	$origin									Object type to pay (order, invoice, contract...)
     * @param	int 	$item									Object id to pay
     * @param	string 	$source									src_xxxxx or card_xxxxx or pm_xxxxx
     * @param	string 	$customer								Stripe customer ref 'cus_xxxxxxxxxxxxx' via customerStripe()
     * @param	string 	$account								Stripe account ref 'acc_xxxxxxxxxxxxx' via  getStripeAccount()
     * @param	int		$status									Status (0=test, 1=live)
     * @param	int		$usethirdpartyemailforreceiptemail		Use thirdparty email as receipt email
     * @param	boolean	$capture								Set capture flag to true (take payment) or false (wait)
     * @return Stripe
     * @deprecated
     */
    public function createPaymentStripe($amount, $currency, $origin, $item, $source, $customer, $account, $status = 0, $usethirdpartyemailforreceiptemail = 0, $capture = \true)
    {
    }
}