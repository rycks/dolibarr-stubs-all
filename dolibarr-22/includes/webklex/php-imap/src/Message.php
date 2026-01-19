<?php

namespace Webklex\PHPIMAP;

/**
 * Class Message
 *
 * @package Webklex\PHPIMAP
 *
 * @property integer msglist
 * @property integer uid
 * @property integer msgn
 * @property Attribute subject
 * @property Attribute message_id
 * @property Attribute message_no
 * @property Attribute references
 * @property Attribute date
 * @property Attribute from
 * @property Attribute to
 * @property Attribute cc
 * @property Attribute bcc
 * @property Attribute reply_to
 * @property Attribute in_reply_to
 * @property Attribute sender
 *
 * @method integer getMsglist()
 * @method integer setMsglist($msglist)
 * @method integer getUid()
 * @method integer getMsgn()
 * @method Attribute getPriority()
 * @method Attribute getSubject()
 * @method Attribute getMessageId()
 * @method Attribute getMessageNo()
 * @method Attribute getReferences()
 * @method Attribute getDate()
 * @method Attribute getFrom()
 * @method Attribute getTo()
 * @method Attribute getCc()
 * @method Attribute getBcc()
 * @method Attribute getReplyTo()
 * @method Attribute getInReplyTo()
 * @method Attribute getSender()
 */
class Message
{
    use \Webklex\PHPIMAP\Traits\HasEvents;
    /**
     * Client instance
     *
     * @var Client
     */
    private $client = \Webklex\PHPIMAP\Client::class;
    /**
     * Default mask
     *
     * @var string $mask
     */
    protected $mask = \Webklex\PHPIMAP\Support\Masks\MessageMask::class;
    /**
     * Used config
     *
     * @var array $config
     */
    protected $config = [];
    /**
     * Attribute holder
     *
     * @var Attribute[]|mixed[] $attributes
     */
    protected $attributes = [];
    /**
     * The message folder path
     *
     * @var string $folder_path
     */
    protected $folder_path;
    /**
     * Fetch body options
     *
     * @var integer
     */
    public $fetch_options = null;
    /**
     * @var integer
     */
    protected $sequence = \Webklex\PHPIMAP\IMAP::NIL;
    /**
     * Fetch body options
     *
     * @var bool
     */
    public $fetch_body = null;
    /**
     * Fetch flags options
     *
     * @var bool
     */
    public $fetch_flags = null;
    /**
     * @var Header $header
     */
    public $header = null;
    /**
     * Raw message body
     *
     * @var null|string $raw_body
     */
    public $raw_body = null;
    /**
     * Message structure
     *
     * @var Structure $structure
     */
    protected $structure = null;
    /**
     * Message body components
     *
     * @var array   $bodies
     */
    public $bodies = [];
    /** @var AttachmentCollection $attachments */
    public $attachments;
    /** @var FlagCollection $flags */
    public $flags;
    /**
     * A list of all available and supported flags
     *
     * @var array $available_flags
     */
    private $available_flags = null;
    /**
     * Message constructor.
     * @param integer $uid
     * @param integer|null $msglist
     * @param Client $client
     * @param integer|null $fetch_options
     * @param boolean $fetch_body
     * @param boolean $fetch_flags
     * @param integer $sequence
     *
     * @throws Exceptions\ConnectionFailedException
     * @throws InvalidMessageDateException
     * @throws Exceptions\RuntimeException
     * @throws MessageHeaderFetchingException
     * @throws MessageContentFetchingException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\MessageNotFoundException
     */
    public function __construct($uid, $msglist, \Webklex\PHPIMAP\Client $client, $fetch_options = null, $fetch_body = false, $fetch_flags = false, $sequence = null)
    {
    }
    /**
     * Create a new instance without fetching the message header and providing them raw instead
     * @param int $uid
     * @param int|null $msglist
     * @param Client $client
     * @param string $raw_header
     * @param string $raw_body
     * @param array $raw_flags
     * @param null $fetch_options
     * @param null $sequence
     *
     * @return Message
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws ReflectionException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     * @throws Exceptions\MessageNotFoundException
     */
    public static function make($uid, $msglist, \Webklex\PHPIMAP\Client $client, $raw_header, $raw_body, $raw_flags, $fetch_options = null, $sequence = null)
    {
    }
    /**
     * Boot a new instance
     */
    public function boot()
    {
    }
    /**
     * Call dynamic attribute setter and getter methods
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     * @throws MethodNotFoundException
     */
    public function __call($method, $arguments)
    {
    }
    /**
     * Magic setter
     * @param $name
     * @param $value
     *
     * @return mixed
     */
    public function __set($name, $value)
    {
    }
    /**
     * Magic getter
     * @param $name
     *
     * @return Attribute|mixed|null
     */
    public function __get($name)
    {
    }
    /**
     * Get an available message or message header attribute
     * @param $name
     *
     * @return Attribute|mixed|null
     */
    public function get($name)
    {
    }
    /**
     * Check if the Message has a text body
     *
     * @return bool
     */
    public function hasTextBody()
    {
    }
    /**
     * Get the Message text body
     *
     * @return mixed
     */
    public function getTextBody()
    {
    }
    /**
     * Check if the Message has a html body
     *
     * @return bool
     */
    public function hasHTMLBody()
    {
    }
    /**
     * Get the Message html body
     *
     * @return string|null
     */
    public function getHTMLBody()
    {
    }
    /**
     * Parse all defined headers
     *
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     * @throws InvalidMessageDateException
     * @throws MessageHeaderFetchingException
     */
    private function parseHeader()
    {
    }
    /**
     * @param string $raw_header
     *
     * @throws InvalidMessageDateException
     */
    public function parseRawHeader($raw_header)
    {
    }
    /**
     * Parse additional raw flags
     * @param array $raw_flags
     */
    public function parseRawFlags($raw_flags)
    {
    }
    /**
     * Parse additional flags
     *
     * @return void
     * @throws Exceptions\ConnectionFailedException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     */
    private function parseFlags()
    {
    }
    /**
     * Parse the Message body
     *
     * @return $this
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\MessageContentFetchingException
     * @throws InvalidMessageDateException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     */
    public function parseBody()
    {
    }
    /**
     * Handle auto "Seen" flag handling
     *
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     */
    public function peek()
    {
    }
    /**
     * Parse a given message body
     * @param string $raw_body
     *
     * @return $this
     * @throws Exceptions\ConnectionFailedException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function parseRawBody($raw_body)
    {
    }
    /**
     * Fetch the Message structure
     * @param Structure $structure
     *
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    private function fetchStructure($structure)
    {
    }
    /**
     * Fetch a given part
     * @param Part $part
     */
    private function fetchPart(\Webklex\PHPIMAP\Part $part)
    {
    }
    /**
     * Fetch the Message attachment
     * @param Part $part
     */
    protected function fetchAttachment($part)
    {
    }
    /**
     * Fail proof setter for $fetch_option
     * @param $option
     *
     * @return $this
     */
    public function setFetchOption($option)
    {
    }
    /**
     * Set the sequence type
     * @param int $sequence
     *
     * @return $this
     */
    public function setSequence($sequence)
    {
    }
    /**
     * Fail proof setter for $fetch_body
     * @param $option
     *
     * @return $this
     */
    public function setFetchBodyOption($option)
    {
    }
    /**
     * Fail proof setter for $fetch_flags
     * @param $option
     *
     * @return $this
     */
    public function setFetchFlagsOption($option)
    {
    }
    /**
     * Decode a given string
     * @param $string
     * @param $encoding
     *
     * @return string
     */
    public function decodeString($string, $encoding)
    {
    }
    /**
     * Convert the encoding
     * @param $str
     * @param string $from
     * @param string $to
     *
     * @return mixed|string
     */
    public function convertEncoding($str, $from = "ISO-8859-2", $to = "UTF-8")
    {
    }
    /**
     * Get the encoding of a given abject
     * @param object|string $structure
     *
     * @return string
     */
    public function getEncoding($structure)
    {
    }
    /**
     * Get the messages folder
     *
     * @return mixed
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\FolderFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function getFolder()
    {
    }
    /**
     * Create a message thread based on the current message
     * @param Folder|null $sent_folder
     * @param MessageCollection|null $thread
     * @param Folder|null $folder
     *
     * @return MessageCollection|null
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\FolderFetchingException
     * @throws Exceptions\GetMessagesFailedException
     * @throws Exceptions\RuntimeException
     */
    public function thread($sent_folder = null, &$thread = null, $folder = null)
    {
    }
    /**
     * Fetch a partial thread by message id
     * @param MessageCollection $thread
     * @param string $in_reply_to
     * @param Folder $primary_folder
     * @param Folder $secondary_folder
     * @param Folder $sent_folder
     *
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\GetMessagesFailedException
     * @throws Exceptions\RuntimeException
     */
    protected function fetchThreadByInReplyTo(&$thread, $in_reply_to, $primary_folder, $secondary_folder, $sent_folder)
    {
    }
    /**
     * Fetch a partial thread by message id
     * @param MessageCollection $thread
     * @param string $message_id
     * @param Folder $primary_folder
     * @param Folder $secondary_folder
     * @param Folder $sent_folder
     *
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\GetMessagesFailedException
     * @throws Exceptions\RuntimeException
     */
    protected function fetchThreadByMessageId(&$thread, $message_id, $primary_folder, $secondary_folder, $sent_folder)
    {
    }
    /**
     * Copy the current Messages to a mailbox
     * @param string $folder_path
     * @param boolean $expunge
     *
     * @return null|Message
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\FolderFetchingException
     * @throws Exceptions\RuntimeException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws MessageHeaderFetchingException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\MessageNotFoundException
     */
    public function copy($folder_path, $expunge = false)
    {
    }
    /**
     * Move the current Messages to a mailbox
     * @param string $folder_path
     * @param boolean $expunge
     *
     * @return Message|null
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\FolderFetchingException
     * @throws Exceptions\RuntimeException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws MessageHeaderFetchingException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\MessageNotFoundException
     */
    public function move($folder_path, $expunge = false)
    {
    }
    /**
     * Fetch a new message and fire a given event
     * @param Folder $folder
     * @param int $next_uid
     * @param string $event
     * @param boolean $expunge
     *
     * @return mixed
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws Exceptions\MessageNotFoundException
     * @throws Exceptions\RuntimeException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws MessageFlagException
     * @throws MessageHeaderFetchingException
     */
    protected function fetchNewMail($folder, $next_uid, $event, $expunge)
    {
    }
    /**
     * Delete the current Message
     * @param bool $expunge
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     */
    public function delete($expunge = true)
    {
    }
    /**
     * Restore a deleted Message
     * @param boolean $expunge
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     */
    public function restore($expunge = true)
    {
    }
    /**
     * Set a given flag
     * @param string|array $flag
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws MessageFlagException
     * @throws Exceptions\EventNotFoundException
     * @throws Exceptions\RuntimeException
     */
    public function setFlag($flag)
    {
    }
    /**
     * Unset a given flag
     * @param string|array $flag
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     */
    public function unsetFlag($flag)
    {
    }
    /**
     * Set a given flag
     * @param string|array $flag
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws MessageFlagException
     * @throws Exceptions\EventNotFoundException
     * @throws Exceptions\RuntimeException
     */
    public function addFlag($flag)
    {
    }
    /**
     * Unset a given flag
     * @param string|array $flag
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws MessageFlagException
     * @throws Exceptions\RuntimeException
     */
    public function removeFlag($flag)
    {
    }
    /**
     * Get all message attachments.
     *
     * @return AttachmentCollection
     */
    public function getAttachments()
    {
    }
    /**
     * Get all message attachments.
     *
     * @return AttachmentCollection
     */
    public function attachments()
    {
    }
    /**
     * Checks if there are any attachments present
     *
     * @return boolean
     */
    public function hasAttachments()
    {
    }
    /**
     * Get the raw body
     *
     * @return string
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function getRawBody()
    {
    }
    /**
     * Get the message header
     *
     * @return Header
     */
    public function getHeader()
    {
    }
    /**
     * Get the current client
     *
     * @return Client
     */
    public function getClient()
    {
    }
    /**
     * Get the used fetch option
     *
     * @return integer
     */
    public function getFetchOptions()
    {
    }
    /**
     * Get the used fetch body option
     *
     * @return boolean
     */
    public function getFetchBodyOption()
    {
    }
    /**
     * Get the used fetch flags option
     *
     * @return boolean
     */
    public function getFetchFlagsOption()
    {
    }
    /**
     * Get all available bodies
     *
     * @return array
     */
    public function getBodies()
    {
    }
    /**
     * Get all set flags
     *
     * @return FlagCollection
     */
    public function getFlags()
    {
    }
    /**
     * Get all set flags
     *
     * @return FlagCollection
     */
    public function flags()
    {
    }
    /**
     * Get the fetched structure
     *
     * @return Structure|null
     */
    public function getStructure()
    {
    }
    /**
     * Check if a message matches an other by comparing basic attributes
     *
     * @param  null|Message $message
     * @return boolean
     */
    public function is(\Webklex\PHPIMAP\Message $message = null)
    {
    }
    /**
     * Get all message attributes
     *
     * @return array
     */
    public function getAttributes()
    {
    }
    /**
     * Set the message mask
     * @param $mask
     *
     * @return $this
     */
    public function setMask($mask)
    {
    }
    /**
     * Get the used message mask
     *
     * @return string
     */
    public function getMask()
    {
    }
    /**
     * Get a masked instance by providing a mask name
     * @param string|null $mask
     *
     * @return mixed
     * @throws MaskNotFoundException
     */
    public function mask($mask = null)
    {
    }
    /**
     * Get the message path aka folder path
     *
     * @return string
     */
    public function getFolderPath()
    {
    }
    /**
     * Set the message path aka folder path
     * @param $folder_path
     *
     * @return $this
     */
    public function setFolderPath($folder_path)
    {
    }
    /**
     * Set the config
     * @param $config
     *
     * @return $this
     */
    public function setConfig($config)
    {
    }
    /**
     * Set the available flags
     * @param $available_flags
     *
     * @return $this
     */
    public function setAvailableFlags($available_flags)
    {
    }
    /**
     * Set the attachment collection
     * @param $attachments
     *
     * @return $this
     */
    public function setAttachments($attachments)
    {
    }
    /**
     * Set the flag collection
     * @param $flags
     *
     * @return $this
     */
    public function setFlags($flags)
    {
    }
    /**
     * Set the client
     * @param $client
     *
     * @return $this
     * @throws Exceptions\RuntimeException
     * @throws Exceptions\ConnectionFailedException
     */
    public function setClient($client)
    {
    }
    /**
     * Set the message number
     * @param int $uid
     *
     * @return $this
     * @throws Exceptions\MessageNotFoundException
     * @throws Exceptions\ConnectionFailedException
     */
    public function setUid($uid)
    {
    }
    /**
     * Set the message number
     * @param $msgn
     * @param int|null $msglist
     *
     * @return $this
     * @throws Exceptions\MessageNotFoundException
     * @throws Exceptions\ConnectionFailedException
     */
    public function setMsgn($msgn, $msglist = null)
    {
    }
    /**
     * Get the current sequence type
     *
     * @return int
     */
    public function getSequence()
    {
    }
    /**
     * Set the sequence type
     *
     * @return int
     */
    public function getSequenceId()
    {
    }
    /**
     * Set the sequence id
     * @param $uid
     * @param int|null $msglist
     *
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\MessageNotFoundException
     */
    public function setSequenceId($uid, $msglist = null)
    {
    }
}