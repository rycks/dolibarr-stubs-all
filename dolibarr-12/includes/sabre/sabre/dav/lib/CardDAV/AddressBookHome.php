<?php

namespace Sabre\CardDAV;

/**
 * AddressBook Home class
 *
 * This collection contains a list of addressbooks associated with one user.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AddressBookHome extends \Sabre\DAV\Collection implements \Sabre\DAV\IExtendedCollection, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * Principal uri
     *
     * @var array
     */
    protected $principalUri;
    /**
     * carddavBackend
     *
     * @var Backend\BackendInterface
     */
    protected $carddavBackend;
    /**
     * Constructor
     *
     * @param Backend\BackendInterface $carddavBackend
     * @param string $principalUri
     */
    function __construct(\Sabre\CardDAV\Backend\BackendInterface $carddavBackend, $principalUri)
    {
    }
    /**
     * Returns the name of this object
     *
     * @return string
     */
    function getName()
    {
    }
    /**
     * Updates the name of this object
     *
     * @param string $name
     * @return void
     */
    function setName($name)
    {
    }
    /**
     * Deletes this object
     *
     * @return void
     */
    function delete()
    {
    }
    /**
     * Returns the last modification date
     *
     * @return int
     */
    function getLastModified()
    {
    }
    /**
     * Creates a new file under this object.
     *
     * This is currently not allowed
     *
     * @param string $filename
     * @param resource $data
     * @return void
     */
    function createFile($filename, $data = null)
    {
    }
    /**
     * Creates a new directory under this object.
     *
     * This is currently not allowed.
     *
     * @param string $filename
     * @return void
     */
    function createDirectory($filename)
    {
    }
    /**
     * Returns a single addressbook, by name
     *
     * @param string $name
     * @todo needs optimizing
     * @return AddressBook
     */
    function getChild($name)
    {
    }
    /**
     * Returns a list of addressbooks
     *
     * @return array
     */
    function getChildren()
    {
    }
    /**
     * Creates a new address book.
     *
     * @param string $name
     * @param MkCol $mkCol
     * @throws DAV\Exception\InvalidResourceType
     * @return void
     */
    function createExtendedCollection($name, \Sabre\DAV\MkCol $mkCol)
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