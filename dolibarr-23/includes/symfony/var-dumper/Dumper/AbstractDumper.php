<?php

namespace Symfony\Component\VarDumper\Dumper;

/**
 * Abstract mechanism for dumping a Data object.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
abstract class AbstractDumper implements \Symfony\Component\VarDumper\Dumper\DataDumperInterface, \Symfony\Component\VarDumper\Cloner\DumperInterface
{
    const DUMP_LIGHT_ARRAY = 1;
    const DUMP_STRING_LENGTH = 2;
    public static $defaultOutput = 'php://output';
    protected $line = '';
    protected $lineDumper;
    protected $outputStream;
    protected $decimalPoint;
    // This is locale dependent
    protected $indentPad = '  ';
    protected $flags;
    private $charset;
    /**
     * @param callable|resource|string|null $output  A line dumper callable, an opened stream or an output path, defaults to static::$defaultOutput
     * @param string                        $charset The default character encoding to use for non-UTF8 strings
     * @param int                           $flags   A bit field of static::DUMP_* constants to fine tune dumps representation
     */
    public function __construct($output = null, $charset = null, $flags = 0)
    {
    }
    /**
     * Sets the output destination of the dumps.
     *
     * @param callable|resource|string $output A line dumper callable, an opened stream or an output path
     *
     * @return callable|resource|string The previous output destination
     */
    public function setOutput($output)
    {
    }
    /**
     * Sets the default character encoding to use for non-UTF8 strings.
     *
     * @param string $charset The default character encoding to use for non-UTF8 strings
     *
     * @return string The previous charset
     */
    public function setCharset($charset)
    {
    }
    /**
     * Sets the indentation pad string.
     *
     * @param string $pad A string the will be prepended to dumped lines, repeated by nesting level
     *
     * @return string The indent pad
     */
    public function setIndentPad($pad)
    {
    }
    /**
     * Dumps a Data object.
     *
     * @param Data                               $data   A Data object
     * @param callable|resource|string|true|null $output A line dumper callable, an opened stream, an output path or true to return the dump
     *
     * @return string|null The dump as string when $output is true
     */
    public function dump(\Symfony\Component\VarDumper\Cloner\Data $data, $output = null)
    {
    }
    /**
     * Dumps the current line.
     *
     * @param int $depth The recursive depth in the dumped structure for the line being dumped
     */
    protected function dumpLine($depth)
    {
    }
    /**
     * Generic line dumper callback.
     *
     * @param string $line      The line to write
     * @param int    $depth     The recursive depth in the dumped structure
     * @param string $indentPad The line indent pad
     */
    protected function echoLine($line, $depth, $indentPad)
    {
    }
    /**
     * Converts a non-UTF-8 string to UTF-8.
     *
     * @param string $s The non-UTF-8 string to convert
     *
     * @return string The string converted to UTF-8
     */
    protected function utf8Encode($s)
    {
    }
}