<?php

/**
 *	Class to build documents using ODF templates generator
 */
class doc_generic_member_odt extends \ModelePDFMember
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
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
     *	@param	Adherent	$object				Object source to build document
     *	@param	Translate	$outputlangs		Lang output object
     * 	@param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	string		$mode				Tell if doc module is called for 'member', ...
     *  @param  int<0,1>	$nooutput           1=Generate only file on disk and do not return it on response
     *  @param	string		$filename			Name of output file (without extension)
     *	@return	int<-1,1>       				1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $mode = 'member', $nooutput = 0, $filename = 'tmp_cards')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get substitution array for object
     *
     * @param CommonObject  $object         member
     * @param Translate     $outputlangs    translation object
     * @param string        $array_key      key for array
     * @return array<string,string>			Array of substitutions
     */
    public function get_substitutionarray_object($object, $outputlangs, $array_key = 'object')
    {
    }
}