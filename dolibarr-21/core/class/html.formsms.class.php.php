<?php

/**
 *      Class permettant la generation du formulaire d'envoi de Sms
 *      Usage: $formsms = new FormSms($db)
 *             $formsms->proprietes=1 ou chaine ou tableau de valeurs
 *             $formsms->show_form() affiche le formulaire
 */
class FormSms
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var int
     */
    public $fromid;
    /**
     * @var string
     */
    public $fromname;
    /**
     * @var string
     */
    public $fromsms;
    /**
     * @var string
     */
    public $fromtype;
    /**
     * @var string
     */
    public $replytoname;
    /**
     * @var string
     */
    public $replytomail;
    /**
     * @var string
     */
    public $toname;
    /**
     * @var string
     */
    public $tomail;
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
     * @var int<0,1>
     */
    public $withto;
    /**
     * @var int<0,1>
     */
    public $withtopic;
    /**
     * @var int<0,1>
     */
    public $withbody;
    /**
     * @var int 	Id of company
     */
    public $withtosocid;
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
    public $withtopicreadonly;
    /**
     * @var int<0,1>
     */
    public $withbodyreadonly;
    /**
     * @var int<0,1>
     */
    public $withcancel;
    /**
     * @var array<string,string>
     */
    public $substit = array();
    /**
     * @var array{}|array{action:string,models:string,smsid:int,returnurl:string}
     */
    public $param = array();
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[]	Array of error strings
     */
    public $errors = array();
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
     *	Show the form to input an sms.
     *
     *	@param	string	$morecss Class on first column td
     *  @param int $showform Show form tags and submit button (recommended is to use with value 0)
     *	@return	void
     */
    public function show_form($morecss = 'titlefield', $showform = 1)
    {
    }
}