<?php

/* Copyright (C) 2007-2010 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2007-2015 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2012      Christophe Battarel  <christophe.battarel@altairis.fr>
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
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/ajax.lib.php
 *  \brief		Page called to enhance interface with Javascript and Ajax features.
 */
/**
 * Generic function that return javascript to add to a page to transform a common input field into an autocomplete field by calling an Ajax page (ex: /societe/ajax/ajaxcompanies.php).
 * The HTML field must be an input text with id=search_$htmlname.
 * This use the jQuery "autocomplete" function. If we want to use the select2, we must also convert the input into select on funcntions that call this method.
 *
 * @param string	$selected 			Preselected value
 * @param string	$htmlname 			HTML name of input field
 * @param string	$url 				Ajax Url to call for request: /path/page.php. Must return a json array ('key'=>id, 'value'=>String shown into input field once selected, 'label'=>String shown into combo list)
 * @param string	$urloption			More parameters on URL request
 * @param int		$minLength			Minimum number of chars to trigger that Ajax search
 * @param int		$autoselect			Automatic selection if just one value (trigger("change") on field is done if search return only 1 result)
 * @param array		$ajaxoptions		Multiple options array
 *                                      - Ex: array('update'=>array('field1','field2'...)) will reset field1 and field2 once select done
 *                                      - Ex: array('disabled'=> )
 *                                      - Ex: array('show'=> )
 *                                      - Ex: array('update_textarea'=> )
 *                                      - Ex: array('option_disabled'=> id to disable and warning to show if we select a disabled value (this is possible when using autocomplete ajax)
 * @param string	$moreparams			More params provided to ajax call
 * @return string   					Script
 */
function ajax_autocompleter($selected, $htmlname, $url, $urloption = '', $minLength = 2, $autoselect = 0, $ajaxoptions = array(), $moreparams = '')
{
}
/**
 *	Generic function that return javascript to add to a page to transform a common input field into an autocomplete field by calling an Ajax page (ex: core/ajax/ziptown.php).
 *  The Ajax page can also returns several values (json format) to fill several input fields.
 *  The HTML field must be an input text with id=$htmlname.
 *  This use the jQuery "autocomplete" function.
 *
 *	@param	string	$htmlname           HTML name of input field
 *	@param	array	$fields				Array of key of fields to autocomplete
 *	@param	string	$url                URL for ajax request : /chemin/fichier.php
 *	@param	string	$option				More parameters on URL request
 *	@param	int		$minLength			Minimum number of chars to trigger that Ajax search
 *	@param	int		$autoselect			Automatic selection if just one value
 *	@return string              		Script
 */
function ajax_multiautocompleter($htmlname, $fields, $url, $option = '', $minLength = 2, $autoselect = 0)
{
}
/**
 *	Show an ajax dialog
 *
 *	@param	string	$title		Title of dialog box
 *	@param	string	$message	Message of dialog box
 *	@param	int		$w			Width of dialog box
 *	@param	int		$h			height of dialog box
 *	@return	string
 */
function ajax_dialog($title, $message, $w = 350, $h = 150)
{
}
/**
 * Convert a html select field into an ajax combobox.
 * Use ajax_combobox() only for small combo list! If not, use instead ajax_autocompleter().
 * TODO: It is used when COMPANY_USE_SEARCH_TO_SELECT and CONTACT_USE_SEARCH_TO_SELECT are set by html.formcompany.class.php. Should use ajax_autocompleter instead like done by html.form.class.php for select_produits.
 *
 * @param	string	$htmlname					Name of html select field ('myid' or '.myclass')
 * @param	array	$events						More events option. Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
 * @param  	int		$minLengthToAutocomplete	Minimum length of input string to start autocomplete
 * @param	int		$forcefocus					Force focus on field
 * @param	string	$widthTypeOfAutocomplete	'resolve' or 'off'
 * @param	string	$idforemptyvalue			'-1'
 * @param	string	$morecss					More css
 * @return	string								Return html string to convert a select field into a combo, or '' if feature has been disabled for some reason.
 * @see selectArrayAjax() of html.form.class
 */
function ajax_combobox($htmlname, $events = array(), $minLengthToAutocomplete = 0, $forcefocus = 0, $widthTypeOfAutocomplete = 'resolve', $idforemptyvalue = '-1', $morecss = '')
{
}
/**
 * Add event management script.
 *
 * @param	string	$htmlname					Name of html select field ('myid' or '.myclass')
 * @param	array	$events						Add some Ajax events option on change of $htmlname component to call ajax to autofill a HTML element (select#htmlname and #inputautocompletehtmlname)
 * 												Example: array(array('method'=>'getContacts', 'url'=>dol_buildpath('/core/ajax/contacts.php',1), 'htmlname'=>'contactid', 'params'=>array('add-customer-contact'=>'disabled')))
 * @return	string								Return JS string to manage event
 */
function ajax_event($htmlname, $events)
{
}
/**
 * 	On/off button for constant
 *
 * 	@param	string	$code					Name of constant
 * 	@param	array	$input					Array of complementary actions to do if success ("disabled"|"enabled'|'set'|'del') => CSS element to switch, 'alert' => message to show, ... Example: array('disabled'=>array(0=>'cssid'))
 * 	@param	int		$entity					Entity. Current entity is used if null.
 *  @param	int		$revertonoff			1=Revert on/off
 *  @param	int		$strict					Use only "disabled" with delConstant and "enabled" with setConstant
 *  @param	int		$forcereload			Force to reload page if we click/change value (this is supported only when there is no 'alert' option in input)
 *  @param	string	$marginleftonlyshort	1 = Add a short left margin on picto, 2 = Add a larger left margin on picto, 0 = No left margin.
 *  @param	int		$forcenoajax			1 = Force to use a ahref link instead of ajax code.
 *  @param	int		$setzeroinsteadofdel	1 = Set constantto '0' instead of deleting it
 *  @param	string	$suffix					Suffix to use on the name of the switch_on picto. Example: '', '_red'
 *  @param	string	$mode					Add parameter &mode= to the href link (Used for href link)
 *  @param	string	$morecss				More CSS
 * 	@return	string
 */
function ajax_constantonoff($code, $input = array(), $entity = \null, $revertonoff = 0, $strict = 0, $forcereload = 0, $marginleftonlyshort = 2, $forcenoajax = 0, $setzeroinsteadofdel = 0, $suffix = '', $mode = '', $morecss = '')
{
}
/**
 *  On/off button to change a property status of an object
 *  This uses the ajax service objectonoff.php (May be called when MAIN_DIRECT_STATUS_UPDATE is set for some pages)
 *
 *  @param  Object  $object     Object to set
 *  @param  string  $code       Name of property in object : 'status' or 'status_buy' for product by example
 *  @param  string  $field      Name of database field : 'tosell' or 'tobuy' for product by example
 *  @param  string  $text_on    Text if on ('Text' or 'Text:Picto on:Css picto on')
 *  @param  string  $text_off   Text if off ('Text' or 'Text:Picto off:Css picto off')
 *  @param  array   $input      Array of type->list of CSS element to switch. Example: array('disabled'=>array(0=>'cssid'))
 *  @param	string	$morecss	More CSS
 *  @param	string	$htmlname	Name of HTML component. Keep '' or use a different value if you need to use this component several time on the same page for the same field.
 *  @param	int		$forcenojs	Force the component to work as link post (without javascript) instead of ajax call
 *  @return string              html for button on/off
 */
function ajax_object_onoff($object, $code, $field, $text_on, $text_off, $input = array(), $morecss = '', $htmlname = '', $forcenojs = 0)
{
}