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
 *
 * @author Romain-Geissler
 * @author Sebastiaan Stok <s.stok@rollerscapes.net>
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
     * @see http://www.php.net/manual/en/openssl.pkcs7.flags.php
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
     * @see http://www.php.net/manual/en/openssl.pkcs7.flags.php
     * @see http://nl3.php.net/manual/en/openssl.ciphers.php
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
     * Change the Swift_Message to apply the signing.
     *
     * @param Swift_Message $message
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
     * @param Swift_InputByteStream $inputStream
     * @param Swift_Message         $mimeEntity
     */
    protected function toSMimeByteStream(\Swift_InputByteStream $inputStream, \Swift_Message $message)
    {
    }
    /**
     * @param Swift_Message $message
     *
     * @return Swift_Message
     */
    protected function createMessage(\Swift_Message $message)
    {
    }
    /**
     * @param Swift_FileStream      $outputStream
     * @param Swift_InputByteStream $inputStream
     *
     * @throws Swift_IoException
     */
    protected function messageStreamToSignedByteStream(\Swift_FileStream $outputStream, \Swift_InputByteStream $inputStream)
    {
    }
    /**
     * @param Swift_FileStream      $outputStream
     * @param Swift_InputByteStream $is
     *
     * @throws Swift_IoException
     */
    protected function messageStreamToEncryptedByteStream(\Swift_FileStream $outputStream, \Swift_InputByteStream $is)
    {
    }
    /**
     * @param Swift_OutputByteStream $fromStream
     * @param Swift_InputByteStream  $toStream
     */
    protected function copyFromOpenSSLOutput(\Swift_OutputByteStream $fromStream, \Swift_InputByteStream $toStream)
    {
    }
    /**
     * Merges an OutputByteStream to Swift_Message.
     *
     * @param Swift_OutputByteStream $fromStream
     * @param Swift_Message          $message
     */
    protected function streamToMime(\Swift_OutputByteStream $fromStream, \Swift_Message $message)
    {
    }
}