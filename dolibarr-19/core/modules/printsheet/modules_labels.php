<?php

/**
 *  Parent class of document generator for address sheet.
 */
class ModelePDFLabels
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
// phpcs:disable PEAR.NamingConventions.ValidFunctionName.NotCamelCaps
/**
 *  Create a document onto disk according to template module.
 *
 *	@param  DoliDB		$db					Database handler
 *	@param  array		$arrayofrecords		Array of records
 *	@param	string		$modele				Force le modele a utiliser ('' to not force)
 *	@param	Translate	$outputlangs		Objet lang a utiliser pour traduction
 *	@param	string		$outputdir			Output directory
 *  @param  string      $template           pdf generenate document class to use default 'standardlabel'
 *  @param  string      $filename           Short file name of PDF output file
 *	@return int        						Return integer <0 if KO, >0 if OK
 */
function doc_label_pdf_create($db, $arrayofrecords, $modele, $outputlangs, $outputdir = '', $template = 'standardlabel', $filename = 'tmp_address_sheet.pdf')
{
}