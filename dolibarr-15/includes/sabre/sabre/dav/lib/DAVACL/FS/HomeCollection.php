<?php

namespace Sabre\DAVACL\FS;

/**
 * This collection contains a collection for every principal.
 * It is similar to /home on many unix systems.
 *
 * The per-user collections can only be accessed by the user who owns the
 * collection.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class HomeCollection extends \Sabre\DAVACL\AbstractPrincipalCollection implements \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * Name of this collection.
     *
     * @var string
     */
    public $collectionName = 'home';
    /**
     * Path to where the users' files are actually stored.
     *
     * @var string
     */
    protected $storagePath;
    /**
     * Creates the home collection.
     *
     * @param BackendInterface $principalBackend
     * @param string $storagePath Where the actual files are stored.
     * @param string $principalPrefix list of principals to iterate.
     */
    function __construct(\Sabre\DAVACL\PrincipalBackend\BackendInterface $principalBackend, $storagePath, $principalPrefix = 'principals')
    {
    }
    /**
     * Returns the name of the node.
     *
     * This is used to generate the url.
     *
     * @return string
     */
    function getName()
    {
    }
    /**
     * Returns a principals' collection of files.
     *
     * The passed array contains principal information, and is guaranteed to
     * at least contain a uri item. Other properties may or may not be
     * supplied by the authentication backend.
     *
     * @param array $principalInfo
     * @return \Sabre\DAV\INode
     */
    function getChildForPrincipal(array $principalInfo)
    {
    }
    /**
     * Returns a list of ACE's for this node.
     *
     * Each ACE has the following properties:
     *   * 'privilege', a string such as {DAV:}read or {DAV:}write. These are
     *     currently the only supported privileges
     *   * 'principal', a url to the principal who owns the node
     *   * 'protected' (optional), indicating that this ACE is not allowed to
     *      be updated.
     *
     * @return array
     */
    function getACL()
    {
    }
}