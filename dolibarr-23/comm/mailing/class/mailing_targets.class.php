<?php

/**
 *	Class to manage emailings module
 */
class MailingTarget extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'mailing_target';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'mailing_cibles';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'contact';
    /**
     * @var int Mailing id that this mailing_target is related to.
     */
    public $fk_mailing;
    /**
     * @var int Contact id that this mailing_target is related to.
     */
    public $fk_contact;
    /**
     * @var string lastname of the mailing_target
     */
    public $lastname;
    /**
     * @var string firstname of the mailing_target
     */
    public $firstname;
    /**
     * @var string email of the mailing_target
     */
    public $email;
    /**
     * @var	string other
     */
    public $other;
    /**
     * @var	string tag
     */
    public $tag;
    /**
     * @var int status
     * @deprecated Use $status
     */
    public $statut;
    // Status 0=Not sent, 1=Sent, 2=Read, 3=Read and unsubscribed, -1=Error
    /**
     * @var int status
     */
    public $status;
    // Status 0=Not sent, 1=Sent, 2=Read, 3=Read and unsubscribed, -1=Error
    /**
     * @var array<int,string> statut dest
     */
    public $statut_dest = array();
    /**
     * @var string source_url of the mailing_target
     */
    public $source_url;
    /**
     * @var int source_id of the mailing_target
     */
    public $source_id;
    /**
     * @var string source_type
     */
    public $source_type;
    /**
     * @var integer|''|null		date sending
     */
    public $date_envoi;
    /**
     * Update timestamp record (tms)
     * @var integer
     * @deprecated					Use $date_modification
     */
    public $tms;
    /**
     * @var string error_text from trying to send email
     */
    public $error_text;
    const STATUS_NOTSENT = 0;
    const STATUS_SENT = 1;
    const STATUS_READ = 2;
    const STATUS_READANDUNSUBSCRIBED = 3;
    const STATUS_ERROR = -1;
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create an Mailing Target
     *
     *  @param	User	$user 		Object of user making creation
     *  @return int				    Return integer <0 if KO, Id of created object if OK
     */
    public function create($user)
    {
    }
    /**
     *  Delete Mailing target
     *
     *  @param	User	$user		User that delete
     *  @return int         		>0 if OK, <0 if KO
     */
    public function delete($user)
    {
    }
    /**
     *  Set notsent mailing target
     *
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function setNotSent()
    {
    }
    /**
     *  Set sent mailing target
     *
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function setSent()
    {
    }
    /**
     *  Set read mailing target
     *
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function setRead()
    {
    }
    /**
     *  Set read and unsubscribed mailing target
     *
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function setReadAndUnsubscribed()
    {
    }
    /**
     *  Set error mailing target
     *
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function setError()
    {
    }
    /**
     *  Update an Mailing Target
     *
     *  @param  User	$user 		Object of user making change
     *  @return int				    Return integer < 0 if KO, > 0 if OK
     */
    public function update($user)
    {
    }
    /**
     *	Get object from database
     *
     *	@param	int		$rowid      Id of Mailing Target
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
}