<?php

/**
 * Class to generate the form for creating a new ticket.
 * Usage: 	$formticket = new FormTicket($db)
 * 			$formticket->proprietes = 1 or string or array of values
 * 			$formticket->show_form()  shows the form
 *
 * @package Ticket
 */
class FormTicket
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string		A hash value of the ticket. Duplicate of ref but for public purposes.
     */
    public $track_id;
    /**
     * @var string 		Email $trackid. Used also for the $keytoavoidconflict to name session vars to upload files.
     */
    public $trackid;
    /**
     * @var int ID
     */
    public $fk_user_create;
    /**
     * @var string
     */
    public $message;
    /**
     * @var string
     */
    public $topic_title;
    /**
     * @var string
     */
    public $action;
    /**
     * @var int<0,1>
     */
    public $withtopic;
    /**
     * @var int<0,1>
     */
    public $withemail;
    /**
     * @var int<0,1> $withsubstit Show substitution array
     */
    public $withsubstit;
    /**
     * @var int<0,2>
     */
    public $withfile;
    /**
     * @var int<0,1>
     */
    public $withfilereadonly;
    /**
     * @var string
     */
    public $backtopage;
    /**
     * @var int<0,1>
     */
    public $ispublic;
    // to show information or not into public form
    /**
     * @var int<0,1>
     */
    public $withtitletopic;
    /**
     * @var int<0,1>
     */
    public $withtopicreadonly;
    /**
     * @var int<0,1>
     */
    public $withreadid;
    /**
     * @var int<0,1>
     */
    public $withcompany;
    // to show company drop-down list
    /**
     * @var int<0,1>
     */
    public $withfromsocid;
    /**
     * @var int<0,1>
     */
    public $withfromcontactid;
    /**
     * @var int<0,1>
     */
    public $withnotifytiersatcreate;
    /**
     * @var int<0,1>
     */
    public $withusercreate;
    // to show name of creating user in form
    /**
     * @var int<0,1>
     */
    public $withcreatereadonly;
    /**
     * @var int<0,1> withextrafields
     */
    public $withextrafields;
    /**
     * @var int<0,1>
     */
    public $withref;
    // to show ref field
    /**
     * @var int<0,1>
     */
    public $withcancel;
    /**
     * @var string
     */
    public $type_code;
    /**
     * @var string
     */
    public $category_code;
    /**
     * @var string
     */
    public $severity_code;
    /**
     *
     * @var array<string,string> $substit Substitutions
     */
    public $substit = array();
    /**
     * @var array<string,mixed|array>
     */
    public $param = array();
    /**
     * @var string Error code (or message)
     */
    public $error;
    /**
     * @var string[]
     */
    public $errors = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *
     * Check required fields
     *
     * @param array<string, array<string, string>> $fields Array of fields to check
     * @param int $errors Reference of errors variable
     * @return void
     */
    public static function checkRequiredFields(array $fields, int &$errors)
    {
    }
    /**
     * Show the form to input ticket
     *
     * @param  	int	 		$withdolfichehead		With dol_get_fiche_head() and dol_get_fiche_end()
     * @param	'create'|'edit'	$mode				Mode ('create' or 'edit')
     * @param	int<0,1>	$public					1=If we show the form for the public interface
     * @param	?Contact	$with_contact			[=NULL] Contact to link to this ticket if it exists
     * @param	string		$action					[=''] Action in card
     * @param	?Ticket		$object					[=NULL] Ticket object
     * @return 	void
     */
    public function showForm($withdolfichehead = 0, $mode = 'edit', $public = 0, $with_contact = \null, $action = '', $object = \null)
    {
    }
    /**
     *      Return html list of tickets type
     *
     *      @param  string|int[]	$selected		Id of preselected field or array of Ids
     *      @param  string			$htmlname		Nom de la zone select
     *      @param  string			$filtertype		To filter on field type in llx_c_ticket_type (array('code'=>xx,'label'=>zz))
     *      @param  int				$format			0=id+label, 1=code+code, 2=code+label, 3=id+code
     *      @param  int|string		$empty      	1 = can be empty or 'string' to show the string as the empty value, 0 = can't be empty, 'ifone' = can be empty but autoselected if there is one only
     *      @param  int				$noadmininfo	0=Add admin info, 1=Disable admin info
     *      @param  int				$maxlength		Max length of label
     *      @param	string			$morecss		More CSS
     *      @param  int				$multiselect	Is multiselect ?
     *      @return void
     */
    public function selectTypesTickets($selected = '', $htmlname = 'tickettype', $filtertype = '', $format = 0, $empty = 0, $noadmininfo = 0, $maxlength = 0, $morecss = '', $multiselect = 0)
    {
    }
    /**
     *      Return html list of ticket analytic codes
     *
     *      @param  string 		$selected   		Id pre-selected category
     *      @param  string 		$htmlname   		Name of select component
     *      @param  string 		$filtertype 		To filter on some properties in llx_c_ticket_category ('public = 1'). This parameter must not come from input of users.
     *      @param  int    		$format     		0 = id+label, 1 = code+code, 2 = code+label, 3 = id+code
     *      @param  int|string	$empty      		1 = can be empty or 'string' to show the string as the empty value, 0 = can't be empty, 'ifone' = can be empty but autoselected if there is one only
     *      @param  int    		$noadmininfo		0 = ddd admin info, 1 = disable admin info
     *      @param  int    		$maxlength  		Max length of label
     *      @param	string		$morecss			More CSS
     * 		@param	int 		$use_multilevel		If > 0 create a multilevel select which use $htmlname example: $use_multilevel = 1 permit to have 2 select boxes.
     * 		@param	Translate	$outputlangs		Output language
     *      @return string|void						String of HTML component
     */
    public function selectGroupTickets($selected = '', $htmlname = 'ticketcategory', $filtertype = '', $format = 0, $empty = 0, $noadmininfo = 0, $maxlength = 0, $morecss = '', $use_multilevel = 0, $outputlangs = \null)
    {
    }
    /**
     *      Return html list of ticket severitys (priorities)
     *
     *      @param  string  	$selected    	Id severity pre-selected
     *      @param  string  	$htmlname    	Name of the select area
     *      @param  string  	$filtertype  	To filter on field type in llx_c_ticket_severity (array('code'=>xx,'label'=>zz))
     *      @param  int     	$format      	0 = id+label, 1 = code+code, 2 = code+label, 3 = id+code
     *      @param  int|string	$empty      	1 = can be empty or 'string' to show the string as the empty value, 0 = can't be empty, 'ifone' = can be empty but autoselected if there is one only
     *      @param  int     	$noadmininfo 	0 = add admin info, 1 = disable admin info
     *      @param  int     	$maxlength   	Max length of label
     *      @param  string  	$morecss     	More CSS
     *      @return void
     */
    public function selectSeveritiesTickets($selected = '', $htmlname = 'ticketseverity', $filtertype = '', $format = 0, $empty = 0, $noadmininfo = 0, $maxlength = 0, $morecss = '')
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
    /**
     * Show the form to add message on ticket
     *
     * @param  	string  $width      	Width of form
     * @return 	void
     */
    public function showMessageForm($width = '40%')
    {
    }
}