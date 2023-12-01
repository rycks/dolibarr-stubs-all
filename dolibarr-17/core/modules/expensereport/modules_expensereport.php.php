<?php

/**
 *	Parent class for trips and expenses templates
 */
abstract class ModeleExpenseReport extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int page_largeur
     */
    public $page_largeur;
    /**
     * @var int page_hauteur
     */
    public $page_hauteur;
    /**
     * @var array format
     */
    public $format;
    /**
     * @var int marge_gauche
     */
    public $marge_gauche;
    /**
     * @var int marge_droite
     */
    public $marge_droite;
    /**
     * @var int marge_haute
     */
    public $marge_haute;
    /**
     * @var int marge_basse
     */
    public $marge_basse;
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active models generation
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *  \class      ModeleNumRefExpenseReport
 *  \brief      Parent class for numbering masks of expense reports
 */
abstract class ModeleNumRefExpenseReport
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *	Return if a model can be used or not
     *
     *	@return		boolean     true if model can be used
     */
    public function isEnabled()
    {
    }
    /**
     *	Returns the default description of the numbering model
     *
     *	@return     string      Descriptive text
     */
    public function info()
    {
    }
    /**
     *	Returns an example of numbering
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *	Test whether the numbers already in force in the base do not cause conflicts that would prevent this numbering working.
     *
     *	@return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Returns next assigned value
     *
     *	@param	Object		$object		Object we need next value for
     *	@return	string      Value
     */
    public function getNextValue($object)
    {
    }
    /**
     *  Returns the version of the numbering module
     *
     *  @return     string      Value
     */
    public function getVersion()
    {
    }
}
/**
 * expensereport_pdf_create
 *
 *  @param	    DoliDB		$db  			Database handler
 *  @param	    ExpenseReport	$object		Object ExpenseReport
 *  @param		string		$message		Message
 *  @param	    string		$modele			Force the model to use ('' to not force)
 *  @param		Translate	$outputlangs	lang object to use for translation
 *  @param      int			$hidedetails    Hide details of lines
 *  @param      int			$hidedesc       Hide description
 *  @param      int			$hideref        Hide ref
 *  @return     int         				0 if KO, 1 if OK
 */
function expensereport_pdf_create(\DoliDB $db, \ExpenseReport $object, $message, $modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
{
}