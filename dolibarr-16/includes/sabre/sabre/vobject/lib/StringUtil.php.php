<?php

namespace Sabre\VObject;

/**
 * Useful utilities for working with various strings.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class StringUtil
{
    /**
     * Returns true or false depending on if a string is valid UTF-8.
     *
     * @param string $str
     *
     * @return bool
     */
    static function isUTF8($str)
    {
    }
    /**
     * This method tries its best to convert the input string to UTF-8.
     *
     * Currently only ISO-5991-1 input and UTF-8 input is supported, but this
     * may be expanded upon if we receive other examples.
     *
     * @param string $str
     *
     * @return string
     */
    static function convertToUTF8($str)
    {
    }
}