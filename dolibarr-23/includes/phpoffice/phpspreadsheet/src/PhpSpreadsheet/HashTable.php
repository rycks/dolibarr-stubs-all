<?php

namespace PhpOffice\PhpSpreadsheet;

class HashTable
{
    /**
     * HashTable elements.
     *
     * @var IComparable[]
     */
    protected $items = [];
    /**
     * HashTable key map.
     *
     * @var string[]
     */
    protected $keyMap = [];
    /**
     * Create a new \PhpOffice\PhpSpreadsheet\HashTable.
     *
     * @param IComparable[] $pSource Optional source array to create HashTable from
     *
     * @throws Exception
     */
    public function __construct($pSource = null)
    {
    }
    /**
     * Add HashTable items from source.
     *
     * @param IComparable[] $pSource Source array to create HashTable from
     *
     * @throws Exception
     */
    public function addFromSource(array $pSource = null)
    {
    }
    /**
     * Add HashTable item.
     *
     * @param IComparable $pSource Item to add
     */
    public function add(\PhpOffice\PhpSpreadsheet\IComparable $pSource)
    {
    }
    /**
     * Remove HashTable item.
     *
     * @param IComparable $pSource Item to remove
     */
    public function remove(\PhpOffice\PhpSpreadsheet\IComparable $pSource)
    {
    }
    /**
     * Clear HashTable.
     */
    public function clear()
    {
    }
    /**
     * Count.
     *
     * @return int
     */
    public function count()
    {
    }
    /**
     * Get index for hash code.
     *
     * @param string $pHashCode
     *
     * @return int Index
     */
    public function getIndexForHashCode($pHashCode)
    {
    }
    /**
     * Get by index.
     *
     * @param int $pIndex
     *
     * @return IComparable
     */
    public function getByIndex($pIndex)
    {
    }
    /**
     * Get by hashcode.
     *
     * @param string $pHashCode
     *
     * @return IComparable
     */
    public function getByHashCode($pHashCode)
    {
    }
    /**
     * HashTable to array.
     *
     * @return IComparable[]
     */
    public function toArray()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}