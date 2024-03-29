<?php

/**
 *	Class to build documents using ODF templates generator
 */
class doc_generic_contract_odt extends \ModelePDFContract
{
    /**
     * Issuer
     * @var Societe
     */
    public $emetteur;
    /**
     * @var array Minimum version of PHP required by module.
     * e.g.: PHP ≥ 5.5 = array(5, 5)
     */
    public $phpmin = array(5, 5);
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
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
     *  @param		Contrat		$object				Object source to build document
     *  @param		Translate	$outputlangs		Lang output object
     *  @param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int			$hidedetails		Do not show line details
     *  @param		int			$hidedesc			Do not show desc
     *  @param		int			$hideref			Do not show ref
     *  @return		int         					1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}