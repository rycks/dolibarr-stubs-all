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
 * Generic function that return javascript to add to a page to transform a common input field into an autocomplete field by calling an Ajax page (ex: /societe/ajaxcompanies.php).
 * The HTML field must be an input text with id=search_$htmlname.
 * This use the jQuery "autocomplete" function. If we want to use the select2, we must also convert the input into select on funcntions that call this method.
 *
 * @param string	$selected 			Preselected value
 * @param string	$htmlname 			HTML name of input field
 * @param string	$url 				Ajax Url to call for request: /path/page.php. Must return a json array ('key'=>id, 'value'=>String shown into input field once selected, 'label'=>String shown into combo list)
 * @param string	$urloption			More parameters on URL request
 * @param int		$minLength			Minimum number of chars to trigger that Ajax search
 * @param int		$autoselect			Automatic selection if just one value
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
 *	@param	string	$fields				Other fields to autocomplete
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
 * @return	string								Return html string to convert a select field into a combo, or '' if feature has been disabled for some reason.
 * @see selectArrayAjax() of html.form.class
 */
function ajax_combobox($htmlname, $events = array(), $minLengthToAutocomplete = 0, $forcefocus = 0, $widthTypeOfAutocomplete = 'resolve')
{
}
/**
 * 	On/off button for constant
 *
 * 	@param	string	$code					Name of constant
 * 	@param	array	$input					Array of options. ("disabled"|"enabled'|'set'|'del') => CSS element to switch, 'alert' => message to show, ... Example: array('disabled'=>array(0=>'cssid'))
 * 	@param	int		$entity					Entity to set. Use current entity if null.
 *  @param	int		$revertonoff			Revert on/off
 *  @param	int		$strict					Use only "disabled" with delConstant and "enabled" with setConstant
 *  @param	int		$forcereload			Force to reload page if we click/change value (this is supported only when there is no 'alert' option in input)
 *  @param	string	$marginleftonlyshort	1 = Add a short left margin on picto, 2 = Add a larger left margin on picto, 0 = No margin left. Works for fontawesome picto only.
 *  @param	int		$forcenoajax	1=Force to use a ahref link instead of ajax code.
 * 	@return	string
 */
function ajax_constantonoff($code, $input = array(), $entity = \null, $revertonoff = 0, $strict = 0, $forcereload = 0, $marginleftonlyshort = 2, $forcenoajax = 0)
{
}
/**
 *  On/off button to change status of an object
 *  This is called when MAIN_DIRECT_STATUS_UPDATE is set and it use tha ajax service objectonoff.php
 *
 *  @param  Object  $object     Object to set
 *  @param  string  $code       Name of constant : status or status_buy for product by example
 *  @param  string  $field      Name of database field : 'tosell' or 'tobuy' for product by example
 *  @param  string  $text_on    Text if on
 *  @param  string  $text_off   Text if off
 *  @param  array   $input      Array of type->list of CSS element to switch. Example: array('disabled'=>array(0=>'cssid'))
 *  @return string              html for button on/off
 */
function ajax_object_onoff($object, $code, $field, $text_on, $text_off, $input = array())
{
}