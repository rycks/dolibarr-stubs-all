<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Analyzes US-ASCII characters.
 *
 * @author Chris Corbyn
 */
class Swift_CharacterReader_UsAsciiReader implements \Swift_CharacterReader
{
    /**
     * Returns the complete character map.
     *
     * @param string $string
     * @param int    $startOffset
     * @param array  $currentMap
     * @param string $ignoredChars
     *
     * @return int
     */
    public function getCharPositions($string, $startOffset, &$currentMap, &$ignoredChars)
    {
    }
    /**
     * Returns mapType.
     *
     * @return int mapType
     */
    public function getMapType()
    {
    }
    /**
     * Returns an integer which specifies how many more bytes to read.
     *
     * A positive integer indicates the number of more bytes to fetch before invoking
     * this method again.
     * A value of zero means this is already a valid character.
     * A value of -1 means this cannot possibly be a valid character.
     *
     * @param string $bytes
     * @param int    $size
     *
     * @return int
     */
    public function validateByteSequence($bytes, $size)
    {
    }
    /**
     * Returns the number of bytes which should be read to start each character.
     *
     * @return int
     */
    public function getInitialByteSize()
    {
    }
}