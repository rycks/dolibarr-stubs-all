<?php

namespace Sabre\CardDAV;

/**
 * The Card object represents a single Card from an addressbook.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Card extends \Sabre\DAV\File implements \Sabre\CardDAV\ICard, \Sabre\DAVACL\IACL
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * CardDAV backend.
     *
     * @var Backend\BackendInterface
     */
    protected $carddavBackend;
    /**
     * Array with information about this Card.
     *
     * @var array
     */
    protected $cardData;
    /**
     * Array with information about the containing addressbook.
     *
     * @var array
     */
    protected $addressBookInfo;
    /**
     * Constructor.
     */
    public function __construct(\Sabre\CardDAV\Backend\BackendInterface $carddavBackend, array $addressBookInfo, array $cardData)
    {
    }
    /**
     * Returns the uri for this object.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Returns the VCard-formatted object.
     *
     * @return string
     */
    public function get()
    {
    }
    /**
     * Updates the VCard-formatted object.
     *
     * @param string $cardData
     *
     * @return string|null
     */
    public function put($cardData)
    {
    }
    /**
     * Deletes the card.
     */
    public function delete()
    {
    }
    /**
     * Returns the mime content-type.
     *
     * @return string
     */
    public function getContentType()
    {
    }
    /**
     * Returns an ETag for this object.
     *
     * @return string
     */
    public function getETag()
    {
    }
    /**
     * Returns the last modification date as a unix timestamp.
     *
     * @return int
     */
    public function getLastModified()
    {
    }
    /**
     * Returns the size of this object in bytes.
     *
     * @return int
     */
    public function getSize()
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
    public function getACL()
    {
    }
}