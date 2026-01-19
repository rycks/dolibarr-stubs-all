<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Engine;

class CyclicReferenceStack
{
    /**
     * The call stack for calculated cells.
     *
     * @var mixed[]
     */
    private $stack = [];
    /**
     * Return the number of entries on the stack.
     *
     * @return int
     */
    public function count()
    {
    }
    /**
     * Push a new entry onto the stack.
     *
     * @param mixed $value
     */
    public function push($value)
    {
    }
    /**
     * Pop the last entry from the stack.
     *
     * @return mixed
     */
    public function pop()
    {
    }
    /**
     * Test to see if a specified entry exists on the stack.
     *
     * @param mixed $value The value to test
     *
     * @return bool
     */
    public function onStack($value)
    {
    }
    /**
     * Clear the stack.
     */
    public function clear()
    {
    }
    /**
     * Return an array of all entries on the stack.
     *
     * @return mixed[]
     */
    public function showStack()
    {
    }
}