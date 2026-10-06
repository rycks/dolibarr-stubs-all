<?php

/**
 * Segments iterator
 * You need PHP 5.2 at least
 * You need Zip Extension or PclZip library
 *
 * @copyright  GPL License 2008 - Julien Pauli - Cyril PIERRE de GEYER - Anaska (http://www.anaska.com)
 * @license    https://www.gnu.org/copyleft/gpl.html  GPL License
 * @version 1.3
 */
class SegmentIterator implements \RecursiveIterator
{
    private $ref;
    private $key;
    private $keys;
    public function __construct(array $ref)
    {
    }
    #[\ReturnTypeWillChange]
    public function hasChildren()
    {
    }
    #[\ReturnTypeWillChange]
    public function current()
    {
    }
    #[\ReturnTypeWillChange]
    function getChildren()
    {
    }
    #[\ReturnTypeWillChange]
    public function key()
    {
    }
    #[\ReturnTypeWillChange]
    public function valid()
    {
    }
    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
    }
    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
    }
}