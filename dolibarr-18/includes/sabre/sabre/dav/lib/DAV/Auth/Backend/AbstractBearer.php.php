<?php

namespace Sabre\DAV\Auth\Backend;

/**
 * HTTP Bearer authentication backend class.
 *
 * This class can be used by authentication objects wishing to use HTTP Bearer
 * Most of the digest logic is handled, implementors just need to worry about
 * the validateBearerToken method.
 *
 * @copyright Copyright (C) 2007-2015 fruux GmbH (https://fruux.com/).
 * @author François Kooman (https://tuxed.net/)
 * @author James David Low (http://jameslow.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class AbstractBearer implements \Sabre\DAV\Auth\Backend\BackendInterface
{
    /**
     * Authentication Realm.
     *
     * The realm is often displayed by browser clients when showing the
     * authentication dialog.
     *
     * @var string
     */
    protected $realm = 'sabre/dav';
    /**
     * Validates a Bearer token.
     *
     * This method should return the full principal url, or false if the
     * token was incorrect.
     *
     * @param string $bearerToken
     *
     * @return string|false
     */
    protected abstract function validateBearerToken($bearerToken);
    /**
     * Sets the authentication realm for this backend.
     *
     * @param string $realm
     */
    public function setRealm($realm)
    {
    }
    /**
     * When this method is called, the backend must check if authentication was
     * successful.
     *
     * The returned value must be one of the following
     *
     * [true, "principals/username"]
     * [false, "reason for failure"]
     *
     * If authentication was successful, it's expected that the authentication
     * backend returns a so-called principal url.
     *
     * Examples of a principal url:
     *
     * principals/admin
     * principals/user1
     * principals/users/joe
     * principals/uid/123457
     *
     * If you don't use WebDAV ACL (RFC3744) we recommend that you simply
     * return a string such as:
     *
     * principals/users/[username]
     *
     * @return array
     */
    public function check(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is called when a user could not be authenticated, and
     * authentication was required for the current request.
     *
     * This gives you the opportunity to set authentication headers. The 401
     * status code will already be set.
     *
     * In this case of Bearer Auth, this would for example mean that the
     * following header needs to be set:
     *
     * $response->addHeader('WWW-Authenticate', 'Bearer realm=SabreDAV');
     *
     * Keep in mind that in the case of multiple authentication backends, other
     * WWW-Authenticate headers may already have been set, and you'll want to
     * append your own WWW-Authenticate header instead of overwriting the
     * existing one.
     */
    public function challenge(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
}