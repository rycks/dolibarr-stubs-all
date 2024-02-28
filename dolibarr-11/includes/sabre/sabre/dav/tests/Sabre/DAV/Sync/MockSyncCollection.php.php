<?php

namespace Sabre\DAV\Sync;

/**
 * This mocks a ISyncCollection, for unittesting.
 *
 * This object behaves the same as SimpleCollection. Call addChange to update
 * the 'changelog' that this class uses for the collection.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MockSyncCollection extends \Sabre\DAV\SimpleCollection implements \Sabre\DAV\Sync\ISyncCollection
{
    public $changeLog = [];
    public $token = null;
    /**
     * This method returns the current sync-token for this collection.
     * This can be any string.
     *
     * If null is returned from this function, the plugin assumes there's no
     * sync information available.
     *
     * @return string|null
     */
    function getSyncToken()
    {
    }
    function addChange(array $added, array $modified, array $deleted)
    {
    }
    /**
     * The getChanges method returns all the changes that have happened, since
     * the specified syncToken and the current collection.
     *
     * This function should return an array, such as the following:
     *
     * array(
     *   'syncToken' => 'The current synctoken',
     *   'modified'   => array(
     *      'new.txt',
     *   ),
     *   'deleted' => array(
     *      'foo.php.bak',
     *      'old.txt'
     *   )
     * );
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
     * @param int $syncLevel
     * @param int $limit
     * @return array
     */
    function getChanges($syncToken, $syncLevel, $limit = null)
    {
    }
}