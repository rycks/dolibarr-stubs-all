<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Handles XOAUTH2 authentication.
 *
 * Example:
 * <code>
 * $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
 *   ->setAuthMode('XOAUTH2')
 *   ->setUsername('YOUR_EMAIL_ADDRESS')
 *   ->setPassword('YOUR_ACCESS_TOKEN');
 * </code>
 *
 * @author xu.li<AthenaLightenedMyPath@gmail.com>
 *
 * @see        https://developers.google.com/google-apps/gmail/xoauth2_protocol
 */
class Swift_Transport_Esmtp_Auth_XOAuth2Authenticator implements \Swift_Transport_Esmtp_Authenticator
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
     * Try to authenticate the user with $email and $token.
     *
     * @param Swift_Transport_SmtpAgent $agent
     * @param string                    $email
     * @param string                    $token
     *
     * @return bool
     */
    public function authenticate(\Swift_Transport_SmtpAgent $agent, $email, $token)
    {
    }
    /**
     * Construct the auth parameter.
     *
     * @see https://developers.google.com/google-apps/gmail/xoauth2_protocol#the_sasl_xoauth2_mechanism
     */
    protected function constructXOAuth2Params($email, $token)
    {
    }
}