<?php

/**
 *    Class to manage fields
 */
class FieldsManager
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
     * @var string[] Array of Error code (or message)
     */
    public $errors = array();
    /**
     * @var array<string,string>	To store error results of ->validateField()
     */
    public $validateFieldsErrors = array();
    /**
     * @var string Path to fields classes
     */
    public $fieldsPath = '/core/class/fields/';
    /**
     * @var array<string,CommonField> Field classes cached
     */
    public static $fieldClasses = array();
    /**
     * @var array<string,array<string,array{object:array<string,FieldInfos>,extraField:array<string,FieldInfos>}>> Field infos cached (array<element,array<mode,{object:array<fieldKey,fieldInfos>,extraField:array<fieldKey,fieldInfos>}>>)
     */
    public static $fieldInfos = array();
    /**
     * @var array<string,bool|int<0,1>>|null	Array with boolean of status of groups
     */
    public $expand_display = array();
    ///**
    // * @var array<string,string>    Array of type to label
    // */
    //public static $type2label = array(
    //	'varchar' => 'String1Line',
    //	'text' => 'TextLongNLines',
    //	'html' => 'HtmlText',
    //	'int' => 'Int',
    //	'double' => 'Float',
    //	'date' => 'Date',
    //	'datetime' => 'DateAndTime',
    //	'duration' => 'Duration',
    //	//'datetimegmt'=>'DateAndTimeUTC',
    //	'boolean' => 'Boolean',
    //	'price' => 'ExtrafieldPrice',
    //	'pricecy' => 'ExtrafieldPriceWithCurrency',
    //	'phone' => 'ExtrafieldPhone',
    //	'email' => 'ExtrafieldMail',
    //	'url' => 'ExtrafieldUrl',
    //	'ip' => 'ExtrafieldIP',
    //	'icon' => 'Icon',
    //	'password' => 'ExtrafieldPassword',
    //	'radio' => 'ExtrafieldRadio',
    //	'select' => 'ExtrafieldSelect',
    //	'sellist' => 'ExtrafieldSelectList',
    //	'checkbox' => 'ExtrafieldCheckBox',
    //	'chkbxlst' => 'ExtrafieldCheckBoxFromList',
    //	'link' => 'ExtrafieldLink',
    //	'point' => 'ExtrafieldPointGeo',
    //	'multipts' => 'ExtrafieldMultiPointGeo',
    //	'linestrg' => 'ExtrafieldLinestringGeo',
    //	'polygon' => 'ExtrafieldPolygonGeo',
    //	'separate' => 'ExtrafieldSeparator',
    //	'stars' => 'ExtrafieldStars',
    //	//'real' => 'ExtrafieldReal',
    //);
    /**
     *    Constructor
     *
     * @param DoliDB		$db 		Database handler
     * @param Form|null		$form		Specific form handler
     */
    public function __construct($db, $form = \null)
    {
    }
    /**
     * Get field handler for the provided type
     *
     * @param	string				$type		Field type
     * @return	CommonField|null
     */
    public function getFieldClass($type)
    {
    }
    /**
     * Get all fields handler available
     *
     * @return	array<string,CommonField>
     */
    public function getAllFields()
    {
    }
    /**
     * clear errors
     *
     * @return	void
     */
    public function clearErrors()
    {
    }
    /**
     * Method to output saved errors
     *
     * @param   string      $separator      Separator between each error
     * @return	string		                String with errors
     */
    public function errorsToString($separator = ', ')
    {
    }
    /**
     * clear validation message result for a field
     *
     * @param	string	$fieldKey	Key of attribute to clear
     * @return	void
     */
    public function clearFieldError($fieldKey)
    {
    }
    /**
     * set validation error message a field
     *
     * @param	string	$fieldKey	Key of attribute
     * @param	string	$msg		the field error message
     * @return	void
     */
    public function setFieldError($fieldKey, $msg = '')
    {
    }
    /**
     * get field error message
     *
     * @param	string	$fieldKey	Key of attribute
     * @return	string              Error message of validation ('' if no error)
     */
    public function getFieldError($fieldKey)
    {
    }
    /**
     * get field error icon
     *
     * @param  string  $fieldValidationErrorMsg	message to add in tooltip
     * @return string							html output
     */
    public function getFieldErrorIcon($fieldValidationErrorMsg)
    {
    }
    /**
     *	Get list of fields infos for the provided mode into X columns
     *
     * @param	CommonObject																				$object			Object handler
     * @param	ExtraFields																					$extrafields	ExtraFields handler
     * @param	string																						$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	int																							$nbColumn		Split fields infos into X columns
     * @param	array<int,string>																			$breakKeys		Key used for break on each column (ex: array(1 => 'total_ht', ...))
     * @param	array<string,mixed>																			$params			Other params
     * @return	array{columns:array<int,array<string,FieldInfos>>,hiddenFields:array<string,FieldInfos>}					List of fields info by column and hidden
     */
    public function getAllFieldsInfos(&$object, &$extrafields = \null, $mode = 'view', $nbColumn = 2, $breakKeys = array(), $params = array())
    {
    }
    /**
     *	Get list of object fields infos
     *
     * @param	CommonObject				$object			Object handler
     * @param	string						$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>			$params			Other params
     * @return	array<string,FieldInfos>					List of fields infos
     */
    public function getAllObjectFieldsInfos(&$object, $mode = 'view', $params = array())
    {
    }
    /**
     *	Get list of extra fields infos
     *
     * @param	CommonObject					$object			Object handler
     * @param	ExtraFields						$extrafields	ExtraFields handler
     * @param	string							$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>				$params			Other params
     * @return  array<string,FieldInfos>                    	List of fields infos
     */
    public function getAllExtraFieldsInfos(&$object, &$extrafields = \null, $mode = 'view', $params = array())
    {
    }
    /**
     *	Get list of fields infos for the provided mode into X columns
     *
     * @param	string					$key			Field key (begin by object_ for object or options_ for extrafields)
     * @param	CommonObject			$object			Object handler
     * @param	ExtraFields				$extrafields	ExtraFields handler
     * @param	string					$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>		$params			Other params
     * @return	FieldInfos|null							Get field info or null if not found
     */
    public function getFieldsInfos($key, &$object, &$extrafields = \null, $mode = 'view', $params = array())
    {
    }
    /**
     * Get field infos from object field infos
     *
     * @param	CommonObject			$object		Object handler
     * @param	string					$key		Field key
     * @param	string					$mode		Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>		$params		Other params
     * @return	FieldInfos|null						Properties of the field or null if field not found
     */
    public function getFieldInfosFromObjectField(&$object, $key, $mode = 'view', $params = array())
    {
    }
    /**
     * Get field infos from extra field infos
     *
     * @param	CommonObject			$object			Object handler
     * @param	ExtraFields				$extrafields	Extrafields handler
     * @param	string					$key			Field key
     * @param	string					$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>		$params			Other params
     * @return	FieldInfos|null							Properties of the field or null if not found
     */
    public function getFieldInfosFromExtraField(&$object, &$extrafields, $key, $mode = 'view', $params = array())
    {
    }
    /**
     * Set common field infos
     *
     * @param	FieldInfos				$fieldInfos		Field infos to set with common infos
     * @param	CommonObject			$object			Object handler
     * @param	ExtraFields				$extrafields	Extrafields handler
     * @param	string					$key			Field key
     * @param	string					$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param 	string					$enabled		Condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     * @param 	string					$visibility		Condition when the field must be visible (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form (not create). 5=Visible on list and view form (not create/not update). 6=visible on list and update/view form (not create). Using a negative value means field is not shown by default on list but can be selected for viewing)
     * @param 	string					$perms			Condition when the field must be editable
     * @param	array<string,mixed>		$params			Other params
     * @return	void
     */
    public function setCommonFieldInfos(&$fieldInfos, &$object, &$extrafields, $key, $mode = 'view', $enabled = '1', $visibility = '', $perms = \null, $params = array())
    {
    }
    /**
     * Set all values of the object (with extra field) from POST
     *
     * @param	CommonObject			$object			Object handler
     * @param	ExtraFields				$extrafields	Extrafields handler
     * @param	string					$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string					$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string					$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>		$params			Other params
     * @return	int										Result <0 if KO, >0 if OK
     */
    public function setFieldValuesFromPost(&$object, &$extrafields, $keyPrefix = '', $keySuffix = '', $mode = 'view', $params = array())
    {
    }
    /**
     * Set all object values of the object from POST
     *
     * @param	CommonObject			$object			Object handler
     * @param	string					$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string					$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string					$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>		$params			Other params
     * @return  int                                     Result <0 if KO, >0 if OK
     */
    public function setObjectFieldValuesFromPost(&$object, $keyPrefix = '', $keySuffix = '', $mode = 'view', $params = array())
    {
    }
    /**
     * Set all extra field values of the object from POST
     *
     * @param	CommonObject			$object			Object handler
     * @param	ExtraFields				$extrafields	Extrafields handler
     * @param	string					$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string					$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string					$mode			Get the fields infos for the provided mode ('create', 'edit', 'view', 'list')
     * @param	array<string,mixed>		$params			Other params
     * @return  int                                     Result <0 if KO, >0 if OK
     */
    public function setExtraFieldValuesFromPost(&$object, &$extrafields, $keyPrefix = '', $keySuffix = '', $mode = 'view', $params = array())
    {
    }
    /**
     * Verify if the field value is valid
     *
     * @param   FieldInfos		$fieldInfos     Properties of the field
     * @param	string			$key			Key of attribute
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @return  bool
     */
    public function verifyPostFieldValue($fieldInfos, $key, $keyPrefix = '', $keySuffix = '')
    {
    }
    /**
     * Verify if the field value is valid
     *
     * @param   FieldInfos		$fieldInfos		Properties of the field
     * @param	string			$key			Key of field
     * @param	mixed			$value     		Value to check (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @return  bool
     */
    public function verifyFieldValue($fieldInfos, $key, $value)
    {
    }
    /**
     * Get field value from GET/POST
     *
     * @param   FieldInfos		$fieldInfos     Properties of the field
     * @param   string          $key        	Key of field
     * @param   mixed			$defaultValue   Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @return  mixed
     */
    public function getPostFieldValue($fieldInfos, $key, $defaultValue = \null, $keyPrefix = '', $keySuffix = '')
    {
    }
    /**
     * Get search field value from GET/POST
     *
     * @param   FieldInfos		$fieldInfos     Properties of the field
     * @param   string      	$key        	Key of field
     * @param   mixed			$defaultValue   Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @return  mixed
     */
    public function getPostSearchFieldValue($fieldInfos, $key, $defaultValue = \null, $keyPrefix = '', $keySuffix = '')
    {
    }
    /**
     * Return HTML string to put an input search field into a page
     *
     * @param	FieldInfos		$fieldInfos     Properties of the field
     * @param	string 			$key			Key of attribute
     * @param	mixed		 	$value			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$moreCss		Value for css to define style/length of field.
     * @param	string			$moreAttrib		To add more attributes on html input tag
     * @param	int<0,1> 		$noNewButton	Force to not show the new button on field that are links to object
     * @return	string
     */
    public function printInputSearchField($fieldInfos, $key, $value, $keyPrefix = '', $keySuffix = '', $moreCss = '', $moreAttrib = '', $noNewButton = 0)
    {
    }
    /**
     * Return HTML string to put an input field into a page
     *
     * @param	FieldInfos		$fieldInfos     Properties of the field
     * @param	string 			$key			Key of attribute
     * @param	mixed		 	$value			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$moreCss		Value for css to define style/length of field.
     * @param	string			$moreAttrib		To add more attributes on html input tag
     * @param	int<0,1> 		$noNewButton	Force to not show the new button on field that are links to object
     * @return	string
     */
    public function printInputField($fieldInfos, $key, $value, $keyPrefix = '', $keySuffix = '', $moreCss = '', $moreAttrib = '', $noNewButton = 0)
    {
    }
    /**
     * Return HTML string to show a field into a page
     *
     * @param	FieldInfos		$fieldInfos     Properties of the field
     * @param	string			$key			Key of attribute
     * @param	mixed			$value			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$moreCss		Value for css to define style/length of field.
     * @param	string			$moreAttrib		To add more attributes on html input tag
     * @return	string
     */
    public function printOutputField($fieldInfos, $key, $value, $keyPrefix = '', $keySuffix = '', $moreCss = '', $moreAttrib = '')
    {
    }
    /**
     * Return HTML string to print separator field
     *
     * @param   string	$key            Key of attribute
     * @param	object	$object			Object
     * @param	int		$colspan		Value of colspan to use (it must include the first column with title)
     * @param	string	$display_type	"card" for form display, "line" for document line display
     * @param 	string  $mode           Show output ('view') or input ('create' or 'edit') for field
     * @return 	string					HTML code with line for separator
     */
    public function printSeparator($key, &$object, $colspan = 2, $display_type = 'card', $mode = 'view')
    {
    }
}