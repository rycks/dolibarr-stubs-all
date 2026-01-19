<?php

namespace Stripe\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property AccountLinkService $accountLinks
 * @property AccountService $accounts
 * @property ApplePayDomainService $applePayDomains
 * @property ApplicationFeeService $applicationFees
 * @property BalanceService $balance
 * @property BalanceTransactionService $balanceTransactions
 * @property BillingPortal\BillingPortalServiceFactory $billingPortal
 * @property ChargeService $charges
 * @property Checkout\CheckoutServiceFactory $checkout
 * @property CountrySpecService $countrySpecs
 * @property CouponService $coupons
 * @property CreditNoteService $creditNotes
 * @property CustomerService $customers
 * @property DisputeService $disputes
 * @property EphemeralKeyService $ephemeralKeys
 * @property EventService $events
 * @property ExchangeRateService $exchangeRates
 * @property FileLinkService $fileLinks
 * @property FileService $files
 * @property InvoiceItemService $invoiceItems
 * @property InvoiceService $invoices
 * @property Issuing\IssuingServiceFactory $issuing
 * @property MandateService $mandates
 * @property OAuthService $oauth
 * @property OrderReturnService $orderReturns
 * @property OrderService $orders
 * @property PaymentIntentService $paymentIntents
 * @property PaymentMethodService $paymentMethods
 * @property PayoutService $payouts
 * @property PlanService $plans
 * @property PriceService $prices
 * @property ProductService $products
 * @property PromotionCodeService $promotionCodes
 * @property Radar\RadarServiceFactory $radar
 * @property RefundService $refunds
 * @property Reporting\ReportingServiceFactory $reporting
 * @property ReviewService $reviews
 * @property SetupAttemptService $setupAttempts
 * @property SetupIntentService $setupIntents
 * @property Sigma\SigmaServiceFactory $sigma
 * @property SkuService $skus
 * @property SourceService $sources
 * @property SubscriptionItemService $subscriptionItems
 * @property SubscriptionService $subscriptions
 * @property SubscriptionScheduleService $subscriptionSchedules
 * @property TaxRateService $taxRates
 * @property Terminal\TerminalServiceFactory $terminal
 * @property TokenService $tokens
 * @property TopupService $topups
 * @property TransferService $transfers
 * @property WebhookEndpointService $webhookEndpoints
 */
class CoreServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['accountLinks' => \Stripe\Service\AccountLinkService::class, 'accounts' => \Stripe\Service\AccountService::class, 'applePayDomains' => \Stripe\Service\ApplePayDomainService::class, 'applicationFees' => \Stripe\Service\ApplicationFeeService::class, 'balance' => \Stripe\Service\BalanceService::class, 'balanceTransactions' => \Stripe\Service\BalanceTransactionService::class, 'billingPortal' => \Stripe\Service\BillingPortal\BillingPortalServiceFactory::class, 'charges' => \Stripe\Service\ChargeService::class, 'checkout' => \Stripe\Service\Checkout\CheckoutServiceFactory::class, 'countrySpecs' => \Stripe\Service\CountrySpecService::class, 'coupons' => \Stripe\Service\CouponService::class, 'creditNotes' => \Stripe\Service\CreditNoteService::class, 'customers' => \Stripe\Service\CustomerService::class, 'disputes' => \Stripe\Service\DisputeService::class, 'ephemeralKeys' => \Stripe\Service\EphemeralKeyService::class, 'events' => \Stripe\Service\EventService::class, 'exchangeRates' => \Stripe\Service\ExchangeRateService::class, 'fileLinks' => \Stripe\Service\FileLinkService::class, 'files' => \Stripe\Service\FileService::class, 'invoiceItems' => \Stripe\Service\InvoiceItemService::class, 'invoices' => \Stripe\Service\InvoiceService::class, 'issuing' => \Stripe\Service\Issuing\IssuingServiceFactory::class, 'mandates' => \Stripe\Service\MandateService::class, 'oauth' => \Stripe\Service\OAuthService::class, 'orderReturns' => \Stripe\Service\OrderReturnService::class, 'orders' => \Stripe\Service\OrderService::class, 'paymentIntents' => \Stripe\Service\PaymentIntentService::class, 'paymentMethods' => \Stripe\Service\PaymentMethodService::class, 'payouts' => \Stripe\Service\PayoutService::class, 'plans' => \Stripe\Service\PlanService::class, 'prices' => \Stripe\Service\PriceService::class, 'products' => \Stripe\Service\ProductService::class, 'promotionCodes' => \Stripe\Service\PromotionCodeService::class, 'radar' => \Stripe\Service\Radar\RadarServiceFactory::class, 'refunds' => \Stripe\Service\RefundService::class, 'reporting' => \Stripe\Service\Reporting\ReportingServiceFactory::class, 'reviews' => \Stripe\Service\ReviewService::class, 'setupAttempts' => \Stripe\Service\SetupAttemptService::class, 'setupIntents' => \Stripe\Service\SetupIntentService::class, 'sigma' => \Stripe\Service\Sigma\SigmaServiceFactory::class, 'skus' => \Stripe\Service\SkuService::class, 'sources' => \Stripe\Service\SourceService::class, 'subscriptionItems' => \Stripe\Service\SubscriptionItemService::class, 'subscriptions' => \Stripe\Service\SubscriptionService::class, 'subscriptionSchedules' => \Stripe\Service\SubscriptionScheduleService::class, 'taxRates' => \Stripe\Service\TaxRateService::class, 'terminal' => \Stripe\Service\Terminal\TerminalServiceFactory::class, 'tokens' => \Stripe\Service\TokenService::class, 'topups' => \Stripe\Service\TopupService::class, 'transfers' => \Stripe\Service\TransferService::class, 'webhookEndpoints' => \Stripe\Service\WebhookEndpointService::class];
    protected function getServiceClass($name)
    {
    }
}