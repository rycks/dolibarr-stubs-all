<?php

namespace Symfony\Component\VarDumper\Dumper;

/**
 * CliDumper dumps variables for command line output.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class CliDumper extends \Symfony\Component\VarDumper\Dumper\AbstractDumper
{
    public static $defaultColors;
    public static $defaultOutput = 'php://stdout';
    protected $colors;
    protected $maxStringWidth = 0;
    protected $styles = array(
        // See http://en.wikipedia.org/wiki/ANSI_escape_code#graphics
        'default' => '38;5;208',
        'num' => '1;38;5;38',
        'const' => '1;38;5;208',
        'str' => '1;38;5;113',
        'note' => '38;5;38',
        'ref' => '38;5;247',
        'public' => '',
        'protected' => '',
        'private' => '',
        'meta' => '38;5;170',
        'key' => '38;5;113',
        'index' => '38;5;38',
    );
    protected static $controlCharsRx = '/[\\x00-\\x1F\\x7F]+/';
    protected static $controlCharsMap = array("\t" => '\\t', "\n" => '\\n', "\v" => '\\v', "\f" => '\\f', "\r" => '\\r', "\x1b" => '\\e');
    /**
     * {@inheritdoc}
     */
    public function __construct($output = null, $charset = null)
    {
    }
    /**
     * Enables/disables colored output.
     *
     * @param bool $colors
     */
    public function setColors($colors)
    {
    }
    /**
     * Sets the maximum number of characters per line for dumped strings.
     *
     * @param int $maxStringWidth
     */
    public function setMaxStringWidth($maxStringWidth)
    {
    }
    /**
     * Configures styles.
     *
     * @param array $styles A map of style names to style definitions.
     */
    public function setStyles(array $styles)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function dumpScalar(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $type, $value)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function dumpString(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $str, $bin, $cut)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function enterHash(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $type, $class, $hasChild)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function leaveHash(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $type, $class, $hasChild, $cut)
    {
    }
    /**
     * Dumps an ellipsis for cut children.
     *
     * @param Cursor $cursor   The Cursor position in the dump.
     * @param bool   $hasChild When the dump of the hash has child item.
     * @param int    $cut      The number of items the hash has been cut by.
     */
    protected function dumpEllipsis(\Symfony\Component\VarDumper\Cloner\Cursor $cursor, $hasChild, $cut)
    {
    }
    /**
     * Dumps a key in a hash structure.
     *
     * @param Cursor $cursor The Cursor position in the dump.
     */
    protected function dumpKey(\Symfony\Component\VarDumper\Cloner\Cursor $cursor)
    {
    }
    /**
     * Decorates a value with some style.
     *
     * @param string $style The type of style being applied.
     * @param string $value The value being styled.
     * @param array  $attr  Optional context information.
     *
     * @return string The value with style decoration.
     */
    protected function style($style, $value, $attr = array())
    {
    }
    /**
     * @return bool Tells if the current output stream supports ANSI colors or not.
     */
    protected function supportsColors()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function dumpLine($depth, $endOfValue = false)
    {
    }
}