<?php

namespace Stripe\Service\Sigma;

/**
 * Service factory class for API resources in the Sigma namespace.
 *
 * @property ScheduledQueryRunService $scheduledQueryRuns
 */
class SigmaServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['scheduledQueryRuns' => \Stripe\Service\Sigma\ScheduledQueryRunService::class];
    protected function getServiceClass($name)
    {
    }
}