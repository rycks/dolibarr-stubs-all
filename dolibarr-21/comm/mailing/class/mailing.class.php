<?php

/**
 *	Class to manage emailings module
 */
class Mailing extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'mailing';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'mailing';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'email';
    /**
     * @var string Type of message ('email', 'sms')
     */
    public $messtype;
    /**
     * @var string title
     */
    public $title;
    /**
     * @var string subject
     */
    public $sujet;
    /**
     * @var string body
     */
    public $body;
    /**
     * @var	int		1=Email will be sent even to email that has opt-out
     */
    public $evenunsubscribe;
    /**
     * @var int number of email
     */
    public $nbemail;
    /**
     * @var string background color
     */
    public $bgcolor;
    /**
     * @var string background image
     */
    public $bgimage;
    /**
     * @var int status
     * @deprecated Use $status
     */
    public $statut;
    // Status 0=Draft, 1=Validated, 2=Sent partially, 3=Sent completely
    /**
     * @var int status
     */
    public $status;
    // Status 0=Draft, 1=Validated, 2=Sent partially, 3=Sent completely
    /**
     * @var string email from
     */
    public $email_from;
    /**
     * @var string email to
     */
    public $sendto;
    /**
     * @var string email reply to
     */
    public $email_replyto;
    /**
     * @var string email errors to
     */
    public $email_errorsto;
    /**
     * @var string first joined file
     */
    public $joined_file1;
    /**
     * @var string second joined file
     */
    public $joined_file2;
    /**
     * @var string third joined file
     */
    public $joined_file3;
    /**
     * @var string fourth joined file
     */
    public $joined_file4;
    /**
     * @var int|null date sending
     */
    public $date_envoi;
    /**
     * @var array<string,string>  (Encoded as JSON in database)
     */
    public $extraparams = array();
    /**
     * @var array<int,string> statut dest
     */
    public $statut_dest = array();
    /**
     * @var array<string,string> substitutionarray
     */
    public $substitutionarray;
    /**
     * @var array<string,string> substitutionarrayfortest
     */
    public $substitutionarrayfortest;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_SENTPARTIALY = 2;
    const STATUS_SENTCOMPLETELY = 3;
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create an EMailing
     *
     *  @param	User	$user 		Object of user making creation
     * 	@param	int		$notrigger	Disable triggers
     *  @return int				    Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Update emailing record
     *
     *  @param  User	$user 		Object of user making change
     * 	@param	int		$notrigger	Disable triggers
     *  @return int				    Return integer < 0 if KO, > 0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *	Get object from database
     *
     *	@param	int		$rowid      Id of emailing
     *	@param	string	$ref		Title to search from title
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid, $ref = '')
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	User	$user		    User making the clone
     *	@param  int		$fromid     	Id of object to clone
     *	@param	int		$option1		1=Clone content, 0=Forget content
     *	@param	int		$option2		1=Clone recipients
     *	@return	int						New id of clone
     */
    public function createFromClone(\User $user, $fromid, $option1, $option2)
    {
    }
    /**
     *  Validate emailing
     *
     *  @param	User	$user      	Object user qui valide
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function valid($user)
    {
    }
    /**
     *  Delete emailing
     *
     *  @param	User	$user		User that delete
     *  @param	int		$notrigger	Disable triggers
     *  @return int         		>0 if OK, <0 if KO
     */
    public function delete($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Delete targets emailing
     *
     *  @return int       1 if OK, 0 if error
     */
    public function delete_targets()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Change status of each recipient
     *
     *	@param	User	$user      	Object user qui valide
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function reset_targets_status($user)
    {
    }
    /**
     *  Reset status of a specific recipient in error
     *
     *	@param	User	$user      	Object user qui valide
     *	@param	int	$id      		Recipient id to reset
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function resetTargetErrorStatus($user, $id)
    {
    }
    /**
     *  Count number of target with status
     *
     *  @param  string	$mode   Mode ('alreadysent' = Sent success or error, 'alreadysentok' = Sent success, 'alreadysentko' = Sent error)
     *  @return int        		Nb of target with status
     */
    public function countNbOfTargets($mode)
    {
    }
    /**
     *  Refresh denormalized value ->nbemail into emailing record
     *  Note: There is also the method update_nb into modules_mailings that is used for this.
     *
     *  @return int        		Return integer <0 if KO, >0 if OK
     */
    public function refreshNbOfTargets()
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
     *  Return a link to the object card (with optionally the picto)
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
     *  Return label of status of emailing (draft, validated, ...)
     *
     *  @param  int		$mode           0=Long label, 1=Short label, 2=Picto+Short label, 3=Picto, 4=Picto+Short label, 5=Short label+Picto, 6=Picto+Long label, 7=Very short label+Picto
     *  @return string        			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode           0=Long label, 1=Short label, 2=Picto+Short label, 3=Picto, 4=Picto+Short label, 5=Short label+Picto, 6=Picto+Long label, 7=Very short label+Picto
     *  @return string        			Label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Return the label of a given status of a recipient
     *  TODO Add class mailin_target.class.php
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode           0=Long label, 1=Short label, 2=Picto+Short label, 3=Picto, 4=Picto+Short label, 5=Short label+Picto, 6=Picto+Long label, 7=Very short label+Picto
     *  @param	string	$desc			Description of error to show as tooltip
     *  @return string        			Label
     */
    public static function libStatutDest($status, $mode = 0, $desc = '')
    {
    }
}