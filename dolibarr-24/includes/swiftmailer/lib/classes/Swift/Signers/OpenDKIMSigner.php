<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * DKIM Signer used to apply DKIM Signature to a message
 * Takes advantage of pecl extension.
 *
 * @author     Xavier De Cock <xdecock@gmail.com>
 *
 * @deprecated since SwiftMailer 6.1.0; use Swift_Signers_DKIMSigner instead.
 */
class Swift_Signers_OpenDKIMSigner extends \Swift_Signers_DKIMSigner
{
    private $peclLoaded = \false;
    private $dkimHandler = \null;
    private $dropFirstLF = \true;
    const CANON_RELAXED = 1;
    const CANON_SIMPLE = 2;
    const SIG_RSA_SHA1 = 3;
    const SIG_RSA_SHA256 = 4;
    public function __construct($privateKey, $domainName, $selector)
    {
    }
    public function addSignature(\Swift_Mime_SimpleHeaderSet $headers)
    {
    }
    public function setHeaders(\Swift_Mime_SimpleHeaderSet $headers)
    {
    }
    public function startBody()
    {
    }
    public function endBody()
    {
    }
    public function reset()
    {
    }
    /**
     * Set the signature timestamp.
     *
     * @param int $time
     *
     * @return $this
     */
    public function setSignatureTimestamp($time)
    {
    }
    /**
     * Set the signature expiration timestamp.
     *
     * @param int $time
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
     * @return $this
     */
    public function setDebugHeaders($debug)
    {
    }
    // Protected
    protected function canonicalizeBody($string)
    {
    }
}