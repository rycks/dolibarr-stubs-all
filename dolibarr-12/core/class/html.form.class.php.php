<?php

/* Copyright (c) 2002-2007  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2012  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2004       Sebastien Di Cintio     <sdicintio@ressource-toi.org>
 * Copyright (C) 2004       Eric Seigne             <eric.seigne@ryxeo.com>
 * Copyright (C) 2005-2017  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2006       Andre Cianfarani        <acianfa@free.fr>
 * Copyright (C) 2006       Marc Barilley/Ocebo     <marc@ocebo.com>
 * Copyright (C) 2007       Franky Van Liedekerke   <franky.van.liedekerker@telenet.be>
 * Copyright (C) 2007       Patrick Raguin          <patrick.raguin@gmail.com>
 * Copyright (C) 2010       Juanjo Menent           <jmenent@2byte.es>
 * Copyright (C) 2010-2019  Philippe Grand          <philippe.grand@atoo-net.com>
 * Copyright (C) 2011       Herve Prot              <herve.prot@symeos.com>
 * Copyright (C) 2012-2016  Marcos García           <marcosgdf@gmail.com>
 * Copyright (C) 2012       Cedric Salvador         <csalvador@gpcsolutions.fr>
 * Copyright (C) 2012-2015  Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2014       Alexandre Spangaro      <aspangaro@open-dsi.fr>
 * Copyright (C) 2018-2021  Ferran Marcet           <fmarcet@2byte.es>
 * Copyright (C) 2018-2019  Frédéric France         <frederic.france@netlogic.fr>
 * Copyright (C) 2018       Nicolas ZABOURI	        <info@inovea-conseil.com>
 * Copyright (C) 2018       Christophe Battarel     <christophe@altairis.fr>
 * Copyright (C) 2018       Josep Lluis Amador      <joseplluis@lliuretic.cat>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
/**
 *	\file       htdocs/core/class/html.form.class.php
 *  \ingroup    core
 *	\brief      File of class with all html predefined components
 */
/**
 *	Class to manage generation of HTML components
 *	Only common components must be here.
 *
 *  TODO Merge all function load_cache_* and loadCache* (except load_cache_vatrates) into one generic function loadCacheTable
 */
class Form
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[]    Array of error strings
     */
    public $errors = array();
    public $num;
    // Cache arrays
    public $cache_types_paiements = array();
    public $cache_conditions_paiements = array();
    public $cache_availability = array();
    public $cache_demand_reason = array();
    public $cache_types_fees = array();
    public $cache_vatrates = array();
    /**
     * Constructor
     *
     * @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Output key field for an editable field
     *
     * @param   string	$text			Text of label or key to translate
     * @param   string	$htmlname		Name of select field ('edit' prefix will be added)
     * @param   string	$preselected    Value to show/edit (not used in this function)
     * @param	object	$object			Object
     * @param	boolean	$perm			Permission to allow button to edit parameter. Set it to 0 to have a not edited field.
     * @param	string	$typeofdata		Type of data ('string' by default, 'email', 'amount:99', 'numeric:99', 'text' or 'textarea:rows:cols', 'datepicker' ('day' do not work, don't know why), 'ckeditor:dolibarr_zzz:width:height:savemethod:1:rows:cols', 'select;xxx[:class]'...)
     * @param	string	$moreparam		More param to add on a href URL.
     * @param   int     $fieldrequired  1 if we want to show field as mandatory using the "fieldrequired" CSS.
     * @param   int     $notabletag     1=Do not output table tags but output a ':', 2=Do not output table tags and no ':', 3=Do not output table tags but output a ' '
     * @param	string	$paramid		Key of parameter for id ('id', 'socid')
     * @param	string	$help			Tooltip help
     * @return	string					HTML edit field
     */
    public function editfieldkey($text, $htmlname, $preselected, $object, $perm, $typeofdata = 'string', $moreparam = '', $fieldrequired = 0, $notabletag = 0, $paramid = 'id', $help = '')
    {
    }
    /**
     * Output value of a field for an editable field
     *
     * @param	string	$text			Text of label (not used in this function)
     * @param	string	$htmlname		Name of select field
     * @param	string	$value			Value to show/edit
     * @param	object	$object			Object
     * @param	boolean	$perm			Permission to allow button to edit parameter
     * @param	string	$typeofdata		Type of data ('string' by default, 'email', 'amount:99', 'numeric:99', 'text' or 'textarea:rows:cols%', 'datepicker' ('day' do not work, don't know why), 'dayhour' or 'datepickerhour', 'ckeditor:dolibarr_zzz:width:height:savemethod:toolbarstartexpanded:rows:cols', 'select;xkey:xval,ykey:yval,...')
     * @param	string	$editvalue		When in edit mode, use this value as $value instead of value (for example, you can provide here a formated price instead of value). Use '' to use same than $value
     * @param	object	$extObject		External object
     * @param	mixed	$custommsg		String or Array of custom messages : eg array('success' => 'MyMessage', 'error' => 'MyMessage')
     * @param	string	$moreparam		More param to add on the form action href URL
     * @param   int     $notabletag     Do no output table tags
     * @param	string	$formatfunc		Call a specific function to output field
     * @param	string	$paramid		Key of parameter for id ('id', 'socid')
     * @return  string					HTML edit field
     */
    public function editfieldval($text, $htmlname, $value, $object, $perm, $typeofdata = 'string', $editvalue = '', $extObject = \null, $custommsg = \null, $moreparam = '', $notabletag = 0, $formatfunc = '', $paramid = 'id')
    {
    }
    /**
     * Output edit in place form
     *
     * @param   string	$fieldname		Name of the field
     * @param	object	$object			Object
     * @param	boolean	$perm			Permission to allow button to edit parameter. Set it to 0 to have a not edited field.
     * @param	string	$typeofdata		Type of data ('string' by default, 'email', 'amount:99', 'numeric:99', 'text' or 'textarea:rows:cols', 'datepicker' ('day' do not work, don't know why), 'ckeditor:dolibarr_zzz:width:height:savemethod:1:rows:cols', 'select;xxx[:class]'...)
     * @param	string	$check			Same coe than $check parameter of GETPOST()
     * @param	string	$morecss		More CSS
     * @return	string   		      	HTML code for the edit of alternative language
     */
    public function widgetForTranslation($fieldname, $object, $perm, $typeofdata = 'string', $check = '', $morecss = '')
    {
    }
    /**
     * Output edit in place form
     *
     * @param	object	$object			Object
     * @param	string	$value			Value to show/edit
     * @param	string	$htmlname		DIV ID (field name)
     * @param	int		$condition		Condition to edit
     * @param	string	$inputType		Type of input ('string', 'numeric', 'datepicker' ('day' do not work, don't know why), 'textarea:rows:cols', 'ckeditor:dolibarr_zzz:width:height:?:1:rows:cols', 'select:loadmethod:savemethod:buttononly')
     * @param	string	$editvalue		When in edit mode, use this value as $value instead of value
     * @param	object	$extObject		External object
     * @param	mixed	$custommsg		String or Array of custom messages : eg array('success' => 'MyMessage', 'error' => 'MyMessage')
     * @return	string   		      	HTML edit in place
     */
    protected function editInPlace($object, $value, $htmlname, $condition, $inputType = 'textarea', $editvalue = \null, $extObject = \null, $custommsg = \null)
    {
    }
    /**
     *	Show a text and picto with tooltip on text or picto.
     *  Can be called by an instancied $form->textwithtooltip or by a static call Form::textwithtooltip
     *
     *	@param	string		$text				Text to show
     *	@param	string		$htmltext			HTML content of tooltip. Must be HTML/UTF8 encoded.
     *	@param	int			$tooltipon			1=tooltip on text, 2=tooltip on image, 3=tooltip sur les 2
     *	@param	int			$direction			-1=image is before, 0=no image, 1=image is after
     *	@param	string		$img				Html code for image (use img_xxx() function to get it)
     *	@param	string		$extracss			Add a CSS style to td tags
     *	@param	int			$notabs				0=Include table and tr tags, 1=Do not include table and tr tags, 2=use div, 3=use span
     *	@param	string		$incbefore			Include code before the text
     *	@param	int			$noencodehtmltext	Do not encode into html entity the htmltext
     *  @param  string      $tooltiptrigger		''=Tooltip on hover, 'abc'=Tooltip on click (abc is a unique key)
     *  @param	int			$forcenowrap		Force no wrap between text and picto (works with notabs=2 only)
     *	@return	string							Code html du tooltip (texte+picto)
     *	@see	textwithpicto() Use thisfunction if you can.
     *  TODO Move this as static as soon as everybody use textwithpicto or @Form::textwithtooltip
     */
    public function textwithtooltip($text, $htmltext, $tooltipon = 1, $direction = 0, $img = '', $extracss = '', $notabs = 3, $incbefore = '', $noencodehtmltext = 0, $tooltiptrigger = '', $forcenowrap = 0)
    {
    }
    /**
     *	Show a text with a picto and a tooltip on picto
     *
     *	@param	string	$text				Text to show
     *	@param  string	$htmltext	     	Content of tooltip
     *	@param	int		$direction			1=Icon is after text, -1=Icon is before text, 0=no icon
     * 	@param	string	$type				Type of picto ('info', 'infoclickable', 'help', 'helpclickable', 'warning', 'superadmin', 'mypicto@mymodule', ...) or image filepath or 'none'
     *  @param  string	$extracss           Add a CSS style to td, div or span tag
     *  @param  int		$noencodehtmltext   Do not encode into html entity the htmltext
     *  @param	int		$notabs				0=Include table and tr tags, 1=Do not include table and tr tags, 2=use div, 3=use span
     *  @param  string  $tooltiptrigger     ''=Tooltip on hover, 'abc'=Tooltip on click (abc is a unique key, clickable link is on image or on link if param $type='none' or on both if $type='xxxclickable')
     *  @param	int		$forcenowrap		Force no wrap between text and picto (works with notabs=2 only)
     * 	@return	string						HTML code of text, picto, tooltip
     */
    public function textwithpicto($text, $htmltext, $direction = 1, $type = 'help', $extracss = '', $noencodehtmltext = 0, $notabs = 3, $tooltiptrigger = '', $forcenowrap = 0)
    {
    }
    /**
     * Generate select HTML to choose massaction
     *
     * @param	string	$selected		Value auto selected when at least one record is selected. Not a preselected value. Use '0' by default.
     * @param	array		$arrayofaction	array('code'=>'label', ...). The code is the key stored into the GETPOST('massaction') when submitting action.
     * @param   int     $alwaysvisible  1=select button always visible
     * @return	string|void					Select list
     */
    public function selectMassAction($selected, $arrayofaction, $alwaysvisible = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return combo list of activated countries, into language of user
     *
     *  @param	string	$selected       		Id or Code or Label of preselected country
     *  @param  string	$htmlname       		Name of html select object
     *  @param  string	$htmloption     		More html options on select object
     *  @param	integer	$maxlength				Max length for labels (0=no limit)
     *  @param	string	$morecss				More css class
     *  @param	string	$usecodeaskey			''=Use id as key (default), 'code3'=Use code on 3 alpha as key, 'code2"=Use code on 2 alpha as key
     *  @param	int		$showempty				Show empty choice
     *  @param	int		$disablefavorites		1=Disable favorites,
     *  @param	int		$addspecialentries		1=Add dedicated entries for group of countries (like 'European Economic Community', ...)
     *  @param	array	$exclude_country_code	Array of country code (iso2) to exclude
     *  @return string           				HTML string with select
     */
    public function select_country($selected = '', $htmlname = 'country_id', $htmloption = '', $maxlength = 0, $morecss = 'minwidth300', $usecodeaskey = '', $showempty = 1, $disablefavorites = 0, $addspecialentries = 0, $exclude_country_code = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return select list of incoterms
     *
     *  @param	string	$selected       		Id or Code of preselected incoterm
     *  @param	string	$location_incoterms     Value of input location
     *  @param	string	$page       			Defined the form action
     *  @param  string	$htmlname       		Name of html select object
     *  @param  string	$htmloption     		Options html on select object
     * 	@param	int		$forcecombo				Force to load all values and output a standard combobox (with no beautification)
     *  @param	array	$events					Event options to run on change. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *  @return string           				HTML string with select and input
     */
    public function select_incoterms($selected = '', $location_incoterms = '', $page = '', $htmlname = 'incoterm_id', $htmloption = '', $forcecombo = 1, $events = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of types of lines (product or service)
     * 	Example: 0=product, 1=service, 9=other (for external module)
     *
     *	@param  string	$selected       Preselected type
     *	@param  string	$htmlname       Name of field in html form
     * 	@param	int		$showempty		Add an empty field
     * 	@param	int		$hidetext		Do not show label 'Type' before combo box (used only if there is at least 2 choices to select)
     * 	@param	integer	$forceall		1=Force to show products and services in combo list, whatever are activated modules, 0=No force, 2=Force to show only Products, 3=Force to show only services, -1=Force none (and set hidden field to 'service')
     *  @return	void
     */
    public function select_type_of_lines($selected = '', $htmlname = 'type', $showempty = 0, $hidetext = 0, $forceall = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load into cache cache_types_fees, array of types of fees
     *
     *	@return     int             Nb of lines loaded, <0 if KO
     */
    public function load_cache_types_fees()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of types of notes
     *
     *	@param	string		$selected		Preselected type
     *	@param  string		$htmlname		Name of field in form
     * 	@param	int			$showempty		Add an empty field
     * 	@return	void
     */
    public function select_type_fees($selected = '', $htmlname = 'type', $showempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return HTML code to select a company.
     *
     *  @param		int			$selected				Preselected products
     *  @param		string		$htmlname				Name of HTML select field (must be unique in page)
     *  @param		int			$filter					Filter on thirdparty
     *  @param		int			$limit					Limit on number of returned lines
     *  @param		array		$ajaxoptions			Options for ajax_autocompleter
     * 	@param		int			$forcecombo				Force to load all values and output a standard combobox (with no beautification)
     *  @return		string								Return select box for thirdparty.
     *  @deprecated	3.8 Use select_company instead. For exemple $form->select_thirdparty(GETPOST('socid'),'socid','',0) => $form->select_company(GETPOST('socid'),'socid','',1,0,0,array(),0)
     */
    public function select_thirdparty($selected = '', $htmlname = 'socid', $filter = '', $limit = 20, $ajaxoptions = array(), $forcecombo = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html form to select a third party
     *
     *	@param	string	$selected       		Preselected type
     *	@param  string	$htmlname       		Name of field in form
     *  @param  string	$filter         		Optional filters criteras. WARNING: To avoid SQL injection, only few chars [.a-z0-9 =<>] are allowed here (example: 's.rowid <> x', 's.client IN (1,3)')
     *	@param	string	$showempty				Add an empty field (Can be '1' or text key to use on empty line like 'SelectThirdParty')
     * 	@param	int		$showtype				Show third party type in combolist (customer, prospect or supplier)
     * 	@param	int		$forcecombo				Force to load all values and output a standard combobox (with no beautification)
     *  @param	array	$events					Ajax event options to run on change. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *	@param	int		$limit					Maximum number of elements
     *  @param	string	$morecss				Add more css styles to the SELECT component
     *	@param  string	$moreparam      		Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     *	@param	string	$selected_input_value	Value of preselected input text (for use with ajax)
     *  @param	int		$hidelabel				Hide label (0=no, 1=yes, 2=show search icon (before) and placeholder, 3 search icon after)
     *  @param	array	$ajaxoptions			Options for ajax_autocompleter
     * 	@param  bool	$multiple				add [] in the name of element and add 'multiple' attribut (not working with ajax_autocompleter)
     * 	@return	string							HTML string with select box for thirdparty.
     */
    public function select_company($selected = '', $htmlname = 'socid', $filter = '', $showempty = '', $showtype = 0, $forcecombo = 0, $events = array(), $limit = 0, $morecss = 'minwidth100', $moreparam = '', $selected_input_value = '', $hidelabel = 1, $ajaxoptions = array(), $multiple = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html form to select a third party.
     *  Note, you must use the select_company to get the component to select a third party. This function must only be called by select_company.
     *
     *	@param	string	$selected       Preselected type
     *	@param  string	$htmlname       Name of field in form
     *  @param  string	$filter         Optional filters criteras (example: 's.rowid <> x', 's.client in (1,3)')
     *	@param	string	$showempty		Add an empty field (Can be '1' or text to use on empty line like 'SelectThirdParty')
     * 	@param	int		$showtype		Show third party type in combolist (customer, prospect or supplier)
     * 	@param	int		$forcecombo		Force to use standard HTML select component without beautification
     *  @param	array	$events			Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *  @param	string	$filterkey		Filter on key value
     *  @param	int		$outputmode		0=HTML select string, 1=Array
     *  @param	int		$limit			Limit number of answers
     *  @param	string	$morecss		Add more css styles to the SELECT component
     *	@param  string	$moreparam      Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     *	@param  bool	$multiple       add [] in the name of element and add 'multiple' attribut
     * 	@return	string					HTML string with
     */
    public function select_thirdparty_list($selected = '', $htmlname = 'socid', $filter = '', $showempty = '', $showtype = 0, $forcecombo = 0, $events = array(), $filterkey = '', $outputmode = 0, $limit = 0, $morecss = 'minwidth100', $moreparam = '', $multiple = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return HTML combo list of absolute discounts
     *
     *  @param	string	$selected       Id remise fixe pre-selectionnee
     *  @param  string	$htmlname       Nom champ formulaire
     *  @param  string	$filter         Criteres optionnels de filtre
     *  @param	int		$socid			Id of thirdparty
     *  @param	int		$maxvalue		Max value for lines that can be selected
     *  @return	int						Return number of qualifed lines in list
     */
    public function select_remises($selected, $htmlname, $filter, $socid, $maxvalue = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of all contacts (for a third party or all)
     *
     *  @param	int		$socid      	Id ot third party or 0 for all
     *  @param  string	$selected   	Id contact pre-selectionne
     *  @param  string	$htmlname  	    Name of HTML field ('none' for a not editable field)
     *  @param  int		$showempty      0=no empty value, 1=add an empty value, 2=add line 'Internal' (used by user edit), 3=add an empty value only if more than one record into list
     *  @param  string	$exclude        List of contacts id to exclude
     *  @param	string	$limitto		Disable answers that are not id in this array list
     *  @param	integer	$showfunction   Add function into label
     *  @param	string	$moreclass		Add more class to class style
     *  @param	integer	$showsoc	    Add company into label
     *  @param	int		$forcecombo		Force to use combo box
     *  @param	array	$events			Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *  @param	bool	$options_only	Return options only (for ajax treatment)
     *  @param	string	$moreparam		Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     *  @param	string	$htmlid			Html id to use instead of htmlname
     *  @return	int						<0 if KO, Nb of contact in list if OK
     *  @deprected						You can use selectcontacts directly (warning order of param was changed)
     */
    public function select_contacts($socid, $selected = '', $htmlname = 'contactid', $showempty = 0, $exclude = '', $limitto = '', $showfunction = 0, $moreclass = '', $showsoc = 0, $forcecombo = 0, $events = array(), $options_only = \false, $moreparam = '', $htmlid = '')
    {
    }
    /**
     *	Return HTML code of the SELECT of list of all contacts (for a third party or all).
     *  This also set the number of contacts found into $this->num
     *
     * @since 9.0 Add afterSelectContactOptions hook
     *
     *	@param	int			$socid      	Id ot third party or 0 for all or -1 for empty list
     *	@param  array|int	$selected   	Array of ID of pre-selected contact id
     *	@param  string		$htmlname  	    Name of HTML field ('none' for a not editable field)
     *	@param  int			$showempty     	0=no empty value, 1=add an empty value, 2=add line 'Internal' (used by user edit), 3=add an empty value only if more than one record into list
     *	@param  string		$exclude        List of contacts id to exclude
     *	@param	string		$limitto		Disable answers that are not id in this array list
     *	@param	integer		$showfunction   Add function into label
     *	@param	string		$moreclass		Add more class to class style
     *	@param	bool		$options_only	Return options only (for ajax treatment)
     *	@param	integer		$showsoc	    Add company into label
     * 	@param	int			$forcecombo		Force to use combo box (so no ajax beautify effect)
     *  @param	array		$events			Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *  @param	string		$moreparam		Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     *  @param	string		$htmlid			Html id to use instead of htmlname
     *  @param	bool		$multiple		add [] in the name of element and add 'multiple' attribut
     *	@return	 int						<0 if KO, Nb of contact in list if OK
     */
    public function selectcontacts($socid, $selected = '', $htmlname = 'contactid', $showempty = 0, $exclude = '', $limitto = '', $showfunction = 0, $moreclass = '', $options_only = \false, $showsoc = 0, $forcecombo = 0, $events = array(), $moreparam = '', $htmlid = '', $multiple = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return the HTML select list of users
     *
     *  @param	string			$selected       Id user preselected
     *  @param  string			$htmlname       Field name in form
     *  @param  int				$show_empty     0=liste sans valeur nulle, 1=ajoute valeur inconnue
     *  @param  array			$exclude        Array list of users id to exclude
     * 	@param	int				$disabled		If select list must be disabled
     *  @param  array|string	$include        Array list of users id to include. User '' for all users or 'hierarchy' to have only supervised users or 'hierarchyme' to have supervised + me
     * 	@param	int				$enableonly		Array list of users id to be enabled. All other must be disabled
     *  @param	string			$force_entity	'0' or Ids of environment to force
     * 	@return	void
     *  @deprecated		Use select_dolusers instead
     *  @see select_dolusers()
     */
    public function select_users($selected = '', $htmlname = 'userid', $show_empty = 0, $exclude = \null, $disabled = 0, $include = '', $enableonly = '', $force_entity = '0')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return select list of users
     *
     *  @param	string			$selected       User id or user object of user preselected. If 0 or < -2, we use id of current user. If -1, keep unselected (if empty is allowed)
     *  @param  string			$htmlname       Field name in form
     *  @param  int				$show_empty     0=list with no empty value, 1=add also an empty value into list
     *  @param  array			$exclude        Array list of users id to exclude
     * 	@param	int				$disabled		If select list must be disabled
     *  @param  array|string	$include        Array list of users id to include. User '' for all users or 'hierarchy' to have only supervised users or 'hierarchyme' to have supervised + me
     * 	@param	array			$enableonly		Array list of users id to be enabled. If defined, it means that others will be disabled
     *  @param	string			$force_entity	'0' or Ids of environment to force
     *  @param	int				$maxlength		Maximum length of string into list (0=no limit)
     *  @param	int				$showstatus		0=show user status only if status is disabled, 1=always show user status into label, -1=never show user status
     *  @param	string			$morefilter		Add more filters into sql request (Example: 'employee = 1')
     *  @param	integer			$show_every		0=default list, 1=add also a value "Everybody" at beginning of list
     *  @param	string			$enableonlytext	If option $enableonlytext is set, we use this text to explain into label why record is disabled. Not used if enableonly is empty.
     *  @param	string			$morecss		More css
     *  @param  int     		$noactive       Show only active users (this will also happened whatever is this option if USER_HIDE_INACTIVE_IN_COMBOBOX is on).
     *  @param  int				$outputmode     0=HTML select string, 1=Array
     *  @param  bool			$multiple       add [] in the name of element and add 'multiple' attribut
     * 	@return	string							HTML select string
     *  @see select_dolgroups()
     */
    public function select_dolusers($selected = '', $htmlname = 'userid', $show_empty = 0, $exclude = \null, $disabled = 0, $include = '', $enableonly = '', $force_entity = '0', $maxlength = 0, $showstatus = 0, $morefilter = '', $show_every = 0, $enableonlytext = '', $morecss = '', $noactive = 0, $outputmode = 0, $multiple = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return select list of users. Selected users are stored into session.
     *  List of users are provided into $_SESSION['assignedtouser'].
     *
     *  @param  string	$action         Value for $action
     *  @param  string	$htmlname       Field name in form
     *  @param  int		$show_empty     0=list without the empty value, 1=add empty value
     *  @param  array	$exclude        Array list of users id to exclude
     * 	@param	int		$disabled		If select list must be disabled
     *  @param  array	$include        Array list of users id to include or 'hierarchy' to have only supervised users
     * 	@param	array	$enableonly		Array list of users id to be enabled. All other must be disabled
     *  @param	int		$force_entity	'0' or Ids of environment to force
     *  @param	int		$maxlength		Maximum length of string into list (0=no limit)
     *  @param	int		$showstatus		0=show user status only if status is disabled, 1=always show user status into label, -1=never show user status
     *  @param	string	$morefilter		Add more filters into sql request
     *  @param	int		$showproperties		Show properties of each attendees
     *  @param	array	$listofuserid		Array with properties of each user
     *  @param	array	$listofcontactid	Array with properties of each contact
     *  @param	array	$listofotherid		Array with properties of each other contact
     * 	@return	string					HTML select string
     *  @see select_dolgroups()
     */
    public function select_dolusers_forevent($action = '', $htmlname = 'userid', $show_empty = 0, $exclude = \null, $disabled = 0, $include = '', $enableonly = '', $force_entity = '0', $maxlength = 0, $showstatus = 0, $morefilter = '', $showproperties = 0, $listofuserid = array(), $listofcontactid = array(), $listofotherid = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of products for customer in Ajax if Ajax activated or go to select_produits_list
     *
     *  @param		int			$selected				Preselected products
     *  @param		string		$htmlname				Name of HTML select field (must be unique in page)
     *  @param		int			$filtertype				Filter on product type (''=nofilter, 0=product, 1=service)
     *  @param		int			$limit					Limit on number of returned lines
     *  @param		int			$price_level			Level of price to show
     *  @param		int			$status					Sell status -1=Return all products, 0=Products not on sell, 1=Products on sell
     *  @param		int			$finished				2=all, 1=finished, 0=raw material
     *  @param		string		$selected_input_value	Value of preselected input text (for use with ajax)
     *  @param		int			$hidelabel				Hide label (0=no, 1=yes, 2=show search icon (before) and placeholder, 3 search icon after)
     *  @param		array		$ajaxoptions			Options for ajax_autocompleter
     *  @param      int			$socid					Thirdparty Id (to get also price dedicated to this customer)
     *  @param		string		$showempty				'' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * 	@param		int			$forcecombo				Force to use combo box
     *  @param      string      $morecss                Add more css on select
     *  @param      int         $hidepriceinlabel       1=Hide prices in label
     *  @param      string      $warehouseStatus        Warehouse status filter to count the quantity in stock. Following comma separated filter options can be used
     *										            'warehouseopen' = count products from open warehouses,
     *										            'warehouseclosed' = count products from closed warehouses,
     *										            'warehouseinternal' = count products from warehouses for internal correct/transfer only
     *  @param 		array 		$selected_combinations 	Selected combinations. Format: array([attrid] => attrval, [...])
     *  @return		void
     */
    public function select_produits($selected = '', $htmlname = 'productid', $filtertype = '', $limit = 20, $price_level = 0, $status = 1, $finished = 2, $selected_input_value = '', $hidelabel = 0, $ajaxoptions = array(), $socid = 0, $showempty = '1', $forcecombo = 0, $morecss = '', $hidepriceinlabel = 0, $warehouseStatus = '', $selected_combinations = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of products for a customer
     *
     *	@param      int		$selected           Preselected product
     *	@param      string	$htmlname           Name of select html
     *  @param		string	$filtertype         Filter on product type (''=nofilter, 0=product, 1=service)
     *	@param      int		$limit              Limit on number of returned lines
     *	@param      int		$price_level        Level of price to show
     * 	@param      string	$filterkey          Filter on product
     *	@param		int		$status             -1=Return all products, 0=Products not on sell, 1=Products on sell
     *  @param      int		$finished           Filter on finished field: 2=No filter
     *  @param      int		$outputmode         0=HTML select string, 1=Array
     *  @param      int		$socid     		    Thirdparty Id (to get also price dedicated to this customer)
     *  @param		string	$showempty		    '' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * 	@param		int		$forcecombo		    Force to use combo box
     *  @param      string  $morecss            Add more css on select
     *  @param      int     $hidepriceinlabel   1=Hide prices in label
     *  @param      string  $warehouseStatus    Warehouse status filter to group/count stock. Following comma separated filter options can be used.
     *										    'warehouseopen' = count products from open warehouses,
     *										    'warehouseclosed' = count products from closed warehouses,
     *										    'warehouseinternal' = count products from warehouses for internal correct/transfer only
     *  @return     array    				    Array of keys for json
     */
    public function select_produits_list($selected = '', $htmlname = 'productid', $filtertype = '', $limit = 20, $price_level = 0, $filterkey = '', $status = 1, $finished = 2, $outputmode = 0, $socid = 0, $showempty = '1', $forcecombo = 0, $morecss = '', $hidepriceinlabel = 0, $warehouseStatus = '')
    {
    }
    /**
     * constructProductListOption.
     * This define value for &$opt and &$optJson.
     *
     * @param 	resource	$objp			    Resultset of fetch
     * @param 	string		$opt			    Option (var used for returned value in string option format)
     * @param 	string		$optJson		    Option (var used for returned value in json format)
     * @param 	int			$price_level	    Price level
     * @param 	string		$selected		    Preselected value
     * @param   int         $hidepriceinlabel   Hide price in label
     * @param   string      $filterkey          Filter key to highlight
     * @param	int			$novirtualstock 	Do not load virtual stock, even if slow option STOCK_SHOW_VIRTUAL_STOCK_IN_PRODUCTS_COMBO is on.
     * @return	void
     */
    protected function constructProductListOption(&$objp, &$opt, &$optJson, $price_level, $selected, $hidepriceinlabel = 0, $filterkey = '', $novirtualstock = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of products for customer (in Ajax if Ajax activated or go to select_produits_fournisseurs_list)
     *
     *	@param	int		$socid			Id third party
     *	@param  string	$selected       Preselected product
     *	@param  string	$htmlname       Name of HTML Select
     *  @param	string	$filtertype     Filter on product type (''=nofilter, 0=product, 1=service)
     *	@param  string	$filtre			For a SQL filter
     *	@param	array	$ajaxoptions	Options for ajax_autocompleter
     *  @param	int		$hidelabel		Hide label (0=no, 1=yes)
     *  @param  int     $alsoproductwithnosupplierprice    1=Add also product without supplier prices
     *  @param	string	$morecss		More CSS
     *	@return	void
     */
    public function select_produits_fournisseurs($socid, $selected = '', $htmlname = 'productid', $filtertype = '', $filtre = '', $ajaxoptions = array(), $hidelabel = 0, $alsoproductwithnosupplierprice = 0, $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of suppliers products
     *
     *	@param	int		$socid   		Id societe fournisseur (0 pour aucun filtre)
     *	@param  int		$selected       Product price pre-selected (must be 'id' in product_fournisseur_price or 'idprod_IDPROD')
     *	@param  string	$htmlname       Nom de la zone select
     *  @param	string	$filtertype     Filter on product type (''=nofilter, 0=product, 1=service)
     *	@param  string	$filtre         Pour filtre sql
     *	@param  string	$filterkey      Filtre des produits
     *  @param  int		$statut         -1=Return all products, 0=Products not on sell, 1=Products on sell (not used here, a filter on tobuy is already hard coded in request)
     *  @param  int		$outputmode     0=HTML select string, 1=Array
     *  @param  int     $limit          Limit of line number
     *  @param  int     $alsoproductwithnosupplierprice    1=Add also product without supplier prices
     *  @param	string	$morecss		Add more CSS
     *  @return array           		Array of keys for json
     */
    public function select_produits_fournisseurs_list($socid, $selected = '', $htmlname = 'productid', $filtertype = '', $filtre = '', $filterkey = '', $statut = -1, $outputmode = 0, $limit = 100, $alsoproductwithnosupplierprice = 0, $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of suppliers prices for a product
     *
     *  @param	    int		$productid       	Id of product
     *  @param      string	$htmlname        	Name of HTML field
     *  @param      int		$selected_supplier  Pre-selected supplier if more than 1 result
     *  @return	    string
     */
    public function select_product_fourn_price($productid, $htmlname = 'productfournpriceid', $selected_supplier = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of delivery address
     *
     *    @param    string	$selected          	Id contact pre-selectionn
     *    @param    int		$socid				Id of company
     *    @param    string	$htmlname          	Name of HTML field
     *    @param    int		$showempty         	Add an empty field
     *    @return	integer|null
     */
    public function select_address($selected, $socid, $htmlname = 'address_id', $showempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load into cache list of payment terms
     *
     *      @return     int             Nb of lines loaded, <0 if KO
     */
    public function load_cache_conditions_paiements()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge dans cache la liste des délais de livraison possibles
     *
     *      @return     int             Nb of lines loaded, <0 if KO
     */
    public function load_cache_availability()
    {
    }
    /**
     *      Retourne la liste des types de delais de livraison possibles
     *
     *      @param	int		$selected        Id du type de delais pre-selectionne
     *      @param  string	$htmlname        Nom de la zone select
     *      @param  string	$filtertype      To add a filter
     *		@param	int		$addempty		Add empty entry
     *		@return	void
     */
    public function selectAvailabilityDelay($selected = '', $htmlname = 'availid', $filtertype = '', $addempty = 0)
    {
    }
    /**
     *      Load into cache cache_demand_reason, array of input reasons
     *
     *      @return     int             Nb of lines loaded, <0 if KO
     */
    public function loadCacheInputReason()
    {
    }
    /**
     *	Return list of input reason (events that triggered an object creation, like after sending an emailing, making an advert, ...)
     *  List found into table c_input_reason loaded by loadCacheInputReason
     *
     *  @param	int		$selected        Id or code of type origin to select by default
     *  @param  string	$htmlname        Nom de la zone select
     *  @param  string	$exclude         To exclude a code value (Example: SRC_PROP)
     *	@param	int		$addempty		 Add an empty entry
     *	@return	void
     */
    public function selectInputReason($selected = '', $htmlname = 'demandreasonid', $exclude = '', $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge dans cache la liste des types de paiements possibles
     *
     *      @return     int                 Nb of lines loaded, <0 if KO
     */
    public function load_cache_types_paiements()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Return list of payment modes.
     *      Constant MAIN_DEFAULT_PAYMENT_TERM_ID can used to set default value but scope is all application, probably not what you want.
     *      See instead to force the default value by the caller.
     *
     *      @param	int		$selected		Id of payment term to preselect by default
     *      @param	string	$htmlname		Nom de la zone select
     *      @param	int		$filtertype		Not used
     *		@param	int		$addempty		Add an empty entry
     * 		@param	int		$noinfoadmin		0=Add admin info, 1=Disable admin info
     * 		@param	string	$morecss			Add more CSS on select tag
     *		@return	void
     */
    public function select_conditions_paiements($selected = 0, $htmlname = 'condid', $filtertype = -1, $addempty = 0, $noinfoadmin = 0, $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Return list of payment methods
     *      Constant MAIN_DEFAULT_PAYMENT_TYPE_ID can used to set default value but scope is all application, probably not what you want.
     *
     *      @param	string	$selected       Id or code or preselected payment mode
     *      @param  string	$htmlname       Name of select field
     *      @param  string	$filtertype     To filter on field type in llx_c_paiement ('CRDT' or 'DBIT' or array('code'=>xx,'label'=>zz))
     *      @param  int		$format         0=id+label, 1=code+code, 2=code+label, 3=id+code
     *      @param  int		$empty			1=can be empty, 0 otherwise
     * 		@param	int		$noadmininfo	0=Add admin info, 1=Disable admin info
     *      @param  int		$maxlength      Max length of label
     *      @param  int     $active         Active or not, -1 = all
     *      @param  string  $morecss        Add more CSS on select tag
     * 		@return	void
     */
    public function select_types_paiements($selected = '', $htmlname = 'paiementtype', $filtertype = '', $format = 0, $empty = 1, $noadmininfo = 0, $maxlength = 0, $active = 1, $morecss = '')
    {
    }
    /**
     *  Selection HT or TTC
     *
     *  @param	string	$selected       Id pre-selectionne
     *  @param  string	$htmlname       Nom de la zone select
     * 	@return	string					Code of HTML select to chose tax or not
     */
    public function selectPriceBaseType($selected = '', $htmlname = 'price_base_type')
    {
    }
    /**
     *  Return a HTML select list of shipping mode
     *
     *  @param	string	$selected          Id shipping mode pre-selected
     *  @param  string	$htmlname          Name of select zone
     *  @param  string	$filtre            To filter list
     *  @param  int		$useempty          1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *  @param  string	$moreattrib        To add more attribute on select
     * 	@return	void
     */
    public function selectShippingMethod($selected = '', $htmlname = 'shipping_method_id', $filtre = '', $useempty = 0, $moreattrib = '')
    {
    }
    /**
     *    Display form to select shipping mode
     *
     *    @param	string	$page        Page
     *    @param    int		$selected    Id of shipping mode
     *    @param    string	$htmlname    Name of select html field
     *    @param    int		$addempty    1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *    @return	void
     */
    public function formSelectShippingMethod($page, $selected = '', $htmlname = 'shipping_method_id', $addempty = 0)
    {
    }
    /**
     * Creates HTML last in cycle situation invoices selector
     *
     * @param     string  $selected   		Preselected ID
     * @param     int     $socid      		Company ID
     *
     * @return    string                     HTML select
     */
    public function selectSituationInvoices($selected = '', $socid = 0)
    {
    }
    /**
     *      Creates HTML units selector (code => label)
     *
     *      @param	string	$selected       Preselected Unit ID
     *      @param  string	$htmlname       Select name
     *      @param	int		$showempty		Add a nempty line
     * 		@return	string                  HTML select
     */
    public function selectUnits($selected = '', $htmlname = 'units', $showempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return a HTML select list of bank accounts
     *
     *  @param	string	$selected           Id account pre-selected
     *  @param  string	$htmlname           Name of select zone
     *  @param  int		$status             Status of searched accounts (0=open, 1=closed, 2=both)
     *  @param  string	$filtre             To filter list
     *  @param  int		$useempty           1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *  @param  string	$moreattrib         To add more attribute on select
     *  @param	int		$showcurrency		Show currency in label
     *  @param	string	$morecss			More CSS
     * 	@return	int							<0 if error, Num of bank account found if OK (0, 1, 2, ...)
     */
    public function select_comptes($selected = '', $htmlname = 'accountid', $status = 0, $filtre = '', $useempty = 0, $moreattrib = '', $showcurrency = 0, $morecss = '')
    {
    }
    /**
     *  Return a HTML select list of establishment
     *
     *  @param	string	$selected           Id establishment pre-selected
     *  @param  string	$htmlname           Name of select zone
     *  @param  int		$status             Status of searched establishment (0=open, 1=closed, 2=both)
     *  @param  string	$filtre             To filter list
     *  @param  int		$useempty           1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *  @param  string	$moreattrib         To add more attribute on select
     * 	@return	int							<0 if error, Num of establishment found if OK (0, 1, 2, ...)
     */
    public function selectEstablishments($selected = '', $htmlname = 'entity', $status = 0, $filtre = '', $useempty = 0, $moreattrib = '')
    {
    }
    /**
     *    Display form to select bank account
     *
     *    @param	string	$page        Page
     *    @param    int		$selected    Id of bank account
     *    @param    string	$htmlname    Name of select html field
     *    @param    int		$addempty    1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *    @return	void
     */
    public function formSelectAccount($page, $selected = '', $htmlname = 'fk_account', $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of categories having choosed type
     *
     *    @param	string|int	            $type				Type of category ('customer', 'supplier', 'contact', 'product', 'member'). Old mode (0, 1, 2, ...) is deprecated.
     *    @param    string		            $selected    		Id of category preselected or 'auto' (autoselect category if there is only one element)
     *    @param    string		            $htmlname			HTML field name
     *    @param    int			            $maxlength      	Maximum length for labels
     *    @param    int|string|array    	$markafterid        Keep only or removed all categories including the leaf $markafterid in category tree (exclude) or Keep only of category is inside the leaf starting with this id.
     *                                                          $markafterid can be an :
     *                                                          - int (id of category)
     *                                                          - string (categories ids seprated by comma)
     *                                                          - array (list of categories ids)
     *    @param	int			            $outputmode			0=HTML select string, 1=Array
     *    @param	int			            $include			[=0] Removed or 1=Keep only
     *    @param	string					$morecss			More CSS
     *    @return	string
     *    @see select_categories()
     */
    public function select_all_categories($type, $selected = '', $htmlname = "parent", $maxlength = 64, $markafterid = 0, $outputmode = 0, $include = 0, $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *     Show a confirmation HTML form or AJAX popup
     *
     *     @param	string		$page        	   	Url of page to call if confirmation is OK
     *     @param	string		$title       	   	Title
     *     @param	string		$question    	   	Question
     *     @param 	string		$action      	   	Action
     *	   @param	array		$formquestion	   	An array with forms complementary inputs
     * 	   @param	string		$selectedchoice		"" or "no" or "yes"
     * 	   @param	int			$useajax		   	0=No, 1=Yes, 2=Yes but submit page with &confirm=no if choice is No, 'xxx'=preoutput confirm box with div id=dialog-confirm-xxx
     *     @param	int			$height          	Force height of box
     *     @param	int			$width				Force width of box
     *     @return 	void
     *     @deprecated
     *     @see formconfirm()
     */
    public function form_confirm($page, $title, $question, $action, $formquestion = '', $selectedchoice = "", $useajax = 0, $height = 170, $width = 500)
    {
    }
    /**
     *     Show a confirmation HTML form or AJAX popup.
     *     Easiest way to use this is with useajax=1.
     *     If you use useajax='xxx', you must also add jquery code to trigger opening of box (with correct parameters)
     *     just after calling this method. For example:
     *       print '<script type="text/javascript">'."\n";
     *       print 'jQuery(document).ready(function() {'."\n";
     *       print 'jQuery(".xxxlink").click(function(e) { jQuery("#aparamid").val(jQuery(this).attr("rel")); jQuery("#dialog-confirm-xxx").dialog("open"); return false; });'."\n";
     *       print '});'."\n";
     *       print '</script>'."\n";
     *
     *     @param  	string			$page        	   	Url of page to call if confirmation is OK. Can contains parameters (param 'action' and 'confirm' will be reformated)
     *     @param	string			$title       	   	Title
     *     @param	string			$question    	   	Question
     *     @param 	string			$action      	   	Action
     *	   @param  	array|string	$formquestion	   	An array with complementary inputs to add into forms: array(array('label'=> ,'type'=> , ))
     *													type can be 'hidden', 'text', 'password', 'checkbox', 'radio', 'date', 'morecss', ...
     * 	   @param  	string			$selectedchoice  	'' or 'no', or 'yes' or '1' or '0'
     * 	   @param  	int|string		$useajax		   	0=No, 1=Yes, 2=Yes but submit page with &confirm=no if choice is No, 'xxx'=Yes and preoutput confirm box with div id=dialog-confirm-xxx
     *     @param  	int				$height          	Force height of box (0 = auto)
     *     @param	int				$width				Force width of box ('999' or '90%'). Ignored and forced to 90% on smartphones.
     *     @param	int				$disableformtag		1=Disable form tag. Can be used if we are already inside a <form> section.
     *     @return 	string      		    			HTML ajax code if a confirm ajax popup is required, Pure HTML code if it's an html form
     */
    public function formconfirm($page, $title, $question, $action, $formquestion = '', $selectedchoice = '', $useajax = 0, $height = 0, $width = 500, $disableformtag = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show a form to select a project
     *
     *    @param	int		$page        		Page
     *    @param	int		$socid       		Id third party (-1=all, 0=only projects not linked to a third party, id=projects not linked or linked to third party id)
     *    @param    int		$selected    		Id pre-selected project
     *    @param    string	$htmlname    		Name of select field
     *    @param	int		$discard_closed		Discard closed projects (0=Keep,1=hide completely except $selected,2=Disable)
     *    @param	int		$maxlength			Max length
     *    @param	int		$forcefocus			Force focus on field (works with javascript only)
     *    @param    int     $nooutput           No print is done. String is returned.
     *    @return	string                      Return html content
     */
    public function form_project($page, $socid, $selected = '', $htmlname = 'projectid', $discard_closed = 0, $maxlength = 20, $forcefocus = 0, $nooutput = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Show a form to select payment conditions
     *
     *  @param	int		$page        	Page
     *  @param  string	$selected    	Id condition pre-selectionne
     *  @param  string	$htmlname    	Name of select html field
     *	@param	int		$addempty		Add empty entry
     *  @return	void
     */
    public function form_conditions_reglement($page, $selected = '', $htmlname = 'cond_reglement_id', $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show a form to select a delivery delay
     *
     *  @param  int		$page        	Page
     *  @param  string	$selected    	Id condition pre-selectionne
     *  @param  string	$htmlname    	Name of select html field
     *	@param	int		$addempty		Ajoute entree vide
     *  @return	void
     */
    public function form_availability($page, $selected = '', $htmlname = 'availability', $addempty = 0)
    {
    }
    /**
     *  Output HTML form to select list of input reason (events that triggered an object creation, like after sending an emailing, making an advert, ...)
     *  List found into table c_input_reason loaded by loadCacheInputReason
     *
     *  @param  string	$page        	Page
     *  @param  string	$selected    	Id condition pre-selectionne
     *  @param  string	$htmlname    	Name of select html field
     *  @param	int		$addempty		Add empty entry
     *  @return	void
     */
    public function formInputReason($page, $selected = '', $htmlname = 'demandreason', $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show a form + html select a date
     *
     *    @param	string		$page        	Page
     *    @param	string		$selected    	Date preselected
     *    @param    string		$htmlname    	Html name of date input fields or 'none'
     *    @param    int			$displayhour 	Display hour selector
     *    @param    int			$displaymin		Display minutes selector
     *    @param	int			$nooutput		1=No print output, return string
     *    @return	string
     *    @see		selectDate()
     */
    public function form_date($page, $selected, $htmlname, $displayhour = 0, $displaymin = 0, $nooutput = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show a select form to choose a user
     *
     *  @param	string	$page        	Page
     *  @param  string	$selected    	Id of user preselected
     *  @param  string	$htmlname    	Name of input html field. If 'none', we just output the user link.
     *  @param  array	$exclude		List of users id to exclude
     *  @param  array	$include        List of users id to include
     *  @return	void
     */
    public function form_users($page, $selected = '', $htmlname = 'userid', $exclude = '', $include = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show form with payment mode
     *
     *    @param	string	$page        	Page
     *    @param    int		$selected    	Id mode pre-selectionne
     *    @param    string	$htmlname    	Name of select html field
     *    @param  	string	$filtertype		To filter on field type in llx_c_paiement (array('code'=>xx,'label'=>zz))
     *    @param    int     $active         Active or not, -1 = all
     *    @param   int     $addempty       1=Add empty entry
     *    @return	void
     */
    public function form_modes_reglement($page, $selected = '', $htmlname = 'mode_reglement_id', $filtertype = '', $active = 1, $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show form with multicurrency code
     *
     *    @param	string	$page        	Page
     *    @param    string	$selected    	code pre-selectionne
     *    @param    string	$htmlname    	Name of select html field
     *    @return	void
     */
    public function form_multicurrency_code($page, $selected = '', $htmlname = 'multicurrency_code')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show form with multicurrency rate
     *
     *    @param	string	$page        	Page
     *    @param    double	$rate	    	Current rate
     *    @param    string	$htmlname    	Name of select html field
     *    @param    string  $currency       Currency code to explain the rate
     *    @return	void
     */
    public function form_multicurrency_rate($page, $rate = '', $htmlname = 'multicurrency_tx', $currency = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Show a select box with available absolute discounts
     *
     *  @param  string	$page        	Page URL where form is shown
     *  @param  int		$selected    	Value pre-selected
     *	@param  string	$htmlname    	Name of SELECT component. If 'none', not changeable. Example 'remise_id'.
     *	@param	int		$socid			Third party id
     * 	@param	float	$amount			Total amount available
     * 	@param	string	$filter			SQL filter on discounts
     * 	@param	int		$maxvalue		Max value for lines that can be selected
     *  @param  string	$more           More string to add
     *  @param  int     $hidelist       1=Hide list
     *  @param	int		$discount_type	0 => customer discount, 1 => supplier discount
     *  @return	void
     */
    public function form_remise_dispo($page, $selected, $htmlname, $socid, $amount, $filter = '', $maxvalue = 0, $more = '', $hidelist = 0, $discount_type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show forms to select a contact
     *
     *  @param	string		$page        	Page
     *  @param	Societe		$societe		Filter on third party
     *  @param    int			$selected    	Id contact pre-selectionne
     *  @param    string		$htmlname    	Name of HTML select. If 'none', we just show contact link.
     *  @return	void
     */
    public function form_contacts($page, $societe, $selected = '', $htmlname = 'contactid')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html select to select thirdparty
     *
     *  @param	string	$page       	Page
     *  @param  string	$selected   	Id preselected
     *  @param  string	$htmlname		Name of HTML select
     *  @param  string	$filter         optional filters criteras
     *	@param	int		$showempty		Add an empty field
     * 	@param	int		$showtype		Show third party type in combolist (customer, prospect or supplier)
     * 	@param	int		$forcecombo		Force to use combo box
     *  @param	array	$events			Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     *  @param  int     $nooutput       No print output. Return it only.
     *  @return	void|string
     */
    public function form_thirdparty($page, $selected = '', $htmlname = 'socid', $filter = '', $showempty = 0, $showtype = 0, $forcecombo = 0, $events = array(), $nooutput = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Retourne la liste des devises, dans la langue de l'utilisateur
     *
     *    @param	string	$selected    preselected currency code
     *    @param    string	$htmlname    name of HTML select list
     *    @deprecated
     *    @return	void
     */
    public function select_currency($selected = '', $htmlname = 'currency_id')
    {
    }
    /**
     *  Retourne la liste des devises, dans la langue de l'utilisateur
     *
     *  @param	string	$selected    preselected currency code
     *  @param  string	$htmlname    name of HTML select list
     *  @param  string  $mode        0 = Add currency symbol into label, 1 = Add 3 letter iso code
     * 	@return	string
     */
    public function selectCurrency($selected = '', $htmlname = 'currency_id', $mode = 0)
    {
    }
    /**
     *	Return array of currencies in user language
     *
     *  @param	string	$selected    preselected currency code
     *  @param  string	$htmlname    name of HTML select list
     *  @param  integer	$useempty    1=Add empty line
     * 	@return	string
     */
    public function selectMultiCurrency($selected = '', $htmlname = 'multicurrency_code', $useempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load into the cache vat rates of a country
     *
     *  @param	string	$country_code		Country code with quotes ("'CA'", or "'CA,IN,...'")
     *  @return	int							Nb of loaded lines, 0 if already loaded, <0 if KO
     */
    public function load_cache_vatrates($country_code)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output an HTML select vat rate.
     *  The name of this function should be selectVat. We keep bad name for compatibility purpose.
     *
     *  @param	string	      $htmlname           Name of HTML select field
     *  @param  float|string  $selectedrate       Force preselected vat rate. Can be '8.5' or '8.5 (NOO)' for example. Use '' for no forcing.
     *  @param  Societe	      $societe_vendeuse   Thirdparty seller
     *  @param  Societe	      $societe_acheteuse  Thirdparty buyer
     *  @param  int		      $idprod             Id product. O if unknown of NA.
     *  @param  int		      $info_bits          Miscellaneous information on line (1 for NPR)
     *  @param  int|string    $type               ''=Unknown, 0=Product, 1=Service (Used if idprod not defined)
     *                  		                  Si vendeur non assujeti a TVA, TVA par defaut=0. Fin de regle.
     *                  					      Si le (pays vendeur = pays acheteur) alors la TVA par defaut=TVA du produit vendu. Fin de regle.
     *                  					      Si (vendeur et acheteur dans Communaute europeenne) et bien vendu = moyen de transports neuf (auto, bateau, avion), TVA par defaut=0 (La TVA doit etre paye par l'acheteur au centre d'impots de son pays et non au vendeur). Fin de regle.
     *                                            Si vendeur et acheteur dans Communauté européenne et acheteur= particulier alors TVA par défaut=TVA du produit vendu. Fin de règle.
     *                                            Si vendeur et acheteur dans Communauté européenne et acheteur= entreprise alors TVA par défaut=0. Fin de règle.
     *                  					      Sinon la TVA proposee par defaut=0. Fin de regle.
     *  @param	bool	     $options_only		  Return HTML options lines only (for ajax treatment)
     *  @param  int          $mode                0=Use vat rate as key in combo list, 1=Add VAT code after vat rate into key, -1=Use id of vat line as key
     *  @return	string
     */
    public function load_tva($htmlname = 'tauxtva', $selectedrate = '', $societe_vendeuse = '', $societe_acheteuse = '', $idprod = 0, $info_bits = 0, $type = '', $options_only = \false, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show a HTML widget to input a date or combo list for day, month, years and optionaly hours and minutes.
     *  Fields are preselected with :
     *            	- set_time date (must be a local PHP server timestamp or string date with format 'YYYY-MM-DD' or 'YYYY-MM-DD HH:MM')
     *            	- local date in user area, if set_time is '' (so if set_time is '', output may differs when done from two different location)
     *            	- Empty (fields empty), if set_time is -1 (in this case, parameter empty must also have value 1)
     *
     *	@param	integer	    $set_time 		Pre-selected date (must be a local PHP server timestamp), -1 to keep date not preselected, '' to use current date with 00:00 hour (Parameter 'empty' must be 0 or 2).
     *	@param	string		$prefix			Prefix for fields name
     *	@param	int			$h				1 or 2=Show also hours (2=hours on a new line), -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 show hour always empty
     *	@param	int			$m				1=Show also minutes, -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 show minutes always empty
     *	@param	int			$empty			0=Fields required, 1=Empty inputs are allowed, 2=Empty inputs are allowed for hours only
     *	@param	string		$form_name 		Not used
     *	@param	int			$d				1=Show days, month, years
     * 	@param	int			$addnowlink		Add a link "Now"
     * 	@param	int			$nooutput		Do not output html string but return it
     * 	@param 	int			$disabled		Disable input fields
     *  @param  int			$fullday        When a checkbox with this html name is on, hour and day are set with 00:00 or 23:59
     *  @param	string		$addplusone		Add a link "+1 hour". Value must be name of another select_date field.
     *  @param  datetime    $adddateof      Add a link "Date of invoice" using the following date.
     *  @return	string|void					Nothing or string if nooutput is 1
     *  @deprecated
     *  @see    selectDate(), form_date(), select_month(), select_year(), select_dayofweek()
     */
    public function select_date($set_time = '', $prefix = 're', $h = 0, $m = 0, $empty = 0, $form_name = "", $d = 1, $addnowlink = 0, $nooutput = 0, $disabled = 0, $fullday = '', $addplusone = '', $adddateof = '')
    {
    }
    /**
     *  Show a HTML widget to input a date or combo list for day, month, years and optionaly hours and minutes.
     *  Fields are preselected with :
     *              - set_time date (must be a local PHP server timestamp or string date with format 'YYYY-MM-DD' or 'YYYY-MM-DD HH:MM')
     *              - local date in user area, if set_time is '' (so if set_time is '', output may differs when done from two different location)
     *              - Empty (fields empty), if set_time is -1 (in this case, parameter empty must also have value 1)
     *
     *  @param  integer     $set_time       Pre-selected date (must be a local PHP server timestamp), -1 to keep date not preselected, '' to use current date with 00:00 hour (Parameter 'empty' must be 0 or 2).
     *  @param	string		$prefix			Prefix for fields name
     *  @param	int			$h				1 or 2=Show also hours (2=hours on a new line), -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 show hour always empty
     *	@param	int			$m				1=Show also minutes, -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 show minutes always empty
     *	@param	int			$empty			0=Fields required, 1=Empty inputs are allowed, 2=Empty inputs are allowed for hours only
     *	@param	string		$form_name 		Not used
     *	@param	int			$d				1=Show days, month, years
     * 	@param	int			$addnowlink		Add a link "Now", 1 with server time, 2 with local computer time
     * 	@param 	int			$disabled		Disable input fields
     *  @param  int			$fullday        When a checkbox with id #fullday is cheked, hours are set with 00:00 (if value if 'fulldaystart') or 23:59 (if value is 'fulldayend')
     *  @param	string		$addplusone		Add a link "+1 hour". Value must be name of another selectDate field.
     *  @param  datetime    $adddateof      Add a link "Date of ..." using the following date. See also $labeladddateof for the label used.
     *  @param  string      $openinghours   Specify hour start and hour end for the select ex 8,20
     *  @param  int         $stepminutes    Specify step for minutes between 1 and 30
     *  @param	string		$labeladddateof Label to use for the $adddateof parameter.
     * 	@return string                      Html for selectDate
     *  @see    form_date(), select_month(), select_year(), select_dayofweek()
     */
    public function selectDate($set_time = '', $prefix = 're', $h = 0, $m = 0, $empty = 0, $form_name = "", $d = 1, $addnowlink = 0, $disabled = 0, $fullday = '', $addplusone = '', $adddateof = '', $openinghours = '', $stepminutes = 1, $labeladddateof = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to show a form to select a duration on a page
     *
     *	@param	string		$prefix   		Prefix for input fields
     *	@param  int			$iSecond  		Default preselected duration (number of seconds or '')
     * 	@param	int			$disabled       Disable the combo box
     * 	@param	string		$typehour		If 'select' then input hour and input min is a combo,
     *						            	If 'text' input hour is in text and input min is a text,
     *						            	If 'textselect' input hour is in text and input min is a combo
     *  @param	integer		$minunderhours	If 1, show minutes selection under the hours
     * 	@param	int			$nooutput		Do not output html string but return it
     *  @return	string|void
     */
    public function select_duration($prefix, $iSecond = '', $disabled = 0, $typehour = 'select', $minunderhours = 0, $nooutput = 0)
    {
    }
    /**
     * Generic method to select a component from a combo list.
     * This is the generic method that will replace all specific existing methods.
     *
     * @param 	string			$objectdesc			ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]
     * @param	string			$htmlname			Name of HTML select component
     * @param	int				$preselectedvalue	Preselected value (ID of element)
     * @param	string			$showempty			''=empty values not allowed, 'string'=value show if we allow empty values (for example 'All', ...)
     * @param	string			$searchkey			Search criteria
     * @param	string			$placeholder		Place holder
     * @param	string			$morecss			More CSS
     * @param	string			$moreparams			More params provided to ajax call
     * @param	int				$forcecombo			Force to load all values and output a standard combobox (with no beautification)
     * @param	int				$disabled			1=Html component is disabled
     * @param	string	        $selected_input_value	Value of preselected input text (for use with ajax)
     * @return	string								Return HTML string
     * @see selectForFormsList() select_thirdparty
     */
    public function selectForForms($objectdesc, $htmlname, $preselectedvalue, $showempty = '', $searchkey = '', $placeholder = '', $morecss = '', $moreparams = '', $forcecombo = 0, $disabled = 0, $selected_input_value = '')
    {
    }
    /**
     * Function to forge a SQL criteria
     *
     * @param  array    $matches       Array of found string by regex search. Example: "t.ref:like:'SO-%'" or "t.date_creation:<:'20160101'" or "t.nature:is:NULL"
     * @return string                  Forged criteria. Example: "t.field like 'abc%'"
     */
    protected static function forgeCriteriaCallback($matches)
    {
    }
    /**
     * Output html form to select an object.
     * Note, this function is called by selectForForms or by ajax selectobject.php
     *
     * @param 	Object			$objecttmp			Object to knwo the table to scan for combo.
     * @param	string			$htmlname			Name of HTML select component
     * @param	int				$preselectedvalue	Preselected value (ID of element)
     * @param	string			$showempty			''=empty values not allowed, 'string'=value show if we allow empty values (for example 'All', ...)
     * @param	string			$searchkey			Search value
     * @param	string			$placeholder		Place holder
     * @param	string			$morecss			More CSS
     * @param	string			$moreparams			More params provided to ajax call
     * @param	int				$forcecombo			Force to load all values and output a standard combobox (with no beautification)
     * @param	int				$outputmode			0=HTML select string, 1=Array
     * @param	int				$disabled			1=Html component is disabled
     * @return	string|array						Return HTML string
     * @see selectForForms()
     */
    public function selectForFormsList($objecttmp, $htmlname, $preselectedvalue, $showempty = '', $searchkey = '', $placeholder = '', $morecss = '', $moreparams = '', $forcecombo = 0, $outputmode = 0, $disabled = 0)
    {
    }
    /**
     *	Return a HTML select string, built from an array of key+value.
     *  Note: Do not apply langs->trans function on returned content, content may be entity encoded twice.
     *
     *	@param	string			$htmlname			Name of html select area. Must start with "multi" if this is a multiselect
     *	@param	array			$array				Array like array(key => value) or array(key=>array('label'=>..., 'data-...'=>...))
     *	@param	string|string[]	$id					Preselected key or preselected keys for multiselect
     *	@param	int|string		$show_empty			0 no empty value allowed, 1 or string to add an empty value into list (key is -1 and value is '' or '&nbsp;' if 1, key is -1 and value is text if string), <0 to add an empty value with key that is this value.
     *	@param	int				$key_in_label		1 to show key into label with format "[key] value"
     *	@param	int				$value_as_key		1 to use value as key
     *	@param  string			$moreparam			Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     *	@param  int				$translate			1=Translate and encode value
     * 	@param	int				$maxlen				Length maximum for labels
     * 	@param	int				$disabled			Html select box is disabled
     *  @param	string			$sort				'ASC' or 'DESC' = Sort on label, '' or 'NONE' or 'POS' = Do not sort, we keep original order
     *  @param	string			$morecss			Add more class to css styles
     *  @param	int				$addjscombo			Add js combo
     *  @param  string          $moreparamonempty	Add more param on the empty option line. Not used if show_empty not set
     *  @param  int             $disablebademail	1=Check if a not valid email, 2=Check string '---', and if found into value, disable and colorize entry
     *  @param  int             $nohtmlescape		No html escaping.
     * 	@return	string								HTML select string.
     *  @see multiselectarray(), selectArrayAjax(), selectArrayFilter()
     */
    public static function selectarray($htmlname, $array, $id = '', $show_empty = 0, $key_in_label = 0, $value_as_key = 0, $moreparam = '', $translate = 0, $maxlen = 0, $disabled = 0, $sort = '', $morecss = '', $addjscombo = 0, $moreparamonempty = '', $disablebademail = 0, $nohtmlescape = 0)
    {
    }
    /**
     *	Return a HTML select string, built from an array of key+value, but content returned into select come from an Ajax call of an URL.
     *  Note: Do not apply langs->trans function on returned content of Ajax service, content may be entity encoded twice.
     *
     *	@param	string	$htmlname       		Name of html select area
     *	@param	string	$url					Url. Must return a json_encode of array(key=>array('text'=>'A text', 'url'=>'An url'), ...)
     *	@param	string	$id             		Preselected key
     *	@param  string	$moreparam      		Add more parameters onto the select tag
     *	@param  string	$moreparamtourl 		Add more parameters onto the Ajax called URL
     * 	@param	int		$disabled				Html select box is disabled
     *  @param	int		$minimumInputLength		Minimum Input Length
     *  @param	string	$morecss				Add more class to css styles
     *  @param  int     $callurlonselect        If set to 1, some code is added so an url return by the ajax is called when value is selected.
     *  @param  string  $placeholder            String to use as placeholder
     *  @param  integer $acceptdelayedhtml      1 = caller is requesting to have html js content not returned but saved into global $delayedhtmlcontent (so caller can show it at end of page to avoid flash FOUC effect)
     * 	@return	string   						HTML select string
     *  @see selectArrayFilter(), ajax_combobox() in ajax.lib.php
     */
    public static function selectArrayAjax($htmlname, $url, $id = '', $moreparam = '', $moreparamtourl = '', $disabled = 0, $minimumInputLength = 1, $morecss = '', $callurlonselect = 0, $placeholder = '', $acceptdelayedhtml = 0)
    {
    }
    /**
     *  Return a HTML select string, built from an array of key+value, but content returned into select is defined into $array parameter.
     *  Note: Do not apply langs->trans function on returned content of Ajax service, content may be entity encoded twice.
     *
     *  @param  string	$htmlname               Name of html select area
     *	@param	string	$array					Array (key=>array('text'=>'A text', 'url'=>'An url'), ...)
     *	@param	string	$id             		Preselected key
     *	@param  string	$moreparam      		Add more parameters onto the select tag
     *	@param	int		$disableFiltering		If set to 1, results are not filtered with searched string
     * 	@param	int		$disabled				Html select box is disabled
     *  @param	int		$minimumInputLength		Minimum Input Length
     *  @param	string	$morecss				Add more class to css styles
     *  @param  int     $callurlonselect        If set to 1, some code is added so an url return by the ajax is called when value is selected.
     *  @param  string  $placeholder            String to use as placeholder
     *  @param  integer $acceptdelayedhtml      1 = caller is requesting to have html js content not returned but saved into global $delayedhtmlcontent (so caller can show it at end of page to avoid flash FOUC effect)
     *  @return	string   						HTML select string
     *  @see selectArrayAjax(), ajax_combobox() in ajax.lib.php
     */
    public static function selectArrayFilter($htmlname, $array, $id = '', $moreparam = '', $disableFiltering = 0, $disabled = 0, $minimumInputLength = 1, $morecss = '', $callurlonselect = 0, $placeholder = '', $acceptdelayedhtml = 0)
    {
    }
    /**
     *	Show a multiselect form from an array.
     *
     *	@param	string	$htmlname		Name of select
     *	@param	array	$array			Array with key+value
     *	@param	array	$selected		Array with key+value preselected
     *	@param	int		$key_in_label   1 pour afficher la key dans la valeur "[key] value"
     *	@param	int		$value_as_key   1 to use value as key
     *	@param  string	$morecss        Add more css style
     *	@param  int		$translate		Translate and encode value
     *  @param	int		$width			Force width of select box. May be used only when using jquery couch. Example: 250, 95%
     *  @param	string	$moreattrib		Add more options on select component. Example: 'disabled'
     *  @param	string	$elemtype		Type of element we show ('category', ...). Will execute a formating function on it. To use in readonly mode if js component support HTML formatting.
     *  @param	string	$placeholder	String to use as placeholder
     *  @param	int		$addjscombo		Add js combo
     *	@return	string					HTML multiselect string
     *  @see selectarray(), selectArrayAjax(), selectArrayFilter()
     */
    public static function multiselectarray($htmlname, $array, $selected = array(), $key_in_label = 0, $value_as_key = 0, $morecss = '', $translate = 0, $width = 0, $moreattrib = '', $elemtype = '', $placeholder = '', $addjscombo = -1)
    {
    }
    /**
     *	Show a multiselect dropbox from an array.
     *
     *	@param	string	$htmlname		Name of HTML field
     *	@param	array	$array			Array with array of fields we could show. This array may be modified according to setup of user.
     *  @param  string  $varpage        Id of context for page. Can be set by caller with $varpage=(empty($contextpage)?$_SERVER["PHP_SELF"]:$contextpage);
     *	@return	string					HTML multiselect string
     *  @see selectarray()
     */
    public static function multiSelectArrayWithCheckbox($htmlname, &$array, $varpage)
    {
    }
    /**
     * 	Render list of categories linked to object with id $id and type $type
     *
     * 	@param		int		$id				Id of object
     * 	@param		string	$type			Type of category ('member', 'customer', 'supplier', 'product', 'contact'). Old mode (0, 1, 2, ...) is deprecated.
     *  @param		int		$rendermode		0=Default, use multiselect. 1=Emulate multiselect (recommended)
     * 	@return		string					String with categories
     */
    public function showCategories($id, $type, $rendermode = 0)
    {
    }
    /**
     *  Show linked object block.
     *
     *  @param	CommonObject	$object		      Object we want to show links to
     *  @param  string          $morehtmlright    More html to show on right of title
     *  @param  array           $compatibleImportElementsList  Array of compatibles elements object for "import from" action
     *  @return	int							      <0 if KO, >=0 if OK
     */
    public function showLinkedObjectBlock($object, $morehtmlright = '', $compatibleImportElementsList = \false)
    {
    }
    /**
     *  Show block with links to link to other objects.
     *
     *  @param	CommonObject	$object				Object we want to show links to
     *  @param	array			$restrictlinksto	Restrict links to some elements, for exemple array('order') or array('supplier_order'). null or array() if no restriction.
     *  @param	array			$excludelinksto		Do not show links of this type, for exemple array('order') or array('supplier_order'). null or array() if no exclusion.
     *  @return	string								<0 if KO, >0 if OK
     */
    public function showLinkToObjectBlock($object, $restrictlinksto = array(), $excludelinksto = array())
    {
    }
    /**
     *	Return an html string with a select combo box to choose yes or no
     *
     *	@param	string		$htmlname		Name of html select field
     *	@param	string		$value			Pre-selected value
     *	@param	int			$option			0 return yes/no, 1 return 1/0
     *	@param	bool		$disabled		true or false
     *  @param	int      	$useempty		1=Add empty line
     *	@return	string						See option
     */
    public function selectyesno($htmlname, $value = '', $option = 0, $disabled = \false, $useempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of export templates
     *
     *  @param	string	$selected          Id modele pre-selectionne
     *  @param  string	$htmlname          Name of HTML select
     *  @param  string	$type              Type of searched templates
     *  @param  int		$useempty          Affiche valeur vide dans liste
     *  @return	void
     */
    public function select_export_model($selected = '', $htmlname = 'exportmodelid', $type = '', $useempty = 0)
    {
    }
    /**
     *    Return a HTML area with the reference of object and a navigation bar for a business object
     *    Note: To complete search with a particular filter on select, you can set $object->next_prev_filter set to define SQL criterias.
     *
     *    @param	object	$object			Object to show.
     *    @param	string	$paramid   		Name of parameter to use to name the id into the URL next/previous link.
     *    @param	string	$morehtml  		More html content to output just before the nav bar.
     *    @param	int		$shownav	  	Show Condition (navigation is shown if value is 1).
     *    @param	string	$fieldid   		Name of field id into database to use for select next and previous (we make the select max and min on this field compared to $object->ref). Use 'none' to disable next/prev.
     *    @param	string	$fieldref   	Name of field ref of object (object->ref) to show or 'none' to not show ref.
     *    @param	string	$morehtmlref  	More html to show after ref.
     *    @param	string	$moreparam  	More param to add in nav link url. Must start with '&...'.
     *	  @param	int		$nodbprefix		Do not include DB prefix to forge table name.
     *	  @param	string	$morehtmlleft	More html code to show before ref.
     *	  @param	string	$morehtmlstatus	More html code to show under navigation arrows (status place).
     *	  @param	string	$morehtmlright	More html code to show after ref.
     * 	  @return	string    				Portion HTML with ref + navigation buttons
     */
    public function showrefnav($object, $paramid, $morehtml = '', $shownav = 1, $fieldid = 'rowid', $fieldref = 'ref', $morehtmlref = '', $moreparam = '', $nodbprefix = 0, $morehtmlleft = '', $morehtmlstatus = '', $morehtmlright = '')
    {
    }
    /**
     *    	Return HTML code to output a barcode
     *
     *     	@param	Object	$object		Object containing data to retrieve file name
     * 		@param	int		$width			Width of photo
     * 	  	@return string    				HTML code to output barcode
     */
    public function showbarcode(&$object, $width = 100)
    {
    }
    /**
     *    	Return HTML code to output a photo
     *
     *    	@param	string		$modulepart			Key to define module concerned ('societe', 'userphoto', 'memberphoto')
     *     	@param  object		$object				Object containing data to retrieve file name
     * 		@param	int			$width				Width of photo
     * 		@param	int			$height				Height of photo (auto if 0)
     * 		@param	int			$caneditfield		Add edit fields
     * 		@param	string		$cssclass			CSS name to use on img for photo
     * 		@param	string		$imagesize		    'mini', 'small' or '' (original)
     *      @param  int         $addlinktofullsize  Add link to fullsize image
     *      @param  int         $cache              1=Accept to use image in cache
     *      @param	string		$forcecapture		Force parameter capture on HTML input file element to ask a smartphone to allow to open camera to take photo. Auto if empty.
     * 	  	@return string    						HTML code to output photo
     */
    public static function showphoto($modulepart, $object, $width = 100, $height = 0, $caneditfield = 0, $cssclass = 'photowithmargin', $imagesize = '', $addlinktofullsize = 1, $cache = 0, $forcecapture = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return select list of groups
     *
     *  @param	string	$selected       Id group preselected
     *  @param  string	$htmlname       Field name in form
     *  @param  int		$show_empty     0=liste sans valeur nulle, 1=ajoute valeur inconnue
     *  @param  string	$exclude        Array list of groups id to exclude
     * 	@param	int		$disabled		If select list must be disabled
     *  @param  string	$include        Array list of groups id to include
     * 	@param	int		$enableonly		Array list of groups id to be enabled. All other must be disabled
     * 	@param	string	$force_entity	'0' or Ids of environment to force
     * 	@param	bool	$multiple		add [] in the name of element and add 'multiple' attribut (not working with ajax_autocompleter)
     *  @param  string	$morecss		More css to add to html component
     *  @return	string
     *  @see select_dolusers()
     */
    public function select_dolgroups($selected = '', $htmlname = 'groupid', $show_empty = 0, $exclude = '', $disabled = 0, $include = '', $enableonly = '', $force_entity = '0', $multiple = \false, $morecss = '')
    {
    }
    /**
     *	Return HTML to show the search and clear seach button
     *
     *  @return	string
     */
    public function showFilterButtons()
    {
    }
    /**
     *	Return HTML to show the search and clear seach button
     *
     *  @param  string  $cssclass                  CSS class
     *  @param  int     $calljsfunction            0=default. 1=call function initCheckForSelect() after changing status of checkboxes
     *  @return	string
     */
    public function showCheckAddButtons($cssclass = 'checkforaction', $calljsfunction = 0)
    {
    }
    /**
     *	Return HTML to show the search and clear seach button
     *
     *  @param	int  	$addcheckuncheckall        Add the check all/uncheck all checkbox (use javascript) and code to manage this
     *  @param  string  $cssclass                  CSS class
     *  @param  int     $calljsfunction            0=default. 1=call function initCheckForSelect() after changing status of checkboxes
     *  @return	string
     */
    public function showFilterAndCheckAddButtons($addcheckuncheckall = 0, $cssclass = 'checkforaction', $calljsfunction = 0)
    {
    }
    /**
     * Return HTML to show the select of expense categories
     *
     * @param	string	$selected              preselected category
     * @param	string	$htmlname              name of HTML select list
     * @param	integer	$useempty              1=Add empty line
     * @param	array	$excludeid             id to exclude
     * @param	string	$target                htmlname of target select to bind event
     * @param	int		$default_selected      default category to select if fk_c_type_fees change = EX_KME
     * @param	array	$params                param to give
     * @return	string
     */
    public function selectExpenseCategories($selected = '', $htmlname = 'fk_c_exp_tax_cat', $useempty = 0, $excludeid = array(), $target = '', $default_selected = 0, $params = array())
    {
    }
    /**
     * Return HTML to show the select ranges of expense range
     *
     * @param	string	$selected    preselected category
     * @param	string	$htmlname    name of HTML select list
     * @param	integer	$useempty    1=Add empty line
     * @return	string
     */
    public function selectExpenseRanges($selected = '', $htmlname = 'fk_range', $useempty = 0)
    {
    }
    /**
     * Return HTML to show a select of expense
     *
     * @param	string	$selected    preselected category
     * @param	string	$htmlname    name of HTML select list
     * @param	integer	$useempty    1=Add empty choice
     * @param	integer	$allchoice   1=Add all choice
     * @param	integer	$useid       0=use 'code' as key, 1=use 'id' as key
     * @return	string
     */
    public function selectExpense($selected = '', $htmlname = 'fk_c_type_fees', $useempty = 0, $allchoice = 1, $useid = 0)
    {
    }
    /**
     *  Output a combo list with invoices qualified for a third party
     *
     *  @param	int		$socid      	Id third party (-1=all, 0=only projects not linked to a third party, id=projects not linked or linked to third party id)
     *  @param  int		$selected   	Id invoice preselected
     *  @param  string	$htmlname   	Name of HTML select
     *	@param	int		$maxlength		Maximum length of label
     *	@param	int		$option_only	Return only html options lines without the select tag
     *	@param	string	$show_empty		Add an empty line ('1' or string to show for empty line)
     *  @param	int		$discard_closed Discard closed projects (0=Keep,1=hide completely,2=Disable)
     *  @param	int		$forcefocus		Force focus on field (works with javascript only)
     *  @param	int		$disabled		Disabled
     *  @param	string	$morecss        More css added to the select component
     *  @param	string	$projectsListId ''=Automatic filter on project allowed. List of id=Filter on project ids.
     *  @param	string	$showproject	'all' = Show project info, ''=Hide project info
     *  @param	User	$usertofilter	User object to use for filtering
     *	@return int         			Nbr of project if OK, <0 if KO
     */
    public function selectInvoice($socid = -1, $selected = '', $htmlname = 'invoiceid', $maxlength = 24, $option_only = 0, $show_empty = '1', $discard_closed = 0, $forcefocus = 0, $disabled = 0, $morecss = 'maxwidth500', $projectsListId = '', $showproject = 'all', $usertofilter = \null)
    {
    }
    /**
     * Output the component to make advanced search criteries
     *
     * @param	array		$arrayofcriterias			          Array of available search criterias. Example: array($object->element => $object->fields, 'otherfamily' => otherarrayoffields, ...)
     * @param	array		$search_component_params	          Array of selected search criterias
     * @param   array       $arrayofinputfieldsalreadyoutput      Array of input fields already inform. The component will not generate a hidden input field if it is in this list.
     * @return	string									          HTML component for advanced search
     */
    public function searchComponent($arrayofcriterias, $search_component_params, $arrayofinputfieldsalreadyoutput = array())
    {
    }
}