<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Handles CRAM-MD5 authentication.
 *
 * @author Chris Corbyn
 */
class Swift_Transport_Esmtp_Auth_CramMd5Authenticator implements \Swift_Transport_Esmtp_Authenticator
{
    /**
     * Get the name of the AUTH mechanism this Authenticator handles.
     *
     * @return string
     */
    public function getAuthKeyword()
    {
    }
    /**
     * Try to authenticate the user with $username and $password.
     *
     * @param Swift_Transport_SmtpAgent $agent
     * @param string                    $username
     * @param string                    $password
     *
     * @return bool
     */
    public function authenticate(\Swift_Transport_SmtpAgent $agent, $username, $password)
    {
    }
    /**
     * Generate a CRAM-MD5 response from a server challenge.
     *
     * @param string $secret
     * @param string $challenge
     *
     * @return string
     */
    private function getResponse($secret, $challenge)
    {
    }
}