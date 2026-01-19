<?php

/* Copyright (C) 2016	Marcos García	<marcosgdf@gmail.com>
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
 * Class ProductAttributeValue
 * Used to represent a product attribute value
 */
class ProductAttributeValue
{
    /**
     * Database handler
     * @var DoliDB
     */
    private $db;
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
     * @param	User	$user		Object user
     * @return 	int 				<0 KO >0 OK
     */
    public function create(\User $user)
    {
    }
    /**
     * Updates a product attribute value
     *
     * @param	User	$user	Object user
     * @return 	int				<0 if KO, >0 if OK
     */
    public function update(\User $user)
    {
    }
    /**
     * Deletes a product attribute value
     *
     * @return int <0 KO, >0 OK
     */
    public function delete()
    {
    }
    /**
     * Deletes all product attribute values by a product attribute id
     *
     * @param int $fk_attribute Product attribute id
     * @return int <0 KO, >0 OK
     */
    public function deleteByFkAttribute($fk_attribute)
    {
    }
}