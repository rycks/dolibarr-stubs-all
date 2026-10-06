<?php

/**
 *	Class to manage PDF template standard_myobject
 */
class pdf_standard_myobject extends \ModelePDFMyObject
{
    /**
     * @var DoliDB Database handler
     */
    public $db;
    /**
     * @var int The environment ID when using a multicompany module
     */
    public $entity;
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
     * @var array{0:int,1:int} Minimum version of PHP required by module.
     * e.g.: PHP ≥ 7.0 = array(7, 0)
     */
    public $phpmin = array(7, 0);
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    /**
     * Issuer
     * @var Societe Object that emits
     */
    public $emetteur;
    /**
     * @var array<string,array{rank:int,width:float|false,status:bool|int<0,1>,border-left?:bool,title:array{textkey:string,label?:string,align?:string,padding?:array{0:float,1:float,2:float,3:float}},content?:array{align?:string,padding?:array{0:float,1:float,2:float,3:float}}}>	Array of document table columns
     */
    public $cols;
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build and write pdf to disk
     *
     *  @param	MyObject	$object				Source object to generate document from
     *  @param	Translate	$outputlangs		Lang output object
     *  @param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param	int<0,1>	$hidedetails		Do not show line details
     *  @param	int<0,1>	$hidedesc			Do not show desc
     *  @param	int<0,1>	$hideref			Do not show ref
     *  @return	int<-1,1>						1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation models
     *
     *  @param  DoliDB  	$db					Database handler
     *  @param  int<0,max>	$maxfilenamelength	Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Show table for lines
     *
     *	@param	TCPDF|TCPDI	$pdf     		Object PDF
     *	@param	float		$tab_top		Top position of table
     *	@param	float		$tab_height		Height of table (rectangle)
     *	@param	int			$nexY			Y (not used)
     *	@param	Translate	$outputlangs	Langs object
     *	@param	int<-1,1>	$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     *	@param	int<0,1>	$hidebottom		Hide bottom bar of array
     *	@param	string		$currency		Currency code
     *	@param	?Translate	$outputlangsbis	Langs object bis
     *	@return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '', $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *	@param	TCPDF|TCPDI	$pdf     		Object PDF
     *	@param	MyObject	$object     	Object to show
     *	@param	int<0,1>	$showaddress    0=no, 1=yes
     *	@param	Translate	$outputlangs	Object lang for output
     *	@param	?Translate	$outputlangsbis	Object lang for output bis
     *	@return	float|int                   Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs, $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Show footer of page. Need this->emetteur object
     *
     *	@param	TCPDI|TCPDF		$pdf     		PDF
     *	@param	CommonObject	$object			Object to show
     *	@param	Translate		$outputlangs	Object lang for output
     *	@param	int<0,1>		$hidefreetext	1=Hide free text
     *	@return	int<0,1>						Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
    /**
     *	Define Array Column Field
     *
     *	@param	CommonObject	$object    		common object
     *	@param	Translate		$outputlangs    langs
     *	@param	int<0,1>		$hidedetails	Do not show line details
     *	@param	int<0,1>		$hidedesc		Do not show desc
     *	@param	int<0,1>		$hideref		Do not show ref
     *	@return	void
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}