<?php

/**
 *	Class to build documents using ODF templates generator
 */
class doc_generic_project_odt extends \ModelePDFProjects
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
     * @return	array<string,mixed>					Array of substitution
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
     *  @return	array{task_ref:string,task_fk_project:string,task_projectref:string,task_projectlabel:string,task_label:string,task_description:string,task_fk_parent:string,task_duration:string,task_duration_hour:string,task_planned_workload:string,task_planned_workload_hour:string,task_progress:string,task_public:string,task_date_start:string,task_date_end:string,task_note_private:string,task_note_public:string}			Return a substitution array + extrafields
     */
    public function get_substitutionarray_tasks(\Task $task, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param	array{id:int,rowid:int,libelle:string,lastname:string,firstname:string,civility:string,fullname:string,socname:string,email:string,source:string}		$contact			Contact array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *	@return	array{projcontacts_id:int,projcontacts_rowid:int,projcontacts_role:string,projcontacts_lastname:string,projcontacts_firstname:string,projcontacts_civility:string,projcontacts_fullcivname:string,projcontacts_socname:string,projcontacts_email:string,projcontacts_isInternal:''|'0'|'1',projcontacts_phone_pro:string,projcontacts_phone_perso:string,projcontacts_phone_mobile:string}		Return a substitution array (+ extrafields)
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
     *  @return	array{projfile_name:string,projfile_date:string,projfile_size:int}		Return a substitution array
     */
    public function get_substitutionarray_project_file($file, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{type:string,ref:string,date:string,socname:string,amountht:float|'',amountttc:float|'',status:string}		$refdetail			Reference array
     *	@param  Translate		$outputlangs        Lang object to use for output
     *  @return	array{projref_type:string,projref_ref:string,projref_date:string,projref_socname:string,projref_amountht:string,projref_amountttc:string,projref_status:string}								Return a substitution array
     */
    public function get_substitutionarray_project_reference($refdetail, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param	array{rowid:int,libelle:string,lastname:string,firstname:string,fullname:string,socname:string,email:string}		$taskresource		Reference array
     *	@param  Translate		$outputlangs        	Lang object to use for output
     *	@return	array{taskressource_rowid:int,taskressource_role:string,taskressource_lastname:string,taskressource_firstname:string,taskressource_fullcivname:string,taskressource_socname:string,taskressource_email:string}		Return a substitution array
     */
    public function get_substitutionarray_tasksressource($taskresource, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param	array{rowid:int,task_date:int,task_duration:int,note:string,fk_user:int,name:string,firstname:string,fullcivname:string,amountht:float,amountttc:float,thm:int} 	$tasktime			Array of times object
     *	@param  Translate		$outputlangs        Lang object to use for output
     *	@return	array{tasktime_rowid:int,tasktime_task_date:string,tasktime_task_duration_sec:int,tasktime_task_duration:string,tasktime_note:string,tasktime_fk_user:int,tasktime_user_name:string,tasktime_user_first:string,tasktime_fullcivname:string,tasktime_amountht:float,tasktime_amountttc:float,tasktime_thm:int}		Return a substitution array
     */
    public function get_substitutionarray_taskstime($tasktime, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define array with couple substitution key => substitution value
     *
     *	@param  array{name:string,path:string,level1name:string,relativename:string,fullname:string,date:string,size:int,perm:int,type:string}	$file		file array
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
     *	@param	Project		$object					Object source to build document
     *	@param	Translate	$outputlangs			Lang output object
     * 	@param	string		$srctemplatepath	    Full path of source filename for generator using a template file
     *	@return	int<-1,1>      						1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '')
    {
    }
}