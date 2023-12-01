<?php

/**
 * Classe permettant la generation du formulaire d'un nouveau ticket.
 *
 * @package Ticket
 * \remarks Utilisation: $formticket = new FormTicket($db)
 * \remarks $formticket->proprietes=1 ou chaine ou tableau de valeurs
 * \remarks $formticket->show_form() affiche le formulaire
 */
class FormTicket
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
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
     *
     * @var int $withsubstit Show substitution array
     */
    public $withsubstit;
    public $withfile;
    public $withfilereadonly;
    public $ispublic;
    // To show information or not into public form
    public $withtitletopic;
    public $withcompany;
    // affiche liste déroulante company
    public $withfromsocid;
    public $withfromcontactid;
    public $withnotifytiersatcreate;
    public $withusercreate;
    // Show name of creating user in form
    public $withcreatereadonly;
    public $withref;
    // Show ref field
    public $withcancel;
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
     * @param	Contact|null	$with_contact			[=NULL] Contact to link to this ticket if exists
     * @param	string			$action					[=''] Action in card
     * @return 	void
     */
    public function showForm($withdolfichehead = 0, $mode = 'edit', $public = 0, \Contact $with_contact = \null, $action = '')
    {
    }
    /**
     *      Return html list of tickets type
     *
     *      @param  string $selected    Id du type pre-selectionne
     *      @param  string $htmlname    Nom de la zone select
     *      @param  string $filtertype  To filter on field type in llx_c_ticket_type (array('code'=>xx,'label'=>zz))
     *      @param  int    $format      0=id+libelle, 1=code+code, 2=code+libelle, 3=id+code
     *      @param  int    $empty       1=peut etre vide, 0 sinon
     *      @param  int    $noadmininfo 0=Add admin info, 1=Disable admin info
     *      @param  int    $maxlength   Max length of label
     *      @param	string	$morecss	More CSS
     *      @return void
     */
    public function selectTypesTickets($selected = '', $htmlname = 'tickettype', $filtertype = '', $format = 0, $empty = 0, $noadmininfo = 0, $maxlength = 0, $morecss = '')
    {
    }
    /**
     *      Return html list of ticket anaytic codes
     *
     *      @param  string $selected    Id categorie pre-selectionnée
     *      @param  string $htmlname    Nom de la zone select
     *      @param  string $filtertype  To filter on some properties in llx_c_ticket_category ('public = 1'). This parameter must not come from input of users.
     *      @param  int    $format      0=id+libelle, 1=code+code, 2=code+libelle, 3=id+code
     *      @param  int    $empty       1=peut etre vide, 0 sinon
     *      @param  int    $noadmininfo 0=Add admin info, 1=Disable admin info
     *      @param  int    $maxlength   Max length of label
     *      @param	string	$morecss	More CSS
     * 		@param	int 	$use_multilevel	if != 0 create a multilevel select ( Do not use any of the other params)
     *      @return void
     */
    public function selectGroupTickets($selected = '', $htmlname = 'ticketcategory', $filtertype = '', $format = 0, $empty = 0, $noadmininfo = 0, $maxlength = 0, $morecss = '', $use_multilevel = 0)
    {
    }
    /**
     *      Return html list of ticket severitys
     *
     *      @param  string $selected    Id severity pre-selectionnée
     *      @param  string $htmlname    Nom de la zone select
     *      @param  string $filtertype  To filter on field type in llx_c_ticket_severity (array('code'=>xx,'label'=>zz))
     *      @param  int    $format      0=id+libelle, 1=code+code, 2=code+libelle, 3=id+code
     *      @param  int    $empty       1=peut etre vide, 0 sinon
     *      @param  int    $noadmininfo 0=Add admin info, 1=Disable admin info
     *      @param  int    $maxlength   Max length of label
     *      @param	string	$morecss	More CSS
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