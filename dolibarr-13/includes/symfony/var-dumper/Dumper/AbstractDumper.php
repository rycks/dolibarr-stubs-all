<?php

namespace Symfony\Component\VarDumper\Dumper;

/**
 * Abstract mechanism for dumping a Data object.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
abstract class AbstractDumper implements \Symfony\Component\VarDumper\Dumper\DataDumperInterface, \Symfony\Component\VarDumper\Cloner\DumperInterface
{
    public static $defaultOutput = 'php://output';
    protected $line = '';
    protected $lineDumper;
    protected $outputStream;
    protected $decimalPoint;
    // This is locale dependent
    protected $indentPad = '  ';
    private $charset;
    /**
     * @param callable|resource|string|null $output  A line dumper callable, an opened stream or an output path, defaults to static::$defaultOutput.
     * @param string                        $charset The default character encoding to use for non-UTF8 strings.
     */
    public function __construct($output = null, $charset = null)
    {
    }
    /**
     * Sets the output destination of the dumps.
     *
     * @param callable|resource|string $output A line dumper callable, an opened stream or an output path.
     *
     * @return callable|resource|string The previous output destination.
     */
    public function setOutput($output)
    {
    }
    /**
     * Sets the default character encoding to use for non-UTF8 strings.
     *
     * @param string $charset The default character encoding to use for non-UTF8 strings.
     *
     * @return string The previous charset.
     */
    public function setCharset($charset)
    {
    }
    /**
     * Sets the indentation pad string.
     *
     * @param string $pad A string the will be prepended to dumped lines, repeated by nesting level.
     *
     * @return string The indent pad.
     */
    public function setIndentPad($pad)
    {
    }
    /**
     * Dumps a Data object.
     *
     * @param Data                          $data   A Data object.
     * @param callable|resource|string|null $output A line dumper callable, an opened stream or an output path.
     */
    public function dump(\Symfony\Component\VarDumper\Cloner\Data $data, $output = null)
    {
    }
    /**
     * Dumps the current line.
     *
     * @param int $depth The recursive depth in the dumped structure for the line being dumped.
     */
    protected function dumpLine($depth)
    {
    }
    /**
     * Generic line dumper callback.
     *
     * @param string $line  The line to write.
     * @param int    $depth The recursive depth in the dumped structure.
     */
    protected function echoLine($line, $depth, $indentPad)
    {
    }
    /**
     * Converts a non-UTF-8 string to UTF-8.
     *
     * @param string $s The non-UTF-8 string to convert.
     *
     * @return string The string converted to UTF-8.
     */
    protected function utf8Encode($s)
    {
    }
}