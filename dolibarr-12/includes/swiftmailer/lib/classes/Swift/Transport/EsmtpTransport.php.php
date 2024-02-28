<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Sends Messages over SMTP with ESMTP support.
 *
 * @author Chris Corbyn
 */
class Swift_Transport_EsmtpTransport extends \Swift_Transport_AbstractSmtpTransport implements \Swift_Transport_SmtpAgent
{
    /**
     * ESMTP extension handlers.
     *
     * @var Swift_Transport_EsmtpHandler[]
     */
    private $handlers = array();
    /**
     * ESMTP capabilities.
     *
     * @var string[]
     */
    private $capabilities = array();
    /**
     * Connection buffer parameters.
     *
     * @var array
     */
    private $params = array('protocol' => 'tcp', 'host' => 'localhost', 'port' => 25, 'timeout' => 30, 'blocking' => 1, 'tls' => \false, 'type' => \Swift_Transport_IoBuffer::TYPE_SOCKET, 'stream_context_options' => array());
    /**
     * Creates a new EsmtpTransport using the given I/O buffer.
     *
     * @param Swift_Transport_IoBuffer       $buf
     * @param Swift_Transport_EsmtpHandler[] $extensionHandlers
     * @param Swift_Events_EventDispatcher   $dispatcher
     * @param string                         $localDomain
     */
    public function __construct(\Swift_Transport_IoBuffer $buf, array $extensionHandlers, \Swift_Events_EventDispatcher $dispatcher, $localDomain = '127.0.0.1')
    {
    }
    /**
     * Set the host to connect to.
     *
     * @param string $host
     *
     * @return $this
     */
    public function setHost($host)
    {
    }
    /**
     * Get the host to connect to.
     *
     * @return string
     */
    public function getHost()
    {
    }
    /**
     * Set the port to connect to.
     *
     * @param int $port
     *
     * @return $this
     */
    public function setPort($port)
    {
    }
    /**
     * Get the port to connect to.
     *
     * @return int
     */
    public function getPort()
    {
    }
    /**
     * Set the connection timeout.
     *
     * @param int $timeout seconds
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
    }
    /**
     * Get the connection timeout.
     *
     * @return int
     */
    public function getTimeout()
    {
    }
    /**
     * Set the encryption type (tls or ssl).
     *
     * @param string $encryption
     *
     * @return $this
     */
    public function setEncryption($encryption)
    {
    }
    /**
     * Get the encryption type.
     *
     * @return string
     */
    public function getEncryption()
    {
    }
    /**
     * Sets the stream context options.
     *
     * @param array $options
     *
     * @return $this
     */
    public function setStreamOptions($options)
    {
    }
    /**
     * Returns the stream context options.
     *
     * @return array
     */
    public function getStreamOptions()
    {
    }
    /**
     * Sets the source IP.
     *
     * @param string $source
     *
     * @return $this
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
     * Set ESMTP extension handlers.
     *
     * @param Swift_Transport_EsmtpHandler[] $handlers
     *
     * @return $this
     */
    public function setExtensionHandlers(array $handlers)
    {
    }
    /**
     * Get ESMTP extension handlers.
     *
     * @return Swift_Transport_EsmtpHandler[]
     */
    public function getExtensionHandlers()
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
    /** Mixin handling method for ESMTP handlers */
    public function __call($method, $args)
    {
    }
    /** Get the params to initialize the buffer */
    protected function getBufferParams()
    {
    }
    /** Overridden to perform EHLO instead */
    protected function doHeloCommand()
    {
    }
    /** Overridden to add Extension support */
    protected function doMailFromCommand($address)
    {
    }
    /** Overridden to add Extension support */
    protected function doRcptToCommand($address)
    {
    }
    /** Determine ESMTP capabilities by function group */
    private function getCapabilities($ehloResponse)
    {
    }
    /** Set parameters which are used by each extension handler */
    private function setHandlerParams()
    {
    }
    /** Get ESMTP handlers which are currently ok to use */
    private function getActiveHandlers()
    {
    }
}