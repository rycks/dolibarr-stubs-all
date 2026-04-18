<?php

/**
 * @class tcpdi_parser
 * This is a PHP class for parsing PDF documents.<br>
 * Based on TCPDF_PARSER, part of the TCPDF project by Nicola Asuni.
 * @brief This is a PHP class for parsing PDF documents..
 * @version 1.1
 * @author Paul Nicholls - github.com/pauln
 * @author Nicola Asuni - info@tecnick.com
 */
class tcpdi_parser
{
    /**
     * Unique parser ID
     * @public
     */
    public $uniqueid = '';
    /**
     * Raw content of the PDF document.
     * @private
     */
    private $pdfdata = '';
    /**
     * XREF data.
     * @protected
     */
    protected $xref = array();
    /**
     * Object streams.
     * @protected
     */
    protected $objstreams = array();
    /**
     * Objects in objstreams.
     * @protected
     */
    protected $objstreamobjs = array();
    /**
     * List of seen XREF data locations.
     * @protected
     */
    protected $xref_seen_offsets = array();
    /**
     * Array of PDF objects.
     * @protected
     */
    protected $objects = array();
    /**
     * Array of object offsets.
     * @private
     */
    private $objoffsets = array();
    /**
     * Class object for decoding filters.
     * @private
     */
    private $FilterDecoders;
    /**
     * Pages
     *
     * @private array
     */
    private $pages;
    /**
     * Page count
     * @private integer
     */
    private $page_count;
    /**
     * actual page number
     * @private integer
     */
    private $pageno;
    /**
     * PDF version of the loaded document
     * @private string
     */
    private $pdfVersion;
    /**
     * Available BoxTypes
     *
     * @public array
     */
    public $availableBoxes = array('/MediaBox', '/CropBox', '/BleedBox', '/TrimBox', '/ArtBox');
    // -----------------------------------------------------------------------------
    /**
     * Parse a PDF document an return an array of objects.
     * @param $data (string) PDF data to parse.
     * @public
     * @since 1.0.000 (2011-05-24)
     */
    public function __construct($data, $uniqueid)
    {
    }
    /**
     * Clean up when done, to free memory etc
     */
    public function cleanUp()
    {
    }
    /**
     * Return an array of parsed PDF document objects.
     * @return (array) Array of parsed PDF document objects.
     * @public
     * @since 1.0.000 (2011-06-26)
     */
    public function getParsedData()
    {
    }
    /**
     * Get PDF-Version
     *
     * And reset the PDF Version used in FPDI if needed
     * @public
     */
    public function getPDFVersion()
    {
    }
    /**
     * Read all /Page(es)
     *
     */
    function readPages()
    {
    }
    /**
     * Read a single /Page element, recursing through /Kids if necessary
     *
     */
    private function readPage($page)
    {
    }
    /**
     * Get pagecount from sourcefile
     *
     * @return int
     */
    function getPageCount()
    {
    }
    /**
     * Get Cross-Reference (xref) table and trailer data from PDF document data.
     * @param $offset (int) xref offset (if know).
     * @param $xref (array) previous xref array (if any).
     * @return Array containing xref and trailer data.
     * @protected
     * @since 1.0.000 (2011-05-24)
     */
    protected function getXrefData($offset = 0, $xref = array())
    {
    }
    /**
     * Decode the Cross-Reference section
     * @param $startxref (int) Offset at which the xref section starts.
     * @param $xref (array) Previous xref array (if any).
     * @return Array containing xref and trailer data.
     * @protected
     * @since 1.0.000 (2011-06-20)
     */
    protected function decodeXref($startxref, $xref = array())
    {
    }
    /**
     * Decode the Cross-Reference Stream section
     * @param $startxref (int) Offset at which the xref section starts.
     * @param $xref (array) Previous xref array (if any).
     * @return Array containing xref and trailer data.
     * @protected
     * @since 1.0.003 (2013-03-16)
     */
    protected function decodeXrefStream($startxref, $xref = array())
    {
    }
    /**
     * Get raw stream data
     * @param $offset (int) Stream offset.
     * @param $length (int) Stream length.
     * @return string Steam content
     * @protected
     */
    protected function getRawStream($offset, $length)
    {
    }
    /**
     * Get object type, raw value and offset to next object
     * @param $offset (int) Object offset.
     * @return array containing object type, raw value and offset to next object
     * @protected
     * @since 1.0.000 (2011-06-20)
     */
    protected function getRawObject($offset = 0, $data = \null)
    {
    }
    private function getDictValue($offset, &$data)
    {
    }
    /**
     * Get content of indirect object.
     * @param $obj_ref (string) Object number and generation number separated by underscore character.
     * @param $offset (int) Object offset.
     * @param $decoding (boolean) If true decode streams.
     * @return array containing object data.
     * @protected
     * @since 1.0.000 (2011-05-24)
     */
    protected function getIndirectObject($obj_ref, $offset = 0, $decoding = \true)
    {
    }
    /**
     * Get the content of object, resolving indect object reference if necessary.
     * @param $obj (string) Object value.
     * @return array containing object data.
     * @public
     * @since 1.0.000 (2011-06-26)
     */
    public function getObjectVal($obj)
    {
    }
    /**
     * Extract object stream to find out what it contains.
     *
     */
    function extractObjectStream($key)
    {
    }
    /**
     * Find all object offsets.  Saves having to scour the file multiple times.
     * @private
     */
    private function findObjectOffsets()
    {
    }
    /**
     * Get offset of an object.  Checks xref first, then offsets found by scouring the file.
     * @param $key (array) Object key to find (obj, gen).
     * @return int Offset of the object in $this->pdfdata.
     * @private
     */
    private function findObjectOffset($key)
    {
    }
    /**
     * Decode the specified stream.
     * @param $sdic (array) Stream's dictionary array.
     * @param $stream (string) Stream to decode.
     * @return array containing decoded stream data and remaining filters.
     * @protected
     * @since 1.0.000 (2011-06-22)
     */
    protected function decodeStream($sdic, $stream)
    {
    }
    /**
     * Set pageno
     *
     * @param int $pageno Pagenumber to use
     */
    public function setPageno($pageno)
    {
    }
    /**
     * Get page-resources from current page
     *
     * @return array
     */
    public function getPageResources()
    {
    }
    /**
     * Get page-resources from /Page
     *
     * @param array $obj Array of pdf-data
     */
    private function _getPageResources($obj)
    {
    }
    /**
     * Get annotations from current page
     *
     * @return array
     */
    public function getPageAnnotations()
    {
    }
    /**
     * Get annotations from /Page
     *
     * @param array $obj Array of pdf-data
     */
    private function _getPageAnnotations($obj)
    {
    }
    /**
     * Get content of current page
     *
     * If more /Contents is an array, the streams are concated
     *
     * @return string
     */
    public function getContent()
    {
    }
    /**
     * Resolve all content-objects
     *
     * @param array $content_ref
     * @return array
     */
    private function _getPageContent($content_ref)
    {
    }
    /**
     * Rebuild content-streams
     *
     * @param array $obj
     * @return string
     */
    private function _rebuildContentStream($obj)
    {
    }
    /**
     * Get a Box from a page
     * Arrayformat is same as used by fpdf_tpl
     *
     * @param array $page a /Page
     * @param string $box_index Type of Box @see $availableBoxes
     * @param float Scale factor from user space units to points
     * @return array
     */
    public function getPageBox($page, $box_index, $k)
    {
    }
    /**
     * Get all page boxes by page no
     *
     * @param int The page number
     * @param float Scale factor from user space units to points
     * @return array
     */
    public function getPageBoxes($pageno, $k)
    {
    }
    /**
     * Get all boxes from /Page
     *
     * @param array a /Page
     * @return array
     */
    private function _getPageBoxes($page, $k)
    {
    }
    /**
     * Get the page rotation by pageno
     *
     * @param integer $pageno
     * @return array
     */
    public function getPageRotation($pageno)
    {
    }
    private function _getPageRotation($obj)
    {
    }
    /**
     * This method is automatically called in case of fatal error; it simply outputs the message and halts the execution.
     * @param $msg (string) The error message
     * @public
     * @since 1.0.000 (2011-05-23)
     */
    public function Error($msg)
    {
    }
}
\define('PDF_TYPE_NULL', 0);
\define('PDF_TYPE_NUMERIC', 1);
\define('PDF_TYPE_TOKEN', 2);
\define('PDF_TYPE_HEX', 3);
\define('PDF_TYPE_STRING', 4);
\define('PDF_TYPE_DICTIONARY', 5);
\define('PDF_TYPE_ARRAY', 6);
\define('PDF_TYPE_OBJDEC', 7);
\define('PDF_TYPE_OBJREF', 8);
\define('PDF_TYPE_OBJECT', 9);
\define('PDF_TYPE_STREAM', 10);
\define('PDF_TYPE_BOOLEAN', 11);
\define('PDF_TYPE_REAL', 12);