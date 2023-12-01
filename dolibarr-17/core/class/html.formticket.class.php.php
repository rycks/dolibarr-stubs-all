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
     * @var string	The track_id of the ticket. Used also for the $keytoavoidconflict to name session vars to upload files.
     */
    public $track_id;
    /**
     * @var int ID
     */
    public $fk_user_create;
    public $message;
    public $topic_title;
    public $action;
    public $withtopic;
    public $withemail;
    /**
     * @var int $withsubstit Show substitution array
     */
    public $withsubstit;
    public $withfile;
    public $withfilereadonly;
    public $backtopage;
    public $ispublic;
    // to show information or not into public form
    public $withtitletopic;
    public $withtopicreadonly;
    public $withreadid;
    public $withcompany;
    // to show company drop-down list
    public $withfromsocid;
    public $withfromcontactid;
    public $withnotifytiersatcreate;
    public $withusercreate;
    // to show name of creating user in form
    public $withcreatereadonly;
    public $withref;
    // to show ref field
    public $withcancel;
    public $type_code;
    public $category_code;
    public $severity_code;
    /**
     *
     * @var array $substit Substitutions
     */
    public $substit = array();
    public $param = array();
    /**
     * @var string Error code (or message)
     */
    public $error;
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
     * Show the form to input ticket
     *
     * @param  	int	 			$withdolfichehead		With dol_get_fiche_head() and dol_get_fiche_end()
     * @param	string			$mode					Mode ('create' or 'edit')
     * @param	int				$public					1=If we show the form for the public interface
     * @param	Contact|null	$with_contact			[=NULL] Contact to link to this ticket if it exists
     * @param	string			$action					[=''] Action in card
     * @return 	void
     */
    public function showForm($withdolfichehead = 0, $mode = 'edit', $public = 0, \Contact $with_contact = \null, $action = '')
    {
    }
    /**
     *      Return html list of tickets type
     *
     *      @param  string|array	$selected		Id of preselected field or array of Ids
     *      @param  string			$htmlname		Nom de la zone select
     *      @param  string			$filtertype		To filter on field type in llx_c_ticket_type (array('code'=>xx,'label'=>zz))
     *      @param  int				$format			0=id+libelle, 1=code+code, 2=code+libelle, 3=id+code
     *      @param  int				$empty			1=peut etre vide, 0 sinon
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
     *      Return html list of ticket anaytic codes
     *
     *      @param  string 		$selected   		Id pre-selected category
     *      @param  string 		$htmlname   		Name of select component
     *      @param  string 		$filtertype 		To filter on some properties in llx_c_ticket_category ('public = 1'). This parameter must not come from input of users.
     *      @param  int    		$format     		0 = id+label, 1 = code+code, 2 = code+label, 3 = id+code
     *      @param  int    		$empty      		1 = can be empty, 0 = or not
     *      @param  int    		$noadmininfo		0 = ddd admin info, 1 = disable admin info
     *      @param  int    		$maxlength  		Max length of label
     *      @param	string		$morecss			More CSS
     * 		@param	int 		$use_multilevel		If > 0 create a multilevel select which use $htmlname example: $use_multilevel = 1 permit to have 2 select boxes.
     * 		@param	Translate	$outputlangs		Output language
     *      @return void
     */
    public function selectGroupTickets($selected = '', $htmlname = 'ticketcategory', $filtertype = '', $format = 0, $empty = 0, $noadmininfo = 0, $maxlength = 0, $morecss = '', $use_multilevel = 0, $outputlangs = \null)
    {
    }
    /**
     *      Return html list of ticket severitys (priorities)
     *
     *      @param  string  $selected    Id severity pre-selected
     *      @param  string  $htmlname    Name of the select area
     *      @param  string  $filtertype  To filter on field type in llx_c_ticket_severity (array('code'=>xx,'label'=>zz))
     *      @param  int     $format      0 = id+label, 1 = code+code, 2 = code+label, 3 = id+code
     *      @param  int     $empty       1 = can be empty, 0 = or not
     *      @param  int     $noadmininfo 0 = add admin info, 1 = disable admin info
     *      @param  int     $maxlength   Max length of label
     *      @param  string  $morecss     More CSS
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