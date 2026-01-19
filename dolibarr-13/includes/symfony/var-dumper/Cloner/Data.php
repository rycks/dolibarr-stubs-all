<?php

namespace Symfony\Component\VarDumper\Cloner;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class Data
{
    private $data;
    private $maxDepth = 20;
    private $maxItemsPerDepth = -1;
    private $useRefHandles = -1;
    /**
     * @param array $data A array as returned by ClonerInterface::cloneVar().
     */
    public function __construct(array $data)
    {
    }
    /**
     * @return array The raw data structure.
     */
    public function getRawData()
    {
    }
    /**
     * Returns a depth limited clone of $this.
     *
     * @param int $maxDepth The max dumped depth level.
     *
     * @return self A clone of $this.
     */
    public function withMaxDepth($maxDepth)
    {
    }
    /**
     * Limits the numbers of elements per depth level.
     *
     * @param int $maxItemsPerDepth The max number of items dumped per depth level.
     *
     * @return self A clone of $this.
     */
    public function withMaxItemsPerDepth($maxItemsPerDepth)
    {
    }
    /**
     * Enables/disables objects' identifiers tracking.
     *
     * @param bool $useRefHandles False to hide global ref. handles.
     *
     * @return self A clone of $this.
     */
    public function withRefHandles($useRefHandles)
    {
    }
    /**
     * Dumps data with a DumperInterface dumper.
     */
    public function dump(\Symfony\Component\VarDumper\Cloner\DumperInterface $dumper)
    {
    }
    /**
     * Depth-first dumping of items.
     *
     * @param DumperInterface $dumper The dumper being used for dumping.
     * @param Cursor          $cursor A cursor used for tracking dumper state position.
     * @param array           &$refs  A map of all references discovered while dumping.
     * @param mixed           $item   A Stub object or the original value being dumped.
     */
    private function dumpItem($dumper, $cursor, &$refs, $item)
    {
    }
    /**
     * Dumps children of hash structures.
     *
     * @param DumperInterface $dumper
     * @param Cursor          $parentCursor The cursor of the parent hash.
     * @param array           &$refs        A map of all references discovered while dumping.
     * @param array           $children     The children to dump.
     * @param int             $hashCut      The number of items removed from the original hash.
     * @param string          $hashType     A Cursor::HASH_* const.
     *
     * @return int The final number of removed items.
     */
    private function dumpChildren($dumper, $parentCursor, &$refs, $children, $hashCut, $hashType)
    {
    }
}