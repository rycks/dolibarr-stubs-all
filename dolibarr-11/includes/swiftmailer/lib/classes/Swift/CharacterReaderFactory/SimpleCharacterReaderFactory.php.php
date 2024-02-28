<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Standard factory for creating CharacterReaders.
 *
 * @author Chris Corbyn
 */
class Swift_CharacterReaderFactory_SimpleCharacterReaderFactory implements \Swift_CharacterReaderFactory
{
    /**
     * A map of charset patterns to their implementation classes.
     *
     * @var array
     */
    private static $map = array();
    /**
     * Factories which have already been loaded.
     *
     * @var Swift_CharacterReaderFactory[]
     */
    private static $loaded = array();
    /**
     * Creates a new CharacterReaderFactory.
     */
    public function __construct()
    {
    }
    public function __wakeup()
    {
    }
    public function init()
    {
    }
    /**
     * Returns a CharacterReader suitable for the charset applied.
     *
     * @param string $charset
     *
     * @return Swift_CharacterReader
     */
    public function getReaderFor($charset)
    {
    }
}