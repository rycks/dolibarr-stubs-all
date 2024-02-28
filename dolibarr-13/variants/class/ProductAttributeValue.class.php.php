<?php

/**
 * Class ProductAttributeValue
 * Used to represent a product attribute value
 */
class ProductAttributeValue extends \CommonObject
{
    /**
     * Database handler
     * @var DoliDB
     */
    public $db;
    /**
     * Attribute value id
     * @var int
     */
    public $id;
    /**
     * Product attribute id
     * @var int
     */
    public $fk_product_attribute;
    /**
     * Attribute value ref
     * @var string
     */
    public $ref;
    /**
     * Attribute value value
     * @var string
     */
    public $value;
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Gets a product attribute value
     *
     * @param int $valueid Product attribute value id
     * @return int <0 KO, >0 OK
     */
    public function fetch($valueid)
    {
    }
    /**
     * Returns all product attribute values of a product attribute
     *
     * @param int $prodattr_id Product attribute id
     * @param bool $only_used Fetch only used attribute values
     * @return ProductAttributeValue[]
     */
    public function fetchAllByProductAttribute($prodattr_id, $only_used = \false)
    {
    }
    /**
     * Creates a value for a product attribute
     *
     * @param  User $user      Object user
     * @param  int  $notrigger Do not execute trigger
     * @return int <0 KO >0 OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Updates a product attribute value
     *
     * @param  User	$user	   Object user
     * @param  int  $notrigger Do not execute trigger
     * @return int <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Deletes a product attribute value
     *
     * @param  User $user      Object user
     * @param  int  $notrigger Do not execute trigger
     * @return int <0 KO, >0 OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Deletes all product attribute values by a product attribute id
     *
     * @param int  $fk_attribute Product attribute id
     * @param User $user         Object user
     * @return int <0 KO, >0 OK
     */
    public function deleteByFkAttribute($fk_attribute, \User $user)
    {
    }
}