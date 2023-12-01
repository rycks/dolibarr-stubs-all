<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Sends Messages over SMTP.
 *
 * @author Chris Corbyn
 */
abstract class Swift_Transport_AbstractSmtpTransport implements \Swift_Transport
{
    /** Input-Output buffer for sending/receiving SMTP commands and responses */
    protected $buffer;
    /** Connection status */
    protected $started = \false;
    /** The domain name to use in HELO command */
    protected $domain = '[127.0.0.1]';
    /** The event dispatching layer */
    protected $eventDispatcher;
    /** Source Ip */
    protected $sourceIp;
    /** Return an array of params for the Buffer */
    protected abstract function getBufferParams();
    /**
     * Creates a new EsmtpTransport using the given I/O buffer.
     *
     * @param Swift_Transport_IoBuffer     $buf
     * @param Swift_Events_EventDispatcher $dispatcher
     * @param string                       $localDomain
     */
    public function __construct(\Swift_Transport_IoBuffer $buf, \Swift_Events_EventDispatcher $dispatcher, $localDomain = '127.0.0.1')
    {
    }
    /**
     * Set the name of the local domain which Swift will identify itself as.
     *
     * This should be a fully-qualified domain name and should be truly the domain
     * you're using.
     *
     * If your server does not have a domain name, use the IP address. This will
     * automatically be wrapped in square brackets as described in RFC 5321,
     * section 4.1.3.
     *
     * @param string $domain
     *
     * @return $this
     */
    public function setLocalDomain($domain)
    {
    }
    /**
     * Get the name of the domain Swift will identify as.
     *
     * If an IP address was specified, this will be returned wrapped in square
     * brackets as described in RFC 5321, section 4.1.3.
     *
     * @return string
     */
    public function getLocalDomain()
    {
    }
    /**
     * Sets the source IP.
     *
     * @param string $source
     */
    public function setSourceIp($source)
    {
    }
    /**
     * Returns the IP used to connect to the destination.
     *
     * @return string
     */
    public function getSourceIp()
    {
    }
    /**
     * Start the SMTP connection.
     */
    public function start()
    {
    }
    /**
     * Test if an SMTP connection has been established.
     *
     * @return bool
     */
    public function isStarted()
    {
    }
    /**
     * Send the given Message.
     *
     * Recipient/sender data will be retrieved from the Message API.
     * The return value is the number of recipients who were accepted for delivery.
     *
     * @param Swift_Mime_SimpleMessage $message
     * @param string[]           $failedRecipients An array of failures by-reference
     *
     * @return int
     */
    public function send(\Swift_Mime_SimpleMessage $message, &$failedRecipients = \null)
    {
    }
    /**
     * Stop the SMTP connection.
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
     * Register a plugin.
     *
     * @param Swift_Events_EventListener $plugin
     */
    public function registerPlugin(\Swift_Events_EventListener $plugin)
    {
    }
    /**
     * Reset the current mail transaction.
     */
    public function reset()
    {
    }
    /**
     * Get the IoBuffer where read/writes are occurring.
     *
     * @return Swift_Transport_IoBuffer
     */
    public function getBuffer()
    {
    }
    /**
     * Run a command against the buffer, expecting the given response codes.
     *
     * If no response codes are given, the response will not be validated.
     * If codes are given, an exception will be thrown on an invalid response.
     *
     * @param string   $command
     * @param int[]    $codes
     * @param string[] $failures An array of failures by-reference
     *
     * @return string
     */
    public function executeCommand($command, $codes = array(), &$failures = \null)
    {
    }
    /** Read the opening SMTP greeting */
    protected function readGreeting()
    {
    }
    /** Send the HELO welcome */
    protected function doHeloCommand()
    {
    }
    /** Send the MAIL FROM command */
    protected function doMailFromCommand($address)
    {
    }
    /** Send the RCPT TO command */
    protected function doRcptToCommand($address)
    {
    }
    /** Send the DATA command */
    protected function doDataCommand()
    {
    }
    /** Stream the contents of the message over the buffer */
    protected function streamMessage(\Swift_Mime_SimpleMessage $message)
    {
    }
    /** Determine the best-use reverse path for this message */
    protected function getReversePath(\Swift_Mime_SimpleMessage $message)
    {
    }
    /** Throw a TransportException, first sending it to any listeners */
    protected function throwException(\Swift_TransportException $e)
    {
    }
    /** Throws an Exception if a response code is incorrect */
    protected function assertResponseCode($response, $wanted)
    {
    }
    /** Get an entire multi-line response using its sequence number */
    protected function getFullResponse($seq)
    {
    }
    /** Send an email to the given recipients from the given reverse path */
    private function doMailTransaction($message, $reversePath, array $recipients, array &$failedRecipients)
    {
    }
    /** Send a message to the given To: recipients */
    private function sendTo(\Swift_Mime_SimpleMessage $message, $reversePath, array $to, array &$failedRecipients)
    {
    }
    /** Send a message to all Bcc: recipients */
    private function sendBcc(\Swift_Mime_SimpleMessage $message, $reversePath, array $bcc, array &$failedRecipients)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
}