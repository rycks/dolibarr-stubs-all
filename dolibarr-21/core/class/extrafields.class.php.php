<?php

/* Copyright (C) 2002-2003  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2002-2003  Jean-Louis Bergamo      <jlb@j1b.org>
 * Copyright (C) 2004       Sebastien Di Cintio     <sdicintio@ressource-toi.org>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2009-2012  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2009-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2013       Florian Henry           <forian.henry@open-concept.pro>
 * Copyright (C) 2015-2023  Charlene BENKE          <charlene@patas-monkey.com>
 * Copyright (C) 2016       Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2017       Nicolas ZABOURI         <info@inovea-conseil.com>
 * Copyright (C) 2018-2024  Frédéric France         <frederic.france@free.fr>
 * Copyright (C) 2022 		Antonin MARCHAL         <antonin@letempledujeu.fr>
 * Copyright (C) 2024		MDW						<mdeweerd@users.noreply.github.com>
 * Copyright (C) 2024		Benoît PASCAL			<contact@p-ben.com>
 * Copyright (C) 2024		Joachim Kueter			<git-jk@bloxera.com>
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
 * 	\file 		htdocs/core/class/extrafields.class.php
 *	\ingroup    core
 *	\brief      File of class to manage extra fields
 */
/**
 *	Class to manage standard extra fields
 */
class ExtraFields
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var array<string,array{label:array<string,string>,type:array<string,string>,size:array<string,string>,default:array<string,string>,computed:array<string,string>,unique:array<string,int>,required:array<string,int>,param:array<string,mixed>,perms:array<string,mixed>,list:array<string,int|string>,pos:array<string,int>,totalizable:array<string,int>,help:array<string,string>,printable:array<string,int>,enabled:array<string,int>,langfile:array<string,string>,css:array<string,string>,csslist:array<string,string>,cssview:array<string,string>,hidden:array<string,int>,mandatoryfieldsofotherentities:array<string,string>,alwayseditable:array<string,int<0,1>>,loaded?:int,count:int}> New array to store extrafields definition  Note: count set as present to avoid static analysis notices
     */
    public $attributes = array();
    /**
     * @var array<string,bool|int<0,1>>|null	Array with boolean of status of groups
     */
    public $expand_display;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Array of Error code (or message)
     */
    public $errors = array();
    /**
     * @var string 	DB Error number
     */
    public $errno;
    /**
     * @var array<string,string> 	Array of type to label
     */
    public static $type2label = array(
        'varchar' => 'String1Line',
        'text' => 'TextLongNLines',
        'html' => 'HtmlText',
        'int' => 'Int',
        'double' => 'Float',
        'date' => 'Date',
        'datetime' => 'DateAndTime',
        'duration' => 'Duration',
        //'datetimegmt'=>'DateAndTimeUTC',
        'boolean' => 'Boolean',
        'price' => 'ExtrafieldPrice',
        'pricecy' => 'ExtrafieldPriceWithCurrency',
        'phone' => 'ExtrafieldPhone',
        'mail' => 'ExtrafieldMail',
        'url' => 'ExtrafieldUrl',
        'ip' => 'ExtrafieldIP',
        'icon' => 'Icon',
        'password' => 'ExtrafieldPassword',
        'radio' => 'ExtrafieldRadio',
        'select' => 'ExtrafieldSelect',
        'sellist' => 'ExtrafieldSelectList',
        'checkbox' => 'ExtrafieldCheckBox',
        'chkbxlst' => 'ExtrafieldCheckBoxFromList',
        'link' => 'ExtrafieldLink',
        'point' => 'ExtrafieldPointGeo',
        'multipts' => 'ExtrafieldMultiPointGeo',
        'linestrg' => 'ExtrafieldLinestringGeo',
        'polygon' => 'ExtrafieldPolygonGeo',
        'separate' => 'ExtrafieldSeparator',
        'stars' => 'ExtrafieldStars',
    );
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Add a new extra field parameter
     *
     *  @param	string			$attrname           Code of attribute
     *  @param  string			$label              label of attribute
     *  @param  string			$type               Type of attribute ('boolean', 'int', 'varchar', 'text', 'html', 'date', 'datetime', 'duration', 'price', 'pricecy', 'phone', 'mail', 'password', 'url', 'select', 'checkbox', 'separate',...)
     *  @param  int				$pos                Position of attribute
     *  @param  string			$size               Size/length definition of attribute ('5', '24,8', ...). For float, it contains 2 numeric separated with a comma.
     *  @param  string			$elementtype        Element type. Same value than object->table_element (Example 'member', 'product', 'thirdparty', ...)
     *  @param	int<0,1>		$unique				Is field unique or not
     *  @param	int<0,1>		$required			Is field required or not
     *  @param	string			$default_value		Defaulted value (In database. use the default_value feature for default value on screen. Example: '', '0', 'null', 'avalue')
     *  @param  array<string,mixed|mixed[]>|string	$param				Params for field (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int<0,1>		$alwayseditable		Is attribute always editable regardless of the document status
     *  @param	string			$perms				Permission to check
     *  @param	string			$list				Visibility ('0'=never visible, '1'=visible on list+forms, '2'=list only, '3'=form only or 'eval string')
     *  @param	string			$help				Text with help tooltip
     *  @param  string  		$computed           Computed value
     *  @param  string  		$entity    		 	Entity of extrafields (for multicompany modules)
     *  @param  string  		$langfile  		 	Language file
     *  @param  string  		$enabled  		 	Condition to have the field enabled or not
     *  @param	int<0,1>		$totalizable		Is a measure. Must show a total on lists
     *  @param  int<0,1>        $printable          Is extrafield displayed on PDF
     *  @param	array<string,mixed>	$moreparams		More parameters. Example: array('css'=>, 'csslist'=>Css on list, 'cssview'=>...)
     *  @return int      							Return integer <=0 if KO, >0 if OK
     */
    public function addExtraField($attrname, $label, $type, $pos, $size, $elementtype, $unique = 0, $required = 0, $default_value = '', $param = '', $alwayseditable = 0, $perms = '', $list = '-1', $help = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0, $moreparams = array())
    {
    }
    /**
     *  Update an existing extra field parameter
     *
     *  @param  string			$attrname           Code of attribute
     *  @param  string			$label              label of attribute
     *  @param  string			$type               Type of attribute ('boolean', 'int', 'varchar', 'text', 'html', 'date', 'datetime', 'duration', 'price', 'pricecy', 'phone', 'mail', 'password', 'url', 'select', 'checkbox', 'separate',...)
     *  @param  int				$pos                Position of attribute
     *  @param  string			$size               Size/length definition of attribute ('5', '24,8', ...). For float, it contains 2 numeric separated with a comma.
     *  @param  string			$elementtype        Element type. Same value than object->table_element (Example 'member', 'product', 'thirdparty', ...)
     *  @param  int<0,1>		$unique				Is field unique or not
     *  @param  int<0,1>		$required			Is field required or not
     *  @param  string			$default_value		Defaulted value (In database. use the default_value feature for default value on screen. Example: '', '0', 'null', 'avalue')
     *  @param  array<string,mixed|mixed[]>|string	$param				Params for field (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int<0,1>		$alwayseditable		Is attribute always editable regardless of the document status
     *  @param  string			$perms				Permission to check
     *  @param  string			$list				Visibility ('0'=never visible, '1'=visible on list+forms, '2'=list only, '3'=form only or 'eval string')
     *  @param  string			$help				Text with help tooltip
     *  @param  string  		$computed           Computed value
     *  @param  string  		$entity    		 	Entity of extrafields (for multicompany modules)
     *  @param  string  		$langfile  		 	Language file
     *  @param  string  		$enabled  		 	Condition to have the field enabled or not
     *  @param  int<0,1>		$totalizable		Is a measure. Must show a total on lists
     *  @param  int<0,1>        $printable          Is extrafield displayed on PDF
     *  @param  array<string,mixed>	$moreparams		More parameters. Example: array('css'=>, 'csslist'=>Css on list, 'cssview'=>...)
     *  @return int      							Return integer <=0 if KO, >0 if OK
     */
    public function updateExtraField($attrname, $label, $type, $pos, $size, $elementtype, $unique = 0, $required = 0, $default_value = '', $param = '', $alwayseditable = 0, $perms = '', $list = '-1', $help = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0, $moreparams = array())
    {
    }
    /**
     *	Add a new optional attribute.
     *  This is a private method. For public method, use addExtraField.
     *
     *	@param	string	$attrname			code of attribute
     *  @param	string	$type				Type of attribute ('boolean', 'int', 'varchar', 'text', 'html', 'date', 'datetime', 'duration', 'price', 'pricecy', 'phone', 'mail', 'password', 'url', 'select', 'checkbox', ...)
     *  @param	string	$length				Size/length of attribute ('5', '24,8', ...)
     *  @param  string	$elementtype        Element type ('member', 'product', 'thirdparty', 'contact', ...)
     *  @param	int<0,1>	$unique				Is field unique or not
     *  @param	int<0,1>	$required			Is field required or not
     *  @param  string  $default_value		Default value for field (in database)
     *  @param  array<string,mixed|mixed[]>	$param				Params for field  (ex for select list : array('options'=>array('value'=>'label of option'))
     *  @param	string	$perms				Permission
     *	@param	string	$list				Into list view by default
     *  @param  string  $computed           Computed value
     *  @param	string	$help				Help on tooltip
     *  @param	array<string,mixed>	$moreparams		More parameters. Example: array('css'=>, 'csslist'=>, 'cssview'=>...)
     *  @return int      	           		Return integer <=0 if KO, >0 if OK
     */
    private function create($attrname, $type = 'varchar', $length = '255', $elementtype = '', $unique = 0, $required = 0, $default_value = '', $param = array(), $perms = '', $list = '0', $computed = '', $help = '', $moreparams = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add description of a new optional attribute
     *
     *	@param	string			$attrname		code of attribute
     *	@param	string			$label			label of attribute
     *  @param	string			$type			Type of attribute ('int', 'varchar', 'text', 'html', 'date', 'datehour', 'float')
     *  @param	int				$pos			Position of attribute
     *  @param	string			$size			Size/length of attribute ('5', '24,8', ...)
     *  @param  string			$elementtype	Element type ('member', 'product', 'thirdparty', ...)
     *  @param	int<0,1>		$unique			Is field unique or not
     *  @param	int<0,1>		$required		Is field required or not
     *  @param  array<string,mixed|mixed[]>|string	$param			Params for field  (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int<0,1>		$alwayseditable	Is attribute always editable regardless of the document status
     *  @param	string			$perms			Permission to check
     *  @param	string			$list			Visibility
     *  @param	string			$help			Help on tooltip
     *  @param  string          $default        Default value (in database. use the default_value feature for default value on screen).
     *  @param  string          $computed       Computed value
     *  @param  string          $entity     	Entity of extrafields
     *  @param	string			$langfile		Language file
     *  @param  string  		$enabled  		Condition to have the field enabled or not
     *  @param	int<0,1>		$totalizable	Is a measure. Must show a total on lists
     *  @param  int<0,1>        $printable      Is extrafield displayed on PDF
     *  @param	array<string,mixed>	$moreparams		More parameters. Example: array('css'=>, 'csslist'=>, 'cssview'=>...)
     *  @return	int								Return integer <=0 if KO, >0 if OK
     *  @throws Exception
     */
    private function create_label($attrname, $label = '', $type = '', $pos = 0, $size = '', $elementtype = '', $unique = 0, $required = 0, $param = '', $alwayseditable = 0, $perms = '', $list = '-1', $help = '', $default = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0, $moreparams = array())
    {
    }
    /**
     *	Delete an optional attribute
     *
     *	@param	string	$attrname		Code of attribute to delete
     *  @param  string	$elementtype    Element type ('member', 'product', 'thirdparty', 'contact', ...)
     *  @return int              		Return integer < 0 if KO, 0 if nothing is done, 1 if OK
     */
    public function delete($attrname, $elementtype = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Delete description of an optional attribute
     *
     *	@param	string	$attrname			Code of attribute to delete
     *  @param  string	$elementtype        Element type ('member', 'product', 'thirdparty', ...)
     *  @return int              			Return integer < 0 if KO, 0 if nothing is done, 1 if OK
     */
    private function delete_label($attrname, $elementtype = '')
    {
    }
    /**
     * 	Modify type of a personalized attribute
     *
     *  @param	string	$attrname			Name of attribute
     *  @param	string	$label				Label of attribute
     *  @param	string	$type				Type of attribute ('boolean', 'int', 'varchar', 'text', 'html', 'date', 'datetime', 'duration', 'price', 'phone', 'mail', 'password', 'url', 'select', 'checkbox', ...)
     *  @param	string	$length				Size/length of attribute ('5', '24,8', ...)
     *  @param  string	$elementtype        Element type ('member', 'product', 'thirdparty', 'contact', ...)
     *  @param	int<0,1>	$unique			Is field unique or not
     *  @param	int<0,1>	$required		Is field required or not
     *  @param	int<0,1>	$pos			Position of attribute
     *  @param  array<string,mixed|mixed[]>	$param				Params for field (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int<0,1>	$alwayseditable		Is attribute always editable regardless of the document status
     *  @param	string	$perms				Permission to check
     *  @param	string	$list				Visibility
     *  @param	string	$help				Help on tooltip
     *  @param  string  $default            Default value (in database. use the default_value feature for default value on screen).
     *  @param  string  $computed           Computed value
     *  @param  string  $entity	            Entity of extrafields
     *  @param	string	$langfile			Language file
     *  @param  string  $enabled  			Condition to have the field enabled or not
     *  @param  int<0,1>	$totalizable    Is extrafield totalizable on list
     *  @param  int<0,1>	$printable    	Is extrafield displayed on PDF
     *  @param	array<string,mixed>	$moreparams			More parameters. Example: array('css'=>, 'csslist'=>, 'cssview'=>...)
     * 	@return	int							>0 if OK, <=0 if KO
     *  @throws Exception
     */
    public function update($attrname, $label, $type, $length, $elementtype, $unique = 0, $required = 0, $pos = 0, $param = array(), $alwayseditable = 0, $perms = '', $list = '', $help = '', $default = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0, $moreparams = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Modify description of personalized attribute
     * 	This is a private method. For public method, use updateExtraField.
     *
     *  @param	string	$attrname			Name of attribute
     *  @param	string	$label				Label of attribute
     *  @param  string	$type               Type of attribute
     *  @param  string	$size		        Size/length of attribute ('5', '24,8', ...)
     *  @param  string	$elementtype		Element type ('member', 'product', 'thirdparty', ...)
     *  @param	int<0,1>	$unique			Is field unique or not
     *  @param	int<0,1>	$required		Is field required or not
     *  @param	int		$pos				Position of attribute
     *  @param  array<string,mixed|array<string,mixed>>	$param		Params for field  (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int<0,1>	$alwayseditable		Is attribute always editable regardless of the document status
     *  @param	string	$perms				Permission to check
     *  @param	string	$list				Visibility
     *  @param	string	$help				Help on tooltip.
     *  @param  string  $default            Default value (in database. use the default_value feature for default value on screen).
     *  @param  string  $computed           Computed value
     *  @param  string  $entity     		Entity of extrafields
     *  @param	string	$langfile			Language file
     *  @param  string  $enabled  			Condition to have the field enabled or not
     *  @param  int<0,1>     $totalizable   Is extrafield totalizable on list
     *  @param  int<0,1>     $printable    	Is extrafield displayed on PDF
     *  @param	array<string,mixed>	$moreparams		More parameters. Example: array('css'=>, 'csslist'=>, 'cssview'=>...)
     *  @return	int							Return integer <=0 if KO, >0 if OK
     *  @throws Exception
     */
    private function update_label($attrname, $label, $type, $size, $elementtype, $unique = 0, $required = 0, $pos = 0, $param = array(), $alwayseditable = 0, $perms = '', $list = '0', $help = '', $default = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0, $moreparams = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Load the array of extrafields definition $this->attributes
     *
     * 	@param	string		$elementtype		Type of element ('all' = all or $object->table_element like 'adherent', 'commande', 'thirdparty', 'facture', 'propal', 'product', ...).
     * 	@param	boolean		$forceload			Force load of extra fields whatever is status of cache.
     *  @param  string		$attrname           The name of the attribute.
     *  @return array<string,string>					Array of attributes keys+label for all extra fields.
     * in addition $this->attributes will be completed with array{label:array<string,string>,type:array<string,string>,size:array<string,string>,default:array<string,string>,computed:array<string,string>,unique:array<string,int>,required:array<string,int>,param:array<string,mixed>,perms:array<string,mixed[]>,list:array<string,int>|array<string,string>,pos:array<string,int>,totalizable:array<string,int>,help:array<string,string>,printable:array<string,int>,enabled:array<string,int>,langfile:array<string,string>,css:array<string,string>,csslist:array<string,string>,hidden:array<string,int>,mandatoryfieldsofotherentities?:array<string,string>,loaded?:int,count:int} Note: count set as present to avoid static analysis notices
     */
    public function fetch_name_optionals_label($elementtype, $forceload = \false, $attrname = '')
    {
    }
    /**
     * Return HTML string to put an input field into a page
     * Code very similar with showInputField of common object
     *
     * @param  string        		$key            		Key of attribute
     * @param  string|array{start:int,end:int}  $value 			    Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value); for dates in filter mode, a range array('start'=><timestamp>, 'end'=><timestamp>) should be provided
     * @param  string        		$moreparam      		To add more parameters on html input tag
     * @param  string        		$keysuffix      		Suffix string to add after name and id of field (can be used to avoid duplicate names)
     * @param  string        		$keyprefix      		Prefix string to add before name and id of field (can be used to avoid duplicate names)
     * @param  string        		$morecss        		More css (to defined size of field. Old behaviour: may also be a numeric)
     * @param  int|CommonObject     $object       			Current object or object ID. Preferably, pass the object itself.
     * @param  string        		$extrafieldsobjectkey	The key to use to store retrieved data (commonly $object->table_element)
     * @param  int	         		$mode                  1=Used for search filters
     * @return string
     */
    public function showInputField($key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '', $object = 0, $extrafieldsobjectkey = '', $mode = 0)
    {
    }
    /**
     * Return HTML string to put an output field into a page
     *
     * @param   string			$key            		Key of attribute
     * @param   string			$value          		Value to show
     * @param	string			$moreparam				To add more parameters on html input tag (only checkbox use html input for output rendering)
     * @param	string			$extrafieldsobjectkey	Required (for example $object->table_element).
     * @param 	Translate|null 	$outputlangs 			Output
     * @param	CommonObject	$object					The parent object of field to show
     * @return	string									Formatted value
     */
    public function showOutputField($key, $value, $moreparam = '', $extrafieldsobjectkey = '', $outputlangs = \null, $object = \null)
    {
    }
    /**
     * Return the CSS to use for this extrafield into list
     *
     * @param   string	$key            		Key of attribute
     * @param	string	$extrafieldsobjectkey	If defined, use the new method to get extrafields data
     * @return	string							Formatted value
     */
    public function getAlignFlag($key, $extrafieldsobjectkey = '')
    {
    }
    /**
     * Return HTML string to print separator extrafield
     *
     * @param   string	$key            Key of attribute
     * @param	object	$object			Object
     * @param	int		$colspan		Value of colspan to use (it must includes the first column with title)
     * @param	string	$display_type	"card" for form display, "line" for document line display (extrafields on propal line, order line, etc...)
     * @param 	string  $mode           Show output ('view') or input ('create' or 'edit') for extrafield
     * @return 	string					HTML code with line for separator
     */
    public function showSeparator($key, $object, $colspan = 2, $display_type = 'card', $mode = '')
    {
    }
    /**
     * Fill array_options property of object by extrafields value (using for data sent by forms)
     *
     * @param   null		$extralabels    	Deprecated (old $array of extrafields, now set this to null)
     * @param   CommonObject	$object        	Object
     * @param	string		$onlykey			Only some keys are filled:
     *                      	            	'string' => When we make update of only one extrafield ($action = 'update_extras'), calling page can set this to avoid to have other extrafields being reset.
     *                          	        	'@GETPOSTISSET' => When we make update of several extrafields ($action = 'update'), calling page can set this to avoid to have fields not into POST being reset.
     * @param	int			$todefaultifmissing 1=Set value to the default value in database if value is mandatory and missing
     * @return	int								1 if array_options set, 0 if no value, -1 if error (field required missing for example)
     */
    public function setOptionalsFromPost($extralabels, &$object, $onlykey = '', $todefaultifmissing = 0)
    {
    }
    /**
     * return array_options array of data of extrafields value of object sent by a search form
     *
     * @param  array<string,mixed>|string		$extrafieldsobjectkey  	array of extrafields (old usage) or value of object->table_element (new usage)
     * @param  string			$keysuffix      		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string			$keyprefix      		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @return array<string,mixed>|int<0,0>								array_options set or 0 if no value
     */
    public function getOptionalsFromPost($extrafieldsobjectkey, $keysuffix = '', $keyprefix = '')
    {
    }
    /**
     * Return array with all possible types and labels of extrafields
     *
     * @return string[]
     */
    public static function getListOfTypesLabels()
    {
    }
    /**
     * Return if a value is "empty" for a mandatory vision.
     *
     * @param 	null|int|float|string|array<int|string,mixed>	$v		Value to test
     * @param 	string 	$type	Type of extrafield 'sellist', 'link', 'select', ...
     * @return 	bool			True is value is an empty value, not allowed for a mandatory field.
     */
    public static function isEmptyValue($v, string $type)
    {
    }
}