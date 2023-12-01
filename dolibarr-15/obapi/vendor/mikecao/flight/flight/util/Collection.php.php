<?php

namespace flight\util;

/**
 * The Collection class allows you to access a set of data
 * using both array and object notation.
 */
final class Collection implements \ArrayAccess, \Iterator, \Countable, \JsonSerializable
{
    /**
     * Collection data.
     */
    private array $data;
    /**
     * Constructor.
     *
     * @param array $data Initial data
     */
    public function __construct(array $data = [])
    {
    }
    /**
     * Gets an item.
     *
     * @param string $key Key
     *
     * @return mixed Value
     */
    public function __get(string $key)
    {
    }
    /**
     * Set an item.
     *
     * @param string $key   Key
     * @param mixed  $value Value
     */
    public function __set(string $key, $value) : void
    {
    }
    /**
     * Checks if an item exists.
     *
     * @param string $key Key
     *
     * @return bool Item status
     */
    public function __isset(string $key) : bool
    {
    }
    /**
     * Removes an item.
     *
     * @param string $key Key
     */
    public function __unset(string $key) : void
    {
    }
    /**
     * Gets an item at the offset.
     *
     * @param string $offset Offset
     *
     * @return mixed Value
     */
    // [\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
    }
    /**
     * Sets an item at the offset.
     *
     * @param string $offset Offset
     * @param mixed  $value  Value
     */
    // [\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
    }
    /**
     * Checks if an item exists at the offset.
     *
     * @param string $offset Offset
     *
     * @return bool Item status
     */
    public function offsetExists($offset) : bool
    {
    }
    /**
     * Removes an item at the offset.
     *
     * @param string $offset Offset
     */
    public function offsetUnset($offset) : void
    {
    }
    /**
     * Resets the collection.
     */
    public function rewind() : void
    {
    }
    /**
     * Gets current collection item.
     *
     * @return mixed Value
     */
    // [\ReturnTypeWillChange]
    public function current()
    {
    }
    /**
     * Gets current collection key.
     *
     * @return mixed Value
     */
    // [\ReturnTypeWillChange]
    public function key()
    {
    }
    /**
     * Gets the next collection value.
     *
     * @return mixed Value
     */
    // [\ReturnTypeWillChange]
    public function next()
    {
    }
    /**
     * Checks if the current collection key is valid.
     *
     * @return bool Key status
     */
    public function valid() : bool
    {
    }
    /**
     * Gets the size of the collection.
     *
     * @return int Collection size
     */
    public function count() : int
    {
    }
    /**
     * Gets the item keys.
     *
     * @return array Collection keys
     */
    public function keys() : array
    {
    }
    /**
     * Gets the collection data.
     *
     * @return array Collection data
     */
    public function getData() : array
    {
    }
    /**
     * Sets the collection data.
     *
     * @param array $data New collection data
     */
    public function setData(array $data) : void
    {
    }
    /**
     * Gets the collection data which can be serialized to JSON.
     *
     * @return array Collection data which can be serialized by <b>json_encode</b>
     */
    public function jsonSerialize() : array
    {
    }
    /**
     * Removes all items from the collection.
     */
    public function clear() : void
    {
    }
}