<?php

/**
 *	Cron Job class
 */
class Cronjob extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'cronjob';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'cronjob';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'cron';
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string Job type
     */
    public $jobtype;
    /**
     * @var string|int     Date for last cron object update
     */
    public $tms = '';
    /**
     * @var string|int     Date for cron job create
     */
    public $datec = '';
    /**
     * @var string Cron Job label
     */
    public $label;
    /**
     * @var string Job command
     */
    public $command;
    public $classesname;
    public $objectname;
    public $methodename;
    public $params;
    public $md5params;
    public $module_name;
    public $priority;
    /**
     * @var string|int     Date for last job execution
     */
    public $datelastrun = '';
    /**
     * @var string|int     Date for next job execution
     */
    public $datenextrun = '';
    /**
     * @var string|int     Date for end job execution
     */
    public $dateend = '';
    /**
     * @var string|int     Date for first start job execution
     */
    public $datestart = '';
    /**
     * @var string|int     Date for last result job execution
     */
    public $datelastresult = '';
    /**
     * @var string 			Last result from end job execution
     */
    public $lastresult;
    /**
     * @var string 			Last output from end job execution
     */
    public $lastoutput;
    /**
     * @var string 			Unit frequency of job execution
     */
    public $unitfrequency;
    /**
     * @var int 			Frequency of job execution
     */
    public $frequency;
    /**
     * @var int 			Status
     */
    public $status;
    /**
     * @var int 			Is job running ?
     */
    public $processing;
    /**
     * @var int 			The job current PID
     */
    public $pid;
    /**
     * @var string 			Email when an error occurs
     */
    public $email_alert;
    /**
     * @var int 			User ID of creation
     */
    public $fk_user_author;
    /**
     * @var int 			User ID of last modification
     */
    public $fk_user_mod;
    /**
     * @var int 			Number of run job execution
     */
    public $nbrun;
    /**
     * @var int 			Maximum run job execution
     */
    public $maxrun;
    /**
     * @var string 			Libname
     */
    public $libname;
    /**
     * @var string 			A test condition to know if job is visible/qualified
     */
    public $test;
    /**
     * @var string 			Autodelete
     */
    public $autodelete;
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    const STATUS_ARCHIVED = 2;
    /**
     *  Constructor
     *
     *  @param	DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param	User	$user        User that creates
     *  @param  int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return int      		   	 <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    			Id object
     *  @param	string	$objectname		Object name
     *  @param	string	$methodname		Method name
     *  @return int          			<0 if KO, >0 if OK
     */
    public function fetch($id, $objectname = '', $methodname = '')
    {
    }
    /**
     *  Load list of cron jobs in a memory array from the database
     *  @TODO Use object CronJob and not CronJobLine.
     *
     *  @param	string		$sortorder      sort order
     *  @param	string		$sortfield      sort field
     *  @param	int			$limit		    limit page
     *  @param	int			$offset    	    page
     *  @param	int			$status    	    display active or not
     *  @param	array		$filter    	    filter output
     *  @param  int         $processing     Processing or not
     *  @return int          			    <0 if KO, >0 if OK
     */
    public function fetchAll($sortorder = 'DESC', $sortfield = 't.rowid', $limit = 0, $offset = 0, $status = 1, $filter = '', $processing = -1)
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that deletes
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	User	$user		User making the clone
     *	@param	int		$fromid     Id of object to clone
     * 	@return	int					New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *	Initialise object with example values
     *	Id must be 0 if object instance is a specimen
     *
     *	@return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *	Load object information
     *
     *  @param	int		$id		ID
     *	@return	int				<0 if KO, >0 if OK
     */
    public function info($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Run a job.
     * Once job is finished, status and nb of run is updated.
     * This function does not plan the next run. This is done by function ->reprogram_jobs
     *
     * @param   string		$userlogin    	User login
     * @return	int					 		<0 if KO, >0 if OK
     */
    public function run_jobs($userlogin)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Reprogram a job
     *
     * @param  string		$userlogin      User login
     * @param  integer      $now            Date returned by dol_now()
     * @return int					        <0 if KO, >0 if OK
     */
    public function reprogram_jobs($userlogin, $now)
    {
    }
    /**
     *  Return label of status of user (active, inactive)
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$status        	Id statut
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *	@param	int		$processing		0=Not running, 1=Running
     *  @param	int		$lastresult		Value of last result (0=no error, error otherwise)
     *  @return string 			       	Label of status
     */
    public function LibStatut($status, $mode = 0, $processing = 0, $lastresult = 0)
    {
    }
}
/**
 *	Crob Job line class
 */
class Cronjobline
{
    /**
     * @var int ID
     */
    public $id;
    public $entity;
    /**
     * @var string Ref
     */
    public $ref;
    public $tms = '';
    public $datec = '';
    /**
     * @var string Cron Job Line label
     */
    public $label;
    public $jobtype;
    public $command;
    public $classesname;
    public $objectname;
    public $methodename;
    public $params;
    public $md5params;
    public $module_name;
    public $priority;
    public $datelastrun = '';
    public $datenextrun = '';
    public $dateend = '';
    public $datestart = '';
    public $datelastresult = '';
    public $lastresult = '';
    public $lastoutput;
    public $unitfrequency;
    public $frequency;
    public $processing;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_mod;
    public $note;
    public $note_private;
    public $nbrun;
    public $libname;
    public $test;
    /**
     *  Constructor
     *
     */
    public function __construct()
    {
    }
}