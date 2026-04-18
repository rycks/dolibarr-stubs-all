<?php

/**
 *    Class to common sellist field
 */
class CommonSellistField extends \CommonField
{
    /**
     * @var string    Url of the AJAX page for get options of the sellist
     */
    public static $ajaxUrl = \DOL_URL_ROOT . '/core/ajax/ajaxfield.php';
    /**
     * @var array<string,array<string,array{label:string,parent:string}>>	Options cached
     */
    public static $options = array();
    /**
     * @var array<int,string> 	Code mapping from ID. For backward compatibility
     */
    const MAP_ID_TO_CODE = array(0 => 'product', 1 => 'supplier', 2 => 'customer', 3 => 'member', 4 => 'contact', 5 => 'bank_account', 6 => 'project', 7 => 'user', 8 => 'bank_line', 9 => 'warehouse', 10 => 'actioncomm', 11 => 'website_page', 12 => 'ticket', 13 => 'knowledgemanagement', 14 => 'fichinter', 16 => 'order', 17 => 'invoice', 20 => 'supplier_order', 21 => 'supplier_invoice');
    /**
     * Get all parameters in the options
     *
     * @param	array<string,mixed>		$options	Options of the field
     * @return	array{all:string,tableName:string,labelFullFields:string[],labelFields:string[],labelAlias:string[],keyField:string,parentName:string,parentFullField:string,parentField:string,parentAlias:string,filter:string,categoryType:string,categoryRoots:string,sortField:string}
     */
    public function getOptionsParams($options)
    {
    }
    /**
     * Get sql info of the full field
     *
     * @param	string	$fullField	Full field (ex: p.test AS label or f(a,b,c) AS label)
     * @return	array{field:string,alias:string}
     */
    public function getSqlFieldInfo($fullField)
    {
    }
    /**
     * Get list of options
     *
     * @param   FieldInfos    											$fieldInfos     Array of properties for field to show
     * @param	string													$key			Key of field
     * @param	bool													$addEmptyValue	Add also empty value if needed
     * @param 	bool													$reload			Force reload options
     * @param	string|array<int,string>								$selectedValues Only selected values
     * @return  array<string,array{label:string,parent:string}>|null					Return null if error
     */
    public function getOptions($fieldInfos, $key, $addEmptyValue = \false, $reload = \false, $selectedValues = array())
    {
    }
}