<?php

namespace Sabre\DAVACL\PrincipalBackend;

class Mock extends \Sabre\DAVACL\PrincipalBackend\AbstractBackend
{
    public $groupMembers = [];
    public $principals;
    function __construct(array $principals = null)
    {
    }
    function getPrincipalsByPrefix($prefix)
    {
    }
    function addPrincipal(array $principal)
    {
    }
    function getPrincipalByPath($path)
    {
    }
    function searchPrincipals($prefixPath, array $searchProperties, $test = 'allof')
    {
    }
    function getGroupMemberSet($path)
    {
    }
    function getGroupMembership($path)
    {
    }
    function setGroupMemberSet($path, array $members)
    {
    }
    /**
     * Updates one ore more webdav properties on a principal.
     *
     * The list of mutations is stored in a Sabre\DAV\PropPatch object.
     * To do the actual updates, you must tell this object which properties
     * you're going to process with the handle() method.
     *
     * Calling the handle method is like telling the PropPatch object "I
     * promise I can handle updating this property".
     *
     * Read the PropPatch documentation for more info and examples.
     *
     * @param string $path
     * @param \Sabre\DAV\PropPatch $propPatch
     */
    function updatePrincipal($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
}