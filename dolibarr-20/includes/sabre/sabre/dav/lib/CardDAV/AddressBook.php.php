<?php

namespace Sabre\CardDAV;

/**
 * The AddressBook class represents a CardDAV addressbook, owned by a specific user.
 *
 * The AddressBook can contain multiple vcards
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AddressBook extends \Sabre\DAV\Collection implements \Sabre\CardDAV\IAddressBook, \Sabre\DAV\IProperties, \Sabre\DAVACL\IACL, \Sabre\DAV\Sync\ISyncCollection, \Sabre\DAV\IMultiGet
{
    use \Sabre\DAVACL\ACLTrait;
    /**
     * This is an array with addressbook information.
     *
     * @var array
     */
    protected $addressBookInfo;
    /**
     * CardDAV backend.
     *
     * @var Backend\BackendInterface
     */
    protected $carddavBackend;
    /**
     * Constructor.
     */
    public function __construct(\Sabre\CardDAV\Backend\BackendInterface $carddavBackend, array $addressBookInfo)
    {
    }
    /**
     * Returns the name of the addressbook.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Returns a card.
     *
     * @param string $name
     *
     * @return Card
     */
    public function getChild($name)
    {
    }
    /**
     * Returns the full list of cards.
     *
     * @return array
     */
    public function getChildren()
    {
    }
    /**
     * This method receives a list of paths in it's first argument.
     * It must return an array with Node objects.
     *
     * If any children are not found, you do not have to return them.
     *
     * @param string[] $paths
     *
     * @return array
     */
    public function getMultipleChildren(array $paths)
    {
    }
    /**
     * Creates a new directory.
     *
     * We actually block this, as subdirectories are not allowed in addressbooks.
     *
     * @param string $name
     */
    public function createDirectory($name)
    {
    }
    /**
     * Creates a new file.
     *
     * The contents of the new file must be a valid VCARD.
     *
     * This method may return an ETag.
     *
     * @param string   $name
     * @param resource $data
     *
     * @return string|null
     */
    public function createFile($name, $data = null)
    {
    }
    /**
     * Deletes the entire addressbook.
     */
    public function delete()
    {
    }
    /**
     * Renames the addressbook.
     *
     * @param string $newName
     */
    public function setName($newName)
    {
    }
    /**
     * Returns the last modification date as a unix timestamp.
     */
    public function getLastModified()
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
     */
    public function propPatch(\Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * Returns a list of properties for this nodes.
     *
     * The properties list is a list of propertynames the client requested,
     * encoded in clark-notation {xmlnamespace}tagname
     *
     * If the array is empty, it means 'all properties' were requested.
     *
     * @param array $properties
     *
     * @return array
     */
    public function getProperties($properties)
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
     * This method returns the ACL's for card nodes in this address book.
     * The result of this method automatically gets passed to the
     * card nodes in this address book.
     *
     * @return array
     */
    public function getChildACL()
    {
    }
    /**
     * This method returns the current sync-token for this collection.
     * This can be any string.
     *
     * If null is returned from this function, the plugin assumes there's no
     * sync information available.
     *
     * @return string|null
     */
    public function getSyncToken()
    {
    }
    /**
     * The getChanges method returns all the changes that have happened, since
     * the specified syncToken and the current collection.
     *
     * This function should return an array, such as the following:
     *
     * [
     *   'syncToken' => 'The current synctoken',
     *   'added'   => [
     *      'new.txt',
     *   ],
     *   'modified'   => [
     *      'modified.txt',
     *   ],
     *   'deleted' => [
     *      'foo.php.bak',
     *      'old.txt'
     *   ]
     * ];
     *
     * The syncToken property should reflect the *current* syncToken of the
     * collection, as reported getSyncToken(). This is needed here too, to
     * ensure the operation is atomic.
     *
     * If the syncToken is specified as null, this is an initial sync, and all
     * members should be reported.
     *
     * The modified property is an array of nodenames that have changed since
     * the last token.
     *
     * The deleted property is an array with nodenames, that have been deleted
     * from collection.
     *
     * The second argument is basically the 'depth' of the report. If it's 1,
     * you only have to report changes that happened only directly in immediate
     * descendants. If it's 2, it should also include changes from the nodes
     * below the child collections. (grandchildren)
     *
     * The third (optional) argument allows a client to specify how many
     * results should be returned at most. If the limit is not specified, it
     * should be treated as infinite.
     *
     * If the limit (infinite or not) is higher than you're willing to return,
     * you should throw a Sabre\DAV\Exception\TooMuchMatches() exception.
     *
     * If the syncToken is expired (due to data cleanup) or unknown, you must
     * return null.
     *
     * The limit is 'suggestive'. You are free to ignore it.
     *
     * @param string $syncToken
     * @param int    $syncLevel
     * @param int    $limit
     *
     * @return array|null
     */
    public function getChanges($syncToken, $syncLevel, $limit = null)
    {
    }
}