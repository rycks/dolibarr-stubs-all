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
    /**
     * @var null|string
     */
    public $classesname;
    /**
     * @var null|string
     */
    public $objectname;
    /**
     * @var null|string
     */
    public $methodename;
    /**
     * @var null|string
     */
    public $params;
    /**
     * @var null|string
     */
    public $md5params;
    /**
     * @var null|string
     */
    public $module_name;
    /**
     * @var null|int|string
     */
    public $priority;
    /**
     * @var string|int|null		Date for last job execution
     */
    public $datelastrun = '';
    /**
     * @var string|int			Date for next job execution
     */
    public $datenextrun = '';
    /**
     * @var string|int			Date for end job execution
     */
    public $dateend = '';
    /**
     * @var string|int			Date for first start job execution
     */
    public $datestart = '';
    /**
     * @var string|int|null		Date for last result job execution
     */
    public $datelastresult = '';
    /**
     * @var string			Last result from end job execution
     */
    public $lastresult;
    /**
     * @var string 			Last output from end job execution
     */
    public $lastoutput;
    /**
     * @var string 			Unit frequency of job execution ('60', '86400', 'd', 'm', ...)
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
     * @var int|null		The job current PID
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
    /**
     * @var CommonObjectLine[] 			Cronjob
     */
    public $lines;
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    const STATUS_ARCHIVED = 2;
    const MAXIMUM_LENGTH_FOR_LASTOUTPUT_FIELD = 65535;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param	User	$user		User that creates
     * @param  int		$notrigger	0=launch triggers after, 1=disable triggers
     * @return int					if KO: <0 || if OK: Id of created object
     */
    public function create(\User $user, int $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param	int			$id				Id object
     * @param	string		$objectname		Object name
     * @param	string		$methodname		Method name
     * @return	int							if KO: <0 || if OK: >0
     */
    public function fetch(int $id, string $objectname = '', string $methodname = '')
    {
    }
    /**
     * Load list of cron jobs in a memory array from the database
     *
     * @param	string			$sortorder		Sort order
     * @param	string			$sortfield		Sort field
     * @param	int				$limit			Limit page
     * @param	int				$offset			Offset ppage
     * @param	int<-1,2>		$status			Display active or not (-1=no filter, 0=not active, 1=active, 2=archived)
     * @param	string|array<string,string>	$filter	Filter USF.
     * @param	int<-1,1>		$processing		Processing or not (-1=all, 0=not in progress, 1=in progress)
     * @return	int								if KO: <0 || if OK: >0
     */
    public function fetchAll(string $sortorder = 'DESC', string $sortfield = 't.rowid', int $limit = 0, int $offset = 0, int $status = 1, $filter = '', int $processing = -1)
    {
    }
    /**
     * Update object into database
     *
     * @param	?User		$user		User that modifies
     * @param	int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int						if KO: <0 || if OK: >0
     */
    public function update($user = \null, int $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User	$user		User that deletes
     * @param	int		$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int					if KO: <0 || if OK: >0
     */
    public function delete(\User $user, int $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param	int		$fromid		Id of object to clone
     * @return	int					New id of clone
     */
    public function createFromClone(\User $user, int $fromid)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     * Return a link to the object card (with optionally the picto)
     *
     * @param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     * @param	string	$option						On what the link point to ('nolink', ...)
     * @param	int		$notooltip					1=Disable tooltip
     * @param	string	$morecss					Add more css on link
     * @param	int		$save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, string $option = '', int $notooltip = 0, string $morecss = '', int $save_lastsearch_value = -1)
    {
    }
    /**
     * Load object information
     *
     * @param	int		$id		ID
     * @return	int				if KO: <0 || if OK: >0
     */
    public function info(int $id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Run a job.
     * Once job is finished, status and nb of run is updated.
     * This function does not plan the next run. This is done by function ->reprogram_jobs
     *
     * @param	string		$userlogin		User login
     * @return	int					 		if KO: <0 || if OK: >0
     */
    public function run_jobs(string $userlogin)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Reprogram a job
     *
     * @param	string		$userlogin		User login
     * @param	integer		$now			Date returned by dol_now()
     * @return	int							if KO: <0 || if OK: >0
     */
    public function reprogram_jobs(string $userlogin, int $now)
    {
    }
    /**
     * Return label of status of user (active, inactive)
     *
     * @param	int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return	string					Label of status
     */
    public function getLibStatut(int $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return label of a giver status
     *
     * @param	int		$status				Id status
     * @param	int		$mode				0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @param	int		$processing			0=Not running, 1=Running
     * @param	string	$lastResult			Value of last result (''=no error, error otherwise)
     * @return	string						Label of status
     */
    public function LibStatut(int $status, int $mode = 0, int $processing = 0, string $lastResult = '')
    {
    }
}