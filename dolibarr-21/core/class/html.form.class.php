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
 * Copyright (C) 2010-2021  Philippe Grand          <philippe.grand@atoo-net.com>
 * Copyright (C) 2011       Herve Prot              <herve.prot@symeos.com>
 * Copyright (C) 2012-2016  Marcos García           <marcosgdf@gmail.com>
 * Copyright (C) 2012       Cedric Salvador         <csalvador@gpcsolutions.fr>
 * Copyright (C) 2012-2015  Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2014-2023  Alexandre Spangaro      <aspangaro@open-dsi.fr>
 * Copyright (C) 2018-2022  Ferran Marcet           <fmarcet@2byte.es>
 * Copyright (C) 2018-2024  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2018       Nicolas ZABOURI	        <info@inovea-conseil.com>
 * Copyright (C) 2018       Christophe Battarel     <christophe@altairis.fr>
 * Copyright (C) 2018       Josep Lluis Amador      <joseplluis@lliuretic.cat>
 * Copyright (C) 2023		Joachim Kueter			<git-jk@bloxera.com>
 * Copyright (C) 2023		Nick Fragoulis
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024		William Mead			<william.mead@manchenumerique.fr>
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
 * \file       htdocs/core/class/html.form.class.php
 * \ingroup    core
 * \brief      File of class with all html predefined components
 */
/**
 * Class to manage generation of HTML components
 * Only common components must be here.
 *
 * TODO Merge all function load_cache_* and loadCache* (except load_cache_vatrates) into one generic function loadCacheTable
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
    // Some properties used to return data by some methods
    /** @var array<string,int> */
    public $result;
    /** @var int */
    public $num;
    // Cache arrays
    public $cache_types_paiements = array();
    public $cache_conditions_paiements = array();
    public $cache_transport_mode = array();
    public $cache_availability = array();
    public $cache_demand_reason = array();
    public $cache_types_fees = array();
    public $cache_vatrates = array();
    public $cache_invoice_subtype = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Output key field for an editable field
     *
     * @param 	string 	$text 			Text of label or key to translate
     * @param 	string 	$htmlname 		Name of select field ('edit' prefix will be added)
     * @param 	string 	$preselected 	Value to show/edit (not used in this function)
     * @param 	object 	$object 		Object (on the page we show)
     * @param 	boolean $perm 			Permission to allow button to edit parameter. Set it to 0 to have a not edited field.
     * @param 	string 	$typeofdata 	Type of data ('string' by default, 'email', 'amount:99', 'numeric:99', 'text' or 'textarea:rows:cols', 'datepicker' ('day' do not work, don't know why), 'dayhour' or 'datehourpicker' 'checkbox:ckeditor:dolibarr_zzz:width:height:savemethod:1:rows:cols', 'select;xxx[:class]'...)
     * @param 	string 	$moreparam 		More param to add on a href URL.
     * @param 	int 	$fieldrequired 	1 if we want to show field as mandatory using the "fieldrequired" CSS.
     * @param 	int 	$notabletag 	1=Do not output table tags but output a ':', 2=Do not output table tags and no ':', 3=Do not output table tags but output a ' '
     * @param 	string 	$paramid 		Key of parameter for id ('id', 'socid')
     * @param 	string 	$help 			Tooltip help
     * @return  string                  HTML edit field
     */
    public function editfieldkey($text, $htmlname, $preselected, $object, $perm, $typeofdata = 'string', $moreparam = '', $fieldrequired = 0, $notabletag = 0, $paramid = 'id', $help = '')
    {
    }
    /**
     * Output value of a field for an editable field
     *
     * @param string 	$text 			Text of label (not used in this function)
     * @param string 	$htmlname 		Name of select field
     * @param string 	$value 			Value to show/edit
     * @param CommonObject 	$object 		Object (that we want to show)
     * @param boolean 	$perm 			Permission to allow button to edit parameter
     * @param string 	$typeofdata 	Type of data ('string' by default, 'checkbox', 'email', 'phone', 'amount:99', 'numeric:99',
     *                                  'text' or 'textarea:rows:cols%', 'safehtmlstring', 'restricthtml',
     *                                  'datepicker' ('day' do not work, don't know why), 'dayhour' or 'datehourpicker', 'ckeditor:dolibarr_zzz:width:height:savemethod:toolbarstartexpanded:rows:cols', 'select;xkey:xval,ykey:yval,...')
     * @param string 	$editvalue 		When in edit mode, use this value as $value instead of value (for example, you can provide here a formatted price instead of numeric value, or a select combo). Use '' to use same than $value
     * @param ?CommonObject	$extObject 	External object ???
     * @param mixed 	$custommsg 		String or Array of custom messages : eg array('success' => 'MyMessage', 'error' => 'MyMessage')
     * @param string 	$moreparam 		More param to add on the form on action href URL parameter
     * @param int 		$notabletag 	Do no output table tags
     * @param string 	$formatfunc 	Call a specific method of $object->$formatfunc to output field in view mode (For example: 'dol_print_email')
     * @param string 	$paramid 		Key of parameter for id ('id', 'socid')
     * @param string 	$gm 			'auto' or 'tzuser' or 'tzuserrel' or 'tzserver' (when $typeofdata is a date)
     * @param array<string,int> 	$moreoptions 	Array with more options. For example array('addnowlink'=>1), array('valuealreadyhtmlescaped'=>1)
     * @param string 	$editaction 	[=''] use GETPOST default action or set action to edit mode
     * @return string                   HTML edit field
     */
    public function editfieldval($text, $htmlname, $value, $object, $perm, $typeofdata = 'string', $editvalue = '', $extObject = \null, $custommsg = \null, $moreparam = '', $notabletag = 1, $formatfunc = '', $paramid = 'id', $gm = 'auto', $moreoptions = array(), $editaction = '')
    {
    }
    /**
     * Output edit in place form
     *
     * @param 	string 	$fieldname 	Name of the field
     * @param 	CommonObject	$object Object
     * @param 	boolean $perm 		Permission to allow button to edit parameter. Set it to 0 to have a not edited field.
     * @param 	string 	$typeofdata Type of data ('string' by default, 'email', 'amount:99', 'numeric:99', 'text' or 'textarea:rows:cols', 'datepicker' ('day' do not work, don't know why), 'ckeditor:dolibarr_zzz:width:height:savemethod:1:rows:cols', 'select;xxx[:class]'...)
     * @param 	string 	$check 		Same coe than $check parameter of GETPOST()
     * @param 	string 	$morecss 	More CSS
     * @return  string              HTML code for the edit of alternative language
     */
    public function widgetForTranslation($fieldname, $object, $perm, $typeofdata = 'string', $check = '', $morecss = '')
    {
    }
    /**
     * Output edit in place form
     *
     * @param 	CommonObject	$object 	Object
     * @param 	string 	$value 		Value to show/edit
     * @param 	string 	$htmlname 	DIV ID (field name)
     * @param 	int 	$condition 	Condition to edit
     * @param 	string 	$inputType 	Type of input ('string', 'numeric', 'datepicker' ('day' do not work, don't know why), 'textarea:rows:cols', 'ckeditor:dolibarr_zzz:width:height:?:1:rows:cols', 'select:loadmethod:savemethod:buttononly')
     * @param 	string 	$editvalue 	When in edit mode, use this value as $value instead of value
     * @param 	?CommonObject	$extObject 	External object
     * @param 	mixed 	$custommsg 	String or Array of custom messages : eg array('success' => 'MyMessage', 'error' => 'MyMessage')
     * @return  string              HTML edit in place
     */
    protected function editInPlace($object, $value, $htmlname, $condition, $inputType = 'textarea', $editvalue = \null, $extObject = \null, $custommsg = \null)
    {
    }
    /**
     *  Show a text and picto with tooltip on text or picto.
     *  Can be called by an instancied $form->textwithtooltip or by a static call Form::textwithtooltip
     *
     * 	@param 	string 	$text 				Text to show
     * 	@param 	string 	$htmltext 			HTML content of tooltip. Must be HTML/UTF8 encoded.
     * 	@param 	int 	$tooltipon 			1=tooltip on text, 2=tooltip on image, 3=tooltip on both
     * 	@param 	int 	$direction 			-1=image is before, 0=no image, 1=image is after
     * 	@param 	string 	$img 				Html code for image (use img_xxx() function to get it)
     * 	@param 	string 	$extracss 			Add a CSS style to td tags
     * 	@param 	int 	$notabs 			0=Include table and tr tags, 1=Do not include table and tr tags, 2=use div, 3=use span
     * 	@param 	string 	$incbefore 			Include code before the text
     * 	@param 	int 	$noencodehtmltext 	Do not encode into html entity the htmltext
     * 	@param 	string 	$tooltiptrigger 	''=Tooltip on hover, 'abc'=Tooltip on click (abc is a unique key)
     * 	@param 	int 	$forcenowrap 		Force no wrap between text and picto (works with notabs=2 only)
     * 	@return string                      Code html du tooltip (texte+picto)
     * 	@see    textwithpicto() 			Use textwithpicto() instead of textwithtooltip if you can.
     */
    public function textwithtooltip($text, $htmltext, $tooltipon = 1, $direction = 0, $img = '', $extracss = '', $notabs = 3, $incbefore = '', $noencodehtmltext = 0, $tooltiptrigger = '', $forcenowrap = 0)
    {
    }
    /**
     * Show a text with a picto and a tooltip on picto
     *
     * @param 	string 		$text 				Text to show
     * @param 	string 		$htmltooltip 		Content of tooltip
     * @param 	int<-1,1>	$direction 			1=Icon is after text, -1=Icon is before text, 0=no icon
     * @param 	string 		$type 				Type of picto ('info', 'infoclickable', 'help', 'helpclickable', 'warning', 'superadmin', 'mypicto@mymodule', ...) or image filepath or 'none'
     * @param 	string 		$extracss 			Add a CSS style to td, div or span tag
     * @param 	int<0,1>	$noencodehtmltext 	Do not encode into html entity the htmltext
     * @param 	int<0,3>	$notabs 			0=Include table and tr tags, 1=Do not include table and tr tags, 2=use div, 3=use span
     * @param 	string 		$tooltiptrigger 	''=Tooltip on hover and hidden on smartphone, 'abconsmartphone'=Tooltip on hover and on click on smartphone, 'abc'=Tooltip on click (abc is a unique key, clickable link is on image or on link if param $type='none' or on both if $type='xxxclickable')
     * @param 	int<0,1>	$forcenowrap 		Force no wrap between text and picto (works with notabs=2 only)
     * @return	string                        	HTML code of text, picto, tooltip
     */
    public function textwithpicto($text, $htmltooltip, $direction = 1, $type = 'help', $extracss = 'valignmiddle', $noencodehtmltext = 0, $notabs = 3, $tooltiptrigger = '', $forcenowrap = 0)
    {
    }
    /**
     * Generate select HTML to choose massaction
     *
     * @param string 	$selected 		Value auto selected when at least one record is selected. Not a preselected value. Use '0' by default.
     * @param array<string,string> 	$arrayofaction 	array('code'=>'label', ...). The code is the key stored into the GETPOST('massaction') when submitting action.
     * @param int 		$alwaysvisible 	1=select button always visible
     * @param string 	$name 			Name for massaction
     * @param string 	$cssclass 		CSS class used to check for select
     * @return string|void              Select list
     */
    public function selectMassAction($selected, $arrayofaction, $alwaysvisible = 0, $name = 'massaction', $cssclass = 'checkforselect')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return combo list of activated countries, into language of user
     *
     * @param string 		$selected 				Id or Code or Label of preselected country
     * @param string 		$htmlname 				Name of html select object
     * @param string 		$htmloption 			More html options on select object
     * @param integer 		$maxlength 				Max length for labels (0=no limit)
     * @param string 		$morecss 				More css class
     * @param string 		$usecodeaskey 			''=Use id as key (default), 'code3'=Use code on 3 alpha as key, 'code2"=Use code on 2 alpha as key
     * @param int<0,1>|string 	$showempty 				Show empty choice
     * @param int<0,1>		$disablefavorites 		1=Disable favorites,
     * @param int<0,1> 		$addspecialentries 		1=Add dedicated entries for group of countries (like 'European Economic Community', ...)
     * @param string[] 		$exclude_country_code 	Array of country code (iso2) to exclude
     * @param int<0,1>		$hideflags 				Hide flags
     * @param int<0,1>		$forcecombo 			Force to load all values and output a standard combobox (with no beautification)
     * @return string       	                	HTML string with select
     */
    public function select_country($selected = '', $htmlname = 'country_id', $htmloption = '', $maxlength = 0, $morecss = 'minwidth300', $usecodeaskey = '', $showempty = 1, $disablefavorites = 0, $addspecialentries = 0, $exclude_country_code = array(), $hideflags = 0, $forcecombo = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return select list of incoterms
     *
     * @param 	string 	$selected 				Id or Code of preselected incoterm
     * @param 	string 	$location_incoterms 	Value of input location
     * @param 	string 	$page 					Defined the form action
     * @param 	string 	$htmlname 				Name of html select object
     * @param 	string 	$htmloption 			Options html on select object
     * @param 	int<0,1>	$forcecombo 			Force to load all values and output a standard combobox (with no beautification)
     * @param 	array<array{method:string,url:string,htmlname:string,params:array<string,string>}> 	$events 				Event options to run on change. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     * @param 	int<0,1>	$disableautocomplete 	Disable autocomplete
     * @return 	string                       	HTML string with select and input
     */
    public function select_incoterms($selected = '', $location_incoterms = '', $page = '', $htmlname = 'incoterm_id', $htmloption = '', $forcecombo = 1, $events = array(), $disableautocomplete = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of types of lines (product or service)
     * Example: 0=product, 1=service, 9=other (for external module)
     *
     * @param 	string 				$selected 		Preselected type
     * @param 	string 				$htmlname 		Name of field in html form
     * @param 	int<0,1>|string 	$showempty 		Add an empty field
     * @param 	int 				$hidetext 		Do not show label 'Type' before combo box (used only if there is at least 2 choices to select)
     * @param 	integer 			$forceall 		1=Force to show products and services in combo list, whatever are activated modules, 0=No force, 2=Force to show only Products, 3=Force to show only services, -1=Force none (and set hidden field to 'service')
     * @param	string				$morecss		More css
     * @param	int					$useajaxcombo	1=Use ajaxcombo
     * @return  void
     */
    public function select_type_of_lines($selected = '', $htmlname = 'type', $showempty = 0, $hidetext = 0, $forceall = 0, $morecss = "", $useajaxcombo = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Load into cache cache_types_fees, array of types of fees
     *
     * @return     int             Nb of lines loaded, <0 if KO
     */
    public function load_cache_types_fees()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of types of notes
     *
     * @param string $selected Preselected type
     * @param string $htmlname Name of field in form
     * @param int $showempty Add an empty field
     * @return    void
     */
    public function select_type_fees($selected = '', $htmlname = 'type', $showempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html form to select a third party
     *  This call select_thirdparty_list() or ajax depending on setup. This component is not able to support multiple select.
     *
     * @param int|string 	$selected 				Preselected ID
     * @param string 		$htmlname 				Name of field in form
     * @param string 		$filter 				Optional filters criteras. WARNING: To avoid SQL injection, only few chars [.a-z0-9 =<>()] are allowed here. Example: ((s.client:IN:1,3) AND (s.status:=:1)). Do not use a filter coming from input of users.
     * @param string|int<1,1> 	$showempty 			Add an empty field (Can be '1' or text key to use on empty line like 'SelectThirdParty')
     * @param int<0,1>		$showtype 				Show third party type in combolist (customer, prospect or supplier)
     * @param int<0,1>		$forcecombo 			Force to load all values and output a standard combobox (with no beautification)
     * @param array<array{method:string,url:string,htmlname:string,params:array<string,string>}> 	$events 	Ajax event options to run on change. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     * @param int 			$limit 					Maximum number of elements
     * @param string 		$morecss 				Add more css styles to the SELECT component
     * @param string 		$moreparam 				Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     * @param string 		$selected_input_value 	Value of preselected input text (for use with ajax)
     * @param int<0,3>		$hidelabel 				Hide label (0=no, 1=yes, 2=show search icon (before) and placeholder 'Search', 3 search icon after)
     * @param array<string,string|string[]>	$ajaxoptions 		Options for ajax_autocompleter
     * @param bool 			$multiple 				add [] in the name of element and add 'multiple' attribute (not working with ajax_autocompleter)
     * @param string[] 		$excludeids 			Exclude IDs from the select combo
     * @param int<0,1>		$showcode 				Show code
     * @return string  		 	            		HTML string with select box for thirdparty.
     */
    public function select_company($selected = '', $htmlname = 'socid', $filter = '', $showempty = '', $showtype = 0, $forcecombo = 0, $events = array(), $limit = 0, $morecss = 'minwidth100', $moreparam = '', $selected_input_value = '', $hidelabel = 1, $ajaxoptions = array(), $multiple = \false, $excludeids = array(), $showcode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Output html form to select a contact
     * This call select_contacts() or ajax depending on setup. This component is not able to support multiple select.
     *
     * Return HTML code of the SELECT of list of all contacts (for a third party or all).
     * This also set the number of contacts found into $this->num
     *
     * @param 	int 			$socid 				Id of third party or 0 for all or -1 for empty list
     * @param 	int|string 		$selected 			ID of preselected contact id
     * @param 	string 			$htmlname 			Name of HTML field ('none' for a not editable field)
     * @param 	int<0,3>|string	$showempty			0=no empty value, 1=add an empty value, 2=add line 'Internal' (used by user edit), 3=add an empty value only if more than one record into list
     * @param 	string 			$exclude 			List of contacts id to exclude
     * @param 	string 			$limitto 			Not used
     * @param 	integer 		$showfunction 		Add function into label
     * @param 	string 			$morecss 			Add more class to class style
     * @param 	bool 			$nokeyifsocid		When 1, we force the option "Press a key to show list" to 0 if there is a value for $socid
     * @param 	integer 		$showsoc 			Add company into label
     * @param 	int 			$forcecombo 		1=Force to use combo box (so no ajax beautify effect)
     * @param 	array<array{method:string,url:string,htmlname:string,params:array<string,string>}> 	$events 	Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     * @param 	string 			$moreparam 			Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     * @param 	string 			$htmlid 			Html id to use instead of htmlname
     * @param 	string 			$selected_input_value 	Value of preselected input text (for use with ajax)
     * @param 	string 			$filter 			Optional filters criteras. WARNING: To avoid SQL injection, only few chars [.a-z0-9 =<>()] are allowed here. Example: ((s.client:IN:1,3) AND (s.status:=:1)). Do not use a filter coming from input of users.
     * @return  int|string      					Return integer <0 if KO, HTML with select string if OK.
     */
    public function select_contact($socid, $selected = '', $htmlname = 'contactid', $showempty = 0, $exclude = '', $limitto = '', $showfunction = 0, $morecss = '', $nokeyifsocid = \true, $showsoc = 0, $forcecombo = 0, $events = array(), $moreparam = '', $htmlid = '', $selected_input_value = '', $filter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html form to select a third party.
     *  Note: you must use the select_company() to get the component to select a third party. This function must only be called by select_company.
     *
     * @param string 			$selected 		Preselected type
     * @param string 			$htmlname 		Name of field in form
     * @param string 			$filter 		Optional filters criteras. WARNING: To avoid SQL injection, only few chars [.a-z0-9 =<>] are allowed here, example: 's.rowid <> x'
     * 											If you need parenthesis, use the Universal Filter Syntax, example: '(s.client:in:1,3)'
     * 											Do not use a filter coming from input of users.
     * @param string|int<0,1> 	$showempty 		Add an empty field (Can be '1' or text to use on empty line like 'SelectThirdParty')
     * @param int<0,1>			$showtype 		Show third party nature in combolist (customer, prospect or supplier)
     * @param int 				$forcecombo 	Force to use standard HTML select component without beautification
     * @param array<array{method:string,url:string,htmlname:string,params:array<string,string>}> 	$events 	Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     * @param string 			$filterkey 		Filter on key value
     * @param int<0,1>			$outputmode 	0=HTML select string, 1=Array
     * @param int 				$limit 			Limit number of answers
     * @param string 			$morecss 		Add more css styles to the SELECT component
     * @param string 			$moreparam 		Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     * @param bool 				$multiple 		add [] in the name of element and add 'multiple' attribute
     * @param string[] 			$excludeids 	Exclude IDs from the select combo
     * @param int<0,1>			$showcode 		Show code in list
     * @return array<int,array{key:int,value:string,label:string,labelhtml:string}>|string            	HTML string with
     * @see select_company()
     */
    public function select_thirdparty_list($selected = '', $htmlname = 'socid', $filter = '', $showempty = '', $showtype = 0, $forcecombo = 0, $events = array(), $filterkey = '', $outputmode = 0, $limit = 0, $morecss = 'minwidth100', $moreparam = '', $multiple = \false, $excludeids = array(), $showcode = 0)
    {
    }
    /**
     * Return HTML code of the SELECT of list of all contacts (for a third party or all).
     * This also set the number of contacts found into $this->num
     * Note: you must use the select_contact() to get the component to select a contact. This function must only be called by select_contact.
     *
     * @param 	int 				$socid 				Id of third party or 0 for all or -1 for empty list
     * @param 	string[]|int|string	$selected 			Array of ID of preselected contact id
     * @param 	string 				$htmlname 			Name of HTML field ('none' for a not editable field)
     * @param 	int<0,3>|string		$showempty			0=no empty value, 1=add an empty value, 2=add line 'Internal' (used by user edit), 3=add an empty value only if more than one record into list
     * @param 	string 				$exclude 			List of contacts id to exclude
     * @param 	string 				$limitto 			Disable answers that are not id in this array list
     * @param 	int<0,1>			$showfunction 		Add function into label
     * @param 	string 				$morecss 			Add more class to class style
     * @param 	int 				$options_only 		1=Return options only (for ajax treatment), 2=Return array
     * @param 	int<0,1>			$showsoc 			Add company into label
     * @param 	int 				$forcecombo 		Force to use combo box (so no ajax beautify effect)
     * @param 	array<array{method:string,url:string,htmlname:string,params:array<string,string>}> 	$events 	Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     * @param 	string 				$moreparam 			Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     * @param 	string 				$htmlid 			Html id to use instead of htmlname
     * @param 	bool 				$multiple 			add [] in the name of element and add 'multiple' attribute
     * @param 	integer 			$disableifempty 	Set tag 'disabled' on select if there is no choice
     * @param 	string 				$filter 			Optional filters criteras. You must use the USF (Universal Search Filter) syntax, example: '(s.client:in:1,3)'
     * 													Do not use a filter coming from input of users.
     * @return  int|string|array<int,array{key:int,value:string,label:string,labelhtml:string}>		Return integer <0 if KO, HTML with select string if OK.
     */
    public function selectcontacts($socid, $selected = array(), $htmlname = 'contactid', $showempty = 0, $exclude = '', $limitto = '', $showfunction = 0, $morecss = '', $options_only = 0, $showsoc = 0, $forcecombo = 0, $events = array(), $moreparam = '', $htmlid = '', $multiple = \false, $disableifempty = 0, $filter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return HTML combo list of absolute discounts
     *
     * @param	string	$selected	Id Fixed reduction preselected
     * @param	string	$htmlname	Name of the form field
     * @param	string	$filter		Optional filter critreria
     * @param	int		$socid		Id of thirdparty
     * @param	int		$maxvalue	Max value for lines that can be selected
     * @return	int					Return number of qualifed lines in list
     */
    public function select_remises($selected, $htmlname, $filter, $socid, $maxvalue = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return the HTML select list of users
     *
     * @param 	string 			$selected 		Id user preselected
     * @param 	string 			$htmlname 		Field name in form
     * @param 	int<0,1> 		$show_empty 	0=liste sans valeur nulle, 1=ajoute valeur inconnue
     * @param 	int[] 			$exclude 		Array list of users id to exclude
     * @param 	int<0,1> 		$disabled 		If select list must be disabled
     * @param 	int[]|''|'hierarchy'|'hierarchyme' 	$include 		Array list of users id to include. User '' for all users or 'hierarchy' to have only supervised users or 'hierarchyme' to have supervised + me
     * @param 	int[]|int 		$enableonly 	Array list of users id to be enabled. All other must be disabled
     * @param 	string 			$force_entity 	'0' or Ids of environment to force
     * @return	void
     * @deprecated        Use select_dolusers instead
     * @see select_dolusers()
     */
    public function select_users($selected = '', $htmlname = 'userid', $show_empty = 0, $exclude = \null, $disabled = 0, $include = '', $enableonly = array(), $force_entity = '0')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return select list of users
     *
     * @param string|int|User	$selected 		User id or user object of user preselected. If 0 or < -2, we use id of current user. If -1 or '', keep unselected (if empty is allowed)
     * @param string 			$htmlname 		Field name in form
     * @param int<0,1>|string 	$show_empty 	0=list with no empty value, 1=add also an empty value into list
     * @param int[]|null		$exclude 		Array list of users id to exclude
     * @param int 				$disabled 		If select list must be disabled
     * @param int[]|''|'hierarchy'|'hierarchyme'	$include	Array list of users id to include. User '' for all users or 'hierarchy' to have only supervised users or 'hierarchyme' to have supervised + me
     * @param int[]|''			$enableonly 	Array list of users id to be enabled. If defined, it means that others will be disabled
     * @param string 			$force_entity 	'0' or list of Ids of environment to force, separated by a coma, or 'default' = do no extend to all entities allowed to superadmin.
     * @param int 				$maxlength 		Maximum length of string into list (0=no limit)
     * @param int<-1,1>			$showstatus 	0=show user status only if status is disabled, 1=always show user status into label, -1=never show user status
     * @param string 			$morefilter 	Add more filters into sql request (Example: '(employee:=:1)'). This value must not come from user input.
     * @param int<0,1> 			$show_every 	0=default list, 1=add also a value "Everybody" at beginning of list
     * @param string 			$enableonlytext If option $enableonlytext is set, we use this text to explain into label why record is disabled. Not used if enableonly is empty.
     * @param string 			$morecss 		More css
     * @param int<0,1> 			$notdisabled 	Show only active users (note: this will also happen, whatever is this option, if USER_HIDE_INACTIVE_IN_COMBOBOX is on).
     * @param int<0,2>			$outputmode 	0=HTML select string, 1=Array, 2=Detailed array
     * @param bool 				$multiple 		add [] in the name of element and add 'multiple' attribute
     * @param int<0,1> 			$forcecombo 	Force the component to be a simple combo box without ajax
     * @return string|array<int,string|array{id:int,label:string,labelhtml:string,color:string,picto:string}>	HTML select string
     * @see select_dolgroups()
     */
    public function select_dolusers($selected = '', $htmlname = 'userid', $show_empty = 0, $exclude = \null, $disabled = 0, $include = '', $enableonly = '', $force_entity = '', $maxlength = 0, $showstatus = 0, $morefilter = '', $show_every = 0, $enableonlytext = '', $morecss = '', $notdisabled = 0, $outputmode = 0, $multiple = \false, $forcecombo = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return select list of users. Selected users are stored into session.
     * List of users are provided into $_SESSION['assignedtouser'].
     *
     * @param 	string 								$action 			Value for $action
     * @param 	string 								$htmlname			Field name in form
     * @param 	int<0,1> 							$show_empty 		0=list without the empty value, 1=add empty value
     * @param 	int[] 								$exclude 			Array list of users id to exclude
     * @param 	int<0,1>							$disabled 			If select list must be disabled
     * @param 	int[]|''|'hierarchy'|'hierarchyme' 	$include 			Array list of users id to include or 'hierarchy' to have only supervised users
     * @param 	int[]|int							$enableonly 		Array list of users id to be enabled. All other must be disabled
     * @param 	string								$force_entity 		'0' or Ids of environment to force
     * @param 	int 								$maxlength 			Maximum length of string into list (0=no limit)
     * @param 	int<0,1>							$showstatus 		0=show user status only if status is disabled, 1=always show user status into label, -1=never show user status
     * @param 	string 								$morefilter 		Add more filters into sql request (Example: '(employee:=:1)'). This value must not come from user input.
     * @param 	int 								$showproperties 	Show properties of each attendees
     * @param 	int[] 								$listofuserid 		Array with properties of each user
     * @param 	int[] 								$listofcontactid 	Array with properties of each contact
     * @param 	int[] 								$listofotherid 		Array with properties of each other contact
     * @param	int									$canremoveowner		1 if we can remove owner, 0=no way
     * @return  string    	    	            						HTML select string
     * @see select_dolgroups()
     */
    public function select_dolusers_forevent($action = '', $htmlname = 'userid', $show_empty = 0, $exclude = \null, $disabled = 0, $include = array(), $enableonly = array(), $force_entity = '0', $maxlength = 0, $showstatus = 0, $morefilter = '', $showproperties = 0, $listofuserid = array(), $listofcontactid = array(), $listofotherid = array(), $canremoveowner = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return select list of resources. Selected resources are stored into session.
     * List of resources are provided into $_SESSION['assignedtoresource'].
     *
     * @param string 	$action 			Value for $action
     * @param string 	$htmlname			Field name in form
     * @param int 		$show_empty 		0=list without the empty value, 1=add empty value
     * @param int[] 	$exclude 			Array list of users id to exclude
     * @param int<0,1>	$disabled 			If select list must be disabled
     * @param int[]|string 	$include 		Array list of users id to include or 'hierarchy' to have only supervised users
     * @param int[] 	$enableonly 		Array list of users id to be enabled. All other must be disabled
     * @param string	$force_entity 		'0' or Ids of environment to force
     * @param int 		$maxlength 			Maximum length of string into list (0=no limit)
     * @param int<-1,1>	$showstatus 		0=show user status only if status is disabled, 1=always show user status into label, -1=never show user status
     * @param string 	$morefilter 		Add more filters into sql request
     * @param int 		$showproperties 	Show properties of each attendees
     * @param array<int,array{transparency:bool|int<0,1>}> $listofresourceid 	Array with properties of each resource
     * @return    string                    HTML select string
     */
    public function select_dolresources_forevent($action = '', $htmlname = 'userid', $show_empty = 0, $exclude = \null, $disabled = 0, $include = array(), $enableonly = array(), $force_entity = '0', $maxlength = 0, $showstatus = 0, $morefilter = '', $showproperties = 0, $listofresourceid = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of products for customer.
     *  Use Ajax if Ajax activated or go to select_produits_list
     *
     *  @param		int			$selected				Preselected products
     *  @param		string		$htmlname				Name of HTML select field (must be unique in page).
     *  @param		int|string	$filtertype				Filter on product type (''=nofilter, 0=product, 1=service)
     *  @param		int			$limit					Limit on number of returned lines
     *  @param		int			$price_level			Level of price to show
     *  @param		int			$status					Sell status: -1=No filter on sell status, 0=Products not on sell, 1=Products on sell
     *  @param		int			$finished				2=all, 1=finished, 0=raw material
     *  @param		string		$selected_input_value	Value of preselected input text (for use with ajax)
     *  @param		int			$hidelabel				Hide label (0=no, 1=yes, 2=show search icon (before) and placeholder, 3 search icon after)
     *  @param		array<string,string|string[]>	$ajaxoptions			Options for ajax_autocompleter
     *  @param      int			$socid					Thirdparty Id (to get also price dedicated to this customer)
     *  @param		string|int<0,1>	$showempty			'' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * 	@param		int			$forcecombo				Force to use combo box.
     *  @param      string      $morecss                Add more css on select
     *  @param      int<0,1>	$hidepriceinlabel       1=Hide prices in label
     *  @param      string      $warehouseStatus        Warehouse status filter to count the quantity in stock. Following comma separated filter options can be used
     *										            'warehouseopen' = count products from open warehouses,
     *										            'warehouseclosed' = count products from closed warehouses,
     *										            'warehouseinternal' = count products from warehouses for internal correct/transfer only
     *  @param 		?mixed[]	$selected_combinations 	Selected combinations. Format: array([attrid] => attrval, [...])
     *  @param		int<0,1> 	$nooutput				No print if 1, return the output into a string
     *  @param		int<-1,1>	$status_purchase		Purchase status: -1=No filter on purchase status, 0=Products not on purchase, 1=Products on purchase
     *  @param		int 		$warehouseId 			Filter by Warehouses Id where there is real stock
     *  @return		void|string
     */
    public function select_produits($selected = 0, $htmlname = 'productid', $filtertype = '', $limit = 0, $price_level = 0, $status = 1, $finished = 2, $selected_input_value = '', $hidelabel = 0, $ajaxoptions = array(), $socid = 0, $showempty = '1', $forcecombo = 0, $morecss = '', $hidepriceinlabel = 0, $warehouseStatus = '', $selected_combinations = \null, $nooutput = 0, $status_purchase = -1, $warehouseId = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of BOM for customer in Ajax if Ajax activated or go to select_produits_list
     *
     * @param string			$selected 		Preselected BOM id
     * @param string			$htmlname 		Name of HTML select field (must be unique in page).
     * @param int				$limit 			Limit on number of returned lines
     * @param int				$status 		Sell status -1=Return all bom, 0=Draft BOM, 1=Validated BOM
     * @param int				$type 			Type of the BOM (-1=Return all BOM, 0=Return disassemble BOM, 1=Return manufacturing BOM)
     * @param string|int<0,1>	$showempty		'' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param string			$morecss 		Add more css on select
     * @param string			$nooutput 		No print, return the output into a string
     * @param int				$forcecombo 	Force to use combo box
     * @param string[]			$TProducts 		Add filter on a defined product
     * @return void|string
     */
    public function select_bom($selected = '', $htmlname = 'bom_id', $limit = 0, $status = 1, $type = 0, $showempty = '1', $morecss = '', $nooutput = '', $forcecombo = 0, $TProducts = [])
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of products for a customer.
     * Called by select_produits.
     *
     * @param 	int 		$selected 				Preselected product
     * @param 	string 		$htmlname 				Name of select html
     * @param 	string 		$filtertype 			Filter on product type (''=nofilter, 0=product, 1=service)
     * @param 	int 		$limit 					Limit on number of returned lines
     * @param 	int 		$price_level 			Level of price to show
     * @param 	string 		$filterkey 				Filter on product
     * @param 	int<-1,1>	$status 				-1=Return all products, 0=Products not on sell, 1=Products on sell
     * @param 	int 		$finished 				Filter on finished field: 2=No filter
     * @param 	int 		$outputmode 			0=HTML select string, 1=Array
     * @param 	int 		$socid 					Thirdparty Id (to get also price dedicated to this customer)
     * @param 	string|int<0,1>	$showempty 			'' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param 	int 		$forcecombo 			Force to use combo box
     * @param 	string 		$morecss 				Add more css on select
     * @param 	int<0,1>	$hidepriceinlabel	 	1=Hide prices in label
     * @param 	''|'warehouseopen'|'warehouseclosed'|'warehouseinternal' 		$warehouseStatus 		Warehouse status filter to group/count stock. Following comma separated filter options can be used.
     *                                                                                                  'warehouseopen' = count products from open warehouses,
     *                                                                                                  'warehouseclosed' = count products from closed warehouses,
     *                                                                                                  'warehouseinternal' = count products from warehouses for internal correct/transfer only
     * @param 	int<-1,1>	$status_purchase 		Purchase status -1=Return all products, 0=Products not on purchase, 1=Products on purchase
     * @param 	int 		$warehouseId	 		Filter by Warehouses Id where there is real stock
     * @return	string|array<array{key:string,value:string,label:string,label2:string,desc:string,type:string,price_ht:string,price_ttc:string,price_ht_locale:string,price_ttc_locale:string,pricebasetype:string,tva_tx:string,default_vat_code:string,qty:string,discount:string,duration_value:string,duration_unit:string,pbq:string,labeltrans:string,desctrans:string,ref_customer:string}>		Array of keys for json
     */
    public function select_produits_list($selected = 0, $htmlname = 'productid', $filtertype = '', $limit = 20, $price_level = 0, $filterkey = '', $status = 1, $finished = 2, $outputmode = 0, $socid = 0, $showempty = '1', $forcecombo = 0, $morecss = 'maxwidth500', $hidepriceinlabel = 0, $warehouseStatus = '', $status_purchase = -1, $warehouseId = 0)
    {
    }
    /**
     * Function to forge the string with OPTIONs of SELECT.
     * This define value for &$opt and &$optJson.
     * This function is called by select_produits_list().
     *
     * @param stdClass 	$objp 			Resultset of fetch
     * @param string 	$opt 			Option (var used for returned value in string option format)
     * @param array{key?:string,value?:string,label?:string,label2?:string,desc?:string,type?:string,price_ht?:string,price_ttc?:string,price_ht_locale?:string,price_ttc_locale?:string,pricebasetype?:string,tva_tx?:string,default_vat_code?:string,qty?:string,discount?:string,duration_value?:string,duration_unit?:string,pbq?:string,labeltrans?:string,desctrans?:string,ref_customer?:string}	$optJson 		Option (var used for returned value in json format)
     * @param int 		$price_level 	Price level
     * @param int 		$selected 		Preselected value
     * @param int<0,1> 	$hidepriceinlabel Hide price in label
     * @param string 	$filterkey 		Filter key to highlight
     * @param int<0,1>	$novirtualstock Do not load virtual stock, even if slow option STOCK_SHOW_VIRTUAL_STOCK_IN_PRODUCTS_COMBO is on.
     * @return    void
     */
    protected function constructProductListOption(&$objp, &$opt, &$optJson, $price_level, $selected, $hidepriceinlabel = 0, $filterkey = '', $novirtualstock = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of products for customer (in Ajax if Ajax activated or go to select_produits_fournisseurs_list)
     *
     * @param int 		$socid 			Id third party
     * @param string 	$selected 		Preselected product
     * @param string 	$htmlname 		Name of HTML Select
     * @param string 	$filtertype 	Filter on product type (''=nofilter, 0=product, 1=service)
     * @param string 	$filtre 		For a SQL filter
     * @param array<string,string|string[]>	$ajaxoptions 	Options for ajax_autocompleter
     * @param int<0,1>	$hidelabel 		Hide label (0=no, 1=yes)
     * @param int<0,1>	$alsoproductwithnosupplierprice 1=Add also product without supplier prices
     * @param string 	$morecss 		More CSS
     * @param string 	$placeholder 	Placeholder
     * @return    void
     */
    public function select_produits_fournisseurs($socid, $selected = '', $htmlname = 'productid', $filtertype = '', $filtre = '', $ajaxoptions = array(), $hidelabel = 0, $alsoproductwithnosupplierprice = 0, $morecss = '', $placeholder = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of suppliers products
     *
     * @param int 		$socid 				Id of supplier thirdparty (0 = no filter)
     * @param string 	$selected 			Product price preselected (must be 'id' in product_fournisseur_price or 'idprod_IDPROD')
     * @param string 	$htmlname 			Name of HTML select
     * @param string 	$filtertype 		Filter on product type (''=nofilter, 0=product, 1=service)
     * @param string 	$filtre 			Generic filter. Data must not come from user input.
     * @param string 	$filterkey 			Filter of produdts
     * @param int 		$statut 			-1=Return all products, 0=Products not on buy, 1=Products on buy
     * @param int 		$outputmode 		0=HTML select string, 1=Array
     * @param int 		$limit 				Limit of line number
     * @param int 		$alsoproductwithnosupplierprice 1=Add also product without supplier prices
     * @param string 	$morecss 			Add more CSS
     * @param int 		$showstockinlist 	Show stock information (slower).
     * @param string 	$placeholder 		Placeholder
     * @return array<array<string,mixed>>|string                	Array of keys for json or HTML component
     */
    public function select_produits_fournisseurs_list($socid, $selected = '', $htmlname = 'productid', $filtertype = '', $filtre = '', $filterkey = '', $statut = -1, $outputmode = 0, $limit = 100, $alsoproductwithnosupplierprice = 0, $morecss = '', $showstockinlist = 0, $placeholder = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of suppliers prices for a product
     *
     * @param int $productid Id of product
     * @param string $htmlname Name of HTML field
     * @param int $selected_supplier Pre-selected supplier if more than 1 result
     * @return        string
     */
    public function select_product_fourn_price($productid, $htmlname = 'productfournpriceid', $selected_supplier = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load into cache list of payment terms
     *
     * @return     int             Nb of lines loaded, <0 if KO
     */
    public function load_cache_conditions_paiements()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load int a cache property th elist of possible delivery delays.
     *
     * @return     int             Nb of lines loaded, <0 if KO
     */
    public function load_cache_availability()
    {
    }
    /**
     * Return the list of type of delay available.
     *
     * @param 	string 		$selected Id du type de delais pre-selectionne
     * @param 	string 		$htmlname Nom de la zone select
     * @param 	string 		$filtertype To add a filter
     * @param 	int 		$addempty Add empty entry
     * @param 	string 		$morecss More CSS
     * @return  void
     */
    public function selectAvailabilityDelay($selected = '', $htmlname = 'availid', $filtertype = '', $addempty = 0, $morecss = '')
    {
    }
    /**
     * Load into cache cache_demand_reason, array of input reasons
     *
     * @return     int             Nb of lines loaded, <0 if KO
     */
    public function loadCacheInputReason()
    {
    }
    /**
     * Return list of input reason (events that triggered an object creation, like after sending an emailing, making an advert, ...)
     * List found into table c_input_reason loaded by loadCacheInputReason
     *
     * @param 	string 		$selected 	Id or code of type origin to select by default
     * @param 	string 		$htmlname 	Nom de la zone select
     * @param 	string 		$exclude 	To exclude a code value (Example: SRC_PROP)
     * @param 	int 		$addempty 	Add an empty entry
     * @param 	string 		$morecss 	Add more css to the HTML select component
     * @param 	int 		$notooltip 	Do not show the tooltip for admin
     * @return  void
     */
    public function selectInputReason($selected = '', $htmlname = 'demandreasonid', $exclude = '', $addempty = 0, $morecss = '', $notooltip = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge dans cache la liste des types de paiements possibles
     *
     * @return     int                 Nb of lines loaded, <0 if KO
     */
    public function load_cache_types_paiements()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    print list of payment modes.
     *    Constant MAIN_DEFAULT_PAYMENT_TERM_ID can be used to set default value but scope is all application, probably not what you want.
     *    See instead to force the default value by the caller.
     *
     * @param int $selected Id of payment term to preselect by default
     * @param string $htmlname Nom de la zone select
     * @param int $filtertype If > 0, include payment terms with deposit percentage (for objects other than invoices and invoice templates)
     * @param int $addempty Add an empty entry
     * @param int $noinfoadmin 0=Add admin info, 1=Disable admin info
     * @param string $morecss Add more CSS on select tag
     * @param int	 $deposit_percent < 0 : deposit_percent input makes no sense (for example, in list filters)
     *                                0 : use default deposit percentage from entry
     *                                > 0 : force deposit percentage (for example, from company object)
     * @param int $noprint if set to one we return the html to print, if 0 (default) we print it
     * @return    void|string
     * @deprecated Use getSelectConditionsPaiements() instead and handle noprint locally.
     */
    public function select_conditions_paiements($selected = 0, $htmlname = 'condid', $filtertype = -1, $addempty = 0, $noinfoadmin = 0, $morecss = '', $deposit_percent = -1, $noprint = 0)
    {
    }
    /**
     *    Return list of payment modes.
     *    Constant MAIN_DEFAULT_PAYMENT_TERM_ID can be used to set default value but scope is all application, probably not what you want.
     *    See instead to force the default value by the caller.
     *
     * @param int $selected Id of payment term to preselect by default
     * @param string $htmlname Nom de la zone select
     * @param int $filtertype If > 0, include payment terms with deposit percentage (for objects other than invoices and invoice templates)
     * @param int $addempty Add an empty entry
     * @param int $noinfoadmin 0=Add admin info, 1=Disable admin info
     * @param string $morecss Add more CSS on select tag
     * @param int	 $deposit_percent < 0 : deposit_percent input makes no sense (for example, in list filters)
     *                                0 : use default deposit percentage from entry
     *                                > 0 : force deposit percentage (for example, from company object)
     * @return    string                        String for the HTML select component
     */
    public function getSelectConditionsPaiements($selected = 0, $htmlname = 'condid', $filtertype = -1, $addempty = 0, $noinfoadmin = 0, $morecss = '', $deposit_percent = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of payment methods
     * Constant MAIN_DEFAULT_PAYMENT_TYPE_ID can used to set default value but scope is all application, probably not what you want.
     *
     * @param 	string 		$selected 		Id or code or preselected payment mode
     * @param 	string 		$htmlname 		Name of select field
     * @param 	string 		$filtertype 	To filter on field type in llx_c_paiement ('CRDT' or 'DBIT' or array('code'=>xx,'label'=>zz))
     * @param 	int 		$format 		0=id+label, 1=code+code, 2=code+label, 3=id+code
     * @param 	int 		$empty 			1=can be empty, 0 otherwise
     * @param 	int 		$noadmininfo 	0=Add admin info, 1=Disable admin info
     * @param 	int 		$maxlength 		Max length of label
     * @param 	int 		$active 		Active or not, -1 = all
     * @param 	string 		$morecss 		Add more CSS on select tag
     * @param 	int<0,1>	$nooutput 		1=Return string, do not send to output
     * @return  string|void             	String for the HTML select component
     */
    public function select_types_paiements($selected = '', $htmlname = 'paiementtype', $filtertype = '', $format = 0, $empty = 1, $noadmininfo = 0, $maxlength = 0, $active = 1, $morecss = '', $nooutput = 0)
    {
    }
    /**
     *  Selection HT or TTC
     *
     * @param string $selected Id pre-selectionne
     * @param string $htmlname Nom de la zone select
     * @param int	 $addjscombo Add js combo
     * @return    string                    Code of HTML select to chose tax or not
     */
    public function selectPriceBaseType($selected = '', $htmlname = 'price_base_type', $addjscombo = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load in cache list of transport mode
     *
     * @return     int                 Nb of lines loaded, <0 if KO
     */
    public function load_cache_transport_mode()
    {
    }
    /**
     * Return list of transport mode for intracomm report
     *
     * @param 	string 		$selected 		Id of the transport mode preselected
     * @param 	string 		$htmlname 		Name of the select field
     * @param 	int 		$format 		0=id+label, 1=code+code, 2=code+label, 3=id+code
     * @param 	int 		$empty 			1=can be empty, 0 else
     * @param 	int 		$noadmininfo 	0=Add admin info, 1=Disable admin info
     * @param 	int 		$maxlength 		Max length of label
     * @param 	int 		$active 		Active or not, -1 = all
     * @param 	string 		$morecss 		Add more CSS on select tag
     * @return  void
     */
    public function selectTransportMode($selected = '', $htmlname = 'transportmode', $format = 0, $empty = 1, $noadmininfo = 0, $maxlength = 0, $active = 1, $morecss = '')
    {
    }
    /**
     * Return a HTML select list of shipping mode
     *
     * @param string 	$selected 		Id shipping mode preselected
     * @param string 	$htmlname 		Name of select zone
     * @param string 	$filtre 		To filter list. This parameter must not come from input of users
     * @param int 		$useempty 		1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     * @param string 	$moreattrib 	To add more attribute on select
     * @param int 		$noinfoadmin 	0=Add admin info, 1=Disable admin info
     * @param string 	$morecss 		More CSS
     * @return void
     */
    public function selectShippingMethod($selected = '', $htmlname = 'shipping_method_id', $filtre = '', $useempty = 0, $moreattrib = '', $noinfoadmin = 0, $morecss = '')
    {
    }
    /**
     *    Display form to select shipping mode
     *
     * @param string $page Page
     * @param string $selected Id of shipping mode
     * @param string $htmlname Name of select html field
     * @param int $addempty 1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     * @return    void
     */
    public function formSelectShippingMethod($page, $selected = '', $htmlname = 'shipping_method_id', $addempty = 0)
    {
    }
    /**
     * Creates HTML last in cycle situation invoices selector
     *
     * @param string $selected Preselected ID
     * @param int $socid Company ID
     *
     * @return    string                     HTML select
     */
    public function selectSituationInvoices($selected = '', $socid = 0)
    {
    }
    /**
     * Creates HTML units selector (code => label)
     *
     * @param	int|''		$selected	Preselected Unit ID
     * @param	string		$htmlname	Select name
     * @param	int<0,1>	$showempty	Add an empty line
     * @param	string		$unit_type	Restrict to one given unit type
     * @return	string					HTML select
     */
    public function selectUnits($selected = '', $htmlname = 'units', $showempty = 0, $unit_type = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return a HTML select list of bank accounts
     *
     * @param int|''	 	$selected 		Id account preselected
     * @param string 		$htmlname 		Name of select zone
     * @param int 			$status 		Status of searched accounts (0=open, 1=closed, 2=both)
     * @param string 		$filtre 		To filter the list. This parameter must not come from input of users
     * @param int|string	$useempty 		1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     * @param string 		$moreattrib 	To add more attribute on select
     * @param int 			$showcurrency 	Show currency in label
     * @param string 		$morecss 		More CSS
     * @param int<0,1>		$nooutput 		1=Return string, do not send to output
     * @return int|string   	           	If noouput=0: Return integer <0 if error, Num of bank account found if OK (0, 1, 2, ...), If nooutput=1: Return a HTML select string.
     */
    public function select_comptes($selected = '', $htmlname = 'accountid', $status = 0, $filtre = '', $useempty = 0, $moreattrib = '', $showcurrency = 0, $morecss = '', $nooutput = 0)
    {
    }
    /**
     * Return a HTML select list of bank accounts customer
     *
     * @param int|''	 	$selected 		Id account preselected
     * @param string 		$htmlname 		Name of select zone
     * @param string 		$filtre 		To filter the list. This parameter must not come from input of users
     * @param int|string	$useempty 		1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     * @param string 		$moreattrib 	To add more attribute on select
     * @param int 			$showibanbic 	Show iban/bic in label
     * @param string 		$morecss 		More CSS
     * @param int<0,1>		$nooutput 		1=Return string, do not send to output
     * @return int|string   	           	If noouput=0: Return integer <0 if error, Num of bank account found if OK (0, 1, 2, ...), If nooutput=1: Return a HTML select string.
     */
    public function selectRib($selected = '', $htmlname = 'ribcompanyid', $filtre = '', $useempty = 0, $moreattrib = '', $showibanbic = 0, $morecss = '', $nooutput = 0)
    {
    }
    /**
     * Return a HTML select list of establishment
     *
     * @param 	string 	$selected 		Id establishment preselected
     * @param 	string 	$htmlname 		Name of select zone
     * @param 	int 	$status 		Status of searched establishment (0=open, 1=closed, 2=both)
     * @param 	string 	$filtre 		To filter list. This parameter must not come from input of users
     * @param 	int 	$useempty 		1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     * @param 	string 	$moreattrib 	To add more attribute on select
     * @return  int   					Return integer <0 if error, Num of establishment found if OK (0, 1, 2, ...)
     */
    public function selectEstablishments($selected = '', $htmlname = 'entity', $status = 0, $filtre = '', $useempty = 0, $moreattrib = '')
    {
    }
    /**
     * Display form to select bank account
     *
     * @param string 	$page 		Page
     * @param string 	$selected 	Id of bank account
     * @param string 	$htmlname 	Name of select html field
     * @param int 		$addempty 	1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     * @return    					void
     */
    public function formSelectAccount($page, $selected = '', $htmlname = 'fk_account', $addempty = 0)
    {
    }
    /**
     * Display form to select bank customer account
     *
     * @param string 	$page 			Page
     * @param string 	$selected 		Id of bank customer account
     * @param string 	$htmlname 		Name of select html field
     * @param string 	$filtre 		filtre for rib selected
     * @param int 		$addempty 		1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     * @param int 		$showibanbic 	Show iban/bic in label
     * @return    						void
     */
    public function formRib($page, $selected = '', $htmlname = 'ribcompanyid', $filtre = '', $addempty = 0, $showibanbic = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of categories having chosen type
     *
     * @param 	string|int 			$type 			Type of category ('customer', 'supplier', 'contact', 'product', 'member'). Old mode (0, 1, 2, ...) is deprecated.
     * @param 	string 				$selected 		Id of category preselected or 'auto' (autoselect category if there is only one element). Not used if $outputmode = 1.
     * @param 	string 				$htmlname 		HTML field name
     * @param 	int 				$maxlength 		Maximum length for labels
     * @param 	int|string|int[]	$fromid 		Keep only or Exclude (depending on $include parameter) all categories (including the leaf $fromid) into the tree after this id $fromid.
     *                             	    	     	$fromid can be an :
     *                                 	    	 	- int (id of category)
     *                                 		 		- string (categories ids separated by comma)
     * 	                                  	 		- array (list of categories ids)
     * @param 	int<0,3>			$outputmode 	0=HTML select string, 1=Array with full label only, 2=Array extended, 3=Array with full picto + label
     * @param 	int<0,1>			$include 		[=0] Removed or 1=Keep only
     * @param 	string 				$morecss 		More CSS
     * @param	int<0,2>			$useempty		0=No empty value, 1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries. Default is 1.
     * @return	string|array<int,string>|array<int,array{id:int,fulllabel:string,color:string,picto:string}>|array<int,array{rowid:int,id:int,fk_parent:int,label:string,description:string,color:string,position:string,visible:int,ref_ext:string,picto:string,fullpath:string,fulllabel:string}>		String list or Array of categories
     * @see select_categories()
     */
    public function select_all_categories($type, $selected = '', $htmlname = "parent", $maxlength = 64, $fromid = 0, $outputmode = 0, $include = 0, $morecss = '', $useempty = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *     Show a confirmation HTML form or AJAX popup
     *
     * @param string $page Url of page to call if confirmation is OK
     * @param string $title Title
     * @param string $question Question
     * @param string $action Action
     * @param array<array{name:string,value:string,values:string[],default:string,label:string,type:string,size:string,morecss:string,moreattr:string,style:string,inputko?:int<0,1>}>|string|null 	$formquestion 		An array with complementary inputs to add into forms: array(array('label'=> ,'type'=> , 'size'=>, 'morecss'=>, 'moreattr'=>'autofocus' or 'style=...'))
     *                                                                                                                                                                                                                  'type' can be 'text', 'password', 'checkbox', 'radio', 'date', 'datetime', 'select', 'multiselect', 'morecss',
     *                                                                                                                                                                                                                  'other', 'onecolumn' or 'hidden'...
     * @param string $selectedchoice "" or "no" or "yes"
     * @param int|string $useajax 0=No, 1=Yes use Ajax to show the popup, 2=Yes and also submit page with &confirm=no if choice is No, 'xxx'=Yes and preoutput confirm box with div id=dialog-confirm-xxx
     * @param int $height Force height of box
     * @param int $width Force width of box
     * @return    void
     * @deprecated
     * @see formconfirm()
     */
    public function form_confirm($page, $title, $question, $action, $formquestion = array(), $selectedchoice = "", $useajax = 0, $height = 170, $width = 500)
    {
    }
    /**
     *     Show a confirmation HTML form or AJAX popup.
     *     Easiest way to use this is with useajax=1.
     *     If you use useajax='xxx', you must also add jquery code to trigger opening of box (with correct parameters)
     *     just after calling this method. For example:
     *       print '<script nonce="'.getNonce().'" type="text/javascript">'."\n";
     *       print 'jQuery(document).ready(function() {'."\n";
     *       print 'jQuery(".xxxlink").click(function(e) { jQuery("#aparamid").val(jQuery(this).attr("rel")); jQuery("#dialog-confirm-xxx").dialog("open"); return false; });'."\n";
     *       print '});'."\n";
     *       print '</script>'."\n";
     *
     * @param string 		$page 				Url of page to call if confirmation is OK. Can contains parameters (param 'action' and 'confirm' will be reformatted)
     * @param string 		$title 				Title
     * @param string 		$question 			Question
     * @param string 		$action 			Action
     * @param array<array{name:string,value:string,values:string[],default:string,label:string,type:string,size:string,morecss:string,moreattr:string,style:string,inputko?:int<0,1>}>|string|null 	$formquestion 		An array with complementary inputs to add into forms: array(array('label'=> ,'type'=> , 'size'=>, 'morecss'=>, 'moreattr'=>'autofocus' or 'style=...'))
     *                                                                                                                                                                                                                  'type' can be 'text', 'password', 'checkbox', 'radio', 'date', 'datetime', 'select', 'multiselect', 'morecss',
     *                                                                                                                                                                                                                  'other', 'onecolumn' or 'hidden'...
     * @param int<0,1>|''|'no'|'yes'|'1'|'0'	$selectedchoice 	'' or 'no', or 'yes' or '1', 1, '0' or 0
     * @param int<0,2>|string	$useajax 			0=No, 1=Yes use Ajax to show the popup, 2=Yes and also submit page with &confirm=no if choice is No, 'xxx'=Yes and preoutput confirm box with div id=dialog-confirm-xxx
     * @param int|string 	$height 			Force height of box (0 = auto)
     * @param int 			$width 				Force width of box ('999' or '90%'). Ignored and forced to 90% on smartphones.
     * @param int 			$disableformtag 	1=Disable form tag. Can be used if we are already inside a <form> section.
     * @param string 		$labelbuttonyes 	Label for Yes
     * @param string 		$labelbuttonno 		Label for No
     * @return string                        	HTML ajax code if a confirm ajax popup is required, Pure HTML code if it's an html form
     */
    public function formconfirm($page, $title, $question, $action, $formquestion = '', $selectedchoice = '', $useajax = 0, $height = 0, $width = 500, $disableformtag = 0, $labelbuttonyes = 'Yes', $labelbuttonno = 'No')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Show a form to select a project
     *
     * @param 	int 		$page 				Page
     * @param 	int 		$socid 				Id third party (-1=all, 0=only projects not linked to a third party, id=projects not linked or linked to third party id)
     * @param 	string 		$selected 			Id preselected project
     * @param 	string 		$htmlname 			Name of select field
     * @param 	int 		$discard_closed 	Discard closed projects (0=Keep,1=hide completely except $selected,2=Disable)
     * @param 	int 		$maxlength 			Max length
     * @param 	int 		$forcefocus 		Force focus on field (works with javascript only)
     * @param 	int<0,1>	$nooutput 			No print is done. String is returned.
     * @param 	string 		$textifnoproject 	Text to show if no project
     * @param 	string 		$morecss 			More CSS
     * @return	string                      	Return html content
     */
    public function form_project($page, $socid, $selected = '', $htmlname = 'projectid', $discard_closed = 0, $maxlength = 20, $forcefocus = 0, $nooutput = 0, $textifnoproject = '', $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Show a form to select payment conditions
     *
     * @param int 		$page 				Page
     * @param string 	$selected 			Id condition pre-selectionne
     * @param string 	$htmlname 			Name of select html field
     * @param int 		$addempty 			Add empty entry
     * @param string 	$type 				Type ('direct-debit' or 'bank-transfer')
     * @param int 		$filtertype 		If > 0, include payment terms with deposit percentage (for objects other than invoices and invoice templates)
     * @param int	 	$deposit_percent 	< 0 : deposit_percent input makes no sense (for example, in list filters)
     *                                		0 : use default deposit percentage from entry
     *                                		> 0 : force deposit percentage (for example, from company object)
     * @param int<0,1>	$nooutput 			No print is done. String is returned.
     * @return string                   	HTML output or ''
     */
    public function form_conditions_reglement($page, $selected = '', $htmlname = 'cond_reglement_id', $addempty = 0, $type = '', $filtertype = -1, $deposit_percent = -1, $nooutput = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show a form to select a delivery delay
     *
     * @param 	int 		$page 		Page
     * @param 	string 		$selected 	Id condition pre-selectionne
     * @param 	string 		$htmlname 	Name of select html field
     * @param 	int 		$addempty 	Add an empty entry
     * @return  void
     */
    public function form_availability($page, $selected = '', $htmlname = 'availability', $addempty = 0)
    {
    }
    /**
     *  Output HTML form to select list of input reason (events that triggered an object creation, like after sending an emailing, making an advert, ...)
     *  List found into table c_input_reason loaded by loadCacheInputReason
     *
     * @param string $page Page
     * @param string $selected Id condition pre-selectionne
     * @param string $htmlname Name of select html field
     * @param int $addempty Add empty entry
     * @return    void
     */
    public function formInputReason($page, $selected = '', $htmlname = 'demandreason', $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show a form + html select a date
     *
     * @param string $page Page
     * @param string $selected Date preselected
     * @param string $htmlname Html name of date input fields or 'none'
     * @param int $displayhour Display hour selector
     * @param int $displaymin Display minutes selector
     * @param int<0,1> $nooutput 1=No print output, return string
     * @param string $type 'direct-debit' or 'bank-transfer'
     * @return    string
     * @see        selectDate()
     */
    public function form_date($page, $selected, $htmlname, $displayhour = 0, $displaymin = 0, $nooutput = 0, $type = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show a select form to choose a user
     *
     * @param string $page Page
     * @param string $selected Id of user preselected
     * @param string $htmlname Name of input html field. If 'none', we just output the user link.
     * @param int[] $exclude List of users id to exclude
     * @param int[] $include List of users id to include
     * @return    void
     */
    public function form_users($page, $selected = '', $htmlname = 'userid', $exclude = array(), $include = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show form with payment mode
     *
     * @param string $page Page
     * @param string $selected Id mode pre-selectionne
     * @param string $htmlname Name of select html field
     * @param string $filtertype To filter on field type in llx_c_paiement ('CRDT' or 'DBIT' or array('code'=>xx,'label'=>zz))
     * @param int $active Active or not, -1 = all
     * @param int $addempty 1=Add empty entry
     * @param string $type Type ('direct-debit' or 'bank-transfer')
     * @param int<0,1> $nooutput 1=Return string, no output
     * @return    string                    HTML output or ''
     */
    public function form_modes_reglement($page, $selected = '', $htmlname = 'mode_reglement_id', $filtertype = '', $active = 1, $addempty = 0, $type = '', $nooutput = 0)
    {
    }
    /**
     *    Show form with transport mode
     *
     * @param string $page Page
     * @param string $selected Id mode pre-select
     * @param string $htmlname Name of select html field
     * @param int $active Active or not, -1 = all
     * @param int $addempty 1=Add empty entry
     * @return    void
     */
    public function formSelectTransportMode($page, $selected = '', $htmlname = 'transport_mode_id', $active = 1, $addempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show form with multicurrency code
     *
     * @param string $page Page
     * @param string $selected code pre-selectionne
     * @param string $htmlname Name of select html field
     * @return    void
     */
    public function form_multicurrency_code($page, $selected = '', $htmlname = 'multicurrency_code')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show form with multicurrency rate
     *
     * @param string $page Page
     * @param double $rate Current rate
     * @param string $htmlname Name of select html field
     * @param string $currency Currency code to explain the rate
     * @return    void
     */
    public function form_multicurrency_rate($page, $rate = 0.0, $htmlname = 'multicurrency_tx', $currency = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Show a select box with available absolute discounts
     *
     * @param string $page Page URL where form is shown
     * @param int $selected Value preselected
     * @param string $htmlname Name of SELECT component. If 'none', not changeable. Example 'remise_id'.
     * @param int $socid Third party id
     * @param float $amount Total amount available
     * @param string $filter SQL filter on discounts
     * @param int $maxvalue Max value for lines that can be selected
     * @param string $more More string to add
     * @param int $hidelist 1=Hide list
     * @param int $discount_type 0 => customer discount, 1 => supplier discount
     * @return    void
     */
    public function form_remise_dispo($page, $selected, $htmlname, $socid, $amount, $filter = '', $maxvalue = 0, $more = '', $hidelist = 0, $discount_type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show forms to select a contact
     *
     * @param string 	$page 		Page
     * @param Societe 	$societe 	Filter on third party
     * @param string 	$selected 	Id contact pre-selectionne
     * @param string 	$htmlname 	Name of HTML select. If 'none', we just show contact link.
     * @return    void
     */
    public function form_contacts($page, $societe, $selected = '', $htmlname = 'contactid')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output html select to select thirdparty
     *
     * @param string 	$page 					Page
     * @param string 	$selected 				Id preselected
     * @param string 	$htmlname 				Name of HTML select
     * @param string	$filter 				Optional filters criteras. WARNING: To avoid SQL injection, only few chars [.a-z0-9 =<>()] are allowed here (example: 's.rowid <> x', 's.client IN (1,3)'). Do not use a filter coming from input of users.
     * @param string|int<0,1> 	$showempty 		Add an empty field (Can be '1' or text key to use on empty line like 'SelectThirdParty')
     * @param int<0,1>	$showtype 				Show third party type in combolist (customer, prospect or supplier)
     * @param int<0,1>	$forcecombo 			Force to use combo box
     * @param 	array<array{method:string,url:string,htmlname:string,params:array<string,string>}> 	$events 	Event options. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
     * @param int<0,1>	$nooutput 				No print output. Return it only.
     * @param int[] 	$excludeids 			Exclude IDs from the select combo
     * @param string 	$textifnothirdparty 	Text to show if no thirdparty
     * @return    string                        HTML output or ''
     */
    public function form_thirdparty($page, $selected = '', $htmlname = 'socid', $filter = '', $showempty = 0, $showtype = 0, $forcecombo = 0, $events = array(), $nooutput = 0, $excludeids = array(), $textifnothirdparty = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Retourne la liste des devises, dans la langue de l'utilisateur
     *
     * @param string $selected preselected currency code
     * @param string $htmlname name of HTML select list
     * @deprecated
     * @return    void
     */
    public function select_currency($selected = '', $htmlname = 'currency_id')
    {
    }
    /**
     *  Retourne la liste des devises, dans la langue de l'utilisateur
     *
     * @param string $selected preselected currency code
     * @param string $htmlname name of HTML select list
     * @param int	 $mode 0 = Add currency symbol into label, 1 = Add 3 letter iso code
     * @param string $useempty '1'=Allow empty value
     * @return    string
     */
    public function selectCurrency($selected = '', $htmlname = 'currency_id', $mode = 0, $useempty = '')
    {
    }
    /**
     * Return array of currencies in user language
     *
     * @param 	string 	$selected 				Preselected currency code
     * @param 	string 	$htmlname 				Name of HTML select list
     * @param 	integer $useempty 				1=Add empty line
     * @param 	string 	$filter 				Optional filters criteras (example: 'code <> x', ' in (1,3)')
     * @param 	bool 	$excludeConfCurrency 	false = If company current currency not in table, we add it into list. Should always be available.
     *                                  		true = we are in currency_rate update , we don't want to see conf->currency in select
     * @param 	string 	$morecss 				More css
     * @return  string							HTML component
     */
    public function selectMultiCurrency($selected = '', $htmlname = 'multicurrency_code', $useempty = 0, $filter = '', $excludeConfCurrency = \false, $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load into the cache ->cache_vatrates, all the vat rates of a country
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
     *  @param	string			$htmlname           Name of HTML select field
     *  @param  float|string	$selectedrate       Force preselected vat rate. Can be '8.5' or '8.5 (NOO)' for example. Use '' for no forcing.
     *  @param  ?Societe		$societe_vendeuse   Thirdparty seller
     *  @param  ?Societe		$societe_acheteuse  Thirdparty buyer
     *  @param  int				$idprod             Id product. O if unknown of NA.
     *  @param  int				$info_bits          Miscellaneous information on line (1 for NPR)
     *  @param  int<0,1>|''		$type               ''=Unknown, 0=Product, 1=Service (Used if idprod not defined)
     *                                              If seller not subject to VAT, default VAT=0. End of rule.
     *                                              If (seller country==buyer country), then default VAT=product's VAT. End of rule.
     *                                              If (seller and buyer in EU) and sold product = new means of transportation (car, boat, airplane), default VAT =0 (VAT must be paid by the buyer to his country's tax office and not the seller). End of rule.
     *                                              If (seller and buyer in EU) and buyer=private person, then default VAT=VAT of sold product.  End of rule.
     *                                              If (seller and buyer in EU) and buyer=company then default VAT =0. End of rule.
     *                                              Else, default proposed VAT==0. End of rule.
     *  @param	bool		$options_only			Return HTML options lines only (for ajax treatment)
     *  @param  int<-1,1>	$mode					0=Use vat rate as key in combo list, 1=Add VAT code after vat rate into key, -1=Use id of vat line as key
     *  @param  int<0,2>	$type_vat				0=All types, 1=VAT rate for sales, 2=VAT rate for purchases
     *  @return	string
     */
    public function load_tva($htmlname = 'tauxtva', $selectedrate = '', $societe_vendeuse = \null, $societe_acheteuse = \null, $idprod = 0, $info_bits = 0, $type = '', $options_only = \false, $mode = 0, $type_vat = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show a HTML widget to input a date or combo list for day, month, years and optionally hours and minutes.
     *  Fields are preselected with :
     *                - set_time date (must be a local PHP server timestamp or string date with format 'YYYY-MM-DD' or 'YYYY-MM-DD HH:MM')
     *                - local date in user area, if set_time is '' (so if set_time is '', output may differs when done from two different location)
     *                - Empty (fields empty), if set_time is -1 (in this case, parameter empty must also have value 1)
     *
     * @param integer|string $set_time Pre-selected date (must be a local PHP server timestamp), -1 to keep date not preselected, '' to use current date with 00:00 hour (Parameter 'empty' must be 0 or 2).
     * @param string $prefix Prefix for fields name
     * @param int $h 1 or 2=Show also hours (2=hours on a new line), -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 show hour always empty
     * @param int $m 1=Show also minutes, -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 show minutes always empty
     * @param int $empty 0=Fields required, 1=Empty inputs are allowed, 2=Empty inputs are allowed for hours only
     * @param string $form_name Not used
     * @param int $d 1=Show days, month, years
     * @param int $addnowlink Add a link "Now"
     * @param int<0,1> $nooutput Do not output html string but return it
     * @param int $disabled Disable input fields
     * @param int $fullday When a checkbox with this html name is on, hour and day are set with 00:00 or 23:59
     * @param string $addplusone Add a link "+1 hour". Value must be name of another select_date field.
     * @param int|string $adddateof Add a link "Date of invoice" using the following date.
     * @return    string                        '' or HTML component string if nooutput is 1
     * @deprecated
     * @see    selectDate(), form_date(), select_month(), select_year(), select_dayofweek()
     */
    public function select_date($set_time = '', $prefix = 're', $h = 0, $m = 0, $empty = 0, $form_name = "", $d = 1, $addnowlink = 0, $nooutput = 0, $disabled = 0, $fullday = 0, $addplusone = '', $adddateof = '')
    {
    }
    /**
     *  Show 2 HTML widget to input a date or combo list for day, month, years and optionally hours and minutes.
     *  Fields are preselected with :
     *              - set_time date (must be a local PHP server timestamp or string date with format 'YYYY-MM-DD' or 'YYYY-MM-DD HH:MM')
     *              - local date in user area, if set_time is '' (so if set_time is '', output may differs when done from two different location)
     *              - Empty (fields empty), if set_time is -1 (in this case, parameter empty must also have value 1)
     *
     * @param integer|string $set_time Pre-selected date (must be a local PHP server timestamp), -1 to keep date not preselected, '' to use current date with 00:00 hour (Parameter 'empty' must be 0 or 2).
     * @param integer|string $set_time_end Pre-selected date (must be a local PHP server timestamp), -1 to keep date not preselected, '' to use current date with 00:00 hour (Parameter 'empty' must be 0 or 2).
     * @param string $prefix Prefix for fields name
     * @param int	 $empty 0=Fields required, 1=Empty inputs are allowed, 2=Empty inputs are allowed for hours only
     * @param int	 $forcenewline Force new line between the 2 dates.
     * @return string                        Html for selectDate
     * @see    form_date(), select_month(), select_year(), select_dayofweek()
     */
    public function selectDateToDate($set_time = '', $set_time_end = '', $prefix = 're', $empty = 0, $forcenewline = 0)
    {
    }
    /**
     *  Show a HTML widget to input a date or combo list for day, month, years and optionally hours and minutes.
     *  Fields are preselected with :
     *              - set_time date (must be a local PHP server timestamp or string date with format 'YYYY-MM-DD' or 'YYYY-MM-DD HH:MM')
     *              - local date in user area, if set_time is '' (so if set_time is '', output may differs when done from two different location)
     *              - Empty (fields empty), if set_time is -1 (in this case, parameter empty must also have value 1)
     *
     * @param integer|string 		$set_time 		Pre-selected date (must be a local PHP server timestamp), -1 to keep date not preselected, '' to use current date with 00:00 hour (Parameter 'empty' must be 0 or 2).
     * @param string 				$prefix 		Prefix for fields name
     * @param int 					$h 				1 or 2=Show also hours (2=hours on a new line), -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 or 4 (4=hours on a new line)=Show hour always empty
     * @param int 					$m 				1=Show also minutes, -1 has same effect but hour and minutes are prefilled with 23:59 if date is empty, 3 show minutes always empty
     * @param int 					$empty 			0=Fields required, 1=Empty inputs are allowed, 2=Empty inputs are allowed for hours only
     * @param string 				$form_name 		Not used
     * @param int<0,1> 				$d 				1=Show days, month, years
     * @param int<0,2>				$addnowlink 	Add a link "Now", 1 with server time, 2 with local computer time
     * @param int<0,1> 				$disabled 		Disable input fields
     * @param int|string			$fullday 		When a checkbox with id #fullday is checked, hours are set with 00:00 (if value if 'fulldaystart') or 23:59 (if value is 'fulldayend')
     * @param string 				$addplusone 	Add a link "+1 hour". Value must be name of another selectDate field.
     * @param int|string|array<string,mixed>      $adddateof 		Add a link "Date of ..." using the following date. Must be array(array('adddateof' => ..., 'labeladddateof' => ...))
     * @param string 				$openinghours 	Specify hour start and hour end for the select ex 8,20
     * @param int 					$stepminutes 	Specify step for minutes between 1 and 30
     * @param string 				$labeladddateof Label to use for the $adddateof parameter. Deprecated. Used only when $adddateof is not an array.
     * @param string 				$placeholder 	Placeholder
     * @param 'auto'|'gmt'|'tzserver'|'tzuserrel'	$gm 	'auto' (for backward compatibility, avoid this), 'gmt' or 'tzserver' or 'tzuserrel'
     * @param string				$calendarpicto 	URL of the icon/image used to display the calendar
     * @return string               	         	Html for selectDate
     * @see    form_date(), select_month(), select_year(), select_dayofweek()
     */
    public function selectDate($set_time = '', $prefix = 're', $h = 0, $m = 0, $empty = 0, $form_name = "", $d = 1, $addnowlink = 0, $disabled = 0, $fullday = '', $addplusone = '', $adddateof = '', $openinghours = '', $stepminutes = 1, $labeladddateof = '', $placeholder = '', $gm = 'auto', $calendarpicto = '')
    {
    }
    /**
     * selectTypeDuration
     *
     * @param string $prefix Prefix
     * @param string $selected Selected duration type
     * @param string[] $excludetypes Array of duration types to exclude. Example array('y', 'm')
     * @return  string                    HTML select string
     */
    public function selectTypeDuration($prefix, $selected = 'i', $excludetypes = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to show a form to select a duration on a page
     *
     * @param string $prefix Prefix for input fields
     * @param int|string $iSecond Default preselected duration (number of seconds or '')
     * @param int $disabled Disable the combo box
     * @param string $typehour If 'select' then input hour and input min is a combo,
     *                         If 'text' input hour is in text and input min is a text,
     *                         If 'textselect' input hour is in text and input min is a combo
     * @param integer $minunderhours If 1, show minutes selection under the hours
     * @param int<0,1> $nooutput Do not output html string but return it
     * @return    string                        HTML component
     */
    public function select_duration($prefix, $iSecond = '', $disabled = 0, $typehour = 'select', $minunderhours = 0, $nooutput = 0)
    {
    }
    /**
     *  Return list of tickets in Ajax if Ajax activated or go to selectTicketsList
     *
     * @param	string		$selected		Preselected tickets
     * @param	string		$htmlname		Name of HTML select field (must be unique in page).
     * @param	string		$filtertype		To add a filter
     * @param	int			$limit			Limit on number of returned lines
     * @param	int			$status			Ticket status
     * @param	string		$selected_input_value Value of preselected input text (for use with ajax)
     * @param	int<0,3>	$hidelabel		Hide label (0=no, 1=yes, 2=show search icon (before) and placeholder, 3 search icon after)
     * @param	array<string,string|string[]>	$ajaxoptions	Options for ajax_autocompleter
     * @param	int			$socid Thirdparty Id (to get also price dedicated to this customer)
     * @param	string|int<0,1>	$showempty	'' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param	int<0,1>	$forcecombo	Force to use combo box
     * @param	string		$morecss		Add more css on select
     * @param	array<string,string>	$selected_combinations	Selected combinations. Format: array([attrid] => attrval, [...])
     * @param	int<0,1>	$nooutput		No print, return the output into a string
     * @return	string
     */
    public function selectTickets($selected = '', $htmlname = 'ticketid', $filtertype = '', $limit = 0, $status = 1, $selected_input_value = '', $hidelabel = 0, $ajaxoptions = array(), $socid = 0, $showempty = '1', $forcecombo = 0, $morecss = '', $selected_combinations = \null, $nooutput = 0)
    {
    }
    /**
     * Return list of tickets.
     *  Called by selectTickets.
     *
     * @param	string		$selected		Preselected ticket
     * @param	string		$htmlname		Name of select html
     * @param	string		$filtertype		Filter on ticket type
     * @param	int			$limit Limit on number of returned lines
     * @param	string		$filterkey		Filter on ticket ref or subject
     * @param	int			$status			Ticket status
     * @param	int			$outputmode		0=HTML select string, 1=Array
     * @param	string|int<0,1> $showempty	'' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param int $forcecombo Force to use combo box
     * @param	string $morecss Add more css on select
     * @return	array<array{key:string,value:mixed,type:int}>|string	Array of keys for json or HTML component
     */
    public function selectTicketsList($selected = '', $htmlname = 'ticketid', $filtertype = '', $limit = 20, $filterkey = '', $status = 1, $outputmode = 0, $showempty = '1', $forcecombo = 0, $morecss = '')
    {
    }
    /**
     * constructTicketListOption.
     * This define value for &$opt and &$optJson.
     *
     * @param object 	$objp 		Result set of fetch
     * @param string 	$opt 		Option (var used for returned value in string option format)
     * @param array{key?:string,value?:mixed,type?:int} 	$optJson 	Option (var used for returned value in json format)
     * @param string 	$selected 	Preselected value
     * @param string 	$filterkey 	Filter key to highlight
     * @return    void
     */
    protected function constructTicketListOption(&$objp, &$opt, &$optJson, $selected, $filterkey = '')
    {
    }
    /**
     *  Return list of projects in Ajax if Ajax activated or go to selectTicketsList
     *
     * @param 	string 		$selected 				Preselected tickets
     * @param 	string 		$htmlname 				Name of HTML select field (must be unique in page).
     * @param 	string 		$filtertype				To add a filter
     * @param 	int 		$limit 					Limit on number of returned lines
     * @param 	int 		$status 				Not used
     * @param 	string 		$selected_input_value 	Value of preselected input text (for use with ajax)
     * @param 	int<0,3>	$hidelabel 				Hide label (0=no, 1=yes, 2=show search icon (before) and placeholder, 3 search icon after)
     * @param 	array<string,string|string[]>		$ajaxoptions 			Options for ajax_autocompleter
     * @param 	int 		$socid 					Thirdparty Id (to get also price dedicated to this customer)
     * @param 	string|int<0,1>	$showempty 			'' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param 	int<0,1> 	$forcecombo 			Force to use combo box
     * @param 	string 		$morecss 				Add more css on select
     * @param 	array<string,string> $selected_combinations 	Selected combinations. Format: array([attrid] => attrval, [...])
     * @param 	int<0,1>	$nooutput 				No print, return the output into a string
     * @return 	string
     */
    public function selectProjects($selected = '', $htmlname = 'projectid', $filtertype = '', $limit = 0, $status = 1, $selected_input_value = '', $hidelabel = 0, $ajaxoptions = array(), $socid = 0, $showempty = '1', $forcecombo = 0, $morecss = '', $selected_combinations = \null, $nooutput = 0)
    {
    }
    /**
     *  Return list of projects.
     *  Called by selectProjects.
     *
     * @param 	string 		$selected 		Preselected project
     * @param 	string 		$htmlname 		Name of select html
     * @param 	string 		$filtertype 	Filter on project type
     * @param 	int 		$limit 			Limit on number of returned lines
     * @param 	string 		$filterkey	 	Filter on project ref or subject
     * @param 	int 		$status 		Not used
     * @param 	int 		$outputmode 	0=HTML select string, 1=Array
     * @param 	string|int<0,1> $showempty '' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param 	int 		$forcecombo 	Force to use combo box
     * @param 	string 		$morecss 		Add more css on select
     * @return  mixed[]|string              Array of keys for json or HTML component
     */
    public function selectProjectsList($selected = '', $htmlname = 'projectid', $filtertype = '', $limit = 20, $filterkey = '', $status = 1, $outputmode = 0, $showempty = '1', $forcecombo = 0, $morecss = '')
    {
    }
    /**
     * constructProjectListOption.
     * This define value for &$opt and &$optJson.
     *
     * @param stdClass 	$objp 		Result set of fetch
     * @param string 	$opt 		Option (var used for returned value in string option format)
     * @param array{key:string,value:string,type:string}	$optJson 	Option (var used for returned value in json format)
     * @param string 	$selected 	Preselected value
     * @param string 	$filterkey 	Filter key to highlight
     * @return    void
     */
    protected function constructProjectListOption(&$objp, &$opt, &$optJson, $selected, $filterkey = '')
    {
    }
    /**
     *  Return list of members in Ajax if Ajax activated or go to selectTicketsList
     *
     * @param string $selected Preselected tickets
     * @param string $htmlname Name of HTML select field (must be unique in page).
     * @param string $filtertype To add a filter
     * @param int $limit Limit on number of returned lines
     * @param int $status Ticket status
     * @param string $selected_input_value Value of preselected input text (for use with ajax)
     * @param int<0,3> $hidelabel Hide label (0=no, 1=yes, 2=show search icon before and placeholder, 3 search icon after)
     * @param array<string,string|string[]> $ajaxoptions Options for ajax_autocompleter
     * @param int $socid Thirdparty Id (to get also price dedicated to this customer)
     * @param string|int<0,1> $showempty '' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param int $forcecombo Force to use combo box
     * @param string $morecss Add more css on select
     * @param array<string,string> $selected_combinations Selected combinations. Format: array([attrid] => attrval, [...])
     * @param int<0,1>	$nooutput No print, return the output into a string
     * @return        string
     */
    public function selectMembers($selected = '', $htmlname = 'adherentid', $filtertype = '', $limit = 0, $status = 1, $selected_input_value = '', $hidelabel = 0, $ajaxoptions = array(), $socid = 0, $showempty = '1', $forcecombo = 0, $morecss = '', $selected_combinations = \null, $nooutput = 0)
    {
    }
    /**
     *    Return list of adherents.
     *  Called by selectMembers.
     *
     * @param string $selected Preselected adherent
     * @param string $htmlname Name of select html
     * @param string $filtertype Filter on adherent type
     * @param int $limit Limit on number of returned lines
     * @param string $filterkey Filter on member status
     * @param int $status Member status
     * @param int $outputmode 0=HTML select string, 1=Array
     * @param string|int<0,1> $showempty '' to not show empty line. Translation key to show an empty line. '1' show empty line with no text.
     * @param int $forcecombo Force to use combo box
     * @param string $morecss Add more css on select
     * @return mixed[]|string      Array of keys for json or HTML string component
     */
    public function selectMembersList($selected = '', $htmlname = 'adherentid', $filtertype = '', $limit = 20, $filterkey = '', $status = 1, $outputmode = 0, $showempty = '1', $forcecombo = 0, $morecss = '')
    {
    }
    /**
     * constructMemberListOption.
     * This define value for &$opt and &$optJson.
     *
     * @param object 	$objp 			Result set of fetch
     * @param string 	$opt 			Option (var used for returned value in string option format)
     * @param array{key?:string,value?:mixed,type?:int} 	$optJson 		Option (var used for returned value in json format)
     * @param string 	$selected 		Preselected value
     * @param string 	$filterkey 		Filter key to highlight
     * @return    void
     */
    protected function constructMemberListOption(&$objp, &$opt, &$optJson, $selected, $filterkey = '')
    {
    }
    /**
     * Generic method to select a component from a combo list.
     * Can use autocomplete with ajax after x key pressed or a full combo, depending on setup.
     * This is the generic method that will replace all specific existing methods.
     *
     * @param	string		$objectdesc           	'ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]'. For hard coded custom needs. Try to prefer method using $objectfield instead of $objectdesc.
     * @param	string		$htmlname             	Name of HTML select component
     * @param 	int			$preSelectedValue     	Preselected value (ID of element)
     * @param 	string|int<0,1> $showempty			''=empty values not allowed, 'string'=value show if we allow empty values (for example 'All', ...)
     * @param 	string		$searchkey            	Search criteria
     * @param	string		$placeholder          	Place holder
     * @param	string		$morecss              	More CSS
     * @param	string		$moreparams           	More params provided to ajax call
     * @param 	int			$forcecombo           	Force to load all values and output a standard combobox (with no beautification)
     * @param 	int<0,1>	$disabled             	1=Html component is disabled
     * @param	string		$selected_input_value 	Value of preselected input text (for use with ajax)
     * @param	string		$objectfield          	Object:Field that contains the definition of parent (in table $fields or $extrafields). Example: 'Object:xxx' or 'Object@module:xxx' (old syntax 'Module_Object:xxx') or 'Object:options_xxx' or 'Object@module:options_xxx' (old syntax 'Module_Object:options_xxx')
     * @return  string	    						Return HTML string
     * @see selectForFormsList(), select_thirdparty_list()
     */
    public function selectForForms($objectdesc, $htmlname, $preSelectedValue, $showempty = '', $searchkey = '', $placeholder = '', $morecss = '', $moreparams = '', $forcecombo = 0, $disabled = 0, $selected_input_value = '', $objectfield = '')
    {
    }
    /**
     * Output html form to select an object.
     * Note, this function is called by selectForForms or by ajax selectobject.php
     *
     * @param Object 		$objecttmp 			Object to know the table to scan for combo.
     * @param string 		$htmlname 			Name of HTML select component
     * @param int 			$preselectedvalue 	Preselected value (ID of element)
     * @param string|int<0,1>	$showempty 		''=empty values not allowed, 'string'=value show if we allow empty values (for example 'All', ...)
     * @param string 		$searchkey 			Search value
     * @param string 		$placeholder 		Place holder
     * @param string 		$morecss 			More CSS
     * @param string 		$moreparams 		More params provided to ajax call
     * @param int 			$forcecombo 		Force to load all values and output a standard combobox (with no beautification)
     * @param int 			$outputmode 		0=HTML select string, 1=Array
     * @param int 			$disabled 			1=Html component is disabled
     * @param string 		$sortfield 			Sort field
     * @param string 		$filter 			Add more filter (Universal Search Filter)
     * @return string|array<array{key:string,value:mixed,label:string}> Return HTML string
     * @see selectForForms()
     */
    public function selectForFormsList($objecttmp, $htmlname, $preselectedvalue, $showempty = '', $searchkey = '', $placeholder = '', $morecss = '', $moreparams = '', $forcecombo = 0, $outputmode = 0, $disabled = 0, $sortfield = '', $filter = '')
    {
    }
    /**
     *	Return a HTML select string, built from an array of key+value.
     *  Note: Do not apply langs->trans function on returned content, content may be entity encoded twice.
     *
     * @param string 				$htmlname 			Name of html select area. Try to start name with "multi" or "search_multi" if this is a multiselect
     * @param array<int|string,array{label:string,data-html:string,disable?:int<0,1>,css?:string}>|string[]	$array 	Array like array(key => value) or array(key=>array('label'=>..., 'data-...'=>..., 'disabled'=>..., 'css'=>...))
     * @param string|string[]|int 	$id					Preselected key or array of preselected keys for multiselect. Use 'ifone' to autoselect record if there is only one record.
     * @param int<0,1>|string 		$show_empty 		0 no empty value allowed, 1 or string to add an empty value into list (If 1: key is -1 and value is '' or '&nbsp;', If 'Placeholder string': key is -1 and value is the string), <0 to add an empty value with key that is this value.
     * @param int<0,1>				$key_in_label 		1 to show key into label with format "[key] value"
     * @param int<0,1>				$value_as_key 		1 to use value as key
     * @param string 				$moreparam 			Add more parameters onto the select tag. For example 'style="width: 95%"' to avoid select2 component to go over parent container
     * @param int<0,1>				$translate 			1=Translate and encode value
     * @param int 					$maxlen 			Length maximum for labels
     * @param int<0,1>				$disabled 			Html select box is disabled
     * @param string 				$sort 				'ASC' or 'DESC' = Sort on label, '' or 'NONE' or 'POS' = Do not sort, we keep original order
     * @param string 				$morecss 			Add more class to css styles
     * @param int 					$addjscombo 		Add js combo
     * @param string 				$moreparamonempty 	Add more param on the empty option line. Not used if show_empty not set
     * @param int 					$disablebademail 	1=Check if a not valid email, 2=Check string '---', and if found into value, disable and colorize entry
     * @param int 					$nohtmlescape 		No html escaping (not recommended, use 'data-html' if you need to use label with HTML content).
     * @return string									HTML select string.
     * @see multiselectarray(), selectArrayAjax(), selectArrayFilter()
     */
    public static function selectarray($htmlname, $array, $id = '', $show_empty = 0, $key_in_label = 0, $value_as_key = 0, $moreparam = '', $translate = 0, $maxlen = 0, $disabled = 0, $sort = '', $morecss = 'minwidth75', $addjscombo = 1, $moreparamonempty = '', $disablebademail = 0, $nohtmlescape = 0)
    {
    }
    /**
     * Return a HTML select string, built from an array of key+value, but content returned into select come from an Ajax call of an URL.
     * Note: Do not apply langs->trans function on returned content of Ajax service, content may be entity encoded twice.
     *
     * @param 	string 		$htmlname 			Name of html select area
     * @param 	string 		$url 				Url. Must return a json_encode of array(key=>array('text'=>'A text', 'url'=>'An url'), ...)
     * @param 	string 		$id 				Preselected key
     * @param 	string 		$moreparam 			Add more parameters onto the select tag
     * @param 	string 		$moreparamtourl 	Add more parameters onto the Ajax called URL
     * @param 	int 		$disabled 			Html select box is disabled
     * @param 	int 		$minimumInputLength Minimum Input Length
     * @param 	string 		$morecss 			Add more class to css styles
     * @param 	int 		$callurlonselect 	If set to 1, some code is added so an url return by the ajax is called when value is selected.
     * @param 	string 		$placeholder 		String to use as placeholder
     * @param 	integer 	$acceptdelayedhtml 	1 = caller is requesting to have html js content not returned but saved into global $delayedhtmlcontent (so caller can show it at end of page to avoid flash FOUC effect)
     * @return  string                      	HTML select string
     * @see selectArrayFilter(), ajax_combobox() in ajax.lib.php
     */
    public static function selectArrayAjax($htmlname, $url, $id = '', $moreparam = '', $moreparamtourl = '', $disabled = 0, $minimumInputLength = 1, $morecss = '', $callurlonselect = 0, $placeholder = '', $acceptdelayedhtml = 0)
    {
    }
    /**
     *  Return a HTML select string, built from an array of key+value, but content returned into select is defined into $array parameter.
     *  Note: Do not apply langs->trans function on returned content of Ajax service, content may be entity encoded twice.
     *
     * @param string 	$htmlname 				Name of html select area
     * @param array<string,array{text:string,url:string}> 	$array 	Array (key=>array('text'=>'A text', 'url'=>'An url'), ...)
     * @param string 	$id 					Preselected key
     * @param string 	$moreparam 				Add more parameters onto the select tag
     * @param int<0,1>	$disableFiltering 		If set to 1, results are not filtered with searched string
     * @param int<0,1>	$disabled 				Html select box is disabled
     * @param int 		$minimumInputLength 	Minimum Input Length
     * @param string 	$morecss 				Add more class to css styles
     * @param int<0,1>	$callurlonselect 		If set to 1, some code is added so an url return by the ajax is called when value is selected.
     * @param string 	$placeholder 			String to use as placeholder
     * @param int<0,1> 	$acceptdelayedhtml 		1 = caller is requesting to have html js content not returned but saved into global $delayedhtmlcontent (so caller can show it at end of page to avoid flash FOUC effect)
     * @param string	$textfortitle			Text to show on title.
     * @return	string      					HTML select string
     * @see selectArrayAjax(), ajax_combobox() in ajax.lib.php
     */
    public static function selectArrayFilter($htmlname, $array, $id = '', $moreparam = '', $disableFiltering = 0, $disabled = 0, $minimumInputLength = 1, $morecss = '', $callurlonselect = 0, $placeholder = '', $acceptdelayedhtml = 0, $textfortitle = '')
    {
    }
    /**
     * Show a multiselect form from an array. WARNING: Use this only for short lists.
     *
     * @param 	string 		$htmlname 		Name of select
     * @param 	array<string,string|array{id:string,label:string,color:string,picto:string,labelhtml:string}>	$array 			Array(key=>value) or Array(key=>array('id'=>key, 'label'=>value, 'color'=> , 'picto'=> , 'labelhtml'=> ))
     * @param 	string[]	$selected 		Array of keys preselected
     * @param 	int<0,1>	$key_in_label 	1 to show key like in "[key] value"
     * @param 	int<0,1>	$value_as_key 	1 to use value as key
     * @param 	string 		$morecss 		Add more css style
     * @param 	int<0,1> 	$translate 		Translate and encode value
     * @param 	int|string 	$width 			Force width of select box. May be used only when using jquery couch. Example: 250, '95%'
     * @param 	string 		$moreattrib 	Add more options on select component. Example: 'disabled'
     * @param 	string 		$elemtype 		Type of element we show ('category', ...). Will execute a formatting function on it. To use in readonly mode if js component support HTML formatting.
     * @param 	string 		$placeholder 	String to use as placeholder
     * @param 	int<-1,1> 	$addjscombo 	Add js combo
     * @return 	string                      HTML multiselect string
     * @see selectarray(), selectArrayAjax(), selectArrayFilter()
     */
    public static function multiselectarray($htmlname, $array, $selected = array(), $key_in_label = 0, $value_as_key = 0, $morecss = '', $translate = 0, $width = 0, $moreattrib = '', $elemtype = '', $placeholder = '', $addjscombo = -1)
    {
    }
    /**
     * Show a multiselect dropbox from an array.
     * If a saved selection of fields exists for user (into $user->conf->MAIN_SELECTEDFIELDS_contextofpage), we use this one instead of default.
     *
     * @param string 	$htmlname 	Name of HTML field
     * @param array<string,array{label:string,checked:string,enabled?:string,type?:string,langfile?:string}> 	$array 	Array with array of fields we could show. This array may be modified according to setup of user.
     * @param string 	$varpage 	Id of context for page. Can be set by caller with $varpage=(empty($contextpage)?$_SERVER["PHP_SELF"]:$contextpage);
     * @param string 	$pos 		Position colon on liste value 'left' or '' (meaning 'right').
     * @return string            	HTML multiselect string
     * @see selectarray()
     */
    public static function multiSelectArrayWithCheckbox($htmlname, &$array, $varpage, $pos = '')
    {
    }
    /**
     * Render list of categories linked to object with id $id and type $type
     *
     * @param int 		$id 		Id of object
     * @param string 	$type 		Type of category ('member', 'customer', 'supplier', 'product', 'contact'). Old mode (0, 1, 2, ...) is deprecated.
     * @param int<0,1>	$rendermode 0=Default, use multiselect (deprecated). 1=Emulate multiselect (recommended)
     * @param int<0,1> 	$nolink 	1=Do not add html links
     * @return string               String with categories
     */
    public function showCategories($id, $type, $rendermode = 0, $nolink = 0)
    {
    }
    /**
     *  Show linked object block.
     *
     * @param 	CommonObject 		$object 						Object we want to show links to
     * @param 	string 				$morehtmlright 					More html to show on right of title
     * @param 	array<int,string>	$compatibleImportElementsList 	Array of compatibles elements object for "import from" action
     * @param 	string 				$title 							Title
     * @return  int                                             	Return Number of different types
     */
    public function showLinkedObjectBlock($object, $morehtmlright = '', $compatibleImportElementsList = array(), $title = 'RelatedObjects')
    {
    }
    /**
     *  Show block with links "to link to" other objects.
     *
     * @param 	CommonObject 	$object 			Object we want to show links to
     * @param 	string[]|null	$restrictlinksto 	Restrict links to some elements, for example array('order') or array('supplier_order'). null or array() if no restriction.
     * @param 	string[]|null	$excludelinksto 	Do not show links of this type, for example array('order') or array('supplier_order'). null or array() if no exclusion.
     * @param	int<0,1>		$nooutput			1=Return array with content instead of printing it.
     * @return  array{linktoelem:string,htmltoenteralink:string}|string                              HTML block
     */
    public function showLinkToObjectBlock($object, $restrictlinksto = array(), $excludelinksto = array(), $nooutput = 0)
    {
    }
    /**
     *    Return an html string with a select combo box to choose yes or no
     *
     * @param string 		$htmlname 		Name of html select field
     * @param string|int 	$value 			Pre-selected value
     * @param int 			$option 		0 return yes/no, 1 return 1/0
     * @param bool 			$disabled 		true or false
     * @param int 			$useempty 		1=Add empty line
     * @param int 			$addjscombo 	1=Add js beautifier on combo box
     * @param string 		$morecss 		More CSS
     * @param string 		$labelyes 		Label for Yes
     * @param string 		$labelno 		Label for No
     * @return	string                      See option
     */
    public function selectyesno($htmlname, $value = '', $option = 0, $disabled = \false, $useempty = 0, $addjscombo = 0, $morecss = 'width75', $labelyes = 'Yes', $labelno = 'No')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of export templates
     *
     * @param string $selected Id modele pre-selectionne
     * @param string $htmlname Name of HTML select
     * @param string $type Type of searched templates
     * @param int $useempty Affiche valeur vide dans liste
     * @return    void
     */
    public function select_export_model($selected = '', $htmlname = 'exportmodelid', $type = '', $useempty = 0)
    {
    }
    /**
     * Return a HTML area with the reference of object and a navigation bar for a business object
     * Note: To complete search with a particular filter on select, you can set $object->next_prev_filter set to define SQL criteria.
     *
     * @param CommonObject	$object 		Object to show.
     * @param string 	$paramid 		Name of parameter to use to name the id into the URL next/previous link.
     * @param string 	$morehtml 		More html content to output just before the nav bar.
     * @param int<0,1>	$shownav 		Show Condition (navigation is shown if value is 1).
     * @param string 	$fieldid 		Name of field id into database to use for select next and previous (we make the select max and min on this field compared to $object->ref). Use 'none' to disable next/prev.
     * @param string 	$fieldref 		Name of field ref of object (object->ref) to show or 'none' to not show ref.
     * @param string 	$morehtmlref 	More html to show after ref.
     * @param string 	$moreparam 		More param to add in nav link url. Must start with '&...'.
     * @param int<0,1>	$nodbprefix 	Do not include DB prefix to forge table name.
     * @param string 	$morehtmlleft 	More html code to show before ref.
     * @param string 	$morehtmlstatus More html code to show under navigation arrows (status place).
     * @param string 	$morehtmlright 	More html code to show after ref.
     * @return string                   Portion HTML with ref + navigation buttons
     */
    public function showrefnav($object, $paramid, $morehtml = '', $shownav = 1, $fieldid = 'rowid', $fieldref = 'ref', $morehtmlref = '', $moreparam = '', $nodbprefix = 0, $morehtmlleft = '', $morehtmlstatus = '', $morehtmlright = '')
    {
    }
    /**
     *  Return HTML code to output a barcode
     *
     * @param CommonObject $object Object containing data to retrieve file name
     * @param int $width Width of photo
     * @param string $morecss More CSS on img of barcode
     * @return string                    HTML code to output barcode
     */
    public function showbarcode(&$object, $width = 100, $morecss = '')
    {
    }
    /**
     * Return HTML code to output a photo
     *
     * @param string 	$modulepart 				Key to define module concerned ('societe', 'userphoto', 'memberphoto')
     * @param Societe|Adherent|Contact|User|CommonObject	$object	Object containing data to retrieve file name
     * @param int 		$width 						Width of photo
     * @param int 		$height 					Height of photo (auto if 0)
     * @param int<0,1>	$caneditfield 				Add edit fields
     * @param string 	$cssclass 					CSS name to use on img for photo
     * @param string 	$imagesize 					'mini', 'small' or '' (original)
     * @param int<0,1>	$addlinktofullsize 			Add link to fullsize image
     * @param int<0,1>	$cache 						1=Accept to use image in cache
     * @param string 	$forcecapture 				'', 'user' or 'environment'. Force parameter capture on HTML input file element to ask a smartphone to allow to open camera to take photo. Auto if ''.
     * @param int<0,1>	$noexternsourceoverwrite 	No overwrite image with extern source (like 'gravatar' or other module)
     * @return string                            	HTML code to output photo
     * @see getImagePublicURLOfObject()
     */
    public static function showphoto($modulepart, $object, $width = 100, $height = 0, $caneditfield = 0, $cssclass = 'photowithmargin', $imagesize = '', $addlinktofullsize = 1, $cache = 0, $forcecapture = '', $noexternsourceoverwrite = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return select list of user groups
     *
     * @param int|object|object[] 	$selected 		Id group or group(s) preselected
     * @param string 				$htmlname 		Field name in form
     * @param int<0,1> 				$show_empty 	0=liste sans valeur nulle, 1=ajoute valeur inconnue
     * @param string|int[] 			$exclude 		Array list of groups id to exclude
     * @param int<0,1> 				$disabled 		If select list must be disabled
     * @param string|int[] 			$include 		Array list of groups id to include
     * @param int[] 				$enableonly 	Array list of groups id to be enabled. All other must be disabled
     * @param string 				$force_entity 	'0' or Ids of environment to force
     * @param bool 					$multiple 		add [] in the name of element and add 'multiple' attribute (not working with ajax_autocompleter)
     * @param string 				$morecss 		More css to add to html component
     * @return	string								HTML Componont to select a group
     * @see select_dolusers()
     */
    public function select_dolgroups($selected = 0, $htmlname = 'groupid', $show_empty = 0, $exclude = '', $disabled = 0, $include = '', $enableonly = array(), $force_entity = '0', $multiple = \false, $morecss = 'minwidth200')
    {
    }
    /**
     *    Return HTML to show the search and clear search button
     *
     * @param string $pos Position of colon on the list. Value 'left' or 'right'
     * @return    string
     */
    public function showFilterButtons($pos = '')
    {
    }
    /**
     *    Return HTML to show the search and clear search button
     *
     * @param string $cssclass CSS class
     * @param int $calljsfunction 0=default. 1=call function initCheckForSelect() after changing status of checkboxes
     * @param string $massactionname Mass action button name that will launch an action on the selected items
     * @return    string
     */
    public function showCheckAddButtons($cssclass = 'checkforaction', $calljsfunction = 0, $massactionname = "massaction")
    {
    }
    /**
     *    Return HTML to show the search and clear search button
     *
     * @param int $addcheckuncheckall Add the check all/uncheck all checkbox (use javascript) and code to manage this
     * @param string $cssclass CSS class
     * @param int $calljsfunction 0=default. 1=call function initCheckForSelect() after changing status of checkboxes
     * @param string $massactionname Mass action name
     * @return    string
     */
    public function showFilterAndCheckAddButtons($addcheckuncheckall = 0, $cssclass = 'checkforaction', $calljsfunction = 0, $massactionname = "massaction")
    {
    }
    /**
     * Return HTML to show the select of expense categories
     *
     * @param string 	$selected 		preselected category
     * @param string 	$htmlname 		name of HTML select list
     * @param int<0,1>	$useempty 		1=Add empty line
     * @param int[] 	$excludeid 		id to exclude
     * @param string 	$target 		htmlname of target select to bind event
     * @param int 		$default_selected default category to select if fk_c_type_fees change = EX_KME
     * @param array<string,int|string>	$params	param to give
     * @param int<0,1>	$info_admin 	Show the tooltip help picto to setup list
     * @return    string
     */
    public function selectExpenseCategories($selected = '', $htmlname = 'fk_c_exp_tax_cat', $useempty = 0, $excludeid = array(), $target = '', $default_selected = 0, $params = array(), $info_admin = 1)
    {
    }
    /**
     * Return HTML to show the select ranges of expense range
     *
     * @param string $selected preselected category
     * @param string $htmlname name of HTML select list
     * @param integer $useempty 1=Add empty line
     * @return    string
     */
    public function selectExpenseRanges($selected = '', $htmlname = 'fk_range', $useempty = 0)
    {
    }
    /**
     * Return HTML to show a select of expense
     *
     * @param string $selected preselected category
     * @param string $htmlname name of HTML select list
     * @param integer $useempty 1=Add empty choice
     * @param integer $allchoice 1=Add all choice
     * @param integer $useid 0=use 'code' as key, 1=use 'id' as key
     * @return    string
     */
    public function selectExpense($selected = '', $htmlname = 'fk_c_type_fees', $useempty = 0, $allchoice = 1, $useid = 0)
    {
    }
    /**
     *  Output a combo list with invoices qualified for a third party
     *
     * @param int $socid Id third party (-1=all, 0=only projects not linked to a third party, id=projects not linked or linked to third party id)
     * @param string $selected Id invoice preselected
     * @param string $htmlname Name of HTML select
     * @param int $maxlength Maximum length of label
     * @param int $option_only Return only html options lines without the select tag
     * @param string $show_empty Add an empty line ('1' or string to show for empty line)
     * @param int $discard_closed Discard closed projects (0=Keep,1=hide completely,2=Disable)
     * @param int $forcefocus Force focus on field (works with javascript only)
     * @param int $disabled Disabled
     * @param string $morecss More css added to the select component
     * @param string $projectsListId ''=Automatic filter on project allowed. List of id=Filter on project ids.
     * @param string $showproject 'all' = Show project info, ''=Hide project info
     * @param User $usertofilter User object to use for filtering
     * @return string            HTML Select Invoice
     */
    public function selectInvoice($socid = -1, $selected = '', $htmlname = 'invoiceid', $maxlength = 24, $option_only = 0, $show_empty = '1', $discard_closed = 0, $forcefocus = 0, $disabled = 0, $morecss = 'maxwidth500', $projectsListId = '', $showproject = 'all', $usertofilter = \null)
    {
    }
    /**
     *  Output a combo list with invoices qualified for a third party
     *
     * @param string $selected Id invoice preselected
     * @param string $htmlname Name of HTML select
     * @param int $maxlength Maximum length of label
     * @param int $option_only Return only html options lines without the select tag
     * @param string $show_empty Add an empty line ('1' or string to show for empty line)
     * @param int $forcefocus Force focus on field (works with javascript only)
     * @param int $disabled Disabled
     * @param string $morecss More css added to the select component
     * @return int                    Nbr of project if OK, <0 if KO
     */
    public function selectInvoiceRec($selected = '', $htmlname = 'facrecid', $maxlength = 24, $option_only = 0, $show_empty = '1', $forcefocus = 0, $disabled = 0, $morecss = 'maxwidth500')
    {
    }
    /**
     * Output the component to make advanced search criteries
     *
     * @param 	array<array<string,array{type:string}>>	$arrayofcriterias 					Array of available search criteria. Example: array($object->element => $object->fields, 'otherfamily' => otherarrayoffields, ...)
     * @param 	array<int,string> 						$search_component_params 			Array of selected search criteria
     * @param 	string[] 								$arrayofinputfieldsalreadyoutput 	Array of input fields already inform. The component will not generate a hidden input field if it is in this list.
     * @param 	string 									$search_component_params_hidden 	String with $search_component_params criteria
     * @param 	array<string,array{type:string}> 		$arrayoffiltercriterias 			Array of available filter criteria for an object and linked objects
     * @return	string                                    									HTML component for advanced search
     */
    public function searchComponent($arrayofcriterias, $search_component_params, $arrayofinputfieldsalreadyoutput = array(), $search_component_params_hidden = '', $arrayoffiltercriterias = array())
    {
    }
    /**
     * selectModelMail
     *
     * @param	string		$prefix			Prefix
     * @param	string		$modelType		Model type
     * @param	int<0,1>	$default		1=Show also Default mail template
     * @param	int<0,1>	$addjscombo		Add js combobox
     * @param   string      $selected       Selected model mail
     * @return	string						HTML select string
     */
    public function selectModelMail($prefix, $modelType = '', $default = 0, $addjscombo = 0, $selected = '')
    {
    }
    /**
     * Output the buttons to submit a creation/edit form
     *
     * @param 	string 	$save_label 		Alternative label for save button
     * @param 	string 	$cancel_label 		Alternative label for cancel button
     * @param 	array<array{addclass?:string,name?:string,label_key?:string}> $morebuttons 		Add additional buttons between save and cancel
     * @param 	bool 	$withoutdiv 		Option to remove enclosing centered div
     * @param 	string 	$morecss 			More CSS
     * @param 	string 	$dol_openinpopup 	If the button are shown in a context of a page shown inside a popup, we put here the string name of popup.
     * @return  string                      Html code with the buttons
     */
    public function buttonsSaveCancel($save_label = 'Save', $cancel_label = 'Cancel', $morebuttons = array(), $withoutdiv = \false, $morecss = '', $dol_openinpopup = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load into cache list of invoice subtypes
     *
     * @return int             Nb of lines loaded, <0 if KO
     */
    public function load_cache_invoice_subtype()
    {
    }
    /**
     * Return list of invoice subtypes.
     *
     * @param int		$selected     	Id of invoice subtype to preselect by default
     * @param string		$htmlname     	Select field name
     * @param int<0,1>	$addempty     	Add an empty entry
     * @param int<0,1>	$noinfoadmin  	0=Add admin info, 1=Disable admin info
     * @param string $morecss       	Add more CSS on select tag
     * @return string  				String for the HTML select component
     */
    public function getSelectInvoiceSubtype($selected = 0, $htmlname = 'subtypeid', $addempty = 0, $noinfoadmin = 0, $morecss = '')
    {
    }
}