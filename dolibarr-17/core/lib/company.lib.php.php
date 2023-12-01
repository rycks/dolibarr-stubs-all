<?php

/* Copyright (C) 2006-2011  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2006       Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2007       Patrick Raguin          <patrick.raguin@gmail.com>
 * Copyright (C) 2010-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2013-2014  Florian Henry           <florian.henry@open-concept.pro>
 * Copyright (C) 2013-2014  Juanjo Menent           <jmenent@2byte.es>
 * Copyright (C) 2013       Christophe Battarel     <contact@altairis.fr>
 * Copyright (C) 2013-2018  Alexandre Spangaro      <aspangaro@open-dsi.fr>
 * Copyright (C) 2015-2021  Frédéric France         <frederic.france@netlogic.fr>
 * Copyright (C) 2015       Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2017       Rui Strecht             <rui.strecht@aliartalentos.com>
 * Copyright (C) 2018       Ferran Marcet           <fmarcet@2byte.es>
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
 *	\file       htdocs/core/lib/company.lib.php
 *	\brief      Ensemble de fonctions de base pour le module societe
 *	\ingroup    societe
 */
/**
 * Return array of tabs to used on pages for third parties cards.
 *
 * @param 	Societe	$object		Object company shown
 * @return 	array				Array of tabs
 */
function societe_prepare_head(\Societe $object)
{
}
/**
 * Return array of tabs to used on page
 *
 * @param	Object	$object		Object for tabs
 * @return	array				Array of tabs
 */
function societe_prepare_head2($object)
{
}
/**
 *  Return array head with list of tabs to view object informations.
 *
 *  @return	array   	        head array with tabs
 */
function societe_admin_prepare_head()
{
}
/**
 *    Return country label, code or id from an id, code or label
 *
 *    @param      int		$searchkey      Id or code of country to search
 *    @param      string	$withcode   	'0'=Return label,
 *    										'1'=Return code + label,
 *    										'2'=Return code from id,
 *    										'3'=Return id from code,
 * 	   										'all'=Return array('id'=>,'code'=>,'label'=>)
 *    @param      DoliDB	$dbtouse       	Database handler (using in global way may fail because of conflicts with some autoload features)
 *    @param      Translate	$outputlangs	Langs object for output translation
 *    @param      int		$entconv       	0=Return value without entities and not converted to output charset, 1=Ready for html output
 *    @param      int		$searchlabel    Label of country to search (warning: searching on label is not reliable)
 *    @return     mixed       				Integer with country id or String with country code or translated country name or Array('id','code','label') or 'NotDefined'
 */
function getCountry($searchkey, $withcode = '', $dbtouse = 0, $outputlangs = '', $entconv = 1, $searchlabel = '')
{
}
/**
 *    Return state translated from an id. Return value is always utf8 encoded and without entities.
 *
 *    @param    int			$id         	id of state (province/departement)
 *    @param    int			$withcode   	'0'=Return label,
 *    										'1'=Return string code + label,
 *    						  				'2'=Return code,
 *    						  				'all'=return array('id'=>,'code'=>,'label'=>)
 *    @param	DoliDB		$dbtouse		Database handler (using in global way may fail because of conflicts with some autoload features)
 *    @param    int			$withregion   	'0'=Ignores region,
 *    										'1'=Add region name/code/id as needed to output,
 *    @param    Translate	$outputlangs	Langs object for output translation, not fully implemented yet
 *    @param    int		    $entconv       	0=Return value without entities and not converted to output charset, 1=Ready for html output
 *    @return   string|array       			String with state code or state name or Array('id','code','label')/Array('id','code','label','region_code','region')
 */
function getState($id, $withcode = '', $dbtouse = 0, $withregion = 0, $outputlangs = '', $entconv = 1)
{
}
/**
 *    Return label of currency or code+label
 *
 *    @param      string	$code_iso       Code iso of currency
 *    @param      int		$withcode       '1'=show code + label
 *    @param      Translate $outputlangs    Output language
 *    @return     string     			    Label translated of currency
 */
function currency_name($code_iso, $withcode = '', $outputlangs = \null)
{
}
/**
 *    Retourne le nom traduit de la forme juridique
 *
 *    @param      string	$code       Code de la forme juridique
 *    @return     string     			Nom traduit du pays
 */
function getFormeJuridiqueLabel($code)
{
}
/**
 *  Return list of countries that are inside the EEC (European Economic Community)
 *  Note: Try to keep this function as a "memory only" function for performance reasons.
 *
 *  @return     array					Array of countries code in EEC
 */
function getCountriesInEEC()
{
}
/**
 *  Return if a country of an object is inside the EEC (European Economic Community)
 *
 *  @param      Object      $object    Object
 *  @return     boolean		           true = country inside EEC, false = country outside EEC
 */
function isInEEC($object)
{
}
/**
 * 		Show html area for list of projects
 *
 *		@param	Conf		$conf			Object conf
 * 		@param	Translate	$langs			Object langs
 * 		@param	DoliDB		$db				Database handler
 * 		@param	Object		$object			Third party object
 *      @param  string		$backtopage		Url to go once contact is created
 *      @param  int         $nocreatelink   1=Hide create project link
 *      @param	string		$morehtmlright	More html on right of title
 *      @return	int
 */
function show_projects($conf, $langs, $db, $object, $backtopage = '', $nocreatelink = 0, $morehtmlright = '')
{
}
/**
 * 		Show html area for list of contacts
 *
 *		@param	Conf		$conf			Object conf
 * 		@param	Translate	$langs			Object langs
 * 		@param	DoliDB		$db				Database handler
 * 		@param	Societe		$object			Third party object
 *      @param  string		$backtopage		Url to go once contact is created
 *      @param	int			$showuserlogin 	1=Show also user login if it exists
 *      @return	int
 */
function show_contacts($conf, $langs, $db, $object, $backtopage = '', $showuserlogin = 0)
{
}
/**
 *    	Show html area with actions to do
 *
 * 		@param	Conf		$conf		        Object conf
 * 		@param	Translate	$langs		        Object langs
 * 		@param	DoliDB		$db			        Object db
 * 		@param	Adherent|Societe    $filterobj  Object thirdparty or member
 * 		@param	Contact		$objcon	            Object contact
 *      @param  int			$noprint	        Return string but does not output it
 *      @param  int			$actioncode 	    Filter on actioncode
 *      @return	string|void					    Return html part or void if noprint is 1
 */
function show_actions_todo($conf, $langs, $db, $filterobj, $objcon = '', $noprint = 0, $actioncode = '')
{
}
/**
 *    	Show html area with actions (done or not, ignore the name of function).
 *      Note: Global parameter $param must be defined.
 *
 * 		@param	Conf		       $conf		   Object conf
 * 		@param	Translate	       $langs		   Object langs
 * 		@param	DoliDB		       $db			   Object db
 * 		@param	mixed			   $filterobj	   Filter on object Adherent|Societe|Project|Product|CommandeFournisseur|Dolresource|Ticket... to list events linked to an object
 * 		@param	Contact		       $objcon		   Filter on object contact to filter events on a contact
 *      @param  int			       $noprint        Return string but does not output it
 *      @param  string		       $actioncode     Filter on actioncode
 *      @param  string             $donetodo       Filter on event 'done' or 'todo' or ''=nofilter (all).
 *      @param  array              $filters        Filter on other fields
 *      @param  string             $sortfield      Sort field
 *      @param  string             $sortorder      Sort order
 *      @param	string			   $module		   You can add module name here if elementtype in table llx_actioncomm is objectkey@module
 *      @return	string|void				           Return html part or void if noprint is 1
 */
function show_actions_done($conf, $langs, $db, $filterobj, $objcon = '', $noprint = 0, $actioncode = '', $donetodo = 'done', $filters = array(), $sortfield = 'a.datep,a.id', $sortorder = 'DESC', $module = '')
{
}
/**
 * 		Show html area for list of subsidiaries
 *
 *		@param	Conf		$conf		Object conf
 * 		@param	Translate	$langs		Object langs
 * 		@param	DoliDB		$db			Database handler
 * 		@param	Societe		$object		Third party object
 * 		@return	int
 */
function show_subsidiaries($conf, $langs, $db, $object)
{
}
/**
 * 		Add Event Type SQL
 *
 *		@param	string		$sql		    $sql modified
 * 		@param	string	    $actioncode		Action code
 * 		@param	string		$sqlANDOR		"AND", "OR" or "" sql condition
 * 		@return	string      sql request
 */
function addEventTypeSQL(&$sql, $actioncode, $sqlANDOR = "AND")
{
}
/**
 * 		Add Event Type SQL
 *
 *		@param	string		$sql		    $sql modified
 * 		@param	string		$donetodo		donetodo
 * 		@param	string		$now		    now
 * 		@param	string		$filters		array
 * 		@return	string      sql request
 */
function addOtherFilterSQL(&$sql, $donetodo, $now, $filters)
{
}
/**
 *  Add Mailing Event Type SQL
 *
 *  @param	string	    $actioncode		Action code
 *  @param	Object		$objcon		    objcon
 *  @param	Object		$filterobj      filterobj
 *  @return	string
 */
function addMailingEventTypeSQL($actioncode, $objcon, $filterobj)
{
}