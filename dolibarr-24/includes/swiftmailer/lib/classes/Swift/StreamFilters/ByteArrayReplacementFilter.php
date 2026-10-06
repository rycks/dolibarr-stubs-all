<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Processes bytes as they pass through a buffer and replaces sequences in it.
 *
 * This stream filter deals with Byte arrays rather than simple strings.
 *
 * @author  Chris Corbyn
 */
class Swift_StreamFilters_ByteArrayReplacementFilter implements \Swift_StreamFilter
{
    /** The replacement(s) to make */
    private $replace;
    /** The Index for searching */
    private $index;
    /** The Search Tree */
    private $tree = [];
    /**  Gives the size of the largest search */
    private $treeMaxLen = 0;
    private $repSize;
    /**
     * Create a new ByteArrayReplacementFilter with $search and $replace.
     *
     * @param array $search
     * @param array $replace
     */
    public function __construct($search, $replace)
    {
    }
    /**
     * Returns true if based on the buffer passed more bytes should be buffered.
     *
     * @param array $buffer
     *
     * @return bool
     */
    public function shouldBuffer($buffer)
    {
    }
    /**
     * Perform the actual replacements on $buffer and return the result.
     *
     * @param array $buffer
     * @param int   $minReplaces
     *
     * @return array
     */
    public function filter($buffer, $minReplaces = -1)
    {
    }
}