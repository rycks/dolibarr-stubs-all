<?php

namespace Sabre\CalDAV\Principal;

/**
 * ProxyWrite principal
 *
 * This class represents a principal group, hosted under the main principal.
 * This is needed to implement 'Calendar delegation' support. This class is
 * instantiated by User.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ProxyWrite implements \Sabre\CalDAV\Principal\IProxyWrite
{
    /**
     * Parent principal information
     *
     * @var array
     */
    protected $principalInfo;
    /**
     * Principal Backend
     *
     * @var DAVACL\PrincipalBackend\BackendInterface
     */
    protected $principalBackend;
    /**
     * Creates the object
     *
     * Note that you MUST supply the parent principal information.
     *
     * @param DAVACL\PrincipalBackend\BackendInterface $principalBackend
     * @param array $principalInfo
     */
    function __construct(\Sabre\DAVACL\PrincipalBackend\BackendInterface $principalBackend, array $principalInfo)
    {
    }
    /**
     * Returns this principals name.
     *
     * @return string
     */
    function getName()
    {
    }
    /**
     * Returns the last modification time
     *
     * @return null
     */
    function getLastModified()
    {
    }
    /**
     * Deletes the current node
     *
     * @throws DAV\Exception\Forbidden
     * @return void
     */
    function delete()
    {
    }
    /**
     * Renames the node
     *
     * @param string $name The new name
     * @throws DAV\Exception\Forbidden
     * @return void
     */
    function setName($name)
    {
    }
    /**
     * Returns a list of alternative urls for a principal
     *
     * This can for example be an email address, or ldap url.
     *
     * @return array
     */
    function getAlternateUriSet()
    {
    }
    /**
     * Returns the full principal url
     *
     * @return string
     */
    function getPrincipalUrl()
    {
    }
    /**
     * Returns the list of group members
     *
     * If this principal is a group, this function should return
     * all member principal uri's for the group.
     *
     * @return array
     */
    function getGroupMemberSet()
    {
    }
    /**
     * Returns the list of groups this principal is member of
     *
     * If this principal is a member of a (list of) groups, this function
     * should return a list of principal uri's for it's members.
     *
     * @return array
     */
    function getGroupMembership()
    {
    }
    /**
     * Sets a list of group members
     *
     * If this principal is a group, this method sets all the group members.
     * The list of members is always overwritten, never appended to.
     *
     * This method should throw an exception if the members could not be set.
     *
     * @param array $principals
     * @return void
     */
    function setGroupMemberSet(array $principals)
    {
    }
    /**
     * Returns the displayname
     *
     * This should be a human readable name for the principal.
     * If none is available, return the nodename.
     *
     * @return string
     */
    function getDisplayName()
    {
    }
}