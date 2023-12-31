<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Does real time logging of Transport level information.
 *
 * @author     Chris Corbyn
 */
class Swift_Plugins_LoggerPlugin implements \Swift_Events_CommandListener, \Swift_Events_ResponseListener, \Swift_Events_TransportChangeListener, \Swift_Events_TransportExceptionListener, \Swift_Plugins_Logger
{
    /** The logger which is delegated to */
    private $logger;
    /**
     * Create a new LoggerPlugin using $logger.
     *
     * @param Swift_Plugins_Logger $logger
     */
    public function __construct(\Swift_Plugins_Logger $logger)
    {
    }
    /**
     * Add a log entry.
     *
     * @param string $entry
     */
    public function add($entry)
    {
    }
    /**
     * Clear the log contents.
     */
    public function clear()
    {
    }
    /**
     * Get this log as a string.
     *
     * @return string
     */
    public function dump()
    {
    }
    /**
     * Invoked immediately following a command being sent.
     *
     * @param Swift_Events_CommandEvent $evt
     */
    public function commandSent(\Swift_Events_CommandEvent $evt)
    {
    }
    /**
     * Invoked immediately following a response coming back.
     *
     * @param Swift_Events_ResponseEvent $evt
     */
    public function responseReceived(\Swift_Events_ResponseEvent $evt)
    {
    }
    /**
     * Invoked just before a Transport is started.
     *
     * @param Swift_Events_TransportChangeEvent $evt
     */
    public function beforeTransportStarted(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    /**
     * Invoked immediately after the Transport is started.
     *
     * @param Swift_Events_TransportChangeEvent $evt
     */
    public function transportStarted(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    /**
     * Invoked just before a Transport is stopped.
     *
     * @param Swift_Events_TransportChangeEvent $evt
     */
    public function beforeTransportStopped(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    /**
     * Invoked immediately after the Transport is stopped.
     *
     * @param Swift_Events_TransportChangeEvent $evt
     */
    public function transportStopped(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    /**
     * Invoked as a TransportException is thrown in the Transport system.
     *
     * @param Swift_Events_TransportExceptionEvent $evt
     */
    public function exceptionThrown(\Swift_Events_TransportExceptionEvent $evt)
    {
    }
}