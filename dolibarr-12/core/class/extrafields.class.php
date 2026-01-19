<?php

/* Copyright (C) 2002-2003  Rodolphe Quiedeville    <rodolphe@quiedeville.org>
 * Copyright (C) 2002-2003  Jean-Louis Bergamo      <jlb@j1b.org>
 * Copyright (C) 2004       Sebastien Di Cintio     <sdicintio@ressource-toi.org>
 * Copyright (C) 2004       Benoit Mortier          <benoit.mortier@opensides.be>
 * Copyright (C) 2009-2012  Laurent Destailleur     <eldy@users.sourceforge.net>
 * Copyright (C) 2009-2012  Regis Houssin           <regis.houssin@inodbox.com>
 * Copyright (C) 2013       Florian Henry           <forian.henry@open-concept.pro>
 * Copyright (C) 2015       Charles-Fr BENKE        <charles.fr@benke.fr>
 * Copyright (C) 2016       Raphaël Doursenaud      <rdoursenaud@gpcsolutions.fr>
 * Copyright (C) 2017       Nicolas ZABOURI         <info@inovea-conseil.com>
 * Copyright (C) 2018-2019  Frédéric France         <frederic.france@netlogic.fr>
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
     * @var array Array with type of element (for what object is the extrafield)
     * @deprecated
     */
    public $attribute_elementtype;
    /**
     * @var array Array with type of the extra field
     * @deprecated
     */
    public $attribute_type;
    /**
     * @var array Array with label of extra field
     * @deprecated
     */
    public $attribute_label;
    /**
     * @var array Array with size of extra field
     * @deprecated
     */
    public $attribute_size;
    /**
     * @var array Array with list of possible values for some types of extra fields
     * @deprecated
     */
    public $attribute_choice;
    /**
     * @var array Array to store compute formula for computed fields
     * @deprecated
     */
    public $attribute_computed;
    /**
     * @var array Array to store default value
     * @deprecated
     */
    public $attribute_default;
    /**
     * @var array Array to store if attribute is unique or not
     * @deprecated
     */
    public $attribute_unique;
    /**
     * @var array Array to store if attribute is required or not
     * @deprecated
     */
    public $attribute_required;
    /**
     * @var array Array to store parameters of attribute (used in select type)
     * @deprecated
     */
    public $attribute_param;
    /**
     * @var array Array to store position of attribute
     * @deprecated
     */
    public $attribute_pos;
    /**
     * @var array Array to store if attribute is editable regardless of the document status
     * @deprecated
     */
    public $attribute_alwayseditable;
    /**
     * @var array Array to store permission to check
     * @deprecated
     */
    public $attribute_perms;
    /**
     * @var array Array to store language file to translate label of values
     * @deprecated
     */
    public $attribute_langfile;
    /**
     * @var array Array to store if field is visible by default on list
     * @deprecated
     */
    public $attribute_list;
    /**
     * @var array New array to store extrafields definition
     */
    public $attributes;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Array of Error code (or message)
     */
    public $errors = array();
    /**
     * @var string DB Error number
     */
    public $errno;
    public static $type2label = array('varchar' => 'String1Line', 'text' => 'TextLongNLines', 'html' => 'HtmlText', 'int' => 'Int', 'double' => 'Float', 'date' => 'Date', 'datetime' => 'DateAndTime', 'boolean' => 'Boolean', 'price' => 'ExtrafieldPrice', 'phone' => 'ExtrafieldPhone', 'mail' => 'ExtrafieldMail', 'url' => 'ExtrafieldUrl', 'password' => 'ExtrafieldPassword', 'select' => 'ExtrafieldSelect', 'sellist' => 'ExtrafieldSelectList', 'radio' => 'ExtrafieldRadio', 'checkbox' => 'ExtrafieldCheckBox', 'chkbxlst' => 'ExtrafieldCheckBoxFromList', 'link' => 'ExtrafieldLink', 'separate' => 'ExtrafieldSeparator');
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
     *  @param  string			$type               Type of attribute ('boolean','int','varchar','text','html','date','datehour','price','phone','mail','password','url','select','checkbox','separate',...)
     *  @param  int				$pos                Position of attribute
     *  @param  string			$size               Size/length definition of attribute ('5', '24,8', ...). For float, it contains 2 numeric separated with a comma.
     *  @param  string			$elementtype        Element type. Same value than object->table_element (Example 'member', 'product', 'thirdparty', ...)
     *  @param	int				$unique				Is field unique or not
     *  @param	int				$required			Is field required or not
     *  @param	string			$default_value		Defaulted value (In database. use the default_value feature for default value on screen. Example: '', '0', 'null', 'avalue')
     *  @param  array|string	$param				Params for field (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int				$alwayseditable		Is attribute always editable regardless of the document status
     *  @param	string			$perms				Permission to check
     *  @param	string			$list				Visibilty ('0'=never visible, '1'=visible on list+forms, '2'=list only, '3'=form only or 'eval string')
     *  @param	string			$help				Text with help tooltip
     *  @param  string  		$computed           Computed value
     *  @param  string  		$entity    		 	Entity of extrafields (for multicompany modules)
     *  @param  string  		$langfile  		 	Language file
     *  @param  string  		$enabled  		 	Condition to have the field enabled or not
     *  @param	int				$totalizable		Is a measure. Must show a total on lists
     *  @param  int             $printable        Is extrafield displayed on PDF
     *  @return int      							<=0 if KO, >0 if OK
     */
    public function addExtraField($attrname, $label, $type, $pos, $size, $elementtype, $unique = 0, $required = 0, $default_value = '', $param = '', $alwayseditable = 0, $perms = '', $list = '-1', $help = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0)
    {
    }
    /**
     *	Add a new optional attribute.
     *  This is a private method. For public method, use addExtraField.
     *
     *	@param	string	$attrname			code of attribute
     *  @param	int		$type				Type of attribute ('boolean', 'int', 'varchar', 'text', 'html', 'date', 'datehour','price','phone','mail','password','url','select','checkbox', ...)
     *  @param	string	$length				Size/length of attribute ('5', '24,8', ...)
     *  @param  string	$elementtype        Element type ('member', 'product', 'thirdparty', 'contact', ...)
     *  @param	int		$unique				Is field unique or not
     *  @param	int		$required			Is field required or not
     *  @param  string  $default_value		Default value for field (in database)
     *  @param  array	$param				Params for field  (ex for select list : array('options'=>array('value'=>'label of option'))
     *  @param	string	$perms				Permission
     *	@param	string	$list				Into list view by default
     *  @param  string  $computed           Computed value
     *  @param	string	$help				Help on tooltip
     *  @return int      	           		<=0 if KO, >0 if OK
     */
    private function create($attrname, $type = 'varchar', $length = 255, $elementtype = 'member', $unique = 0, $required = 0, $default_value = '', $param = '', $perms = '', $list = '0', $computed = '', $help = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add description of a new optional attribute
     *
     *	@param	string			$attrname		code of attribute
     *	@param	string			$label			label of attribute
     *  @param	int				$type			Type of attribute ('int', 'varchar', 'text', 'html', 'date', 'datehour', 'float')
     *  @param	int				$pos			Position of attribute
     *  @param	string			$size			Size/length of attribute ('5', '24,8', ...)
     *  @param  string			$elementtype	Element type ('member', 'product', 'thirdparty', ...)
     *  @param	int				$unique			Is field unique or not
     *  @param	int				$required		Is field required or not
     *  @param  array|string	$param			Params for field  (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int				$alwayseditable	Is attribute always editable regardless of the document status
     *  @param	string			$perms			Permission to check
     *  @param	string			$list			Visibily
     *  @param	string			$help			Help on tooltip
     *  @param  string          $default        Default value (in database. use the default_value feature for default value on screen).
     *  @param  string          $computed       Computed value
     *  @param  string          $entity     	Entity of extrafields
     *  @param	string			$langfile		Language file
     *  @param  string  		$enabled  		Condition to have the field enabled or not
     *  @param	int				$totalizable	Is a measure. Must show a total on lists
     *  @param  int             $printable        Is extrafield displayed on PDF
     *  @return	int								<=0 if KO, >0 if OK
     *  @throws Exception
     */
    private function create_label($attrname, $label = '', $type = '', $pos = 0, $size = 0, $elementtype = 'member', $unique = 0, $required = 0, $param = '', $alwayseditable = 0, $perms = '', $list = '-1', $help = '', $default = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0)
    {
    }
    /**
     *	Delete an optional attribute
     *
     *	@param	string	$attrname		Code of attribute to delete
     *  @param  string	$elementtype    Element type ('member', 'product', 'thirdparty', 'contact', ...)
     *  @return int              		< 0 if KO, 0 if nothing is done, 1 if OK
     */
    public function delete($attrname, $elementtype = 'member')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Delete description of an optional attribute
     *
     *	@param	string	$attrname			Code of attribute to delete
     *  @param  string	$elementtype        Element type ('member', 'product', 'thirdparty', ...)
     *  @return int              			< 0 if KO, 0 if nothing is done, 1 if OK
     */
    private function delete_label($attrname, $elementtype = 'member')
    {
    }
    /**
     * 	Modify type of a personalized attribute
     *
     *  @param	string	$attrname			Name of attribute
     *  @param	string	$label				Label of attribute
     *  @param	string	$type				Type of attribute ('boolean', 'int', 'varchar', 'text', 'html', 'date', 'datehour','price','phone','mail','password','url','select','checkbox', ...)
     *  @param	int		$length				Length of attribute
     *  @param  string	$elementtype        Element type ('member', 'product', 'thirdparty', 'contact', ...)
     *  @param	int		$unique				Is field unique or not
     *  @param	int		$required			Is field required or not
     *  @param	int		$pos				Position of attribute
     *  @param  array	$param				Params for field (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int		$alwayseditable		Is attribute always editable regardless of the document status
     *  @param	string	$perms				Permission to check
     *  @param	string	$list				Visibility
     *  @param	string	$help				Help on tooltip
     *  @param  string  $default            Default value (in database. use the default_value feature for default value on screen).
     *  @param  string  $computed           Computed value
     *  @param  string  $entity	            Entity of extrafields
     *  @param	string	$langfile			Language file
     *  @param  string  $enabled  			Condition to have the field enabled or not
     *  @param  int     $totalizable        Is extrafield totalizable on list
     *  @param  int     $printable        Is extrafield displayed on PDF
     * 	@return	int							>0 if OK, <=0 if KO
     *  @throws Exception
     */
    public function update($attrname, $label, $type, $length, $elementtype, $unique = 0, $required = 0, $pos = 0, $param = '', $alwayseditable = 0, $perms = '', $list = '', $help = '', $default = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Modify description of personalized attribute
     *
     *  @param	string	$attrname			Name of attribute
     *  @param	string	$label				Label of attribute
     *  @param  string	$type               Type of attribute
     *  @param  int		$size		        Length of attribute
     *  @param  string	$elementtype		Element type ('member', 'product', 'thirdparty', ...)
     *  @param	int		$unique				Is field unique or not
     *  @param	int		$required			Is field required or not
     *  @param	int		$pos				Position of attribute
     *  @param  array	$param				Params for field  (ex for select list : array('options' => array(value'=>'label of option')) )
     *  @param  int		$alwayseditable		Is attribute always editable regardless of the document status
     *  @param	string	$perms				Permission to check
     *  @param	string	$list				Visiblity
     *  @param	string	$help				Help on tooltip.
     *  @param  string  $default            Default value (in database. use the default_value feature for default value on screen).
     *  @param  string  $computed           Computed value
     *  @param  string  $entity     		Entity of extrafields
     *  @param	string	$langfile			Language file
     *  @param  string  $enabled  			Condition to have the field enabled or not
     *  @param  int     $totalizable        Is extrafield totalizable on list
     *  @param  int     $printable        Is extrafield displayed on PDF
     *  @return	int							<=0 if KO, >0 if OK
     *  @throws Exception
     */
    private function update_label($attrname, $label, $type, $size, $elementtype, $unique = 0, $required = 0, $pos = 0, $param = '', $alwayseditable = 0, $perms = '', $list = '0', $help = '', $default = '', $computed = '', $entity = '', $langfile = '', $enabled = '1', $totalizable = 0, $printable = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Load array this->attributes, or old this->attribute_xxx like attribute_label, attribute_type, ...
     *
     * 	@param	string		$elementtype		Type of element ('' = all or $object->table_element like 'adherent', 'commande', 'thirdparty', 'facture', 'propal', 'product', ...).
     * 	@param	boolean		$forceload			Force load of extra fields whatever is status of cache.
     * 	@return	array							Array of attributes keys+label for all extra fields.
     */
    public function fetch_name_optionals_label($elementtype, $forceload = \false)
    {
    }
    /**
     * Return HTML string to put an input field into a page
     * Code very similar with showInputField of common object
     *
     * @param  string  $key            			Key of attribute
     * @param  string  $value          			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value)
     * @param  string  $moreparam      			To add more parametes on html input tag
     * @param  string  $keysuffix      			Prefix string to add after name and id of field (can be used to avoid duplicate names)
     * @param  string  $keyprefix      			Suffix string to add before name and id of field (can be used to avoid duplicate names)
     * @param  string  $morecss        			More css (to defined size of field. Old behaviour: may also be a numeric)
     * @param  int     $objectid       			Current object id
     * @param  string  $extrafieldsobjectkey	If defined (for example $object->table_element), use the new method to get extrafields data
     * @param  string  $mode                    1=Used for search filters
     * @return string
     */
    public function showInputField($key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '', $objectid = 0, $extrafieldsobjectkey = '', $mode = 0)
    {
    }
    /**
     * Return HTML string to put an output field into a page
     *
     * @param   string	$key            		Key of attribute
     * @param   string	$value          		Value to show
     * @param	string	$moreparam				To add more parameters on html input tag (only checkbox use html input for output rendering)
     * @param	string	$extrafieldsobjectkey	If defined (for example $object->table_element), function uses the new method to get extrafields data
     * @return	string							Formated value
     */
    public function showOutputField($key, $value, $moreparam = '', $extrafieldsobjectkey = '')
    {
    }
    /**
     * Return tag to describe alignement to use for this extrafield
     *
     * @param   string	$key            		Key of attribute
     * @param	string	$extrafieldsobjectkey	If defined, use the new method to get extrafields data
     * @return	string							Formated value
     */
    public function getAlignFlag($key, $extrafieldsobjectkey = '')
    {
    }
    /**
     * Return HTML string to print separator extrafield
     *
     * @param   string	$key            Key of attribute
     * @param	string	$object			Object
     * @param	int		$colspan		Value of colspan to use (it must includes the first column with title)
     * @return 	string					HTML code with line for separator
     */
    public function showSeparator($key, $object, $colspan = 2)
    {
    }
    /**
     * Fill array_options property of object by extrafields value (using for data sent by forms)
     *
     * @param   array	$extralabels    Deprecated (old $array of extrafields, now set this to null)
     * @param   object	$object         Object
     * @param	string	$onlykey		Only some keys are filled:$this
     *                                  'string' => When we make update of only one extrafield ($action = 'update_extras'), calling page can set this to avoid to have other extrafields being reset.
     *                                  '@GETPOSTISSET' => When we make update of extrafields ($action = 'update'), calling page can set this to avoid to have fields not into POST being reset.
     * @return	int						1 if array_options set, 0 if no value, -1 if error (field required missing for example)
     */
    public function setOptionalsFromPost($extralabels, &$object, $onlykey = '')
    {
    }
    /**
     * return array_options array of data of extrafields value of object sent by a search form
     *
     * @param  array|string		$extrafieldsobjectkey  	array of extrafields (old usage) or value of object->table_element (new usage)
     * @param  string			$keyprefix      		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string			$keysuffix      		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @return array|int								array_options set or 0 if no value
     */
    public function getOptionalsFromPost($extrafieldsobjectkey, $keyprefix = '', $keysuffix = '')
    {
    }
}