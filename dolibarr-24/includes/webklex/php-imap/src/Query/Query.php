<?php

namespace Webklex\PHPIMAP\Query;

/**
 * Class Query
 *
 * @package Webklex\PHPIMAP\Query
 */
class Query
{
    /** @var Collection $query */
    protected $query;
    /** @var string $raw_query */
    protected $raw_query;
    /** @var string $charset */
    protected $charset;
    /** @var Client $client */
    protected $client;
    /** @var int $limit */
    protected $limit = null;
    /** @var int $page */
    protected $page = 1;
    /** @var int $fetch_options */
    protected $fetch_options = null;
    /** @var int $fetch_body */
    protected $fetch_body = true;
    /** @var int $fetch_flags */
    protected $fetch_flags = true;
    /** @var int $sequence */
    protected $sequence = \Webklex\PHPIMAP\IMAP::NIL;
    /** @var string $fetch_order */
    protected $fetch_order;
    /** @var string $date_format */
    protected $date_format;
    /** @var bool $soft_fail */
    protected $soft_fail = false;
    /** @var array $errors */
    protected $errors = [];
    /**
     * Query constructor.
     * @param Client $client
     * @param string $charset
     */
    public function __construct(\Webklex\PHPIMAP\Client $client, $charset = 'UTF-8')
    {
    }
    /**
     * Instance boot method for additional functionality
     */
    protected function boot()
    {
    }
    /**
     * Parse a given value
     * @param mixed $value
     *
     * @return string
     */
    protected function parse_value($value)
    {
    }
    /**
     * Check if a given date is a valid carbon object and if not try to convert it
     * @param string|Carbon $date
     *
     * @return Carbon
     * @throws MessageSearchValidationException
     */
    protected function parse_date($date)
    {
    }
    /**
     * Get the raw IMAP search query
     *
     * @return string
     */
    public function generate_query()
    {
    }
    /**
     * Perform an imap search request
     *
     * @return Collection
     * @throws GetMessagesFailedException
     */
    protected function search()
    {
    }
    /**
     * Count all available messages matching the current search criteria
     *
     * @return int
     * @throws GetMessagesFailedException
     */
    public function count()
    {
    }
    /**
     * Fetch a given id collection
     * @param Collection $available_messages
     *
     * @return array
     * @throws ConnectionFailedException
     * @throws RuntimeException
     */
    protected function fetch($available_messages)
    {
    }
    /**
     * Make a new message from given raw components
     * @param integer $uid
     * @param integer $msglist
     * @param string $header
     * @param string $content
     * @param array $flags
     *
     * @return Message|null
     * @throws ConnectionFailedException
     * @throws EventNotFoundException
     * @throws GetMessagesFailedException
     * @throws ReflectionException
     */
    protected function make($uid, $msglist, $header, $content, $flags)
    {
    }
    /**
     * Get the message key for a given message
     * @param string $message_key
     * @param integer $msglist
     * @param Message $message
     *
     * @return string
     */
    protected function getMessageKey($message_key, $msglist, $message)
    {
    }
    /**
     * Populate a given id collection and receive a fully fetched message collection
     * @param Collection $available_messages
     *
     * @return MessageCollection
     * @throws ConnectionFailedException
     * @throws EventNotFoundException
     * @throws GetMessagesFailedException
     * @throws ReflectionException
     * @throws RuntimeException
     */
    protected function populate($available_messages)
    {
    }
    /**
     * Fetch the current query and return all found messages
     *
     * @return MessageCollection
     * @throws GetMessagesFailedException
     */
    public function get()
    {
    }
    /**
     * Fetch the current query as chunked requests
     * @param callable $callback
     * @param int $chunk_size
     * @param int $start_chunk
     *
     * @throws ConnectionFailedException
     * @throws EventNotFoundException
     * @throws GetMessagesFailedException
     * @throws ReflectionException
     * @throws RuntimeException
     */
    public function chunked($callback, $chunk_size = 10, $start_chunk = 1)
    {
    }
    /**
     * Paginate the current query
     * @param int $per_page Results you which to receive per page
     * @param int|null $page The current page you are on (e.g. 0, 1, 2, ...) use `null` to enable auto mode
     * @param string $page_name The page name / uri parameter used for the generated links and the auto mode
     *
     * @return LengthAwarePaginator
     * @throws GetMessagesFailedException
     */
    public function paginate($per_page = 5, $page = null, $page_name = 'imap_page')
    {
    }
    /**
     * Get a new Message instance
     * @param int $uid
     * @param int|null $msglist
     * @param int|null $sequence
     *
     * @return Message
     * @throws ConnectionFailedException
     * @throws RuntimeException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws MessageHeaderFetchingException
     * @throws EventNotFoundException
     * @throws MessageFlagException
     * @throws MessageNotFoundException
     */
    public function getMessage($uid, $msglist = null, $sequence = null)
    {
    }
    /**
     * Get a message by its message number
     * @param $msgn
     * @param int|null $msglist
     *
     * @return Message
     * @throws ConnectionFailedException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws MessageHeaderFetchingException
     * @throws RuntimeException
     * @throws EventNotFoundException
     * @throws MessageFlagException
     * @throws MessageNotFoundException
     */
    public function getMessageByMsgn($msgn, $msglist = null)
    {
    }
    /**
     * Get a message by its uid
     * @param $uid
     *
     * @return Message
     * @throws ConnectionFailedException
     * @throws InvalidMessageDateException
     * @throws MessageContentFetchingException
     * @throws MessageHeaderFetchingException
     * @throws RuntimeException
     * @throws EventNotFoundException
     * @throws MessageFlagException
     * @throws MessageNotFoundException
     */
    public function getMessageByUid($uid)
    {
    }
    /**
     * Don't mark messages as read when fetching
     *
     * @return $this
     */
    public function leaveUnread()
    {
    }
    /**
     * Mark all messages as read when fetching
     *
     * @return $this
     */
    public function markAsRead()
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
     * @return Client
     * @throws ConnectionFailedException
     */
    public function getClient()
    {
    }
    /**
     * Set the limit and page for the current query
     * @param int $limit
     * @param int $page
     *
     * @return $this
     */
    public function limit($limit, $page = 1)
    {
    }
    /**
     * @return Collection
     */
    public function getQuery()
    {
    }
    /**
     * @param array $query
     * @return Query
     */
    public function setQuery($query)
    {
    }
    /**
     * @return string
     */
    public function getRawQuery()
    {
    }
    /**
     * @param string $raw_query
     * @return Query
     */
    public function setRawQuery($raw_query)
    {
    }
    /**
     * @return string
     */
    public function getCharset()
    {
    }
    /**
     * @param string $charset
     * @return Query
     */
    public function setCharset($charset)
    {
    }
    /**
     * @param Client $client
     * @return Query
     */
    public function setClient(\Webklex\PHPIMAP\Client $client)
    {
    }
    /**
     * @return int
     */
    public function getLimit()
    {
    }
    /**
     * @param int $limit
     * @return Query
     */
    public function setLimit($limit)
    {
    }
    /**
     * @return int
     */
    public function getPage()
    {
    }
    /**
     * @param int $page
     * @return Query
     */
    public function setPage($page)
    {
    }
    /**
     * @param boolean $fetch_options
     * @return Query
     */
    public function setFetchOptions($fetch_options)
    {
    }
    /**
     * @param boolean $fetch_options
     * @return Query
     */
    public function fetchOptions($fetch_options)
    {
    }
    /**
     * @return int
     */
    public function getFetchOptions()
    {
    }
    /**
     * @return boolean
     */
    public function getFetchBody()
    {
    }
    /**
     * @param boolean $fetch_body
     * @return Query
     */
    public function setFetchBody($fetch_body)
    {
    }
    /**
     * @param boolean $fetch_body
     * @return Query
     */
    public function fetchBody($fetch_body)
    {
    }
    /**
     * @return int
     */
    public function getFetchFlags()
    {
    }
    /**
     * @param int $fetch_flags
     * @return Query
     */
    public function setFetchFlags($fetch_flags)
    {
    }
    /**
     * @param string $fetch_order
     * @return Query
     */
    public function setFetchOrder($fetch_order)
    {
    }
    /**
     * @param string $fetch_order
     * @return Query
     */
    public function fetchOrder($fetch_order)
    {
    }
    /**
     * @return string
     */
    public function getFetchOrder()
    {
    }
    /**
     * @return Query
     */
    public function setFetchOrderAsc()
    {
    }
    /**
     * @return Query
     */
    public function fetchOrderAsc()
    {
    }
    /**
     * @return Query
     */
    public function setFetchOrderDesc()
    {
    }
    /**
     * @return Query
     */
    public function fetchOrderDesc()
    {
    }
    /**
     * @var boolean $state
     *
     * @return Query
     */
    public function softFail($state = true)
    {
    }
    /**
     * @var boolean $state
     *
     * @return Query
     */
    public function setSoftFail($state = true)
    {
    }
    /**
     * @return boolean
     */
    public function getSoftFail()
    {
    }
    /**
     * Handle the exception for a given uid
     * @param integer $uid
     *
     * @throws GetMessagesFailedException
     */
    protected function handleException($uid)
    {
    }
    /**
     * Add a new error to the error holder
     * @param integer $uid
     * @param Exception $error
     */
    protected function setError($uid, $error)
    {
    }
    /**
     * Check if there are any errors / exceptions present
     * @var integer|null $uid
     *
     * @return boolean
     */
    public function hasErrors($uid = null)
    {
    }
    /**
     * Check if there is an error / exception present
     * @var integer $uid
     *
     * @return boolean
     */
    public function hasError($uid)
    {
    }
    /**
     * Get all available errors / exceptions
     *
     * @return array
     */
    public function errors()
    {
    }
    /**
     * Get all available errors / exceptions
     *
     * @return array
     */
    public function getErrors()
    {
    }
    /**
     * Get a specific error / exception
     * @var integer $uid
     *
     * @return Exception|null
     */
    public function error($uid)
    {
    }
    /**
     * Get a specific error / exception
     * @var integer $uid
     *
     * @return Exception|null
     */
    public function getError($uid)
    {
    }
}