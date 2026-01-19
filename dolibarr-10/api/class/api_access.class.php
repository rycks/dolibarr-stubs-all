<?php

/**
 * Dolibarr API access class
 *
 */
class DolibarrApiAccess implements \Luracast\Restler\iAuthenticate
{
    const REALM = 'Restricted Dolibarr API';
    /**
     * @var array $requires	role required by API method		user / external / admin
     */
    public static $requires = array('user', 'external', 'admin');
    /**
     * @var string $role		user role
     */
    public static $role = 'user';
    /**
     * @var User		$user	Loggued user
     */
    public static $user = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName
    /**
     * Check access
     *
     * @return bool
     * @throws RestException
     */
    public function __isAllowed()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName
    /**
     * @return string string to be used with WWW-Authenticate header
     * @example Basic
     * @example Digest
     * @example OAuth
     */
    public function __getWWWAuthenticateString()
    {
    }
    /**
     * Verify access
     *
     * @param   array $m Properties of method
     *
     * @access private
     * @return bool
     */
    public static function verifyAccess(array $m)
    {
    }
}