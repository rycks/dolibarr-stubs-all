<?php

/**
 * Class of forms component to manage companies
 */
class FormCompany extends \Form
{
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Return list of labels (translated) of third parties type
     *
     *		@param	int		$mode		0=Return id+label, 1=Return code+label
     *      @param  string	$filter     Add a SQL filter to select. Data must not come from user input.
     *    	@return array      			Array of types
     */
    public function typent_array($mode = 0, $filter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Renvoie la liste des types d'effectifs possibles (pas de traduction car nombre)
     *
     *	@param	int		$mode		0=renvoi id+libelle, 1=renvoi code+libelle
     *	@param  string	$filter     Add a SQL filter to select. Data must not come from user input.
     *  @return array				Array of types d'effectifs
     */
    public function effectif_array($mode = 0, $filter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Affiche formulaire de selection des modes de reglement
     *
     *  @param	int		$page        	Page
     *  @param  int		$selected    	Id or code preselected
     *  @param  string	$htmlname   	Nom du formulaire select
     *	@param	int		$empty			Add empty value in list
     *	@return	void
     */
    public function form_prospect_level($page, $selected = '', $htmlname = 'prospect_level_id', $empty = 0)
    {
    }
    /**
     *  Affiche formulaire de selection des niveau de prospection pour les contacts
     *
     *  @param	int		$page        	Page
     *  @param  int		$selected    	Id or code preselected
     *  @param  string	$htmlname   	Nom du formulaire select
     *	@param	int		$empty			Add empty value in list
     *	@return	void
     */
    public function formProspectContactLevel($page, $selected = '', $htmlname = 'prospect_contact_level_id', $empty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Returns the drop-down list of departments/provinces/cantons for all countries or for a given country.
     *   In the case of an all-country list, the display breaks on the country.
     *   The key of the list is the code (there can be several entries for a given code but in this case, the country field differs).
     *   Thus the links with the departments are done on a department independently of its name.
     *
     *   @param     string	$selected        	Code state preselected
     *   @param     int		$country_codeid     0=list for all countries, otherwise country code or country rowid to show
     *   @param     string	$htmlname			Id of department
     *   @return	void
     */
    public function select_departement($selected = '', $country_codeid = 0, $htmlname = 'state_id')
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Retourne la liste deroulante des regions actives dont le pays est actif
     *   La cle de la liste est le code (il peut y avoir plusieurs entree pour
     *   un code donnee mais dans ce cas, le champ pays et lang differe).
     *   Ainsi les liens avec les regions se font sur une region independemment de son name.
     *
     *   @param		string		$selected		Preselected value
     *   @param		string		$htmlname		Name of HTML select field
     *   @return	void
     */
    public function select_region($selected = '', $htmlname = 'region_id')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return combo list with people title
     *
     *  @param  string	$selected   	Civility/Title code preselected
     * 	@param	string	$htmlname		Name of HTML select combo field
     *  @param  string  $morecss        Add more css on SELECT element
     *  @param	int		$addjscombo		Add js combo
     *  @return	string					String with HTML select
     */
    public function select_civility($selected = '', $htmlname = 'civility_id', $morecss = 'maxwidth150', $addjscombo = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Retourne la liste deroulante des formes juridiques tous pays confondus ou pour un pays donne.
     *    Dans le cas d'une liste tous pays confondu, on affiche une rupture sur le pays.
     *
     *    @param	string		$selected        	Code forme juridique a pre-selectionne
     *    @param    mixed		$country_codeid		0=liste tous pays confondus, sinon code du pays a afficher
     *    @param    string		$filter          	Add a SQL filter on list
     *    @return	void
     *    @deprecated Use print xxx->select_juridicalstatus instead
     *    @see select_juridicalstatus()
     */
    public function select_forme_juridique($selected = '', $country_codeid = 0, $filter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Retourne la liste deroulante des formes juridiques tous pays confondus ou pour un pays donne.
     *    Dans le cas d'une liste tous pays confondu, on affiche une rupture sur le pays
     *
     *    @param	string		$selected        	Preselected code of juridical type
     *    @param    int			$country_codeid     0=list for all countries, otherwise list only country requested
     *    @param    string		$filter          	Add a SQL filter on list. Data must not come from user input.
     *    @param	string		$htmlname			HTML name of select
     *    @param	string		$morecss			More CSS
     *    @return	string							String with HTML select
     */
    public function select_juridicalstatus($selected = '', $country_codeid = 0, $filter = '', $htmlname = 'forme_juridique_code', $morecss = '')
    {
    }
    /**
     *  Output list of third parties.
     *
     *  @param  object		$object         Object we try to find contacts
     *  @param  string		$var_id         Name of id field
     *  @param  string		$selected       Pre-selected third party
     *  @param  string		$htmlname       Name of HTML form
     * 	@param	array		$limitto		Disable answers that are not id in this array list
     *  @param	int			$forceid		This is to force another object id than object->id
     *  @param	string		$moreparam		String with more param to add into url when noajax search is used.
     *  @param	string		$morecss		More CSS on select component
     * 	@return int 						The selected third party ID
     */
    public function selectCompaniesForNewContact($object, $var_id, $selected = '', $htmlname = 'newcompany', $limitto = '', $forceid = 0, $moreparam = '', $morecss = '')
    {
    }
    /**
     *  Return a select list with types of contacts
     *
     *  @param	object		$object         	Object to use to find type of contact
     *  @param  string		$selected       	Default selected value
     *  @param  string		$htmlname			HTML select name
     *  @param  string		$source				Source ('internal' or 'external')
     *  @param  string		$sortorder			Sort criteria ('position', 'code', ...)
     *  @param  int			$showempty      	1=Add en empty line
     *  @param  string      $morecss        	Add more css to select component
     *  @param  int      	$output         	0=return HTML, 1= direct print
     *  @param	int			$forcehidetooltip	Force hide tooltip for admin
     *  @return	string|void						Depending on $output param, return the HTML select list (recommended method) or nothing
     */
    public function selectTypeContact($object, $selected, $htmlname = 'type', $source = 'internal', $sortorder = 'position', $showempty = 0, $morecss = '', $output = 1, $forcehidetooltip = 0)
    {
    }
    /**
     * showContactRoles on view and edit mode
     *
     * @param 	string 		$htmlname 	Html component name and id
     * @param 	Contact 	$contact 	Contact Obejct
     * @param 	string 		$rendermode view, edit
     * @param 	array		$selected 	$key=>$val $val is selected Roles for input mode
     * @param	string		$morecss	More css
     * @return 	string   				String with contacts roles
     */
    public function showRoles($htmlname, \Contact $contact, $rendermode = 'view', $selected = array(), $morecss = 'minwidth500')
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
     *  Return HTML string to use as input of professional id into a HTML page (siren, siret, etc...)
     *
     *  @param	int		$idprof         1,2,3,4 (Example: 1=siren,2=siret,3=naf,4=rcs/rm)
     *  @param  string	$htmlname       Name of HTML select
     *  @param  string	$preselected    Default value to show
     *  @param  string	$country_code   FR, IT, ...
     *  @param  string  $morecss        More css
     *  @return	string					HTML string with prof id
     */
    public function get_input_id_prof($idprof, $htmlname, $preselected, $country_code, $morecss = 'maxwidth200')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return a HTML select with localtax values for thirdparties
     *
     * @param 	int 		$local			LocalTax
     * @param 	int 		$selected		Preselected value
     * @param 	string      $htmlname		HTML select name
     * @return	void
     */
    public function select_localtax($local, $selected, $htmlname)
    {
    }
    /**
     * Return a HTML select for thirdparty type
     *
     * @param int 		$selected 		Selected value
     * @param string 	$htmlname 		HTML select name
     * @param string 	$htmlidname 	HTML select id
     * @param string 	$typeinput 		HTML output
     * @param string 	$morecss 		More css
     * @param string	$allowempty		Allow empty value or not
     * @return string 					HTML string
     */
    public function selectProspectCustomerType($selected, $htmlname = 'client', $htmlidname = 'customerprospect', $typeinput = 'form', $morecss = '', $allowempty = '')
    {
    }
    /**
     *  Output html select to select third-party type
     *
     *  @param	string	$page       	Page
     *  @param  string	$selected   	Id preselected
     *  @param  string	$htmlname		Name of HTML select
     *  @param  string	$filter         optional filters criteras
     *  @param  int     $nooutput       No print output. Return it only.
     *  @return	void|string
     */
    public function formThirdpartyType($page, $selected = '', $htmlname = 'socid', $filter = '', $nooutput = 0)
    {
    }
    /**
     *  Output html select to select prospect status
     *
     *  @param  string			$htmlname		Name of HTML select
     *  @param	Societe|null	$prospectstatic Prospect object
     *  @param  int				$statusprospect	status of prospect
     *  @param  int				$idprospect     id of prospect
     *  @param  string  		$mode      		select if we want activate de html part or js
     *  @return	void
     */
    public function selectProspectStatus($htmlname, \Societe $prospectstatic, $statusprospect, $idprospect, $mode = "html")
    {
    }
}