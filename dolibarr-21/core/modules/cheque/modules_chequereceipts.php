<?php

// Requis car utilise dans les classes qui heritent
/**
 *  Class parent for cheque Receipts numbering references mother class
 */
abstract class ModeleNumRefChequeReceipts extends \CommonNumRefGenerator
{
    // No overload code
    /**
     * 	Return next free value
     *
     *  @param	Societe			$objsoc		Object thirdparty
     *  @param	RemiseCheque	$object		Object we need next value for
     *  @return	string|int<-1,0>			Next value if OK, 0 if KO
     */
    public abstract function getNextValue($objsoc, $object);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}
/**
 *	Class parent for templates of document generation
 */
abstract class ModeleChequeReceipts extends \CommonDocGenerator
{
    /**
     * @var Account bank account
     */
    public $account;
    /**
     * @var string|float
     */
    public $amount;
    /**
     * @var string
     */
    public $date;
    /**
     * @var int
     */
    public $nbcheque;
    /**
     * @var string
     */
    public $ref;
    /**
     * @var stdClass[] lines
     */
    public $lines;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB  	$db                 Database handler
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Fonction to generate document on disk
     *
     *	@param	RemiseCheque	$object			Object RemiseCheque
     *	@param	string			$_dir			Directory
     *	@param	string			$number			Number
     *	@param	Translate		$outputlangs	Lang output object
     *	@return	int<-1,1>  						1=ok, 0=ko
     */
    public abstract function write_file($object, $_dir, $number, $outputlangs);
    // phpcs:enable
}
/**
 *  Cree un bordereau remise de cheque
 *
 * 	@param	DoliDB		$db				Database handler
 *	@param	int			$id				Object invoice (or id of invoice)
 *	@param	string		$message		Message
 *	@param	string		$modele			Force le modele a utiliser ('' to not force)
 *	@param	Translate	$outputlangs	Object lang a utiliser pour traduction
 *	@return int        					Return integer <0 if KO, >0 if OK
 * 	TODO Use commonDocGenerator
 */
function chequereceipt_pdf_create($db, $id, $message, $modele, $outputlangs)
{
}