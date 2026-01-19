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
    /**
     * @var string error message
     */
    public $error;
    /**
     * @var string[] array of errors messages
     */
    public $errors;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var int edition date
     */
    public $date_edition;
    /**
     * @var int year
     */
    public $year;
    /**
     * @var int month
     */
    public $month;
    /**
     * @var string title
     */
    public $title;
    /**
     * @var string subject
     */
    public $subject;
    /**
     * @var int left margin
     */
    public $marge_gauche;
    /**
     * @var int right margin
     */
    public $marge_droite;
    /**
     * @var int top margin
     */
    public $marge_haute;
    /**
     * @var int bottom margin
     */
    public $marge_basse;
    /**
     * @var array{0:float,1:float} format
     */
    public $format;
    /**
     * @var string type of doc
     */
    public $type;
    /**
     * @var int page height
     */
    public $page_hauteur;
    /**
     * @var int page wicth
     */
    public $page_largeur;
    /**
     * @var int corner radius
     */
    public $corner_radius;
    /**
     * @var array{fullpath:string}
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
     * Write the object to document file to disk
     *
     * @param  ?CommonObject	$object			Order/...
     * @param  Translate		$outputlangs    Lang object for output language
     * @return int<0,1>     			    	1=OK, 0=KO
     */
    public function write_file($object, $outputlangs)
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