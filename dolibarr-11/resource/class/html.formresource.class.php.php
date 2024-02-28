<?php

/**
 * Classe permettant la gestion des formulaire du module resource
 *
 * \remarks Utilisation: $formresource = new FormResource($db)
 * \remarks $formplace->proprietes=1 ou chaine ou tableau de valeurs
 */
class FormResource
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $substit = array();
    public $param = array();
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html form to select a resource
     *
     *	@param	int   	$selected       Preselected resource id
     *	@param  string	$htmlname       Name of field in form
     *  @param  string	$filter         Optionnal filters criteras (example: 's.rowid <> x')
     *	@param	int		$showempty		Add an empty field
     * 	@param	int		$showtype		Show third party type in combolist (customer, prospect or supplier)
     * 	@param	int		$forcecombo		Force to use combo box
     *  @param	array	$event			Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *  @param	string	$filterkey		Filter on key value
     *  @param	int		$outputmode		0=HTML select string, 1=Array, 2=without form tag
     *  @param	int		$limit			Limit number of answers
     * 	@return	string					HTML string with
     */
    public function select_resource_list($selected = '', $htmlname = 'fk_resource', $filter = '', $showempty = 0, $showtype = 0, $forcecombo = 0, $event = array(), $filterkey = '', $outputmode = 0, $limit = 20)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return html list of tickets type
     *
     *  @param	string	$selected       Id du type pre-selectionne
     *  @param  string	$htmlname       Nom de la zone select
     *  @param  string	$filtertype     To filter on field type in llx_c_ticket_type (array('code'=>xx,'label'=>zz))
     *  @param  int		$format         0=id+libelle, 1=code+code, 2=code+libelle, 3=id+code
     *  @param  int		$empty			1=peut etre vide, 0 sinon
     *  @param	int		$noadmininfo	0=Add admin info, 1=Disable admin info
     *  @param  int		$maxlength      Max length of label
     * 	@return	void
     */
    public function select_types_resource($selected = '', $htmlname = 'type_resource', $filtertype = '', $format = 0, $empty = 0, $noadmininfo = 0, $maxlength = 0)
    {
    }
}