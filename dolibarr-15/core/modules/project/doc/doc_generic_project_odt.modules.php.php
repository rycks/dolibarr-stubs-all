<?php

/**
 *	Class to build documents using ODF templates generator
 */
class doc_generic_project_odt extends \ModelePDFProjects
{
    /**
     * Issuer
     * @var Societe
     */
    public $emetteur;
    /**
     * @var array Minimum version of PHP required by module.
     * e.g.: PHP ≥ 5.6 = array(5, 6)
     */
    public $phpmin = array(5, 6);
    /**
     * Dolibarr version of the loaded document
     * @var string
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   Project			$object             Main object to use as data source
     * @param   Translate		$outputlangs        Lang object to use for output
     * @param   string		    $array_key	        Name of the key for return array
     * @return	array								Array of substitution
     */
    public function get_substitutionarray_object($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array			$task				Task Object
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_tasks(\Task $task, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array			$contact			Contact array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_project_contacts($contact, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array			$file				file array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_project_file($file, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array			$refdetail			Reference array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_project_reference($refdetail, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array			$taskressource			Reference array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_tasksressource($taskressource, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  object			$tasktime			times object
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_taskstime($tasktime, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array			$file				file array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array								Return a substitution array
     */
    public function get_substitutionarray_task_file($file, $outputlangs)
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
     *	Function to build a document on disk using the generic odt module.
     *
     *	@param	Project		$object					Object source to build document
     *	@param	Translate	$outputlangs			Lang output object
     * 	@param	string		$srctemplatepath	    Full path of source filename for generator using a template file
     *	@return	int         						1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath)
    {
    }
}