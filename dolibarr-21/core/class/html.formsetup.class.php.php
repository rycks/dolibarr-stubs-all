<?php

/* Copyright (C) 2021  John BOTELLA    <john.botella@atm-consulting.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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
 * This class help you create setup render
 */
class FormSetup
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /** @var int */
    public $entity;
    /** @var FormSetupItem[]  */
    public $items = array();
    /**
     * @var int
     */
    public $setupNotEmpty = 0;
    /** @var Translate */
    public $langs;
    /** @var Form */
    public $form;
    /** @var int */
    protected $maxItemRank;
    /**
     * this is an html string display before output form
     * @var string
     */
    public $htmlBeforeOutputForm = '';
    /**
     * this is an html string display after output form
     * @var string
     */
    public $htmlAfterOutputForm = '';
    /**
     * this is an html string display on buttons zone
     * @var string
     */
    public $htmlOutputMoreButton = '';
    /**
     *
     * @var array<string,string>
     */
    public $formAttributes = array(
        'action' => '',
        // set in __construct
        'method' => 'POST',
    );
    /**
     * an list of hidden inputs used only in edit mode
     * @var array<string,string>  Currently array{token:string,action:string}
     */
    public $formHiddenInputs = array();
    /**
     * @var string[] $errors
     */
    public $errors = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     * @param Translate $outputLangs if needed can use another lang
     */
    public function __construct($db, $outputLangs = \null)
    {
    }
    /**
     * Generate an attributes string form an input array
     *
     * @param 	array<string,mixed|mixed[]|Object>	$attributes 	an array of attributes keys and values,
     * @return 	string					attribute string
     */
    public static function generateAttributesStringFromArray($attributes)
    {
    }
    /**
     * Generate the form (in read or edit mode depending on $editMode)
     *
     * @param 	bool 	$editMode 	true will display output on edit mod
     * @param	bool	$hideTitle	True to hide the first title line
     * @return 	string				Html output
     */
    public function generateOutput($editMode = \false, $hideTitle = \false)
    {
    }
    /**
     * generateTableOutput
     *
     * @param 	bool 	$editMode 	True will display output on edit modECM
     * @param	bool	$hideTitle	True to hide the first title line
     * @return 	string				Html output
     */
    public function generateTableOutput($editMode = \false, $hideTitle = \false)
    {
    }
    /**
     * saveConfFromPost
     *
     * @param 	bool 		$noMessageInUpdate display event message on errors and success
     * @return	int|null    Return -1 if KO, 1 if OK, null if no items
     */
    public function saveConfFromPost($noMessageInUpdate = \false)
    {
    }
    /**
     * generateLineOutput
     *
     * @param 	FormSetupItem 	$item 		the setup item
     * @param 	bool 			$editMode 	Display as edit mod
     * @return 	string 						the html output for an setup item
     */
    public function generateLineOutput($item, $editMode = \false)
    {
    }
    /**
     * Method used to test  module builder conversion to this form usage
     *
     * @param 	array<array<string,null|int|float|string>> 	$params 	an array of arrays of params from old modulBuilder params
     * @return 	boolean
     */
    public function addItemsFromParamsArray($params)
    {
    }
    /**
     * From old
     * Method was used to test  module builder conversion to this form usage.
     *
     * @param 	string 	$confKey 	the conf name to store
     * @param 	array<string,null|int|float|string> 	$params 	an array of params from old modulBuilder params
     * @return 	bool
     */
    public function addItemFromParams($confKey, $params)
    {
    }
    /**
     * Used to export param array for /core/actions_setmoduleoptions.inc.php template
     * Method exists only for manage setup conversion
     *
     * @return array<string,array{type:string,enabled:int<0,1>}> $arrayofparameters for /core/actions_setmoduleoptions.inc.php
     */
    public function exportItemsAsParamsArray()
    {
    }
    /**
     * Reload for each item default conf
     * note: this will override custom configuration
     *
     * @return bool
     */
    public function reloadConfs()
    {
    }
    /**
     * Create a new item
     * The target is useful with hooks : that allow externals modules to add setup items on good place
     *
     * @param string	$confKey 				the conf key used in database
     * @param string	$targetItemKey    		target item used to place the new item beside
     * @param bool		$insertAfterTarget		insert before or after target item ?
     * @return FormSetupItem 					the new setup item created
     */
    public function newItem($confKey, $targetItemKey = '', $insertAfterTarget = \false)
    {
    }
    /**
     * Sort items according to rank
     *
     * @return bool
     */
    public function sortingItems()
    {
    }
    /**
     * getCurentItemMaxRank
     *
     * @param bool $cache To use cache or not
     * @return int
     */
    public function getCurentItemMaxRank($cache = \true)
    {
    }
    /**
     * set new max rank if needed
     *
     * @param 	int 		$rank 	the item rank
     * @return 	int|void			new max rank
     */
    public function setItemMaxRank($rank)
    {
    }
    /**
     * get item position rank from item key
     *
     * @param	string		$itemKey    	the item key
     * @return	int         				rank on success and -1 on error
     */
    public function getLineRank($itemKey)
    {
    }
    /**
     *  uasort callback function to Sort params items
     *
     *  @param	FormSetupItem	$a  formSetup item
     *  @param	FormSetupItem	$b  formSetup item
     *  @return	int					Return compare result
     */
    public function itemSort(\FormSetupItem $a, \FormSetupItem $b)
    {
    }
}
/**
 * This class help to create item for class formSetup
 */
class FormSetupItem
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /** @var Translate */
    public $langs;
    /** @var int */
    public $entity;
    /** @var Form */
    public $form;
    /** @var string $confKey the conf key used in database */
    public $confKey;
    /** @var string|false $nameText */
    public $nameText = \false;
    /** @var string $helpText */
    public $helpText = '';
    /** @var string $picto */
    public $picto = '';
    /** @var ?string $fieldValue */
    public $fieldValue;
    /** @var ?string $defaultFieldValue */
    public $defaultFieldValue = \null;
    /** @var array{name?:string,id?:string,value?:mixed,class?:string,disabled?:?int<0,1>,type?:string,size?:int,placeholder?:string,step?:float|string,min?:int,max?:int}  fields attribute only for compatible fields like input text */
    public $fieldAttr = array();
    /** @var bool|string set this var to override field output will override $fieldInputOverride and $fieldOutputOverride too */
    public $fieldOverride = \false;
    /** @var bool|string set this var to override field input */
    public $fieldInputOverride = \false;
    /** @var bool|string set this var to override field output */
    public $fieldOutputOverride = \false;
    /** @var int $rank  */
    public $rank = 0;
    /** @var array<string,string|array{id:string,label:string,color:string,picto:string,labelhtml:string}> set this var for options on select and multiselect items   */
    public $fieldOptions = array();
    /** @var array<string,string|int|array{id:string,label:string,color:string,picto:string,labelhtml:string}> set this var to add more parameters */
    public $fieldParams = array();
    /** @var callable $saveCallBack  */
    public $saveCallBack;
    /** @var callable $setValueFromPostCallBack  */
    public $setValueFromPostCallBack;
    /**
     * @var string[] $errors
     */
    public $errors = array();
    /**
     * TODO each type must have setAs{type} method to help configuration
     *   And set var as protected when its done configuration must be done by method
     *   this is important for retrocompatibility of future versions
     * @var string $type  'string', 'textarea', 'category:'.Categorie::TYPE_CUSTOMER', 'emailtemplate', 'thirdparty_type'
     */
    protected $type = 'string';
    /** @var int<0,1> */
    public $enabled = 1;
    /**
     * @var string	The css to use on the input field of item
     */
    public $cssClass = '';
    /**
     * Constructor
     *
     * @param string	$confKey	the conf key used in database
     */
    public function __construct($confKey)
    {
    }
    /**
     * load conf value from databases
     *
     * @return bool
     */
    public function loadValueFromConf()
    {
    }
    /**
     * Reload conf value from databases is an alias of loadValueFromConf
     *
     * @deprecated
     * @return bool
     */
    public function reloadValueFromConf()
    {
    }
    /**
     * Save const value based on htdocs/core/actions_setmoduleoptions.inc.php
     *
     * @return     int         			-1 if KO, 1 if OK
     */
    public function saveConfValue()
    {
    }
    /**
     * Set an override function for saving data
     *
     * @param callable $callBack a callable function
     * @return void
     */
    public function setSaveCallBack(callable $callBack)
    {
    }
    /**
     * Set an override function for get data from post
     *
     * @param callable $callBack a callable function
     * @return void
     */
    public function setValueFromPostCallBack(callable $callBack)
    {
    }
    /**
     * Save const value based on htdocs/core/actions_setmoduleoptions.inc.php
     *
     * @return     int         			-1 if KO, 0  nothing to do , 1 if OK
     */
    public function setValueFromPost()
    {
    }
    /**
     * Get help text or generate it
     *
     * @return int|string
     */
    public function getHelpText()
    {
    }
    /**
     * Get field name text or generate it
     *
     * @return false|int|string
     */
    public function getNameText()
    {
    }
    /**
     * generate input field
     *
     * @return bool|string
     */
    public function generateInputField()
    {
    }
    /**
     * Generate default input field
     *
     * @return string
     */
    public function generateInputFieldText()
    {
    }
    /**
     * generate input field for textarea
     *
     * @return string
     */
    public function generateInputFieldTextarea()
    {
    }
    /**
     * generate input field for html
     *
     * @return string
     */
    public function generateInputFieldHtml()
    {
    }
    /**
     * generate input field for categories
     *
     * @return string
     */
    public function generateInputFieldCategories()
    {
    }
    /**
     * generate input field for email template selector
     * @return string
     */
    public function generateInputFieldEmailTemplate()
    {
    }
    /**
     * generate input field for secure key
     *
     * @return string
     */
    public function generateInputFieldSecureKey()
    {
    }
    /**
     * generate input field for a password
     *
     * @param   string  $type  'dolibarr' (dolibarr password rules apply) or 'generic'
     *
     * @return  string
     */
    public function generateInputFieldPassword($type = 'generic')
    {
    }
    /**
     * generateInputFieldMultiSelect
     *
     * @return string
     */
    public function generateInputFieldMultiSelect()
    {
    }
    /**
     * generateInputFieldSelect
     *
     * @return string
     */
    public function generateInputFieldSelect()
    {
    }
    /**
     * @return string
     */
    public function generateInputFieldSelectUser()
    {
    }
    /**
     * get the type : used for old module builder setup conf style conversion and tests
     * because this two class will quickly evolve it's important to not set or get directly $this->type (will be protected) so this method exist
     * to be sure we can manage evolution easily
     *
     * @return string
     */
    public function getType()
    {
    }
    /**
     * set the type from string : used for old module builder setup conf style conversion and tests
     * because this two class will quickly evolve it's important to not set directly $this->type (will be protected) so this method exist
     * to be sure we can manage evolution easily
     *
     * @param 		string 	$type 	Possible values based on old module builder setup : 'string', 'textarea', 'category:'.Categorie::TYPE_CUSTOMER', 'emailtemplate', 'thirdparty_type'
     * @deprecated 					this setTypeFromTypeString came deprecated because it exists only for manage setup conversion
     * @return 		bool
     */
    public function setTypeFromTypeString($type)
    {
    }
    /**
     * Add error
     *
     * @param string[]|string $errors the error text
     * @return null
     */
    public function setErrors($errors)
    {
    }
    /**
     * generateOutputField
     *
     * @return bool|string 		Generate the output html for this item
     */
    public function generateOutputField()
    {
    }
    /**
     * generateOutputFieldMultiSelect
     *
     * @return string
     */
    public function generateOutputFieldMultiSelect()
    {
    }
    /**
     * generateOutputFieldColor
     *
     * @return string
     */
    public function generateOutputFieldColor()
    {
    }
    /**
     * generateInputFieldColor
     *
     * @return string
     */
    public function generateInputFieldColor()
    {
    }
    /**
     * generateOutputFieldSelect
     *
     * @return string
     */
    public function generateOutputFieldSelect()
    {
    }
    /**
     * generateOutputFieldSelectUser
     *
     * @return string
     */
    public function generateOutputFieldSelectUser()
    {
    }
    /*
     * METHODS FOR SETTING DISPLAY TYPE
     */
    /**
     * Set type of input as string
     *
     * @return self
     */
    public function setAsString()
    {
    }
    /**
     * Set type of input as color
     *
     * @return self
     */
    public function setAsColor()
    {
    }
    /**
     * Set type of input as textarea
     *
     * @return self
     */
    public function setAsTextarea()
    {
    }
    /**
     * Set type of input as html editor
     *
     * @return self
     */
    public function setAsHtml()
    {
    }
    /**
     * Set type of input as emailtemplate selector
     *
     * @param string $templateType email template type
     * @return self
     */
    public function setAsEmailTemplate($templateType)
    {
    }
    /**
     * Set type of input as thirdparty_type selector
     *
     * @return self
     */
    public function setAsThirdpartyType()
    {
    }
    /**
     * Set type of input as Yes
     *
     * @return self
     */
    public function setAsYesNo()
    {
    }
    /**
     * Set type of input as secure key
     *
     * @return self
     */
    public function setAsSecureKey()
    {
    }
    /**
     * Set type of input as product
     *
     * @return self
     */
    public function setAsProduct()
    {
    }
    /**
     * Set type of input as a category selector
     * TODO add default value
     *
     * @param	string	$catType		Type of category ('customer', 'supplier', 'contact', 'product', 'member'). Old mode (0, 1, 2, ...) is deprecated.
     * @return	self
     */
    public function setAsCategory($catType)
    {
    }
    /**
     * Set type of input as a simple title. No data to store
     *
     * @return self
     */
    public function setAsTitle()
    {
    }
    /**
     * Set type of input as a simple title. No data to store
     *
     * @param array<string,string|array{id:string,label:string,color:string,picto:string,labelhtml:string}> $fieldOptions A table of field options
     * @return self
     */
    public function setAsMultiSelect($fieldOptions)
    {
    }
    /**
     * Set type of input as a simple title. No data to store
     *
     * @param array<string,string|array{id:string,label:string,color:string,picto:string,labelhtml:string}>  $fieldOptions  A table of field options
     * @return self
     */
    public function setAsSelect($fieldOptions)
    {
    }
    /**
     * Set type of input as a simple title. No data to store
     *
     * @return self
     */
    public function setAsSelectUser()
    {
    }
    /**
     * Set type of input as a simple title. No data to store
     *
     * @return self
     */
    public function setAsSelectBankAccount()
    {
    }
    /**
     * Set type of input as a password with dolibarr password rules apply.
     * Hide entry on display.
     *
     * @return self
     */
    public function setAsPassword()
    {
    }
    /**
     * Set type of input as a generic password without dolibarr password rules (for external passwords for example).
     * Hide entry on display.
     *
     * @return self
     */
    public function setAsGenericPassword()
    {
    }
}