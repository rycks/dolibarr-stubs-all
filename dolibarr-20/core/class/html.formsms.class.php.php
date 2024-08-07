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
    public $fromid;
    public $fromname;
    public $fromsms;
    /**
     * @var string
     */
    public $fromtype;
    public $replytoname;
    public $replytomail;
    public $toname;
    public $tomail;
    public $withsubstit;
    // Show substitution array
    /**
     * @var int
     */
    public $withfrom;
    /**
     * @var int
     */
    public $withto;
    /**
     * @var int
     */
    public $withtopic;
    /**
     * @var int
     */
    public $withbody;
    /**
     * @var int 	Id of company
     */
    public $withtosocid;
    public $withfromreadonly;
    public $withreplytoreadonly;
    public $withtoreadonly;
    public $withtopicreadonly;
    public $withbodyreadonly;
    public $withcancel;
    public $substit = array();
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