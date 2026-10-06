<?php

namespace Illuminate\Pagination;

class Cursor implements \Illuminate\Contracts\Support\Arrayable
{
    /**
     * The parameters associated with the cursor.
     *
     * @var array
     */
    protected $parameters;
    /**
     * Determine whether the cursor points to the next or previous set of items.
     *
     * @var bool
     */
    protected $pointsToNextItems;
    /**
     * Create a new cursor instance.
     *
     * @param  array  $parameters
     * @param  bool  $pointsToNextItems
     */
    public function __construct(array $parameters, $pointsToNextItems = true)
    {
    }
    /**
     * Get the given parameter from the cursor.
     *
     * @param  string  $parameterName
     * @return string|null
     *
     * @throws \UnexpectedValueException
     */
    public function parameter(string $parameterName)
    {
    }
    /**
     * Get the given parameters from the cursor.
     *
     * @param  array  $parameterNames
     * @return array
     */
    public function parameters(array $parameterNames)
    {
    }
    /**
     * Determine whether the cursor points to the next set of items.
     *
     * @return bool
     */
    public function pointsToNextItems()
    {
    }
    /**
     * Determine whether the cursor points to the previous set of items.
     *
     * @return bool
     */
    public function pointsToPreviousItems()
    {
    }
    /**
     * Get the array representation of the cursor.
     *
     * @return array
     */
    public function toArray()
    {
    }
    /**
     * Get the encoded string representation of the cursor to construct a URL.
     *
     * @return string
     */
    public function encode()
    {
    }
    /**
     * Get a cursor instance from the encoded string representation.
     *
     * @param  string|null  $encodedString
     * @return static|null
     */
    public static function fromEncoded($encodedString)
    {
    }
}