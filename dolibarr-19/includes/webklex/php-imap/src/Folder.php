<?php

namespace Webklex\PHPIMAP;

/**
 * Class Folder
 *
 * @package Webklex\PHPIMAP
 */
class Folder
{
    use \Webklex\PHPIMAP\Traits\HasEvents;
    /**
     * Client instance
     *
     * @var Client
     */
    protected $client;
    /**
     * Folder full path
     *
     * @var string
     */
    public $path;
    /**
     * Folder name
     *
     * @var string
     */
    public $name;
    /**
     * Folder fullname
     *
     * @var string
     */
    public $full_name;
    /**
     * Children folders
     *
     * @var FolderCollection|array
     */
    public $children = [];
    /**
     * Delimiter for folder
     *
     * @var string
     */
    public $delimiter;
    /**
     * Indicates if folder can't containg any "children".
     * CreateFolder won't work on this folder.
     *
     * @var boolean
     */
    public $no_inferiors;
    /**
     * Indicates if folder is only container, not a mailbox - you can't open it.
     *
     * @var boolean
     */
    public $no_select;
    /**
     * Indicates if folder is marked. This means that it may contain new messages since the last time it was checked.
     * Not provided by all IMAP servers.
     *
     * @var boolean
     */
    public $marked;
    /**
     * Indicates if folder containg any "children".
     * Not provided by all IMAP servers.
     *
     * @var boolean
     */
    public $has_children;
    /**
     * Indicates if folder refers to other.
     * Not provided by all IMAP servers.
     *
     * @var boolean
     */
    public $referral;
    /**
     * Folder constructor.
     * @param Client $client
     * @param string $folder_name
     * @param string $delimiter
     * @param string[] $attributes
     */
    public function __construct(\Webklex\PHPIMAP\Client $client, $folder_name, $delimiter, $attributes)
    {
    }
    /**
     * Get a new search query instance
     * @param string $charset
     *
     * @return WhereQuery
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function query($charset = 'UTF-8')
    {
    }
    /**
     * @inheritdoc self::query($charset = 'UTF-8')
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function search($charset = 'UTF-8')
    {
    }
    /**
     * @inheritdoc self::query($charset = 'UTF-8')
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function messages($charset = 'UTF-8')
    {
    }
    /**
     * Determine if folder has children.
     *
     * @return bool
     */
    public function hasChildren()
    {
    }
    /**
     * Set children.
     * @param FolderCollection|array $children
     *
     * @return self
     */
    public function setChildren($children = [])
    {
    }
    /**
     * Decode name.
     * It converts UTF7-IMAP encoding to UTF-8.
     * @param $name
     *
     * @return mixed|string
     */
    protected function decodeName($name)
    {
    }
    /**
     * Get simple name (without parent folders).
     * @param $delimiter
     * @param $full_name
     *
     * @return mixed
     */
    protected function getSimpleName($delimiter, $full_name)
    {
    }
    /**
     * Parse attributes and set it to object properties.
     * @param $attributes
     */
    protected function parseAttributes($attributes)
    {
    }
    /**
     * Move or rename the current folder
     * @param string $new_name
     * @param boolean $expunge
     *
     * @return bool
     * @throws ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws Exceptions\FolderFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function move($new_name, $expunge = true)
    {
    }
    /**
     * Get a message overview
     * @param string|null $sequence uid sequence
     *
     * @return array
     * @throws ConnectionFailedException
     * @throws Exceptions\InvalidMessageDateException
     * @throws Exceptions\MessageNotFoundException
     * @throws Exceptions\RuntimeException
     */
    public function overview($sequence = null)
    {
    }
    /**
     * Append a string message to the current mailbox
     * @param string $message
     * @param string $options
     * @param string $internal_date
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function appendMessage($message, $options = null, $internal_date = null)
    {
    }
    /**
     * Rename the current folder
     * @param string $new_name
     * @param boolean $expunge
     *
     * @return bool
     * @throws ConnectionFailedException
     * @throws Exceptions\EventNotFoundException
     * @throws Exceptions\FolderFetchingException
     * @throws Exceptions\RuntimeException
     */
    public function rename($new_name, $expunge = true)
    {
    }
    /**
     * Delete the current folder
     * @param boolean $expunge
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     * @throws Exceptions\EventNotFoundException
     */
    public function delete($expunge = true)
    {
    }
    /**
     * Subscribe the current folder
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function subscribe()
    {
    }
    /**
     * Unsubscribe the current folder
     *
     * @return bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function unsubscribe()
    {
    }
    /**
     * Idle the current connection
     * @param callable $callback
     * @param integer $timeout max 1740 seconds - recommended by rfc2177 §3
     * @param boolean $auto_reconnect try to reconnect on connection close
     *
     * @throws ConnectionFailedException
     * @throws Exceptions\InvalidMessageDateException
     * @throws Exceptions\MessageContentFetchingException
     * @throws Exceptions\MessageHeaderFetchingException
     * @throws Exceptions\RuntimeException
     * @throws Exceptions\EventNotFoundException
     * @throws Exceptions\MessageFlagException
     * @throws Exceptions\MessageNotFoundException
     */
    public function idle(callable $callback, $timeout = 1200, $auto_reconnect = false)
    {
    }
    /**
     * Get folder status information
     *
     * @return array|bool
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function getStatus()
    {
    }
    /**
     * Examine the current folder
     *
     * @return array
     * @throws Exceptions\ConnectionFailedException
     * @throws Exceptions\RuntimeException
     */
    public function examine()
    {
    }
    /**
     * Get the current Client instance
     *
     * @return Client
     */
    public function getClient()
    {
    }
    /**
     * Set the delimiter
     * @param $delimiter
     */
    public function setDelimiter($delimiter)
    {
    }
}