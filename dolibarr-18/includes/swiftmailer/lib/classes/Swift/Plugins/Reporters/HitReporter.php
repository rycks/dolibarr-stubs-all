<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A reporter which "collects" failures for the Reporter plugin.
 *
 * @author Chris Corbyn
 */
class Swift_Plugins_Reporters_HitReporter implements \Swift_Plugins_Reporter
{
    /**
     * The list of failures.
     *
     * @var array
     */
    private $failures = [];
    private $failures_cache = [];
    /**
     * Notifies this ReportNotifier that $address failed or succeeded.
     *
     * @param string $address
     * @param int    $result  from {@link RESULT_PASS, RESULT_FAIL}
     */
    public function notify(\Swift_Mime_SimpleMessage $message, $address, $result)
    {
    }
    /**
     * Get an array of addresses for which delivery failed.
     *
     * @return array
     */
    public function getFailedRecipients()
    {
    }
    /**
     * Clear the buffer (empty the list).
     */
    public function clear()
    {
    }
}