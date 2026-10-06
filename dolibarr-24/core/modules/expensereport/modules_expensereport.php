<?php

/**
 *	Parent class for trips and expenses templates
 */
abstract class ModeleExpenseReport extends \CommonDocGenerator
{
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
     *  Function to build pdf onto disk
     *
     *  @param	ExpenseReport	$object				Object to generate
     *  @param	Translate		$outputlangs		Lang output object
     *  @param	string			$srctemplatepath	Full path of source filename for generator using a template file
     *  @param	int<0,1>		$hidedetails		Do not show line details
     *  @param	int<0,1>		$hidedesc			Do not show desc
     *  @param	int<0,1>		$hideref			Do not show ref
     *  @return int<0,1>           					1=OK, 0=KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
}
/**
 *  Parent class for numbering masks of expense reports
 */
abstract class ModeleNumRefExpenseReport extends \CommonNumRefGenerator
{
    /**
     *  Return next free value
     *
     *  @param  ExpenseReport	$object     Object we need next value for
     *  @return string|int<-1,0>   			Next value if OK, -1 or 0 if KO
     */
    public abstract function getNextValue($object);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
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