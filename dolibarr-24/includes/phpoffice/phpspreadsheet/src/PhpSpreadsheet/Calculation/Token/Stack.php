<?php

namespace PhpOffice\PhpSpreadsheet\Calculation\Token;

class Stack
{
    /**
     * The parser stack for formulae.
     *
     * @var mixed[]
     */
    private $stack = [];
    /**
     * Count of entries in the parser stack.
     *
     * @var int
     */
    private $count = 0;
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
     * @param mixed $type
     * @param mixed $value
     * @param mixed $reference
     * @param null|string $storeKey will store the result under this alias
     * @param null|string $onlyIf will only run computation if the matching
     *      store key is true
     * @param null|string $onlyIfNot will only run computation if the matching
     *      store key is false
     */
    public function push($type, $value, $reference = null, $storeKey = null, $onlyIf = null, $onlyIfNot = null)
    {
    }
    public function getStackItem($type, $value, $reference = null, $storeKey = null, $onlyIf = null, $onlyIfNot = null)
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
     * Return an entry from the stack without removing it.
     *
     * @param int $n number indicating how far back in the stack we want to look
     *
     * @return mixed
     */
    public function last($n = 1)
    {
    }
    /**
     * Clear the stack.
     */
    public function clear()
    {
    }
    public function __toString()
    {
    }
}