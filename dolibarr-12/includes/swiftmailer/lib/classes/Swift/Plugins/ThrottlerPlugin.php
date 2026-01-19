<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Throttles the rate at which emails are sent.
 *
 * @author Chris Corbyn
 */
class Swift_Plugins_ThrottlerPlugin extends \Swift_Plugins_BandwidthMonitorPlugin implements \Swift_Plugins_Sleeper, \Swift_Plugins_Timer
{
    /** Flag for throttling in bytes per minute */
    const BYTES_PER_MINUTE = 0x1;
    /** Flag for throttling in emails per second (Amazon SES) */
    const MESSAGES_PER_SECOND = 0x11;
    /** Flag for throttling in emails per minute */
    const MESSAGES_PER_MINUTE = 0x10;
    /**
     * The Sleeper instance for sleeping.
     *
     * @var Swift_Plugins_Sleeper
     */
    private $sleeper;
    /**
     * The Timer instance which provides the timestamp.
     *
     * @var Swift_Plugins_Timer
     */
    private $timer;
    /**
     * The time at which the first email was sent.
     *
     * @var int
     */
    private $start;
    /**
     * The rate at which messages should be sent.
     *
     * @var int
     */
    private $rate;
    /**
     * The mode for throttling.
     *
     * This is {@link BYTES_PER_MINUTE} or {@link MESSAGES_PER_MINUTE}
     *
     * @var int
     */
    private $mode;
    /**
     * An internal counter of the number of messages sent.
     *
     * @var int
     */
    private $messages = 0;
    /**
     * Create a new ThrottlerPlugin.
     *
     * @param int                   $rate
     * @param int                   $mode,   defaults to {@link BYTES_PER_MINUTE}
     * @param Swift_Plugins_Sleeper $sleeper (only needed in testing)
     * @param Swift_Plugins_Timer   $timer   (only needed in testing)
     */
    public function __construct($rate, $mode = self::BYTES_PER_MINUTE, \Swift_Plugins_Sleeper $sleeper = \null, \Swift_Plugins_Timer $timer = \null)
    {
    }
    /**
     * Invoked immediately before the Message is sent.
     *
     * @param Swift_Events_SendEvent $evt
     */
    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    /**
     * Invoked when a Message is sent.
     *
     * @param Swift_Events_SendEvent $evt
     */
    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    /**
     * Sleep for $seconds.
     *
     * @param int $seconds
     */
    public function sleep($seconds)
    {
    }
    /**
     * Get the current UNIX timestamp.
     *
     * @return int
     */
    public function getTimestamp()
    {
    }
    /**
     * Get a number of seconds to sleep for.
     *
     * @param int $timePassed
     *
     * @return int
     */
    private function throttleBytesPerMinute($timePassed)
    {
    }
    /**
     * Get a number of seconds to sleep for.
     *
     * @param int $timePassed
     *
     * @return int
     */
    private function throttleMessagesPerSecond($timePassed)
    {
    }
    /**
     * Get a number of seconds to sleep for.
     *
     * @param int $timePassed
     *
     * @return int
     */
    private function throttleMessagesPerMinute($timePassed)
    {
    }
}