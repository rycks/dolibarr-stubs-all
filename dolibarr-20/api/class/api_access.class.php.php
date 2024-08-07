<?php

/**
 * Dolibarr API access class
 *
 */
class DolibarrApiAccess implements \Luracast\Restler\iAuthenticate
{
    const REALM = 'Restricted Dolibarr API';
    /**
     * @var DoliDB	Database handler
     */
    public $db;
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
    public static $user = \null;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName
    /**
     * Check access
     *
     * @return bool
     *
     * @throws RestException 401 Forbidden
     * @throws RestException 503 Technical error
     */
    public function __isAllowed()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName
    /**
     * @return string string to be used with WWW-Authenticate header
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