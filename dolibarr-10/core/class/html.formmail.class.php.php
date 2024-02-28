<?php

/**
 *      Classe permettant la generation du formulaire html d'envoi de mail unitaire
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
    public $withform;
    // 1=Include HTML form tag and show submit button, 0=Do not include form tag and submit button, -1=Do not include form tag but include submit button
    public $fromname;
    public $frommail;
    /**
     * @var string user, company, robot
     */
    public $fromtype;
    /**
     * @var int ID
     */
    public $fromid;
    /**
     * @var string thirdparty etc
     */
    public $totype;
    /**
     * @var int ID
     */
    public $toid;
    public $replytoname;
    public $replytomail;
    public $toname;
    public $tomail;
    public $trackid;
    public $withsubstit;
    // Show substitution array
    public $withfrom;
    /**
     * @var int
     * @deprecated Fill withto with array before calling method.
     * @see $withto
     */
    public $withtosocid;
    /**
     * @var int|int[]
     */
    public $withto;
    // Show recipient emails
    public $withtofree;
    // Show free text for recipient emails
    public $withtocc;
    public $withtoccc;
    public $withtopic;
    public $withfile;
    // 0=No attaches files, 1=Show attached files, 2=Can add new attached files
    public $withmaindocfile;
    // 1=Add a checkbox "Attach also main document" for mass actions (checked by default), -1=Add checkbox (not checked by default)
    public $withbody;
    public $withfromreadonly;
    public $withreplytoreadonly;
    public $withtoreadonly;
    public $withtoccreadonly;
    public $withtocccreadonly;
    public $withtopicreadonly;
    public $withfilereadonly;
    public $withdeliveryreceipt;
    public $withcancel;
    public $withfckeditor;
    public $substit = array();
    public $substit_lines = array();
    public $param = array();
    public $withtouser = array();
    public $withtoccuser = array();
    public $lines_model;
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
     * @param  	string	$keytodelete     Key index in file array (0, 1, 2, ...)
     * @return	void
     */
    public function remove_attached_files($keytodelete)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of attached files (stored in SECTION array)
     *
     * @return	array       array('paths'=> ,'names'=>, 'mimes'=> )
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
     */
    public function show_form($addfileaction = 'addfile', $removefileaction = 'removefile')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Get the form to input an email
     *  this->withfile: 0=No attaches files, 1=Show attached files, 2=Can add new attached files
     *  this->withfile
     *  this->param:	Contains more parameters like email templates info
     *
     *	@param	string	$addfileaction		Name of action when posting file attachments
     *	@param	string	$removefileaction	Name of action when removing file attachments
     *	@return string						Form to show
     */
    public function get_form($addfileaction = 'addfile', $removefileaction = 'removefile')
    {
    }
    /**
     * get html For WithCCC
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
     * get Html For Asking for Deliveriy Receipt
     *
     * @return string html
     */
    public function getHtmlForDeliveryreceipt()
    {
    }
    /**
     * get Html For Topic of message
     *
     * @param	array	$arraydefaultmessage		Array with message template content
     * @param	string	$helpforsubstitution		Help string for substitution
     * @return 	string 								Text for topic
     */
    public function getHtmlForTopic($arraydefaultmessage, $helpforsubstitution)
    {
    }
    /**
     *  Return templates of email with type = $type_template or type = 'all'.
     *  This search into table c_email_templates. Used by the get_form function.
     *
     *  @param	DoliDB		$db				Database handler
     *  @param	string		$type_template	Get message for model/type=$type_template, type='all' also included.
     *  @param	string		$user			Get template public or limited to this user
     *  @param	Translate	$outputlangs	Output lang object
     *  @param	int			$id				Id of template to find, or -1 for first found with position 0, or 0 for first found whatever is position (priority order depends on lang provided or not) or -2 for exact match with label (no answer if not found)
     *  @param  int         $active         1=Only active template, 0=Only disabled, -1=All
     *  @param	string		$label			Label of template
     *  @return ModelMail|integer			One instance of ModelMail or -1 if error
     */
    public function getEMailTemplate($db, $type_template, $user, $outputlangs, $id = 0, $active = 1, $label = '')
    {
    }
    /**
     *      Find if template exists
     *      Search into table c_email_templates
     *
     * 		@param	string		$type_template	Get message for key module
     *      @param	string		$user			Use template public or limited to this user
     *      @param	Translate	$outputlangs	Output lang object
     *      @return	int		<0 if KO,
     */
    public function isEMailTemplate($type_template, $user, $outputlangs)
    {
    }
    /**
     *      Find if template exists and are available for current user, then set them into $this->lines_module.
     *      Search into table c_email_templates
     *
     * 		@param	string		$type_template	Get message for key module
     *      @param	string		$user			Use template public or limited to this user
     *      @param	Translate	$outputlangs	Output lang object
     *      @param  int         $active         1=Only active template, 0=Only disabled, -1=All
     *      @return	int		                    <0 if KO, nb of records found if OK
     */
    public function fetchAllEMailTemplate($type_template, $user, $outputlangs, $active = 1)
    {
    }
    /**
     * Set substit array from object. This is call when suggesting the email template into forms before sending email.
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
     * @param	Object	$object		Object if applicable
     * @return	array               Array of substitution values for emails.
     */
    public static function getAvailableSubstitKey($mode = 'formemail', $object = \null)
    {
    }
}
/**
 * ModelMail
 */
class ModelMail
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Model mail label
     */
    public $label;
    public $topic;
    public $content;
    public $content_lines;
    public $lang;
    public $joinfiles;
}