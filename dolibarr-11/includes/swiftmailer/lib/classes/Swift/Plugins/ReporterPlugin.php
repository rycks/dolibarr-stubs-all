<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Does real time reporting of pass/fail for each recipient.
 *
 * @author Chris Corbyn
 */
class Swift_Plugins_ReporterPlugin implements \Swift_Events_SendListener
{
    /**
     * The reporter backend which takes notifications.
     *
     * @var Swift_Plugins_Reporter
     */
    private $reporter;
    /**
     * Create a new ReporterPlugin using $reporter.
     *
     * @param Swift_Plugins_Reporter $reporter
     */
    public function __construct(\Swift_Plugins_Reporter $reporter)
    {
    }
    /**
     * Not used.
     */
    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    /**
     * Invoked immediately after the Message is sent.
     *
     * @param Swift_Events_SendEvent $evt
     */
    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
}