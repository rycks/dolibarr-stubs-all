<?php

/**
 *      Class permettant la generation du formulaire html d'envoi de mail unitaire
 *      Usage: $formail = new FormAI($db)
 *             $formai->proprietes=1 ou chaine ou tableau de valeurs
 *             $formai->show_form() affiche le formulaire
 */
class FormAI extends \Form
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string					Use case string to a button "Fill with layout" for this use case. Example 'wesitepage', 'emailing', 'email', ...
     */
    public $withlayout;
    /**
     * @var string	'text' or 'html' to add a button "Fill with AI generation"
     */
    public $withaiprompt;
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
     * @var int<-1,1> -1 suggests the checkbox 'one email per recipient' not checked, 0 = no suggestion, 1 = suggest and checked
     */
    public $withoptiononeemailperrecipient;
    /**
     * @var bool
     */
    public $aicallfunctioncalled = \false;
    /**
     *	Constructor
     *
     *  @param	DoliDB	$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return Html code for AI instructions of message and autofill result.
     *
     * @param	string		$function			Function/variant for text generation ('textgenerationemail', 'textgenerationwebpage', ...)
     * @param	string		$format				Format for output ('', 'html', ...)
     * @param   string      $htmlContent    	HTML name of WYSIWYG field
     * @param	string		$onlyenhancements	Show only this enhancement features (show all if '')
     * @param	string		$aiprompt			Ai prompt for textgenerationextrafield function
     * @return 	string      					HTML code to ask AI instructions and autofill result
     */
    public function getSectionForAIEnhancement($function = 'textgeneration', $format = '', $htmlContent = 'message', $onlyenhancements = '', $aiprompt = "")
    {
    }
    /**
     * Return javascript code for call to AI function callAIGenerator()
     *
     * @return 	string      				HTML code to ask AI instructions and autofill result
     */
    public function getAjaxAICallFunction()
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
}