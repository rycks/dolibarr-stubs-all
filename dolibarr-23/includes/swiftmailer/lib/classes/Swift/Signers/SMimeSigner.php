<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * MIME Message Signer used to apply S/MIME Signature/Encryption to a message.
 *
 * @author Romain-Geissler
 * @author Sebastiaan Stok <s.stok@rollerscapes.net>
 * @author Jan Flora <jf@penneo.com>
 */
class Swift_Signers_SMimeSigner implements \Swift_Signers_BodySigner
{
    protected $signCertificate;
    protected $signPrivateKey;
    protected $encryptCert;
    protected $signThenEncrypt = \true;
    protected $signLevel;
    protected $encryptLevel;
    protected $signOptions;
    protected $encryptOptions;
    protected $encryptCipher;
    protected $extraCerts = \null;
    protected $wrapFullMessage = \false;
    /**
     * @var Swift_StreamFilters_StringReplacementFilterFactory
     */
    protected $replacementFactory;
    /**
     * @var Swift_Mime_SimpleHeaderFactory
     */
    protected $headerFactory;
    /**
     * Constructor.
     *
     * @param string|null $signCertificate
     * @param string|null $signPrivateKey
     * @param string|null $encryptCertificate
     */
    public function __construct($signCertificate = \null, $signPrivateKey = \null, $encryptCertificate = \null)
    {
    }
    /**
     * Set the certificate location to use for signing.
     *
     * @see https://secure.php.net/manual/en/openssl.pkcs7.flags.php
     *
     * @param string       $certificate
     * @param string|array $privateKey  If the key needs an passphrase use array('file-location', 'passphrase') instead
     * @param int          $signOptions Bitwise operator options for openssl_pkcs7_sign()
     * @param string       $extraCerts  A file containing intermediate certificates needed by the signing certificate
     *
     * @return $this
     */
    public function setSignCertificate($certificate, $privateKey = \null, $signOptions = \PKCS7_DETACHED, $extraCerts = \null)
    {
    }
    /**
     * Set the certificate location to use for encryption.
     *
     * @see https://secure.php.net/manual/en/openssl.pkcs7.flags.php
     * @see https://secure.php.net/manual/en/openssl.ciphers.php
     *
     * @param string|array $recipientCerts Either an single X.509 certificate, or an assoc array of X.509 certificates.
     * @param int          $cipher
     *
     * @return $this
     */
    public function setEncryptCertificate($recipientCerts, $cipher = \null)
    {
    }
    /**
     * @return string
     */
    public function getSignCertificate()
    {
    }
    /**
     * @return string
     */
    public function getSignPrivateKey()
    {
    }
    /**
     * Set perform signing before encryption.
     *
     * The default is to first sign the message and then encrypt.
     * But some older mail clients, namely Microsoft Outlook 2000 will work when the message first encrypted.
     * As this goes against the official specs, its recommended to only use 'encryption -> signing' when specifically targeting these 'broken' clients.
     *
     * @param bool $signThenEncrypt
     *
     * @return $this
     */
    public function setSignThenEncrypt($signThenEncrypt = \true)
    {
    }
    /**
     * @return bool
     */
    public function isSignThenEncrypt()
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
     * Specify whether to wrap the entire MIME message in the S/MIME message.
     *
     * According to RFC5751 section 3.1:
     * In order to protect outer, non-content-related message header fields
     * (for instance, the "Subject", "To", "From", and "Cc" fields), the
     * sending client MAY wrap a full MIME message in a message/rfc822
     * wrapper in order to apply S/MIME security services to these header
     * fields.  It is up to the receiving client to decide how to present
     * this "inner" header along with the unprotected "outer" header.
     *
     * @param bool $wrap
     *
     * @return $this
     */
    public function setWrapFullMessage($wrap)
    {
    }
    /**
     * Change the Swift_Message to apply the signing.
     *
     * @return $this
     */
    public function signMessage(\Swift_Message $message)
    {
    }
    /**
     * Return the list of header a signer might tamper.
     *
     * @return array
     */
    public function getAlteredHeaders()
    {
    }
    /**
     * Sign a Swift message.
     */
    protected function smimeSignMessage(\Swift_Message $message)
    {
    }
    /**
     * Encrypt a Swift message.
     */
    protected function smimeEncryptMessage(\Swift_Message $message)
    {
    }
    /**
     * Copy named headers from one Swift message to another.
     */
    protected function copyHeaders(\Swift_Message $fromMessage, \Swift_Message $toMessage, array $headers = [])
    {
    }
    /**
     * Copy a single header from one Swift message to another.
     *
     * @param string $headerName
     */
    protected function copyHeader(\Swift_Message $fromMessage, \Swift_Message $toMessage, $headerName)
    {
    }
    /**
     * Remove all headers from a Swift message.
     */
    protected function clearAllHeaders(\Swift_Message $message)
    {
    }
    /**
     * Wraps a Swift_Message in a message/rfc822 MIME part.
     *
     * @return Swift_MimePart
     */
    protected function wrapMimeMessage(\Swift_Message $message)
    {
    }
    protected function parseSSLOutput(\Swift_InputByteStream $inputStream, \Swift_Message $message)
    {
    }
    /**
     * Merges an OutputByteStream from OpenSSL to a Swift_Message.
     */
    protected function streamToMime(\Swift_OutputByteStream $fromStream, \Swift_Message $message)
    {
    }
    /**
     * This message will parse the headers of a MIME email byte stream
     * and return an array that contains the headers as an associative
     * array and the email body as a string.
     *
     * @return array
     */
    protected function parseStream(\Swift_OutputByteStream $emailStream)
    {
    }
    protected function copyFromOpenSSLOutput(\Swift_OutputByteStream $fromStream, \Swift_InputByteStream $toStream)
    {
    }
}