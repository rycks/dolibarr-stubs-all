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
 * Class ProductCombination2ValuePair
 * Used to represent the relation between a product combination, a product attribute and a product attribute value
 */
class ProductCombination2ValuePair
{
    /**
     * Database handler
     * @var DoliDB
     */
    private $db;
    /**
     * Combination 2 value pair id
     * @var int
     */
    public $id;
    /**
     * Product combination id
     * @var int
     */
    public $fk_prod_combination;
    /**
     * Product attribute id
     * @var int
     */
    public $fk_prod_attr;
    /**
     * Product attribute value id
     * @var int
     */
    public $fk_prod_attr_val;
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Translates this class to a human-readable string
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Creates a product combination 2 value pair
     * @return int <0 KO, >0 OK
     */
    public function create()
    {
    }
    /**
     * Retrieves a product combination 2 value pair from its rowid
     *
     * @param int $fk_combination Fk combination to search
     * @return int|ProductCombination2ValuePair[] -1 if KO
     */
    public function fetchByFkCombination($fk_combination)
    {
    }
    /**
     * Deletes a product combination 2 value pair
     *
     * @param int $fk_combination Rowid of the combination
     * @return int >0 OK <0 KO
     */
    public function deleteByFkCombination($fk_combination)
    {
    }
}