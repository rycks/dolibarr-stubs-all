<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2009 Fabien Potencier <fabien.potencier@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Stores Messages on the filesystem.
 *
 * @author Fabien Potencier
 * @author Xavier De Cock <xdecock@gmail.com>
 */
class Swift_FileSpool extends \Swift_ConfigurableSpool
{
    /** The spool directory */
    private $path;
    /**
     * File WriteRetry Limit.
     *
     * @var int
     */
    private $retryLimit = 10;
    /**
     * Create a new FileSpool.
     *
     * @param string $path
     *
     * @throws Swift_IoException
     */
    public function __construct($path)
    {
    }
    /**
     * Tests if this Spool mechanism has started.
     *
     * @return bool
     */
    public function isStarted()
    {
    }
    /**
     * Starts this Spool mechanism.
     */
    public function start()
    {
    }
    /**
     * Stops this Spool mechanism.
     */
    public function stop()
    {
    }
    /**
     * Allow to manage the enqueuing retry limit.
     *
     * Default, is ten and allows over 64^20 different fileNames
     *
     * @param int $limit
     */
    public function setRetryLimit($limit)
    {
    }
    /**
     * Queues a message.
     *
     * @param Swift_Mime_SimpleMessage $message The message to store
     *
     * @throws Swift_IoException
     *
     * @return bool
     */
    public function queueMessage(\Swift_Mime_SimpleMessage $message)
    {
    }
    /**
     * Execute a recovery if for any reason a process is sending for too long.
     *
     * @param int $timeout in second Defaults is for very slow smtp responses
     */
    public function recover($timeout = 900)
    {
    }
    /**
     * Sends messages using the given transport instance.
     *
     * @param Swift_Transport $transport        A transport instance
     * @param string[]        $failedRecipients An array of failures by-reference
     *
     * @return int The number of sent e-mail's
     */
    public function flushQueue(\Swift_Transport $transport, &$failedRecipients = \null)
    {
    }
    /**
     * Returns a random string needed to generate a fileName for the queue.
     *
     * @param int $count
     *
     * @return string
     */
    protected function getRandomString($count)
    {
    }
}