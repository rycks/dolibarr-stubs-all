<?php

/**
 *  Class to build a standard salary slip PDF
 */
class pdf_standard_salary extends \ModelePDFSalary
{
    /** @var DoliDB */
    public $db;
    /** @var string */
    public $name;
    /** @var string */
    public $description;
    /** @var string */
    public $type;
    /** @var float */
    public $page_largeur;
    /** @var float */
    public $page_hauteur;
    /** @var array{float, float} */
    public $format;
    /** @var float */
    public $marge_gauche;
    /** @var float */
    public $marge_droite;
    /** @var float */
    public $marge_haute;
    /** @var float */
    public $marge_basse;
    /** @var float */
    public $posxdesc;
    /** @var float */
    public $posxearning;
    /** @var float */
    public $posxdeduction;
    /** @var Societe */
    public $emetteur;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Function to build the salary slip document
     *
     * @param Salary     $object             Object source to build document
     * @param Translate  $outputlangs         Lang output object
     * @param string     $srctemplatepath     Full path of source filename
     * @param int        $hidedetails         Hide details
     * @param int        $hidedesc            Hide description
     * @param int        $hideref             Hide reference
     * @return int                            1 if OK, <=0 if KO
     */
    public function writeFile($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Show top header of page.
     *
     * @param TCPDF     $pdf          Object PDF
     * @param Salary    $object       Object to show
     * @param Translate $outputlangs  Object lang for output
     * @param int       $showaddress  Show address
     * @return void
     */
    protected function _pagehead(&$pdf, $object, $outputlangs, $showaddress = 1)
    {
    }
    /**
     * Show the lines of the salary slip
     *
     * @param TCPDF     $pdf         PDF object
     * @param object    $object      Salary object
     * @param Translate $outputlangs Language object
     * @return void
     */
    protected function body(&$pdf, $object, $outputlangs)
    {
    }
    /**
     *   Show table header
     *
     *   @param     TCPDF		$pdf     		Object PDF
     *   @param     float		$tab_top		Top position of table
     *   @param     Translate	$outputlangs	Langs object
     *   @return    void
     */
    protected function tableauHeader(&$pdf, $tab_top, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show footer of page.
     *
     *   @param	TCPDF		$pdf     			PDF object
     * 	 @param	object		$object				Object to show
     *   @param	Translate	$outputlangs		Object lang for output
     *   @return	void
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs)
    {
    }
}