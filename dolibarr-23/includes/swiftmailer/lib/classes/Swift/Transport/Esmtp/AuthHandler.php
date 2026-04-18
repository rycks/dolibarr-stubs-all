<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * An ESMTP handler for AUTH support (RFC 5248).
 *
 * @author Chris Corbyn
 */
class Swift_Transport_Esmtp_AuthHandler implements \Swift_Transport_EsmtpHandler
{
    /**
     * Authenticators available to process the request.
     *
     * @var Swift_Transport_Esmtp_Authenticator[]
     */
    private $authenticators = [];
    /**
     * The username for authentication.
     *
     * @var string
     */
    private $username;
    /**
     * The password for authentication.
     *
     * @var string
     */
    private $password;
    /**
     * The auth mode for authentication.
     *
     * @var string
     */
    private $auth_mode;
    /**
     * The ESMTP AUTH parameters available.
     *
     * @var string[]
     */
    private $esmtpParams = [];
    /**
     * Create a new AuthHandler with $authenticators for support.
     *
     * @param Swift_Transport_Esmtp_Authenticator[] $authenticators
     */
    public function __construct(array $authenticators)
    {
    }
    /**
     * Set the Authenticators which can process a login request.
     *
     * @param Swift_Transport_Esmtp_Authenticator[] $authenticators
     */
    public function setAuthenticators(array $authenticators)
    {
    }
    /**
     * Get the Authenticators which can process a login request.
     *
     * @return Swift_Transport_Esmtp_Authenticator[]
     */
    public function getAuthenticators()
    {
    }
    /**
     * Set the username to authenticate with.
     *
     * @param string $username
     */
    public function setUsername($username)
    {
    }
    /**
     * Get the username to authenticate with.
     *
     * @return string
     */
    public function getUsername()
    {
    }
    /**
     * Set the password to authenticate with.
     *
     * @param string $password
     */
    public function setPassword($password)
    {
    }
    /**
     * Get the password to authenticate with.
     *
     * @return string
     */
    public function getPassword()
    {
    }
    /**
     * Set the auth mode to use to authenticate.
     *
     * @param string $mode
     */
    public function setAuthMode($mode)
    {
    }
    /**
     * Get the auth mode to use to authenticate.
     *
     * @return string
     */
    public function getAuthMode()
    {
    }
    /**
     * Get the name of the ESMTP extension this handles.
     *
     * @return string
     */
    public function getHandledKeyword()
    {
    }
    /**
     * Set the parameters which the EHLO greeting indicated.
     *
     * @param string[] $parameters
     */
    public function setKeywordParams(array $parameters)
    {
    }
    /**
     * Runs immediately after a EHLO has been issued.
     *
     * @param Swift_Transport_SmtpAgent $agent to read/write
     */
    public function afterEhlo(\Swift_Transport_SmtpAgent $agent)
    {
    }
    /**
     * Not used.
     */
    public function getMailParams()
    {
    }
    /**
     * Not used.
     */
    public function getRcptParams()
    {
    }
    /**
     * Not used.
     */
    public function onCommand(\Swift_Transport_SmtpAgent $agent, $command, $codes = [], &$failedRecipients = \null, &$stop = \false)
    {
    }
    /**
     * Returns +1, -1 or 0 according to the rules for usort().
     *
     * This method is called to ensure extensions can be execute in an appropriate order.
     *
     * @param string $esmtpKeyword to compare with
     *
     * @return int
     */
    public function getPriorityOver($esmtpKeyword)
    {
    }
    /**
     * Returns an array of method names which are exposed to the Esmtp class.
     *
     * @return string[]
     */
    public function exposeMixinMethods()
    {
    }
    /**
     * Not used.
     */
    public function resetState()
    {
    }
    /**
     * Returns the authenticator list for the given agent.
     *
     * @return array
     */
    protected function getAuthenticatorsForAgent()
    {
    }
}