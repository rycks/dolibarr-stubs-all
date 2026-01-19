<?php

/**
 *	Class to manage PDF invoice template octopus
 */
class pdf_octopus extends \ModelePDFFactures
{
    /**
     * @var DoliDB Database handler
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
    public $version = 'disabled';
    // Disabled by default. Enabled in constructor if option INVOICE_USE_SITUATION is 2.
    /**
     * @var int height for info total
     */
    public $heightforinfotot;
    /**
     * @var int height for free text
     */
    public $heightforfreetext;
    /**
     * @var int height for footer
     */
    public $heightforfooter;
    /**
     * @var int tab_top
     */
    public $tab_top;
    /**
     * @var int tab_top_newpage
     */
    public $tab_top_newpage;
    /**
     * Issuer
     * @var Societe Object that emits
     */
    public $emetteur;
    /**
     * @var bool Situation invoice type
     */
    public $situationinvoice;
    /**
     * @var array<string,array{rank:int,width:float|int,title:array{textkey:string,label:string,align:string,padding:array{0:float,1:float,2:float,3:float}},content:array{align:string,padding:array{0:float,1:float,2:float,3:float}}}>	Array of columns
     */
    public $cols;
    /**
     * @var int Category of operation
     */
    public $categoryOfOperation = -1;
    // unknown by default
    /**
     * Situation invoices
     *
     * @var array{derniere_situation:Facture,date_derniere_situation:int,current:array}	Data of situation
     */
    public $TDataSituation;
    /**
     * @var int posx cumul anterieur
     */
    public $posx_cumul_anterieur;
    /**
     * @var int posx new cumul
     */
    public $posx_new_cumul;
    /**
     * @var int posx current
     */
    public $posx_current;
    /**
     * @var int tabTitleHeight
     */
    public $tabTitleHeight;
    /**
     * @var int is rg
     */
    public $is_rg;
    /**
     * @var bool franchise
     */
    public $franchise;
    /**
     * @var int
     */
    public $tplidx;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build pdf onto disk
     *
     *  @param		Facture		$object				Object to generate
     *  @param		Translate	$outputlangs		Lang output object
     *  @param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int			$hidedetails		Do not show line details
     *  @param		int			$hidedesc			Do not show desc
     *  @param		int			$hideref			Do not show ref
     *  @return     int         	    			1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *  Show payments table
     *
     *  @param	TCPDF		$pdf            Object PDF
     *  @param  Facture		$object         Object invoice
     *  @param  int			$posy           Position y in PDF
     *  @param  Translate	$outputlangs    Object langs for output
     *  @return int             			Return integer <0 if KO, >0 if OK
     */
    public function drawPaymentsTable(&$pdf, $object, $posy, $outputlangs)
    {
    }
    /**
     *   Show miscellaneous information (payment mode, payment term, ...)
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		Facture		$object			Object to show
     *   @param		int			$posy			Y
     *   @param		Translate	$outputlangs	Langs object
     *   @param  	Translate	$outputlangsbis	Object lang for output bis
     *   @return	int							Pos y
     */
    protected function drawInfoTable(&$pdf, $object, $posy, $outputlangs, $outputlangsbis)
    {
    }
    /**
     *  Show total to pay
     *
     *  @param	TCPDF		$pdf            Object PDF
     *	@param  Facture		$object         Object invoice
     *	@param  int			$deja_regle     Amount already paid (in the currency of invoice)
     *	@param	int			$posy			Position depart
     *	@param	Translate	$outputlangs	Object langs
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *	@return int							Position pour suite
     */
    protected function drawTotalTable(&$pdf, $object, $deja_regle, $posy, $outputlangs, $outputlangsbis)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show table for lines
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		int 		$tab_top		Top position of table
     *   @param		int 		$tab_height		Height of table (rectangle)
     *   @param		int			$nexY			Y (not used)
     *   @param		Translate	$outputlangs	Langs object
     *   @param		int			$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     *   @param		int			$hidebottom		Hide bottom bar of array
     *   @param		string		$currency		Currency code
     *   @param		Translate	$outputlangsbis	Langs object bis
     *   @return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '', $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page. This include the logo, ref and address blocks
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Facture		$object     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes (usually set to 1 for first page, and 0 for next pages)
     *  @param  Translate	$outputlangs	Object lang for output
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *  @return	array						top shift of linked object lines
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs, $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   	Show footer of page. Need this->emetteur object
     *
     *   	@param	TCPDF		$pdf     			PDF
     * 		@param	Facture		$object				Object to show
     *      @param	Translate	$outputlangs		Object lang for output
     *      @param	int			$hidefreetext		1=Hide free text
     *      @return	int								Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
    /**
     *  Define Array Column Field
     *
     *  @param	Facture		   $object    		common object
     *  @param	Translate	   $outputlangs     langs
     *  @param	int			   $hidedetails		Do not show line details
     *  @param	int			   $hidedesc		Do not show desc
     *  @param	int			   $hideref			Do not show ref
     *  @return	void
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *   Show table for lines
     *
     *   @param		TCPDF		$pdf	 		Object PDF
     *   @param		int  		$tab_top		Top position of table
     *   @param		int 		$tab_height		Height of table (rectangle)
     *   @param		int			$nexY			Y (not used)
     *   @param		Translate	$outputlangs	Langs object
     *   @param		int			$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     *   @param		int			$hidebottom		Hide bottom bar of array
     *   @param		string		$currency		Currency code
     *   @return	void
     */
    public function _tableFirstPage(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '')
    {
    }
    /**
     * Recovers data from situation invoices
     *
     * NOTE :
     * 	Main work: lines on the status invoice that were already present on the previous invoice
     * 	Additional work: lines on the status invoice that have been added to the previous invoice
     * 	Example : S1 with l1 (tp), l2 (tp)
     * 			  S2 with l1 (tp), l2 (tp), l3 (ts)
     * 			  S3 with l1 (tp), l2 (tp), l3 (tp), l4 (ts)
     *
     * @param   Facture $object  Facture
     *
     * @return  array
     *
     * Details of returned table
     *
     * cumul_anterieur: data from previous status invoice
     * nouveau_cumul: Cumulative data from all invoices up to the current one
     * current: current status invoice data
     *
     */
    public function getDataSituation(&$object)
    {
    }
    /**
     * Calculates the sum of two arrays, key by key, taking into account nested arrays
     *
     * @param   array  $a  [$a description]
     * @param   array  $b  [$b description]
     *
     * @return  array	  [return description]
     */
    public function sumSituation($a, $b)
    {
    }
    /**
     * Display retained Warranty
     *
     * @param   Facture $object  Facture
     * @return	bool
     */
    public function displayRetainedWarranty($object)
    {
    }
    /**
     * Get info line of the last situation
     *
     * @param  Facture	$object		Object
     * @param  FactureLigne			$current_line	current line
     * @return void|array{progress_prec:float,total_ht_without_progress:float,total_ht:float}
     */
    public function getInfosLineLastSituation(&$object, &$current_line)
    {
    }
    /**
     * Rect pdf
     *
     * @param	TCPDF	$pdf			Object PDF
     * @param	float	$x				Abscissa of first point
     * @param	float	$y				Ordinate of first point
     * @param	float	$l				??
     * @param	float	$h				??
     * @param	int		$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     * @param	int		$hidebottom		Hide bottom
     * @return	void
     */
    public function printRectBtp(&$pdf, $x, $y, $l, $h, $hidetop = 0, $hidebottom = 0)
    {
    }
    /**
     * Get data about invoice
     *
     * @param   int  	$id					invoice id
     * @param   boolean $forceReadFromDB  	set to true if you want to force refresh data from SQL
     *
     * @return  array	   [return description]
     */
    public function btpGetInvoiceAmounts($id, $forceReadFromDB = \false)
    {
    }
    /**
     *  Show last page with a resume of all invoices
     *
     *  @param	TCPDF		$pdf			Object PDF
     *	@param  Facture		$object         Object invoice
     *	@param  int			$deja_regle     Amount already paid (in the currency of invoice)
     *	@param	int			$posy           Position depart
     *	@param	Translate	$outputlangs    Object langs
     *  @param  Translate	$outputlangsbis Object lang for output bis
     *	@return void
     */
    public function resumeLastPage(&$pdf, $object, $deja_regle, $posy, $outputlangs, $outputlangsbis)
    {
    }
}