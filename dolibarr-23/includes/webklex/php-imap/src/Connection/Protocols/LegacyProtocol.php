<?php

namespace Webklex\PHPIMAP\Connection\Protocols;

/**
 * Class LegacyProtocol
 *
 * @package Webklex\PHPIMAP\Connection\Protocols
 */
class LegacyProtocol extends \Webklex\PHPIMAP\Connection\Protocols\Protocol
{
    protected $protocol = "imap";
    protected $host = null;
    protected $port = null;
    protected $encryption = null;
    /**
     * Imap constructor.
     * @param bool $cert_validation set to false to skip SSL certificate validation
     * @param mixed $encryption Connection encryption method
     */
    public function __construct($cert_validation = true, $encryption = false)
    {
    }
    /**
     * Public destructor
     */
    public function __destruct()
    {
    }
    /**
     * Save the information for a nw connection
     * @param string $host
     * @param null $port
     */
    public function connect($host, $port = null)
    {
    }
    /**
     * Login to a new session.
     * @param string $user username
     * @param string $password password
     *
     * @return bool
     * @throws AuthFailedException
     * @throws RuntimeException
     */
    public function login($user, $password)
    {
    }
    /**
     * Authenticate your current session.
     * @param string $user username
     * @param string $token access token
     *
     * @return bool|resource
     * @throws AuthFailedException|RuntimeException
     */
    public function authenticate($user, $token)
    {
    }
    /**
     * Get full address of mailbox.
     *
     * @return string
     */
    protected function getAddress()
    {
    }
    /**
     * Logout of the current session
     *
     * @return bool success
     */
    public function logout()
    {
    }
    /**
     * Check if the current session is connected
     *
     * @return bool
     */
    public function connected()
    {
    }
    /**
     * Get an array of available capabilities
     *
     * @throws MethodNotSupportedException
     */
    public function getCapabilities()
    {
    }
    /**
     * Change the current folder
     * @param string $folder change to this folder
     *
     * @return bool|array see examineOrselect()
     * @throws RuntimeException
     */
    public function selectFolder($folder = 'INBOX')
    {
    }
    /**
     * Examine a given folder
     * @param string $folder examine this folder
     *
     * @return bool|array
     * @throws RuntimeException
     */
    public function examineFolder($folder = 'INBOX')
    {
    }
    /**
     * Fetch message content
     * @param array|int $uids
     * @param string $rfc
     * @param bool $uid set to true if passing a unique id
     *
     * @return array
     */
    public function content($uids, $rfc = "RFC822", $uid = false)
    {
    }
    /**
     * Fetch message headers
     * @param array|int $uids
     * @param string $rfc
     * @param bool $uid set to true if passing a unique id
     *
     * @return array
     */
    public function headers($uids, $rfc = "RFC822", $uid = false)
    {
    }
    /**
     * Fetch message flags
     * @param array|int $uids
     * @param bool $uid set to true if passing a unique id
     *
     * @return array
     */
    public function flags($uids, $uid = false)
    {
    }
    /**
     * Get uid for a given id
     * @param int|null $id message number
     *
     * @return array|string message number for given message or all messages as array
     */
    public function getUid($id = null)
    {
    }
    /**
     * Get a message number for a uid
     * @param string $id uid
     *
     * @return int message number
     */
    public function getMessageNumber($id)
    {
    }
    /**
     * Get a message overview
     * @param string $sequence uid sequence
     * @param bool $uid set to true if passing a unique id
     *
     * @return array
     */
    public function overview($sequence, $uid = false)
    {
    }
    /**
     * Get a list of available folders
     * @param string $reference mailbox reference for list
     * @param string $folder mailbox name match with wildcards
     *
     * @return array folders that matched $folder as array(name => array('delimiter' => .., 'flags' => ..))
     * @throws RuntimeException
     */
    public function folders($reference = '', $folder = '*')
    {
    }
    /**
     * Manage flags
     * @param array $flags flags to set, add or remove - see $mode
     * @param int $from message for items or start message if $to !== null
     * @param int|null $to if null only one message ($from) is fetched, else it's the
     *                             last message, INF means last message available
     * @param string|null $mode '+' to add flags, '-' to remove flags, everything else sets the flags as given
     * @param bool $silent if false the return values are the new flags for the wanted messages
     * @param bool $uid set to true if passing a unique id
     *
     * @return bool|array new flags if $silent is false, else true or false depending on success
     */
    public function store(array $flags, $from, $to = null, $mode = null, $silent = true, $uid = false)
    {
    }
    /**
     * Append a new message to given folder
     * @param string $folder name of target folder
     * @param string $message full message content
     * @param array $flags flags for new message
     * @param string $date date for new message
     *
     * @return bool success
     */
    public function appendMessage($folder, $message, $flags = null, $date = null)
    {
    }
    /**
     * Copy message set from current folder to other folder
     * @param string $folder destination folder
     * @param $from
     * @param int|null $to if null only one message ($from) is fetched, else it's the
     *                         last message, INF means last message available
     * @param bool $uid set to true if passing a unique id
     *
     * @return bool success
     */
    public function copyMessage($folder, $from, $to = null, $uid = false)
    {
    }
    /**
     * Copy multiple messages to the target folder
     *
     * @param array<string> $messages List of message identifiers
     * @param string $folder Destination folder
     * @param bool $uid Set to true if you pass message unique identifiers instead of numbers
     * @return array|bool Tokens if operation successful, false if an error occurred
     */
    public function copyManyMessages($messages, $folder, $uid = false)
    {
    }
    /**
     * Move a message set from current folder to an other folder
     * @param string $folder destination folder
     * @param $from
     * @param int|null $to if null only one message ($from) is fetched, else it's the
     *                         last message, INF means last message available
     * @param bool $uid set to true if passing a unique id
     *
     * @return bool success
     */
    public function moveMessage($folder, $from, $to = null, $uid = false)
    {
    }
    /**
     * Move multiple messages to the target folder
     *
     * @param array<string> $messages List of message identifiers
     * @param string $folder Destination folder
     * @param bool $uid Set to true if you pass message unique identifiers instead of numbers
     * @return array|bool Tokens if operation successful, false if an error occurred
     */
    public function moveManyMessages($messages, $folder, $uid = false)
    {
    }
    /**
     * Create a new folder (and parent folders if needed)
     * @param string $folder folder name
     *
     * @return bool success
     */
    public function createFolder($folder)
    {
    }
    /**
     * Rename an existing folder
     * @param string $old old name
     * @param string $new new name
     *
     * @return bool success
     */
    public function renameFolder($old, $new)
    {
    }
    /**
     * Delete a folder
     * @param string $folder folder name
     *
     * @return bool success
     */
    public function deleteFolder($folder)
    {
    }
    /**
     * Subscribe to a folder
     * @param string $folder folder name
     *
     * @throws MethodNotSupportedException
     */
    public function subscribeFolder($folder)
    {
    }
    /**
     * Unsubscribe from a folder
     * @param string $folder folder name
     *
     * @throws MethodNotSupportedException
     */
    public function unsubscribeFolder($folder)
    {
    }
    /**
     * Apply session saved changes to the server
     *
     * @return bool success
     */
    public function expunge()
    {
    }
    /**
     * Send noop command
     *
     * @throws MethodNotSupportedException
     */
    public function noop()
    {
    }
    /**
     * Send idle command
     *
     * @throws MethodNotSupportedException
     */
    public function idle()
    {
    }
    /**
     * Send done command
     *
     * @throws MethodNotSupportedException
     */
    public function done()
    {
    }
    /**
     * Search for matching messages
     *
     * @param array $params
     * @return array message ids
     */
    public function search(array $params, $uid = false)
    {
    }
    /**
     * Enable the debug mode
     */
    public function enableDebug()
    {
    }
    /**
     * Disable the debug mode
     */
    public function disableDebug()
    {
    }
    /**
     * Decode name.
     * It converts UTF7-IMAP encoding to UTF-8.
     *
     * @param $name
     *
     * @return mixed|string
     */
    protected function decodeFolderName($name)
    {
    }
    /**
     * @return string
     */
    public function getProtocol()
    {
    }
    /**
     * Retrieve the quota level settings, and usage statics per mailbox
     * @param $username
     *
     * @return array
     */
    public function getQuota($username)
    {
    }
    /**
     * Retrieve the quota settings per user
     * @param string $quota_root
     *
     * @return array
     */
    public function getQuotaRoot($quota_root = 'INBOX')
    {
    }
    /**
     * @param string $protocol
     * @return LegacyProtocol
     */
    public function setProtocol($protocol)
    {
    }
}