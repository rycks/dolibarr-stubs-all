<?php

namespace Webklex\PHPIMAP\Connection\Protocols;

/**
 * Class Protocol
 *
 * @package Webklex\PHPIMAP\Connection\Protocols
 */
abstract class Protocol implements \Webklex\PHPIMAP\Connection\Protocols\ProtocolInterface
{
    /**
     * Default connection timeout in seconds
     */
    protected $connection_timeout = 30;
    /**
     * @var boolean
     */
    protected $debug = false;
    /**
     * @var false|resource
     */
    public $stream = false;
    /**
     * Connection encryption method
     * @var mixed $encryption
     */
    protected $encryption = false;
    /**
     * Set to false to ignore SSL certificate validation
     * @var bool
     */
    protected $cert_validation = true;
    /**
     * Proxy settings
     * @var array
     */
    protected $proxy = ['socket' => null, 'request_fulluri' => false, 'username' => null, 'password' => null];
    /**
     * Get an available cryptographic method
     *
     * @return int
     */
    public function getCryptoMethod()
    {
    }
    /**
     * Enable SSL certificate validation
     *
     * @return $this
     */
    public function enableCertValidation()
    {
    }
    /**
     * Disable SSL certificate validation
     * @return $this
     */
    public function disableCertValidation()
    {
    }
    /**
     * Set SSL certificate validation
     * @var int $cert_validation
     *
     * @return $this
     */
    public function setCertValidation($cert_validation)
    {
    }
    /**
     * Should we validate SSL certificate?
     *
     * @return bool
     */
    public function getCertValidation()
    {
    }
    /**
     * Set connection proxy settings
     * @var array $options
     *
     * @return $this
     */
    public function setProxy($options)
    {
    }
    /**
     * Get the current proxy settings
     *
     * @return array
     */
    public function getProxy()
    {
    }
    /**
     * Prepare socket options
     * @var string $transport
     *
     * @return array
     */
    private function defaultSocketOptions($transport)
    {
    }
    /**
     * Create a new resource stream
     * @param $transport
     * @param string $host hostname or IP address of IMAP server
     * @param int $port of IMAP server, default is 143 (993 for ssl)
     * @param int $timeout timeout in seconds for initiating session
     *
     * @return resource|boolean The socket created.
     * @throws ConnectionFailedException
     */
    protected function createStream($transport, $host, $port, $timeout)
    {
    }
    /**
     * @return int
     */
    public function getConnectionTimeout()
    {
    }
    /**
     * @param int $connection_timeout
     * @return Protocol
     */
    public function setConnectionTimeout($connection_timeout)
    {
    }
}