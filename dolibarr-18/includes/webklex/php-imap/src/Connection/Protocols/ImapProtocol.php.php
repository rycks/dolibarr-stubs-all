<?php

namespace Webklex\PHPIMAP\Connection\Protocols;

/**
 * Class ImapProtocol
 *
 * @package Webklex\PHPIMAP\Connection\Protocols
 */
class ImapProtocol extends \Webklex\PHPIMAP\Connection\Protocols\Protocol
{
    /**
     * Request noun
     * @var int
     */
    protected $noun = 0;
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
     * Open connection to IMAP server
     * @param string $host hostname or IP address of IMAP server
     * @param int|null $port of IMAP server, default is 143 and 993 for ssl
     *
     * @throws ConnectionFailedException
     */
    public function connect($host, $port = null)
    {
    }
    /**
     * Enable tls on the current connection
     *
     * @throws ConnectionFailedException
     * @throws RuntimeException
     */
    protected function enableTls()
    {
    }
    /**
     * Get the next line from stream
     *
     * @return string next line
     * @throws RuntimeException
     */
    public function nextLine()
    {
    }
    /**
     * Get the next line and check if it starts with a given string
     * @param string $start
     *
     * @return bool
     * @throws RuntimeException
     */
    protected function assumedNextLine($start)
    {
    }
    /**
     * Get the next line and split the tag
     * @param string $tag reference tag
     *
     * @return string next line
     * @throws RuntimeException
     */
    protected function nextTaggedLine(&$tag)
    {
    }
    /**
     * Split a given line in values. A value is literal of any form or a list
     * @param string $line
     *
     * @return array
     * @throws RuntimeException
     */
    protected function decodeLine($line)
    {
    }
    /**
     * Read abd decode a response "line"
     * @param array|string $tokens to decode
     * @param string $wantedTag targeted tag
     * @param bool $dontParse if true only the unparsed line is returned in $tokens
     *
     * @return bool
     * @throws RuntimeException
     */
    public function readLine(&$tokens = [], $wantedTag = '*', $dontParse = false)
    {
    }
    /**
     * Read all lines of response until given tag is found
     * @param string $tag request tag
     * @param bool $dontParse if true every line is returned unparsed instead of the decoded tokens
     *
     * @return void|null|bool|array tokens if success, false if error, null if bad request
     * @throws RuntimeException
     */
    public function readResponse($tag, $dontParse = false)
    {
    }
    /**
     * Send a new request
     * @param string $command
     * @param array $tokens additional parameters to command, use escapeString() to prepare
     * @param string $tag provide a tag otherwise an autogenerated is returned
     *
     * @throws RuntimeException
     */
    public function sendRequest($command, $tokens = [], &$tag = null)
    {
    }
    /**
     * Send a request and get response at once
     * @param string $command
     * @param array $tokens parameters as in sendRequest()
     * @param bool $dontParse if true unparsed lines are returned instead of tokens
     *
     * @return void|null|bool|array response as in readResponse()
     * @throws RuntimeException
     */
    public function requestAndResponse($command, $tokens = [], $dontParse = false)
    {
    }
    /**
     * Escape one or more literals i.e. for sendRequest
     * @param string|array $string the literal/-s
     *
     * @return string|array escape literals, literals with newline ar returned
     *                      as array('{size}', 'string');
     */
    public function escapeString($string)
    {
    }
    /**
     * Escape a list with literals or lists
     * @param array $list list with literals or lists as PHP array
     *
     * @return string escaped list for imap
     */
    public function escapeList($list)
    {
    }
    /**
     * Login to a new session.
     * @param string $user username
     * @param string $password password
     *
     * @return bool|mixed
     * @throws AuthFailedException
     */
    public function login($user, $password)
    {
    }
    /**
     * Authenticate your current IMAP session.
     * @param string $user username
     * @param string $token access token
     *
     * @return bool
     * @throws AuthFailedException
     */
    public function authenticate($user, $token)
    {
    }
    /**
     * Logout of imap server
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
     * @return array list of capabilities
     * @throws RuntimeException
     */
    public function getCapabilities()
    {
    }
    /**
     * Examine and select have the same response.
     * @param string $command can be 'EXAMINE' or 'SELECT'
     * @param string $folder target folder
     *
     * @return bool|array
     * @throws RuntimeException
     */
    public function examineOrSelect($command = 'EXAMINE', $folder = 'INBOX')
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
     * @return bool|array see examineOrselect()
     * @throws RuntimeException
     */
    public function examineFolder($folder = 'INBOX')
    {
    }
    /**
     * Fetch one or more items of one or more messages
     * @param string|array $items items to fetch [RFC822.HEADER, FLAGS, RFC822.TEXT, etc]
     * @param int|array $from message for items or start message if $to !== null
     * @param int|null $to if null only one message ($from) is fetched, else it's the
     *                             last message, INF means last message available
     * @param bool $uid set to true if passing a unique id
     *
     * @return string|array if only one item of one message is fetched it's returned as string
     *                      if items of one message are fetched it's returned as (name => value)
     *                      if one items of messages are fetched it's returned as (msgno => value)
     *                      if items of messages are fetched it's returned as (msgno => (name => value))
     * @throws RuntimeException
     */
    protected function fetch($items, $from, $to = null, $uid = false)
    {
    }
    /**
     * Fetch message headers
     * @param array|int $uids
     * @param string $rfc
     * @param bool $uid set to true if passing a unique id
     *
     * @return array
     * @throws RuntimeException
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
     * @throws RuntimeException
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
     * @throws RuntimeException
     */
    public function flags($uids, $uid = false)
    {
    }
    /**
     * Get uid for a given id
     * @param int|null $id message number
     *
     * @return array|string message number for given message or all messages as array
     * @throws MessageNotFoundException
     */
    public function getUid($id = null)
    {
    }
    /**
     * Get a message number for a uid
     * @param string $id uid
     *
     * @return int message number
     * @throws MessageNotFoundException
     */
    public function getMessageNumber($id)
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
     * @throws RuntimeException
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
     * @throws RuntimeException
     */
    public function appendMessage($folder, $message, $flags = null, $date = null)
    {
    }
    /**
     * Copy a message set from current folder to an other folder
     * @param string $folder destination folder
     * @param $from
     * @param int|null $to if null only one message ($from) is fetched, else it's the
     *                         last message, INF means last message available
     * @param bool $uid set to true if passing a unique id
     *
     * @return bool success
     * @throws RuntimeException
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
     *
     * @throws RuntimeException
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
     * @throws RuntimeException
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
     *
     * @throws RuntimeException
     */
    public function moveManyMessages($messages, $folder, $uid = false)
    {
    }
    /**
     * Create a new folder (and parent folders if needed)
     * @param string $folder folder name
     *
     * @return bool success
     * @throws RuntimeException
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
     * @throws RuntimeException
     */
    public function renameFolder($old, $new)
    {
    }
    /**
     * Delete a folder
     * @param string $folder folder name
     *
     * @return bool success
     * @throws RuntimeException
     */
    public function deleteFolder($folder)
    {
    }
    /**
     * Subscribe to a folder
     * @param string $folder folder name
     *
     * @return bool success
     * @throws RuntimeException
     */
    public function subscribeFolder($folder)
    {
    }
    /**
     * Unsubscribe from a folder
     * @param string $folder folder name
     *
     * @return bool success
     * @throws RuntimeException
     */
    public function unsubscribeFolder($folder)
    {
    }
    /**
     * Apply session saved changes to the server
     *
     * @return bool success
     * @throws RuntimeException
     */
    public function expunge()
    {
    }
    /**
     * Send noop command
     *
     * @return bool success
     * @throws RuntimeException
     */
    public function noop()
    {
    }
    /**
     * Retrieve the quota level settings, and usage statics per mailbox
     * @param $username
     *
     * @return array
     * @throws RuntimeException
     */
    public function getQuota($username)
    {
    }
    /**
     * Retrieve the quota settings per user
     * @param string $quota_root
     *
     * @return array
     * @throws RuntimeException
     */
    public function getQuotaRoot($quota_root = 'INBOX')
    {
    }
    /**
     * Send idle command
     *
     * @throws RuntimeException
     */
    public function idle()
    {
    }
    /**
     * Send done command
     * @throws RuntimeException
     */
    public function done()
    {
    }
    /**
     * Search for matching messages
     * @param array $params
     * @param bool $uid set to true if passing a unique id
     *
     * @return array message ids
     * @throws RuntimeException
     */
    public function search(array $params, $uid = false)
    {
    }
    /**
     * Get a message overview
     * @param string $sequence
     * @param bool $uid set to true if passing a unique id
     *
     * @return array
     * @throws RuntimeException
     * @throws MessageNotFoundException
     * @throws InvalidMessageDateException
     */
    public function overview($sequence, $uid = false)
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
}