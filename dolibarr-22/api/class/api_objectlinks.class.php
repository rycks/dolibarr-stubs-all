<?php

/**
 * API that gives shows links between objects in an Dolibarr instance.
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class ObjectLinks extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('fk_source', 'sourcetype', 'fk_target', 'targettype');
    /**
     * @var ObjectLink {@type ObjectLink}
     */
    public $objectlink;
    /**
     * @var int		notrigger is default 0, which means to trigger, else set notrigger: 1
     */
    private $notrigger;
    /**
     * Constructor of the class
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a ObjectLink object
     *
     * Return an array with object link information
     *
     * @param   int         $id		ID of objectlink
     * @return  Object				Object with cleaned properties
     * @phan-return		ObjectLink
     * @phpstan-return	ObjectLink
     *
     *
     * @url	GET {id}
     *
     * @throws RestException 403
     * @throws RestException 404
     */
    public function getById($id)
    {
    }
    /**
     * Set a field of $this->objectlink, with proper type
     *
     * @param string		$field	The field to set
     * @param string|float	$value	The "unclean" value
     * @return void					No return value, but field is set in $this->objectlink
     */
    private function _setObjectLinkField($field, $value)
    {
    }
    /**
     *	Create object link
     *
     * 	Examples: Only set "notrigger": 1 because 0 is the default value.
     *  Linking subscriptions for when you sell membership as part of another sale
     *  {"fk_source":"1679","sourcetype":"propal","fk_target":"1233","targettype":"commande"}
     *  {"fk_source":"167","sourcetype":"facture","fk_target":"123","targettype":"subscription"}
     *
     *  @param 		array   $request_data   Request data, see Example above for required parameters. Currently unused is relationtype. notrigger is default 0, which means to trigger, else set notrigger: 1
     * @phan-param ?array<string,string>	$request_data
     * @phpstan-param ?array<string,string>	$request_data
     *  @return		array
     * @phan-return array<array<string,int|string>>
     * @phpstan-return array<array<string,int|string>>
     *
     * @url POST
     *
     * @throws RestException 304
     * @throws RestException 403
     * @throws RestException 500
     */
    public function create($request_data = \null)
    {
    }
    /**
     * Delete an object link
     *
     * @param   int     $id         object link ID
     * @return  array
     * @phan-return array<array<string,int|string>>
     * @phpstan-return array<array<string,int|string>>
     *
     * @url	DELETE {id}
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteById($id)
    {
    }
    /**
     *	GET object link(s) By Values, not id
     *
     *  @param		int		$fk_source		source id of object we link from
     *  @param		string	$sourcetype		type of the source object
     *  @param		int		$fk_target		target id of object we link to
     *  @param		string	$targettype 	type of the target object
     *  @param		string	$relationtype 	type of the relation, usually null
     *  @return		Object
     * @phan-return		ObjectLink
     * @phpstan-return	ObjectLink
     *
     * @url GET
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function getByValues($fk_source, $sourcetype, $fk_target, $targettype, $relationtype = \null)
    {
    }
    /**
     *	Delete object link By Values, not id
     *
     *  @param		int		$fk_source		source id of object we link from
     *  @param		string	$sourcetype		type of the source object
     *  @param		int		$fk_target		target id of object we link to
     *  @param		string	$targettype 	type of the target object
     *  @param		string	$relationtype 	type of the relation, usually null
     *	@param		int     $notrigger	    1=Does not execute triggers, 0=execute triggers {@choice 0,1}
     *  @return		array
     * @phan-return array<array<string,int|string>>
     * @phpstan-return array<array<string,int|string>>
     *
     * @url DELETE
     *
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500
     */
    public function deleteByValues($fk_source, $sourcetype, $fk_target, $targettype, $relationtype = \null, $notrigger = 0)
    {
    }
    /**
     * Get properties of an object link
     *
     * Return an array with object links
     *
     * @param   int         $id             ID of objectlink
     * @return  Object						Object with cleaned properties
     * @phan-return		ObjectLink
     * @phpstan-return	ObjectLink
     *
     * @throws	RestException 403
     * @throws	RestException 404
     */
    private function _fetch($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     	Object to clean
     * @phan-param		ObjectLink	$object
     * @phpstan-param	ObjectLink	$object
     *
     * @return  Object	Object with cleaned properties
     * @phan-return		ObjectLink
     * @phpstan-return	ObjectLink
     */
    protected function _cleanObjectDatas($object)
    {
    }
    // source before modifications was api_orders.class.php
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,null|int|string>	$data   Data to validate
     * @return array<string,null|int|string>			Return array with validated mandatory fields and their value
     * @phan-return array<string,?int|?string>			Return array with validated mandatory fields and their value
     *
     * @throws  RestException 400
     */
    private function _validate($data)
    {
    }
}