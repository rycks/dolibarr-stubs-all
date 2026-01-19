<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * DKIM Signer used to apply DKIM Signature to a message.
 *
 * @author     Xavier De Cock <xdecock@gmail.com>
 */
class Swift_Signers_DKIMSigner implements \Swift_Signers_HeaderSigner
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
    private $passphrase = '';
    /**
     * Hash algorithm used.
     *
     * @see RFC6376 3.3: Signers MUST implement and SHOULD sign using rsa-sha256.
     *
     * @var string
     */
    protected $hashAlgorithm = 'rsa-sha256';
    /**
     * Body canon method.
     *
     * @var string
     */
    protected $bodyCanon = 'simple';
    /**
     * Header canon method.
     *
     * @var string
     */
    protected $headerCanon = 'simple';
    /**
     * Headers not being signed.
     *
     * @var array
     */
    protected $ignoredHeaders = array('return-path' => \true);
    /**
     * Signer identity.
     *
     * @var string
     */
    protected $signerIdentity;
    /**
     * BodyLength.
     *
     * @var int
     */
    protected $bodyLen = 0;
    /**
     * Maximum signedLen.
     *
     * @var int
     */
    protected $maxLen = \PHP_INT_MAX;
    /**
     * Embbed bodyLen in signature.
     *
     * @var bool
     */
    protected $showLen = \false;
    /**
     * When the signature has been applied (true means time()), false means not embedded.
     *
     * @var mixed
     */
    protected $signatureTimestamp = \true;
    /**
     * When will the signature expires false means not embedded, if sigTimestamp is auto
     * Expiration is relative, otherwise it's absolute.
     *
     * @var int
     */
    protected $signatureExpiration = \false;
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
    protected $signedHeaders = array();
    /**
     * If debugHeaders is set store debugData here.
     *
     * @var string
     */
    private $debugHeadersData = '';
    /**
     * Stores the bodyHash.
     *
     * @var string
     */
    private $bodyHash = '';
    /**
     * Stores the signature header.
     *
     * @var Swift_Mime_Headers_ParameterizedHeader
     */
    protected $dkimHeader;
    private $bodyHashHandler;
    private $headerHash;
    private $headerCanonData = '';
    private $bodyCanonEmptyCounter = 0;
    private $bodyCanonIgnoreStart = 2;
    private $bodyCanonSpace = \false;
    private $bodyCanonLastChar = \null;
    private $bodyCanonLine = '';
    private $bound = array();
    /**
     * Constructor.
     *
     * @param string $privateKey
     * @param string $domainName
     * @param string $selector
     * @param string $passphrase
     */
    public function __construct($privateKey, $domainName, $selector, $passphrase = '')
    {
    }
    /**
     * Reset the Signer.
     *
     * @see Swift_Signer::reset()
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
     */
    // TODO fix return
    public function write($bytes)
    {
    }
    /**
     * For any bytes that are currently buffered inside the stream, force them
     * off the buffer.
     */
    public function commit()
    {
    }
    /**
     * Attach $is to this stream.
     * The stream acts as an observer, receiving all data that is written.
     * All {@link write()} and {@link flushBuffers()} operations will be mirrored.
     *
     * @param Swift_InputByteStream $is
     */
    public function bind(\Swift_InputByteStream $is)
    {
    }
    /**
     * Remove an already bound stream.
     * If $is is not bound, no errors will be raised.
     * If the stream currently has any buffered data it will be written to $is
     * before unbinding occurs.
     *
     * @param Swift_InputByteStream $is
     */
    public function unbind(\Swift_InputByteStream $is)
    {
    }
    /**
     * Flush the contents of the stream (empty it) and set the internal pointer
     * to the beginning.
     *
     * @throws Swift_IoException
     */
    public function flushBuffers()
    {
    }
    /**
     * Set hash_algorithm, must be one of rsa-sha256 | rsa-sha1.
     *
     * @param string $hash 'rsa-sha1' or 'rsa-sha256'
     *
     * @throws Swift_SwiftException
     *
     * @return $this
     */
    public function setHashAlgorithm($hash)
    {
    }
    /**
     * Set the body canonicalization algorithm.
     *
     * @param string $canon
     *
     * @return $this
     */
    public function setBodyCanon($canon)
    {
    }
    /**
     * Set the header canonicalization algorithm.
     *
     * @param string $canon
     *
     * @return $this
     */
    public function setHeaderCanon($canon)
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
     * Set the length of the body to sign.
     *
     * @param mixed $len (bool or int)
     *
     * @return $this
     */
    public function setBodySignedLen($len)
    {
    }
    /**
     * Set the signature timestamp.
     *
     * @param int $time A timestamp
     *
     * @return $this
     */
    public function setSignatureTimestamp($time)
    {
    }
    /**
     * Set the signature expiration timestamp.
     *
     * @param int $time A timestamp
     *
     * @return $this
     */
    public function setSignatureExpiration($time)
    {
    }
    /**
     * Enable / disable the DebugHeaders.
     *
     * @param bool $debug
     *
     * @return Swift_Signers_DKIMSigner
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
     * @return Swift_Signers_DKIMSigner
     */
    public function ignoreHeader($header_name)
    {
    }
    /**
     * Set the headers to sign.
     *
     * @param Swift_Mime_SimpleHeaderSet $headers
     *
     * @return Swift_Signers_DKIMSigner
     */
    public function setHeaders(\Swift_Mime_SimpleHeaderSet $headers)
    {
    }
    /**
     * Add the signature to the given Headers.
     *
     * @param Swift_Mime_SimpleHeaderSet $headers
     *
     * @return Swift_Signers_DKIMSigner
     */
    public function addSignature(\Swift_Mime_SimpleHeaderSet $headers)
    {
    }
    /* Private helpers */
    protected function addHeader($header, $is_sig = \false)
    {
    }
    protected function canonicalizeBody($string)
    {
    }
    protected function endOfBody()
    {
    }
    private function addToBodyHash($string)
    {
    }
    private function addToHeaderHash($header)
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