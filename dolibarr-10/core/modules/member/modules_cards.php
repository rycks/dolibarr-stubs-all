<?php

/**
 *	Parent class of document generator for members cards.
 */
class ModelePDFCards
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of active generation modules
     *
     *	@param	DoliDB	$db					Database handler
     *	@param	integer	$maxfilenamelength	Max length of value to show
     *	@return	array						List of templates
     */
    public function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
// phpcs:disable PEAR.NamingConventions.ValidFunctionName.NotCamelCaps
/**
 *	Cree un fichier de cartes de visites en fonction du modele de ADHERENT_CARDS_ADDON_PDF
 *
 *	@param	DoliDB		$db				Database handler
 *	@param	array		$arrayofmembers	Array of members
 *	@param	string		$modele			Force modele to use ('' to not force)
 *	@param	Translate	$outputlangs	Object langs to use for translation
 *	@param	string		$outputdir		Output directory
 *	@param	string		$template		pdf generenate document class to use default 'standard'
 *	@return int							<0 if KO, >0 if OK
 */
function members_card_pdf_create($db, $arrayofmembers, $modele, $outputlangs, $outputdir = '', $template = 'standard')
{
}