<?php

/**
 * Class to manage forms for the module resource
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
     *	@param	int		$selected		Preselected resource id
     *	@param	string	$htmlname		Name of field in form
     *  @param	array	$filter			Optional filters criteria (example: 's.rowid <> x')
     *	@param	int		$showempty		Add an empty field
     * 	@param	int		$showtype		Show third party type in combo list (customer, prospect or supplier)
     * 	@param	int		$forcecombo		Force to use combo box
     *  @param	array	$event			Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *  @param	array	$filterkey		Filter on key value
     *  @param	int		$outputmode		0=HTML select string, 1=Array, 2=without form tag
     *  @param	int		$limit			Limit number of answers, 0 for no limit
     *  @param	string	$morecss		More css
     * 	@param	bool	$multiple		add [] in the name of element and add 'multiple' attribute
     * 	@return	string|array			HTML string with
     */
    public function select_resource_list($selected = 0, $htmlname = 'fk_resource', array $filter = [], $showempty = 0, $showtype = 0, $forcecombo = 0, $event = [], $filterkey = [], $outputmode = 0, $limit = 20, $morecss = 'minwidth100', $multiple = \false)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return a select list with zip codes and their town
     *
     *    @param	string		$selected				Preselected value
     *    @param    string		$htmlname				HTML select name
     *    @param    array		$fields					Array with key of fields to refresh after selection
     *    @param    int			$fieldsize				Field size
     *    @param    int			$disableautocomplete    1 To disable ajax autocomplete features (browser autocomplete may still occurs)
     *    @param	string		$moreattrib				Add more attribute on HTML input field
     *    @param    string      $morecss                More css
     *    @return	string
     */
    public function select_ziptown($selected = '', $htmlname = 'zipcode', $fields = array(), $fieldsize = 0, $disableautocomplete = 0, $moreattrib = '', $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Returns the drop-down list of departments/provinces/cantons for all countries or for a given country.
     *   In the case of an all-country list, the display breaks on the country.
     *   The key of the list is the code (there can be several entries for a given code but in this case, the country field differs).
     *   Thus the links with the departments are done on a department independently of its name.
     *
     *    @param	int		$selected        	Code state preselected (mus be state id)
     *    @param    integer	$country_codeid    	Country code or id: 0=list for all countries, otherwise country code or country rowid to show
     *    @param    string	$htmlname			Id of department. If '', we want only the string with <option>
     *    @param	string	$morecss			Add more css
     * 	  @return	string						String with HTML select
     *    @see select_country()
     */
    public function select_state($selected = 0, $country_codeid = 0, $htmlname = 'state_id', $morecss = 'maxwidth200onsmartphone  minwidth300')
    {
    }
}