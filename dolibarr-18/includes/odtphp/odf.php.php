<?php

/**
 * Class of ODT Exception
 */
class OdfException extends \Exception
{
}
/**
 * Templating class for odt file
 * You need PHP 5.2 at least
 * You need Zip Extension or PclZip library
 *
 * @copyright  2008 - Julien Pauli - Cyril PIERRE de GEYER - Anaska (http://www.anaska.com)
 * @copyright  2010-2015 - Laurent Destailleur - eldy@users.sourceforge.net
 * @copyright  2010 - Vikas Mahajan - http://vikasmahajan.wordpress.com
 * @copyright  2012 - Stephen Larroque - lrq3000@gmail.com
 * @license    https://www.gnu.org/copyleft/gpl.html  GPL License
 * @version 1.5.0
 */
class Odf
{
    protected $config = array(
        'ZIP_PROXY' => 'PclZipProxy',
        // PclZipProxy, PhpZipProxy
        'DELIMITER_LEFT' => '{',
        'DELIMITER_RIGHT' => '}',
        'PATH_TO_TMP' => '/tmp',
    );
    protected $file;
    protected $contentXml;
    // To store content of content.xml file
    protected $metaXml;
    // To store content of meta.xml file
    protected $stylesXml;
    // To store content of styles.xml file
    protected $manifestXml;
    // To store content of META-INF/manifest.xml file
    protected $tmpfile;
    protected $tmpdir = '';
    protected $images = array();
    protected $vars = array();
    protected $segments = array();
    public $creator;
    public $title;
    public $subject;
    public $userdefined = array();
    const PIXEL_TO_CM = 0.026458333;
    const FIND_TAGS_REGEX = '/<([A-Za-z0-9]+)(?:\\s([A-Za-z]+(?:\\-[A-Za-z]+)?(?:=(?:".*?")|(?:[0-9]+))))*(?:(?:\\s\\/>)|(?:>(.*)<\\/\\1>))/s';
    const FIND_ENCODED_TAGS_REGEX = '/&lt;([A-Za-z]+)(?:\\s([A-Za-z]+(?:\\-[A-Za-z]+)?(?:=(?:".*?")|(?:[0-9]+))))*(?:(?:\\s\\/&gt;)|(?:&gt;(.*)&lt;\\/\\1&gt;))/';
    /**
     * Class constructor
     *
     * @param string $filename     The name of the odt file
     * @param string $config       Array of config data
     * @throws OdfException
     */
    public function __construct($filename, $config = array())
    {
    }
    /**
     * Assing a template variable into ->vars.
     * For example, key is {object_date} and value is '2021-01-01'
     *
     * @param string   $key        Name of the variable within the template
     * @param string   $value      Replacement value
     * @param bool     $encode     If true, special XML characters are encoded
     * @param string   $charset    Charset
     * @throws OdfException
     * @return odf
     */
    public function setVars($key, $value, $encode = \true, $charset = 'ISO-8859')
    {
    }
    /**
     * Replaces html tags found into the $value with ODT compatible tags and return the converted compatible string
     *
     * @param string   $value      	Replacement value
     * @param bool     $encode     	If true, special XML characters are encoded
     * @param string   $charset    	Charset
     * @return string				String in ODTsyntax format
     */
    public function convertVarToOdf($value, $encode = \true, $charset = 'ISO-8859')
    {
    }
    /**
     * Replaces html tags in with odt tags and returns an odt string. Encodes and converts inner text.
     * @param array 	$tags   			An array with html tags generated by the getDataFromHtml() function
     * @param array 	$customStyles   	An array of style defenitions that should be included inside the odt file
     * @param array 	$fontDeclarations   An array of font declarations that should be included inside the odt file
     * @param bool     	$encode     		If true, special XML characters are encoded
     * @param string   	$charset    		Charset. See encode_chars()
     * @return string
     */
    private function _replaceHtmlWithOdtTag($tags, &$customStyles, &$fontDeclarations, $encode = \false, $charset = '')
    {
    }
    /**
     * Correctly encode chars
     * @param string   $text       The text to encode or not
     * @param bool     $encode     If true, special XML characters are encoded
     * @param string   $charset    Charset
     * @return string	The converted text
     * @see self::convertVarToOdf()
     */
    private function encode_chars($text, $encode = \false, $charset = '')
    {
    }
    /**
     * Checks if the given text is a html string
     * @param string    $text   The text to check
     * @return bool
     */
    private function _isHtmlTag($text)
    {
    }
    /**
     * Checks if the given text includes a html string
     * @param string    $text   The text to check
     * @return bool
     */
    private function _hasHtmlTag($text)
    {
    }
    /**
     * Returns an array of html elements
     * @param string    $html   A string with html tags
     * @return array
     */
    private function _getDataFromHtml($html)
    {
    }
    /**
     * Function to convert a HTML string into an ODT string
     *
     * @param	string	$value	String to convert
     * @return	string			String converted
     */
    public function htmlToUTFAndPreOdf($value)
    {
    }
    /**
     * Function to convert a HTML string into an ODT string
     *
     * @param	string	$value	String to convert
     * @return	string			String converted
     */
    public function preOdfToOdf($value)
    {
    }
    /**
     * Assign a template variable as a picture
     *
     * @param string $key name of the variable within the template
     * @param string $value path to the picture
     * @throws OdfException
     * @return odf
     */
    public function setImage($key, $value)
    {
    }
    /**
     * Move segment tags for lines of tables
     * This function is called automatically within the constructor, so this->contentXml is clean before any other thing
     *
     * @return void
     */
    private function _moveRowSegments()
    {
    }
    /**
     * Merge template variables
     * Called at the beginning of the _save function
     *
     * @param  string	$type		'content', 'styles' or 'meta'
     * @return void
     */
    private function _parse($type = 'content')
    {
    }
    /**
     * Add the merged segment to the document
     *
     * @param Segment $segment     Segment
     * @throws OdfException
     * @return odf
     */
    public function mergeSegment(\Segment $segment)
    {
    }
    /**
     * Display all the current template variables
     *
     * @return string
     */
    public function printVars()
    {
    }
    /**
     * Display the XML content of the file from odt document
     * as it is at the moment
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Display loop segments declared with setSegment()
     *
     * @return string
     */
    public function printDeclaredSegments()
    {
    }
    /**
     * Declare a segment in order to use it in a loop.
     * Extract the segment and store it into $this->segments[]. Return it for next call.
     *
     * @param  string      $segment        Segment
     * @throws OdfException
     * @return Segment
     */
    public function setSegment($segment)
    {
    }
    /**
     * Save the odt file on the disk
     *
     * @param string $file name of the desired file
     * @throws OdfException
     * @return void
     */
    public function saveToDisk($file = \null)
    {
    }
    /**
     * Write output file onto disk
     *
     * @throws OdfException
     * @return void
     */
    private function _save()
    {
    }
    /**
     * Update Meta information
     * <dc:date>2013-03-16T14:06:25</dc:date>
     *
     * @return void
     */
    public function setMetaData()
    {
    }
    /**
     * Update Manifest file according to added image files
     *
     * @param string	$file		Image file to add into manifest content
     * @return void
     */
    public function addImageToManifest($file)
    {
    }
    /**
     * Export the file as attached file by HTTP
     *
     * @param string $name (optional)
     * @throws OdfException
     * @return void
     */
    public function exportAsAttachedFile($name = "")
    {
    }
    /**
     * Convert the ODT file to PDF and export the file as attached file by HTTP
     * Note: you need to have JODConverter and OpenOffice or LibreOffice installed and executable on the same system as where this php script will be executed. You also need to chmod +x odt2pdf.sh
     *
     * @param 	string 	$name 	Name of ODT file to generate before generating PDF
     * @throws OdfException
     * @return void
     */
    public function exportAsAttachedPDF($name = "")
    {
    }
    /**
     * Returns a variable of configuration
     *
     * @param  string  $configKey  Config key
     * @return string              The requested variable of configuration
     */
    public function getConfig($configKey)
    {
    }
    /**
     * Returns the temporary working file
     *
     * @return string le chemin vers le fichier temporaire de travail
     */
    public function getTmpfile()
    {
    }
    /**
     * Delete the temporary file when the object is destroyed
     */
    public function __destruct()
    {
    }
    /**
     * Empty the temporary working directory recursively
     *
     * @param  string  $dir    The temporary working directory
     * @return void
     */
    private function _rrmdir($dir)
    {
    }
    /**
     * return the value present on odt in [valuename][/valuename]
     *
     * @param  string $valuename   Balise in the template
     * @return string              The value inside the balise
     */
    public function getvalue($valuename)
    {
    }
}