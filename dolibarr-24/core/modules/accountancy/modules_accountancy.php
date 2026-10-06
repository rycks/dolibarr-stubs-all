<?php

/**
 *	Parent class of accountancy models
 */
abstract class ModelePdfAccountancy extends \CommonDocGenerator
{
    /**
     * @var int $fromDate Start timestamp
     */
    public $fromDate;
    /**
     * @var int $toDate Start timestamp
     */
    public $toDate;
    /**
     * @var array<int,array<array{start:int|float,end:int|float}>> $verticalLinesSpacesCoordinates Array to store vertical coordinates where vertical column lines should be avoid
     */
    public $verticalLinesSpacesCoordinates = [];
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB  	$db                 Database handler
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Function to build pdf onto disk
     *
     * @param		BookKeeping	$object				Object source to build document
     * @param		Translate	$outputlangs		Lang output object
     * @param		string		$srctemplatepath	Full path of source filename for generator using a template file
     * @param		bool		$directDownload		Send the generated pdf to the browser
     * @return		int<-1,1>						1 if OK, <=0 if KO
     */
    public abstract function write_file(\BookKeeping $object, \Translate $outputlangs, string $srctemplatepath = '', bool $directDownload = \true);
    // phpcs:enable
    /**
     * Add dash line
     *
     * @param TCPDF 	$pdf 	TCPDF object
     * @param int 		$page 	Page number
     * @param int|float $y		Y position
     * @return void
     */
    protected function addDashLine(\TCPDF $pdf, int $page, $y)
    {
    }
    /**
     * Add a total line to pdf
     *
     * @param TCPDF 			$pdf 				TCPDF object
     * @param int|float 		$curY 				Current line Y
     * @param int|float 		$nexY 				Next line Y
     * @param int|float 		$default_font_size 	Default font size
     * @param string 			$label 				Line label
     * @param int|float 		$tab_top_newpage	Table top
     * @param int|float|string 	$debit				Debit
     * @param int|float|string 	$credit				Credit
     * @param bool 				$uppercase			Apply uppercase ?
     * @return void
     */
    protected abstract function addTotalLine(\TCPDF $pdf, &$curY, &$nexY, $default_font_size, string $label, $tab_top_newpage, $debit, $credit, bool $uppercase = \true);
    /**
     * Add the total accountancy group line to pdf
     *
     * @param TCPDF 	$pdf 				TCPDF object
     * @param float $curY 				Current line Y
     * @param float $nexY				Next line Y
     * @param int|float $default_font_size	Default font size
     * @param string 	$columnKey 			Column where to place title
     * @param string 	$label 				Line label
     * @param int|float $tab_top_newpage 	Table top
     * @param bool 		$uppercase 			Apply uppercase ?
     * @return void
     */
    protected function addTitleLine(\TCPDF $pdf, &$curY, &$nexY, $default_font_size, string $columnKey, string $label, $tab_top_newpage, bool $uppercase = \true)
    {
    }
    /**
     * Print a title using the colKey start position, and the end of table as end position
     *
     * @param TCPDF 		$pdf			TCPDF object
     * @param int|float 	$curY			Current line Y
     * @param string 		$colKey 		Column key name
     * @param string 		$columnText		Title text
     * @return void
     */
    protected function printTitleContent($pdf, $curY, $colKey, $columnText)
    {
    }
    /**
     * Print standard column content
     *
     * @param TCPDI|TCPDF	$pdf            Pdf object
     * @param float			$tab_top        Tab top position
     * @param float			$tab_height     Default tab height
     * @param Translate		$outputlangs    Output language
     * @param int			$hidetop        Hide top
     * @return float						Height of col tab titles
     */
    public function pdfTabTitles(&$pdf, $tab_top, $tab_height, $outputlangs, $hidetop = 0)
    {
    }
}
/**
 *  Parent class to manage numbering of Sale Orders
 */
abstract class ModeleNumRefBookkeeping extends \CommonNumRefGenerator
{
    /**
     * 	Return next free value
     *
     *  @param  BookKeeping		$object		Object we need next value for
     *  @return string|int<-1,0>		Value if OK, -1 if KO
     */
    public abstract function getNextValue(\BookKeeping $object);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}