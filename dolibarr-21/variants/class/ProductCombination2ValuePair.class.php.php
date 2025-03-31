<?php

/* Copyright (C) 2016		Marcos García			<marcosgdf@gmail.com>
 * Copyright (C) 2022   	Open-Dsi				<support@open-dsi.fr>
 * Copyright (C) 2024		Frédéric France			<frederic.france@free.fr>
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
 *	\file       htdocs/variants/class/ProductCombination2ValuePair.class.php
 *	\ingroup    variants
 *	\brief      File of the ProductCombination2ValuePair class
 */
/**
 * Class ProductCombination2ValuePair
 * Used to represent the relation between a variant and its attributes.
 *
 * Example: a product "shirt" has a variant "shirt XL white" linked to the attributes "size: XL" and "color: white".
 * This is represented with two ProductCombination2ValuePair objects:
 * - One for "size: XL":
 *     * $object->fk_prod_combination    ID of the ProductCombination object between product "shirt" and its variant "shirt XL white"
 *     * $object->fk_prod_attr           ID of the ProductAttribute object "size"
 *     * $object->fk_prod_attr_val       ID of the ProductAttributeValue object "XL"
 * - Another for "color: white":
 *     * $object->fk_prod_combination    ID of the ProductCombination object between product "shirt" and its variant "shirt XL white"
 *     * $object->fk_prod_attr           ID of the ProductAttribute object "color"
 *     * $object->fk_prod_attr_val       ID of the ProductAttributeValue object "white"
 */
class ProductCombination2ValuePair
{
    /**
     * Database handler
     * @var DoliDB
     */
    private $db;
    /**
     * ID of this ProductCombination2ValuePair
     * @var int
     */
    public $id;
    /**
     * ID of the ProductCombination linked to this object
     * (ex: ID of the ProductCombination between product "shirt" and its variant "shirt XL white")
     * @var int
     */
    public $fk_prod_combination;
    /**
     * ID of the ProductAttribute linked to this object
     * (ex: ID of the ProductAttribute "color")
     * @var int
     */
    public $fk_prod_attr;
    /**
     * ID of the ProductAttributeValue linked to this object
     * (ex: ID of the ProductAttributeValue "white")
     * @var int
     */
    public $fk_prod_attr_val;
    /**
     * Error message
     * @var string
     */
    public $error;
    /**
     * Array of error messages
     * @var string[]
     */
    public $errors = array();
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
     * Create a ProductCombination2ValuePair
     *
     * @param	User		$user		User that creates		//not used
     * @return 	int						Return 1 if OK, -1 if KO
     */
    public function create($user)
    {
    }
    /**
     * Retrieve all ProductCombination2ValuePair linked to a given ProductCombination ID.
     *
     * @param   int          $fk_combination           ID of the ProductCombination
     * @return  -1|ProductCombination2ValuePair[]      Return <0 if KO, array of ProductCombination2ValuePair if OK
     */
    public function fetchByFkCombination($fk_combination)
    {
    }
    /**
     * Delete all ProductCombination2ValuePair linked to a given ProductCombination ID.
     *
     * @param       int					$fk_combination	ID of the ProductCombination
     * @return      int<-1,-1>|int<1,1>					-1 if KO, 1 if OK
     */
    public function deleteByFkCombination($fk_combination)
    {
    }
}