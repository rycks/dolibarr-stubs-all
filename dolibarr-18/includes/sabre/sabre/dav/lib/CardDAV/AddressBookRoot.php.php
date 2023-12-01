<?php

namespace Sabre\CardDAV;

/**
 * AddressBook rootnode.
 *
 * This object lists a collection of users, which can contain addressbooks.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AddressBookRoot extends \Sabre\DAVACL\AbstractPrincipalCollection
{
    /**
     * Principal Backend.
     *
     * @var DAVACL\PrincipalBackend\BackendInterface
     */
    protected $principalBackend;
    /**
     * CardDAV backend.
     *
     * @var Backend\BackendInterface
     */
    protected $carddavBackend;
    /**
     * Constructor.
     *
     * This constructor needs both a principal and a carddav backend.
     *
     * By default this class will show a list of addressbook collections for
     * principals in the 'principals' collection. If your main principals are
     * actually located in a different path, use the $principalPrefix argument
     * to override this.
     *
     * @param string $principalPrefix
     */
    public function __construct(\Sabre\DAVACL\PrincipalBackend\BackendInterface $principalBackend, \Sabre\CardDAV\Backend\BackendInterface $carddavBackend, $principalPrefix = 'principals')
    {
    }
    /**
     * Returns the name of the node.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * This method returns a node for a principal.
     *
     * The passed array contains principal information, and is guaranteed to
     * at least contain a uri item. Other properties may or may not be
     * supplied by the authentication backend.
     *
     * @return \Sabre\DAV\INode
     */
    public function getChildForPrincipal(array $principal)
    {
    }
}