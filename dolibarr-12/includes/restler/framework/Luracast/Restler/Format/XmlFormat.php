<?php

namespace Luracast\Restler\Format;

/**
 * XML Markup Format for Restler Framework
 *
 * @category   Framework
 * @package    Restler
 * @subpackage format
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class XmlFormat extends \Luracast\Restler\Format\Format
{
    const MIME = 'application/xml';
    const EXTENSION = 'xml';
    // ==================================================================
    //
    // Properties related to reading/parsing/decoding xml
    //
    // ------------------------------------------------------------------
    public static $importSettingsFromXml = false;
    public static $parseAttributes = true;
    public static $parseNamespaces = true;
    public static $parseTextNodeAsProperty = true;
    // ==================================================================
    //
    // Properties related to writing/encoding xml
    //
    // ------------------------------------------------------------------
    public static $useTextNodeProperty = true;
    public static $useNamespaces = true;
    public static $cdataNames = array();
    // ==================================================================
    //
    // Common Properties
    //
    // ------------------------------------------------------------------
    public static $attributeNames = array();
    public static $textNodeName = 'text';
    public static $namespaces = array();
    public static $namespacedProperties = array();
    /**
     * Default name for the root node.
     *
     * @var string $rootNodeName
     */
    public static $rootName = 'response';
    public static $defaultTagName = 'item';
    /**
     * When you decode an XML its structure is copied to the static vars
     * we can use this function to echo them out and then copy paste inside
     * our service methods
     *
     * @return string PHP source code to reproduce the configuration
     */
    public static function exportCurrentSettings()
    {
    }
    public function encode($data, $humanReadable = false)
    {
    }
    public function write(\XMLWriter $xml, $data, $parent)
    {
    }
    public function decode($data)
    {
    }
    public function read(\SimpleXMLElement $xml, $namespaces = null)
    {
    }
    public static function setType($value)
    {
    }
}