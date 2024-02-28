<?php

/**
 *	Put here description of your class
 */
class Opensurveysondage extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'opensurvey_sondage';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'opensurvey_sondage';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'poll';
    /**
     * @var string Description
     */
    public $description;
    /**
     * @var string Date last modification (same as tms)
     */
    public $date_m;
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'),
     *  	'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:Sortfield]]]]',
     *  	'chkbxlst:...',
     *  	'varchar(x)',
     *  	'text', 'text:none', 'html',
     *   	'double(24,8)', 'real', 'price',
     *  	'date', 'datetime', 'timestamp', 'duration',
     *  	'boolean', 'checkbox', 'radio', 'array',
     *  	'mail', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if need to validate with $this->validateField()
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('id_sondage' => array('type' => 'varchar(16)', 'label' => 'Idsondage', 'enabled' => '1', 'position' => 10, 'notnull' => 1, 'visible' => -1), 'commentaires' => array('type' => 'mediumtext', 'label' => 'Commentaires', 'enabled' => '1', 'position' => 15, 'notnull' => 0, 'visible' => -1), 'mail_admin' => array('type' => 'varchar(128)', 'label' => 'Mailadmin', 'enabled' => '1', 'position' => 20, 'notnull' => 0, 'visible' => -1), 'nom_admin' => array('type' => 'varchar(64)', 'label' => 'Nomadmin', 'enabled' => '1', 'position' => 25, 'notnull' => 0, 'visible' => -1), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => '1', 'position' => 30, 'notnull' => 1, 'visible' => -2, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150'), 'title' => array('type' => 'mediumtext', 'label' => 'Titre', 'enabled' => '1', 'position' => 35, 'notnull' => 1, 'visible' => -1), 'date_fin' => array('type' => 'datetime', 'label' => 'Datefin', 'enabled' => '1', 'position' => 40, 'notnull' => 1, 'visible' => -1), 'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => '1', 'position' => 500, 'notnull' => 0, 'visible' => -1), 'format' => array('type' => 'varchar(2)', 'label' => 'Format', 'enabled' => '1', 'position' => 50, 'notnull' => 1, 'visible' => -1), 'mailsonde' => array('type' => 'integer', 'label' => 'Mailsonde', 'enabled' => '1', 'position' => 55, 'notnull' => 1, 'visible' => -1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => '1', 'position' => 60, 'notnull' => 1, 'visible' => -1), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => '1', 'position' => 65, 'notnull' => 1, 'visible' => -2, 'default' => '1', 'index' => 1), 'allow_comments' => array('type' => 'integer', 'label' => 'Allowcomments', 'enabled' => '1', 'position' => 70, 'notnull' => 1, 'visible' => -1), 'allow_spy' => array('type' => 'integer', 'label' => 'Allowspy', 'enabled' => '1', 'position' => 75, 'notnull' => 1, 'visible' => -1), 'sujet' => array('type' => 'mediumtext', 'label' => 'Sujet', 'enabled' => '1', 'position' => 80, 'notnull' => 0, 'visible' => -1), 'id_sondage_admin' => array('type' => 'char(24)', 'label' => 'Idsondageadmin', 'enabled' => '1', 'position' => 85, 'notnull' => 0, 'visible' => -1));
    public $id_sondage;
    /**
     * @var string		Description
     * @deprecated 		Use $description instead
     */
    public $commentaires;
    public $mail_admin;
    public $nom_admin;
    public $fk_user_creat;
    public $title;
    public $date_fin = '';
    public $status;
    public $format;
    public $mailsonde;
    public $tms;
    public $entity;
    /**
     * @var int		Allow comments on this poll
     */
    public $allow_comments;
    /**
     * @var int		Allow users see others vote
     */
    public $allow_spy;
    public $sujet;
    public $id_sondage_admin;
    // END MODULEBUILDER PROPERTIES
    /**
     * Draft status (not used)
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated/Opened status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Closed
     */
    const STATUS_CLOSED = 2;
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
     *  @param	User    $user        User that creates
     *  @param  int     $notrigger   0=launch triggers after, 1=disable triggers
     *  @return int                  Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    				Id object
     *  @param	string	$numsurvey			Ref of survey (admin or not)
     *  @return int          				Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $numsurvey = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User    $user        User that modifies
     *  @param  int     $notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        		User that deletes
     *  @param  int		$notrigger	 		0=launch triggers after, 1=disable triggers
     *  @param	string	$numsondage			Num sondage admin to delete
     *  @return	int					 		Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0, $numsondage = '')
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array $params ex option, infologin
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return array of lines
     *
     * @return 	int		Return integer <0 if KO, >0 if OK
     */
    public function fetch_lines()
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
     * Returns all comments for the current opensurvey poll
     *
     * @return Object[]
     */
    public function getComments()
    {
    }
    /**
     * Adds a comment to the poll
     *
     * @param string $comment Comment content
     * @param string $comment_user Comment author
     * @param string $user_ip Comment author IP
     * @return boolean False in case of the query fails, true if it was successful
     */
    public function addComment($comment, $comment_user, $user_ip = '')
    {
    }
    /**
     * Deletes a comment of the poll
     *
     * @param int $id_comment Id of the comment
     * @return boolean False in case of the query fails, true if it was successful
     */
    public function deleteComment($id_comment)
    {
    }
    /**
     * Cleans all the class variables before doing an update or an insert
     *
     * @return void
     */
    private function cleanParameters()
    {
    }
    /**
     *	Return status label of Order
     *
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *	@return string              	Label if status
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string					Label of status
     */
    public function LibStatut($status, $mode)
    {
    }
    /**
     *	Return number of votes done for this survey.
     *
     *	@return     int			Number of votes
     */
    public function countVotes()
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        limit
     * @param  int         $offset       Offset
     * @param  array       $filter       Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
     * @param  string      $filtermode   Filter mode (AND or OR)
     * @return array|int                 int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
}