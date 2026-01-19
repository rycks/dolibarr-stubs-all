<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2009 Fabien Potencier <fabien.potencier@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Stores Messages in a queue.
 *
 * @author Fabien Potencier
 */
class Swift_Transport_SpoolTransport implements \Swift_Transport
{
    /** The spool instance */
    private $spool;
    /** The event dispatcher from the plugin API */
    private $eventDispatcher;
    /**
     * Constructor.
     */
    public function __construct(\Swift_Events_EventDispatcher $eventDispatcher, \Swift_Spool $spool = \null)
    {
    }
    /**
     * Sets the spool object.
     *
     * @param Swift_Spool $spool
     *
     * @return $this
     */
    public function setSpool(\Swift_Spool $spool)
    {
    }
    /**
     * Get the spool object.
     *
     * @return Swift_Spool
     */
    public function getSpool()
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
     * @param Swift_Mime_SimpleMessage $message
     * @param string[]           $failedRecipients An array of failures by-reference
     *
     * @return int The number of sent e-mail's
     */
    public function send(\Swift_Mime_SimpleMessage $message, &$failedRecipients = \null)
    {
    }
    /**
     * Register a plugin.
     *
     * @param Swift_Events_EventListener $plugin
     */
    public function registerPlugin(\Swift_Events_EventListener $plugin)
    {
    }
}