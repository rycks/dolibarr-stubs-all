<?php

// Requis car utilise dans les classes qui heritent
/**
 *  \class      ModeleNumRefChequeReceipts
 *  \brief      Cheque Receipts numbering references mother class
 */
abstract class ModeleNumRefChequeReceipts
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *	Return if a module can be used or not
     *
     *	@return		boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     *	Return the default description of numbering module
     *
     *	@return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *	Return numbering example
     *
     *	@return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test if the existing numbers in the database do not cause conflicts that would prevent this numbering run.
     *
     *	@return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *	Returns the next value
     *
     *	@param	Societe		$objsoc     Object thirdparty
     *	@param	Object		$object		Object we need next value for
     *	@return	string      Valeur
     */
    public function getNextValue($objsoc, $object)
    {
    }
    /**
     *	Returns the module numbering version
     *
     *	@return     string      Value
     */
    public function getVersion()
    {
    }
}
/**
 *	\class      ModeleChequeReceipts
 *	\brief      Classe mere des modeles de
 */
abstract class ModeleChequeReceipts extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
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
}
/**
 *  Cree un bordereau remise de cheque
 *
 * 	@param	DoliDB		$db				Database handler
 *	@param	int			$id				Object invoice (or id of invoice)
 *	@param	string		$message		Message
 *	@param	string		$modele			Force le modele a utiliser ('' to not force)
 *	@param	Translate	$outputlangs	Object lang a utiliser pour traduction
 *	@return int        					<0 if KO, >0 if OK
 * 	TODO Use commonDocGenerator
 */
function chequereceipt_pdf_create($db, $id, $message, $modele, $outputlangs)
{
}