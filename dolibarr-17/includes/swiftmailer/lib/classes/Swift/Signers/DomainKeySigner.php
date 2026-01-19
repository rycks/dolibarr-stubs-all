<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * DomainKey Signer used to apply DomainKeys Signature to a message.
 *
 * @author     Xavier De Cock <xdecock@gmail.com>
 */
class Swift_Signers_DomainKeySigner implements \Swift_Signers_HeaderSigner
{
    /**
     * PrivateKey.
     *
     * @var string
     */
    protected $privateKey;
    /**
     * DomainName.
     *
     * @var string
     */
    protected $domainName;
    /**
     * Selector.
     *
     * @var string
     */
    protected $selector;
    /**
     * Hash algorithm used.
     *
     * @var string
     */
    protected $hashAlgorithm = 'rsa-sha1';
    /**
     * Canonisation method.
     *
     * @var string
     */
    protected $canon = 'simple';
    /**
     * Headers not being signed.
     *
     * @var array
     */
    protected $ignoredHeaders = [];
    /**
     * Signer identity.
     *
     * @var string
     */
    protected $signerIdentity;
    /**
     * Must we embed signed headers?
     *
     * @var bool
     */
    protected $debugHeaders = \false;
    // work variables
    /**
     * Headers used to generate hash.
     *
     * @var array
     */
    private $signedHeaders = [];
    /**
     * Stores the signature header.
     *
     * @var Swift_Mime_Headers_ParameterizedHeader
     */
    protected $domainKeyHeader;
    /**
     * Hash Handler.
     *
     * @var resource|null
     */
    private $hashHandler;
    private $canonData = '';
    private $bodyCanonEmptyCounter = 0;
    private $bodyCanonIgnoreStart = 2;
    private $bodyCanonSpace = \false;
    private $bodyCanonLastChar = \null;
    private $bodyCanonLine = '';
    private $bound = [];
    /**
     * Constructor.
     *
     * @param string $privateKey
     * @param string $domainName
     * @param string $selector
     */
    public function __construct($privateKey, $domainName, $selector)
    {
    }
    /**
     * Resets internal states.
     *
     * @return $this
     */
    public function reset()
    {
    }
    /**
     * Writes $bytes to the end of the stream.
     *
     * Writing may not happen immediately if the stream chooses to buffer.  If
     * you want to write these bytes with immediate effect, call {@link commit()}
     * after calling write().
     *
     * This method returns the sequence ID of the write (i.e. 1 for first, 2 for
     * second, etc etc).
     *
     * @param string $bytes
     *
     * @return int
     *
     * @throws Swift_IoException
     *
     * @return $this
     */
    public function write($bytes)
    {
    }
    /**
     * For any bytes that are currently buffered inside the stream, force them
     * off the buffer.
     *
     * @throws Swift_IoException
     *
     * @return $this
     */
    public function commit()
    {
    }
    /**
     * Attach $is to this stream.
     *
     * The stream acts as an observer, receiving all data that is written.
     * All {@link write()} and {@link flushBuffers()} operations will be mirrored.
     *
     * @return $this
     */
    public function bind(\Swift_InputByteStream $is)
    {
    }
    /**
     * Remove an already bound stream.
     *
     * If $is is not bound, no errors will be raised.
     * If the stream currently has any buffered data it will be written to $is
     * before unbinding occurs.
     *
     * @return $this
     */
    public function unbind(\Swift_InputByteStream $is)
    {
    }
    /**
     * Flush the contents of the stream (empty it) and set the internal pointer
     * to the beginning.
     *
     * @throws Swift_IoException
     *
     * @return $this
     */
    public function flushBuffers()
    {
    }
    /**
     * Set hash_algorithm, must be one of rsa-sha256 | rsa-sha1 defaults to rsa-sha256.
     *
     * @param string $hash
     *
     * @return $this
     */
    public function setHashAlgorithm($hash)
    {
    }
    /**
     * Set the canonicalization algorithm.
     *
     * @param string $canon simple | nofws defaults to simple
     *
     * @return $this
     */
    public function setCanon($canon)
    {
    }
    /**
     * Set the signer identity.
     *
     * @param string $identity
     *
     * @return $this
     */
    public function setSignerIdentity($identity)
    {
    }
    /**
     * Enable / disable the DebugHeaders.
     *
     * @param bool $debug
     *
     * @return $this
     */
    public function setDebugHeaders($debug)
    {
    }
    /**
     * Start Body.
     */
    public function startBody()
    {
    }
    /**
     * End Body.
     */
    public function endBody()
    {
    }
    /**
     * Returns the list of Headers Tampered by this plugin.
     *
     * @return array
     */
    public function getAlteredHeaders()
    {
    }
    /**
     * Adds an ignored Header.
     *
     * @param string $header_name
     *
     * @return $this
     */
    public function ignoreHeader($header_name)
    {
    }
    /**
     * Set the headers to sign.
     *
     * @return $this
     */
    public function setHeaders(\Swift_Mime_SimpleHeaderSet $headers)
    {
    }
    /**
     * Add the signature to the given Headers.
     *
     * @return $this
     */
    public function addSignature(\Swift_Mime_SimpleHeaderSet $headers)
    {
    }
    /* Private helpers */
    protected function addHeader($header)
    {
    }
    protected function endOfHeaders()
    {
    }
    protected function canonicalizeBody($string)
    {
    }
    protected function endOfBody()
    {
    }
    private function addToHash($string)
    {
    }
    private function startHash()
    {
    }
    /**
     * @throws Swift_SwiftException
     *
     * @return string
     */
    private function getEncryptedHash()
    {
    }
}