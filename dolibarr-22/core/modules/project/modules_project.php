<?php

/**
 *	Parent class for projects models
 */
abstract class ModelePDFProjects extends \CommonDocGenerator
{
    /**
     * @var DoliDB Database handler
     */
    public $db;
    /**
     * @var string model description (short text)
     */
    public $description;
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
     *	Function to build pdf project onto disk
     *
     *	@param	Project			$object					Object source to build document
     *	@param	Translate		$outputlangs			Lang output object
     * 	@param	string			$srctemplatepath	    Full path of source filename for generator using a template file
     *	@return	int<-1,1>      							1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '');
    // phpcs:enable
}
/**
 *  Class parent for numbering modules of tasks
 */
abstract class ModeleNumRefProjects extends \CommonNumRefGenerator
{
    /**
     *  Return next value
     *
     *  @param   ?Societe		$objsoc		Object third party
     *  @param   Project		$project	Object project
     *  @return  string|int<-1,0>			Value if OK, 0 if KO
     */
    public abstract function getNextValue($objsoc, $project);
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}