<?php

namespace Illuminate\Support;

class MessageBag implements \Illuminate\Contracts\Support\Jsonable, \JsonSerializable, \Illuminate\Contracts\Support\MessageBag, \Illuminate\Contracts\Support\MessageProvider
{
    /**
     * All of the registered messages.
     *
     * @var array
     */
    protected $messages = [];
    /**
     * Default format for message output.
     *
     * @var string
     */
    protected $format = ':message';
    /**
     * Create a new message bag instance.
     *
     * @param  array  $messages
     * @return void
     */
    public function __construct(array $messages = [])
    {
    }
    /**
     * Get the keys present in the message bag.
     *
     * @return array
     */
    public function keys()
    {
    }
    /**
     * Add a message to the message bag.
     *
     * @param  string  $key
     * @param  string  $message
     * @return $this
     */
    public function add($key, $message)
    {
    }
    /**
     * Add a message to the message bag if the given conditional is "true".
     *
     * @param  bool  $boolean
     * @param  string  $key
     * @param  string  $message
     * @return $this
     */
    public function addIf($boolean, $key, $message)
    {
    }
    /**
     * Determine if a key and message combination already exists.
     *
     * @param  string  $key
     * @param  string  $message
     * @return bool
     */
    protected function isUnique($key, $message)
    {
    }
    /**
     * Merge a new array of messages into the message bag.
     *
     * @param  \Illuminate\Contracts\Support\MessageProvider|array  $messages
     * @return $this
     */
    public function merge($messages)
    {
    }
    /**
     * Determine if messages exist for all of the given keys.
     *
     * @param  array|string|null  $key
     * @return bool
     */
    public function has($key)
    {
    }
    /**
     * Determine if messages exist for any of the given keys.
     *
     * @param  array|string  $keys
     * @return bool
     */
    public function hasAny($keys = [])
    {
    }
    /**
     * Get the first message from the message bag for a given key.
     *
     * @param  string|null  $key
     * @param  string|null  $format
     * @return string
     */
    public function first($key = null, $format = null)
    {
    }
    /**
     * Get all of the messages from the message bag for a given key.
     *
     * @param  string  $key
     * @param  string|null  $format
     * @return array
     */
    public function get($key, $format = null)
    {
    }
    /**
     * Get the messages for a wildcard key.
     *
     * @param  string  $key
     * @param  string|null  $format
     * @return array
     */
    protected function getMessagesForWildcardKey($key, $format)
    {
    }
    /**
     * Get all of the messages for every key in the message bag.
     *
     * @param  string|null  $format
     * @return array
     */
    public function all($format = null)
    {
    }
    /**
     * Get all of the unique messages for every key in the message bag.
     *
     * @param  string|null  $format
     * @return array
     */
    public function unique($format = null)
    {
    }
    /**
     * Format an array of messages.
     *
     * @param  array  $messages
     * @param  string  $format
     * @param  string  $messageKey
     * @return array
     */
    protected function transform($messages, $format, $messageKey)
    {
    }
    /**
     * Get the appropriate format based on the given format.
     *
     * @param  string  $format
     * @return string
     */
    protected function checkFormat($format)
    {
    }
    /**
     * Get the raw messages in the message bag.
     *
     * @return array
     */
    public function messages()
    {
    }
    /**
     * Get the raw messages in the message bag.
     *
     * @return array
     */
    public function getMessages()
    {
    }
    /**
     * Get the messages for the instance.
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function getMessageBag()
    {
    }
    /**
     * Get the default message format.
     *
     * @return string
     */
    public function getFormat()
    {
    }
    /**
     * Set the default message format.
     *
     * @param  string  $format
     * @return \Illuminate\Support\MessageBag
     */
    public function setFormat($format = ':message')
    {
    }
    /**
     * Determine if the message bag has any messages.
     *
     * @return bool
     */
    public function isEmpty()
    {
    }
    /**
     * Determine if the message bag has any messages.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
    }
    /**
     * Determine if the message bag has any messages.
     *
     * @return bool
     */
    public function any()
    {
    }
    /**
     * Get the number of messages in the message bag.
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
    }
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
    }
    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
    }
    /**
     * Convert the message bag to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
    }
}