<?php

/**
 *	Class to generate event report
 */
class pdf_standard_actions
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $error;
    public $errors;
    /**
     * @var string description
     */
    public $description;
    public $date_edition;
    public $year;
    public $month;
    public $title;
    public $subject;
    public $marge_gauche;
    public $marge_droite;
    public $marge_haute;
    public $marge_basse;
    public $format;
    public $type;
    public $page_hauteur;
    public $page_largeur;
    /**
     * @var array
     */
    public $result;
    /**
     * Constructor
     *
     * @param 	DoliDB	$db		Database handler
     * @param	int		$month	Month
     * @param	int		$year	Year
     */
    public function __construct($db, $month, $year)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Write the object to document file to disk
     *
     *      @param	int			$socid			Thirdparty id
     *      @param  Translate	$outputlangs    Lang object for output language
     *      @return int             			1=OK, 0=KO
     */
    public function write_file($socid, $outputlangs)
    {
    }
    /**
     * Write content of pages
     *
     * @param   TCPDF		$pdf			Object pdf
     * @param	Translate   $outputlangs	Object langs
     * @return  int							1
     */
    private function _pages(&$pdf, $outputlangs)
    {
    }
    /**
     *	Show top header of page.
     *
     *	@param	TCPDF		$pdf     		Object PDF
     *	@param  Translate	$outputlangs	Object lang for output
     *	@param	int			$pagenb			Page nb
     *  @return	float						Return topshift value
     */
    private function _pagehead(&$pdf, $outputlangs, $pagenb)
    {
    }
}