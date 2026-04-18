<?php

/**
 *    Class to common field
 */
abstract class CommonField
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
     * @var string 	Type
     */
    public $type;
    /**
     * @var string	Label
     */
    public $label;
    /**
     * @var Form|null 	Form handler.
     */
    public static $form;
    /**
     * @var Validate|null 	Validate handler.
     */
    public static $validator;
    /**
     * @var array<int,mixed> 	List of value deemed as empty (null always deemed as empty)
     */
    public $emptyValues = array('', 0, array());
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Set form used for print the field
     *
     * @param	Form	$form	Form handler
     * @return	void
     */
    public static function setForm(&$form)
    {
    }
    /**
     * Set validator used for check the field value
     *
     * @param	Validate	$validator	Validate handler
     * @return	void
     */
    public static function setValidator(&$validator)
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
     * Check if the value is deemed as empty
     *
     * @param	FieldInfos			$fieldInfos		Properties of the field
     * @param	mixed				$value			Value to check (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	array<int,mixed>	$emptyValues	List of value deemed as empty
     * @return	bool
     */
    public function isEmptyValue($fieldInfos, $value, $emptyValues = \null)
    {
    }
    /**
     * Return HTML string to put an input search field into a page
     *
     * @param   FieldInfos		$fieldInfos     Properties of the field
     * @param   string          $key        	Key of field
     * @param   mixed			$value      	Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param   string 			$keyPrefix  	Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$moreCss		Value for css to define style/length of field.
     * @param	string			$moreAttrib		To add more attributes on html input tag
     * @return  string
     */
    public function printInputSearchField($fieldInfos, $key, $value, $keyPrefix = '', $keySuffix = '', $moreCss = '', $moreAttrib = '')
    {
    }
    /**
     * Return HTML string to put an input field into a page
     *
     * @param	FieldInfos		$fieldInfos		Properties of the field
     * @param   string         	$key       		Key of field
     * @param   mixed			$value     		Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param   string 			$keyPrefix 		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$moreCss		Value for css to define style/length of field.
     * @param	string			$moreAttrib		To add more attributes on html input tag
     * @return  string
     */
    public function printInputField($fieldInfos, $key, $value, $keyPrefix = '', $keySuffix = '', $moreCss = '', $moreAttrib = '')
    {
    }
    /**
     * Return HTML string to show a field into a page
     *
     * @param	FieldInfos		$fieldInfos		Properties of the field
     * @param   string          $key       		Key of field
     * @param   mixed			$value     		Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param   string 			$keyPrefix 		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$moreCss		Value for css to define style/length of field.
     * @param	string			$moreAttrib		To add more attributes on html input tag
     * @return  string
     */
    public function printOutputField($fieldInfos, $key, $value, $keyPrefix = '', $keySuffix = '', $moreCss = '', $moreAttrib = '')
    {
    }
    /**
     * Get input CSS
     *
     * @param   FieldInfos		$fieldInfos     Properties of the field
     * @param	string			$moreCss 		Value for css to define style/length of field.
     * @param	string			$defaultCss		Default value for css to define style/length of field.
     * @return  string
     * @see self::printInputSearchField(), self::printInputField()
     */
    public function getInputCss($fieldInfos, $moreCss = '', $defaultCss = 'minwidth400')
    {
    }
    /**
     * Verify if the field value is valid
     *
     * @param   FieldInfos		$fieldInfos		Properties of the field
     * @param	string			$key			Key of field
     * @param	mixed			$value     		Value to check (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @return  bool
     * @see self::printInputField()
     */
    public function verifyFieldValue($fieldInfos, $key, $value)
    {
    }
    /**
     * Verify if the field value from GET/POST is valid
     *
     * @param   FieldInfos			$fieldInfos		Properties of the field
     * @param	string				$key        	Key of field
     * @param	string				$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string				$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @return  bool
     * @see self::printInputField()
     */
    public function verifyPostFieldValue($fieldInfos, $key, $keyPrefix = '', $keySuffix = '')
    {
    }
    /**
     * Get field value from GET/POST
     *
     * @param   FieldInfos		$fieldInfos		Properties of the field
     * @param   string      	$key        	Key of field
     * @param   mixed  			$defaultValue   Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @return  mixed
     * @see self::printInputField()
     */
    public function getPostFieldValue($fieldInfos, $key, $defaultValue = \null, $keyPrefix = '', $keySuffix = '')
    {
    }
    /**
     * Get search field value from GET/POST
     *
     * @param   FieldInfos		$fieldInfos		Properties of the field
     * @param   string          $key        	Key of field
     * @param   mixed			$defaultValue   Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param	string			$keyPrefix		Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param	string			$keySuffix		Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @return  mixed
     * @see self::printInputSearchField()
     */
    public function getPostSearchFieldValue($fieldInfos, $key, $defaultValue = \null, $keyPrefix = '', $keySuffix = '')
    {
    }
    /**
     * Get sql filter for search field
     *
     * @param   FieldInfos		$fieldInfos		Properties of the field
     * @param   string          $key        	Key of field
     * @param	mixed			$value			Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @return  string
     * @see self::printInputSearchField(), self::getPostSearchFieldValue()
     */
    public function sqlFilterSearchField($fieldInfos, $key, $value)
    {
    }
}