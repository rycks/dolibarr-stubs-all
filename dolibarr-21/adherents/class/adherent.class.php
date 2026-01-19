<?php

/**
 *		Class to manage members of a foundation.
 */
class Adherent extends \CommonObject
{
    use \CommonPeople;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'member';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'adherent';
    /**
     * @var string picto
     */
    public $picto = 'member';
    /**
     * @var string[] array of messages
     */
    public $mesgs;
    /**
     * @var string login of member
     */
    public $login;
    /**
     * @var string Clear password in memory
     */
    public $pass;
    /**
     * @var string Clear password in database (defined if DATABASE_PWD_ENCRYPTED=0)
     */
    public $pass_indatabase;
    /**
     * @var string Encrypted password in database (always defined)
     */
    public $pass_indatabase_crypted;
    /**
     * @var string fullname
     */
    public $fullname;
    /**
     * @var string
     * @deprecated Use $civility_code
     * @see $civility_code
     */
    public $civility_id;
    /**
     * @var string The civility code, not an integer (ex: 'MR', 'MME', 'MLE', etc.)
     */
    public $civility_code;
    /**
     * @var int
     */
    public $civility;
    /**
     * @var ?string company name
     * @deprecated Use $company
     * @see $company
     */
    public $societe;
    /**
     * @var ?string company name
     */
    public $company;
    /**
     * @var int Thirdparty ID
     * @deprecated Use $socid
     * @see $socid
     */
    public $fk_soc;
    /**
     * @var int socid
     */
    public $socid;
    /**
     * @var array<string,string> array of socialnetworks
     */
    public $socialnetworks;
    /**
     * @var string Phone number
     */
    public $phone;
    /**
     * @var string Private Phone number
     */
    public $phone_perso;
    /**
     * @var string Professional Phone number
     */
    public $phone_pro;
    /**
     * @var string Mobile phone number
     */
    public $phone_mobile;
    /**
     * @var string Fax number
     */
    public $fax;
    /**
     * @var string Function
     */
    public $poste;
    /**
     * @var string mor or phy
     */
    public $morphy;
    /**
     * @var int<0,1> Info can be public
     */
    public $public;
    /**
     * Default language code of member (en_US, ...)
     * @var string
     */
    public $default_lang;
    /**
     * @var string photo of member
     */
    public $photo;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $datem;
    /**
     * @var string|int
     */
    public $datevalid;
    /**
     * @var string gender
     */
    public $gender;
    /**
     * @var int|string date of birth
     */
    public $birth;
    /**
     * @var int id type member
     */
    public $typeid;
    /**
     * @var string label type member
     */
    public $type;
    /**
     * @var int need_subscription
     */
    public $need_subscription;
    /**
     * @var int|null user_id
     */
    public $user_id;
    /**
     * @var string|null user_login
     */
    public $user_login;
    /**
     * @var string|int
     */
    public $datefin;
    // Fields loaded by fetch_subscriptions() from member table
    /**
     * @var int|string|null date
     */
    public $first_subscription_date;
    /**
     * @var int|string|null date
     */
    public $first_subscription_date_start;
    /**
     * @var int|string|null date
     */
    public $first_subscription_date_end;
    /**
     * @var int|string|null date
     */
    public $first_subscription_amount;
    /**
     * @var int|string|null date
     */
    public $last_subscription_date;
    /**
     * @var int|string|null date
     */
    public $last_subscription_date_start;
    /**
     * @var int|string date
     */
    public $last_subscription_date_end;
    /**
     * @var int|string date
     */
    public $last_subscription_amount;
    /**
     * @var Subscription[]
     */
    public $subscriptions = array();
    /**
     * @var string ip
     */
    public $ip;
    // Fields loaded by fetchPartnerships() from partnership table
    /**
     * @var array<array<mixed>>
     */
    public $partnerships = array();
    /**
     * @var ?Facture	To store the created invoice into subscriptionComplementaryActions()
     */
    public $invoice;
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'. for integer list of values are in 'arrayofkeyval'),
     *  	'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:CategoryIdType[:CategoryIdList[:SortField]]]]]]',
     *  	'chkbxlst:...',
     *  	'varchar(x)',
     *  	'text', 'text:none', 'html',
     *   	'double(24,8)', 'real', 'price', 'stock',
     *  	'date', 'datetime', 'timestamp', 'duration',
     *  	'boolean', 'checkbox', 'radio', 'array',
     *  	'mail', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'length' the length of field. Example: 255, '24,8'
     *  'label' the translation key.
     *  'alias' the alias used into some old hard coded SQL requests
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'placeholder' to set the placeholder of a varchar field.
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code like the constructor of the class.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if you need to validate the field with $this->validateField(). Need MAIN_ACTIVATE_VALIDATION_RESULT.
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'default' => '1', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 12, 'index' => 1), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => 3, 'notnull' => 1, 'position' => 15, 'index' => 1), 'ref_ext' => array('type' => 'varchar(128)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 20), 'civility' => array('type' => 'varchar(6)', 'label' => 'Civility', 'enabled' => 1, 'visible' => -1, 'position' => 25), 'lastname' => array('type' => 'varchar(50)', 'label' => 'Lastname', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'showoncombobox' => 1), 'firstname' => array('type' => 'varchar(50)', 'label' => 'Firstname', 'enabled' => 1, 'visible' => 1, 'position' => 35, 'showoncombobox' => 1), 'login' => array('type' => 'varchar(50)', 'label' => 'Login', 'enabled' => 1, 'visible' => 1, 'position' => 40), 'pass' => array('type' => 'varchar(50)', 'label' => 'Pass', 'enabled' => 1, 'visible' => 3, 'position' => 45), 'pass_crypted' => array('type' => 'varchar(128)', 'label' => 'Pass crypted', 'enabled' => 1, 'visible' => 3, 'position' => 50), 'morphy' => array('type' => 'varchar(3)', 'label' => 'MemberNature', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 55), 'fk_adherent_type' => array('type' => 'integer', 'label' => 'MemberType', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 60), 'societe' => array('type' => 'varchar(128)', 'label' => 'Societe', 'enabled' => 1, 'visible' => 1, 'position' => 65, 'showoncombobox' => 2), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => 1, 'position' => 70), 'address' => array('type' => 'text', 'label' => 'Address', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'zip' => array('type' => 'varchar(10)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'town' => array('type' => 'varchar(50)', 'label' => 'Town', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'state_id' => array('type' => 'integer', 'label' => 'State', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'country' => array('type' => 'integer:Ccountry:core/class/ccountry.class.php', 'label' => 'Country', 'enabled' => 1, 'visible' => 1, 'position' => 95), 'phone' => array('type' => 'varchar(30)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -1, 'position' => 115), 'phone_perso' => array('type' => 'varchar(30)', 'label' => 'Phone perso', 'enabled' => 1, 'visible' => -1, 'position' => 120), 'phone_mobile' => array('type' => 'varchar(30)', 'label' => 'Phone mobile', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'email' => array('type' => 'varchar(255)', 'label' => 'Email', 'enabled' => 1, 'visible' => 1, 'position' => 126), 'url' => array('type' => 'varchar(255)', 'label' => 'Url', 'enabled' => 1, 'visible' => -1, 'position' => 127), 'socialnetworks' => array('type' => 'text', 'label' => 'Socialnetworks', 'enabled' => 1, 'visible' => 3, 'position' => 128), 'birth' => array('type' => 'date', 'label' => 'DateOfBirth', 'enabled' => 1, 'visible' => -1, 'position' => 130), 'gender' => array('type' => 'varchar(10)', 'label' => 'Gender', 'enabled' => 1, 'visible' => -1, 'position' => 132), 'photo' => array('type' => 'varchar(255)', 'label' => 'Photo', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'public' => array('type' => 'smallint(6)', 'label' => 'Public', 'enabled' => 1, 'visible' => 3, 'notnull' => 1, 'position' => 145), 'datefin' => array('type' => 'datetime', 'label' => 'DateEnd', 'enabled' => 1, 'visible' => 1, 'position' => 150), 'default_lang' => array('type' => 'varchar(6)', 'label' => 'Default lang', 'enabled' => 1, 'visible' => -1, 'position' => 153), 'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 155), 'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 160), 'datevalid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 165), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 170), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 175), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserCreation', 'enabled' => 1, 'visible' => 3, 'position' => 180), 'fk_user_mod' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModification', 'enabled' => 1, 'visible' => 3, 'position' => 185), 'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => 3, 'position' => 190), 'canvas' => array('type' => 'varchar(32)', 'label' => 'Canvas', 'enabled' => 1, 'visible' => 0, 'position' => 195), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 800), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 805), 'statut' => array('type' => 'smallint(6)', 'label' => 'Statut', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 1000, 'arrayofkeyval' => array(-1 => 'Draft', 1 => 'Validated', 0 => 'MemberStatusResiliatedShort', -2 => 'MemberStatusExcludedShort')));
    /**
     * Draft status
     */
    const STATUS_DRAFT = -1;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Resiliated (membership end and was not renew)
     */
    const STATUS_RESILIATED = 0;
    /**
     * Excluded
     */
    const STATUS_EXCLUDED = -2;
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function sending an email to the current member with the text supplied in parameter.
     *
     *  @param	string		$text				Content of message (not html entities encoded)
     *  @param	string		$subject			Subject of message
     *  @param 	string[]	$filename_list      Array of attached files
     *  @param 	string[]	$mimetype_list      Array of mime types of attached files
     *  @param 	string[]	$mimefilename_list  Array of public names of attached files
     *  @param 	string		$addr_cc            Email cc
     *  @param 	string		$addr_bcc           Email bcc
     *  @param 	int			$deliveryreceipt	Ask a delivery receipt
     *  @param	int			$msgishtml			1=String IS already html, 0=String IS NOT html, -1=Unknown need autodetection
     *  @param	string		$errors_to			errors to
     *  @param	string		$moreinheader		Add more html headers
     *  @deprecated since V18
     *  @see sendEmail()
     *  @return	int								Return integer <0 if KO, >0 if OK
     */
    public function send_an_email($text, $subject, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array(), $addr_cc = "", $addr_bcc = "", $deliveryreceipt = 0, $msgishtml = -1, $errors_to = '', $moreinheader = '')
    {
    }
    /**
     *  Function sending an email to the current member with the text supplied in parameter.
     *
     *  @param	string		$text				Content of message (not html entities encoded)
     *  @param	string		$subject			Subject of message
     *  @param 	string[]	$filename_list      Array of attached files
     *  @param 	string[]	$mimetype_list      Array of mime types of attached files
     *  @param 	string[]	$mimefilename_list  Array of public names of attached files
     *  @param 	string		$addr_cc            Email cc
     *  @param 	string		$addr_bcc           Email bcc
     *  @param 	int			$deliveryreceipt	Ask a delivery receipt
     *  @param	int			$msgishtml			1=String IS already html, 0=String IS NOT html, -1=Unknown need autodetection
     *  @param	string		$errors_to			errors to
     *  @param	string		$moreinheader		Add more html headers
     * 	@since V18
     *  @return	int								Return integer <0 if KO, >0 if OK
     */
    public function sendEmail($text, $subject, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array(), $addr_cc = "", $addr_bcc = "", $deliveryreceipt = 0, $msgishtml = -1, $errors_to = '', $moreinheader = '')
    {
    }
    /**
     * Make substitution of tags into text with value of current object.
     *
     * @param	string	$text       Text to make substitution to
     * @return  string      		Value of input text string with substitutions done
     */
    public function makeSubstitution($text)
    {
    }
    /**
     *	Return translated label by the nature of a adherent (physical or moral)
     *
     *	@param	string		$morphy		Nature of the adherent (physical or moral)
     *  @param	int<0,2>	$addbadge	Add badge (1=Full label, 2=First letters only)
     *	@return	string					Label
     */
    public function getmorphylib($morphy = '', $addbadge = 0)
    {
    }
    /**
     *	Create a member into database
     *
     *	@param	User	$user        	Object user qui demande la creation
     *	@param  int		$notrigger		1 ne declenche pas les triggers, 0 sinon
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Update a member in database (standard information and password)
     *
     *	@param	User	$user				User making update
     *	@param	int		$notrigger			1=disable trigger UPDATE (when called by create)
     *	@param	int		$nosyncuser			0=Synchronize linked user (standard info), 1=Do not synchronize linked user
     *	@param	int		$nosyncuserpass		0=Synchronize linked user (password), 1=Do not synchronize linked user
     *	@param	int		$nosyncthirdparty	0=Synchronize linked thirdparty (standard info), 1=Do not synchronize linked thirdparty
     * 	@param	string	$action				Current action for hookmanager
     * 	@return	int							Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0, $nosyncuser = 0, $nosyncuserpass = 0, $nosyncthirdparty = 0, $action = 'update')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update denormalized last subscription date.
     * 	This function is called when we delete a subscription for example.
     *
     *	@param	User	$user			User making change
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function update_end_date($user)
    {
    }
    /**
     *  Fonction to delete a member and its data
     *
     *	@param	User	$user		User object
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return	int					Return integer <0 if KO, 0=nothing to do, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *    Change password of a user
     *
     *    @param	User	$user           Object user de l'utilisateur qui fait la modification
     *    @param 	string	$password       New password (to generate if empty)
     *    @param    int		$isencrypted    0 ou 1 if the password needs to be encrypted in the DB (default: 0)
     *	  @param	int		$notrigger		1=Does not raise the triggers
     *    @param	int		$nosyncuser		Do not synchronize linked user
     *    @return   string|int				Clear password if change ok, 0 if no change, <0 if error
     */
    public function setPassword($user, $password = '', $isencrypted = 0, $notrigger = 0, $nosyncuser = 0)
    {
    }
    /**
     *    Set link to a user
     *
     *    @param     int	$userid        	Id of user to link to
     *    @return    int					1=OK, -1=KO
     */
    public function setUserId($userid)
    {
    }
    /**
     *    Set link to a third party
     *
     *    @param     int	$thirdpartyid		Id of user to link to
     *    @return    int						1=OK, -1=KO
     */
    public function setThirdPartyId($thirdpartyid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Method to load member from its login
     *
     *	@param	string	$login		login of member
     *	@return	void
     */
    public function fetch_login($login)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Method to load member from its name
     *
     *	@param	string	$firstname	Firstname
     *	@param	string	$lastname	Lastname
     *	@return	void
     */
    public function fetch_name($firstname, $lastname)
    {
    }
    /**
     *	Load member from database
     *
     *	@param	int		$rowid      			Id of object to load
     * 	@param	string	$ref					To load member from its ref
     * 	@param	int		$fk_soc					To load member from its link to third party
     * 	@param	string	$ref_ext				External reference
     *  @param	bool	$fetch_optionals		To load optionals (extrafields)
     *  @param	bool	$fetch_subscriptions	To load member subscriptions
     *	@return int								>0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($rowid, $ref = '', $fk_soc = 0, $ref_ext = '', $fetch_optionals = \true, $fetch_subscriptions = \true)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Function to get member subscriptions data:
     *  subscriptions,
     *	first_subscription_date, first_subscription_date_start, first_subscription_date_end, first_subscription_amount
     *	last_subscription_date, last_subscription_date_start, last_subscription_date_end, last_subscription_amount
     *
     *	@return		int			Return integer <0 if KO, >0 if OK
     */
    public function fetch_subscriptions()
    {
    }
    /**
     *	Function to get partnerships array
     *
     *  @param		string		$mode		'member' or 'thirdparty'
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function fetchPartnerships($mode)
    {
    }
    /**
     *	Insert subscription into database and eventually add links to banks, mailman, etc...
     *
     *	@param	int	        $date        		Date of effect of subscription
     *	@param	double		$amount     		Amount of subscription (0 accepted for some members)
     *	@param	int			$accountid			Id bank account. NOT USED.
     *	@param	string		$operation			Code of payment mode (if Id bank account provided). Example: 'CB', ... NOT USED.
     *	@param	string		$label				Label operation (if Id bank account provided).
     *	@param	string		$num_chq			Numero cheque (if Id bank account provided)
     *	@param	string		$emetteur_nom		Name of cheque writer
     *	@param	string		$emetteur_banque	Name of bank of cheque
     *	@param	int     	$datesubend			Date end subscription
     *	@param	int     	$fk_type 			Member type id
     *	@return int         					rowid of record added, <0 if KO
     */
    public function subscription($date, $amount, $accountid = 0, $operation = '', $label = '', $num_chq = '', $emetteur_nom = '', $emetteur_banque = '', $datesubend = 0, $fk_type = \null)
    {
    }
    /**
     *	Do complementary actions after subscription recording.
     *
     *	@param	int			$subscriptionid			Id of created subscription
     *  @param	string		$option					Which action ('bankdirect', 'bankviainvoice', 'invoiceonly', ...)
     *	@param	int			$accountid				Id bank account
     *	@param	int			$datesubscription		Date of subscription
     *	@param	int			$paymentdate			Date of payment
     *	@param	string		$operation				Code of type of operation (if Id bank account provided). Example 'CB', ...
     *	@param	string		$label					Label operation (if Id bank account provided)
     *	@param	double		$amount     			Amount of subscription (0 accepted for some members)
     *	@param	string		$num_chq				Numero cheque (if Id bank account provided)
     *	@param	string		$emetteur_nom			Name of cheque writer
     *	@param	string		$emetteur_banque		Name of bank of cheque
     *  @param	int			$autocreatethirdparty	Auto create new thirdparty if member not yet linked to a thirdparty and we request an option that generate invoice.
     *  @param  string      $ext_payment_id         External id of payment (for example Stripe charge id)
     *  @param  string      $ext_payment_site       Name of external paymentmode (for example 'stripe')
     *	@return int									Return integer <0 if KO, >0 if OK
     */
    public function subscriptionComplementaryActions($subscriptionid, $option, $accountid, $datesubscription, $paymentdate, $operation, $label, $amount, $num_chq, $emetteur_nom = '', $emetteur_banque = '', $autocreatethirdparty = 0, $ext_payment_id = '', $ext_payment_site = '')
    {
    }
    /**
     *		Function that validate a member
     *
     *		@param	User	$user		user adherent qui valide
     *		@return	int					Return integer <0 if KO, 0 if nothing done, >0 if OK
     */
    public function validate($user)
    {
    }
    /**
     *		Fonction qui resilie un adherent
     *
     *		@param	User	$user		User making change
     *		@return	int					Return integer <0 if KO, >0 if OK
     */
    public function resiliate($user)
    {
    }
    /**
     *		Functiun to exclude (set adherent.status to -2) a member
     *		TODO
     *		A private note should be added to know why the member has been excluded
     *		For historical purpose it add an "extra-subscription" type excluded
     *
     *		@param	User	$user		User making change
     *		@return	int					Return integer <0 if KO, >0 if OK
     */
    public function exclude($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to add member into external tools mailing-list, spip, etc.
     *
     *  @return		int		Return integer <0 if KO, >0 if OK
     */
    public function add_to_abo()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to delete a member from external tools like mailing-list, spip, etc.
     *
     *  @return     int     Return integer <0 if KO, >0 if OK
     */
    public function del_to_abo()
    {
    }
    /**
     *    Return civility label of a member
     *
     *    @return   string              	Translated name of civility (translated with transnoentitiesnoconv)
     */
    public function getCivilityLabel()
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
     *  Return clickable name (with picto eventually)
     *
     *	@param	int		$withpictoimg				0=No picto, 1=Include picto into link, 2=Only picto, -1=Include photo into link, -2=Only picto photo, -3=Only photo very small, -4=???)
     *	@param	int		$maxlen						length max label
     *	@param	string	$option						Page for link ('card', 'category', 'subscription', ...)
     *	@param  string  $mode           			''=Show firstname+lastname as label (using default order), 'firstname'=Show only firstname, 'lastname'=Show only lastname, 'login'=Show login, 'ref'=Show ref
     *	@param  string  $morecss        			Add more css on link
     *	@param  int		$save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@param	int		$notooltip					1=Disable tooltip
     *	@param  int		$addlinktonotes				1=Add link to notes
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpictoimg = 0, $maxlen = 0, $option = 'card', $mode = '', $morecss = '', $save_lastsearch_value = -1, $notooltip = 0, $addlinktonotes = 0)
    {
    }
    /**
     *  Retourne le libelle du statut d'un adherent (brouillon, valide, resilie, exclu)
     *
     *  @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string				Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int			$status      			Id status
     *	@param	int			$need_subscription		1 if member type need subscription, 0 otherwise
     *	@param	int     	$date_end_subscription	Date fin adhesion
     *  @param  int		    $mode                   0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string      						Label
     */
    public function LibStatut($status, $need_subscription, $date_end_subscription, $mode = 0)
    {
    }
    /**
     *      Load indicators this->nb in state board
     *
     *      @return     int         Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user   		Object user
     *      @param  string	$mode           "expired" for membership to renew, "shift" for member to validate
     *      @return WorkboardResponse|int 	Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	string		$modele			Force template to use ('' to not force)
     *  @param	Translate	$outputlangs	object lang a utiliser pour traduction
     *  @param	int<0,1>	$hidedetails	Hide details of lines
     *  @param	int<0,1>	$hidedesc		Hide description
     *  @param	int<0,1>	$hideref		Hide ref
     *  @param	?array<string,mixed>	$moreparams		Array to provide more information
     *  @return	int<0,1>					0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	int
     */
    public function initAsSpecimen()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Retourne chaine DN complete dans l'annuaire LDAP pour l'objet
     *
     *	@param	array<string,mixed>	$info		Info array loaded by _load_ldap_info
     *	@param	int<0,2>			$mode		0=Return full DN (uid=qqq,ou=xxx,dc=aaa,dc=bbb)
     *											1=Return DN without key inside (ou=xxx,dc=aaa,dc=bbb)
     *											2=Return key only (uid=qqq)
     *	@return	string							DN
     */
    public function _load_ldap_dn($info, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Initialise tableau info (tableau des attributes LDAP)
     *
     *	@return		array<string,mixed>	Tableau info des attributes
     */
    public function _load_ldap_info()
    {
    }
    /**
     *      Load type info information in the member object
     *
     *      @param  int		$id       Id of member to load
     *      @return	void
     */
    public function info($id)
    {
    }
    /**
     *  Return number of mass Emailing received by this member with its email
     *
     *  @return       int     Number of EMailings
     */
    public function getNbOfEMailings()
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param 	int[]|int 	$categories 	Category or categories IDs
     * @return 	int							Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB 	$db 			Database handler
     * @param int 		$origin_id 		Old thirdparty id
     * @param int 		$dest_id 		New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty($db, $origin_id, $dest_id)
    {
    }
    /**
     * Return if a member is late (subscription late) or not
     *
     * @return boolean     True if late, False if not late
     */
    public function hasDelay()
    {
    }
    /**
     * Send reminders by emails before subscription end
     * CAN BE A CRON TASK
     *
     * @param	string		$daysbeforeendlist		Nb of days before end of subscription (negative number = after subscription). Can be a list of delay, separated by a semicolon, for example '10;5;0;-5'
     * @param	int			$fk_adherent_type		Type of Member (In order to restrict the sending of emails only to this type of member)
     * @return	int									0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function sendReminderForExpiredSubscription($daysbeforeendlist = '10', $fk_adherent_type = 0)
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}