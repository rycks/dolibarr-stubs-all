<?php

/**
 *	\class      ModeleAction
 *	\brief      Parent class for product models of doc generators
 */
abstract class ModeleAction extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     * 	@param	DoliDB		$db					Database handler
     *  @param	integer		$maxfilenamelength  Max length of value to show
     * 	@return	array							List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
// phpcs:disable PEAR.NamingConventions.ValidFunctionName.NotCamelCaps
/**
 *  Create a product document on disk using template defined into PRODUCT_ADDON_PDF
 *
 *  @param	DoliDB		$db  			data base object
 *  @param	Object		$object			Object fichinter
 *  @param	string		$modele			forces the model to use ('' by default)
 *  @param	Translate	$outputlangs	lang object to use for translation
 *  @param  int			$hidedetails    Hide details of lines
 *  @param  int			$hidedesc       Hide description
 *  @param  int			$hideref        Hide ref
 *  @return int         				0 if KO, 1 if OK
 */
function action_create($db, $object, $modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
{
}