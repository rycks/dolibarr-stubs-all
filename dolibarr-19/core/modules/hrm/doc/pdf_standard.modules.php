<?php

/**
 *	Class to generate Evaluation Pdf based on standard model
 */
class pdf_standard extends \ModelePDFEvaluation
{
    /**
     * @var DoliDb Database handler
     */
    public $db;
    /**
     * @var string model name
     */
    public $name;
    /**
     * @var string model description (short text)
     */
    public $description;
    /**
     * @var int     Save the name of generated file as the main doc when generating a doc with this template
     */
    public $update_main_doc_field;
    /**
     * @var string document type
     */
    public $type;
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    public $posxpiece;
    public $posxskill;
    public $posxrankemp;
    public $posxrequiredrank;
    public $posxresult;
    public $postotalht;
    public $posxnotes;
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build pdf onto disk
     *
     *  @param	Evaluation		$object				Object to generate
     *  @param	Translate		$outputlangs		Lang output object
     *  @param	string			$srctemplatepath	Full path of source filename for generator using a template file
     *  @param	int				$hidedetails		Do not show line details
     *  @param	int				$hidedesc			Do not show desc
     *  @param	int				$hideref			Do not show ref
     *  @return int             					1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     * @param   TCPDF       	$pdf                Object PDF
     * @param	Evaluation		$object             Object to show
     * @param   int         	$linenumber         line number
     * @param   int         	$curY               current y position
     * @param   int         	$default_font_size  default siez of font
     * @param   Translate   	$outputlangs        Object lang for output
     * @param	int				$hidedetails		Hide details (0=no, 1=yes, 2=just special lines)
     * @return  void
     */
    protected function printLine(&$pdf, $object, $linenumber, $curY, $default_font_size, $outputlangs, $hidedetails = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF			$pdf     		Object PDF
     *  @param  Evaluation		$object     	Object to show
     *  @param  int	    		$showaddress    0=no, 1=yes
     *  @param  Translate		$outputlangs	Object lang for output
     *  @return	void
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show table for lines
     *
     *   @param     TCPDF		$pdf     		Object PDF
     *   @param		int			$tab_top		Tab top
     *   @param		int			$tab_height		Tab height
     *   @param		int			$nexY			next y
     *   @param		Translate	$outputlangs	Output langs
     *   @param		int			$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     *   @param		int			$hidebottom		Hide bottom bar of array
     *   @param		string		$currency		Currency code
     *   @return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show footer of page. Need this->emetteur object
     *
     *  @param  TCPDF			$pdf     			PDF
     *  @param  Evaluation		$object				Object to show
     *  @param  Translate		$outputlangs		Object lang for output
     *  @param  int				$hidefreetext		1=Hide free text
     *  @return int									Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
}