<?php

namespace Sabre\CardDAV;

/**
 * AddressBook Home class.
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
     * Principal uri.
     *
     * @var array
     */
    protected $principalUri;
    /**
     * carddavBackend.
     *
     * @var Backend\BackendInterface
     */
    protected $carddavBackend;
    /**
     * Constructor.
     *
     * @param string $principalUri
     */
    public function __construct(\Sabre\CardDAV\Backend\BackendInterface $carddavBackend, $principalUri)
    {
    }
    /**
     * Returns the name of this object.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Updates the name of this object.
     *
     * @param string $name
     */
    public function setName($name)
    {
    }
    /**
     * Deletes this object.
     */
    public function delete()
    {
    }
    /**
     * Returns the last modification date.
     *
     * @return int
     */
    public function getLastModified()
    {
    }
    /**
     * Creates a new file under this object.
     *
     * This is currently not allowed
     *
     * @param string   $filename
     * @param resource $data
     */
    public function createFile($filename, $data = null)
    {
    }
    /**
     * Creates a new directory under this object.
     *
     * This is currently not allowed.
     *
     * @param string $filename
     */
    public function createDirectory($filename)
    {
    }
    /**
     * Returns a single addressbook, by name.
     *
     * @param string $name
     *
     * @todo needs optimizing
     *
     * @return AddressBook
     */
    public function getChild($name)
    {
    }
    /**
     * Returns a list of addressbooks.
     *
     * @return array
     */
    public function getChildren()
    {
    }
    /**
     * Creates a new address book.
     *
     * @param string $name
     *
     * @throws DAV\Exception\InvalidResourceType
     */
    public function createExtendedCollection($name, \Sabre\DAV\MkCol $mkCol)
    {
    }
    /**
     * Returns the owner principal.
     *
     * This must be a url to a principal, or null if there's no owner
     *
     * @return string|null
     */
    public function getOwner()
    {
    }
}