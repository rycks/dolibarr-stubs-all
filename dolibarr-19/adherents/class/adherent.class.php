<?php

/**
 *		Class to manage members of a foundation
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
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string picto
     */
    public $picto = 'member';
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
     * @var string The civility code, not an integer
     */
    public $civility_id;
    public $civility_code;
    public $civility;
    /**
     * @var string company name
     * @deprecated
     * @see $company
     */
    public $societe;
    /**
     * @var string company name
     */
    public $company;
    /**
     * @var int Thirdparty ID
     * @deprecated
     * @see $socid
     */
    public $fk_soc;
    /**
     * @var int socid
     */
    public $socid;
    /**
     * @var array array of socialnetworks
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
     * @var int Info can be public
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
    public $datevalid;
    /**
     * @var string gender
     */
    public $gender;
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
     * @var int user_id
     */
    public $user_id;
    /**
     * @var string user_login
     */
    public $user_login;
    public $datefin;
    // Fields loaded by fetch_subscriptions() from member table
    public $first_subscription_date;
    public $first_subscription_date_start;
    public $first_subscription_date_end;
    public $first_subscription_amount;
    public $last_subscription_date;
    public $last_subscription_date_start;
    public $last_subscription_date_end;
    public $last_subscription_amount;
    public $subscriptions = array();
    /**
     * @var string ip
     */
    public $ip;
    // Fields loaded by fetchPartnerships() from partnership table
    public $partnerships = array();
    /**
     * @var Facture		To store the created invoice into subscriptionComplementaryActions()
     */
    public $invoice;
    /**
     * @var array fields
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'default' => 1, 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 12, 'index' => 1), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 15, 'index' => 1), 'ref_ext' => array('type' => 'varchar(128)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 0, 'position' => 20), 'civility' => array('type' => 'varchar(6)', 'label' => 'Civility', 'enabled' => 1, 'visible' => -1, 'position' => 25), 'lastname' => array('type' => 'varchar(50)', 'label' => 'Lastname', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'showoncombobox' => 1), 'firstname' => array('type' => 'varchar(50)', 'label' => 'Firstname', 'enabled' => 1, 'visible' => 1, 'position' => 35, 'showoncombobox' => 1), 'login' => array('type' => 'varchar(50)', 'label' => 'Login', 'enabled' => 1, 'visible' => 1, 'position' => 40), 'pass' => array('type' => 'varchar(50)', 'label' => 'Pass', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'pass_crypted' => array('type' => 'varchar(128)', 'label' => 'Pass crypted', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'morphy' => array('type' => 'varchar(3)', 'label' => 'MemberNature', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 55), 'fk_adherent_type' => array('type' => 'integer', 'label' => 'Fk adherent type', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 60), 'societe' => array('type' => 'varchar(128)', 'label' => 'Societe', 'enabled' => 1, 'visible' => 1, 'position' => 65, 'showoncombobox' => 2), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => 1, 'position' => 70), 'address' => array('type' => 'text', 'label' => 'Address', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'zip' => array('type' => 'varchar(10)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'town' => array('type' => 'varchar(50)', 'label' => 'Town', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'state_id' => array('type' => 'integer', 'label' => 'State id', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'country' => array('type' => 'integer:Ccountry:core/class/ccountry.class.php', 'label' => 'Country', 'enabled' => 1, 'visible' => 1, 'position' => 95), 'phone' => array('type' => 'varchar(30)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -1, 'position' => 115), 'phone_perso' => array('type' => 'varchar(30)', 'label' => 'Phone perso', 'enabled' => 1, 'visible' => -1, 'position' => 120), 'phone_mobile' => array('type' => 'varchar(30)', 'label' => 'Phone mobile', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'email' => array('type' => 'varchar(255)', 'label' => 'Email', 'enabled' => 1, 'visible' => 1, 'position' => 126), 'url' => array('type' => 'varchar(255)', 'label' => 'Url', 'enabled' => 1, 'visible' => -1, 'position' => 127), 'socialnetworks' => array('type' => 'text', 'label' => 'Socialnetworks', 'enabled' => 1, 'visible' => -1, 'position' => 128), 'birth' => array('type' => 'date', 'label' => 'DateOfBirth', 'enabled' => 1, 'visible' => -1, 'position' => 130), 'gender' => array('type' => 'varchar(10)', 'label' => 'Gender', 'enabled' => 1, 'visible' => -1, 'position' => 132), 'photo' => array('type' => 'varchar(255)', 'label' => 'Photo', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'public' => array('type' => 'smallint(6)', 'label' => 'Public', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 145), 'datefin' => array('type' => 'datetime', 'label' => 'DateEnd', 'enabled' => 1, 'visible' => 1, 'position' => 150), 'default_lang' => array('type' => 'varchar(6)', 'label' => 'Default lang', 'enabled' => 1, 'visible' => -1, 'position' => 153), 'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 155), 'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 160), 'datevalid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 165), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 170), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 175), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user author', 'enabled' => 1, 'visible' => -1, 'position' => 180), 'fk_user_mod' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user mod', 'enabled' => 1, 'visible' => -1, 'position' => 185), 'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 190), 'canvas' => array('type' => 'varchar(32)', 'label' => 'Canvas', 'enabled' => 1, 'visible' => -1, 'position' => 195), 'statut' => array('type' => 'smallint(6)', 'label' => 'Statut', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 500, 'arrayofkeyval' => array(-1 => 'Draft', 1 => 'Validated', 0 => 'MemberStatusResiliatedShort', -2 => 'MemberStatusExcludedShort')), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 800), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 805));
    /**
     * Draft status
     */
    const STATUS_DRAFT = -1;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Resiliated
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
     *  @param	string	$text				Content of message (not html entities encoded)
     *  @param	string	$subject			Subject of message
     *  @param 	array	$filename_list      Array of attached files
     *  @param 	array	$mimetype_list      Array of mime types of attached files
     *  @param 	array	$mimefilename_list  Array of public names of attached files
     *  @param 	string	$addr_cc            Email cc
     *  @param 	string	$addr_bcc           Email bcc
     *  @param 	int		$deliveryreceipt	Ask a delivery receipt
     *  @param	int		$msgishtml			1=String IS already html, 0=String IS NOT html, -1=Unknown need autodetection
     *  @param	string	$errors_to			erros to
     *  @param	string	$moreinheader		Add more html headers
     *  @deprecated since V18
     *  @see sendEmail()
     *  @return	int							Return integer <0 if KO, >0 if OK
     */
    public function send_an_email($text, $subject, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array(), $addr_cc = "", $addr_bcc = "", $deliveryreceipt = 0, $msgishtml = -1, $errors_to = '', $moreinheader = '')
    {
    }
    /**
     *  Function sending an email to the current member with the text supplied in parameter.
     *
     *  @param	string	$text				Content of message (not html entities encoded)
     *  @param	string	$subject			Subject of message
     *  @param 	array	$filename_list      Array of attached files
     *  @param 	array	$mimetype_list      Array of mime types of attached files
     *  @param 	array	$mimefilename_list  Array of public names of attached files
     *  @param 	string	$addr_cc            Email cc
     *  @param 	string	$addr_bcc           Email bcc
     *  @param 	int		$deliveryreceipt	Ask a delivery receipt
     *  @param	int		$msgishtml			1=String IS already html, 0=String IS NOT html, -1=Unknown need autodetection
     *  @param	string	$errors_to			erros to
     *  @param	string	$moreinheader		Add more html headers
     * 	@since V18
     *  @return	int							Return integer <0 if KO, >0 if OK
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
     *  @param	int			$addbadge	Add badge (1=Full label, 2=First letters only)
     *	@return	string					Label
     */
    public function getmorphylib($morphy = '', $addbadge = 0)
    {
    }
    /**
     *	Create a member into database
     *
     *	@param	User	$user        	Objet user qui demande la creation
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
     *  @param	int		$rowid		Id of member to delete
     *	@param	User	$user		User object
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return	int					Return integer <0 if KO, 0=nothing to do, >0 if OK
     */
    public function delete($rowid, $user, $notrigger = 0)
    {
    }
    /**
     *    Change password of a user
     *
     *    @param	User	$user           Object user de l'utilisateur qui fait la modification
     *    @param 	string	$password       New password (to generate if empty)
     *    @param    int		$isencrypted    0 ou 1 si il faut crypter le mot de passe en base (0 par defaut)
     *	  @param	int		$notrigger		1=Ne declenche pas les triggers
     *    @param	int		$nosyncuser		Do not synchronize linked user
     *    @return   string           		If OK return clear password, 0 if no change, < 0 if error
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
     *		Functiun to exlude (set adherent.status to -2) a member
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
     * @param array $params params to construct tooltip data
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *	@param	int		$withpictoimg				0=No picto, 1=Include picto into link, 2=Only picto, -1=Include photo into link, -2=Only picto photo, -3=Only photo very small)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge indicateurs this->nb de tableau de bord
     *
     *      @return     int         Return integer <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user   		Objet user
     *      @param  string	$mode           "expired" for membership to renew, "shift" for member to validate
     *      @return WorkboardResponse|int 	Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     *  @return     int         				0 if KO, 1 if OK
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
     *	@param	array	$info		Info array loaded by _load_ldap_info
     *	@param	int		$mode		0=Return full DN (uid=qqq,ou=xxx,dc=aaa,dc=bbb)
     *								1=Return DN without key inside (ou=xxx,dc=aaa,dc=bbb)
     *								2=Return key only (uid=qqq)
     *	@return	string				DN
     */
    public function _load_ldap_dn($info, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Initialise tableau info (tableau des attributs LDAP)
     *
     *	@return		array		Tableau info des attributs
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
     * @return	int									0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function sendReminderForExpiredSubscription($daysbeforeendlist = '10')
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}