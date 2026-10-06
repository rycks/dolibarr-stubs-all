<?php

namespace Stripe\Service\Reporting;

/**
 * Service factory class for API resources in the Reporting namespace.
 *
 * @property ReportRunService $reportRuns
 * @property ReportTypeService $reportTypes
 */
class ReportingServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['reportRuns' => \Stripe\Service\Reporting\ReportRunService::class, 'reportTypes' => \Stripe\Service\Reporting\ReportTypeService::class];
    protected function getServiceClass($name)
    {
    }
}