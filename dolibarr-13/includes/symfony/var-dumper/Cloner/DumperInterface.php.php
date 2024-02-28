<?php

namespace Symfony\Component\VarDumper\Cloner;

/**
 * DumperInterface used by Data objects.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface DumperInterface
{
    /**
     * Dumps a scalar value.
     *
     * @param Cursor $cursor The Cursor position in the dump.
     * @param string $type   The PHP type of the value being dumped.
     * @param scalar $value  The scalar value being dumped.
     */
    public function dumpScalar(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $type, $value);
    /**
     * Dumps a string.
     *
     * @param Cursor $cursor The Cursor position in the dump.
     * @param string $str    The string being dumped.
     * @param bool   $bin    Whether $str is UTF-8 or binary encoded.
     * @param int    $cut    The number of characters $str has been cut by.
     */
    public function dumpString(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $str, $bin, $cut);
    /**
     * Dumps while entering an hash.
     *
     * @param Cursor $cursor   The Cursor position in the dump.
     * @param int    $type     A Cursor::HASH_* const for the type of hash.
     * @param string $class    The object class, resource type or array count.
     * @param bool   $hasChild When the dump of the hash has child item.
     */
    public function enterHash(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $type, $class, $hasChild);
    /**
     * Dumps while leaving an hash.
     *
     * @param Cursor $cursor   The Cursor position in the dump.
     * @param int    $type     A Cursor::HASH_* const for the type of hash.
     * @param string $class    The object class, resource type or array count.
     * @param bool   $hasChild When the dump of the hash has child item.
     * @param int    $cut      The number of items the hash has been cut by.
     */
    public function leaveHash(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $type, $class, $hasChild, $cut);
}