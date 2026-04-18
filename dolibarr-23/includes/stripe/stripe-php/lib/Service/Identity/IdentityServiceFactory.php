<?php

namespace Stripe\Service\Identity;

/**
 * Service factory class for API resources in the Identity namespace.
 *
 * @property VerificationReportService $verificationReports
 * @property VerificationSessionService $verificationSessions
 */
class IdentityServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['verificationReports' => \Stripe\Service\Identity\VerificationReportService::class, 'verificationSessions' => \Stripe\Service\Identity\VerificationSessionService::class];
    protected function getServiceClass($name)
    {
    }
}