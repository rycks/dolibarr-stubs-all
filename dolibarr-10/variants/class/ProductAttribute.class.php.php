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
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * Class ProductAttribute
 * Used to represent a product attribute
 */
class ProductAttribute
{
    /**
     * Database handler
     * @var DoliDB
     */
    private $db;
    /**
     * Id of the product attribute
     * @var int
     */
    public $id;
    /**
     * Ref of the product attribute
     * @var
     */
    public $ref;
    /**
     * Label of the product attribute
     * @var string
     */
    public $label;
    /**
     * Order of attribute.
     * Lower ones will be shown first and higher ones last
     * @var int
     */
    public $rang;
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Fetches the properties of a product attribute
     *
     * @param int $id Attribute id
     * @return int <1 KO, >1 OK
     */
    public function fetch($id)
    {
    }
    /**
     * Returns an array of all product variants
     *
     * @return ProductAttribute[]
     */
    public function fetchAll()
    {
    }
    /**
     * Creates a product attribute
     *
     * @param	User	$user	Object user that create
     * @return 					int <0 KO, Id of new variant if OK
     */
    public function create(\User $user)
    {
    }
    /**
     * Updates a product attribute
     *
     * @param	User	$user		Object user
     * @return 	int 				<0 KO, >0 OK
     */
    public function update(\User $user)
    {
    }
    /**
     * Deletes a product attribute
     *
     * @return int <0 KO, >0 OK
     */
    public function delete()
    {
    }
    /**
     * Returns the number of values for this attribute
     *
     * @return int
     */
    public function countChildValues()
    {
    }
    /**
     * Returns the number of products that are using this attribute
     *
     * @return int
     */
    public function countChildProducts()
    {
    }
    /**
     * Reorders the order of the variants.
     * This is an internal function used by moveLine function
     *
     * @return int <0 KO >0 OK
     */
    protected function reorderLines()
    {
    }
    /**
     * Internal function to handle moveUp and moveDown functions
     *
     * @param string $type up/down
     * @return int <0 KO >0 OK
     */
    private function moveLine($type)
    {
    }
    /**
     * Shows this attribute before others
     *
     * @return int <0 KO >0 OK
     */
    public function moveUp()
    {
    }
    /**
     * Shows this attribute after others
     *
     * @return int <0 KO >0 OK
     */
    public function moveDown()
    {
    }
    /**
     * Updates the order of all variants. Used by AJAX page for drag&drop
     *
     * @param DoliDB $db Database handler
     * @param array $order Array with row id ordered in ascendent mode
     * @return int <0 KO >0 OK
     */
    public static function bulkUpdateOrder(\DoliDB $db, array $order)
    {
    }
}