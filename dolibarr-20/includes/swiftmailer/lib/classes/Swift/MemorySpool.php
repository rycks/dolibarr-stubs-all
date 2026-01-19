<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2011 Fabien Potencier <fabien.potencier@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Stores Messages in memory.
 *
 * @author Fabien Potencier
 */
class Swift_MemorySpool implements \Swift_Spool
{
    protected $messages = [];
    private $flushRetries = 3;
    /**
     * Tests if this Transport mechanism has started.
     *
     * @return bool
     */
    public function isStarted()
    {
    }
    /**
     * Starts this Transport mechanism.
     */
    public function start()
    {
    }
    /**
     * Stops this Transport mechanism.
     */
    public function stop()
    {
    }
    /**
     * @param int $retries
     */
    public function setFlushRetries($retries)
    {
    }
    /**
     * Stores a message in the queue.
     *
     * @param Swift_Mime_SimpleMessage $message The message to store
     *
     * @return bool Whether the operation has succeeded
     */
    public function queueMessage(\Swift_Mime_SimpleMessage $message)
    {
    }
    /**
     * Sends messages using the given transport instance.
     *
     * @param Swift_Transport $transport        A transport instance
     * @param string[]        $failedRecipients An array of failures by-reference
     *
     * @return int The number of sent emails
     */
    public function flushQueue(\Swift_Transport $transport, &$failedRecipients = \null)
    {
    }
}