<?php

/**
 *	Class to build documents using ODF templates generator
 */
class doc_generic_task_odt extends \ModelePDFTask
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Define array with couple substitution key => substitution value
     *
     * @param   CommonObject	$object             Main object to use as data source
     * @param   Translate		$outputlangs        Lang object to use for output
     * @param   string		    $array_key	        Name of the key for return array
     * @return	array<string,int|string>			Array of substitution
     */
    public function get_substitutionarray_object($object, $outputlangs, $array_key = 'object')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  Task			$task				Task Object
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @param  string		    $array_key	        Name of the key for return array
     *  @return	array<string,int|string>			Return a substitution array
     */
    public function get_substitutionarray_tasks($task, $outputlangs, $array_key = 'task')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{id:int,rowid:int,libelle:string,lastname:string,firstname:string,fullname:string,socname:string,email:string}			$contact			Contact array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array<string,int|string>			Return a substitution array
     */
    public function get_substitutionarray_project_contacts($contact, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{name:string,path:string,level1name:string,relativename:string,fullname:string,date:string,size:int,perm:int,type:string}	$file		file array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array<string,int|string>			Return a substitution array
     */
    public function get_substitutionarray_project_file($file, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{type:string,ref:string,date:int,socname:string,amountht:float|string,amountttc:float|string,status:string}			$refdetail			Reference array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array<string,int|string>			Return a substitution array
     */
    public function get_substitutionarray_project_reference($refdetail, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{rowid:int,libelle:string,lastname:string,firstname:string,fullname:string,socname:string,email:string}		$taskresource		Resource array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array<string,int|string>			Return a substitution array
     */
    public function get_substitutionarray_tasksressource($taskresource, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{rowid:int,task_date:string,task_duration:int,note:string,fk_user:int,lastname:string,firstname:string,fullcivname:string}		$tasktime	times object
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array<string,string|int>			Return a substitution array
     */
    public function get_substitutionarray_taskstime($tasktime, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{name:string,date:string,size:int}	$file		file array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array{tasksfile_name:string,tasksfile_date:string,tasksfile_size:int}		Return a substitution array
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
     *	@param	Task		$object					Object source to build document
     *	@param	Translate	$outputlangs			Lang output object
     * 	@param	string		$srctemplatepath		Full path of source filename for generator using a template file
     *	@return	int<-1,1>							1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '')
    {
    }
}