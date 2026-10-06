<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Makes sure a connection to a POP3 host has been established prior to connecting to SMTP.
 *
 * @author     Chris Corbyn
 */
class Swift_Plugins_PopBeforeSmtpPlugin implements \Swift_Events_TransportChangeListener, \Swift_Plugins_Pop_Pop3Connection
{
    /** A delegate connection to use (mostly a test hook) */
    private $connection;
    /** Hostname of the POP3 server */
    private $host;
    /** Port number to connect on */
    private $port;
    /** Encryption type to use (if any) */
    private $crypto;
    /** Username to use (if any) */
    private $username;
    /** Password to use (if any) */
    private $password;
    /** Established connection via TCP socket */
    private $socket;
    /** Connect timeout in seconds */
    private $timeout = 10;
    /** SMTP Transport to bind to */
    private $transport;
    /**
     * Create a new PopBeforeSmtpPlugin for $host and $port.
     *
     * @param string $host   Hostname or IP. Literal IPv6 addresses should be
     *                       wrapped in square brackets.
     * @param int    $port
     * @param string $crypto as "tls" or "ssl"
     */
    public function __construct($host, $port = 110, $crypto = \null)
    {
    }
    /**
     * Set a Pop3Connection to delegate to instead of connecting directly.
     *
     * @return $this
     */
    public function setConnection(\Swift_Plugins_Pop_Pop3Connection $connection)
    {
    }
    /**
     * Bind this plugin to a specific SMTP transport instance.
     */
    public function bindSmtp(\Swift_Transport $smtp)
    {
    }
    /**
     * Set the connection timeout in seconds (default 10).
     *
     * @param int $timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
    }
    /**
     * Set the username to use when connecting (if needed).
     *
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
    }
    /**
     * Set the password to use when connecting (if needed).
     *
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
    }
    /**
     * Connect to the POP3 host and authenticate.
     *
     * @throws Swift_Plugins_Pop_Pop3Exception if connection fails
     */
    public function connect()
    {
    }
    /**
     * Disconnect from the POP3 host.
     */
    public function disconnect()
    {
    }
    /**
     * Invoked just before a Transport is started.
     */
    public function beforeTransportStarted(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    /**
     * Not used.
     */
    public function transportStarted(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    /**
     * Not used.
     */
    public function beforeTransportStopped(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    /**
     * Not used.
     */
    public function transportStopped(\Swift_Events_TransportChangeEvent $evt)
    {
    }
    private function command($command)
    {
    }
    private function assertOk($response)
    {
    }
    private function getHostString()
    {
    }
}