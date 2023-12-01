<?php

namespace Stripe\Service\Radar;

/**
 * Service factory class for API resources in the Radar namespace.
 *
 * @property EarlyFraudWarningService $earlyFraudWarnings
 * @property ValueListItemService $valueListItems
 * @property ValueListService $valueLists
 */
class RadarServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['earlyFraudWarnings' => \Stripe\Service\Radar\EarlyFraudWarningService::class, 'valueListItems' => \Stripe\Service\Radar\ValueListItemService::class, 'valueLists' => \Stripe\Service\Radar\ValueListService::class];
    protected function getServiceClass($name)
    {
    }
}