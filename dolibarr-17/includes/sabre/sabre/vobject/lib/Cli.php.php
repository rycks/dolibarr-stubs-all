<?php

namespace Sabre\VObject;

/**
 * This is the CLI interface for sabre-vobject.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Cli
{
    /**
     * No output.
     *
     * @var bool
     */
    protected $quiet = false;
    /**
     * Help display.
     *
     * @var bool
     */
    protected $showHelp = false;
    /**
     * Wether to spit out 'mimedir' or 'json' format.
     *
     * @var string
     */
    protected $format;
    /**
     * JSON pretty print.
     *
     * @var bool
     */
    protected $pretty;
    /**
     * Source file.
     *
     * @var string
     */
    protected $inputPath;
    /**
     * Destination file.
     *
     * @var string
     */
    protected $outputPath;
    /**
     * output stream.
     *
     * @var resource
     */
    protected $stdout;
    /**
     * stdin.
     *
     * @var resource
     */
    protected $stdin;
    /**
     * stderr.
     *
     * @var resource
     */
    protected $stderr;
    /**
     * Input format (one of json or mimedir).
     *
     * @var string
     */
    protected $inputFormat;
    /**
     * Makes the parser less strict.
     *
     * @var bool
     */
    protected $forgiving = false;
    /**
     * Main function.
     *
     * @return int
     */
    function main(array $argv)
    {
    }
    /**
     * Shows the help message.
     *
     * @return void
     */
    protected function showHelp()
    {
    }
    /**
     * Validates a VObject file.
     *
     * @param Component $vObj
     *
     * @return int
     */
    protected function validate(\Sabre\VObject\Component $vObj)
    {
    }
    /**
     * Repairs a VObject file.
     *
     * @param Component $vObj
     *
     * @return int
     */
    protected function repair(\Sabre\VObject\Component $vObj)
    {
    }
    /**
     * Converts a vObject file to a new format.
     *
     * @param Component $vObj
     *
     * @return int
     */
    protected function convert($vObj)
    {
    }
    /**
     * Colorizes a file.
     *
     * @param Component $vObj
     *
     * @return int
     */
    protected function color($vObj)
    {
    }
    /**
     * Returns an ansi color string for a color name.
     *
     * @param string $color
     *
     * @return string
     */
    protected function colorize($color, $str, $resetTo = 'default')
    {
    }
    /**
     * Writes out a string in specific color.
     *
     * @param string $color
     * @param string $str
     *
     * @return void
     */
    protected function cWrite($color, $str)
    {
    }
    protected function serializeComponent(\Sabre\VObject\Component $vObj)
    {
    }
    /**
     * Colorizes a property.
     *
     * @param Property $property
     *
     * @return void
     */
    protected function serializeProperty(\Sabre\VObject\Property $property)
    {
    }
    /**
     * Parses the list of arguments.
     *
     * @param array $argv
     *
     * @return void
     */
    protected function parseArguments(array $argv)
    {
    }
    protected $parser;
    /**
     * Reads the input file.
     *
     * @return Component
     */
    protected function readInput()
    {
    }
    /**
     * Sends a message to STDERR.
     *
     * @param string $msg
     *
     * @return void
     */
    protected function log($msg, $color = 'default')
    {
    }
}