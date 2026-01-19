<?php

namespace Symfony\Component\VarDumper\Dumper;

/**
 * HtmlDumper dumps variables as HTML.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class HtmlDumper extends \Symfony\Component\VarDumper\Dumper\CliDumper
{
    public static $defaultOutput = 'php://output';
    protected $dumpHeader;
    protected $dumpPrefix = '<pre class=sf-dump id=%s data-indent-pad="%s">';
    protected $dumpSuffix = '</pre><script>Sfdump("%s")</script>';
    protected $dumpId = 'sf-dump';
    protected $colors = true;
    protected $headerIsDumped = false;
    protected $lastDepth = -1;
    protected $styles = array('default' => 'background-color:#18171B; color:#FF8400; line-height:1.2em; font:12px Menlo, Monaco, Consolas, monospace; word-wrap: break-word; white-space: pre-wrap; position:relative; z-index:100000; word-break: normal', 'num' => 'font-weight:bold; color:#1299DA', 'const' => 'font-weight:bold', 'str' => 'font-weight:bold; color:#56DB3A', 'note' => 'color:#1299DA', 'ref' => 'color:#A0A0A0', 'public' => 'color:#FFFFFF', 'protected' => 'color:#FFFFFF', 'private' => 'color:#FFFFFF', 'meta' => 'color:#B729D9', 'key' => 'color:#56DB3A', 'index' => 'color:#1299DA');
    /**
     * {@inheritdoc}
     */
    public function __construct($output = null, $charset = null)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function setOutput($output)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function setStyles(array $styles)
    {
    }
    /**
     * Sets an HTML header that will be dumped once in the output stream.
     *
     * @param string $header An HTML string.
     */
    public function setDumpHeader($header)
    {
    }
    /**
     * Sets an HTML prefix and suffix that will encapse every single dump.
     *
     * @param string $prefix The prepended HTML string.
     * @param string $suffix The appended HTML string.
     */
    public function setDumpBoundaries($prefix, $suffix)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function dump(\Symfony\Component\VarDumper\Cloner\Data $data, $output = null)
    {
    }
    /**
     * Dumps the HTML header.
     */
    protected function getDumpHeader()
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
     * {@inheritdoc}
     */
    protected function style($style, $value, $attr = array())
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function dumpLine($depth, $endOfValue = false)
    {
    }
}