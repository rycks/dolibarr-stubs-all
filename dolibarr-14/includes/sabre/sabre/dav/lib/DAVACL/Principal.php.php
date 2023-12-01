<?php

namespace Sabre\DAVACL;

/**
 * Principal class
 *
 * This class is a representation of a simple principal
 *
 * Many WebDAV specs require a user to show up in the directory
 * structure.
 *
 * This principal also has basic ACL settings, only allowing the principal
 * access it's own principal.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Principal extends \Sabre\DAV\Node implements \Sabre\DAVACL\IPrincipal, \Sabre\DAV\IProperties, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * Struct with principal information.
     *
     * @var array
     */
    protected $principalProperties;
    /**
     * Principal backend
     *
     * @var PrincipalBackend\BackendInterface
     */
    protected $principalBackend;
    /**
     * Creates the principal object
     *
     * @param PrincipalBackend\BackendInterface $principalBackend
     * @param array $principalProperties
     */
    function __construct(\Sabre\DAVACL\PrincipalBackend\BackendInterface $principalBackend, array $principalProperties = [])
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
     * @param array $groupMembers
     * @return void
     */
    function setGroupMemberSet(array $groupMembers)
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
     * Returns the name of the user
     *
     * @return string
     */
    function getDisplayName()
    {
    }
    /**
     * Returns a list of properties
     *
     * @param array $requestedProperties
     * @return array
     */
    function getProperties($requestedProperties)
    {
    }
    /**
     * Updates properties on this node.
     *
     * This method received a PropPatch object, which contains all the
     * information about the update.
     *
     * To update specific properties, call the 'handle' method on this object.
     * Read the PropPatch documentation for more information.
     *
     * @param DAV\PropPatch $propPatch
     * @return void
     */
    function propPatch(\Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * Returns the owner principal
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    function getOwner()
    {
    }
}