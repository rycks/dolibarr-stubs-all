<?php

/* Copyright (c) 2002-2007 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2012 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2004      Benoit Mortier       <benoit.mortier@opensides.be>
 * Copyright (C) 2004      Sebastien Di Cintio  <sdicintio@ressource-toi.org>
 * Copyright (C) 2004      Eric Seigne          <eric.seigne@ryxeo.com>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2006      Andre Cianfarani     <acianfa@free.fr>
 * Copyright (C) 2006      Marc Barilley/Ocebo  <marc@ocebo.com>
 * Copyright (C) 2007      Franky Van Liedekerke <franky.van.liedekerker@telenet.be>
 * Copyright (C) 2007      Patrick Raguin 		<patrick.raguin@gmail.com>
 * Copyright (C) 2019       Thibault FOUCART        <support@ptibogxiv.net>
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
 *	\file       htdocs/core/class/html.formother.class.php
 *  \ingroup    core
 *	\brief      Fichier de la classe des fonctions predefinie de composants html autre
 */
/**
 *	Classe permettant la generation de composants html autre
 *	Only common components are here.
 */
class FormOther
{
    private $db;
    /**
     * @var string Error code (or message)
     */
    public $error;
    /**
     *	Constructor
     *
     *	@param	DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return the HTML code for scanner tool.
     * This must be called into an existing <form>
     *
     * @param	string	$jstoexecuteonadd	Name of javascript function to call once the barcode scanning session is complete and user has click on "Add".
     * @param	string	$mode				'all' (both product and lot barcode) or 'product' (product barcode only) or 'lot' (lot number only)
     * @param	int		$warehouseselect	0 (disable warehouse select) or 1 (enable warehouse select)
     * @return	string						HTML component
     */
    public function getHTMLScannerForm($jstoexecuteonadd = 'barcodescannerjs', $mode = 'all', $warehouseselect = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return HTML select list of export models
     *
     *    @param    string	$selected          Id modele pre-selectionne
     *    @param    string	$htmlname          Nom de la zone select
     *    @param    string	$type              Type des modeles recherches
     *    @param    int		$useempty          Show an empty value in list
     *    @param    int		$fk_user           User we want templates
     *    @return	void
     */
    public function select_export_model($selected = '', $htmlname = 'exportmodelid', $type = '', $useempty = 0, $fk_user = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of export models
     *
     *    @param    string	$selected          Id modele pre-selectionne
     *    @param    string	$htmlname          Nom de la zone select
     *    @param    string	$type              Type des modeles recherches
     *    @param    int		$useempty          Affiche valeur vide dans liste
     *    @param    int		$fk_user           User that has created the template
     *    @return	void
     */
    public function select_import_model($selected = '', $htmlname = 'importmodelid', $type = '', $useempty = 0, $fk_user = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of ecotaxes with label
     *
     *    @param	string	$selected   Preselected ecotaxes
     *    @param    string	$htmlname	Name of combo list
     *    @return	integer
     */
    public function select_ecotaxes($selected = '', $htmlname = 'ecotaxe_id')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of revenue stamp for country
     *
     *    @param	string	$selected   	Value of preselected revenue stamp
     *    @param    string	$htmlname   	Name of combo list
     *    @param    string	$country_code   Country Code
     *    @return	string					HTML select list
     */
    public function select_revenue_stamp($selected = '', $htmlname = 'revenuestamp', $country_code = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return a HTML select list to select a percent
     *
     *    @param	integer	$selected      	pourcentage pre-selectionne
     *    @param    string	$htmlname      	nom de la liste deroulante
     *    @param	int		$disabled		Disabled or not
     *    @param    int		$increment     	increment value
     *    @param    int		$start         	start value
     *    @param    int		$end           	end value
     *    @param    int     $showempty      Add also an empty line
     *    @return   string					HTML select string
     */
    public function select_percent($selected = 0, $htmlname = 'percent', $disabled = 0, $increment = 5, $start = 0, $end = 100, $showempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return select list for categories (to use in form search selectors)
     *
     * @param	int			$type			Type of category ('customer', 'supplier', 'contact', 'product', 'member'). Old mode (0, 1, 2, ...) is deprecated.
     * @param   integer		$selected     	Preselected value
     * @param   string		$htmlname      	Name of combo list
     * @param	int			$nocateg		Show also an entry "Not categorized"
     * @param   int|string  $showempty      Add also an empty line
     * @param   string  	$morecss        More CSS
     * @return  string			        	Html combo list code
     * @see	select_all_categories()
     */
    public function select_categories($type, $selected = 0, $htmlname = 'search_categ', $nocateg = 0, $showempty = 1, $morecss = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return select list for categories (to use in form search selectors)
     *
     *  @param	string		$selected     		Preselected value
     *  @param  string		$htmlname      		Name of combo list (example: 'search_sale')
     *  @param  User		$user           	Object user
     *  @param	int			$showstatus			0=show user status only if status is disabled, 1=always show user status into label, -1=never show user status
     *  @param	int|string	$showempty			1=show also an empty value or text to show for empty
     *  @param	string		$morecss			More CSS
     *  @param	int			$norepresentative	Show also an entry "Not categorized"
     *  @return string							Html combo list code
     */
    public function select_salesrepresentatives($selected, $htmlname, $user, $showstatus = 0, $showempty = 1, $morecss = '', $norepresentative = 0)
    {
    }
    /**
     *	Return list of project and tasks
     *
     *	@param  int		$selectedtask   		Pre-selected task
     *  @param  int		$projectid				Project id
     * 	@param  string	$htmlname    			Name of html select
     * 	@param	int		$modeproject			1 to restrict on projects owned by user
     * 	@param	int		$modetask				1 to restrict on tasks associated to user
     * 	@param	int		$mode					0=Return list of tasks and their projects, 1=Return projects and tasks if exists
     *  @param  int		$useempty       		0=Allow empty values
     *  @param	int		$disablechildoftaskid	1=Disable task that are child of the provided task id
     *  @param	string	$filteronprojstatus		Filter on project status ('-1'=no filter, '0,1'=Draft+Validated status)
     *  @param	string	$morecss				More css
     *  @return	void
     */
    public function selectProjectTasks($selectedtask = '', $projectid = 0, $htmlname = 'task_parent', $modeproject = 0, $modetask = 0, $mode = 0, $useempty = 0, $disablechildoftaskid = 0, $filteronprojstatus = '', $morecss = '')
    {
    }
    /**
     * Write lines of a project (all lines of a project if parent = 0)
     *
     * @param 	int		$inc					Cursor counter
     * @param 	int		$parent					Id of parent task we want to see
     * @param 	array	$lines					Array of task lines
     * @param 	int		$level					Level
     * @param 	int		$selectedtask			Id selected task
     * @param 	int		$selectedproject		Id selected project
     * @param	int		$disablechildoftaskid	1=Disable task that are child of the provided task id
     * @return	void
     */
    private function _pLineSelect(&$inc, $parent, $lines, $level = 0, $selectedtask = 0, $selectedproject = 0, $disablechildoftaskid = 0)
    {
    }
    /**
     *  Output a HTML thumb of color or a text if not defined.
     *
     *  @param	string		$color				String with hex (FFFFFF) or comma RGB ('255,255,255')
     *  @param	string		$textifnotdefined	Text to show if color not defined
     *  @return	string							Show color string
     *  @see selectColor()
     */
    public static function showColor($color, $textifnotdefined = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output a HTML code to select a color
     *
     *  @param	string		$set_color		Pre-selected color
     *  @param	string		$prefix			Name of HTML field
     *  @param	string		$form_name		Deprecated. Not used.
     *  @param	int			$showcolorbox	1=Show color code and color box, 0=Show only color code
     *  @param 	array		$arrayofcolors	Array of colors. Example: array('29527A','5229A3','A32929','7A367A','B1365F','0D7813')
     *  @return	void
     *  @deprecated Use instead selectColor
     *  @see selectColor()
     */
    public function select_color($set_color = '', $prefix = 'f_color', $form_name = '', $showcolorbox = 1, $arrayofcolors = '')
    {
    }
    /**
     *  Output a HTML code to select a color. Field will return an hexa color like '334455'.
     *
     *  @param	string		$set_color				Pre-selected color with format '#......'
     *  @param	string		$prefix					Name of HTML field
     *  @param	string		$form_name				Deprecated. Not used.
     *  @param	int			$showcolorbox			1=Show color code and color box, 0=Show only color code
     *  @param 	array		$arrayofcolors			Array of possible colors to choose in the selector. All colors are possible if empty. Example: array('29527A','5229A3','A32929','7A367A','B1365F','0D7813')
     *  @param	string		$morecss				Add css style into input field
     *  @param	string		$setpropertyonselect	Set this property after selecting a color
     *  @param	string		$default				Default color
     *  @return	string
     *  @see showColor()
     */
    public static function selectColor($set_color = '', $prefix = 'f_color', $form_name = '', $showcolorbox = 1, $arrayofcolors = '', $morecss = '', $setpropertyonselect = '', $default = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Creae an image for color
     *
     *	@param	string	$color		Color of image
     *	@param	string	$module 	Name of module
     *	@param	string	$name		Name of image
     *	@param	int		$x 			Largeur de l'image en pixels
     *	@param	int		$y      	Hauteur de l'image en pixels
     *	@return	void
     */
    public function CreateColorIcon($color, $module, $name, $x = '12', $y = '12')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Return HTML combo list of week
     *
     *    	@param	string		$selected          Preselected value
     *    	@param  string		$htmlname          Nom de la zone select
     *    	@param  int			$useempty          Affiche valeur vide dans liste
     *    	@return	string
     */
    public function select_dayofweek($selected = '', $htmlname = 'weekid', $useempty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Return HTML combo list of month
     *
     *      @param  string      $selected          	Preselected value
     *      @param  string      $htmlname          	Name of HTML select object
     *      @param  int         $useempty          	Show empty in list
     *      @param  int         $longlabel         	Show long label
     *      @param	string		$morecss			More Css
     *  	@param  bool		$addjscombo			Add js combo
     *      @return string
     */
    public function select_month($selected = '', $htmlname = 'monthid', $useempty = 0, $longlabel = 0, $morecss = 'minwidth50 maxwidth75imp valignmiddle', $addjscombo = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return HTML combo list of years
     *
     *  @param  string		$selected       Preselected value (''=current year, -1=none, year otherwise)
     *  @param  string		$htmlname       Name of HTML select object
     *  @param  int			$useempty       Affiche valeur vide dans liste
     *  @param  int			$min_year       Offset of minimum year into list (by default current year -10)
     *  @param  int		    $max_year		Offset of maximum year into list (by default current year + 5)
     *  @param	int			$offset			Offset
     *  @param	int			$invert			Invert
     *  @param	string		$option			Option
     *  @param	string		$morecss		More CSS
     *  @param  bool		$addjscombo		Add js combo
     *  @return	void
     *  @deprecated
     */
    public function select_year($selected = '', $htmlname = 'yearid', $useempty = 0, $min_year = 10, $max_year = 5, $offset = 0, $invert = 0, $option = '', $morecss = 'valignmiddle maxwidth75imp', $addjscombo = \false)
    {
    }
    /**
     *	Return HTML combo list of years
     *
     *  @param  string	$selected       Preselected value (''=current year, -1=none, year otherwise)
     *  @param  string	$htmlname       Name of HTML select object
     *  @param  int	    $useempty       Affiche valeur vide dans liste
     *  @param  int	    $min_year		Offset of minimum year into list (by default current year -10)
     *  @param  int	    $max_year       Offset of maximum year into list (by default current year + 5)
     *  @param	int		$offset			Offset
     *  @param	int		$invert			Invert
     *  @param	string	$option			Option
     *  @param	string	$morecss		More css
     *  @param  bool	$addjscombo		Add js combo
     *  @return	string
     */
    public function selectyear($selected = '', $htmlname = 'yearid', $useempty = 0, $min_year = 10, $max_year = 5, $offset = 0, $invert = 0, $option = '', $morecss = 'valignmiddle width75', $addjscombo = \false)
    {
    }
    /**
     * 	Get array with HTML tabs with boxes of a particular area including personalized choices of user.
     *  Class 'Form' must be known.
     *
     * 	@param	   User         $user		 Object User
     * 	@param	   String       $areacode    Code of area for pages - 0 = Home page ... See getListOfPagesForBoxes()
     *	@return    array                     array('selectboxlist'=>, 'boxactivated'=>, 'boxlista'=>, 'boxlistb'=>)
     */
    public static function getBoxesArea($user, $areacode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return a HTML select list of a dictionary
     *
     *  @param  string	$htmlname          	Name of select zone
     *  @param	string	$dictionarytable	Dictionary table
     *  @param	string	$keyfield			Field for key
     *  @param	string	$labelfield			Label field
     *  @param	string	$selected			Selected value
     *  @param  int		$useempty          	1=Add an empty value in list, 2=Add an empty value in list only if there is more than 2 entries.
     *  @param  string  $moreattrib         More attributes on HTML select tag
     * 	@return	void
     */
    public function select_dictionary($htmlname, $dictionarytable, $keyfield = 'code', $labelfield = 'label', $selected = '', $useempty = 0, $moreattrib = '')
    {
    }
    /**
     *	Return an html string with a select combo box to choose yes or no
     *
     *	@param	string		$htmlname		Name of html select field
     *	@param	string		$value			Pre-selected value
     *	@param	int			$option			0 return automatic/manual, 1 return 1/0
     *	@param	bool		$disabled		true or false
     *  @param	int      	$useempty		1=Add empty line
     *	@return	string						See option
     */
    public function selectAutoManual($htmlname, $value = '', $option = 0, $disabled = \false, $useempty = 0)
    {
    }
    /**
     * Return HTML select list to select a group by field
     *
     * @param 	mixed	$object				Object analyzed
     * @param	array	$search_groupby		Array of preselected fields
     * @param	array	$arrayofgroupby		Array of groupby to fill
     * @param	string	$morecss			More CSS
     * @param	string  $showempty          '1' or 'text'
     * @return string						HTML string component
     */
    public function selectGroupByField($object, $search_groupby, &$arrayofgroupby, $morecss = 'minwidth200 maxwidth250', $showempty = '1')
    {
    }
    /**
     * Return HTML select list to select a group by field
     *
     * @param 	mixed	$object				Object analyzed
     * @param	array	$search_xaxis		Array of preselected fields
     * @param	array	$arrayofxaxis		Array of groupby to fill
     * @param	string  $showempty          '1' or 'text'
     * @param	string	$morecss			More css
     * @return 	string						HTML string component
     */
    public function selectXAxisField($object, $search_xaxis, &$arrayofxaxis, $showempty = '1', $morecss = 'minwidth250 maxwidth500')
    {
    }
}