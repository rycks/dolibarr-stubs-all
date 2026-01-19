<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2009 Fabien Potencier <fabien.potencier@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Pretends messages have been sent, but just ignores them.
 *
 * @author Fabien Potencier
 */
class Swift_Transport_NullTransport implements \Swift_Transport
{
    /** The event dispatcher from the plugin API */
    private $eventDispatcher;
    /**
     * Constructor.
     */
    public function __construct(\Swift_Events_EventDispatcher $eventDispatcher)
    {
    }
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
     * {@inheritdoc}
     */
    public function ping()
    {
    }
    /**
     * Sends the given message.
     *
     * @param string[] $failedRecipients An array of failures by-reference
     *
     * @return int The number of sent emails
     */
    public function send(\Swift_Mime_SimpleMessage $message, &$failedRecipients = \null)
    {
    }
    /**
     * Register a plugin.
     */
    public function registerPlugin(\Swift_Events_EventListener $plugin)
    {
    }
}