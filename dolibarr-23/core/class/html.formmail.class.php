<?php

// So the class ModelMail that was defined into this file in old version is still available when including this file
/**
 *      Class permettant la generation du formulaire html d'envoi de mail unitaire
 *      Usage: $formail = new FormMail($db)
 *             $formmail->proprietes=1 ou chaine ou tableau de valeurs
 *             $formmail->show_form() affiche le formulaire
 */
class FormMail extends \Form
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var int 1 = Include HTML form tag and show submit button
     *          0 = Do not include form tag and submit button
     *          -1 = Do not include form tag but include submit button
     */
    public $withform;
    /**
     * @var string name from
     */
    public $fromname;
    /**
     * @var string email from
     */
    public $frommail;
    /**
     * @var string 	user, company, robot
     */
    public $fromtype;
    /**
     * @var int 	from ID
     */
    public $fromid;
    /**
     * @var int 	Add also the robot email as possible senders
     */
    public $fromalsorobot;
    /**
     * @var string thirdparty etc
     */
    public $totype;
    /**
     * @var int ID
     */
    public $toid;
    /**
     * @var string 	Reply-to name
     */
    public $replytoname;
    /**
     * @var string 	Reply-to email
     */
    public $replytomail;
    /**
     * @var string 	To name
     */
    public $toname;
    /**
     * @var string 	To email
     */
    public $tomail;
    /**
     * @var string 	Track id
     */
    public $trackid;
    /**
     * @var string	If you know a MSGID of an email and want to send the email in reply to it. Will be added into header as In-Reply-To: <...>
     */
    public $inreplyto;
    /**
     * @var int<0,1>
     */
    public $withsubstit;
    // Show substitution array
    /**
     * @var int<0,1>
     */
    public $withfrom;
    /**
     * @var int<0,1>|string[]
     */
    public $withto;
    // Show recipient emails
    /**
     * @var int<0,1>
     */
    public $withreplyto;
    /**
     * @var int<0,1>|string 0 = Do not Show free text for recipient emails
     *                 1 = Show free text for recipient emails
     *                 or a free email
     */
    public $withtofree;
    /**
     * @var int<0,1>|string[]
     */
    public $withtocc;
    /**
     * @var int<0,1>|string|string[]  When 1|'1', enable BCC field, when not 0, use as default BCC email
     */
    public $withtoccc;
    /**
     * @var int<0,1>|string
     */
    public $withtopic;
    /**
     * @var int<0,1>
     */
    public $witherrorsto;
    /**
     * @var int<0,2>|string 		0=No attaches files, 1=Show attached files, 2=Can add new attached files, 'text'=Show attached files and the text
     */
    public $withfile;
    /**
     * @var string					Use case string to a button "Fill with layout" for this use case. Example 'wesitepage', 'emailing', 'email', ...
     */
    public $withlayout;
    /**
     * @var string	'text' or 'html' to add a button "Fill with AI generation"
     */
    public $withaiprompt;
    /**
     * @var int<-1,1> 1=Add a checkbox "Attach also main document" for mass actions (checked by default), -1=Add checkbox (not checked by default)
     */
    public $withmaindocfile;
    /**
     * @var int<0,1>|string
     */
    public $withbody;
    /**
     * @var int<0,1>
     */
    public $withfromreadonly;
    /**
     * @var int<0,1>
     */
    public $withreplytoreadonly;
    /**
     * @var int<0,1>
     */
    public $withtoreadonly;
    /**
     * @var int<0,1>
     */
    public $withtoccreadonly;
    /**
     * @var int<0,1>
     */
    public $witherrorstoreadonly;
    /**
     * @var int<0,1>
     */
    public $withtocccreadonly;
    /**
     * @var int<0,1>
     */
    public $withtopicreadonly;
    /**
     * @var int<0,1>
     */
    public $withbodyreadonly;
    /**
     * @var int<0,1>
     */
    public $withfilereadonly;
    /**
     * @var int<0,1>
     */
    public $withdeliveryreceipt;
    /**
     * @var int<0,1>
     */
    public $withcancel;
    /**
     * @var int<0,1>
     */
    public $withdeliveryreceiptreadonly;
    /**
     * @var int<-1,1>
     */
    public $withfckeditor;
    /**
     * @var string ckeditortoolbar
     */
    public $ckeditortoolbar;
    /**
     * @var array<string,string>
     */
    public $substit = array();
    /**
     * @var array<int,array<string,string>>
     */
    public $substit_lines = array();
    /**
     * @var array{}|array{models:string,langsmodels?:string,fileinit?:string[],returnurl:string}
     */
    public $param = array();
    /**
     * @var string[]
     */
    public $withtouser = array();
    /**
     * @var string[]
     */
    public $withtoccuser = array();
    /**
     * @var ModelMail[]
     */
    public $lines_model;
    /**
     * @var int<-1,1> -1 suggests the checkbox 'one email per recipient' not checked, 0 = no suggestion, 1 = suggest and checked
     */
    public $withoptiononeemailperrecipient;
    /**
     *	Constructor
     *
     *  @param	DoliDB	$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Clear list of attached files in send mail form (also stored in session)
     *
     * @return	void
     */
    public function clear_attached_files()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Add a file into the list of attached files (stored in SECTION array)
     *
     * @param 	string   $path   Full absolute path on filesystem of file, including file name
     * @param 	string   $file   Only filename (can be basename($path))
     * @param 	string   $type   Mime type (can be dol_mimetype($file))
     * @return	void
     */
    public function add_attached_files($path, $file = '', $type = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Remove a file from the list of attached files (stored in SECTION array)
     *
     * @param  	int		$keytodelete     Key index in file array (0, 1, 2, ...)
     * @return	void
     */
    public function remove_attached_files($keytodelete)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of attached files (stored in SECTION array)
     *
     * @return	array{paths:string[],names:string[],mimes:string[]}
     */
    public function get_attached_files()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Show the form to input an email
     *  this->withfile: 0=No attaches files, 1=Show attached files, 2=Can add new attached files
     *  this->withmaindocfile
     *
     *	@param	string	$addfileaction		Name of action when posting file attachments
     *	@param	string	$removefileaction	Name of action when removing file attachments
     *	@return	void
     *  @deprecated
     */
    public function show_form($addfileaction = 'addfile', $removefileaction = 'removefile')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Get the form to input an email
     *  this->withfile: 0=No attaches files, 1=Show attached files, 2=Can add new attached files
     *  this->param:	Contains more parameters like email templates info
     *  this->withfckeditor: 1=We use an advanced editor, so we switch content into HTML
     *
     *	@param	string	$addfileaction		Name of action when posting file attachments
     *	@param	string	$removefileaction	Name of action when removing file attachments
     *	@return string						Form to show
     */
    public function get_form($addfileaction = 'addfile', $removefileaction = 'removefile')
    {
    }
    /**
     * get html For To
     *
     * @return string html
     */
    public function getHtmlForTo()
    {
    }
    /**
     * get html For CC
     *
     * @return string html
     */
    public function getHtmlForCc()
    {
    }
    /**
     * get html For WithCCC
     * This information is show when MAIN_EMAIL_USECCC is set.
     *
     * @return string html
     */
    public function getHtmlForWithCcc()
    {
    }
    /**
     * get Html For WithErrorsTo
     *
     * @return string html
     */
    public function getHtmlForWithErrorsTo()
    {
    }
    /**
     * get Html For Asking for Delivery Receipt
     *
     * @return string html
     */
    public function getHtmlForDeliveryreceipt()
    {
    }
    /**
     * Return Html section for the Topic of message
     *
     * @param	CEmailTemplate	$arraydefaultmessage		Array with message template content
     * @param	string			$helpforsubstitution		Help string for substitution
     * @return 	string 										Text for topic
     */
    public function getHtmlForTopic($arraydefaultmessage, $helpforsubstitution)
    {
    }
    /**
     * Return HTML code for selection of email layout
     *
     * @param   string      $htmlContent    	HTML name of WYSIWYG field to fill once layout has been chosen
     * @param	string		$showlinktolayout	Show link to layout
     * @return  string                      	HTML for model email boxes
     */
    public function getEmailLayoutSelector($htmlContent = 'message', $showlinktolayout = 'email')
    {
    }
    /**
     *  Return templates of email with type = $type_template or type = 'all'.
     *  This search into table c_email_templates. Used by the get_form function.
     *
     *  @param	DoliDB		$dbs			Database handler
     *  @param	string		$type_template	Get message for model/type=$type_template, type='all' also included.
     *  @param	User		$user			Get templates public + limited to this user
     *  @param	Translate	$outputlangs	Output lang object
     *  @param	int			$id				Id of template to get, or
     *  									-1 for first found with position 0, or
     *  									0 for first found whatever is position (priority order depends on lang provided or not) or
     *  									-2 for exact match with label (no answer if not found)
     *  @param  int         $active         1=Only active template, 0=Only disabled, -1=All
     *  @param	string		$label			Label of template to get
     *  @param  int         $defaultfortype 1=Only default templates, 0=Only not default, -1=All
     *  @return ModelMail|CEmailTemplate|int<-1,-1>		One instance of CEmailTemplate or < 0 if error
     */
    public function getEMailTemplate($dbs, $type_template, $user, $outputlangs, $id = 0, $active = 1, $label = '', $defaultfortype = -1)
    {
    }
    /**
     *      Find if template exists
     *      Search into table c_email_templates
     *
     * 		@param	string		$type_template	Get message for key module
     *      @param	User		$user			Use template public or limited to this user
     *      @param	Translate	$outputlangs	Output lang object
     *      @return	int		Return integer <0 if KO,
     */
    public function isEMailTemplate($type_template, $user, $outputlangs)
    {
    }
    /**
     *	Find if template exists and are available for current user, then set them into $this->lines_model.
     *	Search in table c_email_templates
     *
     *	@param	string		$type_template	Get message for key module
     *	@param	User		$user			Use template public or limited to this user
     *	@param	?Translate	$outputlangs	Output lang object
     *	@param  int<-1,1>	$active			1=Only active template, 0=Only disabled, -1=All
     *	@return	int<-1,max>					Return integer <0 if KO, nb of records found if OK
     */
    public function fetchAllEMailTemplate($type_template, $user, $outputlangs, $active = 1)
    {
    }
    /**
     * Set ->substit (and ->substit_line) array from object. This is call when suggesting the email template into forms before sending email.
     *
     * @param	CommonObject	$object		   Object to use
     * @param   Translate  		$outputlangs   Object lang
     * @return	void
     * @see getCommonSubstitutionArray()
     */
    public function setSubstitFromObject($object, $outputlangs)
    {
    }
    /**
     * Get list of substitution keys available for emails. This is used for tooltips help.
     * This include the complete_substitutions_array.
     *
     * @param	string	$mode		'formemail', 'formemailwithlines', 'formemailforlines', 'emailing', ...
     * @param	?Object	$object		Object if applicable
     * @return	array<string,string>               Array of substitution values for emails.
     */
    public static function getAvailableSubstitKey($mode = 'formemail', $object = \null)
    {
    }
}