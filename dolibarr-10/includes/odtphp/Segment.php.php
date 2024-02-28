<?php

class SegmentException extends \Exception
{
}
/**
 * Class for handling templating segments with odt files
 * You need PHP 5.2 at least
 * You need Zip Extension or PclZip library
 *
 * @copyright  2008 - Julien Pauli - Cyril PIERRE de GEYER - Anaska (http://www.anaska.com)
 * @copyright  2012 - Stephen Larroque - lrq3000@gmail.com
 * @license    http://www.gnu.org/copyleft/gpl.html  GPL License
 * @version 1.4.5 (last update 2013-04-07)
 */
class Segment implements \IteratorAggregate, \Countable
{
    protected $xml;
    protected $xmlParsed = '';
    protected $name;
    protected $children = array();
    protected $vars = array();
    protected $images = array();
    protected $odf;
    protected $file;
    /**
     * Constructor
     *
     * @param string $name  name of the segment to construct
     * @param string $xml   XML tree of the segment
     * @param string $odf   odf
     */
    public function __construct($name, $xml, $odf)
    {
    }
    /**
     * Returns the name of the segment
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Does the segment have children ?
     *
     * @return bool
     */
    public function hasChildren()
    {
    }
    /**
     * Countable interface
     *
     * @return int
     */
    public function count()
    {
    }
    /**
     * IteratorAggregate interface
     *
     * @return Iterator
     */
    public function getIterator()
    {
    }
    /**
     * Replace variables of the template in the XML code
     * All the children are also called
     * Complete the current segment with new line
     *
     * @return string
     */
    public function merge()
    {
    }
    /**
     * Function to replace macros for invoice short and long month, invoice year
     *
     * Substitution occur when the invoice is generated, not considering the invoice date
     * so do not (re)generate in a diferent date than the one that the invoice belongs to
     * Perhaps it would be better to use the invoice issued date but I still do not know
     * how to get it here
     *
     * Miguel Erill 09/04/2017
     *
     * @param	string	$value	String to convert
     */
    public function macroReplace($text)
    {
    }
    /**
     * Analyse the XML code in order to find children
     *
     * @param string $xml   Xml
     * @return Segment
     */
    protected function _analyseChildren($xml)
    {
    }
    /**
     * Assign a template variable to replace
     *
     * @param string $key       Key
     * @param string $value     Value
     * @param string $encode    Encode
     * @param string $charset   Charset
     * @throws SegmentException
     * @return Segment
     */
    public function setVars($key, $value, $encode = \true, $charset = 'ISO-8859')
    {
    }
    /**
     * Assign a template variable as a picture
     *
     * @param string $key name of the variable within the template
     * @param string $value path to the picture
     * @throws OdfException
     * @return Segment
     */
    public function setImage($key, $value)
    {
    }
    /**
     * Shortcut to retrieve a child
     *
     * @param string $prop      Prop
     * @return Segment
     * @throws SegmentException
     */
    public function __get($prop)
    {
    }
    /**
     * Proxy for setVars
     *
     * @param string $meth      Meth
     * @param array $args       Args
     * @return Segment
     */
    public function __call($meth, $args)
    {
    }
    /**
     * Returns the parsed XML
     *
     * @return string
     */
    public function getXmlParsed()
    {
    }
}