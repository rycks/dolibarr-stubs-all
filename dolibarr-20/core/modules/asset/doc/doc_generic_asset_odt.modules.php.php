<?php

/**
 *	Class to build documents using ODF templates generator
 */
class doc_generic_asset_odt extends \ModelePDFAsset
{
    /**
     * @var string Dolibarr version of the loaded document
     */
    public $version = 'dolibarr';
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Return description of a module
     *
     *	@param	Translate	$langs      Lang object to use for output
     *	@return string       			Description
     */
    public function info($langs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build a document on disk using the generic odt module.
     *
     *	@param		Asset		$object				Object source to build document
     *	@param		Translate	$outputlangs		Lang output object
     * 	@param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int			$hidedetails		Do not show line details
     *  @param		int			$hidedesc			Do not show desc
     *  @param		int			$hideref			Do not show ref
     *	@return		int         					1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}